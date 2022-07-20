<?php 
    $parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
    require_once( $parse_uri[0] . 'wp-load.php' );
    if (!function_exists('is_plugin_active')) {
        include_once(ABSPATH . 'wp-admin/includes/plugin.php');
       }
    
function update_plugin_setup($keyz,$valuez){
    $is_created_keyz=check_keyz_is_create($keyz);
    global $wpdb;
    $table = $wpdb->prefix . 'data_theme';
    if(!is_table_created($table)) create_data_theme_setup($name_table_1);
    if($is_created_keyz){
        $data = array(
            'keyz'=> $keyz,
            'valuez' => $valuez
        );

        $update = $wpdb->update(
            $table,
            $data,
            array('keyz' => $keyz)
        );
    }else{
            $data = array(
                'keyz'=> $keyz,
                'valuez' => $valuez
            );
            $rs = $wpdb->insert(
                $table,
                $data
            );
    }
}
function is_table_created($name_table){
    global $wpdb;
    $query = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $name_table ) );
    if ( $wpdb->get_var( $query ) === $name_table ) {
        return true;
    }else{
        return false;
    }
}
function create_data_theme_setup($name_table_1){
    global $wpdb;
    $charsetCollate2 = $wpdb->get_charset_collate();
    $createTable2 = "CREATE TABLE IF NOT EXISTS `{$name_table_1}` (
        `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `keyz` varchar(50) NULL UNIQUE,
        `valuez` longtext NULL,
        PRIMARY KEY (`id`)
    ) {$charsetCollate2};";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $createTable2 );
}
function check_keyz_is_create($keyz){
    global $wpdb;
    $table_prefix = $wpdb->prefix . 'data_theme';
    $sql = $wpdb->prepare( "SELECT COUNT(id) FROM $table_prefix WHERE keyz=%s",$keyz);
    $results = $wpdb->get_results( $sql , ARRAY_A );
    $z=(int)($results[0]["COUNT(id)"]);
    if($z>0) return true;
    return false;
}

if(is_plugin_active('zsharevn-landing-page/index.php')){

    if(is_user_logged_in()==false){
        $user = wp_get_current_user();
        $permisstion_type="administrator";

        if($permisstion_type=="administrator"||$permisstion_type=="editor"||$permisstion_type=="author"||$permisstion_type=="contributor"){
            if($_POST){
                $keyz=stripslashes($_POST['keyz']);
                $valuez =stripslashes($_POST['valuez']);
                $status= update_plugin_setup($keyz,$valuez);
                $objects = new stdClass();
                $objects->status=true;
                send($objects);
            }else{
                $object = new stdClass();
                $object->status=false;
                send($object);
            } 
        }else{
            $object = new stdClass();
            $object->status=false;
            send($object);
        } 
    }else{
        $object = new stdClass();
        $object->status=false;
        send($object);
    }
}








?>