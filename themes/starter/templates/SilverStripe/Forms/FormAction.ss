<% if $UseButtonTag %>
    <button $getAttributesHTML('class') class="{$ExtraClass.ATT} btn btn-secondary rounded" />
    <% if $ButtonContent %>
        {$ButtonContent.RAW}
    <% else %>
        {$Title.XML}
    <% end_if %>
    </button>
<% else %>
    <input $getAttributesHTML('class') class="{$ExtraClass.ATT} btn btn-secondary rounded" />
<% end_if %>
