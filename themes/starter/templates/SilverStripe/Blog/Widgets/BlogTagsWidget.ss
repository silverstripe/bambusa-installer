<% if $Tags %>
<div class="blog-tags-widget">
    <% loop $Tags %>
        <a href="$Link"
            title="<%t BlogTagsWidget.LINK_TEXT 'View {count} blog posts tagged {tag}' count=$BlogPosts.Count tag=$Title.ATT %>"
            class="badge badge-primary rounded">
            $Title.XML
        </a>
    <% end_loop %>
</div>
<% end_if %>
