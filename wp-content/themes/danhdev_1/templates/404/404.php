<?php
    $data_setup= fs_get_data_theme('data_setup');
?>
<!DOCTYPE html>
<html lang="vi" class=" w-mod-ix">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, follow">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:title" content="404">
    <meta property="og:site_name" content="<?php echo $data_setup->website_name; ?>">
    <meta name="twitter:card" content="summary_large_image">
    <style type="text/css"><?php require_once(get_stylesheet_directory().'/templates/assets/css/style_home.php'); ?></style>
    <link rel="icon" href="<?php echo $data_setup->icon_url_32; ?>" sizes="32x32">
    <link rel="icon" href="<?php echo $data_setup->icon_url_192; ?>" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php echo $data_setup->icon_url_180; ?>">
    <meta name="msapplication-TileImage" content="<?php echo $data_setup->icon_url_180; ?>">
    <style type="text/css">
        body {
        background-color: #2F3242;
        height: 100%;
        }
        svg {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -250px;
        margin-left: -400px;
        }
        .message-box {
        height: 200px;
        width: 380px;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -100px;
        margin-left: 50px;
        color: #FFF;
        font-family: Roboto;
        font-weight: 300;
        }
        .message-box h1 {
        font-size: 60px;
        line-height: 46px;
        margin-bottom: 40px;
        }
        .buttons-con .action-link-wrap {
        margin-top: 40px;
        }
        .buttons-con .action-link-wrap a {
        background: #68c950;
        padding: 8px 25px;
        border-radius: 4px;
        color: #FFF;
        font-weight: bold;
        font-size: 14px;
        transition: all 0.3s linear;
        cursor: pointer;
        text-decoration: none;
        margin-right: 10px
        }
        .buttons-con .action-link-wrap a:hover {
        background: #5A5C6C;
        color: #fff;
        }

        #Polygon-1 , #Polygon-2 , #Polygon-3 , #Polygon-4 , #Polygon-4, #Polygon-5 {
        animation: float 1s infinite ease-in-out alternate;
        }
        #Polygon-2 {
        animation-delay: .2s; 
        }
        #Polygon-3 {
        animation-delay: .4s; 
        }
        #Polygon-4 {
        animation-delay: .6s; 
        }
        #Polygon-5 {
        animation-delay: .8s; 
        }

        @keyframes float {
            100% {
            transform: translateY(20px);
        }
        }
        @media (max-width: 450px) {
        svg {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -250px;
            margin-left: -190px;
        }
        .message-box {
            top: 50%;
            left: 50%;
            margin-top: -100px;
            margin-left: -190px;
            text-align: center;
        }
        }

    </style>
</head>

<body style="background-color: tan;" class="home page-template page-template-home-page page-template-home-page-php page page-id-2013 light-mode wp-schema-pro-2.7.2 jkit-color-scheme elementor-default elementor-kit-1073 elementor-page elementor-page-2013">
    <?php require_once(get_stylesheet_directory().'/templates/header/header.php'); ?>
<div style="height: 100%;">
    <svg width="380px" height="500px" viewBox="0 0 837 1045" version="1.1">
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
        <path d="M353,9 L626.664028,170 L626.664028,487 L353,642 L79.3359724,487 L79.3359724,170 L353,9 Z" id="Polygon-1" stroke="#007FB2" stroke-width="6" sketch:type="MSShapeGroup"></path>
        <path d="M78.5,529 L147,569.186414 L147,648.311216 L78.5,687 L10,648.311216 L10,569.186414 L78.5,529 Z" id="Polygon-2" stroke="#EF4A5B" stroke-width="6" sketch:type="MSShapeGroup"></path>
        <path d="M773,186 L827,217.538705 L827,279.636651 L773,310 L719,279.636651 L719,217.538705 L773,186 Z" id="Polygon-3" stroke="#795D9C" stroke-width="6" sketch:type="MSShapeGroup"></path>
        <path d="M639,529 L773,607.846761 L773,763.091627 L639,839 L505,763.091627 L505,607.846761 L639,529 Z" id="Polygon-4" stroke="#F2773F" stroke-width="6" sketch:type="MSShapeGroup"></path>
        <path d="M281,801 L383,861.025276 L383,979.21169 L281,1037 L179,979.21169 L179,861.025276 L281,801 Z" id="Polygon-5" stroke="#36B455" stroke-width="6" sketch:type="MSShapeGroup"></path>
    </g>
    </svg>
    <div class="message-box">
        <h1>404</h1>
        <p>Kh??ng t??m th???y trang</p>
        <div class="buttons-con">
            <div class="action-link-wrap">
            <a onclick="history.back(-1)" class="link-button link-back-button">Go Back</a>
            <a href="<?php echo  get_home_url(); ?>" class="link-button">Go to Home Page</a>
            </div>
        </div>
    </div>
</div>
    <?php require_once(get_stylesheet_directory().'/templates/footer/footer.php'); ?>

</body>

</html>
