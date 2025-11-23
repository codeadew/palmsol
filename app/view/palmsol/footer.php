<footer class="ftshap">
    <div class="footer-row1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="email-subs">
                        <h3>Get New Insights Weekly</h3>
                        <p>Don't want to miss anything palmsoltechnology, Enter your email</p>
                    </div>
                </div>
                <div class="col-lg-6 v-center">
                    <div class="email-subs-form">
                        <form>
                            <input type="email" placeholder="Email Your Address" name="emails">
                            <button type="submit" name="submit" class="lnk btn-main bg-btn">Subscribe <i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-svg">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 1920 80" style="enable-background:new 0 0 1920 80;" xml:space="preserve">
<path class="st0" d="M0,27.2c589.2,129.4,1044-69,1920,31v-60H3.2L0,27.2z"/>
</svg>
    </div>
    <div class="footer-row2">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <h5>Contact Us</h5>
                    <ul class="footer-address-list ftr-details">
                        <li>
                            <span><i class="fas fa-envelope"></i></span>
                            <p>Email <span> <a href="mailto:info@palmsoltechnology.com">info@palmsoltechnology.com</a></span></p>
                        </li>
                        <li>
                            <span><i class="fas fa-phone-alt"></i></span>
                            <p>Phone <span> <a href="tel:+2349031499108">(+234) 9031499108</a></span></p>
                        </li>
                        <li>
                            <span><i class="fas fa-map-marker-alt"></i></span>
                            <p>Address <span> 13D Kenneth Agbakuru Street, Lekki Phase 1, Lagos,Nigeria</span></p>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6">
                <h5>Company</h5>
                <ul class="footer-address-list link-hover">
                    <li><a href="<?= ROOT ?>home">Home</a></li>
                    <li><a href="<?= ROOT ?>aboutus">About us</a></li>
                    <li><a href="<?= ROOT ?>contact">Contact reach us</a></li>
                    <li><a href="<?= ROOT ?>explore">Explore</a></li>
                   <?php if (isset($_SESSION['USER_TYPE']) && $_SESSION['USER_TYPE'] == 'super_admin'): ?>
                        <li><a href="<?= ROOT ?>manager">Management</a></li>
                   <?php endif; ?>
                </ul>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <h5>Service</h5>
                    <ul class="footer-address-list link-hover">
                        <li><a href="3d.php">3D rendering</a></li>
                        <li><a href="web.php">Website Development</a></li>
                        <li><a href="digital.php">Digital marketing</a></li>
                        <li><a href="javascript:void(0)">Search Engine Optimization</a></li>
                        <li><a href="javascript:void(0)">Pay-Per-Click</a></li>
                        <li><a href="javascript:void(0)">Social Media Marketing</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <h5>Support</h5>
                    <ul class="footer-address-list link-hover">
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="javascript:void(0)">Privacy Policy</a></li>
                        <li><a href="javascript:void(0)">Sitemap</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <hr class="hline">
    <div class="footer-row3">
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-social-media-icons">
                            <a href="javascript:void(0)" target="blank"><i class="fab fa-facebook"></i></a>
                            <a href="javascript:void(0)" target="blank"><i class="fab fa-twitter"></i></a>
                            <a href="javascript:void(0)" target="blank"><i class="fab fa-instagram"></i></a>
                            <a href="javascript:void(0)" target="blank"><i class="fab fa-linkedin"></i></a>
                            <a href="javascript:void(0)" target="blank"><i class="fab fa-youtube"></i></a>
                        </div>
                        <div class="footer-">
                            <p>Copyright &copy; <?= date("Y");?> palmsol technology. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </footer>
    <!--End Footer-->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?= ASSETS . THEME ?>/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="<?= ASSETS . THEME ?>/js/jquery.min.js"></script>
    <script src="<?= ASSETS . THEME ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?= ASSETS . THEME ?>/js/plugin.min.js"></script>
    <script src="<?= ASSETS . THEME ?>/js/preloader.js"></script>
    <!--common script file-->
    <script src="<?= ASSETS . THEME ?>/js/main.js"></script>
    </body>
</html>
