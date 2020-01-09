<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <header class="page-header">
                $Breadcrumbs
                <h1>$Title</h1>
            </header>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <% if $Content.RichLinks %>
                $Content.RichLinks
            <% else %>
                $Content
            <% end_if %>

            <% include NewsFilterContext %>

            <section class="listing">
                <% if $FilteredUpdates %>
                    <% include FilteredUpdates ControllerName=$ClassName %>
                <% else %>
                    <article>
                        <p><%t CWP_FilteredUpdates.NoNews "No news" %></p>
                    </article>
                <% end_if %>
            </section>
        </div>

        <aside class="col-lg-3 offset-lg-1 sidebar">
            <h2 class="h3"><%t CWP_NewsEvents.FILTERS "Filters" %></h2>
            <% if $UpdateTagsWithLinks %>
                <% include UpdateTags %>
            <% end_if %>

            <% include DateRange %>

            <% if $AvailableMonths %>
                <% include AvailableMonths ControllerName=$ClassName %>
            <% end_if %>
        </aside>

    </div>
</div>

<% include PageUtilities %>

