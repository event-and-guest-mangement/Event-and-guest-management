<?php
/*
Plugin Name: Event and Guest Management Plugin
Description: Plugin for managing events and guests
Author: ColoredCow
Author URI: www.coloredcow.com
Version: 0.1
*/

	add_action('admin_menu', 'menu_pages');
	add_action( 'admin_enqueue_scripts', 'cc_plugin_scripts' );
	add_action( 'admin_enqueue_scripts', 'cc_plugin_styles' );
	
	function menu_pages(){
		add_menu_page('Event and Guest Management', 'Event and Guest Management', 'manage_options', 'event_and_guest_management', 'event_and_guest_management');
		add_submenu_page('event_and_guest_management', 'Add New Event', 'Add New Event' , 'manage_options','event_and_guest_management');
	}
	
	function cc_plugin_scripts($hook){
		if( $hook != 'toplevel_page_event_and_guest_management' ) {
			return;
		}
		wp_enqueue_script( 'cc-bootstrap4-script', plugin_dir_url( __FILE__ ).'/dist/lib/js/bootstrap4.min.js', array( 'jquery'), '1.0.0', true);
		wp_enqueue_script( 'cc-bootstrap-tether', 'https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js');
		wp_enqueue_script( 'cc-fontawesome-icons', 'https://use.fontawesome.com/ffc2c94a85.js');
		wp_localize_script( 'main', 'PARAMS', array( 'ajaxurl' => admin_url('admin-ajax.php') ) );
	}
	
	function cc_plugin_styles($hook){
		if( $hook != 'toplevel_page_event_and_guest_management' ) {
			return;
		}
		wp_enqueue_style( 'cc-bootstrap4-style', plugin_dir_url( __FILE__ ).'/dist/lib/css/bootstrap4.min.css');
		wp_enqueue_style( 'cc-fonts','https://fonts.googleapis.com/css?family=Oswald|Marcellus+SC|Roboto|Open+Sans');
	}

	function event_and_guest_management(){
<<<<<<< HEAD
		require_once("add_new_event.php");
	}
=======
		echo "Hello";		
	}

	function create_plugin_database_table() {
		global $wpdb;
		$events_table_name = $wpdb->prefix . 'events';
		$guests_table_name = $wpdb->prefix . 'guests';

		$query_create_events_table = "CREATE TABLE $events_table_name (
			event_id mediumint(5)  NOT NULL AUTO_INCREMENT,
			event_name varchar(50) NOT NULL,
			event_theme varchar(50) NOT NULL,
			event_date date NOT NULL,
			event_venue varchar(250) NOT NULL,
			PRIMARY KEY  (event_id)
		);";

		$query_create_guests_table = "CREATE TABLE $guests_table_name (
			guest_id mediumint(9)  NOT NULL AUTO_INCREMENT,
			guest_name varchar(50) NOT NULL,
			guest_email varchar(50) NOT NULL,
			guest_phone_number int(10) NOT NULL,
			guest_gender varchar(50) NOT NULL,
			guest_category varchar(50) NOT NULL DEFAULT 'approved',
			PRIMARY KEY  (guest_id)
		);";


		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $query_create_events_table );
		dbDelta( $query_create_guests_table );
	}
	 
	register_activation_hook( __FILE__, 'create_plugin_database_table' );
>>>>>>> e9c4e5f58065608f8bc25e4bbb86b0ae72519f84
