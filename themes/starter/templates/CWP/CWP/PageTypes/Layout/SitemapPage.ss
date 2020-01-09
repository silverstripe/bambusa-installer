<div class="container layout sitemap-page">
    <div class="row">
        <div class="col-lg-8<% if not $Children %> offset-lg-2<% end_if %>">
            <h1 class="page-header">$Title</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8<% if not $Children %> offset-lg-2<% end_if %>">
            <div class="clearfix">
                <% if $Content.RichLinks %>
                    $Content.RichLinks
                <% else %>
                    $Content
                <% end_if %>
            </div>

            <ul class="sitemap list-unstyled" role="tablist">
                <% if $SelectedPage %>
                    <% loop $SelectedPage.Children %>
                        <li role="tab" data-pagetype="$ClassName" class="$FirstLast sitemap-initial class-$ClassName">
                            <% include SitemapNode %>
                        </li>
                    <% end_loop %>
                <% else %>
                    <% loop Menu(1) %>
                        <li role="tab" data-pagetype="$ClassName" class="$FirstLast sitemap-initial class-$ClassName">
                            <% include SitemapNode %>
                        </li>
                    <% end_loop %>
                <% end_if %>
            </ul>

            $Form
            $CommentsForm
        </div>
        <% if $Children %>
            <aside class="col-lg-3 offset-lg-1">
                <% include SidebarNav %>
            </aside>
        <% end_if %>
        <% include PageUtilities %>
    </div>
</div>
