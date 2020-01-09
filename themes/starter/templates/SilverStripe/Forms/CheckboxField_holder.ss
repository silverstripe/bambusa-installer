<div id="{$HolderID.ATT}" class="field form-group {$ExtraClass.ATT} <% if $Message %>has-error<% end_if %>">
    <div class="form-check">
        {$Field}
        <label class="form-check-label" for="{$ID}">
            {$Title}
        </label>
        <% include FormFieldMessage %>
        <% include FormFieldDescription %>
    </div>
</div>
