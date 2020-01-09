<fieldset id="{$HolderID.ATT}" class="form-group {$ExtraClass.ATT} <% if $Message %>has-error<% end_if %>">
    <% if $Title %>
        <legend class="col-form-label form-group-as-label" id="title-{$ID}">
            {$Title}
            <% if $Required %>
                <span class="required help-text">(<%t CWP_Form.RequiredLabel "required" %>)</span>
            <% end_if %>
        </legend>
    <% end_if %>

    {$Field}
    <% include FormFieldMessage %>
    <% include FormFieldDescription %>
</fieldset>
