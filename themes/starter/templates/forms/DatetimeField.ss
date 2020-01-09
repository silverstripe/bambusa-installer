<%-- Date field, skipping its holder --%>
<% with $DateField %>
    <input $getAttributesHTML('class')
        class="$ExtraClass.ATT form-control"
        <% if $Up.Title %>aria-labelledby="title-{$Up.ID}"<% end_if %>
        />
<% end_with %>

<%-- Time field, skipping its holder --%>
<% with $DateField %>
    <input $getAttributesHTML('class')
        class="$ExtraClass.ATT form-control"
        <% if $Up.Title %>aria-labelledby="title-{$Up.ID}"<% end_if %>
        />
<% end_with %>

<% if $getConfig('usertimezone') %>
    $TimezoneField.FieldHolder
<% end_if %>

<div class="clear"><!-- --></div>
