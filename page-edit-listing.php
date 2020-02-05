<?php acf_form_head(); ?>
<?php
/*
Template Name: FBO edit listing template
*/
get_header('dashboard'); ?>

  <?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <section class="medium bg-ltgrey">
        <div class="container">

          <div class="row">
            <div class="col-xs-12 gutter text-center">
              <h3 class="section-title">Edit your listing</h3>
              <p>Update the photos and content on your listing.</p>
            </div>
          </div>

          <div class="row pt1">
            <div class="col-sm-8 col-sm-offset-2 gutter bg-white">
              <?php 


                $edit_options = array(
                  'post_id' => 'user_'.$current_user->ID,
                  'field_groups' => 'group_58fce6a5217c0',
                  'submit_value' => 'Update'
                );

                acf_form($edit_options);





              ?>
            </div>
          </div>
        </div>
      </section>


    </article>
  <?php endwhile; // end page loop ?>
<?php get_footer('dashboard'); ?>