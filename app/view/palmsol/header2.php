<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8"/>
	<title><?php echo $page_title; ?></title>
    <meta name="description" content="<?php echo $meta_description; ?>">
    <meta name="keywords" content="<?php echo $meta_keywords; ?>">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!--website-favicon-->
	<link href="<?= ASSETS . THEME ?>images/favicon.png" rel="icon">
	<!--plugin-css-->
	<link href="<?= ASSETS . THEME ?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= ASSETS . THEME ?>css/plugin.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&amp;family=Poppins:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
	<!-- template-style-->
	<link href="<?= ASSETS . THEME ?>css/style.css" rel="stylesheet">
	<link href="<?= ASSETS . THEME ?>css/responsive.css" rel="stylesheet">
</head>
<body>
	<!--Start Header -->
	
<header class="top-header header-pr ">
  <nav class="navbar navbar-expand-lg navbar-light justify-content-right navbar-mobile fixed-top navfix">
    <div class="container">
      <a class="navbar-brand" href="index.php"> <img src="<?= ASSETS . THEME ?>images/logo.gif" alt="Logo" width="100" /></a>
      <button class="navbar-toggler mobile-none" type="button" data-toggle="collapse" data-target="#navbar4" aria-controls="navbar4" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse animate slideIn mobile-none" id="navbar4">
        <ul class="mr-auto"></ul>
        <ul class="navbar-nav d-menu">
          <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>home">Home </a> </li>
         <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>aboutus">About us</a> </li>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="Services" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Our products</a>
          <div class="dropdown-menu animate slideIn" aria-labelledby="Services">
            <a class="dropdown-item" href="<?= ROOT ?>Animation">3D & 2D Animation</a>
            
             <a class="dropdown-item" href="<?= ROOT ?>home">Web design & development</a>
             <a class="dropdown-item" href="<?= ROOT ?>marketing">Digital Marketing</a>
            
             <a class="dropdown-item" href="<?= ROOT ?>home">VAS</a>
             
             <a class="dropdown-item" href="<?= ROOT ?>home">Networking & ICT vendor</a>
          </div>
        </li>
         <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>contact">Contact us</a> </li>
       
        <li class="nav-item"> <a class="nav-link custom-btn lnk btn-main bg-btn" href="contact.php">Get A Quote <span class="circle"></span></a> </li>
      </ul>
    </div>
    <div class="mobile-menu">
      <ul class="mob-nav">
        <li> <a class="custom-btn lnk btn-main bg-btn" href="contact.php">Get A Quote<span class="circle"></span></a></li>
        <li class="ml8"><a class="toggle mobilemenu" href="#"><span></span></a> </li>
      </ul>
    </div>
  </div>
</nav>
<!--Mobile Menu-->
<nav id="main-nav">
        <ul class="first-nav">
            <li><a href="index.php">Home</a>
            </li>
            <li><a href="about.php">About us</a>
            </li>
            <li><a href="#">Our products</a>
                <ul>
                    <li><a href="<?= ROOT ?>animation">3D Rendering</a></li>
                    <li><a href="<?= ROOT ?>home">Web design & development</a></li>
                    <li><a href="<?= ROOT ?>marketing">Digital Marketing</a></li>
                    
                    <li><a href="<?= ROOT ?>home">VAS</a> </li>
                   
                    <li><a href="<?= ROOT ?>home">Networking & ICT vendor</a></li>
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
