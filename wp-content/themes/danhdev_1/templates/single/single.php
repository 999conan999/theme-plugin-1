<?php
    $data_setup= fs_get_data_theme('data_setup');
    require_once(get_stylesheet_directory().'/templates/single/control.php');
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
    <title><?php echo $obj->post_title; ?></title>
    <meta name="description" content="<?php echo $metaA->descriptions; ?>">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="<?php echo $current_url; ?>">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:title" content="<?php echo $obj->post_title; ?>">
    <meta property="og:description" content="<?php echo $metaA->descriptions; ?>">
    <meta property="og:url" content="<?php echo $current_url; ?>">
    <meta property="og:site_name" content="<?php echo $data_setup->website_name; ?>">
    <meta property="og:image" content="<?php echo $thumnail_url; ?>">
    <meta property="og:image:width" content="640">
    <meta property="og:image:height" content="360">
    <meta name="twitter:card" content="summary_large_image">
    <style type="text/css"><?php require_once(get_stylesheet_directory().'/templates/assets/css/style_home.php'); ?></style>
    <style type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 .07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
        .elementor-kit-1073 {
            --e-global-color-primary: #6EC1E4;
            --e-global-color-secondary: #54595F;
            --e-global-color-text: #7A7A7A;
            --e-global-color-accent: #61CE70;
            --e-global-color-31e8: #4054B2;
            --e-global-color-2001: #23A455;
            --e-global-color-1ea6: #000;
            --e-global-color-50e7: #FFF;
            --e-global-typography-primary-font-family: "Roboto";
            --e-global-typography-primary-font-weight: 600;
            --e-global-typography-secondary-font-family: "Roboto Slab";
            --e-global-typography-secondary-font-weight: 400;
            --e-global-typography-text-font-family: "Roboto";
            --e-global-typography-text-font-weight: 400;
            --e-global-typography-accent-font-family: "Roboto";
            --e-global-typography-accent-font-weight: 500;
        }

        .elementor-section.elementor-section-boxed>.elementor-container {
            max-width: 1170px;
        }


        h1.entry-title {
            display: var(--page-title-display);
        }

        @media(max-width:1024px) {
            .elementor-section.elementor-section-boxed>.elementor-container {
                max-width: 1024px;
            }
        }

        @media(max-width:767px) {
            .elementor-section.elementor-section-boxed>.elementor-container {
                max-width: 767px;
            }
        }
        .rll-youtube-player {
            position: relative;
            padding-bottom: 56.23%;
            height: 0;
            overflow: hidden;
            max-width: 100%;
        }

        .rll-youtube-player:focus-within {
            outline: 2px solid currentColor;
            outline-offset: 5px;
        }

        .rll-youtube-player iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 100;
            background: 0 0
        }

        .rll-youtube-player img {
            bottom: 0;
            display: block;
            left: 0;
            margin: auto;
            max-width: 100%;
            width: 100%;
            position: absolute;
            right: 0;
            top: 0;
            border: none;
            height: auto;
            -webkit-transition: .4s all;
            -moz-transition: .4s all;
            transition: .4s all
        }

        .rll-youtube-player img:hover {
            -webkit-filter: brightness(75%)
        }

        .rll-youtube-player .play {
            height: 100%;
            width: 100%;
            left: 0;
            top: 0;
            position: absolute;
            background: url(https://beatdautu.com/wp-content/plugins/wp-rocket/assets/img/youtube.png) no-repeat center;
            background-color: transparent !important;
            cursor: pointer;
            border: none;
        }
        .boxdetail img {
            height: auto
        }
    </style>
    <link rel="icon" href="<?php echo $data_setup->icon_url_32; ?>" sizes="32x32">
    <link rel="icon" href="<?php echo $data_setup->icon_url_192; ?>" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php echo $data_setup->icon_url_180; ?>">
    <meta name="msapplication-TileImage" content="<?php echo $data_setup->icon_url_180; ?>">
    <?php
        if($template_selected==1){
    ?>
    <script type="text/javascript">
         window.data=JSON.stringify(<?php echo json_encode($metaA->data_demo);?>);
    </script>
    <script defer="defer" src="<?php echo $home_url; ?>/wp-content/themes/danhdev_1/templates/single/single_01/static/js/main.9639e67c.js"></script>
    <link href="<?php echo $home_url; ?>/wp-content/themes/danhdev_1/templates/single/single_01/static/css/main.5225b46f.css" rel="stylesheet">
    <?php }
        if($template_selected==2){
    ?>
    <style type="text/css">
    .juju{ position: fixed; background-color: #cbcbcb; z-index: 999; width: 100%; bottom: 0px; } .yit{ margin: auto; display: table; } .countdown { border: 2px solid #3f51b5; border-radius: 50%; color: #3f51b5; display: block; font-size: 16px; font-weight: 300; height: 100px; line-height: 18px; margin: 8px auto; padding: 29px 0 0; width: 100px; } .link1s-time { display: inline-block; font-weight: 600; } .load-wrapp { float: left; width: 100px; height: 100px; margin: 0 10px 10px 0; padding: 20px 20px 20px; border-radius: 5px; text-align: center; background-color: #d8d8d8; } .load-wrapp:last-child { margin-right: 0; } .letter { float: left; font-size: 14px; color: #3f51b5; } .load-6 .letter { animation-name: loadingF; animation-duration: 1.6s; animation-iteration-count: infinite; animation-direction: linear; } .l-1 { animation-delay: 0.48s; } .l-2 { animation-delay: 0.6s; } .l-3 { animation-delay: 0.72s; } .l-4 { animation-delay: 0.84s; } .l-5 { animation-delay: 0.96s; } .l-6 { animation-delay: 1.08s; } .l-7 { animation-delay: 1.2s; } .l-8 { animation-delay: 1.32s; } .l-9 { animation-delay: 1.44s; } .l-10 { animation-delay: 1.56s; } @keyframes loadingF { 0% { opacity: 0; } 100% { opacity: 1; } }
    </style>
    <script type="text/javascript" >
         window.data=(<?php echo json_encode($metaA->data_redirect);?>);
    </script>
    <?php
        }
    ?>
    <?php echo $metaA->schema_seo_result ;?>
    <style type="text/css"><?php echo $data_setup->css_code ;?> </style>
    <style type="text/css"><?php echo $data_setup->add_code_posts->css_code ;?> </style>
    <?php echo $data_setup->code_header ;?>
    <?php echo $data_setup->add_code_posts->code_header ;?>
    <?php echo $metaA->code_header;?>
</head>

<body style="background-color: tan;" class="home page-template page-template-home-page page-template-home-page-php page page-id-2013 light-mode wp-schema-pro-2.7.2 jkit-color-scheme elementor-default elementor-kit-1073 elementor-page elementor-page-2013">
    <?php echo $data_setup->code_body ;?>
    <?php echo $data_setup->add_code_posts->code_body ;?>
    <?php echo $metaA->code_body;?>
    <?php
      if($template_selected!=1){
        require_once(get_stylesheet_directory().'/templates/header/header.php');
      }
    ?>
    
    <?php
        if($template_selected==0){
            require_once(get_stylesheet_directory().'/templates/single/single_00.php'); 
        }elseif($template_selected==1){
            require_once(get_stylesheet_directory().'/templates/single/single_01/single_01.php'); 
        }elseif($template_selected==2){
            require_once(get_stylesheet_directory().'/templates/single/single_02/single_02.php'); 
        }
     ?>

    <?php 
    if($template_selected!=1){
         require_once(get_stylesheet_directory().'/templates/footer/footer.php'); 
    }
    ?>

    <?php echo $data_setup->add_code_posts->code_footer ;?>
    <?php echo $metaA->code_footer;?>
</body>

</html>