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

              
              
                <p>FBOGSE is the best online platform for finding <a href="/ground-support-equipment" rel="follow">ground support equipment</a> online. Our online directory features equipment from accross the globe. Whether you are buying or <a href="/register">selling</a> you can get in touch with the right person for your operation.</p><br>

                <p>We are dedicated to helping FBOs and other businesses sell their new or used ground support equipment. Our mission is to provide an easy to use and intuitive platform to create listings, buy, sell, and connect with others all across the country.</p><br>

                <p>We are a start-up working hard to create a community of active buyers and seller of ground support equipment. Our modern approach to the website and marketing strategy allow for users to find your equipment quickly and easily.</p>

              </div>

            </div>
          </div>

          <div class="row pt2">
            <div class="col-xs-12">
              <h3 class="section-title text-center">Our Team</h3>
            </div>
          </div>

          <div class="row pt2 text-left">
            <div class="col-sm-4 col-sm-offset-2">
              <div class="well">
                <img src="https://www.fbogse.com/wp-content/uploads/2018/07/trevor3.jpg" width="100" height="100" style="border-radius: 50%; margin-bottom:15px;">
                <h3 class="service-title">Trevor Franklin</h3>
                <p class="caption">Founder &middot; Developer</p>
                <p><a href="https://www.linkedin.com/in/trevor-franklin-923187166/" target="_block" rel="follow">LinkedIn</a></p>
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
        </div>
      </section>






    </article>
  <?php endwhile; // end page loop ?>
<?php get_footer(); ?>