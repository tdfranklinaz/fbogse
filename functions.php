<?php
/**
 * fbo-theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fbo-theme
 */

if ( ! function_exists( 'fbo_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fbo_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on fbo-theme, use a find and replace
	 * to change 'fbo-theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'fbo-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );


  /**
   * Custom Image Sizes
   *
   * POINTBLANK
   */
  // add_image_size( 'huge', 2000, 2000 );
  // add_image_size('featured_preview', 55, 55, true);

	// Nav Menu Locations
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'fbo-theme' ),
	) );
  register_nav_menus( array(
    'footer1' => esc_html__( 'footer1', 'fbo-theme' ),
  ) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
  // POINTBLANK - don't want this. comment it out.
	// add_theme_support( 'post-formats', array('aside','image','video','quote','link', ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'fbo_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );


  /*
   * Enable additional user fields in admin
   * See http://davidwalsh.name/add-profile-fields
   */
  function modify_contact_methods($profile_fields) {
    // Add new fields
    // $profile_fields['position'] = 'Position Title';

    // Remove old fields
    unset($profile_fields['admin_color']);
    unset($profile_fields['comment_shortcuts']);
    unset($profile_fields['admin_bar_front']);
    unset($profile_fields['aim']);
    unset($profile_fields['url']);
    unset($profile_fields['yim']);
    unset($profile_fields['jabber']);

    // Remove extra social fields
    unset($profile_fields['twitter']);
    unset($profile_fields['facebook']);
    unset($profile_fields['linkedin']);
    unset($profile_fields['instagram']);
    

    return $profile_fields;
  }
  add_filter('user_contactmethods', 'modify_contact_methods');

  // remove color options from Admin User Profile
  remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );

}
endif;
add_action( 'after_setup_theme', 'fbo_theme_setup' );

/**
 * Enqueue scripts and styles.
 */
function fbo_theme_scripts() {
	wp_enqueue_style( 'fbo-theme-style', get_stylesheet_uri() );

  wp_enqueue_script( 'jquery', get_stylesheet_directory_uri() . '/js/jquery-1.9.1.min.js', array(), '1.9.1', true );
  wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.2', true );
  wp_enqueue_script( 'blazy', get_stylesheet_directory_uri() . '/js/blazy.min.js', array(), '1.3.1', true );

  /* main scripts */
  wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery','blazy'), '1.12', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fbo_theme_scripts' );

// load scripts on Admin Page
function fbo_admin_scripts($hook) {
    wp_enqueue_script( 'adminscript', get_template_directory_uri() . '/js/admin.js', array(), '20160907', false );
}
add_action( 'admin_enqueue_scripts', 'fbo_admin_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Enqueue scripts and styles.
 */
function fbo_styles() {
  $use_grunt_dist = false;

  if ($use_grunt_dist){
    // If `grunt dist` is run to package the final css, use this stylesheet
    wp_enqueue_style( 'main_dist_styles', get_stylesheet_directory_uri() . '/css/tidy.min.css', array(), '20150514b' );
  }
  else{
    // If just `grunt watch` is being used, use these stylesheets
    wp_enqueue_style( 'main_styles', get_stylesheet_directory_uri() . '/css/styles.css', array(), '20160420' );
    //wp_enqueue_style( 'extra_dist_styles', get_stylesheet_directory_uri() . '/css/extra-dist-css.css', array(), '20150514' );
  }
}
add_action( 'wp_enqueue_scripts', 'fbo_styles' );

/*
    Excerpt
*/
// Length
function custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function new_excerpt_more($more) {
    global $post;
    return '<a class="moretag" href="'. get_permalink($post->ID) . '">...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/*
 * ADMIN POSTS LISTS
 */

// GET FEATURED IMAGE
function fbo_get_featured_image($post_ID) {
    $post_thumbnail_id = get_post_thumbnail_id($post_ID);
    if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'thumbnail');
        return $post_thumbnail_img[0];
    }
}

/*
 * ACF options page
 */
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page();  
}

/*
 * Hide Admin Bar
 */
//add_filter('show_admin_bar', '__return_false');

/*
 * Login Logo
 *
 * Ref: https://codex.wordpress.org/Customizing_the_Login_Form
 */
function my_login_logo() { ?>
  <style type="text/css">
    #login h1 a, .login h1 a {
      background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/logo-new.png); ?>');
      width: 60%;
      background-size: contain;
    }
    body.login {
      background: #fff;
    }
  </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

/*
 * Redirect to dashbaord after login
 *
 * Ref: http://stackoverflow.com/questions/8127453/redirect-after-login-on-wordpress
 */
function admin_default_page() {
  return '/dashboard';
}

