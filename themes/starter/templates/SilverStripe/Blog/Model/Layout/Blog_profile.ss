<div class="container">
    <div class="row">
        <div class="<% if not $SideBarView || not $SideBarView.Widgets %>col-lg-8 offset-lg-2<% else %>col-lg-12<% end_if %>">
            <header class="page-header">
                $Breadcrumbs
                <h1>$Title</h1>
            </header>
            <% include SilverStripe\\Blog\\MemberDetails %>
        </div>
    </div>

    <div class="row">
        <section class="col-lg-8<% if not $SideBarView || not $SideBarView.Widgets %> offset-lg-2<% end_if %> resultsList">
            <% include BlogPostPaginatedList %>
            $Form
            <% include RelatedPages %>
            $CommentsForm
        </section>

        <% include SilverStripe\\Blog\\BlogSideBar %>
    </div>
</div>

<% include PageUtilities %>
