<% if $MoreThanOnePage %>
    <div class="pagination-container">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <% if $NotFirstPage %>
                <li class="page-item">
                    <a class="prev page-link" aria-label="Previous" href="$PrevLink" title='<%t CWP_Pagination.PrevPage "View previous page of results" %>'>
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <% end_if %>
                <% loop $PaginationSummary(4) %>
                    <% if $CurrentBool %>
                        <li class="page-item active">
                            <span class="page-link">
                                $PageNum <span class="sr-only"><%t CWP_Pagination.CURRENT_LABEL "(current)" %></span>
                            </span>
                        </li>
                    <% else %>
                        <% if $PageNum %>
                            <li class="page-item">
                                <a href="$Link"
                                    title='<%t CWP_Pagination.PageNum "View page {PageNum} of results" PageNum=$PageNum %>'
                                    class="go-to-page page-link">
                                    $PageNum
                                </a>
                            </li>
                        <% else %>
                            <li class="disabled page-item">
                                <span
                                   class="page-link disabled"
                                   aria-hidden="true">
                                    &hellip;
                                </span>
                            </li>
                        <% end_if %>
                    <% end_if %>
                <% end_loop %>
                <% if $NotLastPage %>
                <li class="page-item">
                    <a class="next page-link" aria-label="Next" href="$NextLink" title='<%t CWP_Pagination.NextPage "View next page of results" %>'>
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
                <% end_if %>
            </ul>
        </nav>
    </div>
<% end_if %>
