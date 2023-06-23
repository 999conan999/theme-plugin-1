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
    $content= $obj->post_content;//$metaA->canonical
    $canonical=$current_url;
    if($metaA->canonical!="") $canonical=$metaA->canonical;
    $sp=$metaA->data_lading_page->sp;
    $navbar=$metaA->data_lading_page->narbar;
    $date = getdate();
    $year=$date['year']+1;
    $home=site_url();
    
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
    <link rel="canonical" href="<?php echo $canonical; ?>">
    <link href="<?php echo $plugin_setup->icon_url_192; ?>" rel="shortcut icon" type="image/x-icon">
    <link href="<?php echo $plugin_setup->icon_url_192; ?>" rel="apple-touch-icon">
    <link href="<?php echo $plugin_setup->icon_url_192; ?>" rel="apple-touch-icon-precomposed">
    <link rel="stylesheet" charset="UTF-8" href="<?php echo $home_url; ?>/wp-content/plugins/zsharevn-landing-page/css01.css" />
    <script defer="defer" src="<?php echo $home_url; ?>/wp-content/plugins/zsharevn-landing-page/static/js/main.995b1559.js"></script>
    <link href="<?php echo $home_url; ?>/wp-content/plugins/zsharevn-landing-page/static/css/main.b7d1d42d.css" rel="stylesheet">
    <!-- all -->
    <?php echo $plugin_setup->code_header; ?>
    <?php echo $metaA->code_header; ?>
    <style type="text/css">
       <?php echo $plugin_setup->css_code; ?>
       <?php echo $metaA->code_css; ?>
       body{
        display: flex;
        flex-direction: column-reverse;
       }
    </style>
    <?php echo $metaA->schema_seo_result; ?>
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
        narbar:<?php echo json_encode($navbar); ?>,
        sp:<?php echo json_encode($sp); ?>,
        mr:{
          fb:'<?php echo $metaA->data_lading_page->mr->fb?>',
          zl:'<?php echo $metaA->data_lading_page->mr->zl?>',
          dt:'<?php echo $metaA->data_lading_page->mr->dt?>',
          ds:'<?php echo $metaA->data_lading_page->mr->ds?>'
        }
      };
      window.lock=false;
      window.home_url="<?php echo $home_url; ?>";
    </script>
    <script type="application/ld+json">
         {
         "@context": "http://schema.org/",
         "@type": "Product",
         "name": "<?php echo $metaA->data_lading_page->title_page; ?>",
         "image": "<?php echo $metaA->thumnail_post; ?>",
         "description": "<?php echo $metaA->data_lading_page->des_short_page; ?>",
         "url": "<?php echo $current_url; ?>",
         "sku": "<?php echo 'ABz'.$id; ?>",
         "brand": {
            "@type": "Brand",
            "name": "OEM"
         },
         "mpn": "AnBinh<?php echo 'ABz'.$id; ?>",
         "review": {
            "@type": "Review",
            "reviewRating": {
               "@type": "Rating",
               "ratingValue": "<?php echo rand(1,5); ?>",
               "bestRating": "5"
            },
            "author": {
               "@type": "Person",
               "name": "<?php echo $home; ?>"
            }
         },
         "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "reviewCount": "<?php echo rand(100,1000); ?>"
         },
         "offers": {
            "@type": "Offer",
            "url": "<?php echo $current_url; ?>",
            "priceCurrency": "VND",
            "price": "<?php echo (int)($metaA->data_lading_page->price_ads); ?>",
            "priceValidUntil": "<?php echo $year; ?>-12-23",
            "itemCondition": "https://schema.org/NewCondition",
            "availability": "https://schema.org/InStock",
            "seller": {
               "@type": "Organization",
               "name": "<?php echo $home; ?>"
            }
         }
         }
      </script>

  </head>
  <body>
    <!-- all -->
    <?php echo $plugin_setup->code_body; ?>
    <?php echo $metaA->code_body; ?>

    <?php  //var_dump($plugin_setup); ?>
    <?php //var_dump(($metaA)); ?>
    <div class="container">
      <div class="content">
          <?php echo $content; ?>
      </div>
    </div>
    <div id="root">
      <div class="cfir"><?php echo $plugin_setup->data_plugin->header_title; ?></div>
      <div class="container">
            <div class="row">
               <div class="col-2 col-sm-2"><span class="menuz"><svg fill="slategray" width="32px" height="32px"
                           xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                           <path
                                 d="M0 96C0 78.33 14.33 64 32 64H416C433.7 64 448 78.33 448 96C448 113.7 433.7 128 416 128H32C14.33 128 0 113.7 0 96zM0 256C0 238.3 14.33 224 32 224H416C433.7 224 448 238.3 448 256C448 273.7 433.7 288 416 288H32C14.33 288 0 273.7 0 256zM416 448H32C14.33 448 0 433.7 0 416C0 398.3 14.33 384 32 384H416C433.7 384 448 398.3 448 416C448 433.7 433.7 448 416 448z">
                           </path>
                        </svg></span>
               </div>
               <div class="col-8 col-sm-8 centerz"><img
                        src="<?php echo $plugin_setup->logo_url_1; ?>" width="200px"></div>
               <div class="col-2 col-sm-2"><span class="menuz"><svg fill="slategray" width="35px" height="35px"
                           xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                           <path
                                 d="M0 24C0 10.75 10.75 0 24 0H96C107.5 0 117.4 8.19 119.6 19.51L121.1 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24V24zM280 140C268.1 140 260 148.1 260 160C260 171 268.1 180 280 180H392C403 180 412 171 412 160C412 148.1 403 140 392 140H280zM224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464zM416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464z">
                           </path>
                        </svg></span>
               </div>
            </div>
      </div>
      <div class="bottom-header"></div>
      <div class="container">
         <div class="row">
            <h1 class="title-page"><?php echo $metaA->data_lading_page->title_page; ?></h1>
            <div class="hidenz"><ins><?php echo (int)($metaA->data_lading_page->price_ads); ?> đ</ins><span>Còn hàng</span></div>
            <div class="mo-ta"><?php echo $metaA->data_lading_page->des_short_page; ?></div>
         </div>
      </div>
      <div class="row mg-0">
         <div class="col-12 col-xl-12 col-xxl-1"></div>
         <div class="col-12 col-sm-12 col-md-7 col-lg-8 col-xl-8 col-xxl-7">
            <div class="row">
               <?php 
                  foreach ($sp as &$vl_sp) {
               ?>
                  <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                     <div class="wrap-card card-1" style="background-color: rgba(21, 152, 73, 0.42);">
                        <div class="tieu-de">
                              <h2 class="title-1"><?php echo $vl_sp->title; ?>
                              </h2>
                        </div>
                        <div class="danh-gia"><span>Đánh giá : <?php echo $vl_sp->danh_gia; ?></span></div>
                        <div class="slider-z">
                           <?php 
                              foreach ($vl_sp->hinh_anh as &$value) { ?>
                                 <p style="text-align: center; color: transparent; font-size: 12px; margin-bottom: 0px; height: 21px;"><?php echo $value->message; ?>
                                 - <?php echo $value->product_attributes; ?>
                                 </p>
                           <?php 
                              }
                           ?>
                           
                        </div>
                        <div class="accordion">
                              <div class="accordion-item">
                                 <h2 class="accordion-header"><button type="button" aria-expanded="false"
                                          class="accordion-button collapsed"> <a>* Thông tin sản phẩm</a></button></h2>
                                 <div class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                          <div class="table-x">
                                             <table class="table-z1" border="1">
                                                <tbody>
                                                   <?php
                                                      foreach ($vl_sp->thong_tin_sp as &$value) {
                                                   ?>
                                                      <tr class="tr-z1">
                                                         <td class="td-z1 f-2"><strong><?php echo $value->title ?></strong></td>
                                                         <td class="td-z2 f-8"><?php echo $value->des ?></td>
                                                      </tr>
                                                   <?php
                                                      }
                                                   ?>
                                                </tbody>
                                             </table>
                                          </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="accordion-item">
                                 <h2 class="accordion-header"><button type="button" aria-expanded="false"
                                          class="accordion-button collapsed"><a>* Bảng giá sản phẩm</a></button></h2>
                                 <div class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                          <div class="table-x">
                                             <table class="table-z1" border="1">
                                                <tbody>
                                                <?php
                                                      foreach ($vl_sp->bang_gia_sp as &$value) {
                                                   ?>
                                                      <tr class="tr-z1">
                                                         <td class="td-z1 f-2"><strong><?php echo $value->title ?></strong></td>
                                                         <td class="td-z2 f-8"><?php echo $value->price ?></td>
                                                      </tr>
                                                   <?php
                                                      }
                                                   ?>
                                                      <tr class="tr-z1">
                                                         <td class="td-z1"><strong>1mx2m</strong></td>
                                                         <td class="td-z2 fss">3.200.000 đ</td>
                                                         <td class="td-z2"><button class="btn btn-primary"
                                                                  style="background-color: rgb(255, 152, 38);">Mua</button>
                                                         </td>
                                                      </tr>
                                                      <tr class="tr-z1">
                                                         <td class="td-z1"><strong>1m2x2m</strong></td>
                                                         <td class="td-z2 fss">3.300.000 đ</td>
                                                         <td class="td-z2"><button class="btn btn-primary"
                                                                  style="background-color: rgb(255, 152, 38);">Mua</button>
                                                         </td>
                                                      </tr>
                                                      <tr class="tr-z1">
                                                         <td class="td-z1"><strong>1m4x2m</strong></td>
                                                         <td class="td-z2 fss">3.450.000 đ</td>
                                                         <td class="td-z2"><button class="btn btn-primary"
                                                                  style="background-color: rgb(255, 152, 38);">Mua</button>
                                                         </td>
                                                      </tr>
                                                      <tr class="tr-z1">
                                                         <td class="td-z1"><strong>1m6x2m</strong></td>
                                                         <td class="td-z2 fss">3.550.000 đ</td>
                                                         <td class="td-z2"><button class="btn btn-primary"
                                                                  style="background-color: rgb(255, 152, 38);">Mua</button>
                                                         </td>
                                                      </tr>
                                                      <tr class="tr-z1">
                                                         <td class="td-z1"><strong>1m8x2m</strong></td>
                                                         <td class="td-z2 fss">3.650.000 đ</td>
                                                         <td class="td-z2"><button class="btn btn-primary"
                                                                  style="background-color: rgb(255, 152, 38);">Mua</button>
                                                         </td>
                                                      </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="accordion-item">
                                 <h2 class="accordion-header"><button type="button" aria-expanded="false"
                                          class="accordion-button collapsed"><a>* Thanh toán</a></button></h2>
                                 <div class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                          <?php
                                             foreach ($vl_sp->thanh_toan as &$value) {
                                          ?>
                                             <p><?php echo $value ?></p>
                                          <?php
                                             }
                                          ?>
                                          <div><span class="thong-tin">Thông tin về chúng tôi 👉 <a href="#thong-tin">Thông tin cửa hàng.</a></span></div>
                                    </div>
                                 </div>
                              </div>
                        </div>
                     </div>
                  </div>
               <?php
                  }
               ?>
            </div>
         </div>
         <div id="thong-tin" class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
            <div class="wrap-tt container">
                  <div class="row sh">
                  </div>
                  <div class="container">
                     <div class="wrazz">
                        <div class="title-about"><?php echo $navbar->title;?></div>
                        <div><?php echo $navbar->des_show;?><span
                                 class="xxo">Xem thêm</span><br><span style="font-size: 14px; display: none;"><?php echo $navbar->des_hiden;?><br></span><span
                                 style="color: blue;">*Nhận giao hàng toàn quốc.</span></div>
                        <div>⭐⭐⭐⭐⭐ 4.8/5 - đánh giá</div>
                     </div>
                     <div>
                        <p class="textz"><strong>Địa chỉ:</strong> <?php echo $navbar->dia_chi;?></p>
                        <p class="textz"><strong>Các giờ:</strong><span style="color: rgb(24, 128, 56);"> <?php echo $navbar->cac_gio;?></span></p>
                        <p class="textz"><strong>Điện thoại:</strong><a href="tel:<?php echo $plugin_setup->footer_setup->hotline; ?>" target="_blank" class="nbp">
                        <?php echo $plugin_setup->footer_setup->hotline; ?></a></p>
                        <p class="textz"><strong>Trạng thái hiện tại:</strong> <?php echo $navbar->trang_thai_hien_tai;?></span></p>
                        <p class="textz"><strong>Ngày thành lập:</strong> <?php echo $navbar->ngay_thanh_lap;?></p>
                        <p class="textz"><strong>Người đại diện:</strong> <?php echo $navbar->nguoi_dai_dien;?></p>
                        <p class="textz"><strong>Số tài khoản ngân hàng: </strong><?php echo $navbar->stk;?></p>
                        <div>
                              <p class="textz"><strong>Liên hệ:</strong></p>
                              <div style="text-align: center;"><a href="<?php echo $plugin_setup->footer_setup->url_zalo; ?>" target="_blank"
                                    class="icon-contact"><img
                                          src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IB2cksfwAAAAlwSFlzAAALEwAACxMBAJqcGAAAB/JJREFUeJzNmnlsFFUcx2e3Frut5dAqeMVbIKhoNEZEMUGNR7wS4x8GSkpF6UEprRxFQVrAGiEK4olIUOSMAsolh7UUEY8SQKC0WHZ7LN1ld9u9r87uzM/fr49lp7uz213adPgmvzDdeW/e7/Pe7733ezNwXJKqra1VmUymIW63e6zT6Vzo9/t3BQKBE6IoNgDAf2hatCa0VrQ2NCOaGa0dzYbmwLIutA6sZ+B5vi4YDG7Ff2c5HI4xBoNxqF6vVyXrV8IyGAwqi839hMfj2YINn0NHBOhj4TNFfLYFoVZjJ93fpwBvr2lSP7LYPa5yd3AfH+xr1+MLR3sfjtJ4s9ms7hXE1SVBTUZRcO6TywSvzdO/ECHhIHkxBMttNtvAS4K4rcx9jTpf3DG4BIL155WBkEhAmEPt7e0jk4J4vNL6YnpRsCW1EGBTrdIMYdH88Xq9zyYEMXw+n5UxXWjl8gCe/wygs5/nRU8SBEGLC0FWXIjBM3gNhtNOgkgpAKgzKO22vBCm2uVyDZKFKF1vU2umCXMQIkggr65U2t24ojmzQKfTRa9moxd2jk0rEt0EcQWOxv56pX2NLxwVJy7Nj0WBaIrEjQRBNmYJbr9epV3tWThXjtbU1IRHZdCM4B0IIIZAFuxQ2sXEZbFYxlwEySwWloQgyPbWKe1e4sLleFUXxLBZgTRcoRqkIBaX0u4lLpz0xqampiwutUC8E533hiBGlCvtWnLCFAbsdvt4LqMo8IZ0NHLXKu1a8sLkcjanLhA/l4Is3S9f2McD6G09m6czOSdOG9nGG+zFoQDDazOHzm+Xgqz9S77w7lMAg0p6tm3Hk3NiwDTWrq0Xyz2CHCGQWinIrpPyhfeeBhg2R96uvODM1W8DmJyKgOg5VR5opSDVZ+QLuzFkGs3R9huWHzobIK0I4NPq7nX8AYCDjWyUd5zAs64b4LyDhZPDFx/kPxOrt/IgttHAnhVLOOHNNCKtUpA/tIn3BDnz0AcAqnyAd37ufq8GT++3vht+LhmF3p3z2fXmI/IgBDt1PaZJhd3rUr2/mmKCOAjknLTCobOJQdDkfGs9q/PMCkz3JT32pw7ghjkM8FFMd0p+wCT0a3Ra4pwcCK6kkPMd+3tIKcCU7wFmbgF48AP2223zAE62yYL4CcQoBalqSAxk3d9sbtDDW63h3+lc//pq9qw316GDnvDvX/8OkFoYG+SYnh0frp0JsO80AyOZcYN++UtWrnCjrDsigZikIImsOkdaADKmA6SjHWvtfq+lAxeA2SyDtkac82nUXvoiNsji3eyaRiFSNGfo3qgKWZcEArFIQb75Iz4E9f6ohQBqDJtVh6Lvn8HzvQYnftZM+fp5G1g7m2RAijaz62VV0fVof6J7N5bJPpYnEKsUZP722BCUg437iJWjRuU2MVp+R5azMsf10fUfeD/2iFDH0PVrq7rPOdKeOnZv7FJZ13wEYpeCUCzKieI19/vwecXLxy43awsrd98iFvckivOJa3ABiDPZDXYWrjSPyneybIJ0WMtWQFo8KvfINushEJcU5NpZGHBidMn1/4TL0CTPKJa3jbWs55/+JFx+cCkLRbpW5cdffmnvyJzBfqMQJX+66qG98hUepvyyIE7aEB1SEDKtJbokhVJP6QmtNod1rDzB0MiMrGC9TLE96Vu2ZFMGsPUYKzd8AasbAqFw/QkXnKeWs3rUAXe9B1C2Le7ub6cRaYsECfWWVBT7Z83xrak9vGSS6JrqnTGxRSIgsElLHeW60LNtdlY3MgroPtU7hQml0dH9uTKyEkh9JAhtRHLhdbkKN0QLgfwTCXLLOwDnbEq7l7gQpJHDybcnEoRszWGl3UtcCFJFIMvlQO5/v3eHnf6UIAiruQGFQrYcCNmPR5V2MTF1dnYWc0NL/feo80VeDuT2edH50mUo3ufzjeaGzODTMLzqYo1K/gal/exR9TzPa7rebQ0oFCtigdCmFO90prTwmPvhxTeNN5fxIzjJK9NIs1/G74E7OjrCr0xJKQXiajmIm+Yq7Wps4dw4UF9f3/3TQto0cRTmNeZIEMpCL0fh3mH3eDwPR31WmPiVXZU5XXiXu/Chh+zBSkwrfeHKVrcA+0/5oGyTDc5Zlfsm5/ILQvN5z8LGxkb5/1iQVUqf3uDnEMgLnwagYqsdStZZYXzlebi+UA8p2c3ATWiGoQV6WLHXiUlg/yVlAey7X/71wrhFxl3PLj6bKQsh+cQwMKVAkkjm2rscj2XX5eth0TY7nNTzeNjqeygBswudOQBralwweq6B2jyintisiQsREi7HD3RLJidb48KQXfVGKzy3xAQf/+KA3xv84PBeen7jD4hwopWHb6pdkP2lBYbh6FMbV2Q3n0EbnRDEReXBlbhR/nBxziQAIzXVxGa4t6wNcla2w5KdDvj2oBu2H/VCVZ0PDtT7u6z6tA92H/fChsNuWL7HCdO/64BHy42QPrkl8nm8akLzj3cU665JDuKCbpgdSB9YLMzDU6SByxOBy+lICqYvDMPIjBB52DEDLgkipOeXuVQp+XA3jspH3FQhwOW09xeEgBCrNDm6e3sFICdNkXBLSn6wjJtkPIQNdaCJfek89ro/dVLz2eum6j7Pekt7d58DRGlCixobvh7tBbQKtLVoVWgn0Zl27EmBehQtgOZDc6EF6W+850Qz4XUjhszx1OymX7HO0oG52imZubrhw0u06Zfi0v+rJ9CZhZ33lgAAAABJRU5ErkJggg=="><br>Zalo</a><a
                                    href="<?php echo $plugin_setup->footer_setup->url_fb; ?>" target="_blank" class="icon-contact"><img
                                          src="data:image/png;base64,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"><br>Facebook</a><a
                                    href="tel:<?php echo $plugin_setup->footer_setup->hotline; ?>" class="icon-contact" target="_blank" style="width: 92px;"><img
                                          src="data:image/png;base64,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">Điện
                                    thoại</a></div>
                        </div>
                        <div>
                              <p class="textz"><strong>Google map:</strong></p>
                              <div class="mapz"><a href="<?php echo $navbar->google_map;?>" target="_blank">google map - định vị</div>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>
      <div class="cfir" style="margin-top: 100px;"><?php echo $plugin_setup->footer_setup->design_by; ?></div>
    </div>    
    <!-- all -->
    <?php echo $plugin_setup->code_footer; ?>
    <?php echo $metaA->code_footer; ?>
  </body>
</html>
