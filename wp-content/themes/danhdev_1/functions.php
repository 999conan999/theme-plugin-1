<?php







/**
 * Add a page to the dashboard menu.
 */
function send($data){
    header('Cache-Control: no-cache, must-revalidate');
    header('Content-type: application/json');
    echo json_encode($data);
}



global $wp_roles; 
$wp_roles->add_cap( 'administrator', 'view_custom_menu' ); 
$wp_roles->add_cap( 'subscriber', 'view_custom_menu' );
function admin_show_order() {
	add_menu_page( 'Đơn hàng', 'Đơn hàng', 'view_custom_menu', 'don-hang', 'don_hang_init','',3 );

}

add_action('admin_menu', 'admin_show_order');
function don_hang_init() {
	echo '123';
}


    /**
     * @ khai bao hang gia tri
     * @ THEME_URL =lay duong dan thu muc theme
     * @ CORE = lay duong dan cua thu muc /core
     */
     
    // function hk_CreatDatabaseContacts(){
    //     global $wpdb;
    //     $charsetCollate = $wpdb->get_charset_collate();
    //     $cacheCate = $wpdb->prefix . 'cache_cate';
    //     $createcacheCate = "CREATE TABLE IF NOT EXISTS `{$cacheCate}` (
    //         `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    //         `id_cate` bigint(20) UNSIGNED NOT NULL,
    //         `title` longtext NULL,
    //         `tu_khoa_lien_quan` longtext NULL,
    //         `short_des` longtext NULL,
    //         `imgX` longtext NULL,
    //         `link_cate` longtext NULL,
    //         `name_website` longtext NULL,
    //         `rate` longtext NULL,
    //         `vote` longtext NULL,
    //         `schema_gia_product` longtext NULL,
    //         `home_url` longtext NULL,
    //         `json_event` longtext NULL,
    //         `json_schema` longtext NULL,
    //         `content` longtext NULL,
    //         `random_text` longtext NULL,
    //         `result_related_post` longtext NULL,
    //         `slide_img_big` longtext NULL,
    //         `slide_img_small` longtext NULL,
    //         `titleX` longtext NULL,
    //         `hien_thi_giaX` longtext NULL,
    //         `result_dac_diemX` longtext NULL,
    //         `result_uu_diemX` longtext NULL,
    //         `result_nhuoc_diemX` longtext NULL,
    //         `result_khuyen_maiX` longtext NULL,
    //         `result_chinh_sach_dich_vuX` longtext NULL,
    //         `result_thich_hop_su_dung_choX` longtext NULL,
    //         `data_mp3` longtext NULL,
    //         `date` timestamp NOT NULL,
    //         PRIMARY KEY (`id`)
    //     ) {$charsetCollate};";
    //     require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    //     dbDelta( $createcacheCate );
    // }
    // add_action('init', 'hk_CreatDatabaseContacts');
    
     /** */
    function cc_mime_types($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
        }
        add_filter('upload_mimes', 'cc_mime_types');
define('THEME_URL', get_stylesheet_directory());
define('CORE', THEME_URL."/templates/ajax/fs.php");
    /**
     * @ Nhung file /core/init.php
     */
require_once(CORE);

if(!function_exists('danhdev_setup')){
    function danhdev_setup() {
            add_theme_support( 'post-thumbnails' );
            // Theme menu
            register_nav_menu('danhdev-menu', 'Danhdev Menu');
    }
    add_action('init', 'danhdev_setup');
}














?>