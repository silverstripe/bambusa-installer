<% if $Categories %>
    <ul class="blogcategories list-unstyled">
        <% loop $Categories %>
            <li class="blogcategories-{$Class}">
                <a href="$Link" title="<%t BlogCategoriesWidget.VIEW_POSTS_IN_CATEGORY 'View {count} blog posts in category {category}' count=$BlogPosts.Count category=$Title.ATT %>">
                    $Title.XML
                </a>
            </li>
        <% end_loop %>
    </ul>
<% end_if %>
