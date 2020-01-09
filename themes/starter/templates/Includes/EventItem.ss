<footer itemscope itemtype="http://schema.org/Event">
    <address class="meta-info">
    <% if $Location %>
        $NiceLocation,
    <% end_if %>
    <% if $Date %>
        <time>
            <span itemprop="startDate" datetime="{$Date.Format('y-MM-dd')}<% if $StartTime %>T{$StartTime.Format('HH:mm:ss')}<% end_if %>">
                $Date.Format('dd/MM/y') <% if $StartTime %>$StartTime.Nice<% end_if %>
            </span>
            <% if $EndTime %>
                <span itemprop="endDate" datetime="{$Date.Format('y-MM-dd')}T{$EndTime.Format('HH:mm:ss')}">- $EndTime.Nice</span>
            <% end_if %>
        </time>
    <% end_if %>
    </address>
</footer>

<% if $Content.RichLinks %>
    $Content.RichLinks
<% else %>
    $Content
<% end_if %>

<p><a href="$Parent.Link" class="hidden-print"><i class="fa fa-angle-left mr-1" aria-hidden="true"></i><%t CWP.Event.BACK "Back to the event listing" %></a></p>

$Form
