<?php
    $year=date("Y");
    $vote= $id+($year-2000)*10+date("m")*2;
    $rate=4+rand(0,9)/10;
    $highPrice=rand(9,12)*100000;
    $lowPrice=rand(2,5)*100000;
    if($post_infor->data_qc->data_trick->sale!=0) {$highPrice=$post_infor->data_qc->data_trick->sale;}else{
        $highPrice=rand(9,12)*100000;
    }
    $schema='';
    // if($post_infor->data_qc->data_trick->is_show){
        $schema.='<script type="application/ld+json">{"@context": "http://schema.org/","@type": "Product","name":"'.$post_infor->title.'","image":"'.$post_infor->thumnail.'","description":"'.$post_infor->short_des.'","url":"'.$current_url.'","sku":"'.$id.'","brand":{"@type": "Brand","name":"OEM"},"mpn":"AnBinh'.$id.'","review": {"@type": "Review","reviewRating": {"@type": "Rating","ratingValue": "'.$rate.'","bestRating": "5"},"author": {"@type": "Person","name": "'.$home_name.'"}},"aggregateRating": {"@type": "AggregateRating","ratingValue": "'.$rate.'","reviewCount": "'.$vote.'"},"offers": {"@type": "Offer","url":"'.$current_url.'","priceCurrency": "VND","price": "'.$post_infor->data_qc->data_trick->price.'","priceValidUntil": "'.$year.'-12-12","shippingDetails": { "@type": "OfferShippingDetails", "shippingRate": { "@type": "MonetaryAmount", "value": "0", "currency": "VND" }},"itemCondition": "https://schema.org/NewCondition","availability": "https://schema.org/InStock","seller": {"@type": "Organization", "name": "'.$home_name.'"}}}</script>';
    // }
    $dm=$post_infor->data_qc->dm;
    $menu='<li><a href="'.$current_url.'" title="'.$post_infor->title.'">Trang Chủ</a></li>';
    $content='';
    // $is_load_img=true;
    foreach($dm as $x){
        $content.='<div class="lis-category">';
        $id_url=fixForUri($x->name);
        $content.='<div class="wraptt" onClick=navigator.clipboard.writeText("'.$parent_url.'#'.$id_url.'")><p id="'.$id_url.'" class="title3z">'.$x->name.'</p></div>';
        $menu.='<li><a onclick="hide_menu()" href="#'.$id_url.'" title="'.$x->name.'">'.$x->name.'</a></li>';
        $content.='<div class="wza"> <ul class="cart-w row">';
        foreach($x->list_sp as $item){
            $content.='<li class="lza col-12 col-md-4 col-xl-3">';
            $url_detail=$parent_url.'?dm='.$x->id.'&dt='.$item->id;
            $url_name_cd= str_replace($home_url,"",$url_detail);
            $content.='<a class="card-3" href="'.$url_detail.'" title="'.$item->title.'" target="_blank" onClick="window.aff=`'.$url_name_cd.'`">';
            $content.='<div class="imgz-cart danhdev-product">';
            // if($is_load_img){
            //     $content.='<img class="zz" src="'.$item->img.'" width="100%" height="380px">';
            // }else{
                $content.='<img class="zz lazyload" data-srcset="'.$item->img.'" width="100%"  height="380px">';
            // }
            $content.='</div>';
            $content.='<h3>'.$item->title.'</h3>';
            if($item->price!="0"&&$item->price!=""){
                $content.='<div style=" padding-left: 8px; "><ins class="ins-cost costz">'.number_format($item->price, 0, '', '.').' đ</ins></div>';
            }else{
                $content.='<div style=" padding-left: 8px; "><ins class="ins-cost costz">Liên hệ</ins></div>';
            }
            $content.='<div class="rating">';
            $content.='<span class="xem-chi-tiet">>>Xem chi tiết</span>';
            if (property_exists($item, 'da_ban')) {
                if((int)$item->da_ban>0){
                    $content.='<span class="star">Đã bán: <b>'.$item->da_ban.'</b></span>';
                    $content.='<img class="lazyload img-icon" data-srcset="'.$home_url.'/wp-content/plugins/qc_landingpage/frontend/src/media/check.png">';
                }
            }
            $content.='</div>';
            $content.='</a>';
            $content.='</li>';
        }
        $content.='</ul></div>';
        $content.='</div>';
        // $is_load_img=false;
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="<?php echo $is_goc?"index, follow":"index, nofollow" ?>, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo $post_infor->title; ?> | <?php echo $home_name; ?> </title>
    <meta name="description" content="<?php echo $post_infor->short_des; ?>">
    <link rel="canonical" href="<?php echo  $canonical;?>">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo $post_infor->title; ?>">
    <meta property="og:description"
        content="<?php echo $post_infor->short_des; ?>">
    <meta property="og:url" content="<?php echo  $current_url;?>">
    <meta property="og:site_name" content="<?php echo $home_name; ?>">
    <meta property="og:image"
        content="<?php echo $post_infor->thumnail; ?>">
    <meta property="og:image:width" content="640">
    <meta property="og:image:height" content="640">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="icon" href="<?php echo $common->header->icon_mini_url; ?>" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php echo $common->header->icon_mini_url; ?>">
    <meta name="msapplication-TileImage" content="<?php echo $common->header->icon_mini_url; ?>">
    <?php echo $schema; ?>
    <script defer="defer" src="<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/src/lazyload.js"></script>
    <link href="<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/home/style-home.css" rel="stylesheet">
    <?php
        // gg code header here
        echo $common->code_gg->code_header;
    ?>
</head>
<body style="background-color: #deb887;">
    <?php
        // gg code body here
        echo $common->code_gg->code_body;
    ?>
    <div id="root" style="overflow:hidden;">
        <header id="header" class="header header-wrapper">
            <div class="colorz header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-6 pd8">
                        <p class="zxs"><?php echo $common->header->chao_mung ?>
                        <?php if($common->header->chao_mung_url!=''){ ?> 
                        <a href="<?php echo $common->header->chao_mung_url ?>" class="text-bold">Xem ngay</a></p>
                        <?php } ?>
                        </div>
                        <div class="col-lg-3 hd992 pd8">
                            <p class="zxs tal-r">
                                <img src="<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/src/media/phone.svg" class="icon-headrez" >
                                Hotline: <?php echo $phone_show ?>
                            </p>
                        </div>
                        <div class="col-lg-3 hd992 pd8">
                            <p class="zxs cshv tal-r">
                                <img src="<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/src/media/user.svg" >
                                Đăng nhập/Đăng ký
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-main"
                style="background-image: url(<?php echo $common->header->background ?>);">
                <div class="icon-menu" id="menu-mb">
                    <img src="<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/src/media/menumb.svg" >
                </div>
                <div class="icon-cart">
                    <a href="#" style="text-decoration: none;">
                        <div class="wrap-icon-cart">
                            <img src="<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/src/media/cart.svg" >
                            <span class="gh">Giỏ hàng</span><span class="nuvbe">(0)</span>
                        </div>
                    </a>
                </div>
                <div class="container setz">
                    <div class="row">
                        <div class="col-12 col-lg-3 brz">
                            <div class="logo"><a href="<?php echo $current_url;?>"><img src="<?php echo $common->header->logo ?>" class="header-logo-dark" alt="<?php echo $home_name;?>"></a></div>
                        </div>
                        <div class="col-12 col-lg-6 seah">
                            <form>
                                <div class="input-group">
                                    <input type="search" name="s" placeholder="Tìm kiếm..."
                                        aria-describedby="button-addon5" class="form-control" autocomplete="off">
                                    <div class="input-group-append">
                                        <button id="button-addon5" type="submit" class="btn brs"
                                            style="background: rgb(255, 152, 0);">
                                            <img src="<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/src/media/search.svg" >
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="colorz header-bottom colorz">
                <div class="container wr-menu ">
                    <div id="set-menu" class="set-menu hide-menu">
                        <div class="menu">
                            <ul><?php echo $menu; ?></ul>
                        </div>
                        <div class="dimmer" id="dimmer"  onclick="hide_menu()"><span>x</span></div>
                    </div>
                </div>
            </div>
        </header>
        <main class="mainz">
            <section class="contents container">
                    <h1 class="title"><?php echo $post_infor->title; ?></h1>
                    <div class="long-des">
                        <?php 
                            if (property_exists($post_infor, 'long_des')) {
                                echo $post_infor->long_des;
                            }
                        ?>
                    </div>
            </section>
            <section class="container gt1 wrapcontentHome">
                <div class="sty">
                <?php if($post_infor->data_qc->data_trick->is_show){ ?>
                    <div class="mo-ta-ngan row">
                        <div class="col-12 col-md-4 col-xl-4">
                            <div id="cccx">
                                <img id="ccck" class="lazyload"
                                    src="<?php echo $post_infor->thumnail; ?>" width="100%">
                            </div>
                        </div>
                        <div class="col-12 col-md-8 col-xl-8">
                            <h3 class="tieude"><?php echo $post_infor->title; ?></h3>
                            <div>
                                <span class="prices" id="price_og"><?php echo number_format($post_infor->data_qc->data_trick->price, 0, '', '.'); ?> ₫</span>
                            </div>
                            <div class="mota-z"><?php echo $post_infor->short_des; ?></div>
                            <div><span class="namo">Kích thước :</span> <b style=" color: black; " id="ktz"><?php echo $post_infor->data_qc->data_trick->kt; ?></b></div>
                            <?php if(property_exists($post_infor, 'table_price')==true){
                                    if(count($post_infor->table_price->table)>0){
                            ?>
                            <div>
                                <?php
                                    $i=0;
                                    foreach($post_infor->table_price->table as $x){
                                        $i++;
                                ?>
                                 <button id="kt_<?php echo $i; ?>" class="btnz <?php echo $post_infor->data_qc->data_trick->kt==$x->type_title?"checked":""; ?>" onClick="set_kt({'kt':'<?php echo $x->type_title; ?>','g_og':<?php echo $x->og_price_title; ?>,'g_sale':<?php echo $x->sale_price_title; ?>},'<?php echo $i; ?>')" ><?php echo $x->type_title; ?>
                                 <span class="showpz">giá: <b><?php echo number_format($x->og_price_title, 0, '', '.'); ?>₫</b></span>
                                    <img src="<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/src/media/check.svg" class="img-check" />                                    
                                 </button>
                                <?php }?>
                            </div>
                            <?php }}?>
                            <div class="buttonzx">
                                <a href="?order=order"
                                    style="text-decoration: none;"
                                    rel="nofollow" onClick="localStorage.setItem('value',<?php echo (int)$gia_tri_chuyen_doi*(float)$common->gia_tri_chuyen_doi->order_percent; ?>)"
                                >
                                    <button id="order" class="ordery" >
                                        <span class="mh2">Mua sản phẩm này</span>
                                        <span style="font-size: 16px;">giá: <b
                                                style="color: #ffc107;font-weight:600;" id="pricez"><?php echo number_format($post_infor->data_qc->data_trick->sale, 0, '', '.'); ?> ₫</b></span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="wrap-list">
                        <?php echo  $content; ?>
                    </div>
                </div>
            </section>
        </main>
        <footer id="footerz">
            <div class="bg1">
                <img data-src="<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/src/media/footer_bg.svg" class="lazyload">
            </div>
            <div class="content-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="logoz">
                                <div class="icon-contact">
                                    <a href="<?php echo $current_url ?>"><img
                                            data-src="<?php echo $common->header->logo ?>"
                                            class="header-logo-dark lazyload" alt="cofa.vn"></a>
                                    <ul class="ulicon">
                                        <li class="bnb">
                                            <a>
                                                <img data-src="<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/src/media/fb.svg" class="lazyload"> 
                                            </a>
                                        </li>
                                        <li class="bnb">
                                            <a>
                                                <img data-src="<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/src/media/inta.svg" class="lazyload"> 
                                            </a>
                                        </li>
                                        <li class="bnb">
                                            <a>
                                                <img data-src="<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/src/media/youtube.svg" class="lazyload"> 
                                            </a>
                                        </li>
                                        <li class="bnb">
                                            <a>
                                                <img data-src="<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/src/media/ping.svg" class="lazyload"> 
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <p style="color: rgb(244, 235, 191); font-size: 14px; text-align: center;"><strong>Địa
                                        chỉ</strong> : <?php echo $common->lien_he->dia_chi;?></p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="aboutz">
                                <span class="titlez">Thông tin</span>
                                <ul class="listz">
                                <?php
                                    if(count($common->footer->about)>0){
                                        foreach($common->footer->about as $x){
                                            echo '<li><a href="'.$x->url.'" title="'.$x->name.'">'.$x->name.'</a></li>';
                                        }
                                    }
                                ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="aboutz">
                                <span class="titlez">CHÍNH SÁCH</span>
                                <ul class="listz">
                                <?php
                                    if(count($common->footer->privacy)>0){
                                        foreach($common->footer->privacy as $x){
                                            echo '<li><a href="'.$x->url.'" title="'.$x->name.'">'.$x->name.'</a></li>';
                                        }
                                    }
                                ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="aboutz">
                                <span class="titlez">TUYỂN DỤNG</span>
                                <ul class="listz">
                                <?php
                                    if(count($common->footer->job)>0){
                                        foreach($common->footer->job as $x){
                                            echo '<li><a href="'.$x->url.'" title="'.$x->name.'">'.$x->name.'</a></li>';
                                        }
                                    }
                                ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="sol textz">
                    <p style="margin: 0px;"><?php echo $common->footer->design_by ?></p>
                </div>
            </div>
            <div class="fixed-tool">
                <ul class="ulz">
                    <li><a id="cuoc-goi-2" href="tel:<?php echo $sdt;?>" rel="nofollow" onClick="window.value=<?php echo (int)$gia_tri_chuyen_doi*(float)$common->gia_tri_chuyen_doi->call_percent; ?>"><i class="icon-phone calzs"
                                style="background-image: url('<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/src/media/call.svg');"></i></a><span
                            class="aml-text-content aml-tooltiptext">Gọi ngay: <?php echo $phone_show; ?></span></li>
                    <li><a id="lien-he-zalo-1" target="_blank" href="https://zalo.me/<?php echo $zalo;?>" rel="nofollow" onClick="window.value=<?php echo (int)$gia_tri_chuyen_doi*(float)$common->gia_tri_chuyen_doi->zalo_percent; ?>"><i class="icon-zalo"
                                style="background-image: url('<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/src/media/zalo.svg');"></i></a><span
                            class="aml-text-content aml-tooltiptext">Chat với chúng tôi qua Zalo</span></li>
                    <li><a id="lien-he-fb" target="_blank" href="<?php echo $fb;?>" rel="nofollow" onClick="window.value=<?php echo (int)$gia_tri_chuyen_doi*(float)$common->gia_tri_chuyen_doi->fb_percent; ?>"><i class="icon-messenger"
                                style="background-image: url('<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/src/media/mess.svg');"></i></a><span
                            class="aml-text-content aml-tooltiptext">Facebook Messenger</span></li>
                </ul>
            </div>
        </footer>
    </div>
    <script src="<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/src/script-home.js"></script>
    <script type="text/javascript">
        window.data={
            img:"<?php echo $post_infor->thumnail;?>",
            title:"<?php echo $post_infor->title; ?>",
            size:"<?php echo $post_infor->data_qc->data_trick->kt; ?>",
            price:<?php echo $post_infor->data_qc->data_trick->sale; ?>,
            sl:1,
            url:"<?php echo $current_url; ?>"
        };
        localStorage.setItem("order_2",JSON.stringify(window.data));
    </script>
<script type="text/javascript"> document.addEventListener('copy', function(e){ e.preventDefault(); }); document.addEventListener('contextmenu', function(e){ e.preventDefault(); }); </script>
</body>

</html>