<?php
/*
   Plugin Name: Kform plugin
   description: A simple custom plugin. Short code [kform]
   Version: 1.0.0
   Author: Kasun Kalya
   Author URI: https://kasun Kalya.com/about
   Short Code: [kform]
*/
// Create a new table
function customplugin_table(){

  global $wpdb;
  $charset_collate = $wpdb->get_charset_collate();

  $tablename = $wpdb->prefix."kform";

  $sql = "CREATE TABLE $tablename (
  id mediumint(11) NOT NULL AUTO_INCREMENT,
  name varchar(80) NOT NULL,
  contactNo varchar(80) NOT NULL,
  email varchar(80) NOT NULL,
  address varchar(100) NOT NULL,
  message text NOT NULL,
  PRIMARY KEY  (id)
  ) $charset_collate;";
   


  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );

}
register_activation_hook( __FILE__, 'customplugin_table' );

// Add menu
function customplugin_menu() {

    add_menu_page("Kform", "Kform","manage_options", "myplugin", "displayList",plugins_url('/test-plugin/img/icon.png'));
    add_submenu_page("myplugin","All Entries", "All entries","manage_options", "allentries", "displayList");
    add_submenu_page("myplugin","Add new Entry", "Add new Entry","manage_options", "addnewentry", "addEntry");

}
add_action("admin_menu", "customplugin_menu");

function displayList(){
  include "displaylist.php";
}

function addEntry(){
  include "addentry.php";
}

// function that runs when shortcode is called
function wpb_demo_shortcode() { 
include "addentry.php";
}
// register shortcode
add_shortcode('kform', 'wpb_demo_shortcode');