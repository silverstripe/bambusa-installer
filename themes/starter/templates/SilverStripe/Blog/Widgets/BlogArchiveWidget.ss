<% if $Archive %>
    <ul class="blogarchive list-unstyled">
        <% loop $Archive %>
            <li class="blogarchive-{$Class}">
                <a href="$Link" title="<%t BlogArchiveWidget.VIEW_POSTS_IN_TAG 'View blog posts in {tag}' tag=$Title.ATT %>">
                    $Title.XML
                </a>
            </li>
        <% end_loop %>
    </ul>
<% end_if %>
