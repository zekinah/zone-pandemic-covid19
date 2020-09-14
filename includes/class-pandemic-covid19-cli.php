<?php

/**
 * This file is for WP-CLI Integration
 *
 * @link       zekinahlecaros.com
 * @since      1.0.0
 *
 * @package    Pandemic_Covid19
 * @subpackage Pandemic_Covid19/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all commands available on this plugin
 *
 * @since      1.0.0
 * @package    Pandemic_Covid19
 * @subpackage Pandemic_Covid19/includes
 * @author     Zekinah Lecaros <zjlecaros@gmail.com>
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Pandemic_Covid19_CLI {

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'PANDEMIC_COVID19_VERSION' ) ) {
			$this->version = PANDEMIC_COVID19_VERSION;
		} else {
			$this->version = '1.0.6';
		}
		$this->plugin_name = 'pandemic-covid19';
	}

	/**
	 *  Show the plugin version
	 * `wp zn_covid19 global`
	 */
	public function version() {
		WP_CLI::line('v' . $this->version);
	}

	private function calldiseaseAPI($method, $url, $data){
		$curl = curl_init();

		$url = sprintf("%s?%s", $url, http_build_query($data));
		// OPTIONS:
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		   'Content-Type: application/json',
		));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		// EXECUTE:
		$result = curl_exec($curl);
		if(!$result){die("Connection Failure");}
		curl_close($curl);
		return $result;
	 }

	/**
	 *  Show Total Global Cases
	 * `wp zn_covid19 global`
	 */
	public function global($global) {
		/**
		 * $global[0] =  // List of Available Queries ('cases', 'todayCases', 'deaths', 'todayDeaths', 'recovered', 'active', 'critical', 'tests')
		 */
		$get_data = $this->calldiseaseAPI('GET', 'https://disease.sh/v3/covid-19/all', array());
		$response = json_decode($get_data, true);
		$temp = array();
		array_push($temp,$response);
		$response = $temp;
		if($global[0]) {
			// Custom Query
			WP_CLI\Utils\format_items( 'table', $response, $global[0]);
		} else {
			WP_CLI\Utils\format_items( 'table', $response, array( 'cases', 'todayCases', 'deaths', 'todayDeaths', 'recovered', 'active', 'critical', 'tests' ) );
	
		}
	}

	/**
	 *  Show the List of Country and its Covid Datas
	 * `wp zn_covid19 display_country`
	 */
	public function display_country($country) {
		/**
		 * $country[0] = // Name of Countries)
		 * $country[1] = // List of Available Queries ('cases', 'todayCases', 'deaths', 'todayDeaths', 'recovered', 'active', 'critical', 'tests')
		 */
		$get_data = $this->calldiseaseAPI('GET', 'https://disease.sh/v3/covid-19/countries/'. $country[0], array());
		$response = json_decode($get_data, true);
		if (is_array($response)) {
			if (! $response[0]) {
				// If Single Result
				$temp = array();
				array_push($temp,$response);
				$response = $temp;
			}
			if($country[1]) {
				// Custom Query
				$default = array('country');
				$query = explode(",", $country[1] );
				$merge_query = array_merge($default,$query);
				WP_CLI\Utils\format_items( 'table', $response, $merge_query);
			} else {
				// Show selected parameter
				WP_CLI\Utils\format_items( 'table', $response, array( 'country', 'cases', 'todayCases', 'deaths', 'todayDeaths', 'recovered', 'active', 'critical', 'tests' ) );
			}
		} else {
			WP_CLI::line('Please define the country correctly.');
		}
		
	}

	/**
	 *  Show the List of Continent and its Covid Datas
	 * `wp zn_covid19 display_continent`
	 */
	public function display_continent($continent) {
		/**
		 * $continent[0] = // Name of Continent(s)
		 * $continent[1] = // List of Available Queries ('cases', 'todayCases', 'deaths', 'todayDeaths', 'recovered', 'active', 'critical', 'tests')
		 */
		$get_data = $this->calldiseaseAPI('GET', 'https://disease.sh/v3/covid-19/continents/'. $continent[0], array());
		$response = json_decode($get_data, true);
		if (is_array($response)) {
			if (! $response[0]) {
				// If Single Result
				$temp = array();
				array_push($temp,$response);
				$response = $temp;
			}
			if($continent[1]) {
				// Custom Query
				$default = array('continent');
				$query = explode(",", $continent[1] );
				$merge_query = array_merge($default,$query);
				WP_CLI\Utils\format_items( 'table', $response, $merge_query);
			} else {
				// Show selected parameter
				WP_CLI\Utils\format_items( 'table', $response, array( 'continent', 'cases', 'todayCases', 'deaths', 'todayDeaths', 'recovered', 'active', 'critical', 'tests' ) );
			}
		} else {
			WP_CLI::line('Please define the continent correctly.');
		}
		
	}

}

/**
 * Registers our command when cli get's initialized.
 *
 * @since  1.0.0
 * @author Zekinah Lecaros
 */
function zn_cli_register_commands() {
	WP_CLI::add_command( 'zn_covid19', 'Pandemic_Covid19_CLI' );
}

add_action( 'cli_init', 'zn_cli_register_commands' );