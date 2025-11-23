<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                        <h4 class="mb-sm-0">update a post</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Explore</a></li>
                                <li class="breadcrumb-item active">Upadte a post</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

              <div class="container" style="max-width:1700px; margin:40px auto; background:#fff; padding:30px; border-radius:10px; box-shadow:0 2px 8px rgba(0,0,0,0.1);">
                <h2 style="text-align:center; margin-bottom:25px;">📝 Update Blog Post</h2>

              <form id="edit-post-form" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $post->id ?? '' ?>">

                <!-- Title -->
                <div class="form-group">
                    <label for="title">Title <span style="color:red">*</span></label>
                    <input type="text" name="title" id="title" class="form-control" required
                        value="<?= htmlspecialchars($post->title ?? '') ?>">
                </div>

                <!-- Slug -->
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control"
                        value="<?= htmlspecialchars($post->slug ?? '') ?>">
                </div>

                <!-- Category -->
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control">
                        <?php
                        $categories = ["Technology","Business","Lifestyle","Education","Health"];
                        foreach ($categories as $cat) {
                            $selected = ($post->category ?? '') === $cat ? 'selected' : '';
                            echo "<option value='{$cat}' {$selected}>{$cat}</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Meta Title -->
                <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <input type="text" name="meta_title" id="meta_title" class="form-control"
                        value="<?= htmlspecialchars($post->meta_title ?? '') ?>">
                </div>

                <!-- Meta Description -->
                <div class="form-group">
                    <label for="meta_desc">Meta Description</label>
                    <textarea name="meta_desc" id="meta_desc" class="form-control"><?= htmlspecialchars($post->meta_desc ?? '') ?></textarea>
                </div>

                <!-- Tags -->
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <input type="text" name="tags" id="tags" class="form-control"
                        value="<?= htmlspecialchars($post->tags ?? '') ?>">
                </div>

                <!-- Content -->
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" class="form-control" rows="8"><?= htmlspecialchars($post->content ?? '') ?></textarea>
                </div>

                <!-- Featured Image -->
                <div class="form-group">
                    <label for="image">Featured Image</label>
                    <input type="file" name="image" id="image" accept="image/*" class="form-control">
                    <?php if(!empty($post->image)): ?>
                        <img src="<?= ROOT ?>/<?= $post->image ?>" alt="current image" style="max-width:150px; margin-top:10px;">
                    <?php endif; ?>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label>Status:</label><br>
                    <label>
                        <input type="radio" name="status" value="draft" <?= ($post->status ?? '') === 'draft' ? 'checked' : '' ?>> Draft
                    </label>
                    <label>
                        <input type="radio" name="status" value="published" <?= ($post->status ?? '') === 'published' ? 'checked' : '' ?>> Published
                    </label>
                </div>

                <div style="text-align:center;">
                    <div id="response" style="color:green;"></div>
                    <button type="submit" class="btn btn-primary">update Post</button>
                </div>
            </form>
             <script src="<?= ASSETS  ?>admin_assets/js/ajax-helper.js"></script>
              <script>
                  document.addEventListener('DOMContentLoaded', () => {
                      // 2. Call the reusable function with the specific form details
                      submitForm(
                          '#add-post-form',        // The form ID selector
                          '#response',             // The response div ID selector
                          '<?= ROOT ?>blog/edit'  // The PHP controller endpoint
                      );
                  });
              </script>
              <script>
                document.addEventListener('DOMContentLoaded', () => {
                  const titleInput = document.getElementById('title');
                  const slugInput  = document.getElementById('slug');

                  if (!titleInput || !slugInput) {
                    console.warn('Missing #title or #slug element in the page.');
                    return;
                  }

                  // Turn a string into a URL-friendly slug (no special chars, normalized accents)
                  function makeSlug(str) {
                    if (!str) return '';
                    return String(str)
                      .toLowerCase()
                      .normalize('NFKD')               // split accents from letters
                      .replace(/[\u0300-\u036f]/g, '')// remove accent marks
                      .replace(/[^\w\s-]/g, '')       // remove non-word, non-space, non-dash chars
                      .trim()                         // trim spaces at ends
                      .replace(/\s+/g, '-')           // spaces -> -
                      .replace(/-+/g, '-');           // collapse multiple dashes
                  }

                  // Generate a short suffix to keep slug "unique" client-side (optional)
                  function uniqueSuffix() {
                    // short, fairly unique suffix using timestamp in base36
                    return Date.now().toString(36).slice(-4);
                  }

                  // Keep track of last base slug so we don't keep appending suffixes while editing
                  let lastBase = '';

                  titleInput.addEventListener('input', () => {
                    const title = titleInput.value;
                    const baseSlug = makeSlug(title);

                    // If base changed, append fresh suffix; otherwise keep what user already sees
                    if (baseSlug && baseSlug !== lastBase) {
                      slugInput.value = `${baseSlug}-${uniqueSuffix()}`;
                      lastBase = baseSlug;
                    } else if (!baseSlug) {
                      slugInput.value = '';
                      lastBase = '';
                    }
                    // If you want the slug to be exactly the base (no suffix), use:
                    // slugInput.value = baseSlug;
                  });

                  // Optional: when form is submitted, ensure slug exists and remove readonly if needed
                  document.getElementById('titleForm').addEventListener('submit', (e) => {
                    if (!slugInput.value) {
                      e.preventDefault();
                      alert('Please enter a title to generate the slug.');
                    }
                  });
                });
              </script>

           
          </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->          
</div>




