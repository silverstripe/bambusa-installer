<div class="container">
    <div class="row justify-content-between">
        <% if $Footer.Children %>
            <nav class="footer-nav-links col-auto" aria-label="<%t CWP_Theme.FOOTER 'Footer' %>" role="navigation">
                <% loop $Footer.Children %>
                    <a href="$Link" class="$LinkingMode <% if $LinkingMode = current %> active<% end_if %>">
                        $MenuTitle.XML
                    </a>
                <% end_loop %>
            </nav>
        <% end_if %>

        <% if $SiteConfig.FacebookURL || $SiteConfig.TwitterUsername %>
            <div class="footer-nav-links footer-social-links col-auto">
                <% if $SiteConfig.TwitterUsername %>
                    <a href="http://www.twitter.com/$SiteConfig.TwitterUsername">
                        <%t CWP_Footer.FollowOnTwitter "Follow us on Twitter" %></a>
                <% end_if %>

                <% if $SiteConfig.FacebookURL %>
                    <a href="http://www.facebook.com/$SiteConfig.FacebookURL">
                        <%t CWP_Footer.FollowOnFacebook "Follow us on Facebook" %></a>
                <% end_if %>
            </div>
        <% end_if %>
    </div>

    <hr class="mb-4 mt-4">

    <div class="row justify-content-between">
        <div class="col-auto">
            <p>
                <small>&copy; $CurrentDatetime.Format(y) $SiteConfig.Title</small>
            </p>
        </div>
        <div class="col-auto">
            <a href="https://www.govt.nz/" class="footer-govt-logo">
                <img src="$resourceURL('themes/starter/images/newzealand-government-footer.png')"
                    width="210"
                    alt="<%t CWP_Footer.GovAlt 'newzealand.govt.nz - connecting you to New Zealand central &amp; local government services' %>"
                />
            </a>
        </div>
    </div>
</div>
