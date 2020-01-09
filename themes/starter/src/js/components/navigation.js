/* eslint-disable */
import $ from 'jquery';
/* eslint-enable */

export default function () {
  const Dropdown = $('nav .dropdown');

  /**
   * Close dropdown, by default Bootstrap leaves it open. Also hide any child
   * menus with aria-hidden.
   */
  const closeMenu = function () {
    // Close dropdown, by default Bootstrap leaves it open
    Dropdown
      .removeClass('open')
      .find('.navbar-touch-caret')
      .attr('aria-expanded', false)
      .find('.fa-caret-up')
      .toggleClass('fa-caret-up fa-caret-down');

    Dropdown
      .find('.dropdown-menu')
      .attr('aria-hidden', true);
  };

  /**
   * Trigger a menu item to be "opened" or expanded
   */
  const openMenu = function ($elem) {
    closeMenu();

    $elem.addClass('open');
    $elem
      .find('.navbar-touch-caret')
      .attr('aria-expanded', true)
      .find('.fa-caret-down')
      .toggleClass('fa-caret-down fa-caret-up');

    $elem
      .find('.dropdown-menu')
      .attr('aria-hidden', false);
  };

  /**
   * If screen width is Desktop return true. 768px according to Bootstrap @media queries,
   * but can be overridden by adding data-grid-float-breakpoint-width="1234" to your <body>
   * tag to override this.
   *
   * @returns {Boolean}
   */
  const isDesktop = function () {
    const maxWidth = $('body').data('grid-float-breakpoint-width') || 768;
    return $(document).width() > maxWidth || false;
  };

  /**
   * Handle the "hover" events to open and close the dropdown menus, and some keyboard
   * behaviours, such as "Esc" to close the menu, and spacebar and down key to open it.
   *
   * These keypress handlers differ from the others lower down in that these apply only
   * to navigation elements that have a dropdown menu associated.
   */
  Dropdown
    .hover(
      function handleOpenMenu() {
        if (isDesktop()) {
          openMenu($(this));
        }
      },
      () => {
        if (isDesktop()) {
          closeMenu();
        }
      },
    )
    .keydown(function (event) {
      switch (event.keyCode) {
        case 13:
          // Enter key
          closeMenu();
          break;
        case 32:
        case 40:
          // Space bar and "down" key
          // Stop the default behaviour (e.g. scrolling down)
          event.preventDefault();
          openMenu($(this));
          break;
        case 27:
          // ESC
          closeMenu();
          break;
        default:
          break;
      }
    });

  /**
   * Handler for key press events on navigation items - this allows the left and right
   * arrow keys to navigate through the lists.
   *
   * These handlers are for all navigation items, not just those with a dropdown associated.
   * NOTE: Be careful if adding new handlers here - be aware that they the previous handler
   * may also be fired, creating race conditions.
   */
  $('nav .nav-item').keydown(function (event) {
    const $next = $(this).next().find('a');
    const $prev = $(this).prev().find('a');
    switch (event.keyCode) {
      case 39:
        // forward [>]
        if ($next.length) {
          $next.focus();
          closeMenu();
        }
        break;
      case 37:
        // backward [<]
        if ($prev.length) {
          $prev.focus();
          closeMenu();
        }
        break;
      default:
        break;
    }
  });
}
