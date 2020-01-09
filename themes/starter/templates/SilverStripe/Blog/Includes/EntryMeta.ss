<% if $Categories || $Tags %>
<p class="meta-info">
    <% if $Categories.exists %>
        <%t Blog.PostedIn "Posted in" %>
        <% loop $Categories %>
            <a href="$Link" title="$Title">$Title</a><% if not Last %>, <% end_if %>
        <% end_loop %>
    <% end_if %>
    <% if $Categories && $Tags %><br /><% end_if %>
    <% if $Tags.exists %>
        <%t Blog.Tagged "Tagged" %>
        <% loop $Tags %>
            <a href="$Link" title="$Title">$Title</a><% if not Last %>, <% end_if %>
        <% end_loop %>
    <% end_if %>
</p>
<% end_if %>
<p class="meta-info">
    <%t Blog.Posted "Posted" %> $PublishDate.ago

    <% if $Credits %>
        <%t Blog.By "by" %>
        <% loop $Credits %><% if not $First && not $Last %>, <% end_if %><% if not $First && $Last %> <%t Blog.AND "and" %> <% end_if %><% if $URLSegment %><a href="$URL">$Name.XML</a><% else %>$Name.XML<% end_if %><% end_loop %>
    <% end_if %>

    <% if $Comments.exists %>
         | <a href="{$Link}#comments-holder">
            $Comments.count
            <% if $Comments.count == 1 %>
                <%t BlogEntry_ss.COMMENT 'Comment' %>
            <% else %>
                <%t Blog.Comments "Comments" %>
            <% end_if %>
        </a>
    <% end_if %>

    <%-- Month archive link
    <a href="$MonthlyArchiveLink">View month archive</a> --%>
</p>
