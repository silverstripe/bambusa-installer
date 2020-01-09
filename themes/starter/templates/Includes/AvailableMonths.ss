<div class="page-sidebar-widget news-events-archive">
    <h3 class="h4 page-sidebar-header"><%t CWP.AvailableMonths.Title "Archive" %></h3>

    <% loop $AvailableMonths %>
        <h4 class="h6 float-left news-events-archive-year"> {$YearName}: </h4>
        <ul class="nav nav-pills">
            <% loop $Months %>
                <li class="nav-item">
                    <a class="nav-link badge <% if $Active %> badge-primary<% end_if %>" aria-label="$MonthName $Up.YearName Archive" href="$MonthLink.XML" <% if $Active %> aria-selected="true"<% end_if %>>$MonthName</a>
                </li>
            <% end_loop %>
        </ul>
    <% end_loop %>

    <% if $FilteredUpdates %>
        <% if $FilterDescription %>
            <% if $ControllerName == "EventHolder" %>
                 <p><a class="small" href="$Link"><%t CWP.EventHolder.ShowAllEvents "Show all upcoming events" %></a></p>
            <% else_if $ControllerName == "NewsHolder" %>
                 <p><a class="small" href="$Link"><%t CWP.NewsHolder.ShowAllNews "Show all news" %></a></p>
            <% end_if %>
        <% end_if %>
    <% end_if %>

</div>
