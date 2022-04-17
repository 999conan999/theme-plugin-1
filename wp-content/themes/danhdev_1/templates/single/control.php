<?php
    $obj=get_queried_object();
    $id=$obj->ID;
    $metaA=json_decode(get_post_meta($id,'metaA', true));
    $home_url=get_home_url();
    $current_url=get_permalink($id);
    $thumnail_url=get_post_meta($id,'thumnail_url', true);
    $template_selected=$metaA->template_selected;

    if($template_selected==0){
        $content=$obj->post_content;
        // img lazyload
        preg_match_all('/<img(.*)\/\>/', $content,$list_img,PREG_PATTERN_ORDER); 
        foreach($list_img[0] as $img_tag){
            $img_2=str_replace(' src=',' src="'.get_stylesheet_directory_uri().'/templates/assets/img/holder-content.png" style="width:auto;" data-src=',$img_tag);
            $content=str_replace($img_tag,$img_2,$content);
        }
        // muc luc
        preg_match_all('/<h2>(.*)<\/h2>/', $content, $h2_content_arr);
        $muc_luc='';
        if(count($h2_content_arr)>0){
            $muc_luc.='<div class="widget"> <div class="widget-1"> <div id="ftwp-widget-container"> <div id="ftwp-container" class="ftwp-wrap ftwp-middle-right ftwp-minimize"><button type="button" id="ftwp-trigger" class="ftwp-shape-round ftwp-border-medium" title="click To Maximize The Table Of Contents" style=""><span class="ftwp-trigger-icon ftwp-icon-number"></span></button> <nav id="ftwp-contents" class="ftwp-shape-square ftwp-border-none" style="height: auto;"> <header id="ftwp-header"> <h3 id="ftwp-header-title">MỤC LỤC BÀI VIẾT</h3> </header> <ol id="ftwp-list" class="ftwp-liststyle-decimal ftwp-effect-bounce-to-right ftwp-list-nest ftwp-strong-first ftwp-colexp ftwp-colexp-icon" style="">';
            $ii=0;
            foreach ($h2_content_arr[1] as &$h2_content) {
                $ii++;
                $trip_h2=strip_tags ( $h2_content);
                $value1=fixForUri($trip_h2);
                $url_ao_0=str_replace(".","",$value1);
                $url_ao_1=str_replace("  ","",$url_ao_0);
                $url_ao_2=str_replace(" ","_",$url_ao_1);
                $content=str_replace('<h2>'.$h2_content.'</h2>','<h2 id="'.$url_ao_2.'">'.$ii.'. '.$h2_content.'</h2>',$content);
                $muc_luc .='<li class="ftwp-item"><a class="ftwp-anchor" href="#'.$url_ao_2.'"><span class="ftwp-text">'.$trip_h2.'</span></a></li>';
            }
            $muc_luc.='</ol></nav></div></div></div></div>';
        }
        // get category and post
        $category_data=fs_get_category_and_post_by_id_post($id);
        $list_post_footer=get_posts_list_footer_post(5,0);
    }elseif($template_selected==1){
    }

?>