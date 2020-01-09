/* eslint-disable */
import $ from 'jquery';
/* eslint-enable */

export default function () {
  $('#main img').addClass('img-responsive');

  $('#main div .captionImage.right')
    .removeClass('right')
    .addClass('pull-right');

  $('#main div .captionImage.left')
    .removeClass('left')
    .addClass('pull-left');

  $('#main div .captionImage.center')
    .removeClass('center')
    .addClass('center-block');

  $('#main img.center')
    .removeClass('center')
    .addClass('center-block');
}
