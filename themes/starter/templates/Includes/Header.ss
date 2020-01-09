<div class="container site-header clearfix">
    <% include SkipLinks %>
    <div class="site-header-brand">
        <a title="<%t CWP_Header.Title "Go to Home Page" %>" class="site-header-brand-link-default" href="$BaseHref">
            <span>$SiteConfig.Title</span>
        </a>
        <% if $SiteConfig.Tagline %>
            <span class="site-header-brand-tagline">$SiteConfig.Tagline</span>
        <% end_if %>
    </div>
    <div class="navbar-expand-md navbar-light">
        <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
            <span class="sr-only"><%t CWP_Header.Toggle "Toggle navigation" %></span>
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>

    <% include HeaderSearch %>
    <% include LanguageSelector %>
</div>
