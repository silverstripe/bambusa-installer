<div class="container">

    <div class="row">
        <section class="col-lg-8<% if not $RegistryFilterForm %> offset-lg-2<% end_if %>">
            <header class="page-header">
                $Breadcrumbs
                <h1>$Title</h1>
            </header>
        </section>
    </div>

    <div class="row">
        <div class="col-lg-8<% if not $RegistryFilterForm %> offset-lg-2<% end_if %>">

            $Content

            <div id="{$DataClass}_results" class="resultsContainer">
                <% if $RegistryEntries %>
                    <table class="table-bordered" summary="<%t RegistryPage.ResultsFor "Search results for" %> $DataClass">
                        <thead>
                            <tr>
                                <% loop $Columns %>
                                    <th>
                                        <a href="$Top.QueryLink&amp;Sort={$Name}&amp;Dir={$Top.OppositeDirection}#results">
                                            $Title
                                            <% if $Name == $Top.Sort %>
                                                <% if $Top.OppositeDirection == "ASC" %>
                                                    <i class="fa fa-caret-up" aria-hidden="true">
                                                        <span class="sr-only"><%t CWP.Registry.SortDescending "Column sorted descending" %></span>
                                                    </i>
                                                <% else_if $Top.OppositeDirection == "DESC" %>
                                                     <i class="fa fa-caret-down" aria-hidden="true">
                                                         <span class="sr-only"><%t CWP.Registry.SortAscending "Column sorted ascending" %></span>
                                                     </i>
                                                <% end_if %>
                                            <% end_if %>
                                        </a>
                                    </th>
                                <% end_loop %>
                            </tr>
                        </thead>
                        <tbody>
                        <% loop $RegistryEntries %>
                            <tr class="<% if $FirstLast %>$FirstLast <% end_if %>$EvenOdd">
                                <% loop $Top.Columns($ID) %>
                                    <td><% if $Link %><a href="$Link">$Value</a><% else %>$Value<% end_if %></td>
                                <% end_loop %>
                            </tr>
                        <% end_loop %>
                        </tbody>
                    </table>

                    <a class="historyFeedLink" href="registry-feed/latest/{$getClassNameForUrl($DataClass)}">
                        <%t RegistryPage.ViewHistory "View imported data history" %>
                    </a>
                    <div class="resultActions">
                        <a class="export" href="$Link(export)?$AllQueryVars" title="<%t RegistryPage.ExportAllTitle "Export all results to a CSV spreadsheet file" %>">
                            <%t RegistryPage.ExportAll "Export results to CSV" %>
                        </a>
                    </div>

                    <% with $RegistryEntries %>
                        <% if $MoreThanOnePage %>
                            <% include Pagination %>
                        <% end_if %>
                    <% end_with %>
                <% else %>
                    <p class="alert alert-warning" role="alert">
                       <%t RegistryPage.NoResults "No results to show" %>.
                    </p>
                <% end_if %>
            </div>
        </div>

        <% if $RegistryFilterForm %>
            <div class="col-lg-3 offset-lg-1">
                <h3 class="h4"><%t CWP.Registry.FilterTitle "Filters" %></h3>
                <div id="{$DataClass}_searchform" class="searchForm">
                    $RegistryFilterForm
                </div>
            </div>
        <% end_if %>

    </div>
</div>

<% include PageUtilities %>
