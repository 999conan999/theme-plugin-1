<?php
    $parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
    require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
    // echo plugin_dir_url(__FILE__);
    // is_plugin_active('zsharevn-landing-page/index.php');
    
    function create_landing_page($titleS,$contentS,$statusS,$dataJson){
        $my_post = array(
            'post_title'    => $titleS,
            'post_content'  => $contentS,
            'post_status'   => $statusS,
            'post_type'      => 'zshare',
            'meta_input'    =>array("data"=>$dataJson)
        );
        $post_ID=wp_insert_post( $my_post );
        return $post_ID;
    }
   create_landing_page('nội222 2d','Nội dung ở đây 2','publish','dataJson');
?>