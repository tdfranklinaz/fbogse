<?php
/*
Template Name: FBO about template
*/
get_header(); ?>

  <?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


      <section class="bg-ltgrey small">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
            <h1 class="text-center">About us - FBOGSE</h1>
            </div>
          </div>
        </div>
      </section>
      
      <section class="tall bg-white">
        <div class="container">

          <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

              <div class="page-entry-content">

              <div class="about-page-content">
                <?php echo get_field('main_content'); ?>
              </div>
                

              </div>

            </div>
          </div>

          <div class="row pt1">
            <div class="col-xs-12">
              <h3 class="section-title text-center">Our Team</h3>
            </div>
          </div>

          <div class="row pt2 text-left">
            <div class="col-sm-4 col-sm-offset-2">
              <div class="well" style="min-height: 251.5px;">
                <img src="https://www.fbogse.com/wp-content/uploads/2020/02/ALECIMG_3987-scaled.jpg" width="100" height="100" style="border-radius: 50%; margin-bottom:15px;">
                <h3 class="service-title">Alec Berger</h3>
                <p class="caption">Co-Owner &middot; Project Manager</p>
              </div>
            </div>
            

            <div class="col-sm-4">
              <div class="well">
                <img src="https://www.fbogse.com/wp-content/uploads/2019/06/IMG_4413.jpeg" width="100" height="100" style="border-radius: 50%; margin-bottom:15px;">
                <h3 class="service-title">Josh Berger</h3>
                <p class="caption">Founder &middot; Marketing</p>
                <p><a href="https://www.linkedin.com/in/joshua-berger-677758171/" target="_block" rel="follow">LinkedIn</a></p>
              </div>
            </div>

          </div>

          <div class="row">
          
          <div class="col-sm-4 col-sm-offset-2">
          <div class="well">
                <img src="https://www.fbogse.com/wp-content/uploads/2018/07/trevor3.jpg" width="100" height="100" style="border-radius: 50%; margin-bottom:15px;">
                <h3 class="service-title">Trevor Franklin</h3>
                <p class="caption">Website Developer</p>
                <p><a href="https://www.linkedin.com/in/trevor-franklin-923187166/" target="_block" rel="follow">LinkedIn</a></p>
              </div>
          </div>
          </div>
        </div>
      </section>






    </article>
  <?php endwhile; // end page loop ?>
<?php get_footer(); ?>