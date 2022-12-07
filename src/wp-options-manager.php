<?php

namespace Iranimij\WpOptionsManager;

if ( ! class_exists( 'Wp_Options_Manager' ) ) {

	/**
	 * Class Wp_Options_Manager
	 *
	 * @since 1.0.0
	 */
	class Wp_Options_Manager {

		/**
		 * The key of option in options table.
		 *
		 * @since 1.0.0
		 * @var string
		 */
		private $key;

		/**
		 * Options data.
		 *
		 * @since 1.0.0
		 * @var array
		 */
		private static $options;

		/**
		 * Class instance.
		 *
		 * @since 1.0.0
		 * @var Wp_Options_Manager
		 */
		private static $instance = null;

		/**
		 * Get a class instance.
		 *
		 * @since 1.0.0
		 */
		public static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Wp_Background_Process constructor.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			$this->key = $this->get_plugin_slug();

			$this->set();
		}

		/**
		 * Gets all options data related to the key.
		 *
		 * @since 1.0.0
		 * @param string $plugin_slug The plugin slug.
		 */
		private function set() {
			if ( ! empty( self::$options ) && is_array( self::$options ) ) {
				return false;
			}

			self::$options = get_option( $this->key );

			if ( empty( self::$options ) ) {
				self::$options = [ 'created_at' => time() ];
			}

			if ( ! is_array( self::$options ) ) {
				return new WP_Error( 'something_went_wrong' );
			}
		}

		/**
		 * Updates an item.
		 *
		 * @since 1.0.0
		 * @param string $key The key.
		 * @param string $value The value.
		 */
		public function update( $key, $value ) {
			self::$options[ $key ] = $value;

			return $this;
		}

		/**
		 * Deletes an item.
		 *
		 * @since 1.0.0
		 * @param string $key The key pf the item.
		 */
		public function delete( $key ) {
			if ( ! empty( self::$options[ $key ] ) ) {
				unset( self::$options[ $key ] );
			}
		}

		/**
		 * Selects an item.
		 *
		 * @since 1.0.0
		 * @param string $key The key pf the item.
		 */
		public function select( $key ) {
			if ( ! empty( self::$options[ $key ] ) ) {
				return self::$options[ $key ];
			}

			return false;
		}

		/**
		 * Delete an item.
		 *
		 * @since 1.0.0
		 * @param string $key The key pf the item.
		 */
		public function get() {
			return self::$options;
		}

		/**
		 * Saves an item.
		 *
		 * @since 1.0.0
		 * @param string $key The key.
		 * @param string $value The value.
		 */
		public function save() {
			update_option( $this->key, self::$options );
		}

		/**
		 * Gets plugin slug
		 *
		 * @since 1.0.0
		 */
		private function get_plugin_slug() {
			$plugin_base_name = plugin_basename( __DIR__ );
			$plugin_base_name = explode( '/', $plugin_base_name );

			return $plugin_base_name[ 0 ];
		}
	}
}