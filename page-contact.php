<?php
/*
Template Name: FBO Contact Template
*/
get_header(); ?>

  <?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <section class="bg-ltgrey medium">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <h1>Contact Us</h1>
            </div>
          </div>
        </div>
      </section>

      <section class="bg-wihte padding-small">
        <div class="container">
          <div class="row">
            <div class="col-sm-7">
              <?php the_content(); ?>
            </div>
            <div class="col-sm-4 col-sm-offset-1">
              <h4>Contact Information</h4><hr>
              <p>Have a question regarding advertising with FBOGSE?</p><br>
              <p>Have questions regarding pricing?</p><br>
              <p>Request bulk listing price:</p><br>
              <p>For more information regarding FBOGSE:</p><br>

              <p>Email: <a href="mailto:contact@fbogse.com">contact@fbogse.com</a></p>

              <p>Or call: <a href="tel:4807204262">(480) 650-8541</a></p>
              
              <hr>

              

            </div>
          </div>
        </div>
      </section>

    </article>
  <?php endwhile; // end page loop ?>
<?php get_footer(); ?>