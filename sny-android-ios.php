<?php
/*
Plugin Name: Android iOs content shortcode
Description: Show content using shortcode [if-android][/if-android] or [if-ios][/if-ios]
Plugin URI: http://mrova.com
Author: Sunny Luthra
Version: 1.0
License: GPL2
*/
/*

    Copyright (C) Year  Sunny Luthra  Email

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
add_shortcode('if-android', 'sny_if_android');
add_shortcode('if-ios', 'sny_if_ios');

function sny_if_android($attr, $content) {
	$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
	if (stripos($ua, 'android') !== false) {
		return $content;
	}
}

function sny_if_ios($attr, $content) {
	$iPod   = stripos($_SERVER['HTTP_USER_AGENT'], "iPod");
	$iPhone = stripos($_SERVER['HTTP_USER_AGENT'], "iPhone");
	$iPad   = stripos($_SERVER['HTTP_USER_AGENT'], "iPad");
	if($iPod || $iPhone || $iPad){
		return $content;
	}
}
