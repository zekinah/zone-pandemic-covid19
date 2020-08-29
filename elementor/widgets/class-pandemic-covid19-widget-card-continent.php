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

class Pandemic_Covid19_Widget_Card_Continent extends \Elementor\Widget_Base
{

	public function get_name() {
		return 'Continent(s) Card';
	}

	public function get_title() {
		return __( 'Continent(s) Card', 'pandemic-covid19' );
	}

	public function get_icon() {
		return 'eicon-globe';
	}

	public function get_categories() {
		return [ 'pandemic-covid19-category' ];
	}

	public function is_reload_preview_required() {
		return true;
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_shortcode',
			[
				'label' => __( 'Content', 'pandemic-covid19' ),
			]
		);

		$this->add_control(
			'continents',
			[
				'label' => __( 'Show Elements', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => [
					'north-america'  => __( 'North America', 'plugin-domain' ),
					'south-america' => __( 'South America', 'plugin-domain' ),
					'asia' => __( 'Asia', 'plugin-domain' ),
					'europe' => __( 'Europe', 'plugin-domain' ),
					'africa' => __( 'Africa', 'plugin-domain' ),
					'australia-oceania' => __( 'Australia/Oceania', 'plugin-domain' ),
				],
				'default' => [ 'North America' ],
			]
		);

		$this->add_control(
			'dark_mode',
			[
				'label' => __( 'Dark Mode', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'pandemic-covid19' ),
				'label_off' => __( 'No', 'pandemic-covid19' ),
				'return_value' => 'No',
				'default' => 'No',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$continents = $this->get_settings( 'continents' );
		$dark = $this->get_settings( 'dark_mode' );
		$shortcode = do_shortcode('[zone-covid19 continent="'.$continents.'" dark="'.$dark.'"]');
		echo '<div class="elementor-shortcode">'. $shortcode .' </div>';
	}

	public function render_plain_content() {
		$continents = $this->get_settings( 'continents' );
		$dark = $this->get_settings( 'dark_mode' );
		$shortcode = do_shortcode('[zone-covid19 continent="'.$continents.'" dark="'.$dark.'"]');
		echo '<div class="elementor-shortcode">'. $shortcode .' </div>';
	}

	protected function _content_template() {}

}