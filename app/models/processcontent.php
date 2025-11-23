<?php

class Processcontent extends Controller
{
    protected $db;
    protected $uploadDir;
    protected $relativePath;

    public function __construct()
    {
        $this->db = Database::getInstance();

        // physical folder for uploads
        $this->uploadDir = "/var/www/html/palmsol/assets/admin_assets/images/blog/";
        $this->relativePath = "/assets/admin_assets/images/blog/";

        if (!is_dir($this->uploadDir)) {
            mkdir($this->uploadDir, 0755, true);
        }

        // disable PHP notices/warnings from leaking into output
        ini_set('display_errors', 0);
        error_reporting(E_ALL);
    }

    public function addPost(array $data, ?array $file = null): int
    {
        try {
            $status = $data['status'] ?? 'draft';

            $sanitizedData = [
                'title'        => htmlspecialchars(trim($data['title'] ?? ''), ENT_QUOTES, 'UTF-8'),
                'slug'         => htmlspecialchars(trim($data['slug'] ?? ''), ENT_QUOTES, 'UTF-8'),
                'content'      => trim($data['content'] ?? ''),
                'category'     => htmlspecialchars(trim($data['category'] ?? ''), ENT_QUOTES, 'UTF-8'),
                'meta_title'   => htmlspecialchars(trim($data['meta_title'] ?? ''), ENT_QUOTES, 'UTF-8'),
                'meta_desc'    => htmlspecialchars(trim($data['meta_desc'] ?? ''), ENT_QUOTES, 'UTF-8'),
                'tags'         => htmlspecialchars(trim($data['tags'] ?? ''), ENT_QUOTES, 'UTF-8'),
                'status'       => in_array($status, ['draft', 'published']) ? $status : 'draft',
                'created_at'   => date('Y-m-d H:i:s'),
            ];

            // generate slug
            if (empty($sanitizedData['slug']) && !empty($sanitizedData['title'])) {
                $sanitizedData['slug'] = $this->generateSlug($sanitizedData['title']);
            } elseif (!empty($sanitizedData['slug'])) {
                $sanitizedData['slug'] = $this->generateUniqueSlug($sanitizedData['slug']);
            }

            // validate required fields when published
            if ($sanitizedData['status'] === 'published') {
                foreach (['title', 'slug', 'content', 'category', 'meta_title', 'meta_desc'] as $f) {
                    if (empty($sanitizedData[$f])) {
                        throw new Exception("Field '{$f}' is required to publish a post.");
                    }
                }
            }

            // handle image
            $imagePath = $thumbPath = null;
            if (!empty($file) && isset($file['error']) && $file['error'] === UPLOAD_ERR_OK) {
                [$imagePath, $thumbPath] = $this->handleImageUpload($file);
            }

            // insert
            $query = "INSERT INTO blog_blog_posts 
                        (title, slug, content, category, meta_title, meta_desc, tags, status, image, thumbnail, created_at)
                      VALUES 
                        (:title, :slug, :content, :category, :meta_title, :meta_desc, :tags, :status, :image, :thumbnail, :created_at)";

            $params = [
                ':title' => $sanitizedData['title'],
                ':slug' => $sanitizedData['slug'],
                ':content' => $sanitizedData['content'],
                ':category' => $sanitizedData['category'],
                ':meta_title' => $sanitizedData['meta_title'],
                ':meta_desc' => $sanitizedData['meta_desc'],
                ':tags' => $sanitizedData['tags'],
                ':status' => $sanitizedData['status'],
                ':image' => $imagePath,
                ':thumbnail' => $thumbPath,
                ':created_at' => $sanitizedData['created_at'],
            ];

            if (method_exists($this->db, 'beginTransaction')) {
                $this->db->beginTransaction();
                $this->db->write($query, $params);
                $id = (int) $this->db->lastInsertId();
                $this->db->commit();
                return $id;
            }

            $this->db->write($query, $params);
            return (int) $this->db->lastInsertId();
        } catch (Throwable $e) {
            // prevent raw text leakage
            error_log("Blog Error: " . $e->getMessage());
            throw new Exception("Database operation failed. Please check logs.");
        }
    }

