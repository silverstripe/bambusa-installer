<% if $Title && $ShowTitle %>
    <h2 class="image-block__title">$Title</h2>
<% end_if %>
<figure>
    <div>$Image.FocusFill(600,300)</div>
    <figcaption>Fill to 600px by 300px</figcaption>
</figure>
<figure>
    <div>$Image.FocusCropWidth(500)</div>
    <figcaption>Cropped to 500px width</figcaption>
</figure>
<figure>
    <div>$Image.FocusCropHeight(600)</div>
    <figcaption>Image cropped to a 600px height with a maximum width of the given content area</figcaption>
</figure>
