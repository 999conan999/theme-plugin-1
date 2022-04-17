<?php
    require_once(get_stylesheet_directory().'/templates/home/control_home.php');
?>
<!DOCTYPE html>
<html lang="vi" class=" w-mod-ix">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="robots" content="max-image-preview:large">
    <title><?php echo $data_setup->website_name; ?> | <?php echo $home_setup->tab_1->title_home; ?></title>
    <meta name="description" content="<?php echo mb_substr($home_setup->tab_1->descript_home,0,200, "utf-8"); ?>">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="<?php echo  $home_url;?>">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo $data_setup->website_name.' | '.$home_setup->tab_1->title_home; ?>">
    <meta property="og:description" content="<?php echo mb_substr($home_setup->tab_1->descript_home,0,200, "utf-8"); ?>">
    <meta property="og:url" content="<?php echo  $home_url;?>">
    <meta property="og:site_name" content="<?php echo $data_setup->website_name; ?>">
    <meta property="og:image" content="<?php echo $home_setup->thumnail_url_home; ?>">
    <meta property="og:image:width" content="640">
    <meta property="og:image:height" content="360">
    <meta name="twitter:card" content="summary_large_image">
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
    <noscript>
        <style id="rocket-lazyload-nojs-css">
            .rll-youtube-player,
            [data-lazy-src] {
                display: none !important;
            }
        </style>
    </noscript>
    <style type="text/css"><?php require_once(get_stylesheet_directory().'/templates/assets/css/style_home.php'); ?></style>
    <!-- Css  common -->
    <style type="text/css"><?php echo $data_setup->css_code ;?></style>
    <!-- Css  only for this page -->
    <style type="text/css"><?php echo $home_setup->tab_6->code_css_home ;?></style>
    <!-- code ember header common -->
    <?php echo $data_setup->code_header ;?>
    <!-- code ember only for this page -->
    <?php echo $home_setup->tab_6->code_header_home ;?>
</head>

<body class="home page-template page-template-home-page page-template-home-page-php page page-id-2013 light-mode wp-schema-pro-2.7.2 jkit-color-scheme elementor-default elementor-kit-1073 elementor-page elementor-page-2013">
    <!-- code ember body common -->
    <?php echo $data_setup->code_body ;?>
    <!-- code ember only for this page -->
    <?php echo $home_setup->tab_6->code_body_home ;?>
    <?php require_once(get_stylesheet_directory().'/templates/header/header.php'); ?>
