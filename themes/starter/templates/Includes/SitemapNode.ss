<% if $Children %>
    <a class="page-toggle collapsed sitemap__collapse-action"
        data-loading-message="<%t SitemapNode_ss.LoadingMessage "Please wait" %>"
        data-page-id="{$ID}"
        data-toggle="collapse"
        data-target="#children-{$ID}"
        href="#children-{$ID}"
        role="tab">
        <span class="toggleIco fa fa-plus"></span>
        <span class="sr-only" data-collapse-text="<%t SitemapNode_ss.CollapseLabel "Collapse section" %> {$MenuTitle.ATT}">
            <%-- Switches with data-collapse-text when selected --%>
            <%t SitemapNode_ss.ExpandLabel "Expand section" %> {$MenuTitle}
        </span>
    </a>
<% end_if %>

<div class="page-toggle__children">
    <a href="{$Link}" class="sitemap-link">
        {$MenuTitle}
    </a>

    <%-- Children are populated via AJAX --%>
    <ul id="children-{$ID}" class="collapse"></ul>
</div>
