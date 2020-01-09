/* eslint-disable */
import $ from 'jquery';
/* eslint-enable */

export default function () {
  /**
   * Return a cache identifier for storing sitemap data in local storage
   */
  function getCacheId(pageId) {
    return `sitemap-cache-${pageId}`;
  }

  /**
   * Sets some data to the sitemap for the given page
   */
  function setSitemapData(pageId, data) {
    $(`#children-${pageId}`).html(data);
  }

  /**
   * Given a page ID and some sitemap data, load it into the DOM. Will load from
   * the local cache if available.
   */
  function loadSitemap(pageId, data = null) {
    let sitemapData = data;
    // Attempt to load from cache
    if (data === null && typeof Storage !== 'undefined'
      && sessionStorage.getItem(getCacheId(pageId)) !== null
    ) {
      sitemapData = sessionStorage.getItem(getCacheId(pageId));
    }
    setSitemapData(pageId, sitemapData);
  }

  /**
   * Constructs a loading animation and sets it to the sitemap data
   */
  function setLoadingMessage($self, pageId) {
    const loadingMessage = $self.data('loading-message');
    setSitemapData(
      pageId,
      `<div class="sitemap-loading">
        <i class="fa fa-spinner fa-pulse" aria-hidden="true"></i>
        <span class="sr-only">${loadingMessage}</span>
      </div>`,
    );
  }

  /**
   * Check for a cached copy of the sitemap data for the requested page, and return
   * whether or not to perform an AJAX request
   */
  function getPerformAjaxRequest($self, pageId) {
    if (typeof Storage !== 'undefined') {
      if (sessionStorage.getItem(getCacheId(pageId)) !== null) {
        loadSitemap(pageId);
        return false;
      }
    }
    setLoadingMessage($self, pageId);
    return true;
  }

  /**
   * Toggle the state of the sitemap section button, either expanded or collapsed
   */
  function toggleButton($button) {
    $button
      .toggleClass('collapsed')
      .attr('aria-expanded', (i, val) => val !== 'true');

    const $screenReader = $button.find('.sr-only');

    const screenReaderText = $screenReader.text();
    const screenReaderDataText = $screenReader.attr('data-collapse-text');

    $button.find('.toggleIco').toggleClass('fa-minus fa-plus');

    // Toggle text and data-collapse-text
    $screenReader.text(screenReaderDataText);
    $screenReader.attr('data-collapse-text', screenReaderText);
  }

  $('.sitemap-page').on('click', 'a.sitemap__collapse-action', function (e) {
    e.preventDefault();

    // @todo: Remove passing of reference to $(this) as per AirBnB style guide
    const $self = $(this);
    const pageId = $self.data('page-id');

    toggleButton($self);
    $.ajax({
      cache: true,
      url: `${window.location.pathname}/page/${pageId}`,
      beforeSend() {
        return getPerformAjaxRequest($self, pageId);
      },
      success(data) {
        // Cache so we don't need to perform this AJAX request again
        if (typeof (Storage) !== 'undefined') {
          sessionStorage.setItem(getCacheId(pageId), data);
        }
        loadSitemap(pageId, data);
      },
    });
  });

  /**
   * Remove the aria-selected attributes that the paypal/bootstrap-accessibility
   * plugin adds to all sitemap toggle anchors.
   */
  $(document).ready(() => {
    $('.sitemap__collapse-action').removeAttr('aria-selected');
  });
}