<?php if(($home_setup)!='null'){ ?>
    <div class="div-block-4">
        <div id="hero" class="hero-section">
            <div class="herocontainer">
                <div>
                    <h1 class="h1-hero-hm"><?php echo(isset($home_setup->tab_1->title_home)?$home_setup->tab_1->title_home:'');?></h1>
                    <div class="subtitle-hero-hm"><?php echo(isset($home_setup->tab_1->descript_home)?$home_setup->tab_1->descript_home:'');?></div>
                </div>
                <div class="category-hero-hm">
                    <a href="<?php echo(isset($home_setup->tab_1->menu_href_1)&&$home_setup->tab_1->menu_href_1!=''?$home_setup->tab_1->menu_href_1:'#');?>" class="cate-hero-block w-inline-block">
                    <?php
                        if(isset($home_setup->tab_1->menu_title_1)&&$home_setup->tab_1->menu_title_1!=''){
                    ?>
                        <div class="category-icon-hero" style=" background-color: #3861fb; ">
                            <img src="<?php echo get_stylesheet_directory_uri().'/templates/assets/css/icon/icon1.svg';?>" alt="Forex" class="category-icon">
                        </div>
                        <div class="cate-hero-txtcont">
                            <h2 class="h2-hero-hm"><?php echo $home_setup->tab_1->menu_title_1;?></h2>
                        </div>
                    <?php
                        }
                    ?>
                    </a>


                    <a href="<?php echo(isset($home_setup->tab_1->menu_href_2)&&$home_setup->tab_1->menu_href_2!=''?$home_setup->tab_1->menu_href_2:'#');?>" class="cate-hero-block w-inline-block">
                    <?php
                        if(isset($home_setup->tab_1->menu_title_2)&&$home_setup->tab_1->menu_title_2!=''){
                    ?>
                        <div class="category-icon-hero" style=" background-color: #8a3ffc; "><img
                                src="<?php echo get_stylesheet_directory_uri().'/templates/assets/css/icon/icon2.svg';?>" alt="Coin" class="category-icon">
                        </div>
                        <div class="cate-hero-txtcont">
                            <h2 class="h2-hero-hm"><?php echo $home_setup->tab_1->menu_title_2;?></h2>
                        </div>
                    <?php
                        }
                    ?>
                    </a>
 
    
                    <a href="<?php echo(isset($home_setup->tab_1->menu_href_3)&&$home_setup->tab_1->menu_href_3!=''?$home_setup->tab_1->menu_href_3:'#');?>" class="cate-hero-block w-inline-block">
                    <?php
                        if(isset($home_setup->tab_1->menu_title_3)&&$home_setup->tab_1->menu_title_3!=''){
                    ?>
                        <div class="category-icon-hero" style=" background-color: #3861fb; "><img
                                src="<?php echo get_stylesheet_directory_uri().'/templates/assets/css/icon/icon3.svg';?>" alt="Chứng Khoán" class="category-icon">
                        </div>
                        <div class="cate-hero-txtcont">
                            <h2 class="h2-hero-hm"><?php echo $home_setup->tab_1->menu_title_3;?></h2>
                        </div>
                    <?php
                        }
                    ?>
                    </a>
 
                    <a href="<?php echo(isset($home_setup->tab_1->menu_href_4)&&$home_setup->tab_1->menu_href_4!=''?$home_setup->tab_1->menu_href_4:'#');?>" class="cate-hero-block w-inline-block">
                    <?php
                        if(isset($home_setup->tab_1->menu_title_4)&&$home_setup->tab_1->menu_title_4!=''){
                    ?>
                        <div class="category-icon-hero" style=" background-color: #23f5c3; "><img width="24" height="24"
                                src="<?php echo get_stylesheet_directory_uri().'/templates/assets/css/icon/icon4.svg';?>" alt="Tài Chính" class="category-icon">
                        </div>
                        <div class="cate-hero-txtcont">
                            <h2 class="h2-hero-hm"><?php echo $home_setup->tab_1->menu_title_4;?></h2>
                        </div>
                    <?php
                        }
                    ?>
                    </a>
                
                    <a href="<?php echo(isset($home_setup->tab_1->menu_href_5)&&$home_setup->tab_1->menu_href_5!=''?$home_setup->tab_1->menu_href_5:'#');?>" class="cate-hero-block w-inline-block">
                    <?php
                        if(isset($home_setup->tab_1->menu_title_5)&&$home_setup->tab_1->menu_title_5!=''){
                    ?>
                        <div class="category-icon-hero" style=" background-color: #ff5abd; "><img width="24" height="22"
                                src="<?php echo get_stylesheet_directory_uri().'/templates/assets/css/icon/icon6.png';?>" alt="Đánh giá" class="category-icon">
                        </div>
                        <div class="cate-hero-txtcont">
                            <h2 class="h2-hero-hm"><?php echo $home_setup->tab_1->menu_title_5;?></h2>
                        </div>
                    <?php
                        }
                    ?>
                    </a>
                
                    <a href="<?php echo(isset($home_setup->tab_1->menu_href_6)&&$home_setup->tab_1->menu_href_6!=''?$home_setup->tab_1->menu_href_6:'#');?>" class="cate-hero-block w-inline-block" data-wpel-link="internal">
                    <?php
                        if(isset($home_setup->tab_1->menu_title_6)&&$home_setup->tab_1->menu_title_6!=''){
                    ?>
                        <div class="category-icon-hero" style=" background-color: #ff5abd; "><img width="24" height="22"
                                src="<?php echo get_stylesheet_directory_uri().'/templates/assets/css/icon/icon5.png';?>" alt="Đánh giá" class="category-icon">
                        </div>
                        <div class="cate-hero-txtcont">
                            <h2 class="h2-hero-hm"><?php echo $home_setup->tab_1->menu_title_6;?></h2>
                        </div>
                    <?php
                     }
                    ?>
                    </a>
                    

                </div>
            </div>
        </div>
    </div>
<?php if($tab_2->is_show){ ?>
    <div class="newposts-section">
        <div class="newposts-container">
            <div class="title-container">
                <div>
                    <div class="title-cont">
                        <div class="category-icon-hero cb" style=" background-color: #eeee22; "><img width="24"
                                height="24" src="<?php echo get_stylesheet_directory_uri().'/templates/assets/css/icon/icon1.svg';?>" alt="Tin Tức Tiền Điện Tử" class="category-icon">
                        </div>
                        <h2 id="huong-dan-su-dung-theme"  class="h1-newposts-title"><?php echo $tab_2->title_tab_2;  ?></h2>
                    </div>
                </div>
                <div class="div-block-7"><a href="<?php echo $data_tab_2->category_url;  ?>" data-wpel-link="internal"
                        target="_blank">Xem tất cả ⟶</a>
                </div>
            </div>
            <div class="newpost-content-contaienr">
                <div class="featured-new-container">
                <?php echo $post_1_tab_2;?>
                </div>
                <div class="newposts-secondary-list">
                    <div class="w-dyn-list">
                        <div role="list" class="w-dyn-items">
                         <?php echo $post_2_tab_2;?>
                         <?php echo $post_3_tab_2;?>
                         <?php echo $post_4_tab_2;?>
                         <?php echo $post_5_tab_2;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if($tab_3->is_show){ ?>
    <div class="newposts-section gnws-video_playlist">
        <div class="newposts-container">
            <div class="title-container">
                <div>
                    <div class="title-cont">
                        <div class="category-icon-hero cb" style=" background-color: #eeee22; "><img width="24"
                                height="24" src="<?php echo get_stylesheet_directory_uri().'/templates/assets/css/icon/icon2.svg';?>" alt="<?php echo $tab_3->title_tab_3; ?>" class="category-icon">
                        </div>
                        <h2 id="video" class="h1-newposts-title"><?php echo $tab_3->title_tab_3; ?></h2>
                    </div>
                </div>
                <div class="div-block-7"><a href="<?php echo $tab_3->url_kenh; ?>" data-wpel-link="internal" target="_blank">Xem
                        tất cả ⟶</a>
                </div>
            </div>
            <?php echo $tab_3->video_html;?>
        </div>
    </div>
<?php } ?>
<div id='chia-se-giao-dien'></div>
<?php echo $result_tab_4; ?>
  
<?php if($tab_5->is_show){ ?>
    <div class="category-section allarticles techdeep" style="margin-bottom: 40px;padding-top: 50px;padding-bottom: 50px;">
        <div class="content-container">
            <div class="w-dyn-list">
                <div role="list" class="allarticles-grid w-dyn-items">
                    <?php echo $result_tab_5; ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php } ?>
    <?php require_once(get_stylesheet_directory().'/templates/footer/footer.php'); ?>
    <!-- code ember footer common -->
    <?php echo $data_setup->code_footer ;?>
<!-- code ember only for this page -->
    <?php echo $home_setup->tab_6->code_footer_home ;?>
    <script>function lazyLoadThumb(e) { var t = '<img src="https://i.ytimg.com/vi/ID/hqdefault.jpg" alt="" width="480" height="360"><noscript><img src="https://i.ytimg.com/vi/ID/hqdefault.jpg" alt="" width="480" height="360"></noscript>', a = '<button class="play" aria-label="play Youtube video"></button>'; return t.replace("ID", e) + a } function lazyLoadYoutubeIframe() { var e = document.createElement("iframe"), t = "ID?autoplay=1"; t += 0 === this.parentNode.dataset.query.length ? '' : '&' + this.parentNode.dataset.query; e.setAttribute("src", t.replace("ID", this.parentNode.dataset.src)), e.setAttribute("frameborder", "0"), e.setAttribute("allowfullscreen", "1"), e.setAttribute("allow", "accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"), this.parentNode.parentNode.replaceChild(e, this.parentNode) } document.addEventListener("DOMContentLoaded", function () { var e, t, p, a = document.getElementsByClassName("rll-youtube-player"); for (t = 0; t < a.length; t++)e = document.createElement("div"), e.setAttribute("data-id", a[t].dataset.id), e.setAttribute("data-query", a[t].dataset.query), e.setAttribute("data-src", a[t].dataset.src), e.innerHTML = lazyLoadThumb(a[t].dataset.id), a[t].appendChild(e), p = e.querySelector('.play'), p.onclick = lazyLoadYoutubeIframe });</script>

</body>

</html>