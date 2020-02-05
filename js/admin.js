(function($) {
  var Scripts = {
    init() {
      // this.hideStuff();
      // this.bindEvents();
      this.startupKit();
    },

    hideStuff() {
      $('.user-rich-editing-wrap').hide();
      $('.user-comment-shortcuts-wrap').hide();
      $('.user-admin-bar-front-wrap').hide();
      $('.user-url-wrap').hide();

      $("h2:contains('About the user')").hide().next('table').hide();
      $("h2:contains('Account Management')").next('table').css('background', '#f5e2c9');
    },

    bindEvents() {
      var self = this;

      // always close mobile nav
      $(document).on("click", ".nav-visible .nav-top li a", function() {
        self._close_nav();
      });
    },

    startupKit() {
      var self = this;
      $(document).ready(function() {
        self.hideStuff();

        setTimeout(function() {
          $('html').addClass('loaded');
        }, 400);
      });
    },

  };

  Scripts.init();
})(jQuery);
