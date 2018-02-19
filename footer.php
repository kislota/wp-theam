<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$tpl_dir = get_template_directory_uri().'/assets';
?>

<!--</div> #content -->
</div><!-- #page -->
<!-- Start Footer Top Area -->
<div class="footer_top_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="footer_widgets">
                    <h2>Contact us</h2>
                    <ul>
                        <li>
                            <span class="footer_icon"><img src="<?php echo $tpl_dir;?>/images/icon_pin.svg" alt=""></span>
                            <span class="footer_text">2 60 Colney Hatch lane, <br />London N10 1BD</span>
                        </li>
                        <li>
                            <span class="footer_icon"><img src="<?php echo $tpl_dir;?>/images/icon_phone.svg" alt=""></span>
                            <span class="footer_text phone_num">0203 609 3000 </span>
                        </li>
                        <li>
                            <span class="footer_icon"><img src="<?php echo $tpl_dir;?>/images/icon_mail.svg" alt=""></span>
                            <span class="footer_text"><a href="mailto:support@the-oak.net">support@the-oak.net</a></span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="footer_widgets">
                    <h2>Opening Time</h2>
                    <ul>
                        <li>
                            <span class="footer_icon"><img src="<?php echo $tpl_dir;?>/images/icon_time.svg" alt=""></span>
                            <span class="footer_text"><p>The oak</p> Today from 11AM to 2AM</span>
                        </li>
                        <li>
                            <span class="footer_icon"><img src="<?php echo $tpl_dir;?>/images/icon_calendar.svg" alt=""></span>
                            <span class="footer_text"><p class="day">Monday -  Friday</p>16PM to 11PM</span>
                        </li>
                        <li>
                            <span class="footer_icon"><img src="<?php echo $tpl_dir;?>/images/icon_calendar.svg" alt=""></span>
                            <span class="footer_text"><p class="day">Saturday - Sunday</p> 12PM to 11PM</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="footer_widgets">
                    <h2>Service Areas</h2>
                    <div class="carousel_list">

                        <div class="single_list">
                            <ul>
                                <li>N2</li>
                                <li>N3</li>
                                <li>N4</li>
                                <li>N6</li>
                                <li>N8</li>
                                <li>N10</li>
                                <li>N11</li>
                                <li>N12</li>
                                <li>N13</li>
                                <li>N14</li>
                                <li>N18</li>
                                <li>N20</li>
                            </ul>
                        </div>

                        <div class="single_list">
                            <ul>
                                <li>N21</li>
                                <li>N22</li>
                                <li>NW7</li>
                                <li>NW4</li>
                                <li>NW11</li>
                                <li>EN4</li>
                                <li>EN5</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / End Footer Top Area -->
<div class="footer_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 hidden-xs">
                <div class="footer_left">
                    <img class="mastercard" src="<?php echo $tpl_dir;?>/images/icon_mastercard_gray.svg" alt="">
                    <img class="visa" src="<?php echo $tpl_dir;?>/images/icon_visa_gray.svg" alt="">
                    <p>All Rights Reserved. &copy; Company Name, 2016</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <ul class="footer_menu">
                    <li><a href="/privacy">Privacy Policy</a></li>
                    <li><a href="/terms-conditions">Terms &amp; Conditions</a></li>
                </ul>
            </div>

            <!-- This display only for mobile device -->
            <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 visible-xs">
                <div class="footer_left">
                    <img class="mastercard" src="<?php echo $tpl_dir;?>/images/icon_mastercard_gray.svg" alt="">
                    <img class="visa" src="<?php echo $tpl_dir;?>/images/icon_visa_gray.svg" alt="">
                    <p>All Rights Reserved. &copy; Company Name, 2016</p>
                </div>
            </div>
            <!-- /This display only for mobile device -->

            <div class="col-lg-3 col-md-2 col-sm-4 col-xs-9 hidden-xs">
                <ul class="footer_social_icon">
                    <li class="facebook">
                        <a href="https://www.facebook.com/TheOak-1774859679416461/" target="_blank">
                            <img id="facebook-logo" class="svg" src="<?php echo $tpl_dir;?>/images/icon_facebook.svg" alt="Facebook">
                        </a>
                    </li>
                    <li class="twitter">
                        <a href="https://www.twitter.com" target="_blank">
                            <img id="twitter-logo" class="svg" src="<?php echo $tpl_dir;?>/images/icon_twitter_darkblue.svg" alt="Twitter">
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 hidden-xs">
                <ul class="scrolltop">
                    <li class=""><a class="scrollToTop" href="#"><img src="<?php echo $tpl_dir;?>/images/scrolltop.png" alt=""></a></li>
                </ul>
            </div>

        </div>
    </div>

</div>
<div>

</div><!-- .site-footer -->

<?php wp_footer(); ?>

</body>
</html>