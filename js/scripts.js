(function($) {
  var Scripts = {
    init() {
      this.bootstrapSlider();
      this.bLazy();
      this.bindEvents();
      this.startupKit();
      this.bootstrapDropdownSlide();
    },

    bootstrapDropdownSlide() {
      // Add slideDown animation to Bootstrap dropdown when expanding.
      $('.dropdown').on('show.bs.dropdown', function() {
        $(this).find('.dropdown-menu').first().stop(true, true).css('opacity', 0).slideDown('fast').animate(
          { opacity: 1 },
          { queue: false, duration: 'fast' }
        );
      });

      // Add slideUp animation to Bootstrap dropdown when collapsing.
      $('.dropdown').on('hide.bs.dropdown', function() {
        $(this).find('.dropdown-menu').first().stop(true, true).css('opacity', 1).slideUp('fast').animate(
          { opacity: 0 },
          { queue: false, duration: 'fast' }
        );
      });
    },

    bootstrapSlider() {
      $(document).ready( function() {
        $('.carousel').carousel();
      }); 
    },

    bLazy() {
      // Lazy Load images
      // Initialize on .b-lazy class
      document.addEventListener('DOMContentLoaded', function() {
        let bLazy = new Blazy({});
      }, false);
    },

    bindEvents() {
      var self = this;
      // show mobile nav
      $(document).on("touchstart, click", ".navbar .btn-navbar", function(e) {
        e.preventDefault();
        $('html.nav-visible').find('.nav-collapse').hide();
        $(".navbar").find('.nav-collapse').show();
        $(".navbar").toggleClass('nav-visible');
        $('html').toggleClass('nav-visible');
      });

      // always close mobile nav
      $(document).on("click", ".nav-visible .nav-top li a", function() {
        self._close_nav();
      });

    },

    startupKit() {
      var self = this;
      $(document).ready(function() {
        setTimeout(function() {
          $('html').addClass('loaded');
        }, 400);
      });
    },

    _close_nav() {
      $('.navbar').removeClass('nav-visible');
      $('html').removeClass('nav-visible');
    },

    _open_nav() {
      $(".navbar").find('.nav-collapse').show();
      $(".navbar").addClass('nav-visible');
      $('html').addClass('nav-visible');
    },
      

  };

  Scripts.init();
})(jQuery);
