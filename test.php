<?php
   /*
   Plugin Name: test
   Plugin URI: 
   description: 
   Version: 4.0
   Author: 
   Author URI: 
   License: GPL2
   Text Domain: cnsd-chartnerd
   */
add_action( 'init', 'github_plugin_updater_test_init' );
function github_plugin_updater_test_init() {
   include_once 'updater.php';
   define( 'WP_GITHUB_FORCE_UPDATE', true );
   if ( is_admin() ) { // note the use of is_admin() to double check that this is happening in the admin
      $config = array(
         'slug' => plugin_basename( __FILE__ ),
         'proper_folder_name' => 'wp-plugin-updater',
         'api_url' => 'https://api.github.com/repos/mukesh1510/wp-plugin-updater',
         'raw_url' => 'https://raw.github.com/mukesh1510/wp-plugin-updater/master',
         'github_url' => 'https://github.com/mukesh1510/wp-plugin-updater',
         'zip_url' => 'https://github.com/mukesh1510/wp-plugin-updater/archive/master.zip',
         'sslverify' => true,
         'requires' => '1.0',
         'tested' => '5.0',
         'readme' => 'README.md',
         'access_token' => '',
      );
      new WP_GitHub_Updater( $config );
   }
}
