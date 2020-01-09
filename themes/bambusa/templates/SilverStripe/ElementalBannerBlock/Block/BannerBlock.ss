<a class="banner-block"
  aria-labelledby="elemental-block-title-$ID"
  <% if $CallToActionLink.Page.Link %>
  <% with $CallToActionLink %>
  href="{$Page.Link}"
  <% if $TargetBlank %>target="_blank"<% end_if %>
  <% if $Description %>title="{$Description.ATT}"<% end_if %>
  <% end_with %>
  <% end_if %>
>
<span class="banner-block__flex-box" role="complementary">
    <span class="banner-block__content">
        <% if $Title && $ShowTitle %>
            <span role="heading" aria-level="2" class="banner-block__title h4" id="elemental-block-title-$ID">$Title</span>
        <% end_if %>
        <p>$Content.Plain</p>
        <% if $CallToActionLink.Text %>
        <span class="banner-block__call-to-action">
            {$CallToActionLink.Text.XML}
            <img class="banner-block__call-to-action-icon" src="$resourceURL('themes/bambusa/images/icon-arrow.svg')" alt="" />
        </span>
        <% end_if %>

    </span>
    <% if $File %>
    <% with $File %>
    <span class="banner-block__image" role="img" aria-label="$Title">
        <span class="banner-block__image-inner" style="background-image: url('$ScaleMaxHeight(660).URL'); background-position: {$PercentageX}% {$PercentageY}%"></span>
    </span>
    <% end_with %>
    <% end_if %>
</span>
</a>
