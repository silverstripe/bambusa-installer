<% if $Title && $ShowTitle %>
    <h2 class="image-block__title">$Title</h2>
<% end_if %>
<figure>
    <div>$Image.FocusFill(600,300)</div>
    <figcaption>Fill to 600x300</figcaption>
</figure>
<figure>
    <div>$Image.FocusCropWidth(500)</div>
    <figcaption>Cropped to 500 width</figcaption>
</figure>
<figure>
    <div>$Image.FocusCropHeight(600)</div>
    <figcaption>Cropped to 600 height</figcaption>
</figure>