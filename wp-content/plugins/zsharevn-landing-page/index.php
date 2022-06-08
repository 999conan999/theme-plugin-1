<?php 
/*
Plugin Name: LandingPage ads
Plugin URI: zshare.vn
Description: Tạo ra những landing page, tăng khả năng bán hàn, chuyển đổi, thích hợp chạy quảng cáo.
Version: 1.0
Author: zshare
Author URI: zshare.vn
License: GPL
*/
add_action( 'init', 'create_post_type_zshare' );
function create_post_type_zshare(){
    $label = array(
        'name' => 'Landing Page', //Tên post type dạng số nhiều
        'singular_name' => 'Landing Page' //Tên post type dạng số ít
    );
    $args = array(
        'labels' => $label, //Gọi các label trong biến $label ở trên
        // 'description' => 'cccc', //Mô tả của post type
        'supports' => array(
        'title',
        'editor',
        ),
        'rewrite' => array('slug' => 'vi'),
        'taxonomies' => array(), //Các taxonomy được phép sử dụng để phân loại nội dung
        'hierarchical' => true, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
        'public' => true, //Kích hoạt post type
        'show_ui' => false, //Hiển thị khung quản trị như Post/Page
        'can_export' => true, //Có thể export nội dung bằng Tools -> Export
        'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
        'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
        // 'capability_type' => 'page' //
    );
    register_post_type('zshare', $args);
}
add_filter( 'template_include', 'include_template_function', 1 );
function include_template_function( $template_path ) {
    if ( get_post_type() == 'zshare' ) {
        if ( is_single() ) {
            if ( $theme_file = locate_template( array ( 'single-zshare.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . '/single-zshare.php';
            }
        }
    }
    return $template_path;
}

add_action('admin_menu', 'test_plugin_setup_menu');
function test_plugin_setup_menu(){
    add_menu_page( 'Tạo landing page', 'Langding page', 'manage_options', 'create-landing-page-by-zshare_vn', 'test_init',plugin_dir_url(__FILE__).'/icon.png',3 );
}
 
function test_init(){
    $home_url=get_home_url();
    echo '<html lang="en">
    <head>
        <link async rel="stylesheet" href="'.$home_url.'/wp-content/plugins/zsharevn-landing-page/semantic.css" />
        <link async rel="stylesheet" href="'.$home_url.'/wp-content/plugins/zsharevn-landing-page/fontawesome/css/all.min.css" />
        <script type="text/javascript">window.home_url = "'.$home_url.'"</script>
        <script defer="defer" src="'.$home_url.'/wp-content/plugins/zsharevn-landing-page/static-admin/js/main.7faa961c.js"></script>
        <link href="'.$home_url.'/wp-content/plugins/zsharevn-landing-page/static-admin/css/main.fbf85415.css" rel="stylesheet">
    </head>
    
    <body>
        <div id="root"></div>
    </body>
    
    </html>';
}

if (!function_exists('send')) {
    function send($data){
        header('Cache-Control: no-cache, must-revalidate');
        header('Content-type: application/json');
        echo json_encode($data);
    }
}
?>