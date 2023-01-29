<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://thierrycharriot.github.io
 * @since      1.0.0
 *
 * @package    Plugin_Mentions
 * @subpackage Plugin_Mentions/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<?php
	// https://developer.wordpress.org/reference/functions/do_shortcode/
	// do_shortcode( string $content, bool $ignore_html = false ): string
	// Search content for shortcodes and filter shortcodes through their hooks.
	//var_dump( $post );
	do_shortcode( '[shortcode-mentions]' );
?>
