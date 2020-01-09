<$Tag id="{$HolderID.ATT}" class="form-group CompositeField {$ExtraClass.ATT} <% if $ColumnCount %>multicolumn<% end_if %> <% if $Message %>has-error<% end_if %>">
    <% if $Tag == "fieldset" && $Legend %>
        <legend>{$Legend.XML}</legend>
    <% end_if %>
    {$Field}
</$Tag>
