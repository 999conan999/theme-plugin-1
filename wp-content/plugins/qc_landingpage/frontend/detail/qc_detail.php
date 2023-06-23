<?php
        $thumthum='';
        $is_show_km=false;
        $dm_param=$_GET['dm'];
        $dt_param=$_GET['dt'];
        if (property_exists($post_infor, 'thumnail_dt')){
            if (property_exists($post_infor->thumnail_dt, $dm_param . '_' . $dt_param)){
                $thumthum=$post_infor->thumnail_dt->{$dm_param . '_' . $dt_param};
            }else{
                $thumthum=$post_infor->thumnail;
            }
        }else{
            $thumthum=$post_infor->thumnail;
        }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="<?php echo $is_goc?"index,follow":"noindex, nofollow" ?>, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo $post_infor->title; ?> | <?php echo $home_name; ?> </title>
    <meta name="description" content="<?php echo $post_infor->short_des; ?>">
    <link rel="canonical" href="<?php echo  $canonical;?>">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo $post_infor->title; ?>">
    <meta property="og:description" content="<?php echo $post_infor->short_des; ?>">
    <meta property="og:url" content="<?php echo  $current_url;?>">
    <meta property="og:site_name" content="<?php echo $home_name; ?>">
    <meta property="og:image" content="<?php echo $thumthum; ?>">
    <meta property="og:image:width" content="640">
    <meta property="og:image:height" content="640">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="icon" href="<?php echo $common->header->icon_mini_url; ?>" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php echo $common->header->icon_mini_url; ?>">
    <meta name="msapplication-TileImage" content="<?php echo $common->header->icon_mini_url; ?>">
    <script defer="defer" src="<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/src/lazyload.js"></script>
    <link href="<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/detail/style-detail.css" rel="stylesheet">

    <?php
        // gg code header here
        echo $common->code_gg->code_header;
    ?>
