<p>
    <%t SilverStripe\\CommentNotifications\\BlogCommentEmail.NEW_COMMENT_TEXT 'There is a new comment on' %> <a href="{$Comment.Link}">{$Parent.Title}</a>.
</p>

<p>
    <strong><%t SilverStripe\\CommentNotifications\\BlogCommentEmail.PLEASE_REVIEW_FOR_APPROVAL 'Please review the comment for approval' %>.</strong>
</p>

<ul>
    <li>{$Comment.Created.Nice}</li>
    <% if $Comment.AuthorName %>
        <li>{$Comment.AuthorName}</li>
    <% end_if %>
    <% if $Comment.Email %>
        <li>{$Comment.Email}</li>
    <% end_if %>
    <% if $IsSpam %>
        <li><em><%t SilverStripe\\CommentNotifications\\BlogCommentEmail.DETECTED_AS_SPAM 'This comment was automatically detected as spam' %></em></li>
    <% end_if %>
</ul>

<blockquote><% with Comment %>$Comment<% end_with %></blockquote>

<% if $ApproveLink || $HamLink || $SpamLink || $DeleteLink %>
    <ul>
        <% if $ApproveLink %>
            <li><strong><%t SilverStripe\\CommentNotifications\\BlogCommentEmail.APPRPOVE 'Approve:' %></strong> <a href="$ApproveLink.ATT">$ApproveLink.XML</a></li>
        <% end_if %>
        <% if $SpamLink %>
            <li><strong><%t SilverStripe\\CommentNotifications\\BlogCommentEmail.MARK_AS_SPAM 'Mark as spam:' %></strong> <a href="$SpamLink.ATT">$SpamLink.XML</a></li>
        <% end_if %>
        <% if $HamLink %>
            <li><strong><%t SilverStripe\\CommentNotifications\\BlogCommentEmail.MARK_AS_NOT_SPAM 'Mark as not spam:' %></strong> <a href="$HamLink.ATT">$HamLink.XML</a></li>
        <% end_if %>
        <% if $DeleteLink %>
            <li><strong><%t SilverStripe\\CommentNotifications\\BlogCommentEmail.DELETE 'Delete:' %></strong> <a href="$DeleteLink.ATT">$DeleteLink.XML</a></li>
        <% end_if %>
    </ul>
<% else %>
    <%t SilverStripe\\CommentNotifications\\BlogCommentEmail.MODERATE_THIS_COMMENT 'You can view or moderate this comment at' %> <a href="{$Comment.Link}">{$Parent.Title}</a>
<% end_if %>
