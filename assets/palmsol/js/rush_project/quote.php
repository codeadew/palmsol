<?php
require_once('resources/config.php'); ?>
<?php include(TEMPLATE_FRONT.DS."header.php");?> 
<?PHP 

if(isset($_POST['request'])){
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $sex = mysqli_real_escape_string($conn, $_POST['sex']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
   $query_to_save_request = "INSERT INTO `flights`.`quote` (`fname`, `lname`, `email`, `phone`, `sex`, `country`, `message`) VALUES ('$first_name', '$last_name', '$email', '$phone', '$sex', '$country', '$message')";
   $save_request= send_query ($conn,$query_to_save_request);
   confirm ($save_request);

  
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
  
require 'vendor/autoload.php';
  // Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
  //Server settings
  $mail->isSMTP();
  $mail->Host = 'smtp.example.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'your-email@example.com';
  $mail->Password = 'your-email-password';
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;

  //Recipients
  $mail->setFrom($email, $name);
  $mail->addAddress('your-email@example.com');

  //Content
  $mail->isHTML(true);
  $mail->Subject = 'New Contact Form Submission';
  $mail->Body    = 'Name: ' . $name . '<br>Email: ' . $email . '<br>Message: ' . $message;

  $mail->send();
  echo 'Message sent!';
} catch (Exception $e) {
  echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
}

}
?>

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

    <!-- Common Banner Area -->
    <section id="common_banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h2>Contact</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span><i class="fas fa-circle"></i></span>Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Area -->
    <section id="contact_main_arae" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section_heading_center">
                        <h2>QUOTATION FORM</h2>
                    </div>
                </div>
            </div>
         
            <div class="contact_main_form_area">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="section_heading_center">
                            <h2>Fill this form to request your quote</h2>
                        </div>
                        <div class="contact_form">
                            <form action="" method="POST" id="contact_form_content">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control bg_input" name="first_name" placeholder="First name*">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control bg_input" name="last_name" placeholder="Last name*">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control bg_input" name="email"
                                                placeholder="Email address (Optional)">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control bg_input" name="phone"
                                                placeholder="Mobile number*">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            
                                                <select name="sex"  class="form-control bg_input">
                                                    <option value="">Sex</option>
                                                    <option value="Male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="Male">Others</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            
                                                <select name="country"  class="form-control bg_input"placeholder="Country*">
                                                    <option value="">Select Country</option>
                                                    <option value="AF">Afghanistan"</option>
                                                    <option value="AL">Albania"</option>
                                                    <option value="DZ">Algeria"</option>
                                                    <option value="AS">American Samoa"</option>
                                                    <option value="AD">Andorra"</option>
                                                    <option value="AO">Angola" </option>
                                                    <option value="AI">Anguilla" </option>
                                                    <option value="AQ">Antarctica"</option>
                                                    <option value="AG">Antigua And Barbuda"</option>
                                                    <option value="AR">Argentina"</option>
                                                    <option value="AM">Armenia"</option>
                                                    <option value="AW">Aruba"  </option>
                                                    <option value="AU">Australia"</option>
                                                    <option value="AT">Austria"</option>
                                                    <option value="AZ">Azerbaijan"</option>
                                                    <option value="BS">Bahamas The" </option>
                                                    <option value="BH">Bahrain"</option>
                                                    <option value="BD">Bangladesh"</option>
                                                    <option value="BB">Barbados" </option>
                                                    <option value="BY">Belarus"</option>
                                                    <option value="BE">Belgium"</option>
                                                    <option value="BZ">Belize" </option>
                                                    <option value="BJ">Benin"  </option>
                                                    <option value="BM">Bermuda"</option>
                                                    <option value="BT">Bhutan" </option>
                                                    <option value="BO">Bolivia"</option>
                                                    <option value="BA">Bosnia and Herzegovina"</option>
                                                    <option value="BW">Botswana" </option>
                                                    <option value="BV">Bouvet Island" </option>
                                                    <option value="BR">Brazil" </option>
                                                    <option value="IO">British Indian Ocean Territory</option>
                                                    <option value="BN">Brunei" </option>
                                                    <option value="BG">Bulgaria" </option>
                                                    <option value="BF">Burkina Faso"</option>
                                                    <option value="BI">Burundi"</option>
                                                    <option value="KH">Cambodia" </option>
                                                    <option value="CM">Cameroon" </option>
                                                    <option value="CA">Canada" </option>
                                                    <option value="CV">Cape Verde"</option>
                                                    <option value="KY">Cayman Islands"</option>
                                                    <option value="CF">Central African Republic"</option>
                                                    <option value="TD">Chad"   </option>
                                                    <option value="CL">Chile"  </option>
                                                    <option value="CN">China"  </option>
                                                    <option value="CX">Christmas Island"   </option>
                                                    <option value="CC">Cocos (Keeling) Islands" </option>
                                                    <option value="CO">Colombia" </option>
                                                    <option value="KM">Comoros"</option>
                                                    <option value="CG">Republic Of The Congo" </option>
                                                    <option value="CD">Democratic Republic Of The Congo       </option>
                                                    <option value="CK">Cook Islands"</option>
                                                    <option value="CR">Costa Rica"</option>
                                                    <option value="CI">Cote D'Ivoire (Ivory Coast)            </option>
                                                    <option value="HR">Croatia (Hrvatska)" </option>
                                                    <option value="CU">Cuba"   </option>
                                                    <option value="CY">Cyprus" </option>
                                                    <option value="CZ">Czech Republic"</option>
                                                    <option value="DK">Denmark"</option>
                                                    <option value="DJ">Djibouti" </option>
                                                    <option value="DM">Dominica" </option>
                                                    <option value="DO">Dominican Republic" </option>
                                                    <option value="TP">East Timor"</option>
                                                    <option value="EC">Ecuador"</option>
                                                    <option value="EG">Egypt"  </option>
                                                    <option value="SV">El Salvador" </option>
                                                    <option value="GQ">Equatorial Guinea"  </option>
                                                    <option value="ER">Eritrea"</option>
                                                    <option value="EE">Estonia"</option>
                                                    <option value="ET">Ethiopia" </option>
                                                    <option value="XA">External Territories of Australia      </option>
                                                    <option value="FK">Falkland Islands"   </option>
                                                    <option value="FO">Faroe Islands" </option>
                                                    <option value="FJ">Fiji Islands"</option>
                                                    <option value="FI">Finland"</option>
                                                    <option value="FR">France" </option>
                                                    <option value="GF">French Guiana" </option>
                                                    <option value="PF">French Polynesia"   </option>
                                                    <option value="TF">French Southern Territories            </option>
                                                    <option value="GA">Gabon"  </option>
                                                    <option value="GM">Gambia The"</option>
                                                    <option value="GE">Georgia"</option>
                                                    <option value="DE">Germany"</option>
                                                    <option value="GH">Ghana"  </option>
                                                    <option value="GI">Gibraltar"</option>
                                                    <option value="GR">Greece" </option>
                                                    <option value="GL">Greenland"</option>
                                                    <option value="GD">Grenada"</option>
                                                    <option value="GP">Guadeloupe"</option>
                                                    <option value="GU">Guam"   </option>
                                                    <option value="GT">Guatemala"</option>
                                                    <option value="XU">Guernsey and Alderney" </option>
                                                    <option value="GN">Guinea" </option>
                                                    <option value="GW">Guinea-Bissau" </option>
                                                    <option value="GY">Guyana" </option>
                                                    <option value="HT">Haiti"  </option>
                                                    <option value="HM">Heard and McDonald Islands             </option>
                                                    <option value="HN">Honduras" </option>
                                                    <option value="HK">Hong Kong S.A.R."   </option>
                                                    <option value="HU">Hungary"</option>
                                                    <option value="IS">Iceland"</option>
                                                    <option value="IN">India"  </option>
                                                    <option value="ID">Indonesia"</option>
                                                    <option value="IR">Iran"   </option>
                                                    <option value="IQ">Iraq"   </option>
                                                    <option value="IE">Ireland"</option>
                                                    <option value="IL">Israel" </option>
                                                    <option value="IT">Italy"  </option>
                                                    <option value="JM">Jamaica"</option>
                                                    <option value="JP">Japan"  </option>
                                                    <option value="XJ">Jersey" </option>
                                                    <option value="JO">Jordan" </option>
                                                    <option value="KZ">Kazakhstan"</option>
                                                    <option value="KE">Kenya"  </option>
                                                    <option value="KI">Kiribati" </option>
                                                    <option value="KP">Korea North" </option>
                                                    <option value="KR">Korea South" </option>
                                                    <option value="KW">Kuwait" </option>
                                                    <option value="KG">Kyrgyzstan"</option>
                                                    <option value="LA">Laos"   </option>
                                                    <option value="LV">Latvia" </option>
                                                    <option value="LB">Lebanon"</option>
                                                    <option value="LS">Lesotho"</option>
                                                    <option value="LR">Liberia"</option>
                                                    <option value="LY">Libya"  </option>
                                                    <option value="LI">Liechtenstein" </option>
                                                    <option value="LT">Lithuania"</option>
                                                    <option value="LU">Luxembourg"</option>
                                                    <option value="MO">Macau S.A.R."</option>
                                                    <option value="MK">Macedonia"</option>
                                                    <option value="MG">Madagascar"</option>
                                                    <option value="MW">Malawi" </option>
                                                    <option value="MY">Malaysia" </option>
                                                    <option value="MV">Maldives" </option>
                                                    <option value="ML">Mali"   </option>
                                                    <option value="MT">Malta"  </option>
                                                    <option value="XM">Man (Isle of)" </option>
                                                    <option value="MH">Marshall Islands"   </option>
                                                    <option value="MQ">Martinique"</option>
                                                    <option value="MR">Mauritania"</option>
                                                    <option value="MU">Mauritius"</option>
                                                    <option value="YT">Mayotte"</option>
                                                    <option value="MX">Mexico" </option>
                                                    <option value="FM">Micronesia"</option>
                                                    <option value="MD">Moldova"</option>
                                                    <option value="MC">Monaco" </option>
                                                    <option value="MN">Mongolia" </option>
                                                    <option value="MS">Montserrat"</option>
                                                    <option value="MA">Morocco"</option>
                                                    <option value="MZ">Mozambique"</option>
                                                    <option value="MM">Myanmar"</option>
                                                    <option value="NA">Namibia"</option>
                                                    <option value="NR">Nauru"  </option>
                                                    <option value="NP">Nepal"  </option>
                                                    <option value="AN">Netherlands Antilles"  </option>
                                                    <option value="NL">Netherlands The"    </option>
                                                    <option value="NC">New Caledonia" </option>
                                                    <option value="NZ">New Zealand" </option>
                                                    <option value="NI">Nicaragua"</option>
                                                    <option value="NE">Niger"  </option>
                                                    <option value="NG">Nigeria"</option>
                                                    <option value="NU">Niue"   </option>
                                                    <option value="NF">Norfolk Island"</option>
                                                    <option value="MP">Northern Mariana Islands"</option>
                                                    <option value="NO">Norway" </option>
                                                    <option value="OM">Oman"   </option>
                                                    <option value="PK">Pakistan" </option>
                                                    <option value="PW">Palau"  </option>
                                                    <option value="PS">Palestinian Territory Occupied         </option>
                                                    <option value="PA">Panama" </option>
                                                    <option value="PG">Papua new Guinea"   </option>
                                                    <option value="PY">Paraguay" </option>
                                                    <option value="PE">Peru"   </option>
                                                    <option value="PH">Philippines" </option>
                                                    <option value="PN">Pitcairn Island"    </option>
                                                    <option value="PL">Poland" </option>
                                                    <option value="PT">Portugal" </option>
                                                    <option value="PR">Puerto Rico" </option>
                                                    <option value="QA">Qatar"  </option>
                                                    <option value="RE">Reunion"</option>
                                                    <option value="RO">Romania"</option>
                                                    <option value="RU">Russia" </option>
                                                    <option value="RW">Rwanda" </option>
                                                    <option value="SH">Saint Helena"</option>
                                                    <option value="KN">Saint Kitts And Nevis" </option>
                                                    <option value="LC">Saint Lucia" </option>
                                                    <option value="PM">Saint Pierre and Miquelon              </option>
                                                    <option value="VC">Saint Vincent And The Grenadines       </option>
                                                    <option value="WS">Samoa"  </option>
                                                    <option value="SM">San Marino"</option>
                                                    <option value="ST">Sao Tome and Principe" </option>
                                                    <option value="SA">Saudi Arabia"</option>
                                                    <option value="SN">Senegal"</option>
                                                    <option value="RS">Serbia" </option>
                                                    <option value="SC">Seychelles"</option>
                                                    <option value="SL">Sierra Leone"</option>
                                                    <option value="SG">Singapore"</option>
                                                    <option value="SK">Slovakia" </option>
                                                    <option value="SI">Slovenia" </option>
                                                    <option value="XG">Smaller Territories of the UK          </option>
                                                    <option value="SB">Solomon Islands"    </option>
                                                    <option value="SO">Somalia"</option>
                                                    <option value="ZA">South Africa"</option>
                                                    <option value="GS">South Georgia" </option>
                                                    <option value="SS">South Sudan" </option>
                                                    <option value="ES">Spain"  </option>
                                                    <option value="LK">Sri Lanka"</option>
                                                    <option value="SD">Sudan"  </option>
                                                    <option value="SR">Suriname" </option>
                                                    <option value="SJ">Svalbard And Jan Mayen Islands         </option>
                                                    <option value="SZ">Swaziland"</option>
                                                    <option value="SE">Sweden" </option>
                                                    <option value="CH">Switzerland" </option>
                                                    <option value="SY">Syria"  </option>
                                                    <option value="TW">Taiwan" </option>
                                                    <option value="TJ">Tajikistan"</option>
                                                    <option value="TZ">Tanzania" </option>
                                                    <option value="TH">Thailand" </option>
                                                    <option value="TG">Togo"   </option>
                                                    <option value="TK">Tokelau"</option>
                                                    <option value="TO">Tonga"  </option>
                                                    <option value="TT">Trinidad And Tobago"</option>
                                                    <option value="TN">Tunisia"</option>
                                                    <option value="TR">Turkey" </option>
                                                    <option value="TM">Turkmenistan"</option>
                                                    <option value="TC">Turks And Caicos Islands"</option>
                                                    <option value="TV">Tuvalu" </option>
                                                    <option value="UG">Uganda" </option>
                                                    <option value="UA">Ukraine"</option>
                                                    <option value="AE">United Arab Emirates"  </option>
                                                    <option value="GB">United Kingdom"</option>
                                                    <option value="US">United States" </option>
                                                    <option value="UM">United States Minor Outlying Islands   </option>
                                                    <option value="UY">Uruguay"</option>
                                                    <option value="UZ">Uzbekistan"</option>
                                                    <option value="VU">Vanuatu"</option>
                                                    <option value="VA">Vatican City State (Holy See)          </option>
                                                    <option value="VE">Venezuela"</option>
                                                    <option value="VN">Vietnam"</option>
                                                    <option value="VG">Virgin Islands (British)"</option>
                                                    <option value="VI">Virgin Islands (US)"</option>
                                                    <option value="WF">Wallis And Futuna Islands              </option>
                                                    <option value="EH">Western Sahara"</option>
                                                    <option value="YE">Yemen"  </option>
                                                    <option value="YU">Yugoslavia"</option>
                                                    <option value="ZM">Zambia" </option>
                                                    <option value="ZW">   Zimbabwe </option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control bg_input" rows="5" name="message"
                                                placeholder="Briefly tell us about your needs"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div style="text-align: center;">
                                        <button type="submit" name="request" style="background-color: #8B3EEA; color: #FFFFFF; border-radius: 5px; border: none; padding: 10px 20px; font-size: 16px;">Submi</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cta Area -->
    <section id="cta_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="cta_left">
                        <div class="cta_icon">
                            <img src="assets/img/common/email.png" alt="icon">
                        </div>
                        <div class="cta_content">
                            <h4>Get the latest news and offers</h4>
                            <h2>Subscribe to our newsletter</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="cat_form">
                        <form id="cta_form_wrappper">
                            <div class="input-group"><input type="text" class="form-control"
                                    placeholder="Enter your mail address"><button class="btn btn_theme btn_md"
                                    type="button">Subscribe</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="footer_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="footer_heading_area">
                        <h5>Need any help?</h5>
                    </div>
                    <div class="footer_first_area">
                        <div class="footer_inquery_area">
                            <h5>Call 24/7 for any help</h5>
                            <h3> <a href="tel:+00-123-456-789">+00 123 456 789</a></h3>
                        </div>
                        <div class="footer_inquery_area">
                            <h5>Mail to our support team</h5>
                            <h3> <a href="mailto:support@domain.com">support@domain.com</a></h3>
                        </div>
                        <div class="footer_inquery_area">
                            <h5>Follow us on</h5>
                            <ul class="soical_icon_footer">
                                <li><a href="#!"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#!"><i class="fab fa-twitter-square"></i></a></li>
                                <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#!"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-6 col-sm-6 col-12">
                    <div class="footer_heading_area">
                        <h5>Company</h5>
                    </div>
                    <div class="footer_link_area">
                        <ul>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="testimonials.html">Testimonials</a></li>
                            <li><a href="faqs.html">Rewards</a></li>
                            <li><a href="terms-service.html">Work with Us</a></li>
                            <li><a href="tour-guides.html">Meet the Team </a></li>
                            <li><a href="news.html">Blog</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <div class="footer_heading_area">
                        <h5>Support</h5>
                    </div>
                    <div class="footer_link_area">
                        <ul>
                            <li><a href="dashboard.html">Account</a></li>
                            <li><a href="faq.html">Faq</a></li>
                            <li><a href="testimonials.html">Legal</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="top-destinations.html"> Affiliate Program</a></li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <div class="footer_heading_area">
                        <h5>Other Services</h5>
                    </div>
                    <div class="footer_link_area">
                        <ul>
                            <li><a href="top-destinations-details.html">Community program</a></li>
                            <li><a href="top-destinations-details.html">Investor Relations</a></li>
                            <li><a href="flight-search-result.html">Rewards Program</a></li>
                            <li><a href="room-booking.html">PointsPLUS</a></li>
                            <li><a href="testimonials.html">Partners</a></li>
                            <li><a href="hotel-search.html">List My Hotel</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <div class="footer_heading_area">
                        <h5>Top cities</h5>
                    </div>
                    <div class="footer_link_area">
                        <ul>
                            <li><a href="room-details.html">Chicago</a></li>
                            <li><a href="hotel-details.html">New York</a></li>
                            <li><a href="hotel-booking.html">San Francisco</a></li>
                            <li><a href="tour-search.html">California</a></li>
                            <li><a href="tour-booking.html">Ohio </a></li>
                            <li><a href="tour-guides.html">Alaska</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="copyright_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="co-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="copyright_left">
                        <p>Copyright © 2022 All Rights Reserved</p>
                    </div>
                </div>
                <div class="co-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="copyright_right">
                        <img src="assets/img/common/cards.png" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="go-top">
        <i class="fas fa-chevron-up"></i>
        <i class="fas fa-chevron-up"></i>
    </div>

    <!-- Map Modal -->
    <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-body map_modal_content">
                    <div class="btn_modal_closed">
                        <button type="button" data-bs-dismiss="modal" aria-label="Close"><i
                                class="fas fa-times"></i></button>
                    </div>
                    <div class="map_area">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3677.6962663570607!2d89.56355961427838!3d22.813715829827952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff901efac79b59%3A0x5be01a1bc0dc7eba!2sAnd+IT!5e0!3m2!1sen!2sbd!4v1557901943656!5m2!1sen!2sbd"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap js -->
    <script src="assets/js/bootstrap.bundle.js"></script>
    <!-- Meanu js -->
    <script src="assets/js/jquery.meanmenu.js"></script>
    <!-- owl carousel js -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- wow.js -->
    <script src="assets/js/wow.min.js"></script>
    <!-- Custom js -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/add-form.js"></script>

 

   
</body>


</html>