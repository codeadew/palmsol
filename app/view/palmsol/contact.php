
		<!--End Header -->
		<!--Breadcrumb Area-->
		<section class="breadcrumb-area banner-6">
			<div class="text-block">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 v-center">
							<div class="bread-inner">
								<div class="bread-menu wow fadeInUp" data-wow-delay=".2s">
									<ul>
										<li><a href="index-2.html">Home</a></li>
										<li><a href="#">Contact</a></li>
									</ul>
								</div>
								<div class="bread-title wow fadeInUp" data-wow-delay=".5s">
									<h2>Contact</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--End Breadcrumb Area-->
		<!--Start Enquire Form-->
		<section class="contact-page pad-tb">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 v-center">
						<div class="common-heading text-l">
							<span>Contact Now</span>
							<h2 class="mt0 mb0">Have Question? Write a Message</h2>
							<p class="mb60 mt20">We will catch you as early as we receive the message</p>
						</div>
						<div class="form-block">
							<form id="contactForm" data-toggle="validator" class="shake">
								<div class="row">
									<div class="form-group col-sm-6">
										<input type="text"  id="name" placeholder="Enter name" required data-error="Please fill Out">
										<div class="help-block with-errors"></div>
									</div>
									<div class="form-group col-sm-6">
										<input type="email"  id="email" placeholder="Enter email" required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-sm-6">
										<input type="text" id="mobile" placeholder="Enter mobile" required data-error="Please fill Out">
										<div class="help-block with-errors"></div>
									</div>
									<div class="form-group col-sm-6">
										<select name="Dtype" id="Dtype" required>
											<option value="">Select Requirement</option>
											<option value="web">web</option>
											<option value="graphic">graphic</option>
											<option value="video">video</option>
										</select>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<textarea id="message" rows="5" placeholder="Enter your message" required></textarea>
									<div class="help-block with-errors"></div>
								</div>
								<button type="submit" id="form-submit" class="btn lnk btn-main bg-btn">Submit <span class="circle"></span>Submit</button>
								<div id="msgSubmit" class="h3 text-center hidden"></div>
								<div class="clearfix"></div>
							</form>
									</div>
								</div>
								<div class="col-lg-5 v-center">
									<div class="contact-details">
										<div class="contact-card wow fadeIn" data-wow-delay=".2s">
											<div class="info-card v-center">
												<span><i class="fas fa-phone-alt"></i> Phone:</span>
												<div class="info-body">
													<p>Assistance hours: Monday – Friday, 9 am to 5 pm</p>
													<a href="tel:+2349031499108">(+234) 9031499108</a>
												</div>
											</div>
										</div>
										<div class="email-card mt30 wow fadeIn" data-wow-delay=".5s">
											<div class="info-card v-center">
												<span><i class="fas fa-envelope"></i> Email:</span>
												<div class="info-body">
													<p>Our support team will get back to in 24-h during standard business hours.</p>
													<a href="mailto:info@businessname.com">info@palmsoltechnology.com</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
					<!--End Enquire Form-->
					<!--Start Location-->
					<section class="our-office pad-tb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="common-heading">
                    <span>Our Locations</span>
                    <h2>Our office</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center upset shape-numm">
            <div class="col-lg-4 col-sm-6 shape-loc wow fadeInUp" data-wow-delay=".2s">
                <div class="office-card">
                    <div class="skyline-img" data-tilt data-tilt-max="4" data-tilt-speed="1000">
                        <img src="<?= ASSETS . THEME ?>images/location/newyork.png" alt="New York" class="img-fluid" />
                    </div>
                    <div class="office-text">
                        <h4>lagos island</h4>
                        <p>13D Kenneth Agbakuru Street, Lekki Phase 1, Lagos State</p>
                        <a href="javascript:void(0)" target="blank" class="btn-outline">View on Map <i class="fas fa-chevron-right fa-icon"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 shape-loc wow fadeInUp" data-wow-delay=".4s">
                <div class="office-card">
                    <div class="skyline-img" data-tilt data-tilt-max="4" data-tilt-speed="1000">
                        <img src="<?= ASSETS . THEME ?>images/location/sydeny.png" alt="sydney" class="img-fluid" />
                    </div>
                    <div class="office-text">
                        <h4>Lagos mainland</h4>
                        <p>23 Harmony Crescent Street, New London Estate, Baruwa, lagos</p>
                        <a href="javascript:void(0)" target="blank" class="btn-outline">View on Map <i class="fas fa-chevron-right fa-icon"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
					<!--End Location-->
					<!--Start Footer-->
					<?php include "footer.php"; ?>
					<!--End Footer-->
					
					
					<!-- js placed at the end of the document so the pages load faster -->
					<script src="js/vendor/modernizr-3.5.0.min.js"></script>
					<script src="js/jquery.min.js"></script>
					<script src="js/validator.min.js"></script>
					<script src="js/form.js"></script>
					<script src="js/bootstrap.bundle.min.js"></script> 
					<script src="js/plugin.min.js"></script>
					<!--common script file-->
					<script src="js/main.js"></script>
				</body>
				
<!-- Mirrored from rajeshdoot.com/Palmsoltechnology-demos/html/get-quote.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Mar 2021 13:37:41 GMT -->
</html>

