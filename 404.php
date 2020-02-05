<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package jak-theme
 */

get_header(); ?>

  <section class="bg-white tall top-section page page-content nav-color error-404 not-found">
    <div>
      <div class="container">
        <div class="row">
          <div class="col-sm-8 gutter">
            <header class="entry-header">
              <h1 class="page-title heading1 nb">We're sorry. The page you requested is not available.</h1><br>
            </header>
            <div class="page-content">
              <p>If you used a bookmark, the page may have been moved, or it no longer exists. If you typed in the URL, please check it and try again.</p><br>
              <p>If this problem persists, please email us: <a href="mailto:support@fbogse.com">support@fbogse.com</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php get_footer();