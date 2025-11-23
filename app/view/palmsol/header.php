<?php
// Build LocalBusiness schema as a PHP array
$schema = [
    "@context" => "https://schema.org",
    "@type" => "LocalBusiness",
    "name" => $business_name,
    "image" => $business_image,
    "@id" => $business_id,
    "url" => $business_url,
    "telephone" => $telephone,
    "priceRange" => $price_range,
    "address" => [
        "@type" => "PostalAddress",
        "streetAddress" => $street,
        "addressLocality" => $locality,
        "addressRegion" => $region,
        "postalCode" => $postal_code,
        "addressCountry" => $country
    ],
    "geo" => [
        "@type" => "GeoCoordinates",
        "latitude" => $latitude,
        "longitude" => $longitude
    ],
    "openingHoursSpecification" => [
        [
            "@type" => "OpeningHoursSpecification",
            "dayOfWeek" => $opening_days,
            "opens" => $opening_time,
            "closes" => $closing_time
        ]
    ],
    "sameAs" => $same_as,
    "description" => $business_description,
    "makesOffer" => array_map(function ($offer) {
        return [
            "@type" => "Offer",
            "itemOffered" => [
                "@type" => "Service",
                "name" => $offer['name'],
                "description" => $offer['description']
            ]
        ];
    }, $offers)
];
?>
<!DOCTYPE html>
<html lang="en" class="no-js">


<head>
 <meta charset="utf-8"/>
 <!-- SEO Meta -->
    <title><?php echo $page_title; ?></title>
    <meta name="description" content="<?php echo $meta_description; ?>">
    <meta name="keywords" content="<?php echo $meta_keywords; ?>">
 <meta name="author" content="palmsoltechnology">
 <meta name="viewport" content="width=device-width,initial-scale=1">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <!--website-favicon-->
 <link href="<?= ASSETS . THEME ?>images/logo.png" rel="icon">
 <!--plugin-css-->
 <link href="<?= ASSETS . THEME ?>css/bootstrap.min.css" rel="stylesheet">
 <link href="<?= ASSETS . THEME ?>css/plugin.min.css" rel="stylesheet">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&amp;family=Poppins:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
 <!-- template-style-->
 <link href="<?= ASSETS . THEME ?>css/style.css" rel="stylesheet">
 <link href="<?= ASSETS . THEME ?>css/responsive.css" rel="stylesheet">
 <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4771830666586379" crossorigin="anonymous"></script>
 
 <!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '4a5f908f667388437e181fb47d7a75dd88f6afed';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>
 
 <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-115b7c57-d214-4bc1-a4cc-d473a9548cd5"></div>
  <!-- JSON-LD Schema -->
    <script type="application/ld+json">
        <?php echo json_encode($schema, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT); ?>
    </script>
</head>
<body>
    <!--Start Preloader -->
    <div class="onloadpage" id="page_loader">
        <div class="pre-content">
            <div class="logo-pre"><img src="<?= ASSETS . THEME ?>images/logo.png" alt="Logo" class="img-fluid" /></div>
            <div class="pre-text-"><span>palmsoltechnology -  Digital solution provider  | &amp; Networking & ICT vendor</div>
            </div>
        </div>
        <!--End Preloader -->
        <!--Start Header -->
       

