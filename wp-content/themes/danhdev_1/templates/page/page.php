<?php
    $data_setup= fs_get_data_theme('data_setup');
    require_once(get_stylesheet_directory().'/templates/page/control.php');
?>
<!DOCTYPE html>
<html lang="vi" class=" w-mod-ix">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta property="og:type" content="article">
    <meta name="GENERATOR" content="<?php echo $data_setup->website_name; ?>">
    <meta name="copyright" content="<?php echo $data_setup->website_name; ?>">
    <title><?php echo $obj->post_title ?></title>
    <meta name="description" content="<?php echo $descriptions; ?>">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="<?php echo $current_url; ?>">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo $obj->post_title ?>">
    <meta property="og:description" content="<?php echo $descriptions; ?>">
    <meta property="og:url" content="<?php echo $current_url; ?>">
    <meta property="og:site_name" content="<?php echo $data_setup->website_name; ?>">
    <meta property="og:image" content="<?php echo $thumnail_url; ?>">
    <meta property="og:image:width" content="640">
    <meta property="og:image:height" content="360">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="icon" href="<?php echo $data_setup->icon_url_32; ?>" sizes="32x32">
    <link rel="icon" href="<?php echo $data_setup->icon_url_192; ?>" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php echo $data_setup->icon_url_180; ?>">
    <meta name="msapplication-TileImage" content="<?php echo $data_setup->icon_url_180; ?>">
    <style type="text/css"><?php require_once(get_stylesheet_directory().'/templates/assets/css/style_home.php'); ?></style>

    <?php
        if($template_selected==1){
    ?>
    <script type="text/javascript" >
         window.data={
             id:<?php echo $id;?>,
             data:<?php echo json_encode($metaA->data_lien_he); ?>
         };
    </script>
    <script defer="defer" src="<?php echo $home_url; ?>/wp-content/themes/danhdev_1/templates/page/page_01/static/js/main.85d05cd2.js"></script>
    <link href="<?php echo $home_url; ?>/wp-content/themes/danhdev_1/templates/page/page_01/static/css/main.7498fde5.css" rel="stylesheet">
    <?php
        }elseif($template_selected==2){
    ?>
    <style type="text/css">
     .juju{ position: fixed; background-color: #cbcbcb; z-index: 999; width: 100%; bottom: 0px; } .yit{ margin: auto; display: table; } .countdown { border: 2px solid #3f51b5; border-radius: 50%; color: #3f51b5; display: block; font-size: 16px; font-weight: 300; height: 100px; line-height: 18px; margin: 8px auto; padding: 29px 0 0; width: 100px; } .link1s-time { display: inline-block; font-weight: 600; } .load-wrapp { float: left; width: 100px; height: 100px; margin: 0 10px 10px 0; padding: 20px 20px 20px; border-radius: 5px; text-align: center; background-color: #d8d8d8; } .load-wrapp:last-child { margin-right: 0; } .letter { float: left; font-size: 14px; color: #3f51b5; } .load-6 .letter { animation-name: loadingF; animation-duration: 1.6s; animation-iteration-count: infinite; animation-direction: linear; } .l-1 { animation-delay: 0.48s; } .l-2 { animation-delay: 0.6s; } .l-3 { animation-delay: 0.72s; } .l-4 { animation-delay: 0.84s; } .l-5 { animation-delay: 0.96s; } .l-6 { animation-delay: 1.08s; } .l-7 { animation-delay: 1.2s; } .l-8 { animation-delay: 1.32s; } .l-9 { animation-delay: 1.44s; } .l-10 { animation-delay: 1.56s; } @keyframes loadingF { 0% { opacity: 0; } 100% { opacity: 1; } }
    </style>
    <script type="text/javascript" >
         window.data={
            time:<?php echo $metaA->data_redirect_code->time; ?>,
            url:"<?php echo get_stylesheet_directory_uri().'/templates/page/page_02/fs.php';?>",
            id:<?php echo $id ?>
         };
    </script>
     <?php
        }elseif($template_selected==3){
    ?>
        <script type="text/javascript" >
         window.url= "<?php echo get_stylesheet_directory_uri().'/templates/ajax/ipa_nimda/tcatnoc/create.php';?>" 
        </script>
        <script defer="defer" src="<?php echo $home_url; ?>/wp-content/themes/danhdev_1/templates/page/page_03/static/js/main.819dde99.js"></script>
        <link href="<?php echo $home_url; ?>/wp-content/themes/danhdev_1/templates/page/page_03/static/css/main.4bbf88c2.css" rel="stylesheet">
    <?php
        }
    ?>
    <?php echo $metaA->schema_seo_result ;?>
    <style type="text/css"><?php echo $data_setup->css_code ;?> </style>
    <style type="text/css"><?php echo $data_setup->add_code_pages->css_code ;?> </style>
    <?php echo $data_setup->code_header ;?>
    <?php echo $data_setup->add_code_pages->code_header ;?>
    <?php echo $metaA->code_header;?>
</head>
<body
 class="home page-template page-template-home-page page-template-home-page-php page page-id-2013 light-mode wp-schema-pro-2.7.2 jkit-color-scheme elementor-default elementor-kit-1073 elementor-page elementor-page-2013"
 style="background-color: tan;"
 >
    <?php echo $data_setup->code_body ;?>
    <?php echo $data_setup->add_code_pages->code_body ;?>
    <?php echo $metaA->code_body;?>

    <?php
        require_once(get_stylesheet_directory().'/templates/header/header.php');
    ?>
    
    <?php
        if($template_selected==0){
            require_once(get_stylesheet_directory().'/templates/page/page_00.php');
        }elseif($template_selected==1){
            require_once(get_stylesheet_directory().'/templates/page/page_01/page_01.php');
        }elseif($template_selected==2){
            require_once(get_stylesheet_directory().'/templates/page/page_02/page_02.php');
        }elseif($template_selected==3){
            require_once(get_stylesheet_directory().'/templates/page/page_03/page_03.php');
        }
    ?>

    <?php 
         require_once(get_stylesheet_directory().'/templates/footer/footer.php'); 
    ?>
    <?php echo $data_setup->add_code_pages->code_footer ;?>
    <?php echo $metaA->code_footer;?>
</body>

</html>