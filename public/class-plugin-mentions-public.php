<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://thierrycharriot.github.io
 * @since      1.0.0
 *
 * @package    Plugin_Mentions
 * @subpackage Plugin_Mentions/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Plugin_Mentions
 * @subpackage Plugin_Mentions/public
 * @author     Thierry Charriot <thierrycharriot@chez.lui>
 */
class Plugin_Mentions_Public {

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

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

        /**
         * Load styles only for pages selected
         *
         * @since    0.0.1
         * @author   Thierry_Charriot@chez.lui
         */
		$pages = array( 'mentions' );
		// https://developer.wordpress.org/reference/functions/get_permalink/
		// get_permalink( int|WP_Post $post, bool $leavename = false ): string|false
		// Retrieves the full permalink for the current post or post ID.
		$page = basename( get_permalink() );
		//var_dump( $page ); die();
        if ( in_array( $page, $pages ) ) {
            wp_enqueue_style( 'plugin-bootstrap-css', PLUGIN_MENTIONS_URL . 'assets/css/bootstrap.min.css', array(), $this->version, 'all' );
        }	

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Mentions_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Mentions_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/plugin-mentions-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

        /**
         * Load scripts only for pages selected
         *
         * @since    0.0.1
         * @author   Thierry_Charriot@chez.lui
         */
		$pages = array( 'mentions' );
		// https://developer.wordpress.org/reference/functions/get_permalink/
		// get_permalink( int|WP_Post $post, bool $leavename = false ): string|false
		// Retrieves the full permalink for the current post or post ID.
		$page = basename( get_permalink() );
        if ( in_array( $page, $pages ) ) {
			//wp_enqueue_script( 'jquery-js', PLUGIN_PORTFOLIO_URL . 'assets/js/jquery-3.6.1.min.js', array(), $this->version, 'all' );
			wp_enqueue_script( 'bootstrap-js', PLUGIN_MENTIONS_URL . 'assets/js/bootstrap.bundle.min.js', array(), $this->version, 'all' );	
        }

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Mentions_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Mentions_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/plugin-mentions-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Load shortcode
	 * 
	 * @return void
	 */
	public function plugin_mentions_display() {

		// https://www.php.net/manual/fr/function.ob-start.php
		// ob_start — Enclenche la temporisation de sortie
		ob_start();

		// https://www.php.net/manual/fr/function.require-once.php
		require_once( PLUGIN_MENTIONS_PATH . 'public/partials/plugin-mentions-public-display.php' );

		// https://www.php.net/manual/fr/function.ob-get-contents.php
		// ob_get_contents — Retourne le contenu du tampon de sortiee
		$template = ob_get_contents();

		// https://www.php.net/manual/fr/function.ob-end-clean.php
		// ob_end_clean — Détruit les données du tampon de sortie et éteint la temporisation de sortie
		ob_end_clean();

		echo( $template );
	}

}
