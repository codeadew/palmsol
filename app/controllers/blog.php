<?php

class Blog extends Controller
{
        public function index()
    {
        // Authentication
        $user = $this->load_model("User");
        $user->checkLogin2(true, ["super_admin"]);

        // Load blog posts
        $blog = $this->load_model("Processcontent");
      // Pagination settings
        $limit = 8; // posts per page
        $page  = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $page  = ($page < 1) ? 1 : $page;
        $offset = ($page - 1) * $limit;

        // Fetch posts
        $data['posts'] = $blog->getPostsPaginated($limit, $offset);

        // Count total posts
        $total = $blog->countAllPosts();

        // Total pages
        $pages = ceil($total / $limit);

        // Pass to view
        $data['page']  = $page;
        $data['pages'] = $pages;
        $data['total'] = $total;

        // SEO title & description
        $data['page_title'] = 'palmsol Technology | Web Design, ICT & Networking, Digital Marketing, ICT Support, and VAS in Lagos';
        $data['meta_description'] = 'palmsol Technology delivers expert web design, ICT & networking, digital marketing, ICT support, and value-added services in Lagos. Trusted since 2018. Get your free project plan today.';

        // Meta keywords
        $data['meta_keywords'] = 'web design Lagos, ICT networking Nigeria, digital marketing Lagos, ICT support, VAS, palmsol Technology, tech company Lagos';

        // LocalBusiness schema properties
        $data['business_name']        = 'palmsol Technology';
        $data['business_image']       = 'https://palmsoltechnology.com/path-to-your-main-image.jpg';
        $data['business_id']          = 'https://palmsoltechnology.com/';
        $data['business_url']         = 'https://palmsoltechnology.com/';
        $data['telephone']            = '+234 9031499108';
        $data['price_range']          = '$$';

        // Address
        $data['street']               = '13D Kenneth Agbakuru Street, Lekki Phase 1';
        $data['locality']             = 'Lagos';
        $data['region']               = 'LA';
        $data['postal_code']          = '100001';
        $data['country']              = 'NG';

        // Geo
        $data['latitude']             = 6.442708;
        $data['longitude']            = 3.483333;

        // Opening hours
        $data['opening_days']         = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
        $data['opening_time']         = '09:00';
        $data['closing_time']         = '18:00';

        // Social links
        $data['same_as']              = [
            "https://www.facebook.com/share/1AzNwFatai/"
        ];

        // Business description
        $data['business_description'] = 'palmsol Technology is a Lagos-based tech company specializing in web design, ICT & networking, digital marketing, ICT support, and value-added services for businesses across Nigeria.';

        // Services
        $data['offers'] = [
            [
                "name" => "Website Design & Development",
                "description" => "Mobile-first, SEO-ready websites for businesses in Lagos and across Nigeria."
            ],
            [
                "name" => "ICT & Networking Solutions",
                "description" => "Reliable ICT and network infrastructure setup and support."
            ],
            [
                "name" => "Digital Marketing",
                "description" => "SEO, social media marketing, and online advertising that drives business growth."
            ],
            [
                "name" => "ICT Support",
                "description" => "Technical support, troubleshooting, and IT management services."
            ],
            [
                "name" => "Value-Added Services (VAS)",
                "description" => "Custom telecom and digital solutions to give your business a competitive advantage."
            ]
        ];

        // Load views
        $this->view("palmsol_blog/topbar", $data);
        $this->view("palmsol_blog/leftsidebar", $data);
        $this->view("palmsol_blog/BlogListingPage", $data);
        $this->view("palmsol_blog/footer", []);
    }

    // ============================================
    // Post blog begins here
    // ============================================

    public function post()
    {
         // Authentication
        $user = $this->load_model("User");
        $user->checkLogin2(true, ["super_admin"]);
        
      
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Clean any previous output (like PHP warnings) to prevent JSON errors
            if (ob_get_level() > 0) {
                ob_end_clean();
            }
            
            header('Content-Type: application/json; charset=utf-8');
        }
        // --- END: Robust Error & Output Handling ---

        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // --- THIS IS THE MAIN FIX ---
                $postData = [];
                // Check if data was sent as JSON (common with fetch/axios)
                if (strpos($_SERVER['CONTENT_TYPE'] ?? '', 'application/json') !== false) {
                    $input = file_get_contents('php://input');
                    $postData = json_decode($input, true);
                    // Check if json_decode failed
                    if (json_last_error() !== JSON_ERROR_NONE) {
                        throw new Exception("Invalid JSON data received: " . json_last_error_msg());
                    }
                } else {
                    // Otherwise, assume it's regular form-data (which populates $_POST)
                    $postData = $_POST;
                }
                // --- END OF FIX ---

