<% if $IsReadonly %>
    <ul class="{$ExtraClass.ATT}">
        <% loop $FieldSet %>
            <% if $Selected %>
                <li class="selected">
                    {$RadioLabel}
                    {$FieldHolder}
                </li>
            <% end_if %>
        <% end_loop %>
    </ul>
<% else %>
    <ul class="{$ExtraClass.ATT}">
        <% loop $FieldSet %>
            <li <% if $Selected %>class="selected"<% end_if %>>
                <label>{$RadioButton} {$RadioLabel}</label>
                <% if $FieldList %>
                    {$FieldHolder}
                <% end_if %>
            </li>
        <% end_loop %>
    </ul>
<% end_if %>
