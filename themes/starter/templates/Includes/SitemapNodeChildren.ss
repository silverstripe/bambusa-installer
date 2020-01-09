<% loop $Children %>
    <% if $ShowInMenus %>
        <li data-pagetype="$ClassName" class="$FirstLast class-$ClassName">
            <% include SitemapNode %>
        </li>
    <% end_if %>
<% end_loop %>
