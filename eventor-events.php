<?php

/*
Plugin Name: Eventor
Description: WordPress Custom Events Plugin
Version:     1.00
Author:      Drew Macy
Author URI:  https://andrewkmacy.com
*/

// Exit if accessed directly
if (!defined('ABSPATH'))
  exit;

class Event {

	public function __construct (){
		include plugin_dir_path( __FILE__ ) . './inc/event-meta.php';
		add_action('init', array($this, 'register'));
	}
	// Register Custom Post Type
	public function register() {
	global $post;

		$labels = array(
			'name'                  => __( 'Events', 'Post Type General Name', 'eventor' ),
			'singular_name'         => __( 'Event', 'Post Type Singular Name', 'eventor' ),
			'menu_name'             => __( 'Events', 'eventor' ),
			'name_admin_bar'        => __( 'Events', 'eventor' ),
			'archives'              => __( 'All Events', 'eventor' ),
			'attributes'            => __( 'Event Attributes', 'eventor' ),
			'parent_item_colon'     => __( 'Parent Item:', 'eventor' ),
			'all_items'             => __( 'Events', 'eventor' ),
			'add_new_item'          => __( 'Add New Event', 'eventor' ),
			'add_new'               => __( 'Add New', 'eventor' ),
			'new_item'              => __( 'New Event', 'eventor' ),
			'edit_item'             => __( 'Edit Event', 'eventor' ),
			'update_item'           => __( 'Update Event', 'eventor' ),
			'view_item'             => __( 'View Event', 'eventor' ),
			'view_items'            => __( 'View Events', 'eventor' ),
			'search_items'          => __( 'Search Events', 'eventor' ),
			'not_found'             => __( 'Not found', 'eventor' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'eventor' ),
			'featured_image'        => __( 'Featured Image', 'eventor' ),
			'set_featured_image'    => __( 'Set featured image', 'eventor' ),
			'remove_featured_image' => __( 'Remove featured image', 'eventor' ),
			'use_featured_image'    => __( 'Use as featured image', 'eventor' ),
			'insert_into_item'      => __( 'Insert into item', 'eventor' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'eventor' ),
			'items_list'            => __( 'Items list', 'eventor' ),
			'items_list_navigation' => __( 'Items list navigation', 'eventor' ),
			'filter_items_list'     => __( 'Filter items list', 'eventor' ),
		);
		$args = array(
			'label'                 => __( 'Event', 'eventor' ),
			'description'           => __( 'Create and edit custom events', 'eventor' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail' ),
			'taxonomies'            => array( 'category', 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
	
		register_post_type( 'eventor', $args );
	}
}

$Event = new Event();

