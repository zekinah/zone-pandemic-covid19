<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       zekinahlecaros.com
 * @since      1.0.0
 *
 * @package    Pandemic_Covid19
 * @subpackage Pandemic_Covid19/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Pandemic_Covid19
 * @subpackage Pandemic_Covid19/public
 * @author     Zekinah Lecaros <zjlecaros@gmail.com>
 */
class Pandemic_Covid19_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->deployPublicZone();

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/pandemic-covid19-public.css', array(), $this->version, 'all' );
		wp_enqueue_style('zone-pandemic-covid19-bulma', plugin_dir_url( __FILE__ ) . 'css/bulma.min.css', array(), $this->version, 'all' );
		wp_enqueue_style('zone-pandemic-covid19-datatable-css', plugin_dir_url(__FILE__) . 'css/datatable/jquery.dataTables.css', array(), $this->version);
		wp_enqueue_style('zone-pandemic-covid19-leaflet-css', plugin_dir_url(__FILE__) . 'css/leaflet/leaflet.css', array(), $this->version);
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script('jquery');
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/pandemic-covid19-public.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script('zone-pandemic-covid19-datatable-js', plugin_dir_url(__FILE__) . 'js/datatable/jquery.dataTables.js', array('jquery'), $this->version);
		wp_enqueue_script('zone-pandemic-covid19-leaflet-js', plugin_dir_url(__FILE__) . 'js/leaflet/leaflet.js', array('jquery'), $this->version);
		wp_enqueue_script('zone-pandemic-covid19-ajax', plugin_dir_url(__FILE__)  . 'js/pandemic-covid19-ajax.js', array('jquery', $this->plugin_name), $this->version, false);
		wp_localize_script('zone-pandemic-covid19-ajax', 'pandemicAjax', array('ajax_url' => admin_url('admin-ajax.php'),'ajax_nonce'=>wp_create_nonce('zn-ajax-nonce')));
	}

	public function deployPublicZone()
	{
		add_shortcode( 'zone-covid19', array(&$this, 'zoneCovidContent') );
		add_shortcode( 'zone-covid19-table', array(&$this, 'zoneCovidTableContent') );
		add_action('wp_head',  array(&$this,'zoneCovidHead'));
	}

	public function zoneCovidContent( $atts )
	{
		$atts = shortcode_atts(
			array(
				'country' => '',
				'continent' => '',
				'dark' => '',
			),
			$atts,
			'zone-covid19'
		);

		do_action( 'wp_head', $atts );

		ob_start();
		// Global Record
		if (empty($atts['country']) && empty($atts['continent'])){
			require_once('view/zone-pandemic-covid19-global.php');
		}
		// By Continent Record
		if(empty($atts['country']) && $atts['continent']) {
			require_once('view/zone-pandemic-covid19-continent.php');
		}
		// By Country Record
		if(empty($atts['continent']) && $atts['country']) {
			require_once('view/zone-pandemic-covid19-country.php');
		}
		return ob_get_clean();
	}

	public function zoneCovidHead($atts)
	{
		if($atts) {
			$continent = rawurlencode($atts['continent']);
			$country = rawurlencode($atts['country']);
		}
		echo '<script>
			var zn_global = "all"; 
			var zn_continent = "'.$continent.'"; 
			var zn_country = "'.$country.'";
			var zn_globaltable  = "";
			</script>';
		
	}

	public function zoneCovidTableContent( $atts )
	{
		$tab = '';
		$atts = shortcode_atts(
			array(
				'dark' => '',
			),
			$atts,
			'zone-covid19-table'
		);
		echo '<script>
		var zn_globaltable = "all";
		</script>';
		ob_start();
			require_once('view/zone-pandemic-covid19-table.php');
		return ob_get_clean();
	}

}
