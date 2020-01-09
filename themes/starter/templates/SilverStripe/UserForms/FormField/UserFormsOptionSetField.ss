<% loop $Options %>
<div class="$Class form-check">
    <input
        id="$ID"
        class="form-check-input"
        name="$Name"
        type="radio"
        value="$Value.ATT"
        <% if $isChecked %>checked<% end_if %>
        <% if $isDisabled %>disabled<% end_if %>
        <% if $Up.Required %>required<% end_if %>
    />
    <label for="$ID" class="form-check-label">
        $Title
    </label>
</div>
<% end_loop %>
