<% if $Pages %>
    <nav role="navigation" aria-label="<%t CWP_Search.BREADCRUMBS "Breadcrumbs" %>">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="$BaseHref">
                    <%t SiteTree.DEFAULTHOMETITLE "Home" %>
                </a>
            </li>
            <% loop $Pages %>
                <% if $Last %>
                    <li class="breadcrumb-item active">$MenuTitle.XML</li>
                <% else %>
                    <li class="breadcrumb-item"><a href="$Link">$MenuTitle.XML</a></li>
                <% end_if %>
            <% end_loop %>
        </ol>
    </nav>
<% end_if %>
