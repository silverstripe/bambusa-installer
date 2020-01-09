<span id="{$HolderID.ATT}" class="{$ExtraClass.ATT}<% if $Message %> has-error<% end_if %>">
    <div  class="form-check form-check-inline">
        {$Field}
        <label class="form-check-label" for="{$ID}">
            {$Title}
        </label>
        <% include FormFieldMessage %>
    </div>
</span>
