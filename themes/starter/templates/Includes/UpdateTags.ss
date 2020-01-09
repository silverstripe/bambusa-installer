<div class="page-sidebar-widget news-events-tags">
    <h3 class="h4 page-sidebar-header"><%t CWP.Events_News.Tag "Tag" %></h3>
    <nav role="navigation">
        <p>
            <% loop $UpdateTagsWithLinks %>
                <a href="$Link"
                    <% if $Top.CurrentTag.ID == $ID %> aria-selected="true"<% end_if %>
                    class="badge <% if $Top.CurrentTag.ID == $ID %> badge-success<% else %> badge-primary<% end_if %>" Name=$Name %>'>$Name</a>
            <% end_loop %>
        </p>
        <% if $CurrentTag %>
            <p class="small">
                <a href="$AllTagsLink"><%t CWP.Events_News.ViewAllTags "View all tags" %></a>
            </p>
        <% end_if %>
    </nav>
</div>
