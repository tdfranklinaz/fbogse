<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fbo-theme
 */

?>
	</div><!-- #content -->

    <section class="small bg-black section-footer">
      <div class="container">

        <div class="row">
          <div class="col-sm-6 col-xs-12">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo-new-white.png" width="125" alt="fbogse buy and sell ground support equipment online">
          </div>
          <div class="col-sm-6 col-xs-12 text-right">
            <ul class="footer-social">
              <li><a href="https://www.facebook.com/Fbogse-2014622345434342/" target="_blank"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAQAAABKfvVzAAABMklEQVQ4y5XTPUvDUBTG8aeJbxRUsFhfIO6C6FRwdHF19wO4+QGcHCqCoIujX8ZVoyIOChV0cdKmSIuisSb5OzReYknSeKYQzo/Lec69Ul9hSVSo49KkTQvYk7CVXlgSDnf8VggcDQIngE9ASEgXOMwEWBJl7oEgPiECjvNBlWfgG+iwxRobLEqU0sGQxAIt4Au4Mf9Lyi6mDLjKbZQkHFZYpw10gVtqLFPDSW+2JerAO5GJ9JM3YDd1aGyJ/UQ+vQqA7WxwkGiNzNdmL460SHfo8EQYt3/QoMEDq9l7mGCSJV7joa+pUGYcKz+pqon1IvMG/VmcY8AlYznXzswxnzhhdNCW7T4wUgx4xYElMWeAWxQ0/wdmDThnuAiY4QXwgbOiwItfnFsMTPOIj0fIaRr4AbWxjsNZ1bunAAAAAElFTkSuQmCC" alt="FBOGSE Official Facebook" width="24" /></a></li>

              <li><a href="https://twitter.com/fbogse1" target="_blank"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAQAAABKfvVzAAABz0lEQVQ4y3XUvWsUURQF8Ds7mxhEAgELiwgWIiKp1CKmUxBEEUSwUrETElJIilUbC0NQELW0CBYWWlmolSAKFvoXqIjEIhDUQkj8QLO7s/uz2NnZT28z7+Occ8/cd9+LCEkMDSVpPkqVuuehNAzeNy+3B0mulgzCHXTZHVfN5Ks7bYsI0w5ESIuEoRQhccUPrfht0bQl122JCA99tjciwoikyDkPMpkGqFp10WQY8wLvHMvVR4xGmLSCTU1NTXXw0QOHQtlT8NMtewpTx9XJtVuZWHOhtVnJF1hx1wm7IpySdRGaYKGttt1zVPPlPz545pWsALa/ZyOUwrg5y9aRqRUQXfB2ptN5QTzGr2Krri7rIbYMf7c/QhoRTnaptLV7CTW8NVGct2s9jvujKcON/EiVIoy55H2f707UsWGmbagUYcI93/wd8N6SqGO51bWd5lsYUptWbGLVVHe/liMizPpkQ62PUkXTuQhJVz/nWSYsWu+qV0MVVHruR66f2mfWGw00NGRqeYfNF+5zwm4Vj7z2pShhx9JLR/rgEbY66r61vl/96onzxgfgBW2Hw+Ysue2mijOmjHauf//bUPrPq5EUhRzYSpW7aRKpdPjz8w9ie5FKmZeeUQAAAABJRU5ErkJggg==" alt="FBOGSE Offical Twitter" width="24" /></a></li>

              <li><a href="https://www.instagram.com/fbogse/" target="_blank"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAQAAABKfvVzAAACGUlEQVQ4y4XUzYvVZRQH8O+987tj5tDowkR0aO4ovoJCL+MmMqRAkFmEhrZQpEIU1zMqCJYUtSqcxMDBFoFtQkwRHPQPEGIUQ1oqdxJ0DC0D2zjUx8X9OffqjPoceOAcznnO93teniRJopoXHFWVllJJEsttsdseu+15Qrbr99KUn4pKotdRf3n2OW99GaKaWOIS7jntqGHDjrTd3znhGv4x0EL3Iy5445n4X3EQ19Wb6jqTblo9M30LfO5jhePY1zTtxfeJikJHklhmkw+8ZXZiC6jrx6giicPYn6joSCzwlQb42ylr9fjZCbP1ueuK7iS+xGCilljoLB666LQ/0PBOoiux3G2/tQKGSsTfYMzbZql5zTGMmV/CnGgPGEwSa9zxQP8U4TlGsbds68S0DLbhlGqiU6Ga+AQjqomVM0CyEyNJoiNRJDbjJ53TA5qQNvrfmO5EoUgSX+DrJLFiJg7zXWoVIPGueya9PxPpoRLChyYxYsB7DriDb5u9f5r0YBN34lO326Z02LxE51Qf5iZxEJ8lquVbrzvsjFHHDCgSVUVijft+1ZXEVpxVKYvZzPOyrpJHTaFWVvBk09TjBnY8d0GXuYqPHqu78K9D3tSnrlefpZZaoq6ubpXtLuMXc8r5VzHkPzwwrmFco5Rx4xr+BOf0lttSUt3gB7+7ZWKaXHfeLt2PP4u2LTPPIj0W62mTxV5Va3k9AlS9UHp17F7AAAAAAElFTkSuQmCC" alt="FBOGSE Official Instagram" width="24" /></a></li>
				
				<li><a href="https://www.linkedin.com/company/18911685" target="_blank"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAACXBIWXMAAAsTAAALEwEAmpwYAAAA0klEQVQ4jcWTQU6CMRBG3xRUEjeScBgvYkKMCziAiW48D3fwFiyNC+5AINEgbMDnQn6tjU3+343fauZ1+nWmTQFQQw3+oKROgRWwVK87O6hvfmvduQPgOcufuhqEegFMgHdgFhGvXQ1Oj50kIEXE5nih51ndFhgBl8AQWADziBB/ag+gpoLfq5uCPapnoZqddIiIvtoD9jkHer9M8JBqoxX5C3AH3ALLjF/VRjgp+LjZod5kfNe2g0UlHtQMarx1Yet/8f8GfT7fuFETR8FLfa19ACSerrQtk98uAAAAAElFTkSuQmCC" alt="FBOGSE Official LinkedIn" width="24"></a></li>
            </ul>
          </div>

          

        </div>

        <div class="row pt1">

          <div class="col-sm-4">
            <h4>Contact Us</h4>
            <p><a href="mailto:contact@fbogse.com">contact@fbogse.com</a></p>
            <p>1658 S Litchfield Rd Room 205</p>
            <p>Goodyear, AZ 85338</p>
            <br>
          </div>

          <div class="col-sm-4">
            <h4>Browse</h4>
            <p><a href="/ground-support-equipment">Browse GSE</a></p>
            <p><a href="/about">About us</a></p>
            <p><a href="/contact">Contact us</a></p>
            <br>
          </div>

          <div class="col-sm-4">
            <h4>Users</h4>
            <p><a href="/account-login">Log in</a></p>
            <p><a href="/register">Sign up</a></p>
            <br>
          </div>
        </div>

        <div class="row pt">
          
          <div class="col-xs-12">
            <p>Copyright &copy; 2019 FBOGSE LLC</p>
          </div>
        </div>
          
      </div>
    </section>

    


	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


</body>
</html>
