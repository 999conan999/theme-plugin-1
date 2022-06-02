<?php 
    $parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
    require_once( $parse_uri[0] . 'wp-load.php' );
    if (!function_exists('is_plugin_active')) {
        include_once(ABSPATH . 'wp-admin/includes/plugin.php');
       }
    function get_images($quantity,$page){
        $query_images_args = array(
            'post_type'      => 'attachment',
            'post_mime_type' => 'image',
            'post_status'    => 'inherit',
            'posts_per_page' => $quantity,
            'offset'=>$page,
            'order'=> 'DESC'
        );
        
        $query_images = new WP_Query( $query_images_args);            
        // $myArray = array();
        foreach ( $query_images->posts as $image ) {
            $myArray[] = (object) ['id' => $image->ID,'url'=>wp_get_attachment_url( $image->ID ),'post_title'=>$image->post_title];
        }
        return($myArray);
    }

if(is_plugin_active('zsharevn-landing-page/index.php')){

    if(is_user_logged_in()){
        $id_user=get_current_user_id();
        $user = wp_get_current_user();
        $permisstion_type=$user->roles[0];

        if($permisstion_type=="administrator"||$permisstion_type=="editor"||$permisstion_type=="author"||$permisstion_type=="contributor"){
            $quantity=30;
            $page=abs((int)stripslashes(strip_tags($_GET['page']))*$quantity);
            send(get_images($quantity,$page));
        }else{
            send(array());
        }

    }else{
        send(array());
    }
}