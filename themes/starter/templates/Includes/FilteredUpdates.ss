<% loop $FilteredUpdates(10) %>
    <article class="news-events-article listing__item<% if $ClassName == 'CWP\CWP\PageTypes\NewsPage' || $ClassName == 'CWP\CWP\PageTypes\NewsHolder' %>--news-events<% end_if %> clearfix">

        <% if $FeaturedImage %>
            <figure class="float-right news-events-item-figure">
                $FeaturedImage.Fill(150, 150)
            </figure>
        <% end_if %>

        <header>
            <h1 class="h4 listing__title"><a href="$Link">$Title</a></h1>
        </header>

        <% if $Up.ControllerName == 'CWP\\CWP\\PageTypes\\EventHolder' %>

            <% if $Date %>
                <p class="meta-info">
                    <% if $Location %>
                        $NiceLocation,
                    <% end_if %>
                    <% if $Date %>
                        <time datetime="$Date">$Date.Format('dd MMM y') <% if $StartTime %>$StartTime.Format(h:mma) <% if $EndTime %>- $EndTime.Format(h:mma) <% end_if %><% end_if %></time>
                    <% end_if %>
                </p>
            <% end_if %>

        <% else_if $Up.ControllerName == 'CWP\\CWP\\PageTypes\\NewsHolder' %>

            <% if $Date || $Author %>
                <p class="meta-info">
                    <% if $Date %>
                        <time datetime="$Date">$Date.Format('dd MMM y')<% if $StartTime %>$StartTime.Nice <% end_if %>
                        </time>
                    <% end_if %>
                    <% if $Author %>by {$Author}<% end_if %>
                </p>
            <% end_if %>

        <% end_if %>

        <p>
            <% if $Abstract %>
                $Abstract
            <% else %>
                $Content.LimitWordCount
            <% end_if %>
        </p>

    </article>
<% end_loop %>

<% with $FilteredUpdates(10) %>
    <% include Pagination %>
<% end_with %>
