<div class="blog-entry container">
    <% include SilverStripe\\Bambusa\\Pages\\PageHeader HasSidebar=1 %>
    <div class="row">
        <section class="content col-lg-8">
            <article class="blog-post-article">
              <% if $FeaturedImage %>
                  <p class="post-image">$FeaturedImage.ScaleWidth(795)</p>
              <% end_if %>

                <div class="content">
                      $Content
                </div>

              <% include SilverStripe\\Blog\\EntryMeta %>

              $Form
              $CommentsForm
            </article>
        </section>
        <aside class="sidebar col-lg-3 offset-lg-1">
          <% include SilverStripe\\Blog\\BlogSideBar BlogPage=$Parent %>
        </aside>
    </div>
</div>
