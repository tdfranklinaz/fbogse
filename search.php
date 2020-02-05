<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package fbo-theme
 */
get_header(); ?>
<?php if ( have_posts() ) : ?>

<section class="bg-ltgrey medium">
	<div class="container">

		<div class="row">
			<div class="col-sm-6">
				<h3>Search results for: <?php echo get_search_query(); ?></h3>
			</div>
			<div class="col-sm-6">
				<a href="<?php if(is_user_logged_in()): ?>/create-listing<?php else: ?>/register<?php endif; ?>" class="btn btn-blu pull-right hidden-xs">New listing &plus;</a>
			</div>
			
		</div>

		<div class="row pt1">

			<div class="col-sm-3">

				<div class="row hidden-xs">
					<div class="col-xs-12">
						<h4 class="archive-title">Filter</h4>
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

				


					<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							?>

							<?php // function to get all product information blocks
                product_post_meta();  ?>


						<?php 

						endwhile;

						numeric_posts_nav();

					
					?>
					
				

				
				
			</div>

				
		</div>

	</div>
</section>

<?php else:

					get_template_part( 'template-parts/content', 'none' ); 


 endif; ?>

<?php get_footer(); ?>
