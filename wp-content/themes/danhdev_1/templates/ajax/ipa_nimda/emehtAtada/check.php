<?php 
    $parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
    require_once( $parse_uri[0] . 'wp-load.php' );

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
            `typez` longtext NULL,
            `dataz` longtext NULL,
            `datez` timestamp NOT NULL,
            PRIMARY KEY (`id`)
        ) {$charsetCollate};";
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $createTable );
    }
    //
    function get_data_theme_contact_count($keyz,$table_prefix){
        global $wpdb;
        $sql = $wpdb->prepare( "SELECT keyz,valuez FROM $table_prefix WHERE keyz =%s ",$keyz);
        $results = $wpdb->get_results( $sql , OBJECT );
        if(count($results)>0){
            return (int)($results[0]->valuez);
        }else{
            $data = array(
                'keyz'=> $keyz,
                'valuez' => 0
            );
            $rs = $wpdb->insert(
                $table_prefix,
                $data
            );
            return 0;
        }
    }
    function count_contact($name_table_3){
        global $wpdb;
        $sql = $wpdb->prepare( "SELECT COUNT(id) FROM $name_table_3");
        $results = $wpdb->get_results( $sql , ARRAY_A );
        return (int)($results[0]["COUNT(id)"]);
    }

    $name_table_1 = $wpdb->prefix . 'data_theme';
    $name_table_3 = $wpdb->prefix . 'contacts_form';
    $notify=0;
    $contact_count_pre=0;
    $coun_contact_now=0;
    $permisstion_type='null';
    // if(is_user_logged_in()){
        // $user = wp_get_current_user();
        // $permisstion_type=$user->roles[0]; //[todo]
        if(true){
        $permisstion_type="editor";
        //
        if(!is_table_created($name_table_1)) create_data_theme_setup($name_table_1);
        if(!is_table_created($name_table_3)) create_contact_form($name_table_3);
        $contact_count_pre=(int)get_data_theme_contact_count('contact_count',$name_table_1);
        $coun_contact_now= count_contact($name_table_3);
        
        if($contact_count_pre==0) {
            $notify=$coun_contact_now;
        }else{
            $notify=$coun_contact_now-$contact_count_pre;
        };

    }
    $object = new stdClass();
    $object->permission_type=$permisstion_type;
    $object->notify=$notify;
    $object->contact_count_pre=$contact_count_pre;
    $object->coun_contact_now=$coun_contact_now;
    send($object);

?>