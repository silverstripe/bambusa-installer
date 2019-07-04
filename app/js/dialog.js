jQuery(function($) {
  $('#privacyModal')
    .modal({backdrop: 'static', keyboard: false})
    .modal('show')
    .on('hide.bs.modal', function () {
      document.cookie = "privacy_modal_showed=1; path=/; domain=" + privacy_modal_hostname;
    });
})
