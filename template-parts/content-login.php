<?php
/**
 * Login form for user access
 */
?>
<div class="login-container">
  <div class="login-background">
    <div class="gform-register">
      <?php if( isset($_GET["login"]) == 'failed' ): ?>
        <p class="error-login"><b>Login failed.</b> Please try again.</p><br>
      <?php endif; ?> 

      <?php if( isset($_GET["register_new"]) == 'success' ): ?>
        <p class="success"><b>Registration Complete</b> Please log in to continue.</p><br>
      <?php endif; ?> 
      
      <?php wp_login_form(); ?><hr>
      <div class="text-center">
        <p class="caption"><a href="/register">Not a member yet? Sign up</a>.</p>
        <p class="caption"><a href="<?php echo wp_lostpassword_url(); ?>">Lost your password? Reset it here.</a></p>
      </div><hr>
      <div class="text-center">
        <p class="caption"><a href="/">Back Home</a></p>
      </div>
    </div><!-- /.gform-register -->
  </div><!-- /.login-background -->
</div><!-- /.login-container -->