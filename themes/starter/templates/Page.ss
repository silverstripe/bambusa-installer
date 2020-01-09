<!doctype html>
<html class="no-js" lang="$ContentLocale">
    <head>
        <% base_tag %>
        <title><% if $MetaTitle %>$MetaTitle.XML<% else %>$Title.XML<% end_if %> | $SiteConfig.Title.XML</title>
        $MetaTags(false)
        <meta name="viewport" id="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=10.0,initial-scale=1.0" />
        <% if $RSSLink %>
        <link rel='alternate' type='application/rss+xml' title='RSS' href='$RSSLink'>
        <% end_if %>
        <% require themedCss('dist/css/main.css') %>
        <% include Favicon %>
    </head>
    <body class="$ClassName">
        <header role="banner">
            <% include Header %>
            <% include MainNav %>
        </header>
        <main id="main" class="main" role="main">
            $Layout
        </main>
        <% include PageShowcase %>
        <footer class="footer-site" role="contentinfo">
            <% include Footer %>
        </footer>
        <% require javascript('//code.jquery.com/jquery-3.3.1.min.js') %>
        <% require themedJavascript('dist/js/main.js') %>
        <% include GoogleAnalytics %>
    </body>
</html>
