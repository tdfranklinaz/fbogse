<?php
/*
Template Name: FBO Login Page Template
*/
get_header('none'); ?>

  <?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <div class="container-fluid bg-grey" style="height: 100vh;">
        <div class="row">

          <div class="login-container">
            <div class="login-background">
              <img src="<?php echo get_template_directory_uri(); ?>/img/logo-new.png" alt="FBOGSE Buy and Sell GSE Today!" width="150" class="img-login">
              
              <div class="gform-register pt">
                <?php if( isset($_GET["login"]) == 'failed' ): ?>
                  <p class="error-login"><b>Login failed.</b> Please try again.</p><br>
                <?php endif; ?> 

                <?php if( isset($_GET["register_new"]) == 'success' ): ?>
                  <p class="success"><b>Registration Complete</b> Please log in to continue.</p><br>
                <?php endif; ?> 
                
                <?php wp_login_form(); ?><hr>
                <div class="text-center">
                  <p class="caption"><a href="/register">Not a member yet? Sign up</a>.</p>
                  <p class="caption"><a href="<?php echo wp_lostpassword_url(); ?>">Lost your password? Reset it here.</a></p>
                </div><hr>
                <div class="text-center">
                  <p class="caption"><a href="/">Back Home</a></p>
                </div>
              </div><!-- /.gform-register -->
            </div><!-- /.login-background -->
          </div><!-- /.login-container -->

        </div>
      </div>

    </article>
  <?php endwhile; // end page loop ?>
<?php get_footer('dashboard'); ?>