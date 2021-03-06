<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
  exit;

class EventorSpeaker {

	public function __construct (){
		add_action('init', array($this, 'eventor_speaker'));
		add_filter( 'template_include', array( $this, 'speaker_templates' ));
	}
	// Register Custom Post Type
	public function eventor_speaker() {

		$labels = array(
			'name'                  => 'Speakers',
			'singular_name'         => 'Speaker',
			'menu_name'             => 'Speakers',
			'name_admin_bar'        => 'Speakers',
			'archives'              => 'Item Archives',
			'attributes'            => 'Item Attributes',
			'parent_item_colon'     => 'Parent Item:',
			'all_items'             => 'All Items',
			'add_new_item'          => 'Add New Item',
			'add_new'               => 'Add New',
			'new_item'              => 'New Item',
			'edit_item'             => 'Edit Item',
			'update_item'           => 'Update Item',
			'view_item'             => 'View Item',
			'view_items'            => 'View Items',
			'search_items'          => 'Search Item',
			'not_found'             => 'Not found',
			'not_found_in_trash'    => 'Not found in Trash',
			'featured_image'        => 'Featured Image',
			'set_featured_image'    => 'Set featured image',
			'remove_featured_image' => 'Remove featured image',
			'use_featured_image'    => 'Use as featured image',
			'insert_into_item'      => 'Insert into item',
			'uploaded_to_this_item' => 'Uploaded to this item',
			'items_list'            => 'Items list',
			'items_list_navigation' => 'Items list navigation',
			'filter_items_list'     => 'Filter items list',
		);
		$args = array(
			'label'                 => 'Speaker',
			'description'           => 'Custom post type for Speakers',
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
			'menu_icon'   			=> 'dashicons-businessman',
		);
	
	register_post_type( 'speakers', $args );

	}

	function speaker_templates( $template ) {
        $post_types = array( 'speakers' );

        if ( is_post_type_archive( $post_types ) && file_exists( plugin_dir_path(__FILE__) . '/templates/speaker-archive.php' ) ){
            $template = plugin_dir_path(__FILE__) . '/templates/speaker-archive.php';
        }

        if ( is_singular( $post_types ) && file_exists( plugin_dir_path(__FILE__) . '/templates/speaker-single.php' ) ){
            $template = plugin_dir_path(__FILE__) . '/templates/speaker-single.php';
        }

        return $template;
    }

}

$EventorSpeaker = new EventorSpeaker();