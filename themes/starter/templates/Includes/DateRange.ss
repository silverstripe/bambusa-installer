<div class="page-sidebar-widget news-events-date-range">
    <% with $DateRangeForm %>
        <h3 class="h4 page-sidebar-header"><%t CWP\\CWP\\PageTypes\\EventHolder.Date "Date" %></h3>
        <form $FormAttributes>
            <% if $Message %>
                <div id="{$FormName}_error" class="message $MessageType">$Message</div>
            <% else %>
                <div id="{$FormName}_error" class="message $MessageType" style="display: none"></div>
            <% end_if %>

            <fieldset>
                $Fields.dataFieldByName('from').FieldHolder
                $Fields.dataFieldByName('to').FieldHolder
                $Fields.dataFieldByName('tag').FieldHolder
                $Fields.dataFieldByName('SecurityID').FieldHolder
            </fieldset>

            <div class="Actions">
                <% if $Actions %>
                    <% loop $Actions %>$Field<% end_loop %>
                <% end_if %>
            </div>
        </form>
    <% end_with %>
</div>
