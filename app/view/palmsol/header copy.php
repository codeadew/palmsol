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
        <header class="header-pr nav-bg-b main-header navfix fixed-top menu-white">
            <div class="container-fluid m-pad">
                <div class="menu-header">
                    <div class="dsk-logo"><a class="nav-brand" href="<?= ROOT ?>home">
                        <img src="<?= ASSETS . THEME ?>images/logo.png" alt="Logo" class="mega-white-logo"/>
                        <img src="<?= ASSETS . THEME ?>images/logo.png" alt="Logo" class="mega-darks-logo"/>
                    </a></div>
                    <div class="custom-nav" role="navigation">
                        <ul class="nav-list">
                            <li><a href="<?= ROOT ?>home" class="menu-links">Home</a></li>
                            <li><a href="<?= ROOT ?>aboutus" class="menu-links">About us</a></li>
                            <li class="sbmenu rpdropdown"><a href="#" class="menu-links">Services</a>
                               <div class="nx-dropdown menu-dorpdown">
                                <div class="sub-menu-section"><div class="sub-menu-center-block">
                                    <div class="sub-menu-column smfull">
                                       <ul>
                                        <a class="dropdown-item" href="<?= ROOT ?>animation">3D Solutions</a>
                                        <a class="dropdown-item" href="<?= ROOT ?>webdesign">Web design & development</a>
                                        <a class="dropdown-item" href="<?= ROOT ?>marketing">Digital Marketing</a>                                        
                                        <a class="dropdown-item" href="<?= ROOT ?>home">ICT & Networking vendor</a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li> 
                <li><a href="<?= ROOT ?>contact" class="menu-links">Contact us</a></li>  
        <li><a href="#" class="menu-links right-bddr">&nbsp;</a>
            <!--menu right border-->
            <li class="contact-show"><a href="#" class="btn-round- trngl btn-br bg-btn"><i class="fas fa-phone-alt"></i></a>
                <div class="contact-inquiry">
                    <div class="contact-info-">
                        <div class="contct-heading">Pamsoltechnology Contacts</div>
                        <div class="inquiry-card-nn hrbg">
                            <div class="title-inq-c">Chat Support</div>
                            <ul><li class="mb0"><a href="tel:+2348164203793" >2348164203793</a></li></ul>
                        </div>
                        
                    </div>
                </li>
                <li><a href="<?= ROOT ?>contact" class="btn-br bg-btn3 btshad-b2 lnk">Request A Quote <span class="circle"></span></a> </li>
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
            <li><a href="<?= ROOT ?>about">About us</a>
            </li>
            <li><a href="#">Our products</a>
                <ul>
                <li><a href="<?= ROOT ?>animatio">3D Solutions</a></li>
                    <li><a href="<?= ROOT ?>webdesign">Web design & development</a></li>
                    <li><a href="<?= ROOT ?>marketing">Digital Marketing</a></li>
                    <li><a href="<?= ROOT ?>home">Scripting</a></li>
                    <li><a href="<?= ROOT ?>home">VAS</a> </li>
                    <li><a href="<?= ROOT ?>home">ICT Skills training</a></li>
                    <li><a href="#">Networking & ICT vendor</a></li>
                </ul>
            <li><a href="<?= ROOT ?>contact">Contact us</a>
            </li>
        <ul class="bottom-nav">
            <li class="prb">
                <a href="tel:+2348164203793">
                    <svg xmlns="" viewBox="0 0 384 384">
                        <path d="M353.188,252.052c-23.51,0-46.594-3.677-68.469-10.906c-10.719-3.656-23.896-0.302-30.438,6.417l-43.177,32.594
                        c-50.073-26.729-80.917-57.563-107.281-107.26l31.635-42.052c8.219-8.208,11.167-20.198,7.635-31.448
                        c-7.26-21.99-10.948-45.063-10.948-68.583C132.146,13.823,118.323,0,101.333,0H30.813C13.823,0,0,13.823,0,30.813
                        C0,225.563,158.438,384,353.188,384c16.99,0,30.813-13.823,30.813-30.813v-70.323C384,265.875,370.177,252.052,353.188,252.052z"
                        />
                    </svg>
                </a>
            </li>
            <li class="prb">
                <a href="mailto:info@palmsolechnology.com">
                    <svg xmlns="" width="24" height="24" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
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
<!--End Header -->





