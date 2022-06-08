<?php 
    if (!function_exists('fs_get_data_theme')) {
        function fs_get_data_theme($keyz){
            global $wpdb;
            $table_prefix = $wpdb->prefix . 'data_theme';
            $sql = $wpdb->prepare( "SELECT keyz,valuez FROM $table_prefix WHERE keyz =%s ",$keyz);
            $results = $wpdb->get_results( $sql , OBJECT );
            if(count($results)>0){
                return json_decode($results[0]->valuez);
            }else{
                return 'null';
            }
        }
    }
    if (!function_exists('fs_get_data_theme')) {
        function fs_get_data_theme($keyz){
            global $wpdb;
            $table_prefix = $wpdb->prefix . 'data_theme';
            $sql = $wpdb->prepare( "SELECT keyz,valuez FROM $table_prefix WHERE keyz =%s ",$keyz);
            $results = $wpdb->get_results( $sql , OBJECT );
            if(count($results)>0){
                return json_decode($results[0]->valuez);
            }else{
                return 'null';
            }
        }
    }
    $plugin_setup=fs_get_data_theme('plugin_setup');
    $obj=get_queried_object();
    $id=$obj->ID;
    $metaA=json_decode(get_post_meta($id,'metaA', true));
    $current_url=get_permalink($id);
    $home_url= get_home_url();
    $content= $obj->post_content;
?>


<!DOCTYPE html>
<html lang="vn">
  <head>
    <meta content="INDEX,FOLLOW" name="robots">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo $metaA->data_lading_page->title_page; ?></title>
    <meta name="description" content="<?php echo $metaA->data_lading_page->des_short_page; ?>">
    <meta itemprop="image" content="<?php echo $metaA->thumnail_post; ?>">
    <meta property="og:url" itemprop="url" content="<?php echo $current_url; ?>">
    <meta property="og:title" content="<?php echo $metaA->data_lading_page->title_page; ?>">
    <meta property="og:description" content="<?php echo $metaA->data_lading_page->des_short_page; ?>">
    <meta property="og:image" content="<?php echo $metaA->thumnail_post; ?>">
    <meta name="RATING" content="GENERAL">
    <meta http-equiv="audience" content="General">
    <meta name="resource-type" content="Document">
    <meta name="distribution" content="Global">
    <meta name="GENERATOR" content="<?php echo $plugin_setup->website_name; ?>">
    <meta property="og:site_name" content="<?php echo $home_url; ?>">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="vi_VN">
    <meta name="copyright" content="<?php echo $plugin_setup->website_name; ?>">
    <meta name="author" content="<?php echo $plugin_setup->website_name; ?>">
    <link rel="canonical" href="<?php echo $current_url; ?>">
    <link href="<?php echo $plugin_setup->icon_url_192; ?>" rel="shortcut icon" type="image/x-icon">
    <link href="<?php echo $plugin_setup->icon_url_192; ?>" rel="apple-touch-icon">
    <link href="<?php echo $plugin_setup->icon_url_192; ?>" rel="apple-touch-icon-precomposed">
    <link rel="stylesheet" charset="UTF-8" href="<?php echo $home_url; ?>/wp-content/plugins/zsharevn-landing-page/css01.css" />
    <script defer="defer" src="<?php echo $home_url; ?>/wp-content/plugins/zsharevn-landing-page/static/js/main.2b295d6c.js"></script>
    <link href="<?php echo $home_url; ?>/wp-content/plugins/zsharevn-landing-page/static/css/main.f11a798f.css" rel="stylesheet">
    <!-- all -->
    <?php echo $plugin_setup->code_header; ?>
    <?php echo $metaA->code_header; ?>
    <style type="text/css">
       <?php echo $plugin_setup->css_code; ?>
       <?php echo $metaA->code_css; ?>
    </style>
    <script type="text/javascript">
      window.data={
        title_page:'<?php echo $metaA->data_lading_page->title_page; ?>',
        des_short_page:'<?php echo $metaA->data_lading_page->des_short_page; ?>',
        price_ads:<?php echo (int)($metaA->data_lading_page->price_ads); ?>,
        comom:{
          header_title:"<?php echo $plugin_setup->data_plugin->header_title; ?>",//
          footer_title:"<?php echo $plugin_setup->footer_setup->design_by; ?>",//
          logo_url:'<?php echo $plugin_setup->logo_url_1; ?>',//
          lien_he_zalo:'<?php echo $plugin_setup->footer_setup->url_zalo; ?>',//
          lien_he_facebook:'<?php echo $plugin_setup->footer_setup->url_fb; ?>',//
          lien_he_dien_thoai:'<?php echo $plugin_setup->footer_setup->hotline; ?>',//
          ten_thuong_hieu:'<?php echo $plugin_setup->website_name; ?>'//
        },
        narbar:<?php echo json_encode($metaA->data_lading_page->narbar); ?>,
        sp:<?php echo json_encode($metaA->data_lading_page->sp); ?>,
      };
      window.home_url="<?php echo $home_url; ?>";
      console.log(window.data);
    </script>
  </head>
  <body>
    <!-- all -->
    <?php echo $plugin_setup->code_body; ?>
    <?php echo $metaA->code_body; ?>

    <?php  //var_dump($plugin_setup); ?>
    <?php //var_dump(($metaA)); ?>
    <div id="root">
      <?php echo $metaA->server_render; ?>
    </div>
    <div class="container">
      <div class="content">
          <?php echo $content; ?>
      </div>
    </div>
    <!-- all -->
    <?php echo $plugin_setup->code_footer; ?>
    <?php echo $metaA->code_footer; ?>
  </body>
</html>
