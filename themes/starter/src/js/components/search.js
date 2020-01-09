/* eslint-disable */
import $ from 'jquery';
/* eslint-enable */

export default function () {
  $('article[data-highlight]').each(function () {
    const text = $(this).data('highlight');
    $(this).highlight(text, { element: 'mark', className: 'highlight' });
  });
}
