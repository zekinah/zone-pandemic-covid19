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

class Pandemic_Covid19_Widget_Graph extends \Elementor\Widget_Base
{

	public function get_name() {
		return 'History Graph';
	}

	public function get_title() {
		return __( 'History Graph', 'pandemic-covid19' );
	}

	public function get_icon() {
		return 'fa fa-line-chart';
	}

	public function get_categories() {
		return [ 'pandemic-covid19-category' ];
	}

	public function is_reload_preview_required() {
		return true;
	}

	protected function _register_controls() {
	}

	protected function render() {
		$shortcode = do_shortcode('[zone-covid19-history-graph]');
		echo '<div class="elementor-shortcode">'. $shortcode .'</div>';
	}

	public function render_plain_content() {
		$shortcode = do_shortcode('[zone-covid19-history-graph]');
		echo '<div class="elementor-shortcode">'. $shortcode .'</div>';
	}

	protected function _content_template() {}

}