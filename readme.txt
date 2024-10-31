=== Plugin Name ===
Contributors: shake10861
Donate link: thenerdnest.com
Tags: RSS, Feed, Checker, Validator, Validation, Dashboard, gadget, widget, curl, bloglovin', google reader,
Requires at least: 3.3.1
Tested up to: 3.3.1
Stable tag: 1.0.1

This widget will submit your wordpress RSS feed to feedvalidator.org, and check the results to verify your feed is valid. 

== Description ==

This is a very simple dashboard widget that will load every time your dashboard loads. It will submit your feed to an online feed validator, grab the response and update your dashboard with the results.

It's best to know immediately that your RSS feed is invalid. Sites such as Bloglovin' and Google Reader will not add your posts to their sites if your RSS feed is invalid. Knowing there is an issue is the first step in resolving the issue!

Most invalid RSS feeds are caused by some html you've used in your post. This widget is not intended to fix your feed, it is just a notification that there may be an issue with your feed. 

This plugin requires cURL to work. cURL is a php library that allows HTTP requests to be sent. This is a core feature of the plugin. The good news is, most online hosting providers have cURL setup and installed for you already. If you install this and the widget displays an error of some sort, you probably have an issue with cURL. 

Homepage for the RSS Feed Validator is: http://www.thenerdnest.com/rss-feed-checker


== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `RSS-Feed-Checker.php`, 'check.png', and 'cross.png' files to the `/wp-content/plugins/rss-feed-validator` directory. 
2. Activate the plugin through the 'Plugins' menu in WordPress
3. You may need to activate the plugin from the dashboard as well, but it should be activated by default. 

== Frequently Asked Questions ==


== Screenshots ==

1. This is what the widget on your dashboard should look like if your feed is valid. 

== Changelog ==

= 1.0 =
* Initial release

= 1.0.1 =
* fixed issue with images not linking properly
* minor updates to the readme.txt