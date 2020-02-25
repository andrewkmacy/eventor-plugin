<?php

class EventMetaBox {

    public function __construct()
    {
        add_action( 'add_meta_boxes_eventor', array( $this, 'events_add_meta_boxes' ));
        add_action( 'save_post', array( $this, 'eventor_save_meta_box' ));
        add_filter( 'template_include', array( $this, 'eventor_templates' ));
    }

    /**
    * Create the metabox.
    */

    public function events_add_meta_boxes() {
        add_meta_box( 
        'eventor_details_set', 
        'Event Details', 
        array( $this, 'eventor_details_set' ),
        'eventor',
        'side',
        'high',
        'null'
        );
    }

    /**
    * Output the HTML for the metabox.
    */

    function eventor_details_set() {
        global $post;
        include plugin_dir_path( __FILE__ ) . 'event-form.php';
        wp_nonce_field( basename( __FILE__ ), 'eventor_details_set' );     
        $date = get_post_meta( $post->ID, 'Event Details', true );
    }

    /**
    * Save meta box input content.
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

    function eventor_templates( $template ) {
        $post_types = array( 'eventor' );

        if ( is_post_type_archive( $post_types ) && file_exists( plugin_dir_path(__FILE__) . '/templates/event-archive.php' ) ){
            $template = plugin_dir_path(__FILE__) . '/templates/event-archive.php';
        }

        if ( is_singular( $post_types ) && file_exists( plugin_dir_path(__FILE__) . '/templates/event-single.php' ) ){
            $template = plugin_dir_path(__FILE__) . '/templates/event-single.php';
        }

        return $template;
    }
}

$Meta = new EventMetaBox();