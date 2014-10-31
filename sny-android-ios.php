<?php
/*
Plugin Name: Redirect if android or ios
Description: Redirect to playstore or appstore
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

//Define your playstore and app store link
define("PLAYSTORE_LINK", "");
define("APPSTORE_LINK", "");


add_action('template_redirect', 'sny_os_redirect');
function sny_os_redirect() {
	if(sny_if_android() && PLAYSTORE_LINK){
		header("Location: " . PLAYSTORE_LINK);
	}elseif(sny_if_ios() && APPSTORE_LINK){
		header("Location: ".APPSTORE_LINK);
	}
	
}

function sny_if_android() {
	$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
	return stripos($ua, 'android');
}

function sny_if_ios() {
	$iPod = stripos($_SERVER['HTTP_USER_AGENT'], "iPod");
	$iPhone = stripos($_SERVER['HTTP_USER_AGENT'], "iPhone");
	$iPad = stripos($_SERVER['HTTP_USER_AGENT'], "iPad");
	return $iPod || $iPhone || $iPad ;
}
