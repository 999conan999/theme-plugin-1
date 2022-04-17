<?php
    $data_setup= fs_get_data_theme('data_setup');
    require_once(get_stylesheet_directory().'/templates/archive/control_archive.php');
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
    <title><?php echo  $data_category->category_name; ?></title>
    <meta name="description" content="<?php echo  $data_category->descriptions; ?>">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="<?php echo  $current_url; ?>">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:title" content="<?php echo  $data_category->category_name; ?>">
    <meta property="og:description" content="<?php echo  $data_category->descriptions; ?>">
    <meta property="og:url" content="<?php echo  $current_url; ?>">
    <meta property="og:site_name" content="<?php echo $data_setup->website_name; ?>">
    <meta property="og:image" content="<?php echo $thumnail_url; ?>">
    <meta property="og:image:width" content="640">
    <meta property="og:image:height" content="360">
    <meta name="twitter:card" content="summary_large_image">
    <style type="text/css"><?php require_once(get_stylesheet_directory().'/templates/assets/css/style_home.php'); ?></style>
    <link rel="icon" href="<?php echo $data_setup->icon_url_32; ?>" sizes="32x32">
    <link rel="icon" href="<?php echo $data_setup->icon_url_192; ?>" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php echo $data_setup->icon_url_180; ?>">
    <meta name="msapplication-TileImage" content="<?php echo $data_setup->icon_url_180; ?>">
    <?php  echo $metaA->schema_seo_result ;?>
    <style type="text/css"><?php echo $data_setup->css_code ;?> </style>
    <style type="text/css"><?php echo $data_setup->add_code_cetegorys->css_code ;?> </style>
    <?php echo $data_setup->code_header ;?>
    <?php echo $data_setup->add_code_cetegorys->code_header ;?>
    <?php echo $metaA->code_header;?>
</head>
<body style="background-color: tan;" class="home page-template page-template-home-page page-template-home-page-php page page-id-2013 light-mode wp-schema-pro-2.7.2 jkit-color-scheme elementor-default elementor-kit-1073 elementor-page elementor-page-2013">
    <?php echo $data_setup->code_body ;?>
    <?php echo $data_setup->add_code_cetegorys->code_body ;?>
    <?php echo $metaA->code_body;?>
    <?php require_once(get_stylesheet_directory().'/templates/header/header.php'); ?>
    <?php 
        if($template_selected=='0'){
            require_once(get_stylesheet_directory().'/templates/archive/archive_00.php');
        }elseif($template_selected=='1'){
            require_once(get_stylesheet_directory().'/templates/archive/archive_01.php');
            echo $pageing;
        }elseif($template_selected=='2' && isset($metaA->treeData)){
            require_once(get_stylesheet_directory().'/templates/archive/archive_02.php');
        }
    ?>
    <?php require_once(get_stylesheet_directory().'/templates/footer/footer.php'); ?>
    <?php echo $data_setup->add_code_cetegorys->code_footer ;?>
    <?php echo $metaA->code_footer;?>
</body>

</html>