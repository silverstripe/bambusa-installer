<div class="container">
    <div class="row justify-content-between">
        <% with $MenuSet('Footer') %>
            <% cached 'FooterMenuSet', $LastEdited, $MenuItems.max('LastEdited'), $MenuItems.count %>
                <% if $MenuItems %>
                    <nav class="footer-nav-links col-auto order-2" aria-label="<%t CWP_Theme.FOOTER 'Footer' %>" role="navigation">
                        <% loop $MenuItems %>
                            <a href="$Link" class="$LinkingMode <% if $LinkingMode = current %> active<% end_if %>"<% if $IsNewWindow %> target="_blank"<% end_if %>>
                                $MenuTitle.XML
                            </a>
                        <% end_loop %>
                    </nav>
                <% end_if %>
            <% end_cached %>
        <% end_with %>
        <% if $SiteConfig.FacebookURL || $SiteConfig.TwitterUsername %>
            <div class="footer-social-links col-auto order-1 order-md-3">
                <% if $SiteConfig.FacebookURL %>
                    <a class="fa fa-facebook" href="http://www.facebook.com/$SiteConfig.FacebookURL">
                        <span class="sr-only"><%t CWP.Footer.FollowOnFacebook "Follow us on Facebook" %></span>
                    </a>
                <% end_if %>

                <% if $SiteConfig.TwitterUsername %>
                    <a class="fa fa-twitter" href="http://www.twitter.com/$SiteConfig.TwitterUsername">
                        <span class="sr-only"><%t CWP.Footer.FollowOnTwitter "Follow us on Twitter" %></span>
                    </a>
                <% end_if %>
            </div>
        <% end_if %>
    </div>

    <hr class="footer-site-divider">

    <div class="row justify-content-between footer-logo">
        <small class="col-auto order-2 pb-3">&copy; $CurrentDatetime.Format(Y) $SiteConfig.Title</small>

        <div class="col-auto order-1 order-md-3 pb-3">
            <a class="col-auto" href="https://www.silverstripe.com/">
                <% include SilverStripeLogo %>
            </a>
        </div>
    </div>
</div>
