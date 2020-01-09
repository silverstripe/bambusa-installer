<% if $IncludeFormTag %><form {$AttributesHTML}><% end_if %>
    <% if $Message %>
        <div id="{$FormName.ATT}_error" class="alert alert-{$MessageType.ATT}" role="alert">{$Message}</div>
    <% end_if %>
    <% if $Fields %>
        <div class="fields">
            <% loop $Fields %>
                {$FieldHolder}
            <% end_loop %>
        </div>
    <% end_if %>
    <% if $Actions %>
        <div class="actions">
            <% loop $Actions %>
                {$Field}
            <% end_loop %>
        </div>
    <% end_if %>
<% if $IncludeFormTag %></form><% end_if %>
