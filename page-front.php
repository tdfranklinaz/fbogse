<?php
/*
Template Name: FBO home template
*/
get_header(); ?>
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

      <!-- hero -->
      <section class="bg-hero padding-hero" style="background-image: linear-gradient(90deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('<?php echo $huge_image; ?>'); background-size: cover; background-position: center;">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
              <h1 class="hero">Buy &amp; Sell Ground Support Equipment Online</h1>
              <p class="sub-hero">The #1 platform to buy and sell ground support equipment online. Browse listings from across the country.</p>
              <a href="/ground-support-equipment" class="btn btn-blu btn-hero">Browse GSE</a>
            </div>
          </div>
        </div>
      </section>

      <section class="tall bg-ltgrey">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <h2 class="section-title text-center">Featured listings</h2>
            </div>
          </div>
          <div class="row pt2">
          <?php 
            $args_ads = array(
              'post_type' => 'fbo_post_products',
              'posts_per_page' => 3,
              'orderby' => 'DESC',
              // Meta Key For Featured Listings Only
              'meta_query' => array(
                array(
                  'key' => 'equipment_featured',
                  'value' => 'yes'
                )
              )
            );
            $loop = new WP_Query( $args_ads );
            while ( $loop->have_posts() ) : $loop->the_post(); 

            if ( has_post_thumbnail() ) {
              $medium_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium');
              $medium_image = $medium_image[0];
            } else {
              $medium_image = false;
            } 

              //listing vars
              $excerpt = get_field('equipment_excerpt'); 
              $description = get_field('equipment_description');
              $price = get_field('equipment_price');
              $equipment_city = get_field('equipment_city');
              $equipment_state = get_field('equipment_state');
            ?>

              <article>
                <div class="col-sm-4">

                  <div class="listing-homepage">
                  
                    <header>
                      <a href="<?php the_permalink(); ?>" class="post-hover-colors">
                        <div class="img-aspect-4-3 listing-image-front" style="background-image: url('<?php echo $medium_image; ?>'); ">
                        </div>
                        <p class="post-location"><?php echo $equipment_city; ?>, <?php echo $equipment_state; ?></p>
                        <h3 class="post-title"><?php the_title(); ?></h3>
                      </a>
                    </header>

                    <div class="post-meta">
                      <p class="price-home"><?php echo $price; ?></p>
                      <a href="<?php the_permalink(); ?>" class="link">View Listing &rarr;</a>
                    </div>

                  </div>
                  
                </div>
              </article>
                
            <?php endwhile; ?>
          </div>
        </div>
      </section>

      <section class="tall bg-white">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 ">
              <h2 class="section-title text-center">Recent Listings</h2>
            </div>
          </div>
          <div class="row pt2 autoclear">
            <?php 
              $args_ads = array(
                'post_type' => 'fbo_post_products',
                'posts_per_page' => 6,
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

              //listing vars
              $excerpt = get_field('equipment_excerpt'); 
              $description = get_field('equipment_description');
              $price = get_field('equipment_price');
              $equipment_city = get_field('equipment_city');
              $equipment_state = get_field('equipment_state');
              ?>

                <article>
                <div class="col-sm-4">

                  <div class="listing-homepage">
                  
                    <header>
                      <a href="<?php the_permalink(); ?>" class="post-hover-colors">
                        <div class="img-aspect-4-3 listing-image-front" style="background-image: url('<?php echo $medium_image; ?>'); ">
                        </div>
                        <p class="post-location"><?php echo $equipment_city; ?>, <?php echo $equipment_state; ?></p>
                        <h3 class="post-title"><?php the_title(); ?></h3>
                      </a>
                    </header>

                    <div class="post-meta">
                      <p class="price-home"><?php echo $price; ?></p>
                      <a href="<?php the_permalink(); ?>" class="link">View Listing &rarr;</a>
                    </div>

                  </div>
                  
                </div>
                </article>

                
            <?php endwhile; ?>
          </div>
          <div class="row pt1">
            <div class="col-xs-12 text-center">
              <a href="/products" class="text-center btn btn-secondary">View All &rarr;</a>
            </div>
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
                  <a href="/register" class="btn btn-white">Sign Up &rarr;</a>
                </div>
              </div>
            </div>
          </div>
        </section>
      <?php endif;?>

    </article>
  <?php endwhile; // end page loop ?>
<?php get_footer(); ?>