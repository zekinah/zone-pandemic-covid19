=== Zone Pandemic Covid19 ===
Contributors: zekinah
Donate link: https://www.buymeacoffee.com/zekinah
Tags: covid19, covid-19, corona virus, status, report 
Requires at least: 3.0.1
Tested up to: 5.5
Requires PHP: 5.6 or higher
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin provides shortcode that displays the live recorded data of the covid19 in the whole world.

== Description ==

This plugin provides data of how many patient(s) are active, confirmed, dead or recovered, in a world, and the continent or country assigned.

== API used == 

* [Disease SH](https://github.com/disease-sh/API) - [Privacy](https://github.com/NovelCOVID/API/blob/master/privacy.md)
* [Johns Hopkins University](https://github.com/CSSEGISandData/COVID-19)
* [Worldometers](https://www.worldometers.info/coronavirus/)

== Features == 

* Updates data every 10 minutes (Not the plugin itself). Which means it is live status of current sitution in the world.
* Shortcode for every country and shows the data of covid 19 from that country.
* Shortcode for every continent and shows the data of covid 19 from that continent.
* Shortcode that provides table for that shows the list of all countries and its data of covid19.
* Shortcode for the overall total global data that is recorded.
* Dashboard Widget on the admin area that shows the Global Status of the covid19.

== Shortcodes == 

* `[zone-covid19]` - Showing the global data.
* `[zone-covid19 country="US"]` - Showing the data of specific country.
* `[zone-covid19 continent="North America"]` - Showing the data of specific continent.
* `[zone-covid19 country="US,Philippines"]` - Showing the data of multiple countries.
* `[zone-covid19 continent="North America, Asia"]` - Showing the data of multiple continents.
* `[zone-covid19-table]` - Showing the list of all countries and its data in a table form.

Additional: Add `dark="true"` if you want a dark mode.

Support
Feel free to help with development or issue reporting to

[Github Repository](https://github.com/zekinah/zone-pandemic-covid19)

== Installation ==

The plugin is simple to install:

1. Upload `zone-pandemic-covid19` to the `/wp-content/plugins/` directory
2. Activate the plugin through the \'Plugins\' menu in WordPress
3. Get the list of shortcode from the Zone Covid19 on sidebar.

== Frequently Asked Questions ==

= What are the scope of API ? =

The API provides the world global data of Covid19 and updates every 10 minutes.

= The plugin didn't work when Im in Russia? =

The API that we are using on this plugin was blocked in Russian Government Regulator since April 10, 2020.

== Screenshots ==

1. Plugin home page.

2. Wordpress dashboard widget.

3. Result of the Shortcode for global data.

4. Result of the Shortcode for for multiple continents.

5. Result of the Shortcode for for multiple countries.

6. Result of the Shortcode for the list of all countries and its data in a table form.

== Changelog ==

= 1.0 =
* Intial Release