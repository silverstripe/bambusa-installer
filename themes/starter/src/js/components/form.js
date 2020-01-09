/* eslint-disable */
import $ from 'jquery';
/* eslint-enable */

export default function () {
  $('input.number').on('keyup', function () {
    const value = $(this).val();
    $(this).val(value.replace(/[a-zA-Z]/g, ''));
  });

  /**
   * Apply a Bootstrap 3 form structure context to the jQuery validator plugin in userforms
   */
  $('.userform, .comments-holder-container form').each(function () {
    if (typeof $(this).validate === 'function') {
      const validatorSettings = $(this).validate().settings;

      validatorSettings.highlight = function (element) {
        if ($(element).prop('type') === 'checkbox' || $(element).prop('type') === 'radio') {
          $(element).parents('.form-group').find('.form-check input').addClass('is-invalid');
        } else {
          $(element).addClass('is-invalid');
        }
        $(element).closest('.form-group').addClass('has-error');
      };

      validatorSettings.unhighlight = function (element) {
        if ($(element).prop('type') === 'checkbox' || $(element).prop('type') === 'radio') {
          $(element).parents('.form-group').find('.form-check input').removeClass('is-invalid');
        } else {
          $(element).removeClass('is-invalid');
        }

        $(element).closest('.form-group').removeClass('has-error');
      };

      validatorSettings.errorElement = 'span';
      validatorSettings.errorClass = 'invalid-feedback';

      validatorSettings.errorPlacement = function (error, element) {
        if (element.parent('.input-group').length
          || element.prop('type') === 'checkbox'
          || element.prop('type') === 'radio'
        ) {
          // Handle lists of checkboxes/radios by looking for all children
          error.insertAfter(element.parents('.form-group:first').children().last());
        } else {
          error.insertAfter(element);
        }
      };
    }
  });

  // Comments Module - Accesibility for Replies
  const $commentReplyLink = $('.comment-reply-link');

  $commentReplyLink.click(function () {
    $(this).attr('aria-expanded', (i, val) => val !== 'true');
  });
}
