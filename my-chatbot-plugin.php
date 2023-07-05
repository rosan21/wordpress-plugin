<?php
/**
 * Plugin Name: My Chatbot Plugin
 * Plugin URI: https://your-plugin-website.com
 * Description: A chatbot plugin for WordPress.
 * Version: 1.0
 * Author: Your Name
 * Author URI: https://your-website.com
 */

// Enqueue the plugin scripts and styles
function my_chatbot_plugin_scripts() {
    wp_enqueue_script( 'chatbot-script', plugins_url( '/chatbot.js', __FILE__ ), array( 'jquery' ), '1.0', true );
    wp_enqueue_style( 'chatbot-style', plugins_url( '/style.css', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'my_chatbot_plugin_scripts' );

// Create a shortcode to display the chatbot UI
function my_chatbot_shortcode() {
    ob_start();
    include( plugin_dir_path( __FILE__ ) . '/chatbot.html' );
    return ob_get_clean();
}

// Set CORS headers
function my_chatbot_set_cors_headers() {
    header( 'Access-Control-Allow-Origin: *' );
    header( 'Access-Control-Allow-Methods: GET, POST' );
    header( 'Access-Control-Allow-Headers: Content-Type' );
}
add_action( 'init', 'my_chatbot_set_cors_headers' );

add_shortcode( 'my_chatbot', 'my_chatbot_shortcode' );
