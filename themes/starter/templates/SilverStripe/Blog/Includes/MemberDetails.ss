<div class="blog-member-details row">
    <% if $CurrentProfile.BlogProfileImage %>
        <div class="profile-image col-lg-3">
            $CurrentProfile.BlogProfileImage.ScaleWidth(180)
        </div>
    <% end_if %>

    <div class="profile-summary col-lg-9">
        <h2>$CurrentProfile.FirstName $CurrentProfile.Surname</h2>
        <p>$CurrentProfile.BlogProfileSummary</p>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <hr>
    </div>
</div>
