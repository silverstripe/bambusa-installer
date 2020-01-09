<select {$getAttributesHTML('class')} class="$ExtraClass form-control<% if $Message %> is-invalid<% end_if %>" <% include AriaAttributes %> >
    <% loop $Options %>
        <option value="{$Value.ATT}" <% if $Selected %>selected="selected"<% end_if %> <% if $Disabled %>disabled="disabled"<% end_if %>>
            <% if $Title %>
                {$Title.XML}
            <% else %>
                &nbsp;
            <% end_if %>
        </option>
    <% end_loop %>
</select>
