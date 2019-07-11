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
        <section class="col-lg-8 offset-lg-2">
            <div class="styleguide">
                <p class="alert alert-warning">
                    This view is only accessible to developers and admin users.
                    It demonstrates styling variations, and can be used to
                    test styling changes.
                </p>

                <% include SimpleStyleguideNavigation %>

                <div class="styleguide__content">
                    <% include SimpleStyleguideColorSwatches %>
                    <% include SimpleStyleguideTypography %>
                    <% include SimpleStyleguideHeadings %>
                    <% include SimpleStyleguideForm %>
                </div>
            </div>
        </section>
    </div>
</div>
<% include PageUtilities %>
