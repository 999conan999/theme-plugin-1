<?php 
    $data_setup= fs_get_data_theme('data_setup');
    require_once(get_stylesheet_directory().'/templates/search/control.php'); 
?>
<!DOCTYPE html>
<html lang="vi" class=" w-mod-ix">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta property="og:type" content="article">
    <meta name="robots" content="noindex, follow">
    <meta property="og:locale" content="vi_VN">
    <title><?php  echo  $title; ?></title>
    <meta property="og:title" content="<?php  echo  $title; ?>">
    <meta property="og:site_name" content="<?php echo $data_setup->website_name; ?>">
    <meta name="twitter:card" content="summary_large_image">
    <style type="text/css"><?php require_once(get_stylesheet_directory().'/templates/assets/css/style_home.php'); ?></style>
    <link rel="icon" href="<?php echo $data_setup->icon_url_32; ?>" sizes="32x32">
    <link rel="icon" href="<?php echo $data_setup->icon_url_192; ?>" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php echo $data_setup->icon_url_180; ?>">
    <meta name="msapplication-TileImage" content="<?php echo $data_setup->icon_url_180; ?>">
</head>

<body style="background-color: tan;" class="home page-template page-template-home-page page-template-home-page-php page page-id-2013 light-mode wp-schema-pro-2.7.2 jkit-color-scheme elementor-default elementor-kit-1073 elementor-page elementor-page-2013">
    <?php require_once(get_stylesheet_directory().'/templates/header/header.php'); ?>
    <div class="category-section-hero" style="background:tan;padding-top:20px">
        <div class="content-container">
            <div class="title-container category-pg">
                <div class="div-block-18">
                    <div class="title-cont category-titlecont">
                        <h1 class="h1-article"><?php echo  $title; ?></h1>
                    </div>
                </div>
            </div>
            <div class="w-dyn-list">
                <div role="list" class="howto-cardcont w-dyn-items boxwhile">
        <?php 
        if(count($results)>0){
            foreach($results as $post){
            ?>
                        <div role="listitem" class="w-dyn-item">
                            <a href="<?php echo $post->post_url;?>" class="card2 dropshadow w-inline-block" data-wpel-link="internal" target="_blank" style="display: block;">
                                <div data-bg="<?php echo $post->thumnail_url;?>" style="background-color: rgb(138, 63, 252); background-image: url(<?php echo $post->thumnail_url;?>);" class="howto-img-hm rocket-lazyload entered lazyload" data-ll-status="load"></div>
                                <div style="padding:15px">
                                    <h3 class="h3-card1" style="min-height: 48px;"><?php echo str_ireplace($_GET['s'],'<span style="color:blue;text-decoration: underline;">'.$_GET['s'].'</span>',$post->post_title);?></h3>
                                    <div class="div-block-33">
                                        <div class="dot-light"></div>
                                        <div class="div-block-37">
                                            <p class="paragraph-5"><?php echo $data_setup->website_name; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
            <?php 
            }
        }else{
            echo '<p>Không tìm thấy kết quả bạn cần tìm.</p>';
        }
        ?>
                </div>
            </div>
        </div>
    </div>
    <?php require_once(get_stylesheet_directory().'/templates/footer/footer.php'); ?>

</body>

</html>
