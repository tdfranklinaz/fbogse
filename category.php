<?php
/**
* A Simple Category Template
*/

get_header(); ?> 

	<section class="medium bg-white top-section">
		<div class="container">

			<?php 
			// Check if there are any posts to display
			if ( have_posts() ) : ?>

				<header class="archive-header">
					<h1 class="archive-title">Category: <?php single_cat_title(); ?></h1>


					
				</header>

			<?php while ( have_posts() ) : the_post(); ?>

				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

					<div class="entry">
						<?php // the_content(); ?>
					</div>

			<?php endwhile; 

			else: ?>
				<div class="row">
          <div class="col-xs-12">
            <p class="error text-center">Sorry, no matches were found for '<?php single_cat_title(); ?>'.</p>
          </div>
        </div>

			<?php endif; ?>
		</div>
	</section>


<?php get_sidebar(); ?>
<?php get_footer(); ?>