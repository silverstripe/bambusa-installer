<p class="meta-info" itemscope itemtype="http://schema.org/BlogPosting">
    <% if $Credits %>
        <% loop $Credits %><% if not $First && not $Last %>, <% end_if %><% if not $First && $Last %><% if $TotalItems > '2' %>,<% end_if %> <%t BlogPostMeta_ss.AND "and" %> <% end_if %><% if $URLSegment %><a href="$URL">$Name.XML</a><% else %>$Name.XML<% end_if %><% end_loop %>
    <% end_if %>

    <% if $PublishDate %>
        <% if $Credits %>
            <%t BlogPostMeta_ss.ON "on" %>
        <% else %>
            <%t BlogPostMeta_ss.POSTED "posted" %>
        <% end_if %>
        <time datetime="{$PublishDate.Format(c)}" itemprop="datePublished">$PublishDate.Long</time>
    <% end_if %>

    <% if $AllVisibleComments %>
        <% if $Credits || $PublishDate %> | <% end_if %>
        <a href="$Link#comments-holder" title="<%t BlogPostMeta_ss.VIEW_COMMENTS 'View Comments Posted' %>">$AllVisibleComments.Count <% if AllVisibleComments.Count == 1 %><%t BlogEntry_ss.COMMENT 'Comment' %><% else %><%t BlogEntry_ss.COMMENTS 'Comments' %><% end_if %></a>
    <% end_if %>
</p>
