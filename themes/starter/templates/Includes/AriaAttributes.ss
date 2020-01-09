<% if $Message || $Description %>
    aria-describedby="<% if $Message %>message-$ID<% end_if %><% if $Description %><% if $Message %> <% end_if %>describes-$ID<% end_if %>"
<% end_if %>
<% if $Title || $RightTitle %>
    aria-labelledby="<% if $Title %>title-$ID<% end_if %><% if $RightTitle %><% if $Title %> <% end_if %>extra-label-$ID<% end_if %>"
<% end_if %>