add_filter('login_redirect', 'admin_default_page');

// Add Javascript to redirect anyone but administrators out of the admin area after some time
function my_enqueue( $hook ) {
  if (current_user_can( 'subscriber' )) {
      wp_enqueue_script( 'my_custom_script', '/wp-content/themes/fbo-theme/js/block-admin.js' );
  }
}
add_action('admin_enqueue_scripts', 'my_enqueue');

// Add CSS to hide everything in the admin while the JS above does it's trick
add_action('admin_head', 'hide_admin_via_css');
function hide_admin_via_css() {
  if (current_user_can( 'subscriber' )) {
    echo '<style>body * { dispaly: none !important; visibility: hidden !important; }</style>';
  }
}

/*
 * Failed login redirect back to login apge
 *
 * Ref: https://pento.net/2011/06/19/preventing-users-from-accessing-wp-admin/
 */
add_action( 'wp_login_failed', 'my_front_end_login_fail' );  // hook failed login

function my_front_end_login_fail( $username ) {
   $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
   // if there's a valid referrer, and it's not the default log-in screen
   if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
      wp_redirect( $referrer . '?login=failed' );  // let's append some information (login=failed) to the URL for the theme to use
      exit;
   }
}

/*
 * 
 * Change wordpress admin styles
 *
 */
function custom_admin_bar(){
  echo '
    <style type="text/css">
      /* Admin bar */
      #wpadminbar {
        background: #fafbfc;
        border-bottom: solid 1px #e1e4e8;
      }
      #wpadminbar .ab-empty-item, #wpadminbar a.ab-item, #wpadminbar>#wp-toolbar span.ab-label, #wpadminbar>#wp-toolbar span.noticon {
        color: #24292e;
      }
      #wpadminbar .ab-icon:before,
      .wp-admin #wpadminbar #wp-admin-bar-site-name>.ab-item:before {
        color: #24292e;
      }
      /* Custom Logo */
      #wp-admin-bar-wp-logo .ab-icon:before{ content:"" !important; }
      #wp-admin-bar-wp-logo .ab-icon,
      #wpadminbar>#wp-toolbar>#wp-admin-bar-root-default #wp-admin-bar-wp-logo .ab-icon { 
        background-image: url(' . get_stylesheet_directory_uri() . '/img/logo-sm.jpg) !important; 
        background-size: cover;
        background-repeat: cover;
        margin-top: 2px;
        padding: 0 !important;
        width: 30px;
        height: 30px;
        border-radius: 0%;
      }
      /* Left nav - Active Menu item */
      #adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu .wp-menu-arrow, #adminmenu .wp-menu-arrow div, #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, .folded #adminmenu li.current.menu-top, .folded #adminmenu li.wp-has-current-submenu {
        background: #4A90E1;
        color: #ffffff;
        font-weight: bold;
        text-transform: uppercase;
      }
      /* Left nav - Active Menu item text color */
      #adminmenu .current div.wp-menu-image:before, #adminmenu .wp-has-current-submenu div.wp-menu-image:before, #adminmenu a.current:hover div.wp-menu-image:before, #adminmenu a.wp-has-current-submenu:hover div.wp-menu-image:before, #adminmenu li.wp-has-current-submenu a:focus div.wp-menu-image:before, #adminmenu li.wp-has-current-submenu.opensub div.wp-menu-image:before, #adminmenu li.wp-has-current-submenu:hover div.wp-menu-image:before {
        color: #ffffff;
      }
      /* Left nav - Menu Alert Badge */
      #adminmenu .awaiting-mod, #adminmenu .update-plugins {
        background: #eb5424;
      }
      /* Left nav - Hover Menu item text color*/
      #adminmenu li.menu-top:hover, #adminmenu li.opensub>a.menu-top, #adminmenu li>a.menu-top:focus,
      #adminmenu .wp-submenu a:focus, #adminmenu .wp-submenu a:hover, #adminmenu a:hover, #adminmenu li.menu-top>a:focus {
        color: #fff;
      }
      /* Left nav background */
      #adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap {
        background: #24292e;
      }
      /* Admin buttons */
      .wp-core-ui .button-primary,
      .wp-core-ui .button.button-primary.button-hero {
        background: #4A90E1;
        border-color: #4A90E1;
        border-radius: 5px;
        box-shadow: none;
        text-shadow: none;
      }
      .wp-core-ui .button-primary.focus, .wp-core-ui .button-primary.hover, .wp-core-ui .button-primary:focus, .wp-core-ui .button-primary:hover {
        background: #65a1e6;
        border-color: #65a1e6;
        box-shadow: none;
        text-shadow: none;
      }
    </style>
  ';
}
add_action( 'admin_head', 'custom_admin_bar' );

