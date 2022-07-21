<?php 
    $parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
    require_once( $parse_uri[0] . 'wp-load.php' );
    if (!function_exists('is_plugin_active')) {
        include_once(ABSPATH . 'wp-admin/includes/plugin.php');
       }

    function get_data_plugin($keyz){
        // var_dump( check_keyz_is_create($keyz));
        global $wpdb;
        $table_prefix = $wpdb->prefix . 'data_theme';
        $sql = $wpdb->prepare( "SELECT keyz,valuez FROM $table_prefix WHERE keyz =%s ",$keyz);
        $results = $wpdb->get_results( $sql , OBJECT );
        if(count($results)>0){
            $objects = new stdClass();
            $objects->keyz=$keyz;
            $objects->data=json_decode($results[0]->valuez);
            return $objects;
        }else{
            $objects = new stdClass();
            $objects->keyz=$keyz;
            $objects->data="null";
            return $objects;
        }
    }

if(is_plugin_active('zsharevn-landing-page/index.php')){

    if(is_user_logged_in()){
        $user = wp_get_current_user();
        $permisstion_type=$user->roles[0];
    
            if($permisstion_type=="administrator"||$permisstion_type=="editor"||$permisstion_type=="author"||$permisstion_type=="contributor"){
                if($_POST){
                    $keyz=stripslashes($_POST['keyz']);
                    send(get_data_plugin($keyz));
                }else{
                    $objects = new stdClass();
                    $objects->keyz=$keyz;
                    $objects->data="null";
                   send($objects);
                }
            }else{
                $objects = new stdClass();
                $objects->keyz=$keyz;
                $objects->data="null";
               send($objects);
             }
        }else{
            $objects = new stdClass();
            $objects->keyz=$keyz;
            $objects->data="null";
            send($objects);
        }
}
?>