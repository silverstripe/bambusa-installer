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
          $Content
            <figure>
              <div>$Image.FocusFill(600,300)</div>
              <figcaption>Fill to 600x300</figcaption>
            </figure>
            <figure>
                <div>$Image.FocusCropWidth(500)</div>
                <figcaption>Cropped to 500 width</figcaption>
            </figure>
            <figure>
                <div>$Image.FocusCropHeight(600)</div>
                <figcaption>Cropped to 600 height</figcaption>
            </figure>
        </section>
      <% if $Children %>
          <aside class="col-lg-3 offset-lg-1">
            <% include SidebarNav %>
          </aside>
      <% end_if %>
    </div>
</div>
<% include PageUtilities %>
