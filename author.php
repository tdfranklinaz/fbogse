<?php get_header();

// Set the Current Author Variable $curauth
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>

<section class="bg-ltgrey top-section small">
  <div class="container">
    <div class="row">

      <div itemscope itemtype="http://schema.org/LocalBusiness" class="col-xs-12 col-sm-10">
        <img itemprop="image" src="<?php echo $curauth->bizLogo; ?>" width="125">
        <h1 itemprop="name" class="pt">
          <?php echo $curauth->bizName; ?>
        </h1>
        <div class="author-meta pt">
          <p><?php echo $curauth->user_firstname, " ", $curauth->user_lastname; ?></p>
          <p><strong>Phone:</strong>&nbsp;<span itemprop="telephone"><?php echo $curauth->bizPhone; ?></span></p>
          <p><strong>Website:</strong>&nbsp;<a itemprop="url" href="<?php echo $curauth->bizWeb; ?>"><?php echo $curauth->bizWeb; ?></a></p>
            
        </div>
      </div>

    </div>
  </div>
</section>

<section class="bg-white medium">
  <div class="container">
    <div class="row">
      <div class="col-sm-9">

            <h4 class="archive-title">
              User Listings
            </h4>

            <?php
              /* Start the Loop */
              $args_author = array(
                'post_type' => 'fbo_post_products',
                'posts_per_page' => -1,
                'author' => $curauth->ID
              );
              $loop = new WP_Query( $args_author );
              while ( $loop->have_posts() ) : $loop->the_post();  

                // function to get all product information blocks
                product_post_meta(); 

              endwhile;

                // the_posts_navigation();
                numeric_posts_nav(); 

            ?>
      </div>
    </div>
  </div>
</section>
     
  
     

<?php get_footer(); ?>