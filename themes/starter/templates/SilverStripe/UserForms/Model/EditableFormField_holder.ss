<div id="$Name" class="field form-group<% if $extraClass %> $extraClass<% end_if %><% if $Message %> has-error<% end_if %>">
    <% include FormFieldLabel %>
    {$Field}
    <% include FormFieldMessage %>
    <% include FormFieldDescription %>
</div>