/*
 * Nobody is gonna mess with my code thorugh the wp-admin
 *
 * Ref: https://premium.wpmudev.org/blog/wordpress-security-tips/
 */
define( 'DISALLOW_FILE_EDIT', true );

/* Get rid of gravatars */
update_option( 'show_avatars', 0 );

/* Adding Image Upload Fields */
add_action( 'show_user_profile', 'business_logo_field' );
add_action( 'edit_user_profile', 'business_logo_field' );

function business_logo_field( $user ) { 
?>

	<h3>Profile Images</h3>

	<style type="text/css">
		.fh-profile-upload-options th,
		.fh-profile-upload-options td,
		.fh-profile-upload-options input {
			vertical-align: top;
		}

		.user-preview-image {
			display: block;
			height: auto;
			width: 300px;
		}

	</style>

  <table class="form-table">

    <tr>
      <th><label for="bizLogo">Business Logo</label></th>

      <td>
        <img src="<?php echo esc_attr( get_the_author_meta( 'bizLogo', $user->ID ) ); ?>" style="height:50px;">
        <input type="text" name="bizLogo" id="image" value="<?php echo esc_attr( get_the_author_meta( 'bizLogo', $user->ID ) ); ?>" class="regular-text" /><input type='button' class="button-primary" value="Upload Image" id="uploadimage"/><br />
        <span class="description">Please upload your logo for your business profile.</span>
      </td>
    </tr>

  </table>

	<script type="text/javascript">
        jQuery(document).ready(function() {
        
            jQuery(document).find("input[id^='uploadimage']").live('click', function(){
                //var num = this.id.split('-')[1];
                formfield = jQuery('#image').attr('name');
                tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
     
                window.send_to_editor = function(html) {
                    imgurl = jQuery('img',html).attr('src');
                    jQuery('#image').val(imgurl);
                    
                    tb_remove();
                }
     
                return false;
            });
        });
    </script>

<?php 
}

add_action( 'admin_enqueue_scripts', 'enqueue_admin' );

function enqueue_admin()
{
	wp_enqueue_script( 'thickbox' );
	wp_enqueue_style('thickbox');

	wp_enqueue_script('media-upload');
}

/*
 * Custom user fields for collecting more fbo information at sign up
 *
 * ref1: http://justintadlock.com/archives/2009/09/10/adding-and-using-custom-user-profile-fields
 * ref2: https://www.gravityhelp.com/forums/topic/user-registration-add-on-can-i-add-custom-fields
 */
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>

  <h3>Business Profile Information</h3>

  <table class="form-table">

    <!-- business name -->
    <tr>
      <th><label for="bizName">Business Name</label></th>
      <td>
        <input type="text" name="bizName" id="bizName" value="<?php echo esc_attr( get_the_author_meta( 'bizName', $user->ID ) ); ?>" class="regular-text" /><br />
        <span class="description">The name of the organization they applied with.</span>
      </td>
    </tr>

    <!-- business phone number -->
    <tr>
      <th><label for="bizPhone">Business Phone Number</label></th>
      <td>
        <input type="text" name="bizPhone" id="bizPhone" value="<?php echo esc_attr( get_the_author_meta( 'bizPhone', $user->ID ) ); ?>" class="regular-text" /><br />
        <span class="description">Phone number of their organization.</span>
      </td>
    </tr>

    <!-- business website -->
    <tr>
      <th><label for="bizWeb">Business Website</label></th>
      <td>
        <input type="text" name="bizWeb" id="bizWeb" value="<?php echo esc_attr( get_the_author_meta( 'bizWeb', $user->ID ) ); ?>" class="regular-text" /><br />
        <span class="description">Website of organization.</span>
      </td>
    </tr>

    <!-- Show Business Fields on Listings -->
    <tr>
      <th><label for="showBiz">Show Business Profile on Listings</label></th>
      <td>

        <input type="checkbox" name="showBiz" id="showBiz" value="no" <?php if (esc_attr( get_the_author_meta( "showBiz", $user->ID )) == "no") echo "checked"; ?> /><br />

        <span class="description">Show business profile on listings.</span>
      </td>
    </tr>

  </table>
<?php }

add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

  if ( !current_user_can( 'edit_user', $user_id ) )
    return false;

  /* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
  // business info
  update_usermeta( $user_id, 'bizName', $_POST['bizName'] );
  update_usermeta( $user_id, 'bizPhone', $_POST['bizPhone'] );
  update_usermeta( $user_id, 'bizWeb', $_POST['bizWeb'] );
  update_user_meta( $user_id, 'bizLogo', $_POST[ 'bizLogo' ] );

  // show business info on profile page field
  update_user_meta( $user_id, 'showBiz', $_POST[ 'showBiz' ] );
}

/*
 * Change author permalinks to user 
 *
 * Ref: https://wordpress.stackexchange.com/questions/31418/how-to-change-author-base-without-front
 */
