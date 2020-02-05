<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fbo-theme
 */
get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<section class="bg-ltgrey small">
		<div class="container">

      <div class="row">
        <div class="col-xs-12">
          <h1 style="font-size:28px;">Browse Ground Support Equipment</h1>
        </div>
        
      </div>

			<div class="row pt2" style="overflow: hidden;">
				<div class="col-sm-3">

          <div class="row hidden-xs">
            <div class="col-xs-12">
              <?php include('template-parts/content-filter.php'); ?>
            </div>
          </div>

          <div class="row visible-xs">
            <div class="col-xs-12">

            <button class="btn btn-primary visible-xs btn-filter" type="button" data-toggle="collapse" data-target="#searchParameters" aria-expanded="false" aria-controls="searchParameters">
              Filter &plus;
            </button>

              <div class="collapse dont-collapse-sm" id="searchParameters">
                <?php include('template-parts/content-filter.php'); ?>
              </div>

              <style>
                @media (min-width: 768px) {
                  .collapse.dont-collapse-sm {
                    display: block;
                    height: auto !important;
                    visibility: visible;
                  }
                }
              </style>
              
            </div>
          </div>

				</div>




				<div class="col-sm-9">

          <!-- Query Featured Listings -->
          <div class="featured-listing-spacing-container" style="margin-bottom:50px;">
            <?php
              $args_featured = array(
                'post_type' => 'fbo_post_products',
                'posts_per_page' => -1,
                'orderby' => 'DESC',
                'meta_key'		=> 'equipment_featured',
                'meta_value'	=> 'yes'
              );
              $loop = new WP_Query( $args_featured ); 
              if ( $loop->have_posts() ) : ?>
              
              <?php 
              while ( $loop->have_posts() ) : $loop->the_post(); ?>

                <div class="post-listing-featured">
                  <?php product_post_meta(); ?>
                </div>

            <?php endwhile; endif; wp_reset_postdata();  ?>
          </div>



					<?php if ( have_posts() ) : ?>
						<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post(); 

                // function to get all product information blocks
							  product_post_meta(); 

              endwhile;

						    // the_posts_navigation();
                numeric_posts_nav();

						  else:

						    get_template_part( 'template-parts/content', 'none' ); ?>

            <?php endif; ?>


				</div>
			</div>
		</div>
	</section>

</article>

<?php
get_sidebar();
get_footer();