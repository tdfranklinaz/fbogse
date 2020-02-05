<?php
/*
Template Name: Blog Page Template
*/
get_header(); ?>

  <?php while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <!-- hero -->
      <section class="bg-ltgrey medium">
        <div class="container">
          <div class="row">
            <div class="col-sm-8">
              <h1>Ground Support Equipment Blog</h1><br>
              <p>Your source for ground support equipment news, guides &amp; more.</p><br>
              <!-- <a href="#subscribe" class="btn btn-blu btn-hero">Subscribe</a> -->
            </div>
          </div>
        </div>
      </section>

      <!-- Blog Archive -->
      <section class="bg-white medium">
        <div class="container">
          <div class="row">
            <!-- Loop -->
            <?php 
              $args_ads = array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'orderby' => 'DESC',
              );
              $loop = new WP_Query( $args_ads );
              while ( $loop->have_posts() ) : $loop->the_post(); 

              if ( has_post_thumbnail() ) {
                $medium_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium');
                $medium_image = $medium_image[0];
              } else {
                $medium_image = false;
              }
              
            ?>

              <div class="col-sm-4">
                <a href="<?php the_permalink(); ?>">
                  <div class="blog-image-container">
                    <img src="<?php echo $medium_image; ?>" alt="<?php the_title(); ?>">
                  </div>

                  <h2 class="blog-post-title"><?php the_title(); ?></h2>
                </a>

                <p class="blog-post-excerpt"><?php echo  get_the_excerpt(); ?></p> 
                <a href="<?php the_permalink(); ?>" class="blog-read-more">Read more &rarr;</a>
              </div>

            <?php endwhile; ?>
          </div>
        </div>
      </section>


      <!-- CTA -->
      <?php if(!is_user_logged_in()): ?>
        <section class="bg-blue medium">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
                <h3>Create your account today</h3>
                <div class="pt">
                  <a href="/register" class="btn btn-blu">Sign Up &rarr;</a>
                </div>
              </div>
            </div>
          </div>
        </section>
      <?php endif;?>

    </article>
  <?php endwhile; // end page loop ?>
<?php get_footer(); ?>