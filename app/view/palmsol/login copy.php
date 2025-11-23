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
 


<!--Start login Form-->
    <section class="login-page pad-tb">
    <div class="v-center m-auto">
        <a href="#" class="d-block text-center mb30"><img width="100" height="100" src="<?= ASSETS . THEME ?>images/logo.png" alt="Logo" class="mega-darks-logo"></a>
        <div class="login-form-div">
            <h4 class="mb40 text-center">Login to your Account</h4>
            <div class="form-block">
                <form id="contact-form" method="post" action="#">
                    <div class="fieldsets row">
                        <div class="col-md-12 form-group">
                            <input id="form_name" type="text"  placeholder="Username" required="required">
                        </div>
                        <div class="col-md-12 form-group"><input  type="password"   placeholder="password" required="required">
                        </div>
                    </div>
                    <div class="fieldsets row mt20">
                        <div class="col-md-6 form-group v-center">
                            <button type="submit" class="lnk btn-main bg-btn">Submit <span class="circle"></span></button>
                        </div>
                        <div class="col-md-6 form-group v-center text-right"><a href="signup.php" class="psforgt">New user? Sign up.</a>     </div>
                    </div>
                    <hr class="mt30 mb30">
                    <div class="text-center">
                        <p class="mb20">or Login with:</p>
                        <div class="social-btnnxx">
                            <a href="#" class="btn-main fb-btn"><i class="fab fa-facebook-f"></i> Facebook</a>
                            <a href="#" class="btn-main google-btn"><i class="fab fa-google"></i> Google</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--End login Form-->


