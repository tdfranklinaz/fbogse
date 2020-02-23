<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fbo-theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">

<!-- Critical CSS -->
<style type="text/css">
  /* override default responsive menu for dashboard */
  .btn-menu span.lines-circle span.line-1, 
  .btn-menu span.lines-circle span.line-2, 
  .btn-menu span.lines-circle span.line-3 {
    background: white !important;
  }

  ul.menu-header li a {
    color: black;
  }

  @media(max-width: @screen-xs) {
    ul.menu-header li {
      display: block;
      width: 100%;
      float: left;
    }
    ul.menu-header li a {
      color: white;
      display: block;
      text-align: left;
      color: white;
      font-size: 24px;
      float: left;
    }
  }

  .nav-top {
    overflow: visible;
  }
</style>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>> 
  <div id="page" class="site">

    <!-- header -->
    <header class="site-header <?php if(is_page('log-in')){ echo 'fixed'; } ?> header-dashboard <?php if(is_front_page()){ echo 'home-page'; } ?>">
      <div id="top-nav" class="top-nav">
        <nav class="navbar navbar-dashboard" role="navigation">

          <!-- header -->
          <div class="container">
            <div class="row">

              <div class="col-md-2 col-sm-4 col-xs-4 gutter">
                <div class="navbar-header">
                  <a class="brand" href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo-new.png" alt="FBOGSE" class="img-responsive dashboard-logo">
                  </a>
                </div>
              </div>



              <div class="col-xs-8 col-md-10 gutter">
                <div class="nav-collapse collapse">
                  <div class="nav-top">

                    <ul class="menu-header menu-header-dashboard pull-left">
                      <li><a href="<?php echo home_url(); ?>/dashboard">Dashboard</a></li>
                      <li><a href="<?php echo home_url(); ?>/ground-support-equipment">Browse Listings</a></li>
                      <li><a href="<?php echo wp_logout_url( home_url() ); ?>">Sign out</a></li>
                    </ul>

                    <div class="dropdown pull-right">
                      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        My Account
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="/dashboard/account-settings">Accounts Settings</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo wp_lostpassword_url(); ?>">Reset Password</a></li>
                      </ul>
                    </div>
                      
                  </div>
                </div>
                <div class="nav-open text-right">
                  <button id="open-nav" type="button" class="btn btn-navbar btn-menu">
                    <span class="lines-circle"><span class="line-1"></span><span class="line-2"></span><span class="line-3"></span></span>
                  </button>
                </div>
              </div>












              
            </div>
          </div>

        </nav>
      </div>
    </header>

    <div id="content" class="site-content">