<?php 
/*
Plugin Name: Tools tao noi dung v1
Plugin URI: vothanhdanh.bk@gmail.com
Description: Tạo ra các bài viết tỉnh nhanh và gọn.
Version: 1.0
Author: Thành Danh
Author URI: vothanhdanh.bk@gmail.com
License: GPL
*/
add_action( 'init', 'create_post_type_qc' );
function create_post_type_qc(){
    $label = array(
        'name' => 'qc', //Tên post type dạng số nhiều
        'singular_name' => 'qc' //Tên post type dạng số ít
    );
    $args = array(
        'labels' => $label, //Gọi các label trong biến $label ở trên
        // 'description' => 'cccc', //Mô tả của post type
        'supports' => array(
        'title',
        'editor',
        ),
        'rewrite' => array('slug' => 'shop'),// todo
        'taxonomies' => array(), //Các taxonomy được phép sử dụng để phân loại nội dung
        'hierarchical' => true, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
        'public' => true, //Kích hoạt post type
        'show_ui' => false, //Hiển thị khung quản trị như Post/Page
        'can_export' => true, //Có thể export nội dung bằng Tools -> Export
        'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
        'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
        'capability_type' => 'page' //
    );
    register_post_type('qc', $args);
}
add_filter( 'template_include', 'include_template_function_qc', 1 );
function include_template_function_qc( $template_path ) {
    if ( get_post_type() == 'qc' ) {
        if ( is_single() ) {
            if ( $theme_file = locate_template( array ( 'qc_frontend.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . '/qc_frontend.php';
            }
        }
    }
    return $template_path;
}

add_action('admin_menu', 'qc_plugin_setup_menu');
function qc_plugin_setup_menu(){
    add_menu_page( 'Qc landing page', 'Langding page', 'manage_options', 'create-landing-page-qc', 'qc_init',plugin_dir_url(__FILE__).'/gg.png',2 );
}
 
function qc_init(){
    require_once(dirname( __FILE__ ).'/build/index.php');

    // $home_url=get_home_url();
    // echo '<html lang="en">
    // <head>
    //     <link async rel="stylesheet" href="'.$home_url.'/wp-content/plugins/zsharevn-landing-page/semantic.css" />
    //     <link async rel="stylesheet" href="'.$home_url.'/wp-content/plugins/zsharevn-landing-page/fontawesome/css/all.min.css" />
    //     <script type="text/javascript">window.home_url = "'.$home_url.'"</script>
    //     <script defer="defer" src="'.$home_url.'/wp-content/plugins/zsharevn-landing-page/static-admin/js/main.4d5396d8.js"></script>
    //     <link href="'.$home_url.'/wp-content/plugins/zsharevn-landing-page/static-admin/css/main.df8c9994.css" rel="stylesheet">
    // </head>
    
    // <body>
    //     <div id="root"></div>
    // </body>
    
    // </html>';
}

if (!function_exists('send')) {
    function send($data){
        header('Cache-Control: no-cache, must-revalidate');
        header('Content-type: application/json');
        echo json_encode($data);
    }
}
if (!function_exists('fixForUri')) {
    function fixForUri($strX, $options = array()) {
        $str=delete_all_between("(",")",$strX);
        // Make sure string is in UTF-8 and strip invalid UTF-8 characters
        $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
        
        $defaults = array(
            'delimiter' => '-',
            'limit' => null,
            'lowercase' => true,
            'replacements' => array(),
            'transliterate' => true,
        );
        
        // Merge options
        $options = array_merge($defaults, $options);
        
        // Lowercase
        if ($options['lowercase']) {
            $str = mb_strtolower($str, 'UTF-8');
        }
        
        $char_map = array(
            // Latin
            'á' => 'a', 'à' => 'a', 'ả' => 'a', 'ã' => 'a', 'ạ' => 'a', 'ă' => 'a', 'ắ' => 'a', 'ằ' => 'a', 'ẳ' => 'a', 'ẵ' => 'a', 'ặ' => 'a', 'â' => 'a', 'ấ' => 'a', 'ầ' => 'a', 'ẩ' => 'a', 'ẫ' => 'a', 'ậ' => 'a', 'đ' => 'd', 'é' => 'e', 'è' => 'e', 'ẻ' => 'e', 'ẽ' => 'e', 'ẹ' => 'e', 'ê' => 'e', 'ế' => 'e', 'ề' => 'e', 'ể' => 'e', 'ễ' => 'e', 'ệ' => 'e', 'í' => 'i', 'ì' => 'i', 'ỉ' => 'i', 'ĩ' => 'i', 'ị' => 'i', 'ó' => 'o', 'ò' => 'o', 'ỏ' => 'o', 'õ' => 'o', 'ọ' => 'o', 'ô' => 'o', 'ố' => 'o', 'ồ' => 'o', 'ổ' => 'o', 'ỗ' => 'o', 'ộ' => 'o', 'ơ' => 'o', 'ớ' => 'o', 'ờ' => 'o', 'ở' => 'o', 'ỡ' => 'o', 'ợ' => 'o', 'ú' => 'u', 'ù' => 'u', 'ủ' => 'u', 'ũ' => 'u', 'ụ' => 'u', 'ư' => 'u', 'ứ' => 'u', 'ừ' => 'u', 'ử' => 'u', 'ữ' => 'u', 'ự' => 'u', 'ý' => 'y', 'ỳ' => 'y', 'ỷ' => 'y', 'ỹ' => 'y', 'ỵ' => 'y'
        );
        
        // Make custom replacements
        $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
        
        // Transliterate characters to ASCII
        if ($options['transliterate']) {
            $str = str_replace(array_keys($char_map), $char_map, $str);
        }
        
        // Replace non-alphanumeric characters with our delimiter
        $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
        
        // Remove duplicate delimiters
        $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
        
        // Truncate slug to max. characters
        $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
        
        // Remove delimiter from ends
        $str = trim($str, $options['delimiter']);
        
        return $str;
    }
}
if (!function_exists('delete_all_between')) {
    function delete_all_between($beginning, $end, $string) {
        $beginningPos = strpos($string, $beginning);
        $endPos = strpos($string, $end);
        if ($beginningPos === false || $endPos === false) {
        return $string;
        }
    
        $textToDelete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos);
    
        return delete_all_between($beginning, $end, str_replace($textToDelete, '', $string)); // recursion to ensure all occurrences are replaced
    } 
}

if (!function_exists('generateRandomString')) {
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
if (!function_exists('return_dm_fix')) {
    function return_dm_fix($top_1,$top_2,$id_parent,$data_metaA){
        $object= new stdClass();
        if($id_parent!=-1){
            $metaA_s=get_post_meta($id_parent,'metaA', true);
            $data_metaA_s=json_decode($metaA_s);
        }else{
            $data_metaA_s=$data_metaA;
        }
        if (property_exists($data_metaA_s, 'gia_tri_chuyen_doi')) {
            $object->gia_tri_chuyen_doi=$data_metaA_s->gia_tri_chuyen_doi;
        }else{
            $object->gia_tri_chuyen_doi=1;
        }
        $dm=$data_metaA_s->data_qc->dm;
        $array_1=array();
        $array_2=array();
        $array_3=array();
        foreach($dm as $x){
            if($x->id==$top_1){
                array_push($array_1,$x);
            }elseif($x->id==$top_2){
                array_push($array_2,$x);
            }else{
                array_push($array_3,$x);
            }
        }
        // if(count($array_2)>0){
            $array_2=array_merge($array_1,$array_2);
        // }
        if(count($array_1)>0){
            $array_3=array_merge($array_2,$array_3);
        }
        $object->dm=$array_3;
        return $object;
    }
}
// 
// function is_table_creat($name_table){
//     global $wpdb;
//     $name_table=$wpdb->prefix .$name_table;
//     $query = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $name_table ) );
//     if ( $wpdb->get_var( $query ) === $name_table ) {
//         return true;
//     }else{
//         return false;
//     }
// }
function create_qc_order_table(){
    global $wpdb;
    $name_table=$wpdb->prefix .'qc_order';
    $charsetCollate = $wpdb->get_charset_collate();
    $createTable = "CREATE TABLE IF NOT EXISTS `{$name_table}` (
        `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `phone` varchar(20) NULL,
        `data` longtext NULL,
        `date_create` timestamp NOT NULL,
        PRIMARY KEY (`id`)
    ) {$charsetCollate};";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $createTable );
}
function create_qc_img_table(){
    global $wpdb;
    $name_table=$wpdb->prefix .'qc_img';
    $charsetCollate = $wpdb->get_charset_collate();
    $createTable = "CREATE TABLE IF NOT EXISTS `{$name_table}` (
        `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `alt` varchar(200) NULL,
        `url` varchar(200) NULL,
        `date_create` timestamp NOT NULL,
        PRIMARY KEY (`id`)
    ) {$charsetCollate};";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $createTable );
}
function create_qc_comment_table(){
    global $wpdb;
    $name_table=$wpdb->prefix .'qc_comment';
    $charsetCollate = $wpdb->get_charset_collate();
    $createTable = "CREATE TABLE IF NOT EXISTS `{$name_table}` (
        `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `id_comment` varchar(10) NULL,
        `value_comment` longtext NULL,
        `phone` varchar(12) NULL,
        `status` varchar(7) NULL,
        `is_set` varchar(1) NULL,
        `date_create` timestamp NOT NULL,
        PRIMARY KEY (`id`)
    ) {$charsetCollate};";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $createTable );
}
function create_qc_count_table(){
    global $wpdb;
    $name_table=$wpdb->prefix .'qc_count';
    $charsetCollate = $wpdb->get_charset_collate();
    $createTable = "CREATE TABLE IF NOT EXISTS `{$name_table}` (
        `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `id_comment` varchar(10) NULL,
        `like` varchar(20) NULL,
        `comment` varchar(20) NULL,
        `share` varchar(20) NULL,
        PRIMARY KEY (`id`)
    ) {$charsetCollate};";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $createTable );
}
function create_table_qc()
{
    //  tao bang qc_order
    // if(!is_table_creat('qc_order')){
        create_qc_order_table();
    // }
    //  tao bang qc_img
        create_qc_img_table();
    //  tao bang qc_comment
        create_qc_comment_table();
    // tao bang dem like, comment,  share
        create_qc_count_table();
}
register_activation_hook( __FILE__, 'create_table_qc' );
//
 
?>