</head>
<body>
    <?php
        // gg code body here
        echo $common->code_gg->code_body;
        // $bwm=$dm_param.'_'.$dt_param;
        foreach($post_infor->data_qc->dm as $dm){
                if($dm->id==$dm_param){
                    foreach($dm->list_sp as $list_sp){
                        if($list_sp->id==$dt_param){
                            if (property_exists($list_sp, 'km')) {
                                if($list_sp->km->is_km){
                                    $is_show_km=true;
                                }else{
                                    $is_show_km=false;
                                }
                            }else{
                                $is_show_km=false;
                            }
        ?>
    <div class="container bbz">
        <header id="header" class="header row" index="<?php echo $home_url; ?>">
            <div class="col-2 backz">
                <a href="<?php echo $current_url; ?>">
                    Quay lại
                </a>
            </div>
            <div class="col-8 titlez">
                <a href="<?php echo $current_url; ?>" style=" color: white; text-decoration: none; "><span><?php echo $list_sp->title; ?></span></a>
            </div>
        </header>
        <main>
            <?php
            $v=0;$img_km='';
                foreach($list_sp->img_list as $img_list){
                    $v++;
                    $data_count=get_infor_by_id_comment($img_list->id);   
                    if($v===1) $img_km =$img_list->img; 
            ?>
            <div class="wrapz">
                <div class="danhdev-product"  id="id_<?php echo $v; ?>">
                    <img class="imgz lazyload <?php if (stripos($img_list->img, "gif") == false) {echo 'zz';} ?>"
                        data-srcset="<?php echo  $img_list->img; ?>"
                        onClick='navigator.clipboard.writeText("<?php echo $parent_url."?dm=".$dm_param."&dt=".$dt_param."#id_".$v; ?>")'
                        width="100%">
                </div>
                <div class="wrap-contents" >
                    <div class="textz">
                    <?php 
                        if($img_list->price_og!=0&&$img_list->price_og!=''){
                           if($list_sp->price!=0&&$list_sp->price!=""){
                        ?>
                            <p>Giá: <b style="color:#2196f3;" id="price_og_<?php echo $v; ?>"><?php echo number_format($img_list->price_og,0,'.','.'); ?> ₫</b></p>
                        <?php 
                        }
                        else{
                            ?>
                            <p>Giá: <b style="color:#2196f3;" id="price_og_<?php echo $v; ?>">Liên hệ</b></p>
                            <?php
                        }
                    }  
                        if($img_list->kt!=''){
                        ?>
                            <p><?php echo $list_sp->table_price->type_title; ?>: <b style="color:#2196f3;" id="ktz_<?php echo $v; ?>"><?php echo $img_list->kt; ?></b></p>
                        <?php }
                            echo $img_list->mt;
                        ?>
                    </div>
                    <?php
                        if($img_list->is_show_btn_buy==true){
                    ?>
                    <!--  -->
                    <?php if(property_exists($list_sp, 'table_price')==true){
                    if(count($list_sp->table_price->table)>0){
                            ?>
                    <div style="margin-top:12px;">
                        <?php
                        if($list_sp->price!=0&&$list_sp->price!=""){
                            $i=0;
                            foreach($list_sp->table_price->table as $x){
                                $i++;
                        ?>
                            <button id="kt_<?php echo $v; ?>_<?php echo $i; ?>" class="btnz xxx_<?php echo $v; ?> <?php echo $img_list->kt==$x->type_title?"checked":""; ?>" onClick="set_kt({'kt':'<?php echo $x->type_title; ?>','g_og':<?php echo $x->og_price_title; ?>,'g_sale':<?php echo $x->sale_price_title; ?>},'<?php echo $v; ?>','<?php echo $i; ?>')" ><?php echo $x->type_title; ?>
                            <span class="showpz">giá: <b><?php echo number_format($x->og_price_title, 0, '', '.'); ?>₫</b></span>
                            <img src="<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/src/media/check.svg" class="img-check" />
                            </button>
                        <?php }}?>
                    </div>
                    <?php }}?>
                    <!--  -->
                    <div class="orderz row">
                        <div class="col-5 pdr-3">
                            <a id="lien-he-zalo-2" rel="nofollow" target="_blank"  class="lhzl" href="https://zalo.me/<?php echo $zalo; ?>" onClick="window.value=<?php echo (int)$list_sp->rate*(float)$common->gia_tri_chuyen_doi->zalo_percent; ?>">
                                <span class="lh1">Liên hệ zalo</span>
                                <span style=" font-size: 15px; ">Đặt theo yêu cầu</span>
                            </a>
                        </div>
                        <div class="col-5">
                            <?php 
                                $price=0;
                                if($list_sp->price!=0&&$list_sp->price!=""){
                                    $price=$img_list->price_sale;
                                }   
                            ?>
                            <a href="<?php echo $current_url; ?>?order=order" style="text-decoration: none;"
                            data='{"img":"<?php echo $img_list->img; ?>","title":"<?php echo $list_sp->title; ?>","size":"<?php echo $img_list->kt; ?>","price":"<?php echo $price; ?>","sl":"1","url":"<?php echo $parent_url."?dm=".$dm_param."&dt=".$dt_param."#id_".$v; ?>"}'
                            id="buy_<?php echo $v;?>"
                            onclick="setdata('buy_<?php echo $v;?>');localStorage.setItem('value',<?php echo (int)$list_sp->rate*(float)$common->gia_tri_chuyen_doi->order_percent; ?>);"
                            >
                                <button id="order" class="ordery" >
                                    <span class="mh2">Mua sản phẩm này</span>
                                    <span style=" font-size: 16px; ">giá: <b style="color: #ffc107;"  id="price_sale_<?php echo $v; ?>">
                                    <?php if($list_sp->price!=0&&$list_sp->price!=""){ ?>
                                        <?php echo number_format($img_list->price_sale,0,'.','.'); ?> đ
                                        <?php }else{ ?> Liên hệ <?php }?>
                                </b></span>
                                </button>
                            </a>
                        </div>
                        <div class="divz"></div>
                    </div>
                    <?php } ?>
                    <div class="shiperx">
                        <?php echo $img_list->dv; ?>
                    </div>
                    <div class="divz"></div>
                    <div class="row">
                        <div class="col-3 bnb">
                            <div class="iconx likez" data="<?php echo $img_list->id; ?>">
                                <img class="lazyload luna" data-srcset="<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/src/media/like.svg">
                                <div class="btc">Thích(<span><?php echo $data_count?$data_count->like:0 ?></span>)</div>
                            </div>
                        </div>
                        <div class="col-4 bnb">
                            <div class="iconx bl_btn" data="<?php echo $img_list->id; ?>" index="<?php echo $img_list->id; ?>">
                                <img class="lazyload luna" data-srcset="<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/src/media/ms.svg">
                                
                                <div class="btc"> Bình
                                    luận(<span id="bnt_bl_<?php echo $img_list->id; ?>"><?php echo $data_count?$data_count->comment:0 ?></span>)
                                    <?php
                                        $anime=false;
                                        if($v==1){
                                            if($data_count){
                                                if((int)$data_count->comment>0){
                                                    echo '<span class="anime dis-none">'.$data_count->comment.'</span>';
                                                }
                                            }  
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 bnb">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $current_url.'?dm='.$dm_param.'&dt='.$dt_param; ?>" target="_blank" rel="nofollow">
                                <div class="iconx sharez" data="<?php echo $img_list->id; ?>">
                                    <img class="lazyload luna" data-srcset="<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/src/media/share.svg">
                                    <div class="btc"> Chia
                                        sẻ(<span><?php echo $data_count?$data_count->share:0 ?></span>)</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="divz bnb" style="margin-top: 0px;"></div>
                    <div id="comment_<?php echo $img_list->id; ?>" class="people" style="display: none;">
                        <span class="dong anBinhLuan" data="<?php echo $img_list->id; ?>">Đóng</span>
                        <div class="wpc">
                            <div id="loading_<?php echo $img_list->id; ?>" class="comment">
                                <div class="w-rap">
                                    <div class="dotz dotz1"></div>
                                    <div class="dotz dotz2"></div>
                                    <div class="dotz dotz3"></div>
                                </div>
                            </div>
                            <div id="noComment_<?php echo $img_list->id; ?>" class="comment" style="display: none;">
                                <div style=" text-align: center; ">Chưa có bình luận.</div>
                            </div>
                            <div id="showrs_<?php echo $img_list->id; ?>" class="comment"></div>
                            <div style=" margin-bottom: 7px;text-align: right;">
                                <span class="more-bl" id="more_<?php echo $img_list->id; ?>" data="<?php echo $img_list->id; ?>" index="0" style="display: block;"
                                >Xem thêm bình luận</span>
                            </div>
                        </div>
                        <div class="wpc" style=" padding-top: 1px; ">
                            <div class="write-cm">
                                <div id="write_comment_input_<?php echo $img_list->id; ?>" class="row" style="display: none;    padding: 5px;">
                                    <div class="col-10">
                                        <textarea id="rs_comment_<?php echo $img_list->id; ?>" cols="45" rows="3" class="text-cm" minlength="10"
                                            required="" placeholder="Mời bạn chia sẻ thêm một số cảm nhận..."
                                            aria-required="true"></textarea>
                                    </div>
                                    <div class="col-5">
                                        <input id="author_<?php echo $img_list->id; ?>" class="dot" type="text" value="" size="30"
                                            autocomplete="off" required="" placeholder="Họ tên (bắt buộc)"
                                            aria-required="true">
                                    </div>
                                    <div class="col-5 op">
                                        <input id="phone_<?php echo $img_list->id; ?>" class="dot" type="number" value="" size="30"
                                            autocomplete="off" required="" placeholder="Số điện thoại (bắt buộc)"
                                            aria-required="true">
                                    </div>
                                    <div class="col-10">
                                        <button class="sendbl" data="<?php echo $img_list->id; ?>" url_ref="<?php echo $current_url.'?dm='.$dm_param.'&dt='.$dt_param.'#id_'.$v; ?>">Gửi bình luận</button>
                                    </div>
                                    
                                </div>
                            </div>
                            <b class="vietBinhLuan" data="<?php echo $img_list->id; ?>" id="vbl_<?php echo $img_list->id; ?>">Viết bình luận:</b>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
                if($is_show_km){
                require_once($_path_qc.'/frontend/khuyen_mai/khuyen_mai.php');
                }
            ?>
        </main>
    </div>
    <?php
                break;
                }
            }
            break;
        }
    }
    ?>
 
    <script type="text/javascript" src="<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/src/jquery.js"></script>
    <script type="text/javascript" src="<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/src/script-detail.js"></script>
    <script type="text/javascript" src="<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/src/js-detail.js"></script>
    <?php if($is_show_km){ ?>
    <script type="text/javascript">
        window.data_km='<?php echo json_encode($list_sp->km->data_km);?>';
        window.timer_run=<?php echo $list_sp->km->timer_run->amp;?>;
        window.timer_lock=<?php echo $list_sp->km->timer_lock->amp;?>;
    </script>
    <script type="text/javascript" src="<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/khuyen_mai/khuyen_mai.js"></script>
    <link href="<?php echo $home_url?>/wp-content/plugins/qc_landingpage/frontend/khuyen_mai/khuyen_mai.css" rel="stylesheet">
    <?php } ?>
</body>

</html>