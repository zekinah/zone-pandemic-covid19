=== Zone Pandemic Covid19 ===
Contributors: zekinah
Donate link: https://www.buymeacoffee.com/zekinah
Tags: covid19, covid-19, corona virus, coronavirus, report 
Requires at least: 3.0.1
Tested up to: 5.5
Requires PHP: 5.6 or higher
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin provides shortcode and widgets that can displays the latest data of the covid19 in the whole world.

== Description ==

This plugin provides latest data of how many patient(s) are active, confirmed, dead or recovered, in a world, and the continent or country assigned.

== Features == 

* Updates data every 10 minutes (Not the plugin itself). Which means it is live status of current sitution in the world.
* Shortcode for every country and shows the data of covid 19 from that country.
* Shortcode for every continent and shows the data of covid 19 from that continent.
* Shortcode that provides table for that shows the list of all countries and its data of covid19.
* Shortcode for the overall total global data that is recorded.
* Dashboard Widget on the admin area that shows the Global Status of the covid19.
* Widgets available for Elementor, an alternative for shortcode.

== Shortcodes == 

* `[zone-covid19]` - Showing the global data cards.
* `[zone-covid19 country="US"]` - Showing the data of specific country.
* `[zone-covid19 continent="North America"]` - Showing the data card of specific continent.
* `[zone-covid19 country="US,Philippines"]` - Showing the data cards of multiple countries.
* `[zone-covid19 continent="North America, Asia"]` - Showing the data cards of multiple continents.
* `[zone-covid19-table]` - Showing the list of all countries and its data in a table form.
* `[zone-covid19-history-graph]` - Showing the historical graph of covid19 cases from the start.
* `[zone-covid19-map]` - Showing the world heat map for covid19 cases.

Additional: Add `dark="true"` if you want a dark mode.

== Widgets Available in Elementor ==
An alternative for shortcode to output the data.

* Global Status Card
* Countries Status Card
* Continents Status Card
* Table Status
* History Graph
* Heat Map

== WP-CLI Commands == (WP-CLI is required on server*)
CLI version to get tabular form of Covid19.

__Synopsis__ - `wp zn_covid19 <command>` <br>
__Help__ - `wp zn_covid19 --help`
__Parameter available__ - `cases, todayCases, deaths, todayDeaths, recovered, active, critical, tests`

__Subcommands__
* `display_continent` - Show the List of Continent and its Covid Datas
* `display_country` - Show the List of Country and its Covid Datas
* `global` - Show Total Global Cases
* `version` - Show the plugin version

#### Example
```
// Displays the list of Continent
wp zn_covid19 display_continent

// Displays the covid19 data of a continent
wp zn_covid19 display_continent 'North America' 

// Displays the cases for today of continent
wp zn_covid19 display_continent 'North America' todayCases 
```

== API used == 

* [Disease SH](https://github.com/disease-sh/API) - [Privacy](https://github.com/NovelCOVID/API/blob/master/privacy.md)
* [Johns Hopkins University](https://github.com/CSSEGISandData/COVID-19)
* [Worldometers](https://www.worldometers.info/coronavirus/)

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

The API provides the global data of Covid19 cases including active, tested, recovered and deaths. and it all updates every 10 minutes.

= The plugin didn't work when Im in Russia? =

The API that we are using on this plugin was blocked in Russian Government Regulator since April 10, 2020.

== Screenshots ==

1. Plugin home page.

2. Wordpress dashboard widget.

3. Result of the Shortcode for global data.

4. Result of the Shortcode for for multiple continents.

5. Result of the Shortcode for for multiple countries.

6. Result of the Shortcode for the list of all countries and its data in a table form.

7. Result of the Shortcode for the Historical Graph.

8. Result of the Shortcode for the World Heat Map.

9. Result of the WP-CLI Command showing the global data.

== Changelog ==
= 1.0.6 =
* Added WP-CLI Commands (WP-CLI is required on server*)
    * `wp zn_covid19 --help` to show available commands

= 1.0.5 =
* Elementor Integration

= 1.0.4 =
* Fixed minor bugs for showing Single Country
* Fixed minor bugs for showing Single continent

= 1.0.3 =
* Added Historical Graph ShortCode
* Added World Heat Map Cases ShortCode

= 1.0.0 =
* Initial Release