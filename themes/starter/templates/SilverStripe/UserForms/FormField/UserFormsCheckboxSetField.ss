<% if $Options.Count %>
    <% loop $Options %>
        <div class="$Class form-check">
            <input
                id="$ID"
                class="form-check-input<% if $Message %> is-invalid<% end_if %>"
                name="$Name"
                type="checkbox"
                value="$Value.ATT"
                <% if $isChecked %>checked="checked"<% end_if %>
                <% if $isDisabled %> disabled="disabled"<% end_if %>
            />
            <label for="$ID" class="form-check-label">
                $Title
            </label>
        </div>
    <% end_loop %>
<% else %>
    <p><%t CWP_Form.NOOPTIONS 'No options available' %></p>
<% end_if %>
