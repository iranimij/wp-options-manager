<?php

use Iranimij\WpOptionsManager\Wp_Options_Manager;

if ( ! function_exists( 'wp_options_manager' ) ) {
	/**
	 * Helper function
	 *
	 * @since 1.0.0
	 * @return Wp_Options_Manager|null
	 */
	function wp_options_manager() {
		return Wp_Options_Manager::get_instance();
	}
}