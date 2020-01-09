<%-- clearfix needed for floating image --%>
<div class="clearfix">
    <% if $FeaturedImage %>
        <figure class="float-right blog-item-figure">
            $FeaturedImage.SetHeight(150)
        </figure>
    <% end_if %>

    <header>
        <h2 class="h3"><a href="$Link">$Title</a></h2>
        <% include BlogPostMeta %>
    </header>

    <% if $Summary %>
        $Summary
    <% else %>
        <p>$Excerpt</p>
    <% end_if %>
</div>

<% include BlogEntryTags %>
