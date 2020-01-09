<div class="content search-results">
    <div class="container">
        <div class="row">
            <section class="col-lg-8 offset-lg-2">
                <div class="search-results__heading">
                    <h1><%t Bambusa.SEARCHED_FOR "You searched for &quot;{query}&quot;" query=$Query %></h1>
                </div>
                <% if $Results.SuggestionNice %>
                    <h4>Spellcheck</h4>
                    <p>Did you mean <em><a href="$Link?q=$Results.SuggestionQueryString">$Results.SuggestionNice</a></em></p>
                <% end_if %>
                <% if $Results.Matches %>
                        <h5>$Results.Matches.TotalItems results found.</h5>
                        <div class="listing">
                            <% loop $Results.Matches %>
                                <article class="listing__item listing__item--search-result" data-highlight="$Up.Query.ATT">
                                    <header>
                                        <h1 class="h4">
                                            <a href="$Link" title="$Title">$Title</a>
                                        </h1>
                                        $Breadcrumbs
                                    </header>
                                    <% if $ElementsForSearch %>
                                        $ElementsForSearch.ContextSummary(300, $Top.Query)
                                    <% else %>
                                        $Content.ContextSummary(300, $Top.Query)
                                    <% end_if %>
                                </article>
                            <% end_loop %>
                        </div>
                        <% with $Results.Matches %>
                            <% include Pagination %>
                        <% end_with %>
                    <% else %>
                        No results
                    <% end_if %>
            </section>
        </div>
    </div>
</div>
