<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package fbo-theme
 */

function product_post_meta() {

	if ( has_post_thumbnail() ) {
    $large_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
    $large_image = $large_image[0];
    $medium_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium');
    $medium_image = $medium_image[0];
  } else {
    $large_image = false;
    $medium_image = false;
  }

	// custom fields
	$excerpt = get_field('equipment_excerpt'); 
	$description = get_field('equipment_description');
	$price = get_field('equipment_price');

	$equipment_city = get_field('equipment_city');
	$equipment_state = get_field('equipment_state');

	?>
	<div class="post-listing">
    <article>
      <header>
        <div class="col-sm-3 col-xs-6">
        	<a href="<?php the_permalink(); ?>">
						<div class="img-aspect-4-3" style="background-image: url('<?php echo $medium_image; ?>'); ">
						</div>
          </a>
        </div>
        <div class="col-sm-9 col-xs-9 gutter">
          <a href="<?php the_permalink(); ?>">
            <h2 class="post-title"><?php the_title(); ?></h2>
          </a>
          <div class="post-meta">
            
            <p class="price"><?php echo get_field('equipment_price'); ?> &middot; <?php echo $equipment_city; ?>, <?php echo $equipment_state; ?></p>

            <p class="location">

              <a href="<?php the_permalink(); ?>" class="goto-listing">View Listing &rarr;</a>

            </p>

            
          </div>
        </div>
      </header>
    </article>
  </div>
  <?php 

}

function numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 ):
		echo '<p class="text-center">End of results</p>';
		return;
	endif;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="product-navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}

if ( ! function_exists( 'alpha_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function alpha_paging_nav() {
  // Don't print empty markup if there's only one page.
  if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
    return;
  }
  ?>
  <nav class="navigation paging-navigation" role="navigation">
    <h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'alpha' ); ?></h1>
    <div class="nav-links">

      <?php if ( get_next_posts_link() ) : ?>
      <div class="col-xs-6 text-left nav-previous"><?php next_posts_link( __( '<span class="meta-nav">></span> Older posts', 'alpha' ) ); ?></div>
      <?php endif; ?>

      <?php if ( get_previous_posts_link() ) : ?>
      <div class="col-xs-6 text-right nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav"><</span>', 'alpha' ) ); ?></div>
      <?php endif; ?>

    </div><!-- .nav-links -->
  </nav><!-- .navigation -->
  <?php
}
endif;

if ( ! function_exists( 'alpha_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function alpha_post_nav() {
  // Don't print empty markup if there's nowhere to navigate.
  $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
  $next     = get_adjacent_post( false, '', false );
  $viewall  = home_url('/blog');

  if ( ! $next && ! $previous ) {
    return;
  }
  ?>
  <nav class="navigation post-navigation" role="navigation">
    <h1 class="screen-reader-text"><?php _e( 'Post navigation', 'alpha' ); ?></h1>
    <div class="nav-links row">
      <?php
        if(get_previous_post_link() != ""){
          previous_post_link( '<div class="col-xs-6 text-left nav-previous">%link</div>', _x( '<span class="meta-nav"><</span>&nbsp;%title', 'Previous post link', 'openform' ) );
        } else {
          echo "<div class='col-xs-6'><a href='$viewall'>View all posts</a></div>";
        }
        if(get_next_post_link() != ""){
          next_post_link(     '<div class="col-xs-6 text-right nav-next">%link</div>',     _x( '%title&nbsp;<span class="meta-nav">></span>', 'Next post link',     'openform' ) );
        } else {
          echo "<div class='col-xs-6 text-right'><a href='$viewall'>View all posts</a></div>";
        }
      ?>
    </div><!-- .nav-links -->
  </nav><!-- .navigation -->
  <?php
}
endif;
