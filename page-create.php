<?php
/*
Template Name: FBO create listing template
*/
get_header('dashboard'); ?>
  <?php
    if ( has_post_thumbnail() ) {
      $huge_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'huge');
      $huge_image = $huge_image[0];
      $large_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
      $large_image = $large_image[0];
      $medium_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium');
      $medium_image = $medium_image[0];
    } else {
      $large_image = false;
      $medium_image = false;
    }
    if(!$huge_image){
      $huge_image = $large_image;
    }
  ?>

  <?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <section class="medium bg-ltgrey">
        <div class="container">

          <div class="row">
            <div class="col-xs-12 gutter text-center">
              <h3 class="section-title">New Listing - Your Ad</h3>
            </div>
          </div>

          <div class="row pt1">
            <div class="col-sm-8 col-sm-offset-2 gutter bg-white padding-form">
              <p><?php 
              if(is_user_logged_in()) {
                the_content();
              } else {
                get_template_part('template-parts/content-login', 'content-login');
              }
            ?></p>
            </div>
          </div>
        </div>
      </section>




    </article>
  <?php endwhile; // end page loop ?>
<?php get_footer('dashboard'); ?>