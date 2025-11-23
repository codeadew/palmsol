<!DOCTYPE html>
<html lang="en" class="no-js">


<head>
 <meta charset="utf-8"/>
 <!-- SEO Meta -->
    <title>Signup | palmsol Technology</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
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
  <!-- JSON-LD Schema -->
    <script type="application/ld+json">
        <?php echo json_encode($schema, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT); ?>
    </script>
 
 <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-115b7c57-d214-4bc1-a4cc-d473a9548cd5"></div>


</head>
<body>

  <section class="login-page pad-tb">
    <div class="v-center m-auto">
      <a href="<?= ROOT?>home" class="d-block text-center mb30">
        <img width="100" height="100" src="<?= ASSETS . THEME ?>images/logo.png" alt="Logo">
      </a>
      <div class="login-form-div">
        <h4 class="mb40 text-center">Signup</h4>
         <div id="response" style="display:block; color: green;"></div>
      <br><br><br>
        <div class="form-block">
          <form id="signup-form" method="POST">
            <div class="fieldsets row">
              <div class="col-md-6 form-group">
                <input name="firstName" type="text" placeholder="First name" required>
              </div>
              <div class="col-md-6 form-group">
                <input name="lastName" type="text" placeholder="Last name" required>
              </div>
            </div>
            <div class="fieldsets row">
              <div class="col-md-12 form-group">
                <input name="email" type="email" placeholder="Email" required>
              </div>
            </div>
            <div class="fieldsets row">
              <div class="col-md-6 form-group">
                <input name="password" type="password" placeholder="Password" required>
              </div>
              <div class="col-md-6 form-group">
                <input name="confirmPassword" type="password" placeholder="Confirm Password" required>
              </div>
            </div>
            <div class="fieldsets row mt20">
              <div class="col-md-6 form-group v-center">
                <button type="submit" class="lnk btn-main bg-btn">Submit <span class="circle"></span></button>
              </div>
              <div class="col-md-6 form-group v-center text-right">
                <a href="<?= ROOT ?>authuser/login" class="psforgt">Already have account? Login.</a>
              </div>
            </div>
          </form>
          <script src="<?= ASSETS  ?>admin_assets/js/ajax-helper.js"></script>
          <script>
              document.addEventListener('DOMContentLoaded', () => {
                  // 2. Call the reusable function with the specific form details
                  submitForm(
                      '#signup-form',        // The form ID selector
                      '#response',             // The response div ID selector
                      '<?= ROOT ?>authuser/signup'  // The PHP controller endpoint
                  );
              });
          </script>

          <!-- explicit message box used by ajax.js -->
          <div id="ajaxReport" class="mt-3 text-center"></div>
          <div id="formResponse" class="mt-3 text-center"></div>
        </div>
      </div>
    </div>
  </section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="<?= ASSETS . THEME ?>js/vendor/modernizr-3.5.0.min.js"></script>
<script src="<?= ASSETS . THEME ?>js/jquery.min.js"></script>

<script src="<?= ASSETS . THEME ?>js/bootstrap.bundle.min.js"></script>
<script src="<?= ASSETS . THEME ?>js/plugin.min.js"></script>
<!--common script file-->
<script src="<?= ASSETS . THEME ?>js/main.js"></script>


</body>
</html>

