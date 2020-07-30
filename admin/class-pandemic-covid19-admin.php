<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       zekinahlecaros.com
 * @since      1.0.0
 *
 * @package    Pandemic_Covid19
 * @subpackage Pandemic_Covid19/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Pandemic_Covid19
 * @subpackage Pandemic_Covid19/admin
 * @author     Zekinah Lecaros <zjlecaros@gmail.com>
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


class Pandemic_Covid19_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->deployZone();

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/pandemic-covid19-admin.css', array(), $this->version, 'all' );
		if ($_GET['page'] == $this->plugin_name) {
			/* Bootstrap 4 CSS */
			wp_enqueue_style('zone-pcovid-bootstrap-css', plugin_dir_url(__FILE__) . 'css/bootstrap/bootstrap.min.css', array(), $this->version);
		}
		wp_enqueue_style('zone-pcovid-datatable-css', plugin_dir_url(__FILE__) . 'css/datatable/jquery.dataTables.css', array(), $this->version);
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/pandemic-covid19-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name.'-ajax', plugin_dir_url( __FILE__ ) . 'js/pandemic-covid19-admin-ajax.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script('jquery');
		if ($_GET['page'] == $this->plugin_name) {
			/* Bootstrap 4 JS */
			wp_enqueue_script('zone-pcovid-bootstrap-js', plugin_dir_url(__FILE__) . 'js/bootstrap/bootstrap.min.js', array('jquery'), $this->version);
		}
		wp_enqueue_script('zone-pcovid-datatable-js', plugin_dir_url(__FILE__) . 'js/datatable/jquery.dataTables.js', array('jquery'), $this->version);
		wp_localize_script($this->plugin_name.'-ajax', 'pandemicAjax', array('ajax_url' => admin_url('admin-ajax.php'),'ajax_nonce'=>wp_create_nonce('zn-ajax-nonce')));
	}

	public function deployZone()
	{
		add_action('admin_menu', array(&$this, 'zoneOptions'));
		add_action('wp_dashboard_setup', array(&$this,'zone_dashboard_widgets'));
	}

	public function zoneOptions()
	{
		global $zoneRedirectMenu;
		$zoneRedirectMenu = add_menu_page(
			'Zone Covid19', 	//Page Title
			'Zone Covid19',   //Menu Title
			'manage_options', 			//Capability
			'pandemic-covid19', 				//Page ID
			array(&$this, 'zoneOptionsPage'),		//Functions
			'dashicons-image-filter', 						//Favicon
			99							//Position
		);
	}

	public function zone_dashboard_widgets() {
		global $wp_meta_boxes;
		wp_add_dashboard_widget('custom_help_widget', 'Zone Covid19 Data', array(&$this,'zone_dashboard_data'));
	}

	/** Plugin Page */
	public function zoneOptionsPage()
	{
		require_once('view/pandemic-covid19-admin-display.php');
	}

	/** Plugin Widget Dashboard */
	public function zone_dashboard_data() {
		require_once('view/widget-pandemic-covid19-global.php');
	}

}
