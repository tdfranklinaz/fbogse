<?php
/*
Template name: Register Page 
*/
get_header('none'); ?>

<?php while ( have_posts() ) : the_post(); ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="container-fluid" style="background: linear-gradient(rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25)), url('<?php echo get_template_directory_uri(); ?>/img/backgroundAC.jpg'); background-size: cover; background-position: center;">
      <div class="row">

        <div class="col-lg-6 col-md-8 col-xs-12 no-gutter">
          <section class="register-section bg-white">

            <div class="row padding-register">
              <div class="col-xs-12">
                <p><a href="<?php echo home_url(); ?>">&larr; Back to Home</a></p>
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="FBOGSE Buy and Sell GSE Today!" width="150" class="pt2">
                <p class="light-text pt">Register your FBOGSE account to access and manage a listing account.</p>
                <div class="gform-register pt">
                  <?php gravity_form(1, false, false); ?>
                  <p class="caption"><a href="/log-in">Already have an account? Log In.</a></p>
                </div>
                <p class="caption pt2">FBOGSE LLC</p>
              </div>
            </div>
            
          </section>
        </div>

        <div class="col-lg-6 col-md-4 col-xs-12 no-gutter">
        </div>

      </div>

    </div>

  </article><!-- #post-## -->
<?php endwhile; // end of the loop. ?>

<?php // get_sidebar(); ?>
<?php get_footer('dashboard'); ?>

