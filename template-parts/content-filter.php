<?php // echo do_shortcode( '[searchandfilter taxonomies="search" types="" headings="Search"]' ); ?>



<?php
// your taxonomy name
$tax = 'product_categories';

// get the terms of taxonomy
$terms = get_terms( $tax, $args = array(
  'hide_empty' => false, // do not hide empty terms
));




?>

<ul class="list-tax-terms">

  <?php 
  
  $count_posts = wp_count_posts( 'fbo_post_products' )->publish; 

  // Check category of current page based on term ID
  $category = get_queried_object();
  //echo $category->term_id;
  //var_dump($category->term_id);


  



  
  
  
  ?>
  
  <li><a class="<?php if( is_null($category->term_id) ): echo 'active'; endif; ?>" href="/ground-support-equipment">All Listings <span class="pull-right"><?php // echo $count_posts; ?></span> </a></li>


<?php 


// loop through all terms
foreach( $terms as $term ) {
  // Get the term link
  $term_link = get_term_link( $term );
  

  if( $term->count > 0 ): ?>



    <li><a class="<?php if($term->term_id == $category->term_id): echo 'active'; endif; ?>" href="<?php echo esc_url($term_link); ?>"><?php echo $term->name; ?> </a></li>


<?php endif;


    

    
}
?>

</ul>

<?php /* <span class="pull-right"><?php echo $term->count; ?></span> */ ?>