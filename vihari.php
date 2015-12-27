<?php 
/**
 * Plugin Name: Vihari Booking
 * Plugin URI: http://codingmarker.com
 * Description: Your extension's description text.
 * Version: 1.0.0
 * Author: Gogula Sivannarayana
 * Author URI: http://codingmarker.com
 * Developer: Gogula Sivannarayana
 * Developer URI: http://codingmarker.com
 * Text Domain: gogula
 * Domain Path: /languages
 *
 * Copyright: © 2015 Gogula Sivannarayana.
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

// check for right php version
$correct_php_version = version_compare( phpversion(), '5.3.0', '>=' );

if ( ! $correct_php_version ) {
	echo 'The CodingMarker Theme requires <strong>PHP 5.3</strong> or higher.<br>';
	echo 'You are running PHP ' . phpversion();
	exit;
}

if ( ! function_exists( 'codingmarker_load_files' ) ) {
	
	add_action( 'after_setup_theme', 'codingmarker_load_files' );

		/**
		 * Automatic load all files from folder inc
		 * Current no subdirectories
		 * 
		 * @since   2015
		 * @return  void
		 */
		function codingmarker_load_files() {
			
			$inc_directory = 'lib';
			$inc_base = dirname( __FILE__ ) . '/' . $inc_directory . '/';
			$includes = array();
			
			// load required classes
			foreach( glob( $inc_base . '*.php' ) as $path ) {
				
				$key = substr( $path, strpos( $path, $inc_directory ) );
				$key = str_replace( $inc_directory . '/', '', $key );
				// create array with key and path for use in hook
				$includes[ $key ] = $path;
			}
			
			$includes = apply_filters(
				'codingmarker_loader',
				$includes
			);

			foreach ( $includes as $key => $path )
				require_once $path;
			
		}
}
 ?>