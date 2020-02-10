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

	<?php $post_id = 2; $featured_home = get_the_post_thumbnail_url( $post_id, 'huge' ); ?>

<!-- Hero Section -->
<section class="bg-hero padding-large" style="background-image: linear-gradient(90deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('<?php echo $featured_home; ?>'); background-size: cover; background-position: center;">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
				<h1 class="hero">Search results for: <?php echo get_search_query(); ?></h1><br>

				<!-- Search form -->
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
</section>

<section class="bg-ltgrey medium">
	<div class="container">

		<div class="row">

			<!-- <div class="col-sm-3">

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

			</div> -->
			
			<div class="col-sm-8 col-sm-offset-2">

				


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
