<%--
Override silverstripe/login-forms default template to add $ModalWindow
--%>
<!DOCTYPE html>
<html lang="$ContentLocale">
    <head>
        <% if $SiteConfig.Title %>
            <title>$SiteConfig.Title: <%t SilverStripe\LoginForms.LOGIN "Log in" %></title>
            $Metatags(false).RAW
        <% else %>
            $Metatags.RAW
        <% end_if %>
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <meta name="color-scheme" content="light dark" />
        <% require css("silverstripe/admin: client/dist/styles/bundle.css") %>
        <% require css("silverstripe/login-forms: client/dist/styles/bundle.css") %>
    </head>
    <body>
        <header class="app-brand">
            <a
                class="app-brand__link"
                href="/"
                title="Go back to homepage of <% if not $SiteConfig.Title %>$SiteConfig.Title<% else %>site<% end_if %>"
            >
                <% include AppBrand %>

                <h1 class="app-brand__name">
                    $SiteConfig.Title
                    <% if not $SiteConfig.Title %>SilverStripe<% end_if %>
                </h1>
            </a>
        </header>

        <main class="login-form">
            <% if $Title %>
                <h2 class="login-form__title">$Title</h2>
            <% end_if %>

            <% if $Message %>
                <p class="login-form__message
                    <% if $MessageType && not $AlertType %>login-form__message--$MessageType<% end_if %>
                    <% if $AlertType %>login-form__message--$AlertType<% end_if %>"
                >
                    $Message
                </p>
            <% end_if %>

            <% if $Content && $Content != $Message %>
                <div class="login-form__content">$Content</div>
            <% end_if %>

            $Form
        </main>

        <footer class="silverstripe-brand">
            <% include SilverStripeLogo %>
        </footer>
        $ModalWindow
        <% require javascript('//code.jquery.com/jquery-3.3.1.min.js') %>
        <% require javascript('themes/starter/dist/js/main.js') %>
        <% require javascript('themes/bambusa/dist/js/main.js') %>
        <% include GoogleAnalytics %>
    </body>
</html>
