<div id="{$HolderID.ATT}" class="fieldgroup {$ExtraClass.ATT} <% if $Zebra %>fieldgroup-zebra<% end_if %>">
    <% loop $FieldList %>
        <div class="fieldgroup-field {$FirstLast.ATT} {$EvenOdd.ATT}">
            {$FieldHolder}
        </div>
    <% end_loop %>
</div>
