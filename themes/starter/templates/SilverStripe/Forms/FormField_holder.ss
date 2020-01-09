<div id="{$HolderID.ATT}" class="field form-group {$ExtraClass} <% if $Message %>has-error<% end_if %>">
    <% include FormFieldLabel %>
    {$Field}
    <% include FormFieldMessage %>
    <% include FormFieldDescription %>
</div>
