<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$tpl_dir = get_template_directory_uri().'/assets';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body onload="updateNumProductInLi ()" style="background-color: rgb(255, 255, 255) !important;" <?php body_class(); ?>>
<div>
    <div class="header_area">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="logo">
                        <a href="/">
                            <img src="<?php echo $tpl_dir;?>/images/logo.png" alt="logo" style="width:50%;margin-top:3px;">
                        </a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="phone_number">
                        <p>
                            <a href="tel:0203 609 3000">
                                <span>
                                    <img src="<?php echo $tpl_dir;?>/images/phone-num.png" alt="">
                                </span> 0203 609 3000 <span
                                        style="color:#808080;font-size:12px;">(Colny hatch lane)</span>
                            </a>
                            <br>
                            <a href="tel:0203 302 0101">
                                <span>
                                    <img src="<?php echo $tpl_dir;?>/images/phone-num.png" alt="">
                                </span> 0203 302 0101 <span style="color:#808080;font-size:12px;">(Archway)</span>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="right_top_menu after_login">
                        <ul class="top_menu">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mainmenu_area ng-scope">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span> <span class="icon-bar">

                            </span> <span class="icon-bar"></span> <span class="icon-bar">

                            </span>
                        </button>
                    </div>
                    <div class="mainmenu navbar-collapse collapse in" aria-expanded="true" style="">
                        <ul id="menu" class="nav navbar-nav">
                            <li <?php echo (get_page_uri()=="homepage") ? "class='active'" : "class=''"?>>
                                <a href="/" data-toggle="collapse" data-target=".navbar-collapse">Homepage</a>
                            </li>
                            <li <?php echo (get_page_uri()=="partypackage") ? "class='active'" : "class=''"?>>
                                <a href="/partypackage" data-toggle="collapse" data-target=".navbar-collapse">Party
                                    Package</a>
                            </li>
                            <li>
                                <a target="_blank" href="<?php echo $tpl_dir;?>/images/The Oak Menu_v2_Jan 2016.pdf" data-toggle="collapse"
                                   data-target=".navbar-collapse">Menu</a>
                            </li>
                            <li <?php echo (get_page_uri()=="aboutus") ? "class='active'" : "class=''"?>>
                                <a href="/aboutus" data-toggle="collapse" data-target=".navbar-collapse">About Us</a>
                            </li>
                            <li <?php echo (get_page_uri()=="comingsoon") ? "class='active'" : "class=''"?>>
                                <a href="/comingsoon" data-toggle="collapse" data-target=".navbar-collapse">Latest
                                    News</a>
                            </li>
                            <li <?php echo (get_page_uri()=="contact") ? "class='active'" : "class=''"?>>
                                <a href="/contact" data-toggle="collapse" data-target=".navbar-collapse">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2">
                    <div class="social_icon">
                        <ul>
                            <li class="facebook">
                                <a href="https://www.facebook.com/TheOak-1774859679416461/?ref=aymt_homepage_panel"
                                   ng-if="$root.isNotMobile" class="ng-scope">
                                    <img src="<?php echo $tpl_dir;?>/images/icon_facebook_white.svg" alt="">
                                </a>
                            </li>
                            <li class="twitter">
                                <a href="https://twitter.com/Theoak16" ng-if="$root.isNotMobile" class="ng-scope">
                                    <img src="<?php echo $tpl_dir;?>/images/icon_twitter_white.svg" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(is_page('homepage')):?>
    <div class="slider_area ng-scope">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="single_slide_item">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="slider_content_left">
                                        <div class="slider_text">
                                            <p>Locate best offers in your area</p>
                                        </div>
                                        <form method="get" action="/shop" class="input-group input-group-lg" style="max-width:70%" autocomplete="off" name="postalForm">
                                            <input type="text" class="form-control" style="text-transform: uppercase;" name="postcode" placeholder="Postcode" required="required" autofocus="">
                                            <span class="input-group-btn">
                                            <button class="view_menu btn btn-primary" ng-disabled="btnDisable" type="submit" style="min-width: 76px; width: auto;">
                                                <span ng-hide="btnDisable">Find</span>
<!--                                                <i class="fa fa-refresh ld ld-spin find-hide"></i>-->
                                            </button>
                                        </span>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif;?>
	<!--<div id="content" class="site-content">-->