function change_author_permalinks() {
    global $wp_rewrite;
    $wp_rewrite->author_base = 'user';
}
add_action('init','change_author_permalinks');

/*
 * Get 'user' full name
 *
 * Ref: https://wordpress.stackexchange.com/questions/84950/get-author-full-name
 */
function get_author_fullname() {

  $fname = get_the_author_meta('first_name');
  $lname = get_the_author_meta('last_name');
  $full_name = '';

  // check if names are missing
  if( empty($fname)){
    $full_name = $lname;
  } elseif( empty( $lname )){
    $full_name = $fname;
  } else {
    //both first name and last name are present
    $full_name = "{$fname} {$lname}";
  }

  echo $full_name;

}
add_action('init','get_author_fullname');

/*
 * Filter search results to listings
 *
 *ref: https://wptheming.com/2015/11/limit-search-form-to-specific-post-types/
*/
function prefix_limit_post_types_in_search( $query ) {
  if ( $query->is_search ) {
    $query->set( 'post_type', 'fbo_post_products' );
  }
  return $query;
}
add_filter( 'pre_get_posts', 'prefix_limit_post_types_in_search' );

/*
 * Add tab to view post author on edit screen of custom post type
 *
 * Ref: https://wordpress.stackexchange.com/questions/268900/display-post-author-for-custom-post-type-in-edit-post-screen
*/
function add_author_support_to_posts() {
   add_post_type_support( 'fbo_post_products', 'author' ); 
}
add_action( 'init', 'add_author_support_to_posts' );

/*
 * Admin Footer Credentials
 *
 * Ref: http://www.wpbeginner.com/wp-themes/change-the-footer-in-your-wordpress-admin-panel/
 */
function remove_footer_admin () {
  echo 'FBOGSE LLC';
}
add_filter('admin_footer_text', 'remove_footer_admin');



/*
 * The amount of posts on archive page
 */
function wpsites_query( $query ) {
if ( $query->is_archive() && $query->is_main_query() && !is_admin() ) {
        $query->set( 
          'posts_per_page', 15
        );
        $query->set(
          'orderby', 'rand'
        );


    }
}
add_action( 'pre_get_posts', 'wpsites_query' );



// Redirect users to login page if they are not logged in
// add_action( 'template_redirect', function() {

//   $redirect_pages = is_page( array(
//     'dashboard',
//     'create-listing',
//     'dashboard/account-settings',
//     'dashboard/edit-listing'
//   ));

//   if( $redirect_pages && !is_user_logged_in() ) {
//     wp_redirect( home_url('/log-in') );
//     exit();
//   }

//   $logged_pages = is_page( array(
//     'register'
//   ));

//   if( $logged_pages && is_user_logged_in() ) {
//     wp_redirect( home_url('/dashboard') );
//     exit();
//   }

// });

/* 
 * Phone format for Gravity Forms 
 * Ref: https://docs.gravityforms.com/gform_phone_formats/#usage
 */
add_filter( 'gform_phone_formats', 'usa_phone_format' );
function usa_phone_format( $phone_formats ) {
    $phone_formats['usa'] = array(
      'label'       => '(###) ###-####',
      'mask'        => '(999) 999-9999',
      'regex'       => '/^\D?(\d{3})\D?\D?(\d{3})\D?(\d{4})$/',
      'instruction' => '(###) ###-####',
    );
 
    return $phone_formats;
}

/* 
 * Allow Subscribers to Edit Their Published Posts (Fixes images not uploading during edit)
 */
function add_theme_caps() {
  // gets the subscriber role
  $role = get_role( 'subscriber' );

  // This only works, because it accesses the class instance.
  // would allow the subscriber to edit others' posts for current theme only
  $role->add_cap( 'read' );
  $role->add_cap( 'read_post');
  $role->add_cap( 'edit_post' );
  $role->add_cap( 'edit_published_posts');
  $role->add_cap( 'upload_files' );
  $role->add_cap( 'publish_post' );
  $role->add_cap( 'delete_published_posts' );
}
add_action( 'admin_init', 'add_theme_caps');


/**
 * Remove current page link from yoast seo breadcrumbs
 */
add_filter( 'wpseo_breadcrumb_links', 'jj_wpseo_breadcrumb_links' );
function jj_wpseo_breadcrumb_links( $links ) {
	//pk_print( sizeof($links) );
	if( sizeof($links) > 1 ){
		array_pop($links);
	}
	return $links;
}