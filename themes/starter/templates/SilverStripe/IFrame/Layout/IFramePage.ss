<article class="container">
    <div class="row">
        <section class="col-lg-8 offset-lg-2">
            <header class="page-header">
                $Breadcrumbs
                <h1>$Title</h1>
            </header>
        </section>
    </div>
    <div class="row">
        <section class="col-lg-8 offset-lg-2">
            $Content
            <% if $IFrameURL %>
                <span id="Iframepage-loading" style="display: none;">
                    <%t IframePage.Loading "Loading content..." %>
                </span>
                <div class="sr-only" style="position: absolute; overflow: hidden; clip: rect(0 0 0 0); height: 1px; width: 1px; margin: -1px; padding: 0; border: 0;">
                    <%t IframePage.ExternalNote "Please note the following section of content is possibly being delivered from an external source (IFRAME in HTML terms), and may present unusual experiences for screen readers." %>
                </div>
                <iframe id="Iframepage-iframe" style="$Style" src="$IFrameURL" class="$Class Iframepage-iframe" title="$IFrameTitle">$AlternateContent</iframe>
            <% end_if %>
            $BottomContent
        </section>
    </div>
</article>

<% include PageUtilities %>
