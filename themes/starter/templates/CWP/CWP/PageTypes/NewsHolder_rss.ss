<?xml version="1.0"?>
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title>$Title</title>
        <link>$Link</link>
        <atom:link href="$Link" rel="self" type="application/rss+xml"/>
        <description>$Description.XML</description>

        <% loop $Entries %>
            <item>
                <title>$Title.XML</title>
                <link>$AbsoluteLink</link>
                <% if $Description %>
                    <description>$Description.AbsoluteLinks.XML</description>
                <% end_if %>
                <% if $Date %>
                    <pubDate>$Date.Rfc822</pubDate>
                <% else %>
                    <pubDate>$Created.Rfc822</pubDate>
                <% end_if %>
                <% if $Author %>
                    <dc:creator>$Author.XML</dc:creator>
                <% end_if %>
                <guid>$AbsoluteLink</guid>
                <!-- This is atom, won't work in RSS2. Left in for when we upgrade to Atom -->
                <% if $FeaturedImage %>
                    <link rel="enclosure" type="image/$FeaturedImage.Extension" href="$FeaturedImage.AbsoluteURL"/>
                <% end_if %>
                <% loop $Terms %>
                    <category>$Name.XML</category>
                <% end_loop %>
            </item>
        <% end_loop %>
    </channel>
</rss>
