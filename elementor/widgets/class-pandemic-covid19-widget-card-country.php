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

class Pandemic_Covid19_Widget_Card_Country extends \Elementor\Widget_Base
{

	public function get_name() {
		return 'Countries Status Card';
	}

	public function get_title() {
		return __( 'Countries Status Card', 'pandemic-covid19' );
	}

	public function get_icon() {
		return 'fa fa-flag';
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
				'label' => __( 'Contents', 'pandemic-covid19' ),
			]
		);

		$this->add_control(
			'countries',
			[
				'label' => __( 'Show Countries', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => [
					'Albania' => __( 'Albania', 'plugin-domain' ),
					'Argentina' => __( 'Argentina', 'plugin-domain' ),
					'Australia' => __( 'Australia', 'plugin-domain' ),
					'Austria' => __( 'Austria', 'plugin-domain' ),
					'Belgium' => __( 'Belgium', 'plugin-domain' ),
					'Brazil' => __( 'Brazil', 'plugin-domain' ),
					'Bulgaria' => __( 'Bulgaria', 'plugin-domain' ),
					'Cambodia' => __( 'Cambodia', 'plugin-domain' ),
					'Canada' => __( 'Canada', 'plugin-domain' ),
					'Chile' => __( 'Chile', 'plugin-domain' ),
					'Colombia' => __( 'Colombia', 'plugin-domain' ),
					'Croatia' => __( 'Croatia', 'plugin-domain' ),
					'Czechia' => __( 'Czechia', 'plugin-domain' ),
					'Denmark' => __( 'Denmark', 'plugin-domain' ),
					'Egypt' => __( 'Egypt', 'plugin-domain' ),
					'Estonia' => __( 'Estonia', 'plugin-domain' ),
					'Finland' => __( 'Finland', 'plugin-domain' ),
					'France' => __( 'France', 'plugin-domain' ),
					'Germany' => __( 'Germany', 'plugin-domain' ),
					'Greece' => __( 'Greece', 'plugin-domain' ),
					'Hong-Kong' => __( 'Hong Kong', 'plugin-domain' ),
					'Hungary' => __( 'Hungary', 'plugin-domain' ),
					'Iceland' => __( 'Iceland', 'plugin-domain' ),
					'India' => __( 'India', 'plugin-domain' ),
					'Indonesia' => __( 'Indonesia', 'plugin-domain' ),
					'Ireland' => __( 'Ireland', 'plugin-domain' ),
					'Israel' => __( 'Israel', 'plugin-domain' ),
					'Italy' => __( 'Italy', 'plugin-domain' ),
					'Japan' => __( 'Japan', 'plugin-domain' ),
					'Latvia' => __( 'Latvia', 'plugin-domain' ),
					'Lithuania' => __( 'Lithuania', 'plugin-domain' ),
					'Luxembourg' => __( 'Luxembourg', 'plugin-domain' ),
					'Macao' => __( 'Macao', 'plugin-domain' ),
					'Malaysia' => __( 'Malaysia', 'plugin-domain' ),
					'Mexico' => __( 'Mexico', 'plugin-domain' ),
					'Morocco' => __( 'Morocco', 'plugin-domain' ),
					'Netherlands' => __( 'Netherlands', 'plugin-domain' ),
					'New-Zealand' => __( 'New-Zealand', 'plugin-domain' ),
					'Norway' => __( 'Norway', 'plugin-domain' ),
					'Philippines' => __( 'Philippines', 'plugin-domain' ),
					'Poland' => __( 'Poland', 'plugin-domain' ),
					'Portugal' => __( 'Portugal', 'plugin-domain' ),
					'S.-Korea' => __( 'S.-Korea', 'plugin-domain' ),
					'Romania' => __( 'Romania', 'plugin-domain' ),
					'Russia' => __( 'Russia', 'plugin-domain' ),
					'Saudi-Arabia' => __( 'Saudi-Arabia', 'plugin-domain' ),
					'Serbia' => __( 'Serbia', 'plugin-domain' ),
					'Singapore' => __( 'Singapore', 'plugin-domain' ),
					'Slovakia' => __( 'Slovakia', 'plugin-domain' ),
					'Slovenia' => __( 'Slovenia', 'plugin-domain' ),
					'South-Africa' => __( 'South-Africa', 'plugin-domain' ),
					'Spain' => __( 'Spain', 'plugin-domain' ),
					'Sweden' => __( 'Sweden', 'plugin-domain' ),
					'Switzerland' => __( 'Switzerland', 'plugin-domain' ),
					'Taiwan' => __( 'Taiwan', 'plugin-domain' ),
					'Thailand' => __( 'Thailand', 'plugin-domain' ),
					'Turkey' => __( 'Turkey', 'plugin-domain' ),
					'Ukraine' => __( 'Ukraine', 'plugin-domain' ),
					'UAE' => __( 'UAE', 'plugin-domain' ),
					'UK' => __( 'UK', 'plugin-domain' ),
					'USA' => __( 'USA', 'plugin-domain' ),
					'Uruguay' => __( 'Uruguay', 'plugin-domain' ),
					'Vietnam' => __( 'Vietnam', 'plugin-domain' ),
				],
				'default' => [ 'USA' ],
			]
		);

		$this->add_control(
			'dark_mode_country',
			[
				'label' => __( 'Dark Mode', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'pandemic-covid19' ),
				'label_off' => __( 'No', 'pandemic-covid19' ),
				'return_value' => 'false',
				'default' => 'false',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$countries = $this->get_settings( 'countries' );
		$dark = $this->get_settings( 'dark_mode_country' );
		$list = '';
		foreach($countries as $cont){
			$list .= str_replace('-',' ',$cont).', ';
		}
		$shortcode = do_shortcode('[zone-covid19 country="'.$list.'" dark="'.$dark.'"]');
		echo '<div class="elementor-shortcode">'. $shortcode .' </div>';
	}

	public function render_plain_content() {
		$countries = $this->get_settings( 'countries' );
		$dark = $this->get_settings( 'dark_mode_country' );
		$list = '';
		foreach($countries as $cont){
			$list .= str_replace('-',' ',$cont).', ';
		}
		$shortcode = do_shortcode('[zone-covid19 country="'.$list.'" dark="'.$dark.'"]');
		echo '<div class="elementor-shortcode">'. $shortcode .' </div>';
	}

	protected function _content_template() {}

}