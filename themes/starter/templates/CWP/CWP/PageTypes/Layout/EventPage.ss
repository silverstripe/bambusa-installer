<article class="container">
    <div class="row">
        <section class="col-lg-12">
            <header class="page-header">
                $Breadcrumbs
                <h1>$Title</h1>
            </header>
        </section>
    </div>

    <div class="row">
        <section class="col-lg-8<% if not $Terms && not $RelatedPages %> offset-lg-2<% end_if %>">
            <% include EventItem %>
        </section>

        <aside class="col-lg-3 offset-lg-1 sidebar">
            <% include EventDetail %>
        </aside>
    </div>
</article>

<% include PageUtilities %>
