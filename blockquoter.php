<?php
/*
Plugin Name: Blockquoter
Plugin URI: http://codecandies.de/wordpress-plugins/
Plugin Description: Adds citations for the blockquote tag from attribute cite
Version: 0.2
Author: Nico Bruenjes
Author URI: http://codecandies.de

Blockquotee - Adds citations for the blockquote tag from attribute cite
Copyright (c) 2008 Nico Bruenjes

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
*/

function nb_blockquoter($theContent){
    return preg_replace("/<blockquote cite[ ]?=[ ]?[\"|'](.*?)[\"|'][ ]?>(.*)?<\/blockquote>/es", "nb_blockquote('$1', '$2')", $theContent);
}

function nb_blockquote($source, $quote){
	$purl = parse_url($source);
        $text = $purl["host"];
	return "<blockquote cite=\"$source\">$quote <p class=\"citesource\"><cite><a href=\"$source\">$text</a></cite></p></blockquote>";
}

add_filter('the_content', 'nb_blockquoter', 10);
?>