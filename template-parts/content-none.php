<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fbo-theme
 */
?>


<section class="bg-ltgrey medium">
	<div class="container">

		<div class="row">
			<div class="col-sm-6">
				<h3>No Results Found</h3>
			</div>
			<div class="col-sm-6">
				<a href="<?php if(is_user_logged_in()): ?>/create-listing<?php else: ?>/register<?php endif; ?>" class="btn btn-blu pull-right hidden-xs">New listing &plus;</a>
			</div>
			
		</div>

		<div class="row pt1" style="overflow: hidden;">
			<div class="col-sm-3">

				<div class="row hidden-xs">
					<div class="col-xs-12">
						<h4 class="archive-title">Filter</h4>
						<?php include('content-filter.php'); ?>
					</div>
				</div>

				<div class="row visible-xs">
					<div class="col-sm-3">

						<button class="btn btn-primary visible-xs btn-filter" type="button" data-toggle="collapse" data-target="#searchParameters" aria-expanded="false" aria-controls="searchParameters">
							Filter &plus;
						</button>

							<div class="collapse dont-collapse-sm" id="searchParameters">
								<?php include('content-filter.php'); ?>
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
					
					
				
			</div>
		</div>
	</div>
</section>

<!-- .no-results -->