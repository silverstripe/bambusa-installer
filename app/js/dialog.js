jQuery(function ($) {

    /**
     * Retrieve a value from the cookie
     * @param {string} cname
     * @returns {string}
     */
    function getCookie(cname)
    {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    var cookieKey = 'privacy_modal_showed';

    if (!getCookie(cookieKey)) {
        // Show the modal and don't let people dismiss it with escape or by clicking the backdrop
        $('#privacyModal')
          .modal({backdrop: 'static', keyboard: false})
          .modal('show')
          .on('hide.bs.modal', function () {
              // Only set the cookie one the modal has been dismissed.
              document.cookie = cookieKey + "=1";
          });
    }

})
