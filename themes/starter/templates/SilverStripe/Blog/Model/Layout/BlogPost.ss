<div class="blog-entry container">
    <div class="row">
        <div class="<% if not $SideBarView || not $SideBarView.Widgets %>col-lg-8 offset-lg-2<% else %>col-lg-12<% end_if %>">
            <header class="page-header">
                $Breadcrumbs
                <h1>$Title</h1>
            </header>
        </div>
    </div>

    <div class="row">
        <section class="col-lg-8<% if not $SideBarView || not $SideBarView.Widgets %> offset-lg-2<% end_if %>">
            <article class="blog-post-article">
                <% if $FeaturedImage %>
                    <p class="post-image">$FeaturedImage.ScaleWidth(795)</p>
                <% end_if %>

                <div class="content">
                    <% if $ElementalArea %>
                        <%-- Support for content blocks, if enabled --%>
                        <% if $ElementalArea.RichLinks %>
                            $ElementalArea.RichLinks %>
                        <% else %>
                            $ElementalArea
                        <% end_if %>
                    <% else %>
                        <%-- CMS page content --%>
                        <% if $Content.RichLinks %>
                            $Content.RichLinks
                        <% else %>
                            $Content
                        <% end_if %>
                    <% end_if %>
                </div>

                <% include SilverStripe\\Blog\\EntryMeta %>

                $Form
                $CommentsForm
            </article>
        </section>

        <% include SilverStripe\\Blog\\BlogSideBar %>
    </div>
</div>
<% include PageUtilities %>
