<?php
/*
Template Name: Default Dashboard Template 
*/
get_header('dashboard'); ?>

<?php while ( have_posts() ) : the_post(); ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <section class="bg-ltgrey medium">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 gutter">
            <a href="/dashboard">&larr; Go back</a><br>
            <h3 class="section-title"><?php the_title(); ?></h3>
          </div>
        </div>
        <div class="row pt2">
          <div class="col-sm-8 col-xs-12 gutter">
            <?php 
              if(is_user_logged_in()) {
                the_content();
              } else {
                get_template_part('template-parts/content-login', 'content-login');
              }
            ?>
          </div>
        </div>
      </div>
    </section>

  </article><!-- #post-## -->
<?php endwhile; // end of the loop. ?>

<?php // get_sidebar(); ?>
<?php get_footer('dashboard'); ?>

