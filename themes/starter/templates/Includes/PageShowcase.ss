<% if $ClassName == "HomePage" %>
    <% if $FeatureOneTitle || $FeatureTwoTitle || $QuickLinks %>
        <div class="page-showcase">
            <div class="container">
                <div class="row">
                    <% include PageShowcaseQuicklinks %>
                    <% include PageShowcaseFeatures %>
                </div>
            </div>
        </div>
    <% end_if %>
<% end_if %>
