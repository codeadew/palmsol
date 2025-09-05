
<?php
require_once('resources/config.php'); ?>
<?php include(TEMPLATE_FRONT.DS."header.php");?> 

    <!-- search -->
    <div class="search-overlay">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-close">
                    <span class="search-overlay-close-line"></span>
                    <span class="search-overlay-close-line"></span>
                </div>
                <div class="search-overlay-form">
                    <form>
                        <input type="text" class="input-search" placeholder="Search here...">
                        <button type="button"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Banner Area -->
    <section id="home_one_banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="banner_one_text">
                        <h1>Explore the world together</h1>
                        <h3>Find awesome flights, hotel, tour, car and packages</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

    <!-- Form Area -->
    <?php include(TEMPLATE_FRONT.DS."form_area.php");?> 
    <?php include(TEMPLATE_FRONT.DS."top_deal.php");?>
    <?php include(TEMPLATE_FRONT.DS."request.php");?>
    <!-- Offer Area -->
    <?php include(TEMPLATE_FRONT.DS."offers.php");?>

    <?php include(TEMPLATE_FRONT.DS."footer.php");?>
  

 