                $fileData = $_FILES['image'] ?? null;
                // --- START: Validation ---
            // Make sure we actually got data
            if (empty($postData) && empty($fileData)) {
                throw new Exception("No input data or file was received.");
            }
            // Define the fields that are *always* required, even for a draft
            // You can change this list to match your needs
            $requiredFields = ['title', 'slug', 'category', 'meta_title', 'meta_desc', 'tags', 'content', 'status'];
            $emptyFields = [];
            foreach ($requiredFields as $field) {
                // We check if the field is missing OR if it's just empty spaces
                if (empty(trim($postData[$field] ?? ''))) {
                    $emptyFields[] = $field;
                }
            }
            // If any fields are empty, throw one error listing all of them
            if (!empty($emptyFields)) {
                $fieldList = implode(', ', $emptyFields);
                throw new Exception("The following field(s) are required: {$fieldList}.");
            }
            // --- END: Validation ---

                $blog = $this->load_model("Processcontent");
                
                // Pass the *correct* data array, not the (possibly empty) $_POST
                $postId = $blog->addPost($postData, $fileData);

                echo json_encode([
                    'success' => true,
                    'message' => 'Post saved successfully!',
                    'post_id' => $postId
                ], JSON_UNESCAPED_SLASHES);
                
                exit;
            }

            // --- Normal page load (GET request) ---
            // This part is fine and was not changed
            header('Content-Type: text/html; charset=utf-8');
            $this->view("palmsol_blog/topbar", []);
            $this->view("palmsol_blog/leftsidebar", []);
            $this->view("palmsol_blog/maincontentpost", []);
            $this->view("palmsol_blog/footer", []);

        } catch (Throwable $e) {
            
            // --- START: Improved Error Response ---
            // Ensure headers are set (in case the error happened before they were)
            if (headers_sent() === false) {
                header('Content-Type: application/json; charset=utf-8');
            }
            
            // Set a proper HTTP error status code for the browser
            http_response_code(400); // 400 = Bad Request

            echo json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ], JSON_UNESCAPED_SLASHES);
            
            exit;
            // --- END: Improved Error Response ---
        }
    }// ============================================
    // Post blog ends here
    // ============================================

    // ============================================
// EDIT BLOG POST
// ============================================
public function edit($id = null)
{
    // Authentication
    $user = $this->load_model("User");
    $user->checkLogin2(true, ["super_admin"]);

    // Validate ID
    if (!$id || !is_numeric($id)) {
        die("Invalid blog ID");
    }

    // Load model
    $blog = $this->load_model("Processcontent");

    // -----------------------------------------------------------
    // 1. GET REQUEST → Load Edit Page with Existing Blog Data
    // -----------------------------------------------------------
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $post = $blog->getPostById((int)$id);

        if (!$post) {
            die("Blog post not found.");
        }

        // Load your views
        $this->view("palmsol_blog/topbar", []);
        $this->view("palmsol_blog/leftsidebar", []);
        $this->view("palmsol_blog/BlogEdit", ['post' => $post]); // <-- send existing data
        $this->view("palmsol_blog/footer", []);
        return;
    }

    // -----------------------------------------------------------
    // 2. POST REQUEST → Handle Update
    // -----------------------------------------------------------
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Clean ANY accidental output before JSON
        if (ob_get_level() > 0) { ob_end_clean(); }

        header('Content-Type: application/json; charset=utf-8');

        try {
            // Detect JSON or Form-Data
            $postData = [];

            if (strpos($_SERVER['CONTENT_TYPE'] ?? '', 'application/json') !== false) {
                $raw = file_get_contents("php://input");
                $postData = json_decode($raw, true);

                if (json_last_error() !== JSON_ERROR_NONE) {
                    throw new Exception("Invalid JSON input: " . json_last_error_msg());
                }
            } else {
                $postData = $_POST;
            }

            // Files
            $fileData = $_FILES['image'] ?? null;

            // Validate input
            $requiredFields = ['title', 'slug', 'category', 'meta_title', 'meta_desc', 'tags', 'content', 'status'];
            $emptyFields = [];

            foreach ($requiredFields as $field) {
                if (empty(trim($postData[$field] ?? ''))) {
                    $emptyFields[] = $field;
                }
            }

            if (!empty($emptyFields)) {
                throw new Exception("These fields are required: " . implode(', ', $emptyFields));
            }

            // Perform update
            $success = $blog->updatePost((int)$id, $postData, $fileData);

            if (!$success) {
                throw new Exception("Failed to update blog post.");
            }

            // JSON Response
            echo json_encode([
                'success' => true,
                'message' => 'Blog post updated successfully',
                'post_id' => $id
            ], JSON_UNESCAPED_SLASHES);
            exit;

        } catch (Throwable $e) {

            // Ensure JSON error clean output
            if (!headers_sent()) {
                header('Content-Type: application/json; charset=utf-8');
            }

            http_response_code(400);

            echo json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ], JSON_UNESCAPED_SLASHES);

            exit;
        }
    }
}
// ============================================
// END EDIT BLOG POST
// ============================================


     



}


   
