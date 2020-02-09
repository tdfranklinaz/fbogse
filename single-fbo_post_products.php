<?php acf_form_head(); ?>
<?php
/**
 * The template for displaying all single products posts.
 *
 * @package fbo-theme
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

    //vars 
    $price = get_field('equipment_price');
    $location = get_field('equipment_location');
    $desc = get_field('equipment_description');

    $equipment_city = get_field('equipment_city');
    $equipment_state = get_field('equipment_state');

  ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <section class="tall top-section bg-ltgrey">
        <div class="container">

          <!-- top options row -->
          <div class="row">
            <div class="col-xs-12">
              <div class="row">
                <div class="col-sm-6">

                <?php
                  if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                  }
                ?>

                </div>
                <div class="col-sm-6 pull-right text-right">
                  <?php 
                    $obj_id = get_queried_object_id();
                    $current_url = get_permalink( $obj_id );
                  ?>
                  <!-- Social Media -->
                  <ul class="social-share">
                    <li>Share:</li>
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $current_url; ?>" target="_block"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMC8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvVFIvMjAwMS9SRUMtU1ZHLTIwMDEwOTA0L0RURC9zdmcxMC5kdGQnPjxzdmcgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgMzIgMzIiIGhlaWdodD0iMzJweCIgaWQ9IkxheWVyXzEiIHZlcnNpb249IjEuMCIgdmlld0JveD0iMCAwIDMyIDMyIiB3aWR0aD0iMzJweCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+PGc+PHBhdGggZD0iTTMyLDMwYzAsMS4xMDQtMC44OTYsMi0yLDJIMmMtMS4xMDQsMC0yLTAuODk2LTItMlYyYzAtMS4xMDQsMC44OTYtMiwyLTJoMjhjMS4xMDQsMCwyLDAuODk2LDIsMlYzMHoiIGZpbGw9IiMzQjU5OTgiLz48cGF0aCBkPSJNMjIsMzJWMjBoNGwxLTVoLTV2LTJjMC0yLDEuMDAyLTMsMy0zaDJWNWMtMSwwLTIuMjQsMC00LDBjLTMuNjc1LDAtNiwyLjg4MS02LDd2M2gtNHY1aDR2MTJIMjJ6IiBmaWxsPSIjRkZGRkZGIiBpZD0iZiIvPjwvZz48Zy8+PGcvPjxnLz48Zy8+PGcvPjxnLz48L3N2Zz4=" alt="Facebook share icon" width="27"></a></li>

                    <li><a href="http://twitter.com/share?text=<?php the_title(); ?>&url=<?php echo $current_url; ?>" target="_block"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMC8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvVFIvMjAwMS9SRUMtU1ZHLTIwMDEwOTA0L0RURC9zdmcxMC5kdGQnPjxzdmcgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgMzIgMzIiIGhlaWdodD0iMzJweCIgaWQ9IkxheWVyXzEiIHZlcnNpb249IjEuMCIgdmlld0JveD0iMCAwIDMyIDMyIiB3aWR0aD0iMzJweCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+PGc+PHBhdGggZD0iTTMyLDMwYzAsMS4xMDQtMC44OTYsMi0yLDJIMmMtMS4xMDQsMC0yLTAuODk2LTItMlYyYzAtMS4xMDQsMC44OTYtMiwyLTJoMjhjMS4xMDQsMCwyLDAuODk2LDIsMlYzMHoiIGZpbGw9IiM1NUFDRUUiLz48cGF0aCBkPSJNMjUuOTg3LDkuODk0Yy0wLjczNiwwLjMyMi0xLjUyNSwwLjUzNy0yLjM1NywwLjYzNWMwLjg1LTAuNDk4LDEuNS0xLjI4OSwxLjgwNi0yLjIzMSAgIGMtMC43OTIsMC40NjEtMS42NywwLjc5Ny0yLjYwNSwwLjk3OEMyMi4wODMsOC40OTEsMjEuMDE3LDgsMTkuODM4LDhjLTIuMjY2LDAtNC4xLDEuODA3LTQuMSw0LjAzOCAgIGMwLDAuMzE0LDAuMDM2LDAuNjI1LDAuMTA0LDAuOTIyYy0zLjQwNy0wLjE3Mi02LjQyOS0xLjc3OS04LjQ1Mi00LjIyMWMtMC4zNTIsMC41OTctMC41NTYsMS4yOS0wLjU1NiwyLjAzMiAgIGMwLDEuMzk5LDAuNzI2LDIuNjM1LDEuODI0LDMuMzZjLTAuNjcxLTAuMDIyLTEuMzA0LTAuMjAzLTEuODU2LTAuNTA2Yy0wLjAwMSwwLjAxNy0wLjAwMSwwLjAzNC0wLjAwMSwwLjA1MiAgIGMwLDEuOTU1LDEuNDE0LDMuNTg5LDMuMjksMy45NmMtMC4zNDMsMC4wOS0wLjcwNSwwLjE0Mi0xLjA4MSwwLjE0MmMtMC4yNjQsMC0wLjUyLTAuMDI0LTAuNzctMC4wNzIgICBjMC41MiwxLjYwNCwyLjAzNCwyLjc3MSwzLjgyOCwyLjgwNUMxMC42NywyMS41OTQsOC45LDIyLjI0LDYuOTc5LDIyLjI0Yy0wLjMzLDAtMC42NTgtMC4wMTgtMC45NzktMC4wNTYgICBjMS44MTQsMS4xNDUsMy45NzEsMS44MTMsNi4yODcsMS44MTNjNy41NDEsMCwxMS42NjYtNi4xNTQsMTEuNjY2LTExLjQ5MWMwLTAuMTczLTAuMDA1LTAuMzUtMC4wMTItMC41MjEgICBDMjQuNzQxLDExLjQxNCwyNS40MzgsMTAuNzAzLDI1Ljk4Nyw5Ljg5NHoiIGZpbGw9IiNGRkZGRkYiLz48L2c+PGcvPjxnLz48Zy8+PGcvPjxnLz48Zy8+PC9zdmc+" alt="Twitter share icon" width="27"></a></li>


                    <li><a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $current_url; ?>" target="_block"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMC8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvVFIvMjAwMS9SRUMtU1ZHLTIwMDEwOTA0L0RURC9zdmcxMC5kdGQnPjxzdmcgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgMzIgMzIiIGhlaWdodD0iMzJweCIgaWQ9IkxheWVyXzEiIHZlcnNpb249IjEuMCIgdmlld0JveD0iMCAwIDMyIDMyIiB3aWR0aD0iMzJweCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+PGc+PHBhdGggZD0iTTMyLDMwYzAsMS4xMDQtMC44OTYsMi0yLDJIMmMtMS4xMDQsMC0yLTAuODk2LTItMlYyYzAtMS4xMDQsMC44OTYtMiwyLTJoMjhjMS4xMDQsMCwyLDAuODk2LDIsMlYzMHoiIGZpbGw9IiMwMDdCQjUiLz48Zz48cmVjdCBmaWxsPSIjRkZGRkZGIiBoZWlnaHQ9IjE0IiB3aWR0aD0iNCIgeD0iNyIgeT0iMTEiLz48cGF0aCBkPSJNMjAuNDk5LDExYy0yLjc5MSwwLTMuMjcxLDEuMDE4LTMuNDk5LDJ2LTJoLTR2MTRoNHYtOGMwLTEuMjk3LDAuNzAzLTIsMi0yYzEuMjY2LDAsMiwwLjY4OCwyLDJ2OGg0di03ICAgIEMyNSwxNCwyNC40NzksMTEsMjAuNDk5LDExeiIgZmlsbD0iI0ZGRkZGRiIvPjxjaXJjbGUgY3g9IjkiIGN5PSI4IiBmaWxsPSIjRkZGRkZGIiByPSIyIi8+PC9nPjwvZz48Zy8+PGcvPjxnLz48Zy8+PGcvPjxnLz48L3N2Zz4=" alt="LinkedIn share icon" width="27"></a></li>


                    
                  </ul>
                </div>
              </div>
            </div>
          </div>


          <!-- END BREADCRUMBS MENU -->


          <div class="row pt1">
            <div class="col-sm-7" style="overflow: hidden;">


              <!-- Product Images Carousel -->
              <div id="carousel-custom" class="carousel" data-ride="carousel" data-interval="false">
                <div class="carousel-outer">

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">

                    <div class="item active">
                      <div class="img-aspect-4-3" style="background: url('<?php echo $large_image; ?>'); background-size: cover; background-position: center;">
                      </div>
                    </div>

                    <?php
                      $images = get_field('equipment_images');

                      if( $images ): ?>
                        <?php foreach( $images as $image ): ?>
                          <div class="item">
                            <div class="img-aspect-4-3" style="background: url('<?php echo $image['url']; ?>'); background-size: cover; background-position: center;"></div>
                          </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                  </div>
                    
                </div>
                
                <!-- Thumnails / Indicators -->
                <ol class="carousel-indicators mCustomScrollbar">

                  <li data-target="#carousel-custom" data-slide-to="0" class="active">
                    <img src="<?php echo $large_image; ?>" alt="<?php the_title(); ?>" />
                  </li>

                  <?php 
                    $images = get_field("equipment_images");

                    if( $images ): ?>
                        <?php 
                        $i = 1;
                        foreach( $images as $image ): ?>
                          <li data-target="#carousel-custom" data-slide-to="<?php echo $i++; ?>"><img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" /></li>
                        <?php endforeach; ?>
                  <?php endif; ?>

                </ol>
              </div>


              <div class="edit-images-box">
                <?php	if( is_user_logged_in() && $current_user->ID == $post->post_author): ?>
                  <a href="#editModalImages" data-toggle="modal" class="btn btn-sm">Edit</a>
                <?php endif; ?>
              </div>


              <div class="row pt">
                <div class="col-xs-12">
                  <h1><?php the_title(); ?></h1>
                </div>
              </div>

              <hr style="border-color:#ccc;">
              <div class="row">
                <div class="col-xs-12 col-sm-4">
                  <p class="single-price">
                    <?php echo get_field('equipment_price'); ?>
                    <?php	if( is_user_logged_in() && $current_user->ID == $post->post_author): ?>
                      <a href="#editModalPrice" data-toggle="modal" class="btn btn-sm">Edit</a>
                    <?php endif; ?>
                  </p>
                </div>
                <div class="col-xs-12 col-sm-4">

                  <p>
                    <?php echo $equipment_city; ?>, <?php echo $equipment_state; ?>
                    <?php	if( is_user_logged_in() && $current_user->ID == $post->post_author): ?>
                      <a href="#editModalLocation" data-toggle="modal" class="btn btn-sm">Edit</a>
                    <?php endif; ?>
                  </p>
                  
                </div>
                <div class="col-xs-12 col-sm-4">
                  <p>
                    <?php echo get_field('equipment_condition'); ?>
                    <?php	if( is_user_logged_in() && $current_user->ID == $post->post_author): ?>
                      <a href="#editModalCondition" data-toggle="modal" class="btn btn-sm">Edit</a>
                    <?php endif; ?>
                  </p>
                </div>
              </div>
              <hr style="border-color:#ccc;">

              <div class="row">
                <div class="col-xs-12">
                  <p class="single-product-desc"><?php echo $desc; ?>
                    <?php	if( is_user_logged_in() && $current_user->ID == $post->post_author): ?>
                      <a href="#editModalDesc" data-toggle="modal" class="btn btn-sm">Edit</a>
                    <?php endif; ?>
                  </p>
                </div>
              </div>


            </div>



            <?php 
							//check if current user is the post author
							global $current_user;
              get_currentuserinfo(); ?>

            <div class="col-sm-5">

              <div class="well">

                <h3>Contact Seller</h3>

                <div class="contact-seller-form">
                  <?php echo do_shortcode('[gravityform id="6" title="false" description="false" ajax="true" tabindex="49" field_values="listing_owner_email=<?php echo get_the_author_meta('user_email'); ?>"]'); ?>
                </div>
                


                <hr style="border-color: #f7f7f7;">

                <?php // Get post author email ?>
                <p><a href="tel:<?php echo get_the_author_meta('bizPhone'); ?>" ><?php echo get_the_author_meta('bizPhone'); ?></a></p>
                <p><a href="mailto:<?php echo get_the_author_meta('user_email'); ?>"><?php echo get_the_author_meta('user_email'); ?></a></p>

                <br>
                <a href="mailto:<?php echo get_the_author_meta('user_email'); ?>" class="btn btn-blu">Email Seller</a>
              </div>

              <br>

              <!-- BUSINESS INFO -->
              <div class="well">
              <?php if(get_the_author_meta("showBiz") ): ?>
                <?php 
                  $biz_image = get_the_author_meta('bizLogo');
                  $biz_name = get_the_author_meta('bizName');
                  $biz_web = get_the_author_meta('bizWeb');
                  $biz_phone = get_the_author_meta('bizPhone');
                  $biz_email = get_the_author_meta('user_email');
                ?>

                <span>
                  <img src="<?php echo $biz_image; ?>" width="125" alt="<?php echo $biz_name; ?>">
                  <p><?php echo $biz_name; ?></p>
                </span>
                <p><a href="<?php echo $biz_web; ?>"><?php echo $biz_web; ?></a></p><br>
                <p><?php echo $biz_phone; ?></p>
                <p><a href="mailto:<?php echo $biz_email; ?>"><?php echo $biz_email; ?></a></p>

                <br>
                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" class="btn btn-secondary">More listings by this user</a>
              

                <?php // Edit Business Info Link ?>
                <?php	if( is_user_logged_in() && $current_user->ID == $post->post_author): ?>
                  <p><a href="/dashboard/account-settings" class="btn btn-sm">Edit</a></p>
                <?php endif; ?>
              </div>

              <?php endif; ?>















						
              
              <!-- DESCRIPTION MODAL -->
              <div>
                <div id="editModalDesc" class="modal edit-modal-desc" tabindex="-1" role="dialog" aria-labelledby="editModalDesc" aria-hidden="true" style="z-index:999999;">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title">Edit Description</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <?php 
                          $edit_options = array(
                            'form' => true,
                            'submit_value' => 'Update',
                            'post_status' => 'publish',
                            'fields' => array('field_58fce6ae53ec8')
                          );
                          acf_form($edit_options); 
                        ?>
                      </div>
                      <div class="modal-footer bg-ltgrey">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- CONDITION MODAL -->
              <div>
                <div id="editModalCondition" class="modal edit-modal-condition" tabindex="-2" role="dialog" aria-labelledby="editModalCondition" aria-hidden="true" style="z-index:999999;">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title">Edit Condition</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <?php 
                          $edit_options = array(
                            'form' => true,
                            'submit_value' => 'Update',
                            'post_status' => 'publish',
                            'fields' => array('field_5a343bd29f08d')
                          );
                          acf_form($edit_options); 
                        ?>
                      </div>
                      <div class="modal-footer bg-ltgrey">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- LOCATION MODAL -->
              <div>
                <div id="editModalLocation" class="modal edit-modal-location" tabindex="-2" role="dialog" aria-labelledby="editModalLocation" aria-hidden="true" style="z-index:999999;">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title">Edit Location</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <?php 
                          $edit_options = array(
                            'form' => true,
                            'submit_value' => 'Update',
                            'post_status' => 'publish',
                            'fields' => array(
                              'field_5a342f8063dc2',
                              'field_5a342f8c63dc3'
                            )
                          );
                          acf_form($edit_options); 
                        ?>
                      </div>
                      <div class="modal-footer bg-ltgrey">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>



              <!-- PRICE MODAL -->
              <div>
                <div id="editModalPrice" class="modal edit-modal-price" tabindex="-2" role="dialog" aria-labelledby="editModalPrice" aria-hidden="true" style="z-index:999999;">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title">Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <?php 
                          $edit_options = array(
                            'form' => true,
                            'post_title' => true,
                            'submit_value' => 'Update',
                            'post_status' => 'publish',
                            'fields' => array(
                              'field_58fcea1153ecb'
                            )
                          );
                          acf_form($edit_options); 
                        ?>
                      </div>
                      <div class="modal-footer bg-ltgrey">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <!-- IMAGES MODAL -->
              <div>
                <div id="editModalImages" class="modal edit-modal-images" tabindex="-2" role="dialog" aria-labelledby="editModalImages" aria-hidden="true" style="z-index:999999;">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title">Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <?php 
                          $edit_options = array(
                            'form' => true,
                            'submit_value' => 'Update',
                            'post_status' => 'publish',
                            'fields' => array(
                              'field_5924ac267c842'
                            )
                          );
                          acf_form($edit_options); 
                        ?>
                      </div>
                      <div class="modal-footer bg-ltgrey">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>



            </div>
          </div>

          </div>
          </section>

          <section class="bg-white medium">
            <div class="container">


          <div class="row">
            <div class="col-xs-12 text-center">
              <h2 class="section-title">Recent Listings</h2>
            </div>

            <div class="row pt2 autoclear">
            <?php 
              $args_ads = array(
                'post_type' => 'fbo_post_products',
                'posts_per_page' => 3,
                'orderby' => 'rand',
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
        </div>
      </section>





    </article>
  <?php endwhile; // end page loop ?>
<?php get_footer(); ?>