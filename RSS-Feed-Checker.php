<?php 
/*
Plugin Name: RSS Feed Checker
Plugin URI: http://www.thenerdnest.com/rss-feed-checker
Description: This plugin will add a small notification when your feed is no longer valid. 
Version: 1.0
Author: Jake Anderson
Author URI: http://jakeanderson.net
License: GPL2
  	
  	Copyright 2012  Jake Anderson  (email : jake@jakeanderson.net)

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

//===================================================================================//

// Create the function to output the contents of our Dashboard Widget
function checkRSSfeed() {
	
	$url = "http://feedvalidator.org/check.cgi?url=" . get_bloginfo('rss2_url') . "&output=soap12";	
		
	
	$ch = curl_init(); 								//Initialize the Curl session 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 	//Set curl to return the data instead of printing it to the browser.
	curl_setopt($ch, CURLOPT_URL, $url); 			//Set the URL
	$response = curl_exec($ch);						//Execute the fetch 
	curl_close($ch);								//Close the connection 
	
	//parse results for answer
	$a = strpos($response, '<m:validity>', 0)+12; 
	$b = strpos($response, '</m:validity>', $a); 
	$result = substr($response, $a, $b-$a); 
	
	$siteURL = get_bloginfo('url');
	$trueIMG = $siteURL . "/wp-content/plugins/rss-feed-validator/check.png";
	$falseIMG = $siteURL . "/wp-content/plugins/rss-feed-validator/cross.png";
	
	echo "<div style='font-weight:bold; font-size:16px; font-family:'helvetica', sans-serif;'><table border='0'><tr>";
	if($result == "true") {
		echo "<td><img src='$trueIMG' /></td><td valign='center' style='color:#97c748;'>Your site has a valid RSS feed.</td>";		
	} else {
		echo "<td><img src='$falseIMG' /></td><td valign='center' style='color:#a93229;'>Your site's RSS feed may have issues.</td>";
	}
	echo "</tr></table></div>";
	
	
} 


// Create the function use in the action hook
function addFeedChecker() {
	wp_add_dashboard_widget('RSS-Feed-Checker', 'RSS Feed Validator', 'checkRSSfeed');	
} 

// Hook into the 'wp_dashboard_setup' action to register our other functions
add_action('wp_dashboard_setup', 'addFeedChecker' );

?>