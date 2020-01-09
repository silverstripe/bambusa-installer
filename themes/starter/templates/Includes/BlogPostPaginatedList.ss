<% if $PaginatedList %>
    <% if $CurrentProfile %>
        <h2 class="h6 blog-post-heading"><%t BlogPostPaginatedList.POSTS_BY 'Posts by {firstname} {lastname} for {title}' firstname=$CurrentProfile.FirstName lastname=$CurrentProfile.Surname title=$Title %></h2>
    <% end_if %>
    <% loop $PaginatedList %>
        <article class="blog-entry blog-entry--paginated $EvenOdd">
            <% include SilverStripe\\Blog\\PostSummary %>
        </article>
    <% end_loop %>
    <% with $PaginatedList %>
        <% include SilverStripe\\Blog\\Pagination %>
    <% end_with %>
<% else %>
    <p><%t BlogPostPaginatedList.NO_POSTS "There are no blog posts" %></p>
<% end_if %>
