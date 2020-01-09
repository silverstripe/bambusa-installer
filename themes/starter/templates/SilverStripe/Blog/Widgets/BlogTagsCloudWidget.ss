<% if $Tags %>
    <div class="blog-tags-widget blog-tag-cloud" role="tablist">
        <% loop $Tags %>
            <a role="presentation" href="$Link" class="badge badge-primary blog-tag-count blog-tag-count-{$NormalizedTag}">
                $TagName.XML
            </a>
        <% end_loop %>
    </div>
<% end_if %>
