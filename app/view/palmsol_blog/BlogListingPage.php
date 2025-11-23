<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                        <h4 class="mb-sm-0">Blog Grid View</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Blogs</a></li>
                                <li class="breadcrumb-item active">Grid View</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- End page title -->

            <div class="row g-4 mb-3">
                <div class="col-sm-auto">
                    <div>
                        <a href="<?= ROOT ?>blog/post" class="btn btn-success">
                            <i class="ri-add-line align-bottom me-1"></i> Add New
                        </a>
                    </div>
                </div>

                <div class="col-sm">
                    <div class="d-flex justify-content-sm-end gap-2">
                        <div class="search-box ms-2">
                            <input type="text" class="form-control" placeholder="Search...">
                            <i class="ri-search-line search-icon"></i>
                        </div>

                        <select class="form-control w-md" data-choices data-choices-search-false>
                            <option value="All">All</option>
                            <option value="Today">Today</option>
                            <option value="Yesterday">Yesterday</option>
                            <option value="Last 7 Days">Last 7 Days</option>
                            <option value="Last 30 Days">Last 30 Days</option>
                            <option value="This Month">This Month</option>
                            <option value="Last Year">Last Year</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php if (!empty($posts)) : ?>
                    <?php foreach ($posts as $post) : ?>
                        <div class="col-xxl-3 col-lg-6">
                            <div class="card overflow-hidden blog-grid-card">

                                <div class="position-relative overflow-hidden">
                                    <img src="<?= ROOT ?>/<?= $post->image ?>" 
                                         alt="" 
                                         class="blog-img object-fit-cover">
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="<?= ROOT ?>blog/view/<?= $post->slug ?>" class="text-reset">
                                            <?= htmlspecialchars($post->title) ?>
                                        </a>
                                    </h5>

                                    <p class="text-muted mb-2">
                                        <?= htmlspecialchars(substr($post->content, 0, 120)) ?>...
                                    </p>

                                    <div class="d-flex flex-wrap gap-2">

                                        <!-- View Button -->
                                        <a href="<?= ROOT ?>blog/view/<?= $post->slug ?>" 
                                           class="btn btn-info waves-effect waves-light">
                                           View
                                        </a>

                                        <!-- Edit -->
                                        <a href="<?= ROOT ?>blog/edit/<?= $post->id ?>" 
                                           class="btn btn-warning waves-effect waves-light">
                                           Edit
                                        </a>

                                        <!-- Delete -->
                                        <a href="<?= ROOT ?>blog/delete/<?= $post->slug ?>" 
                                           onclick="return confirm('Are you sure you want to delete this blog?')" 
                                           class="btn btn-danger waves-effect waves-light">
                                           Delete
                                        </a>

                                        <!-- Publish / Draft -->
                                        <?php if ($post->status == 'draft') : ?>
                                            <a href="<?= ROOT ?>blog/publish/<?= $post->slug ?>" 
                                               class="btn btn-success waves-effect waves-light">
                                               Publish
                                            </a>
                                        <?php else : ?>
                                            <a href="<?= ROOT ?>blog/unpublish/<?= $post->slug ?>" 
                                               class="btn btn-secondary waves-effect waves-light">
                                               Unpublish
                                            </a>
                                        <?php endif; ?>

                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="text-center">No blog posts found.</p>
                <?php endif; ?>
            </div>
            <!-- End grid -->

            <!-- Pagination -->
            <div class="row g-0 text-center text-sm-start align-items-center mb-4">
                <div class="col-sm-6">
                    <div>
                        <p class="mb-sm-0 text-muted">
                            Showing 
                            <span class="fw-semibold"><?= $page ?></span> 
                            of 
                            <span class="fw-semibold text-decoration-underline"><?= $pages ?></span> pages  
                            (Total: <?= $total ?> blogs)
                        </p>
                    </div>
                </div>

                <div class="col-sm-6">
                    <ul class="pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">

                        <!-- Previous -->
                        <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                            <a href="?page=<?= $page - 1 ?>" class="page-link">Previous</a>
                        </li>

                        <!-- Page Numbers -->
                        <?php for ($i = 1; $i <= $pages; $i++) : ?>
                            <li class="page-item <?= ($page == $i) ? 'active' : '' ?>">
                                <a href="?page=<?= $i ?>" class="page-link"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>

                        <!-- Next -->
                        <li class="page-item <?= ($page >= $pages) ? 'disabled' : '' ?>">
                            <a href="?page=<?= $page + 1 ?>" class="page-link">Next</a>
                        </li>

                    </ul>
                </div>
            </div>

        </div><!-- container-fluid -->
    </div><!-- End Page-content -->
</div><!-- end main content -->
