<?php

/*
Plugin Name: Eventor
Description: WordPress Custom Events Plugin
Version:     1.00
Author:      Drew Macy
Author URI:  https://andrewkmacy.com
*/

class Event {

    /**
     * @var string
     *
     * Set post type params
     */
    private $type               = 'event';
    private $slug               = 'events';
    private $name               = 'Events';
    private $singular_name      = 'Event';

    public function __construct() {
        add_action('init', array($this, 'register'));
        add_action('add_meta_boxes_eventor', array($this, 'eventor_add_meta_boxes'));
        add_action('save_post', array($this, 'eventor_save_meta_box'));
        add_filter( 'template_include', array($this, 'eventor_templates'));
    }

    /**
     * Register post type
     */
    public function register() {
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
    
        register_post_type( $this->type, $args );

    }

    public function eventor_add_meta_boxes() {
        add_meta_box( 
        'eventor_details_set', 
        'Event Details', 
        'eventor_details_set',
        'eventor',
        'side',
        'high',
        'null'
        );
    }

    /**
    * Output the HTML for the metabox.
    */

    public function eventor_details_set() {
        global $post;
        include plugin_dir_path( __FILE__ ) . './inc/form.php';
        wp_nonce_field( basename( __FILE__ ), 'eventor_details_set' );
        $date = get_post_meta( $post->ID, 'Event Details', true );
    }

    /**
     * Save meta box content.
     *
     * @param int $post_id Post ID
     */
    public function eventor_save_meta_box( $post_id ) {
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
        if ( $parent_id = wp_is_post_revision( $post_id ) ) {
            $post_id = $parent_id;
        }
        $fields = [
            'eventor_date_set',
            'eventor_time_set',
            'eventor_location_set',
        ];
        foreach ( $fields as $field ) {
            if ( array_key_exists( $field, $_POST ) ) {
                update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
            }
        }
    }

    /*
    * Add page templates
    */

    public function eventor_templates( $template ) {
        $post_types = array( 'eventor' );

        if ( is_post_type_archive( $post_types ) && file_exists( plugin_dir_path(__FILE__) . 'templates/eventor-archive.php' ) ){
            $template = plugin_dir_path(__FILE__) . 'templates/eventor-archive.php';
        }

        if ( is_singular( $post_types ) && file_exists( plugin_dir_path(__FILE__) . 'templates/eventor-single.php' ) ){
            $template = plugin_dir_path(__FILE__) . 'templates/eventor-single.php';
        }

        return $template;
    }
}

$Event = new Event();