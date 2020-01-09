<% if $RelatedPages %>
    <h2 class="h4"><%t CWP.RelatedPages.Title "Related pages" %></h2>
    <ul class="list-unstyled">
        <% loop $RelatedPages %>
            <li><a href="$Link" class="related-pages-link">$Title</a></li>
        <% end_loop %>
    </ul>
<% end_if %>
