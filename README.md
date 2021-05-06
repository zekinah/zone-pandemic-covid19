<img src="https://ps.w.org/zone-pandemic-covid-19/assets/banner-772x250.png" alt="Banner" width="100%">

# Zone Pandemic Covid19 for Wordpress

![WordPress Plugin Version](https://img.shields.io/wordpress/plugin/v/zone-pandemic-covid-19?style=flat-square)
![WordPress Plugin: Tested WP Version](https://img.shields.io/wordpress/plugin/tested/zone-pandemic-covid-19?style=flat-square)
![GitHub issues](https://img.shields.io/github/issues/zekinah/zone-pandemic-covid19?style=flat-square)
![WordPress Plugin Rating](https://img.shields.io/wordpress/plugin/stars/zone-pandemic-covid-19?style=flat-square)
![WordPress Plugin Downloads](https://img.shields.io/wordpress/plugin/dt/zone-pandemic-covid-19?style=flat-square)
![GitHub](https://img.shields.io/github/license/zekinah/zone-pandemic-covid19?style=flat-square)
<a href="https://github.com/soroushchehresa/awesome-coronavirus" target="_blank">
    <img src="https://awesome.re/mentioned-badge-flat.svg" alt="Mentioned in Awesome Coronavirus" />
</a>

Requires at least: 3.0.1 <br>
Tested up to: 5.7.1 <br>
Requires PHP: 7 or higher <br>
Stable tag: 1.0.9 <br>
License: GPLv2 or later <br>
License URI: http://www.gnu.org/licenses/gpl-2.0.html <br>

This plugin provides shortcode and widgets that can displays the latest data of the covid19 in the whole world.

## Description

This plugin provides latest data of how many patient(s) are active, confirmed, dead or recovered, in a world, and the continent or country assigned.

## Features

* Updates data every 10 minutes. Which means it is live status of current sitution in the world.
* Shortcode for every country and shows the data of covid 19 from that country.
* Shortcode for every continent and shows the data of covid 19 from that continent.
* Shortcode that provides table for that shows the list of all countries and its data of covid19.
* Shortcode for the overall total global data that is recorded.
* Dashboard Widget on the admin area that shows the Global Status of the covid19.
* Widgets available for Elementor, an alternative for shortcode.

## Shortcodes

* `[zone-covid19]` - Showing the global data card.
* `[zone-covid19 country="US"]` - Showing the card data of specific country.
* `[zone-covid19 continent="North America"]` - Showing the data card of specific continent.
* `[zone-covid19 country="US,Philippines"]` - Showing the data cards of multiple countries.
* `[zone-covid19 continent="North America, Asia"]` - Showing the data cards of multiple continents.
* `[zone-covid19-table]` - Showing the list of all countries and its data in a table form.
* `[zone-covid19-history-graph]` - Showing the historical graph of covid19 cases from the start.
* `[zone-covid19-map]` - Showing the world heat map for covid19 cases.

Additional: Add `dark="true"` if you want a dark mode.

## Widgets Available in Elementor
An alternative for shortcode to output the data.

* Global Status Card
* Countries Status Card
* Continents Status Card
* Table Status
* History Graph
* Heat Map

## WP-CLI Commands (WP-CLI is required on server)
CLI version to get tabular form of Covid19.

__Synopsis__ - `wp zn_covid19 <command> <parameter>` <br>
__Help__ - `wp zn_covid19 --help` <br>
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

## Installation

1. Upload `zone-pandemic-covid-19` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

## API and Data Used
* [Disease SH](https://github.com/disease-sh/API) - [Privacy](https://github.com/NovelCOVID/API/blob/master/privacy.md)
* [Johns Hopkins University](https://github.com/CSSEGISandData/COVID-19)
* [Worldometers](https://www.worldometers.info/coronavirus/)

## Acknowledgment
* Thank you for the third party libraries that is used into this plugin.
    * [Bulma](https://bulma.io/)
    * [Amchart](https://www.amcharts.com/)
    * [DataTable](https://datatables.net/)

## Contributor

Feel free to contribute, subtmit bugs, issues or features to be added.


* **[Zekinah Lecaros](https://github.com/zekinah)** - *Initial work*

<a href="https://www.buymeacoffee.com/zekinah" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/default-orange.png" alt="Buy Me A Coffee" height="41" width="174"></a>