    private function generateSlug(string $title): string
    {
        return $this->generateUniqueSlug($this->slugify($title));
    }

    private function generateUniqueSlug(string $slug): string
    {
        $base = $this->slugify($slug);
        $candidate = $base;
        $count = 1;
        $query = "SELECT COUNT(*) AS total FROM blog_blog_posts WHERE slug = :slug";

        while (true) {
            $result = $this->db->read($query, ['slug' => $candidate]);
            $total = 0;

            if (!empty($result)) {
                $row = $result[0];
                if (isset($row->total)) {
                    $total = (int) $row->total;
                }
            }

            if ($total === 0) return $candidate;
            $candidate = $base . '-' . $count++;
        }
    }

    private function slugify(string $text): string
    {
        $text = iconv('UTF-8', 'ASCII//TRANSLIT', $text);
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        $text = trim($text, '-');
        $text = strtolower($text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        return $text ?: bin2hex(random_bytes(4));
    }

    private function handleImageUpload(array $file): array
    {
        if (empty($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
            throw new RuntimeException('No uploaded file found.');
        }
        if (!$this->isValidImage($file['tmp_name'], (int)$file['size'])) {
            throw new RuntimeException('Invalid image type or size.');
        }

        return $this->saveImageAndThumbnail($file);
    }

    private function isValidImage(string $tmpPath, int $size): bool
    {
        $allowed = ['image/jpeg', 'image/png', 'image/webp'];
        $mime = @mime_content_type($tmpPath);
        return in_array($mime, $allowed, true) && $size <= (4 * 1024 * 1024);
    }

    private function saveImageAndThumbnail(array $file): array
    {
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $newName = uniqid('blog_', true) . '.' . $ext;
        $savePath = $this->uploadDir . $newName;
        $thumbPath = $this->uploadDir . 'thumb_' . $newName;

        if (!move_uploaded_file($file['tmp_name'], $savePath)) {
            throw new RuntimeException('Failed to move uploaded file.');
        }

        $this->resizeImage($savePath, 1400);
        $this->createThumbnail($savePath, $thumbPath, 300, 200);

        return [$this->relativePath . $newName, $this->relativePath . 'thumb_' . $newName];
    }

    private function resizeImage(string $path, int $maxWidth): void
    {
        $info = getimagesize($path);
        if (!$info) throw new RuntimeException('Invalid image file.');
        [$width, $height, $type] = $info;
        if ($width <= $maxWidth) return;

        $ratio = $height / $width;
        $newWidth = $maxWidth;
        $newHeight = (int) round($maxWidth * $ratio);

        $src = $this->imageCreateFromAny($path);
        $dst = imagecreatetruecolor($newWidth, $newHeight);
        $this->preserveTransparency($dst, $type);

        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        $this->imageOutputAny($dst, $path, $type);
        imagedestroy($src);
        imagedestroy($dst);
    }

    private function createThumbnail(string $srcPath, string $destPath, int $w, int $h): void
    {
        $info = getimagesize($srcPath);
        if (!$info) throw new RuntimeException('Invalid source image.');
        [$width, $height, $type] = $info;
        $src = $this->imageCreateFromAny($srcPath);
        $thumb = imagecreatetruecolor($w, $h);
        $this->preserveTransparency($thumb, $type);

        imagecopyresampled($thumb, $src, 0, 0, 0, 0, $w, $h, $width, $height);
        $this->imageOutputAny($thumb, $destPath, $type);
        imagedestroy($src);
        imagedestroy($thumb);
    }

    private function imageCreateFromAny(string $path): \GdImage
    {
        $type = @exif_imagetype($path);
        if ($type === false) {
            throw new RuntimeException('Unable to determine image type.');
        }
        return match ($type) {
            IMAGETYPE_JPEG => imagecreatefromjpeg($path),
            IMAGETYPE_PNG => imagecreatefrompng($path),
            IMAGETYPE_WEBP => imagecreatefromwebp($path),
            default => throw new RuntimeException('Unsupported image format.'),
        };
    }

    private function imageOutputAny($im, string $path, int $type): void
    {
        match ($type) {
            IMAGETYPE_JPEG => imagejpeg($im, $path, 90),
            IMAGETYPE_PNG => imagepng($im, $path, 8),
            IMAGETYPE_WEBP => imagewebp($im, $path, 90),
            default => throw new RuntimeException('Unsupported image type for output.'),
        };
    }

    private function preserveTransparency($im, int $type): void
    {
        if (in_array($type, [IMAGETYPE_PNG, IMAGETYPE_WEBP], true)) {
            imagealphablending($im, false);
            imagesavealpha($im, true);
        }
    }


      // ============================================
    // GET ALL blog_posts
    // ============================================
    public function getAllblog_posts()
    {
        return $this->db->get("blog_posts", [], "*");  
        // Same as: SELECT * FROM blog_posts
    }

    

    
   


     // ============================================
    // LIST BLOG POST
    // ============================================
     public function getPostsPaginated($limit, $offset)
{
    // force integer to avoid SQL injection
    $limit  = (int)$limit;
    $offset = (int)$offset;

    $sql = "SELECT * FROM blog_posts ORDER BY id DESC LIMIT $limit OFFSET $offset";
    return $this->db->read($sql);
}

    // ============================================
        // PAGINATION FOR  BLOG POST
        // ============================================
    public function countAllPosts()
    {
        $sql = "SELECT COUNT(*) AS total FROM blog_posts";
        $result = $this->db->read($sql);
        return $result ? $result[0]->total : 0;
    }



        // ============================================
            // UPDATE BLOG POST
            // ============================================
        public function updatePost(int $postId, array $data, ?array $file = null): bool
    {
        try {
            /** --------------------------------------------------------------
             * 1. VALIDATION & SANITIZATION (same style as addPost)
             * --------------------------------------------------------------*/
            $requiredFields = [
                'title','slug','category','meta_title','meta_desc','tags','content','status'
            ];

            foreach ($requiredFields as $field) {
                if (!isset($data[$field]) || trim($data[$field]) === '') {
                    throw new Exception("Missing required field: {$field}");
                }
            }

            // sanitize inputs
            $clean = [
                'title'      => htmlspecialchars(trim($data['title']), ENT_QUOTES, 'UTF-8'),
                'slug'       => htmlspecialchars(trim($data['slug']), ENT_QUOTES, 'UTF-8'),
                'content'    => trim($data['content']),
                'category'   => htmlspecialchars(trim($data['category']), ENT_QUOTES, 'UTF-8'),
                'meta_title' => htmlspecialchars(trim($data['meta_title']), ENT_QUOTES, 'UTF-8'),
                'meta_desc'  => htmlspecialchars(trim($data['meta_desc']), ENT_QUOTES, 'UTF-8'),
                'tags'       => htmlspecialchars(trim($data['tags']), ENT_QUOTES, 'UTF-8'),
                'status'     => in_array($data['status'], ['draft','published']) ? $data['status'] : 'draft',
            ];

            // publish validation
            if ($clean['status'] === 'published') {
                foreach (['title','slug','content','category','meta_title','meta_desc'] as $f) {
                    if (empty($clean[$f])) {
                        throw new Exception("Field '{$f}' is required to publish this post.");
                    }
                }
            }

            /** --------------------------------------------------------------
             * 2. FETCH EXISTING POST
             * --------------------------------------------------------------*/
            $query = "SELECT * FROM blog_posts WHERE id = :id LIMIT 1";
            $row   = $this->db->read($query, ['id' => $postId]);

            if (!$row) {
                throw new Exception("Post not found.");
            }

            $old = (object) $row[0];

            /** --------------------------------------------------------------
             * 3. HANDLE SLUG (same logic as addPost)
             * --------------------------------------------------------------*/
            if (empty($clean['slug']) && !empty($clean['title'])) {
                $clean['slug'] = $this->generateSlug($clean['title']);
            } elseif (!empty($clean['slug'])) {
                $clean['slug'] = $this->generateUniqueSlug($clean['slug']);
            }

            /** --------------------------------------------------------------
             * 4. OPTIONAL — HANDLE IMAGE UPLOAD (use handleImageUpload())
             * --------------------------------------------------------------*/
            $newImage = $old->image;
            $newThumb = $old->thumbnail;

            if (!empty($file) && isset($file['error']) && $file['error'] === UPLOAD_ERR_OK) {

                // upload & thumbnail generation
                [$imagePath, $thumbPath] = $this->handleImageUpload($file);

                // delete old images if they exist
                if ($old->image && file_exists($old->image)) {
                    unlink($old->image);
                }
                if ($old->thumbnail && file_exists($old->thumbnail)) {
                    unlink($old->thumbnail);
                }

                // assign new ones
                $newImage = $imagePath;
                $newThumb = $thumbPath;
            }

            /** --------------------------------------------------------------
             * 5. PREPARE UPDATE DATA
             * --------------------------------------------------------------*/
            $updateData = [
                'title'      => $clean['title'],
                'slug'       => $clean['slug'],
                'content'    => $clean['content'],
                'category'   => $clean['category'],
                'meta_title' => $clean['meta_title'],
                'meta_desc'  => $clean['meta_desc'],
                'tags'       => $clean['tags'],
                'status'     => $clean['status'],
                'image'      => $newImage,
                'thumbnail'  => $newThumb,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            /** --------------------------------------------------------------
             * 6. EXECUTE UPDATE (transaction-safe, same as addPost)
             * --------------------------------------------------------------*/
            if (method_exists($this->db, 'beginTransaction')) {
                $this->db->beginTransaction();
                $result = $this->db->update("blog_posts", $updateData, ['id' => $postId]);
                $this->db->commit();
            } else {
                $result = $this->db->update("blog_posts", $updateData, ['id' => $postId]);
            }

            if (!$result) {
                throw new Exception("Failed to update blog post.");
            }

            return true;

        } catch (Throwable $e) {
            error_log("Blog Update Error: " . $e->getMessage());
            throw new Exception("Unable to update post. Check logs for details.");
        }
    }

    /**
     * Get single post by id. Returns associative array or null.
     *
     * @param int $postId
     * @return array|null
     */
    public function getPostById(int $postId): ?object
{
    $db = Database::getInstance();

    $query = "SELECT * FROM blog_posts WHERE id = :id LIMIT 1";
    $row = $db->read($query, ['id' => $postId]);

    if (!$row) {
        return null;
    }

    return (object) $row[0]; //  (object )
}







     /**
     * Delete a post and its images.
     *
     * @param int $postId
     * @return bool
     * @throws Throwable
     */
    public function deletePost(int $postId): bool
    {
        try {
            $row = $this->getPostById($postId);
            if (!$row) {
                throw new Exception("Post not found.");
            }

            // delete images
            if (!empty($row['image']) && file_exists($this->uploadDir . basename($row['image']))) {
                @unlink($this->uploadDir . basename($row['image']));
            }
            if (!empty($row['thumbnail']) && file_exists($this->uploadDir . basename($row['thumbnail']))) {
                @unlink($this->uploadDir . basename($row['thumbnail']));
            }

            // delete row
            $result = $this->db->delete($this->table, ['id' => $postId]);

            if (!$result) {
                throw new Exception("Failed to delete post.");
            }

            return true;
        } catch (Throwable $e) {
            error_log("Blog Delete Error: " . $e->getMessage());
            throw new Exception("Unable to delete post. Check logs for details.");
        }
    }


        public function getPostBySlug($slug)
    {
        $db = Database::getInstance();

        $query = "SELECT * FROM blog_posts WHERE slug = :slug LIMIT 1";
        $post = $db->read($query, ['slug' => $slug]);

        if (!$post) {
            return false; // Not found
        }

        return (object)$post[0]; // Return as object for consistency
    }


    



}
