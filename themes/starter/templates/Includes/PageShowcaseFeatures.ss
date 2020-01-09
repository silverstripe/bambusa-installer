<% if $FeatureOneTitle %>
    <div class="<% if $FeatureTwoContent %>col-lg-4 <% else %>col-lg-8 <% end_if %> page-showcase-feature">
        <h2>$FeatureOneTitle</h2>
        $FeatureOneContent
        <% if $FeatureOneLink && $FeatureOneButtonText %>
            <p><a href="$FeatureOneLink.Link">$FeatureOneButtonText</a></p>
        <% end_if %>
    </div>
<% end_if %>
<% if $FeatureTwoTitle %>
    <div class="col-lg-4 page-showcase-feature">
        <h2>$FeatureTwoTitle</h2>
        $FeatureTwoContent
        <% if $FeatureTwoLink && $FeatureTwoButtonText %>
            <p><a href="$FeatureTwoLink.Link">$FeatureTwoButtonText</a></p>
        <% end_if %>
    </div>
<% end_if %>
