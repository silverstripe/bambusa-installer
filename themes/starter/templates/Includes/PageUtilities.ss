<% if $ShowPageUtilities %>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="page-utilities">
                <% if $LastEdited %>
                    <% include LastModified %>
                <% end_if %>
                <ul class="float-left list-inline">
                    <li class="list-inline-item">
                        <a href="#" onclick="window.print(); return false;"><%t SilverStripe\\Forms\\GridField\\GridField.Print "Print" %></a>
                    </li>
                    <%-- Uncomment this section to re-enable the PDF link in the template - see the documentation for
                    configuration instructions --%>
                    <%-- <% if $PdfLink %>
                        <li class="list-inline-item">
                            <a href="$PdfLink"><%t CWP\\CWP\\PageTypes\\BaseHomePage.PDF "Export PDF" %></a>
                        </li>
                    <% end_if %> --%>

                    <% if $ClassName == HomePage %>
                        <% if $AtomLink %>
                            <li class="list-inline-item">
                                <a href="$AtomLink" aria-label="<%t CWP\\CWP\\PageTypes\\BaseHomePage.Subscribe "Subscribe" %>">
                                    <i class="fa fa-rss" aria-hidden="true"></i>
                                </a>
                            </li>
                        <% else_if $RSSLink %>
                            <li class="list-inline-item">
                                <a href="$RSSLink" aria-label="<%t CWP\\CWP\\PageTypes\\BaseHomePage.Subscribe "Subscribe" %>">
                                    <i class="fa fa-rss" aria-hidden="true"></i>
                                </a>
                            </li>
                        <% else_if $DefaultAtomLink %>
                            <li class="list-inline-item">
                                <a href="$DefaultAtomLink" aria-label="<%t CWP\\CWP\\PageTypes\\BaseHomePage.Subscribe "Subscribe" %>">
                                    <i class="fa fa-rss" aria-hidden="true"></i>
                                </a>
                            </li>
                        <% else_if $DefaultRSSLink %>
                            <li class="list-inline-item">
                                <a href="$DefaultRSSLink" aria-label="<%t CWP\\CWP\\PageTypes\\BaseHomePage.Subscribe "Subscribe" %>">
                                    <i class="fa fa-rss" aria-hidden="true"></i>
                                </a>
                            </li>
                        <% end_if %>
                    <% end_if %>

                    <% if $ClassName == CWP\\CWP\\PageTypes\\NewsHolder || $ClassName == CWP\\CWP\\PageTypes\\EventHolder || $ClassName == SilverStripe\\Blog\\Model\\Blog %>
                        <li class="list-inline-item"><a href="#subscribe"><%t CWP\\CWP\\PageTypes\\BaseHomePage.Subscribe "Subscribe" %></a></li>
                    <% end_if %>
                </ul>
            </div>
        </div>
    </div>
</div>
<% end_if %>