<!--Start Header -->
<header class="header-pr nav-bg-b main-header navfix fixed-top menu-white">
    <div class="container-fluid m-pad">
        <div class="menu-header">
            <div class="dsk-logo">
                <a class="nav-brand" href="<?= ROOT ?>home">
                    <img src="<?= ASSETS . THEME ?>images/logo.png" alt="Logo" class="mega-white-logo"/>
                    <img src="<?= ASSETS . THEME ?>images/logo.png" alt="Logo" class="mega-darks-logo"/>
                </a>
            </div>
            <div class="custom-nav" role="navigation">
                <ul class="nav-list">
                    <li ><a href="<?= ROOT ?>home" class="menu-links">Home</a></li>
                    <li><a href="<?= ROOT ?>aboutus" class="menu-links">About us</a></li>
                    <li class="sbmenu rpdropdown"><a href="#" class="menu-links">Services</a>
                        <div class="nx-dropdown menu-dorpdown">
                            <div class="sub-menu-section"><div class="sub-menu-center-block">
                                <div class="sub-menu-column smfull">
                                    <ul>
                                        <li><a href="<?= ROOT ?>webdesign">Web design & development</a></li>
                                        <li><a href="<?= ROOT ?>marketing">Digital Marketing</a></li>
                                        <li><a href="<?= ROOT ?>home">Scripting</a></li>
                                        <li><a href="<?= ROOT ?>home">VAS</a> </li>
                                        <li><a href="<?= ROOT ?>home">ICT Skills training</a></li>
                                        <li><a href="#">Networking & ICT vendor</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    </li>
                    <li><a href="<?= ROOT ?>explore" class="menu-links">Explore</a></li>
                    <li><a href="<?= ROOT ?>contact" class="menu-links">Contact us</a></li>
                    <li><a href="#" class="menu-links right-bddr">&nbsp;</a>
                    <!--menu right border-->
                    <?php if (isset($_SESSION['URL_ADDRESS'])): ?>
                        <li><a href="<?= ROOT ?>authuser/logout" class="btn-br bg-btn3 btshad-b2 lnk">Logout <span class="circle"></span></a></li>
                    <?php else: ?>
                        <li><a href="<?= ROOT ?>authuser/login" class="btn-br bg-btn3 btshad-b2 lnk">Login/Register <span class="circle"></span></a></li>
                    <?php endif; ?>

                    
                   
                </ul> 
            </div>
            <div class="mobile-menu2">
                <ul class="mob-nav2">
                    <li><a href="#" class="btn-round- trngl btn-br bg-btn btshad-b1"  data-toggle="modal" data-target="#menu-popup"><i class="fas fa-envelope-open-text"></i></a></li>
                    <li class="navm-"> <a class="toggle" href="#"><span></span></a></li>
                </ul>
            </div>
        </div>   
        <!--Mobile Menu-->
        <nav id="main-nav">
            <ul class="first-nav">
                <li><a href="<?= ROOT ?>home">Home</a>
                    
                </li>
                <li><a href="<?= ROOT ?>aboutus">About us </a>
                    
                </li>
                
                <li><a href="#">Services</a>
                    <ul>
                        <li><a href="<?= ROOT ?>webdesign">Web design & development</a></li>
                        <li><a href="<?= ROOT ?>marketing">Digital Marketing</a></li>
                        <li><a href="<?= ROOT ?>home">Scripting</a></li>
                        <li><a href="<?= ROOT ?>home">VAS</a> </li>
                        <li><a href="<?= ROOT ?>home">ICT Skills training</a></li>
                        <li><a href="#">Networking & ICT vendor</a></li>
                    </ul>
                </li>
                <li><a href="#">Contact us</a> </li> 
            </ul>
            <ul class="bottom-nav">
                <li class="prb">
                    <a href="tel:+11111111111">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 384">
                            <path d="M353.188,252.052c-23.51,0-46.594-3.677-68.469-10.906c-10.719-3.656-23.896-0.302-30.438,6.417l-43.177,32.594
                            c-50.073-26.729-80.917-57.563-107.281-107.26l31.635-42.052c8.219-8.208,11.167-20.198,7.635-31.448
                            c-7.26-21.99-10.948-45.063-10.948-68.583C132.146,13.823,118.323,0,101.333,0H30.813C13.823,0,0,13.823,0,30.813
                            C0,225.563,158.438,384,353.188,384c16.99,0,30.813-13.823,30.813-30.813v-70.323C384,265.875,370.177,252.052,353.188,252.052z"
                            />
                        </svg>
                    </a>
                </li>
                <li class="prb">
                   
                </li>
                <li class="prb">
                    <a href="skype:niwax.company?call">
                        <svg enable-background="new 0 0 24 24" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg"><path d="m23.309 14.547c1.738-7.81-5.104-14.905-13.139-13.543-4.362-2.707-10.17.352-10.17 5.542 0 1.207.333 2.337.912 3.311-1.615 7.828 5.283 14.821 13.311 13.366 5.675 3.001 11.946-2.984 9.086-8.676zm-7.638 4.71c-2.108.867-5.577.872-7.676-.227-2.993-1.596-3.525-5.189-.943-5.189 1.946 0 1.33 2.269 3.295 3.194.902.417 2.841.46 3.968-.3 1.113-.745 1.011-1.917.406-2.477-1.603-1.48-6.19-.892-8.287-3.483-.911-1.124-1.083-3.107.037-4.545 1.952-2.512 7.68-2.665 10.143-.768 2.274 1.76 1.66 4.096-.175 4.096-2.207 0-1.047-2.888-4.61-2.888-2.583 0-3.599 1.837-1.78 2.731 2.466 1.225 8.75.816 8.75 5.603-.005 1.992-1.226 3.477-3.128 4.253z"/></svg>
                    </a>
                </li>
            </ul>
        </nav>
    </div> 
</header>              
									

<!--Mobile contact-->
<div class="popup-modal1">
    <div class="modal" id="menu-popup">
        <div class="modal-dialog">
            <div class="modal-content">
                 <div class="modal-header">
                    <div class="common-heading">
                        <h4 class="mt0 mb0">Write a Message</h4>
                    </div>
                <button type="button" class="closes" data-dismiss="modal">&times;</button></div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-block fdgn2 mt10 mb10">
                        <form action="#" method="post" name="feedback-form">
                            <div class="fieldsets row">
                                <div class="col-md-12"><input type="text" placeholder="Full Name" name="name"></div>
                                <div class="col-md-12"><input type="email" placeholder="Email Address" name="email"></div>
                                <div class="col-md-12"><input type="number" placeholder="Contact Number" name="phone"></div>
                                <div class="col-md-12"><input type="text" placeholder="Subject" name="subject"></div>
                                <div class="col-md-12"><textarea placeholder="Message" name="message"></textarea></div>
                            </div>
                            <div class="fieldsets mt20 pb20">
                                <button type="submit" name="submit" class="lnk btn-main bg-btn" data-dismiss="modal">Submit <i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Mobile contact-->





