<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fbo-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="col-sm-3 gutter">
		<div class="img-aspect-4-3" style="background-image: url('<?php echo $medium_image; ?>'); "></div>
	</div>
	<div class="col-sm-6 gutter">
		<h1 class="post-title"><?php the_title(); ?></h1>
		<p><?php echo $description; ?></p>
	</div>
	<div class="col-sm-3 gutter">
		<ul>
      <li><p><b>Price:</b> <?php echo $price; ?></p></li>
      <li><p><b>Location:</b> <?php echo $location; ?></p></li>
      <li><p><b>Owner:</b> <?php the_author(); ?></p></li>
    </ul>
    <a href="<?php the_permalink(); ?>" class="btn btn-blu">View Listing</a>
	</div>
</article><!-- #post-## -->
