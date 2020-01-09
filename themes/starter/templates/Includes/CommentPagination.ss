<% if $MoreThanOnePage %>
    <div class="pagination-container">
        <nav aria-label="<%t CommentPagination.PAGE_NAVIGATION "Page navigation" %>">
            <ul class="pagination">
                <% if $PrevLink %>
                    <li class="page-item">
                        <a href="$PrevLink.ATT" class="page-link previous">&laquo; <%t CommentsInterface_ss.PREV 'previous' %></a>
                    </li>
                <% end_if %>

                <% if $Pages %>
                    <% loop $Pages %>
                        <% if $CurrentBool %>
                            <li class="page-item active">
                                <span class="page-link"><strong>$PageNum</strong></span>
                            </li>
                        <% else %>
                            <li>
                                <a href="$Link.ATT" class="page-link">$PageNum</a>
                            </li>
                        <% end_if %>
                    <% end_loop %>
                <% end_if %>

                <% if $NextLink %>
                    <li class="page-item">
                        <a href="$NextLink.ATT" class="page-link next"><%t CommentsInterface_ss.NEXT 'next' %> &raquo;</a>
                    </li>
                <% end_if %>
            </ul>
        </nav>
    </div>
<% end_if %>
