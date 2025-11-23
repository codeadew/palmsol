<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                        <h4 class="mb-sm-0">Add a post</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Explore</a></li>
                                <li class="breadcrumb-item active">Create a post</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

              <div class="container" style="max-width:1700px; margin:40px auto; background:#fff; padding:30px; border-radius:10px; box-shadow:0 2px 8px rgba(0,0,0,0.1);">
                <h2 style="text-align:center; margin-bottom:25px;">📝 Create New Blog Post</h2>

              <form id="add-post-form" method="post" enctype="multipart/form-data">
                
                <!-- Title -->
                <div class="form-group" style="margin-bottom:15px;">
                  <label for="title">Title <span style="color:red">*</span></label>
                  <input type="text" name="title" id="title" class="form-control" placeholder="Enter post title" required
                        style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px;">
                </div>

                <!-- Slug -->
                <div class="form-group" style="margin-bottom:15px;">
                  <label for="slug">Slug (optional)</label>
                  <input type="text" name="slug" id="slug" class="form-control" placeholder="auto-generated if empty"
                        style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px;">
                </div>

                <!-- Category -->
                  <!-- Category (Dropdown) -->
                <div class="form-group" style="margin-bottom:15px;">
                  <label for="category">Category</label>
                  <select name="category" id="category" class="form-control" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px;">
                    <option value="">-- Select Category --</option>
                    <option value="Technology">Technology</option>
                    <option value="Business">Business</option>
                    <option value="Lifestyle">Lifestyle</option>
                    <option value="Education">Education</option>
                    <option value="Health">Health</option>
                  </select>
                </div>


                <!-- Meta Title -->
                <div class="form-group" style="margin-bottom:15px;">
                  <label for="meta_title">Meta Title</label>
                  <input type="text" name="meta_title" id="meta_title" class="form-control"
                        style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px;">
                </div>

                <!-- Meta Description -->
                <div class="form-group" style="margin-bottom:15px;">
                  <label for="meta_desc">Meta Description</label>
                  <textarea name="meta_desc" id="meta_desc" class="form-control" rows="2"
                            style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px;"></textarea>
                </div>

                <!-- Tags -->
                <div class="form-group" style="margin-bottom:15px;">
                  <label for="tags">Tags (comma separated)</label>
                  <input type="text" name="tags" id="tags" class="form-control" placeholder="e.g. fashion, technology, news"
                        style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px;">
                </div>

                <!-- Content -->
                <div class="form-group" style="margin-bottom:15px;">
                  <label for="content">Content</label>
                  <textarea name="content" id="content" class="form-control" rows="8" placeholder="Write your post..."
                            style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px;"></textarea>
                </div>

                <!-- Image -->
                <div class="form-group" style="margin-bottom:15px;">
                  <label for="image">Featured Image</label>
                  <input type="file" name="image" id="image" accept="image/*" class="form-control"
                        style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px;">
                </div>

                <!-- Status (Radio: Draft or Published) -->
                <div class="form-group" style="margin-bottom:20px;">
                  <label>Status:</label><br>
                  <label style="margin-right:20px;">
                    <input type="radio" name="status" value="draft" checked> Save as Draft
                  </label>
                  <label>
                    <input type="radio" name="status" value="published"> Publish Now
                  </label>
                </div>
                <div style="text-align:center;">
                  <div id="response" style="display:block; color: green;"></div>
                </div><br><br><br>
                <!-- Save Button -->
                <div style="text-align:center;">
                  <button type="submit" class="btn btn-primary" 
                          style="width:14.5%; background:#007bff; color:#fff; padding:12px; border:none; border-radius:6px; font-size:16px; cursor:pointer;">
                    Save Post
                  </button>
                </div>
              </form>

              <script src="<?= ASSETS  ?>admin_assets/js/ajax-helper.js"></script>
              <script>
                  document.addEventListener('DOMContentLoaded', () => {
                      // 2. Call the reusable function with the specific form details
                      submitForm(
                          '#add-post-form',        // The form ID selector
                          '#response',             // The response div ID selector
                          '<?= ROOT ?>blog/post'  // The PHP controller endpoint
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




