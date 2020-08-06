<img src="https://ps.w.org/zone-pandemic-covid-19/assets/banner-772x250.png" alt="Banner" width="100%">

# Zone Pandemic Covid19 for Wordpress

![WordPress Plugin Version](https://img.shields.io/wordpress/plugin/v/zone-pandemic-covid19)
![WordPress Plugin: Tested WP Version](https://img.shields.io/wordpress/plugin/tested/zone-pandemic-covid19)
![GitHub issues](https://img.shields.io/github/issues/zekinah/zone-pandemic-covid19)
![WordPress Plugin Rating](https://img.shields.io/wordpress/plugin/stars/zone-pandemic-covid19)
![WordPress Plugin Downloads](https://img.shields.io/wordpress/plugin/dm/zone-pandemic-covid19)
![GitHub](https://img.shields.io/github/license/zekinah/zone-pandemic-covid19)

Tags: covid19, covid-19, corona, status, report 
Requires at least: 3.0.1
Tested up to: 5.5
Requires PHP: 5.6 or higher
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin provides shortcode that displays the live recorded data of the covid19 in the whole world.

## Description

This plugin provides data of how many patient(s) are active, confirmed, dead or recovered, in a world, and the continent or country assigned.

## Features

* Updates data every 10 minutes. Which means it is live status of current sitution in the world.
* Shortcode for every country and shows the data of covid 19 from that country.
* Shortcode for every continent and shows the data of covid 19 from that continent.
* Shortcode that provides table for that shows the list of all countries and its data of covid19.
* Shortcode for the overall total global data that is recorded.

## Shortcode

* `[zone-covid19]` - Showing the global data.
* `[zone-covid19 country="US"]` - Showing the data of specific country.
* `[zone-covid19 continent="North America"]` - Showing the data of specific continent.
* `[zone-covid19 country="US,Philippines"]` - Showing the data of multiple countries.
* `[zone-covid19 continent="North America, Asia"]` - Showing the data of multiple continents.
* `[zone-covid19-table]` - Showing the list of all countries and its data in a table form.

Additional: Add `dark="true"` if you want a dark mode.

## Installation

1. Upload `zone-pandemic-covid19` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

## API and Data Used
* [Disease SH](https://github.com/disease-sh/API) - [Privacy](https://github.com/NovelCOVID/API/blob/master/privacy.md)
* [Johns Hopkins University](https://github.com/CSSEGISandData/COVID-19)
* [Worldometers](https://www.worldometers.info/coronavirus/)

## Acknowledgment
* Thank you for the third party libraries that is used into this plugin.
    * [Bulma](https://bulma.io/)
    * [Amchart](https://www.amcharts.com/)

## Contributor

Feel free to contribute, subtmit bugs, issues or features to be added.


* **Zekinah Lecaros** - *Initial work* - [Zekinah Lecaros](https://github.com/zekinah)

<a href="https://www.buymeacoffee.com/zekinah" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/default-orange.png" alt="Buy Me A Coffee" height="41" width="174"></a>