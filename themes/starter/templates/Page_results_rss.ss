<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title>$Title.XML</title>
        <link>$SearchLink.XML</link>
        <description>Results for &quot;{$Query}&quot;</description>
        <atom:link href="$RSSLink.ATT" rel="self" type="application/rss+xml"/>
        <% cached 'page_changes_rss', $ID, $Query, $Results.First.Version %>
            <% loop $Results %>
                <item>
                    <title>$Title.XML</title>
                    <link>$AbsoluteLink</link>
                    <description>
                        $Content.AbsoluteLinks.XML
                    </description>
                    <pubDate>$LastEdited.Rfc822</pubDate>
                    <guid>$AbsoluteLink</guid>
                    <% loop $Terms %>
                        <category>$Name.XML</category>
                    <% end_loop %>
                </item>
            <% end_loop %>
        <% end_cached %>
    </channel>
</rss>
