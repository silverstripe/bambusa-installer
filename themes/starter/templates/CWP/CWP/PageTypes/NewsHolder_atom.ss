<?xml version="1.0" encoding="utf-8"?>
<feed xmlns="http://www.w3.org/2005/Atom">
    <title>$Title.XML</title>
    <link href="$Link.ATT" rel="self"/>
    <link href="$BaseHref.ATT"/>
    <id>$Link.XML</id>
    <updated><% if $Entries %>$Entries.First.LastEdited.Rfc3339<% else %>$Now.Rfc3339<% end_if %></updated>
    <% loop $Entries %>
        <entry>
            <title>$Title.XML</title>
            <link href="$AbsoluteLink"/>
            <% if $Description %>
                <summary type="html">$Description.AbsoluteLinks.XML</summary>
            <% end_if %>
            <updated><% if $Date %>$Date.Rfc3339<% else %>$Created.Rfc3339<% end_if %></updated>
            <author>
                <name><% if $Author %>$Author.XML<% end_if %></name>
            </author>
            <id>$AbsoluteLink</id>
            <% if $FeaturedImage %>
                <link rel="enclosure" type="image/$FeaturedImage.Extension" href="$FeaturedImage.AbsoluteURL"/>
            <% end_if %>
            <% loop $Terms %>
                <category term="$Name.XML"/>
            <% end_loop %>
        </entry>
    <% end_loop %>
</feed>
