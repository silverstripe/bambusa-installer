<div class="container">
    <% include SilverStripe\\Bambusa\\Pages\\PageHeader HasSidebar=1 %>
    <div class="row">
        <section class="content col-lg-8">
            <div class="blog-main" role="main">
                <div class="clearfix blog-holder__content">
                      $Content
                </div>

              <% include BlogPostPaginatedList %>

              $Form
              <% include RelatedPages %>
              $CommentsForm
            </div>
        </section>
        <aside class="sidebar col-lg-3 offset-lg-1">
          <% include SilverStripe\\Blog\\BlogSideBar BlogPage=$Me %>
        </aside>
    </div>
</div>
