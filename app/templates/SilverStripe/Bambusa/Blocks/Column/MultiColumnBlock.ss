<% cached 'MultiColumnBlock', $ID, $LastEdited, $Items.count(), $Items.max('LastEdited') %>
    <% if $Items.count() == 1 %>
        <% if $LastEdited.getTimestamp < $Items.First.LastEdited.getTimestamp %>
            <%-- If the item's LastEdited is more recent than the block's, use the item's values to break the block's cache --%>
            <% include DNADesign/Elemental/Models/ElementContent HTML=$Items.First.Content, ID=$Items.First.ID, LastEdited=$Items.First.LastEdited %>
        <% else %>
            <%-- Defaults to the block's cache --%>
            <% include DNADesign/Elemental/Models/ElementContent HTML=$Items.First.Content %>
        <% end_if %>
    <% else %>
        <div class="block multicolumn-block multicolumn-block--{$gridSize}">
            <% if $ShowTitle %>
                <h2 class="block__title">$Title</h2>
            <% end_if %>
            <div class="multicolumn-block__list">
                <% loop $Items.Sort('Sort') %>
                    <div class="multicolumn-block__item">
                        $Content
                    </div>
                <% end_loop %>
            </div>
        </div>
    <% end_if %>
<% end_cached %>
