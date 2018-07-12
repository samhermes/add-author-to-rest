<?php
/**
 * Plugin Name: Add Author to REST API
 * Description: Adds ACF fields to REST API response, for use with the reading list on my website
 * Author: Sam Hermes
 * Author URI: https://samhermes.com
 * Text Domain: add-author-to-rest
 * Version: 0.0.1
 */

function wp_rest_api_alter() {
  register_rest_field( 'books',
      'fields',
      array(
        'get_callback' => function( $data, $field, $request, $type ) {
          if ( function_exists( 'get_fields' ) ) {
            return get_fields( $data['id'] );
          }
          return [];
        },
        'update_callback' => null,
        'schema'          => null,
      )
  );
}
add_action( 'rest_api_init', 'wp_rest_api_alter');