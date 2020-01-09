<select {$getAttributesHTML('class')} class="$ExtraClass form-control" <% include AriaAttributes %> >
    <% loop $Options %>
        <% include SilverStripe/Forms/GroupedDropdownFieldOption %>
    <% end_loop %>
</select>
