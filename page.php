<?php
/**
 * The template for displaying normal pages
 *
 * @package fbo-theme
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <section class="bg-ltgrey medium">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 gutter">
            <h3 class="section-title"><?php the_title(); ?></h3>
          </div>
        </div>
        <div class="row pt2">
          <div class="col-sm-8 col-xs-12 gutter">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </section>

  </article><!-- #post-## -->
<?php endwhile; // end of the loop. ?>

<?php // get_sidebar(); ?>
<?php get_footer(); ?>

