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

<?php wp_head(); ?>
	
<script type="text/javascript">
  window.heap=window.heap||[],heap.load=function(e,t){window.heap.appid=e,window.heap.config=t=t||{};var r=t.forceSSL||"https:"===document.location.protocol,a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src=(r?"https:":"http:")+"//cdn.heapanalytics.com/js/heap-"+e+".js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(a,n);for(var o=function(e){return function(){heap.push([e].concat(Array.prototype.slice.call(arguments,0)))}},p=["addEventProperties","addUserProperties","clearEventProperties","identify","resetIdentity","removeEventProperty","setEventProperties","track","unsetEventProperty"],c=0;c<p.length;c++)heap[p[c]]=o(p[c])};
    heap.load("1681757452");
</script>

<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">

</head>

<body <?php body_class(); ?>> 
  <div id="page" class="site">



    <!-- header -->
    <header class="site-header <?php if(is_front_page()){ echo 'home-page'; } ?>">


      <div id="top-nav" class="top-nav ">
        <nav class="navbar" role="navigation">

          <!-- header -->
          <div class="container">
            <div class="row row-top-header">

              <div class="col-xs-6 col-sm-2 col-md-2 gutter">
                <div class="navbar-header">
                  <a class="brand" href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo-new.png" alt="FBOGSE" class="img-responsive">
                  </a>
                </div>
              </div>

              <div class="col-xs-6 col-sm-10 col-md-10 gutter pull-right">
                <div class="nav-collapse collapse">
                  <div class="nav-top">

                    <ul id="navigation-top" class="nav">
                      <li><a href="/about">About</a></li>
                      <li><a href="/ground-support-equipment">Browse Listings</a></li>
                      <li><a href="/create-listing">Create a Listing</a></li>
                      <li><a href="/contact">Contact Us</a></li>

                      <!-- log button -->
                      <?php if(is_user_logged_in()): ?>
                      <li><a href="<?php echo wp_logout_url( home_url() ); ?>">Sign Out</a></li>
                      <?php else: ?>
                      <li><a href="/account-login">Log In</a></li>
                      <?php endif; ?>

                      <!-- dash button -->
                      <?php if(is_user_logged_in()): ?>
                      <li><a href="/dashboard">My Dashboard</a></li>
                      <?php else: ?>
                      <li><a href="/register">Sign Up</a></li>
                      <?php endif; ?>
                      
                    </ul>
                      
                  </div>
                </div>
                <div class="nav-open text-right">
                  <button id="open-nav" type="button" class="btn btn-navbar btn-menu">
                    <span class="lines-circle">
                      <span class="line-1"></span>
                      <span class="line-2"></span>
                      <span class="line-3"></span>
                    </span>
                  </button>
                </div>
              </div>

            </div>
          </div>

        </nav>
      </div>
    </header>

    <div id="content" class="site-content">


    <?php if(!is_user_logged_in()): ?>
      <div class="modal fade" id="admodal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
          <div class="modal-content text-center">
            <div class="modal-body" style="padding: 50px 25px;">
              <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="FBOGSE" width="125"><br>
              <h3>Sign up and use coupon code 'GSE1' to get your first listing free!</h3>
            </div>
            <div class="modal-footer bg-ltgrey">
              <button class="btn btn-secondary" data-dismiss="modal">No Thanks</button>
              <br class="visible-xs">
              <br class="visible-xs">
              <a href="/register" class="btn btn-blu">Sign Up &rarr;</a>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div>
    <?php endif;?>
