<?php
/*
Template Name: FBO Dashboard Template
*/
get_header('dashboard'); ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <section class="small bg-ltgrey">
        <div class="container">

          <?php if(is_user_logged_in()): ?>


            <?php if( $_GET["account"] == 'updated' ): ?>
              <div class="row">
                <div class="col-xs-12">
                  <p class="success">Your account settings have been updated.</p><br>
                </div>
              </div>
            <?php endif; ?>

            <div class="row">
              <div class="col-sm-12">
                <h1 class="section-title">Welcome, <?php echo get_the_author_meta('display_name'); ?></h1>
              </div>
            </div>


            <div class="row pt1">
              <div class="col-sm-3 col-xs-12">

                <div class="row">
                  <div class="col-xs-12">
                    
                    <a href="/create-listing" class="btn btn-blu">New Listing &plus;</a>
                    
                  </div>
                </div>

                  
                
              </div>
              <div class="col-sm-9 col-xs-12">
                
                <div class="row">

                  <!-- Pending Listings Loop -->
                  <?php 
                      $query_args = array(
                        'post_type' => 'fbo_post_products',
                        'post_status' => 'draft',
                        'author' => $current_user->ID,
                        'posts_per_page' => -1,
                        'order' => 'DESC',
                        'orderby' => 'date'
                      );
                      $the_query = new WP_Query( $query_args );
                    ?>

                      

                      <?php if ( $the_query->have_posts() ) : ?> 


                      <div class="col-xs-12">

                        <h4 class="archive-title pull-left">Pending Listings</h4>
                          
                        </div>
                      
                      
                      <?php  while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                        

                        

                      <?php
                        if ( has_post_thumbnail() ) {
                          $large_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
                          $large_image = $large_image[0];
                          $medium_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium');
                          $medium_image = $medium_image[0];
                        } else {
                          $large_image = false;
                          $medium_image = false;
                        }
                        
                        //listing vars
                        $excerpt = get_field('equipment_excerpt');
                        $description = get_field('equipment_description');
                        $price = get_field('equipment_price');
                        $location = get_field('equipment_location');
                      ?>

                        <div class="listings-container">
                          <div class="col-xs-12">
                            <div class="dashboard-post-listing <?php if ($the_query->current_post == 0 ) { echo 'top-border'; } ?>">
                              <article>
                                <div class="listing-dashboard-link">
                                  <div class="row">

                                    <div class="col-sm-2 col-xs-4">
                                      <div class="img-aspect-4-3" style="background-image: url('<?php echo $medium_image; ?>'); "></div>
                                    </div>
                                    
                                    <div class="col-sm-7">
                                      <h1 class="post-title"><?php the_title(); ?> <span class="sub-post-title">Pending</span></h1>
                                    </div>

                                    <div class="col-sm-1 col-sm-offset-1">
                                      <a href="<?php echo get_delete_post_link( $post->ID ) ?>" onclick="return confirm('Are you sure you want to delete this listing?')" class="dashboard-button">Delete</a>
                                    </div>
                                    
                                  </div>
                                  
                                </div><!-- /listing dashboard link -->
                              </article>
                            </div>
                          </div>
                        </div>


                    <?php endwhile; ?>
                      <?php endif; ?>



                </div>
                <div class="row pt">



                    <!-- Accepted Listings Loop -->
                  
                    <?php
                      // working paginated loop 
                      // http://callmenick.com/post/custom-wordpress-loop-with-pagination
                      $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                      $query_args = array(
                        'post_type' => 'fbo_post_products',
                        'post_status' => 'publish',
                        'author' => $current_user->ID,
                        'posts_per_page' => 5,
                        'order' => 'DESC',
                        'orderby' => 'date',
                        'paged' => $paged
                      );
                      $the_query = new WP_Query( $query_args );
                    ?>


                    

                    

                    <?php if ( $the_query->have_posts() ) : ?>


                      <div class="col-xs-12">
                        <h4 class="archive-title pull-left">Accepted Listings</h4>
                      </div>
                    
                    
                    <?php  while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                    

                    <div class="col-xs-12">

                    
                      
                  </div>

                      <?php
                        if ( has_post_thumbnail() ) {
                          $large_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
                          $large_image = $large_image[0];
                          $medium_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium');
                          $medium_image = $medium_image[0];
                        } else {
                          $large_image = false;
                          $medium_image = false;
                        }
                        
                        //listing vars
                        $excerpt = get_field('equipment_excerpt');
                        $description = get_field('equipment_description');
                        $price = get_field('equipment_price');
                        $location = get_field('equipment_location');
                      ?>



                          
                          <div class="listing-container">
                            <div class="col-xs-12">
                              <div class="dashboard-post-listing <?php if ($the_query->current_post == 0 ) { echo 'top-border'; } ?>">
                                <article>
                                  <div class="listing-dashboard-link">
                                    <div class="row">

                                      <div class="col-sm-2 col-xs-4">
                                        <a href="<?php the_permalink(); ?>">
                                          <div class="img-aspect-4-3" style="background-image: url('<?php echo $medium_image; ?>'); "></div>
                                        </a>
                                      </div>

                                      
                                      <div class="col-sm-5">
                                        <a href="<?php the_permalink(); ?>">
                                          <h1 class="post-title"><?php the_title(); ?></h1>
                                          
                                        </a>
                                        
                                      </div>

                                      <div class="col-sm-3">
                                        <p><?php echo do_shortcode('[post-views]'); ?></p>
                                      </div>

                                      <div class="col-sm-1">
                                        <a href="<?php the_permalink(); ?>" class="dashboard-button">View</a>
                                      </div>

                                      <div class="col-sm-1">
                                        <a href="<?php echo get_delete_post_link( $post->ID ) ?>" onclick="return confirm('Are you sure you want to delete this listing?')" class="dashboard-button">Delete</a>
                                      </div>

                                    </div>


                                  </div><!-- /listing dashboard link -->
                                </article>
                              </div>
                            </div>
                          </div>

                          

                    <?php endwhile; ?>
                  



                  <?php if ($the_query->max_num_pages > 1): ?>
                    <nav class="prev-next-posts">
                      <div class="prev-posts-link pull-right">
                        <?php echo get_next_posts_link( 'Next Page', $the_query->max_num_pages ); // display older posts link ?>
                      </div>
                      <div class="next-posts-link pull-left">
                        <?php echo get_previous_posts_link( '< Previous Page' ); // display newer posts link ?>
                      </div>
                    </nav>
                  <?php else: ?>
                    <div class="col-xs-12">
                    </div>
                  <?php endif; ?>

                  <?php else: ?>

                        <div class="row">
                          <div class="col-sm-8 col-sm-offset-2 text-center">
                            <h3 class="no-listings">Your listings haven't been approved yet.</h3>
                          </div>
                        </div>
                    
                    
                  <?php endif; ?>

                  

                </div><!-- /row -->
              </div>
            </div><!-- /row -->

          <!-- show login form if user is not logged in -->
          <?php else: get_template_part('template-parts/content-login', 'content-login'); endif; ?>

          

        </div>
      </section>

      <section class="bg-ltgrey medium pt2">
      </section>

    </article>
  <?php endwhile; // end page loop ?>
<?php get_footer('dashboard'); ?>