<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package fbo-theme
 */
?>
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
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="row">
    <div class="col-sm-3">
      <header class="entry-header">
        <?php the_title( '<h1 class="page-title" >', '</h1>' ); ?>
      </header><!-- .entry-header -->
    </div>
    <div class="col-sm-9">
      <?php if ( has_post_thumbnail() ) : ?>
        <div class="img-aspect-16-9 mb b-lazy" style="background-image: url('<?php echo $medium_image; ?>');" data-src="<?php echo $large_image; ?>|<?php echo $huge_image; ?>"></div>
      <?php endif; ?>

      <div class="entry-content">
        <?php the_content(); ?>
        <?php
          wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'alpha' ),
            'after'  => '</div>',
          ) );
        ?>
      </div><!-- .entry-content -->

      <footer class="entry-footer">
        <?php edit_post_link( __( 'Edit', 'alpha' ), '<span class="edit-link">', '</span>' ); ?>
      </footer><!-- .entry-footer -->
    </div>
  </div>
</article><!-- #post-## -->
