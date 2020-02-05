<?php 
/*
Template Name: FBO Account settings page
*/
get_header('dashboard'); ?>
	<?php while ( have_posts() ) : the_post(); ?>
	  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<section class="bg-ltgrey medium">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 gutter">
							<h3 class="section-title">Account Settings</h3>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-8 gutter">
              <?php 
                if(is_user_logged_in()) {
                  the_content();
                } else {
                  get_template_part('template-parts/content-login', 'content-login');
                }
              ?>
						</div>
					</div>
				</div>
			</section>

	  </article>
	<?php endwhile; ?>
<?php get_footer('dashboard'); ?>