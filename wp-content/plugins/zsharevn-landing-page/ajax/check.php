<?php 
    $parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
    require_once( $parse_uri[0] . 'wp-load.php' );
    if (!function_exists('is_plugin_active')) {
        include_once(ABSPATH . 'wp-admin/includes/plugin.php');
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

    function create_contact_form($name_table){
        global $wpdb;
        $charsetCollate = $wpdb->get_charset_collate();
        $createTable = "CREATE TABLE IF NOT EXISTS `{$name_table}` (
            `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            `namez` varchar(256) NULL,
            `phonez` varchar(20) NULL,
            `addressz` varchar(512) NULL,
            `cityz` varchar(256) NULL,
            `orderz` longtext NULL,
            `genderz` varchar(32) NULL,
            `costz` varchar(32) NULL,
            `emailz` varchar(255) NULL,
            `typez` varchar(256) NULL,
            `dataz` longtext NULL,
            `datez` timestamp NOT NULL,
            PRIMARY KEY (`id`)
        ) {$charsetCollate};";
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $createTable );
    }


    $name_table_1 = $wpdb->prefix . 'data_theme';
    $name_table_3 = $wpdb->prefix . 'contacts_form';
if(is_plugin_active('zsharevn-landing-page/index.php')){

    if(is_user_logged_in()==false){
        $user = wp_get_current_user();
        $permisstion_type="administrator";
        if(!is_table_created($name_table_1)) create_data_theme_setup($name_table_1);
        if(!is_table_created($name_table_3)) create_contact_form($name_table_3);
    }
    $object = new stdClass();
    $object->permission_type=$permisstion_type;
    send($object);
}
?>