

<% if $HeaderElements %>$HeaderElements<% end_if %>
<div class="container">

        <div class="row">
            <section class="<% if $Children %>col-lg-12<% else %>col-lg-8 offset-lg-2<% end_if %>">
                <header class="page-header">
                    $Breadcrumbs
                    <h1>$Title</h1>
                </header>
            </section>
        </div>

    <div class="row">
        <section class="col-lg-8<% if not $Children %> offset-lg-2<% end_if %>">
            <div class="styleguide">

                $Message

                <% include SimpleStyleguideNavigation %>

                <div class="styleguide__content">

                    <% include SimpleStyleguideColorSwatches %>
                    <% include SimpleStyleguideTypography %>
                    <% include SimpleStyleguideHeadings %>
                    <% include SimpleStyleguideForm %>

                </div>
            </div>

            $Form
            <% include RelatedPages %>
            $CommentsForm
        </section>
        <% if $Children %>
            <aside class="col-lg-3 offset-lg-1">
                <% include SidebarNav %>
            </aside>
        <% end_if %>
    </div>
</div>
