<?php
/**
 * @package alpha
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
  if(!$huge_image){
    $huge_image = $large_image;
  }
  //vars
?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <section class="bg-image padding-hero" style="background: url('<?php echo $huge_image; ?>'); background-size: cover; background-position: center center;"></section>

    <section class="bg-white medium">
      <div class="container">
        <div class="row text-center">
          <div class="col-sm-8 col-sm-offset-2">
            <h1><?php the_title(); ?></h1>
          </div>
        </div>

        <div class="row pt2">
          <div class="col-sm-8 col-sm-offset-2">
            <div class="blog-entry-content">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    

  </article><!-- #post-## -->
