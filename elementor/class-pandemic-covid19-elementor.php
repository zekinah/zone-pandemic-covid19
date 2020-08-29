<?php

/**
 * The elementor-specific functionality of the plugin.
 *
 * @link       zekinahlecaros.com
 * @since      1.0.0
 *
 * @package    Pandemic_Covid19
 * @subpackage Pandemic_Covid19/elementor
 */

/**
 * The elementor-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the elementor-specific stylesheet and JavaScript.
 *
 * @package    Pandemic_Covid19
 * @subpackage Pandemic_Covid19/elementor
 * @author     Zekinah Lecaros <zjlecaros@gmail.com>
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Pandemic_Covid19_Elementor
{

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
	 * The version of elementor for this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
    private $elementor_version;
    
    /**
	 * The version of PHP for this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $php_version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{
		if ( defined( 'MINIMUM_ELEMENTOR_VERSION' ) ) {
			$this->elementor_version = MINIMUM_ELEMENTOR_VERSION;
		} else {
            $this->elementor_version = '2.0.0';
        }

		if ( defined( 'MINIMUM_PHP_VERSION' ) ) {
			$this->php_version = MINIMUM_PHP_VERSION;
		} else {
            $this->php_version = '7.0';
        }

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->deployZoneElementor();
    }
    
    /**
	 * Initialize the Compatibility with Elementor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function deployZoneElementor() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', array(&$this, 'admin_notice_missing_main_plugin') );
		} else {
            // Add Plugin actions
            add_action( 'elementor/widgets/widgets_registered', array(&$this, 'init_widgets') );
            // Register Widget Styles
            add_action( 'elementor/frontend/after_enqueue_styles', array(&$this, 'widget_styles') );
            // Register Widget Scripts
            add_action( 'elementor/frontend/after_register_scripts', array(&$this, 'widget_scripts') );
            // Register Widget Catergory
            add_action( 'elementor/elements/categories_registered', array(&$this,'add_elementor_widget_categories') );
        }

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, $this->elementor_version, '>=' ) ) {
			add_action( 'admin_notices', array(&$this, 'admin_notice_minimum_elementor_version') );
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, $this->php_version, '<' ) ) {
			add_action( 'admin_notices', array(&$this, 'admin_notice_minimum_php_version') );
		}
    }
    
    /**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( 'Optional: To enable "%1$s" widgets, it requires to install the "%2$s" else use the normal shortcode instead.', 'pandemic-covid19' ),
			'<strong>' . esc_html__( 'Zone Pandemic Covid19', 'pandemic-covid19' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'pandemic-covid19' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'pandemic-covid19' ),
			'<strong>' . esc_html__( 'Zone Pandemic Covid-19', 'pandemic-covid19' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'pandemic-covid19' ) . '</strong>',
			 $this->elementor_version
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'pandemic-covid19' ),
			'<strong>' . esc_html__( 'Zone Pandemic Covid-19', 'pandemic-covid19' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'pandemic-covid19' ) . '</strong>',
			 $this->php_version
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() {

		// Include Widget files
        require_once plugin_dir_path( dirname( __FILE__ ) ) . '/elementor/widgets/class-pandemic-covid19-widget-card-country.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . '/elementor/widgets/class-pandemic-covid19-widget-card-continent.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . '/elementor/widgets/class-pandemic-covid19-widget-table.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . '/elementor/widgets/class-pandemic-covid19-widget-table.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . '/elementor/widgets/class-pandemic-covid19-widget-graph.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . '/elementor/widgets/class-pandemic-covid19-widget-map.php';

        // Register widget
        $widget_manager = \Elementor\Plugin::instance()->widgets_manager;
		$widget_manager->register_widget_type( new \Pandemic_Covid19_Widget_Card_Country() );
		$widget_manager->register_widget_type( new \Pandemic_Covid19_Widget_Card_Continent() );
        $widget_manager->register_widget_type( new \Pandemic_Covid19_Widget_Table() );
        $widget_manager->register_widget_type( new \Pandemic_Covid19_Widget_Graph() );
        $widget_manager->register_widget_type( new \Pandemic_Covid19_Widget_Map() );

	}

    /**
	 * Register the stylesheets for the Elementor Widget.
	 *
	 * @since    1.0.0
	 */
    public function widget_styles() {

		wp_register_style( 'pandemic-covid19-widget-css', plugin_dir_url(__FILE__) . 'assets/css/pandemic-covid19-elementor.css', array(), $this->version, 'all' );

    }
    
    
	/**
	 * Register the JavaScript for the Elementor Widget.
	 *
	 * @since    1.0.0
	 */
    public function widget_scripts() {

		wp_register_script( 'pandemic-covid19-widget-js', plugin_dir_url(__FILE__) . 'assets/css/pandemic-covid19-elementor.js', array('jquery'), $this->version, false );

    }

    /**
	 * Register the Widget Caterogry.
	 *
	 * @since    1.0.0
	 */
    public function add_elementor_widget_categories( $elements_manager ) {

        $elements_manager->add_category(
            'pandemic-covid19-category',
            [
                'title' => __( 'Zone Pandemic Covid-19', 'pandemic-covid19' ),
                'icon' => 'fa fa-star',
            ]
        );
    
    }

}