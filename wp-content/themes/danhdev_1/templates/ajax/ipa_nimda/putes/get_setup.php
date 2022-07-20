<?php 
//     $parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
//     require_once( $parse_uri[0] . 'wp-load.php' );

    
// function create_table_setup($name_table){
//     global $wpdb;
//     $charsetCollate = $wpdb->get_charset_collate();
//     $createTable = "CREATE TABLE IF NOT EXISTS `{$name_table}` (
//         `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
//         `icon` longtext NULL,
//         `logo` longtext NULL,
//         `menu_json` longtext NULL,
//         `menu_html` longtext NULL,
//         `contact_code` longtext NULL,
//         `contact_html` longtext NULL,
//         `css_code` longtext NULL,
//         `header_code` longtext NULL,
//         `body_code` longtext NULL,
//         `footer_code` longtext NULL,
//         `value_1` longtext NULL,
//         `value_2` longtext NULL,
//         `value_3` longtext NULL,
//         `value_4` longtext NULL,
//         `value_5` longtext NULL,
//         `value_6` longtext NULL,
//         `value_7` longtext NULL,
//         `value_8` longtext NULL,
//         PRIMARY KEY (`id`)
//     ) {$charsetCollate};";
//     require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
//     dbDelta( $createTable );
//     //
//     $data = array(
//         'icon'=> "",
//         'logo' => "",
//         'menu_json' => "null",
//         'menu_html' => "",
//         'contact_code' => "null",
//         'contact_html' => "",
//         'css_code' => "",
//         'header_code' => "",
//         'body_code' => "",
//         'footer_code' => "",
//         'value_1' => "null",
//         'value_2' => "",
//         'value_3' => "",
//         'value_4' => "",
//         'value_5' => "",
//         'value_6' => "",
//         'value_7' => "",
//         'value_8' => "",
// 	);
//     $wpdb->insert(
// 	    $name_table,
// 	    $data
// 	);
//    return get_data_setup($name_table);
// }
// function is_table_created($name_table){
//     global $wpdb;
//     $query = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $name_table ) );
//     if ( $wpdb->get_var( $query ) === $name_table ) {
//         return true;
//     }else{
//         return false;
//     }
// }
// //
// function get_data_setup($name_table){
//     global $wpdb;
//     $sql = $wpdb->prepare( "SELECT id,icon,logo,menu_json,menu_html,contact_code,contact_html,css_code,header_code,body_code,footer_code,value_1,value_2,value_3,value_4,value_5,value_6,value_7,value_8 FROM $name_table ");
//     $results = $wpdb->get_results( $sql , OBJECT );
//     return $results;
// }

// if(true){//[todo]
//     $id_user=6;
//     $permisstion_type="editor";
// // if(is_user_logged_in()==false){
// //     $user = wp_get_current_user();
// //     $permisstion_type="administrator";
// //
//         if($permisstion_type=="administrator"||$permisstion_type=="editor"){
//             global $wpdb;
//             $name_table = $wpdb->prefix . 'common_setup';
//             if(is_table_created($name_table)){// da tao
//                 $data= get_data_setup($name_table);
//                 send($data[0]);
//             }else{// chua tao
//                 $a=create_table_setup($name_table);
//                 send($a[0]);
//             }
//         }else{
//             $object = new stdClass();
//             send($object);
//         } 
//     }else{
//         $object = new stdClass();
//         send($object);
//     } 







?>