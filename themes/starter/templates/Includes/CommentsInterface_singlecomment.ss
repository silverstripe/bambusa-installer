<% if not $isPreview %>
    <p class="info meta-info" id="$Permalink">
        <% if $URL %>
            <a class="author" href="$URL.URL" rel="nofollow">$AuthorName.XML</a>
        <% else %>
            <span class="author">$AuthorName.XML,</span>
        <% end_if %>
        <span class="date">
            <time datetime="$Created.Nice">$Created.Nice ($Created.Ago)</time>
        </span>
    </p>
<% end_if %>
<% if $Gravatar %>
    <img class="gravatar" src="$Gravatar.ATT" alt="Gravatar for $Name.ATT" title="Gravatar for $Name.ATT" />
<% end_if %>
<div class="comment-text<% if $Gravatar %> hasGravatar<% end_if %>" id="<% if $isPreview %>comment-preview<% else %>{$Permalink}-text<% end_if %>">
    <p>$EscapedComment</p>
</div>

<% if not $isPreview %>
    <% if $ApproveLink || $SpamLink || $HamLink || $DeleteLink || $RepliesEnabled %>
        <div class="comment-action-links">
            <div class="comment-moderation-options">
                <% if $ApproveLink %>
                    <a href="$ApproveLink.ATT" class="comment-action-link btn btn-success approve"><%t CommentsInterface_singlecomment_ss.APPROVE 'approve it' %></a>
                <% end_if %>
                <% if $SpamLink %>
                    <a href="$SpamLink.ATT" class="comment-action-link btn btn-warning spam"><%t CommentsInterface_singlecomment_ss.ISSPAM 'spam it' %></a>
                <% end_if %>
                <% if $HamLink %>
                    <a href="$HamLink.ATT" class="comment-action-link btn btn-primary ham"><%t CommentsInterface_singlecomment_ss.ISNTSPAM 'not spam' %></a>
                <% end_if %>
                <% if $DeleteLink %>
                    <a href="$DeleteLink.ATT" class="comment-action-link btn btn-danger delete"><%t CommentsInterface_singlecomment_ss.REMCOM 'reject it' %></a>
                <% end_if %>
            </div>
            <% if $RepliesEnabled %>
                <a class="comment-reply-link" href="#{$ReplyForm.FormName}" aria-controls="$ReplyForm.FormName" aria-expanded="false"><%t CommentsInterface_singlecomment_ss.REPLYTO 'Reply to' %> $AuthorName.XML</a>
            <% end_if %>
        </div>
    <% end_if %>

    <% include CommentReplies %>
<% end_if %>
