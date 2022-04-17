<?php
    $home_setup= fs_get_data_theme('home_setup');
    // var_dump($home_setup);
    $data_setup= fs_get_data_theme('data_setup');
    // var_dump($data_setup);
    $home_url=get_home_url();
    if(($home_setup)!='null'){
            
            // tab_2*****************
            $tab_2=$home_setup->tab_2;
        if($tab_2->is_show){    
            $id_cate=isset($tab_2->cate_id_tab_2)&&$tab_2->cate_id_tab_2!=''?$tab_2->cate_id_tab_2:0;
            $data_tab_2=fs_get_post_by_category_id($id_cate,5);
            // post 1 tab 2            
            $post_1_tab_2='';
            
            if(isset($tab_2->post_id_1_tab_2)&&$tab_2->post_id_1_tab_2!=''){
                $z= fs_get_info_post_card((int)($tab_2->post_id_1_tab_2));
                $metaA=json_decode(get_post_meta($z->id,'metaA', true));
                $description=mb_substr($metaA->descriptions,0,200, "utf-8").'...';
                $post_1_tab_2.='<div class="w-dyn-list"><div role="list" class="w-dyn-items"><div role="listitem" class="w-dyn-item"><div data-bg="'.$z->thumnail_url.'" style="background-color: rgba(0, 145, 255, 0.2);  background-image: url('.$z->thumnail_url.');" class="newposts-featimg rocket-lazyload entered lazyload" data-ll-status="load"> <a target="_blank" href="'.$z->post_url.'" class="link-block w-inline-block"  data-wpel-link="internal"></a> </div> <div class="div-block-15"> </div><a target="_blank" href="'.$z->post_url.'" class="w-inline-block" data-wpel-link="internal"> <h3 class="h3-newpost-title">'.$z->post_title.'</h3> </a><div> <p  class="newposts-featured-paragraph" style=" color: #838383; font-size: 16px; ">'.$description.'</p> </div> </div> </div> </div>';
                
            }elseif(count($data_tab_2->list_posts)>0){
                $z= $data_tab_2->list_posts[0];
                $metaA=json_decode(get_post_meta($z->id,'metaA', true));
                $description=mb_substr($metaA->descriptions,0,200, "utf-8").'...';
                $post_1_tab_2.='<div class="w-dyn-list"><div role="list" class="w-dyn-items"><div role="listitem" class="w-dyn-item"><div data-bg="'.$z->thumnail_url.'" style="background-color: rgba(0, 145, 255, 0.2);  background-image: url('.$z->thumnail_url.');" class="newposts-featimg rocket-lazyload entered lazyload" data-ll-status="load"> <a target="_blank" href="'.$z->post_url.'" class="link-block w-inline-block"  data-wpel-link="internal"></a> </div> <div class="div-block-15"> </div><a target="_blank" href="'.$z->post_url.'" class="w-inline-block" data-wpel-link="internal"> <h3 class="h3-newpost-title">'.$z->post_title.'</h3> </a><div> <p  class="newposts-featured-paragraph" style=" color: #838383; font-size: 16px; ">'.$description.'</p> </div> </div> </div> </div>';
            }
            //post 2 tab 2
            $post_2_tab_2='';
            if(isset($tab_2->post_id_2_tab_2)&&$tab_2->post_id_2_tab_2!=''){
                $z= fs_get_info_post_card((int)($tab_2->post_id_2_tab_2));
                $post_2_tab_2.='<div role="listitem" class="w-dyn-item">
                    <div class="secondary-newpost-cont"> <a href="'.$z->post_url.'" class="" target="_blank"><img  width="250" height="180" data-src="'.$z->thumnail_url.'" class="attachment-size250 size-size250 wp-post-image entered lazyload" alt="'.$z->post_title.'"  data-ll-status="loaded"><noscript><img width="250" height="180" src="'.$z->thumnail_url.'" class="attachment-size250 size-size250 wp-post-image" alt="'.$z->post_title.'" /></noscript></a> <div class="div-block-39"> <a href="'.$z->post_url.'" class="w-inline-block" data-wpel-link="internal"  target="_blank"> <h4 class="h4-newpost-titles">'.$z->post_title.'</h4> <div class="div-block-15"> <div style="background-color:#eeee22" class="div-block-16"></div> <div class="category-text-sm">'.$data_tab_2->category_name.'</div> </div> </a> </div> </div> </div>';
                
            }elseif(count($data_tab_2->list_posts)>1){
                $z= $data_tab_2->list_posts[1];
                $post_2_tab_2.='<div role="listitem" class="w-dyn-item">
                    <div class="secondary-newpost-cont"> <a href="'.$z->post_url.'" class="" target="_blank"><img  width="250" height="180" data-src="'.$z->thumnail_url.'" class="attachment-size250 size-size250 wp-post-image entered lazyload" alt="'.$z->post_title.'"  data-ll-status="loaded"><noscript><img width="250" height="180" src="'.$z->thumnail_url.'" class="attachment-size250 size-size250 wp-post-image" alt="'.$z->post_title.'" /></noscript></a> <div class="div-block-39"> <a href="'.$z->post_url.'" class="w-inline-block" data-wpel-link="internal"  target="_blank"> <h4 class="h4-newpost-titles">'.$z->post_title.'</h4> <div class="div-block-15"> <div style="background-color:#eeee22" class="div-block-16"></div> <div class="category-text-sm">'.$data_tab_2->category_name.'</div> </div> </a> </div> </div> </div>';
            }
            //post 3 tab 2
            $post_3_tab_2='';
            if(isset($tab_2->post_id_3_tab_2)&&$tab_2->post_id_3_tab_2!=''){
                $z= fs_get_info_post_card((int)($tab_2->post_id_3_tab_2));
                $post_3_tab_2.='<div role="listitem" class="w-dyn-item">
                    <div class="secondary-newpost-cont"> <a href="'.$z->post_url.'" class="" target="_blank"><img  width="250" height="180" data-src="'.$z->thumnail_url.'" class="attachment-size250 size-size250 wp-post-image entered lazyload" alt="'.$z->post_title.'"  data-ll-status="loaded"><noscript><img width="250" height="180" src="'.$z->thumnail_url.'" class="attachment-size250 size-size250 wp-post-image" alt="'.$z->post_title.'" /></noscript></a> <div class="div-block-39"> <a href="'.$z->post_url.'" class="w-inline-block" data-wpel-link="internal"  target="_blank"> <h4 class="h4-newpost-titles">'.$z->post_title.'</h4> <div class="div-block-15"> <div style="background-color:#eeee22" class="div-block-16"></div> <div class="category-text-sm">'.$data_tab_2->category_name.'</div> </div> </a> </div> </div> </div>';
                
            }elseif(count($data_tab_2->list_posts)>2){
                $z= $data_tab_2->list_posts[2];
                $post_3_tab_2.='<div role="listitem" class="w-dyn-item">
                    <div class="secondary-newpost-cont"> <a href="'.$z->post_url.'" class="" target="_blank"><img  width="250" height="180" data-src="'.$z->thumnail_url.'" class="attachment-size250 size-size250 wp-post-image entered lazyload" alt="'.$z->post_title.'"  data-ll-status="loaded"><noscript><img width="250" height="180" src="'.$z->thumnail_url.'" class="attachment-size250 size-size250 wp-post-image" alt="'.$z->post_title.'" /></noscript></a> <div class="div-block-39"> <a href="'.$z->post_url.'" class="w-inline-block" data-wpel-link="internal"  target="_blank"> <h4 class="h4-newpost-titles">'.$z->post_title.'</h4> <div class="div-block-15"> <div style="background-color:#eeee22" class="div-block-16"></div> <div class="category-text-sm">'.$data_tab_2->category_name.'</div> </div> </a> </div> </div> </div>';
            }
            //post 4 tab 2
            $post_4_tab_2='';
            if(isset($tab_2->post_id_4_tab_2)&&$tab_2->post_id_4_tab_2!=''){
                $z= fs_get_info_post_card((int)($tab_2->post_id_4_tab_2));
                $post_4_tab_2.='<div role="listitem" class="w-dyn-item">
                    <div class="secondary-newpost-cont"> <a href="'.$z->post_url.'" class="" target="_blank"><img  width="250" height="180" data-src="'.$z->thumnail_url.'" class="attachment-size250 size-size250 wp-post-image entered lazyload" alt="'.$z->post_title.'"  data-ll-status="loaded"><noscript><img width="250" height="180" src="'.$z->thumnail_url.'" class="attachment-size250 size-size250 wp-post-image" alt="'.$z->post_title.'" /></noscript></a> <div class="div-block-39"> <a href="'.$z->post_url.'" class="w-inline-block" data-wpel-link="internal"  target="_blank"> <h4 class="h4-newpost-titles">'.$z->post_title.'</h4> <div class="div-block-15"> <div style="background-color:#eeee22" class="div-block-16"></div> <div class="category-text-sm">'.$data_tab_2->category_name.'</div> </div> </a> </div> </div> </div>';
                
            }elseif(count($data_tab_2->list_posts)>3){
                $z= $data_tab_2->list_posts[3];
                $post_4_tab_2.='<div role="listitem" class="w-dyn-item">
                    <div class="secondary-newpost-cont"> <a href="'.$z->post_url.'" class="" target="_blank"><img  width="250" height="180" data-src="'.$z->thumnail_url.'" class="attachment-size250 size-size250 wp-post-image entered lazyload" alt="'.$z->post_title.'"  data-ll-status="loaded"><noscript><img width="250" height="180" src="'.$z->thumnail_url.'" class="attachment-size250 size-size250 wp-post-image" alt="'.$z->post_title.'" /></noscript></a> <div class="div-block-39"> <a href="'.$z->post_url.'" class="w-inline-block" data-wpel-link="internal"  target="_blank"> <h4 class="h4-newpost-titles">'.$z->post_title.'</h4> <div class="div-block-15"> <div style="background-color:#eeee22" class="div-block-16"></div> <div class="category-text-sm">'.$data_tab_2->category_name.'</div> </div> </a> </div> </div> </div>';
            }
            //post 5 tab 2
            $post_5_tab_2='';
            if(isset($tab_2->post_id_5_tab_2)&&$tab_2->post_id_5_tab_2!=''){
                $z= fs_get_info_post_card((int)($tab_2->post_id_5_tab_2));
                $post_5_tab_2.='<div role="listitem" class="w-dyn-item">
                    <div class="secondary-newpost-cont"> <a href="'.$z->post_url.'" class="" target="_blank"><img  width="250" height="180" data-src="'.$z->thumnail_url.'" class="attachment-size250 size-size250 wp-post-image entered lazyload" alt="'.$z->post_title.'"  data-ll-status="loaded"><noscript><img width="250" height="180" src="'.$z->thumnail_url.'" class="attachment-size250 size-size250 wp-post-image" alt="'.$z->post_title.'" /></noscript></a> <div class="div-block-39"> <a href="'.$z->post_url.'" class="w-inline-block" data-wpel-link="internal"  target="_blank"> <h4 class="h4-newpost-titles">'.$z->post_title.'</h4> <div class="div-block-15"> <div style="background-color:#eeee22" class="div-block-16"></div> <div class="category-text-sm">'.$data_tab_2->category_name.'</div> </div> </a> </div> </div> </div>';
                
            }elseif(count($data_tab_2->list_posts)>4){
                $z= $data_tab_2->list_posts[4];
                $post_5_tab_2.='<div role="listitem" class="w-dyn-item">
                    <div class="secondary-newpost-cont"> <a href="'.$z->post_url.'" class="" target="_blank"><img  width="250" height="180" data-src="'.$z->thumnail_url.'" class="attachment-size250 size-size250 wp-post-image entered lazyload" alt="'.$z->post_title.'"  data-ll-status="loaded"><noscript><img width="250" height="180" src="'.$z->thumnail_url.'" class="attachment-size250 size-size250 wp-post-image" alt="'.$z->post_title.'" /></noscript></a> <div class="div-block-39"> <a href="'.$z->post_url.'" class="w-inline-block" data-wpel-link="internal"  target="_blank"> <h4 class="h4-newpost-titles">'.$z->post_title.'</h4> <div class="div-block-15"> <div style="background-color:#eeee22" class="div-block-16"></div> <div class="category-text-sm">'.$data_tab_2->category_name.'</div> </div> </a> </div> </div> </div>';
            }
        }
        // tab_3***********
        $tab_3=$home_setup->tab_3;
        
        // tab_4*************
        $result_tab_4='';
        if(isset($home_setup->tab_4)){
            $tab_4=$home_setup->tab_4;
            foreach($tab_4 as $z){
                if(fs_check_category_created($z)){
                    $k=fs_get_child_category_by_category_parent_id($z);
                    $result_tab_4.='<div class="category-section" style="background:#f8f9ff"> <div class="content-container"> <div class="title-container"> <div> <div class="title-cont"> <div class="category-icon-hero htg" style=" background-color: #3861fb; "><img data-src="'.get_stylesheet_directory_uri().'/templates/assets/css/icon/icon3.svg" class="category-icon lazyload"> </div> <h2 class="h1-newposts-title">'.$k->category_name.'</h2> </div> </div> <div class="div-block-6"><a href="'.$k->category_url.'" data-wpel-link="internal" target="_blank">Xem tất cả ⟶</a> </div> </div><div class="w-dyn-list"><div role="list" class="howto-cardcont boxwhile w-dyn-items">';
                    // 
                    $u=$k->category_child_list;
                    foreach($u as $x){
                        $result_tab_4.='<div role="listitem" class="w-dyn-item"><a href="'.$x->category_childrent_url.'" class="card2 dropshadow w-inline-block" data-wpel-link="internal"><div data-bg="'.$x->category_childrent_thumnail.'" style="background-color: rgb(56, 97, 251); background-image: url('.$x->category_childrent_thumnail.');" class="howto-img-hm rocket-lazyload entered lazyload" data-ll-status="load"></div><div style="padding:15px"><h3 class="h3-card1">'.$x->category_childrent_name.'</h3><div class="div-block-33"><div class="dot-light"></div><p class="paragraph-4">'.$k->category_name.'</p></div></div></a></div>';
                    }
                    // 
                    $result_tab_4.='</div></div></div></div>';
                }
            }
        }

        // tab_4************
        $tab_5=$home_setup->tab_5;
        $result_tab_5='';
        if($tab_5->is_show){ 
            if(isset($tab_5->post_1)&&$tab_5->post_1!=''){
                $z=fs_get_info_post_card($tab_5->post_1);
                $x=fs_get_post_by_category_id($tab_5->cate_1,4);
                $result_tab_5.=' <div role="listitem" class="w-dyn-item"> <div> <div class="title-cont"> <h4 class="dv1" style="margin-top: 0px">'.$x->category_name.'</h4> </div> </div>';
                // 
                $result_tab_5.='<div class="boxb bigc"><a href="'.$z->post_url.'" class="card2 w-inline-block1 " target="_blank"><div data-bg="'.$z->thumnail_url.'" 
                style="background-color:#d3fdf3;border-radius: 8px;margin-bottom: 10px;background-image: url('.$z->thumnail_url.');" class="howto-img-hm rocket-lazyload"></div> </a><div class="info_big"><a href="'.$z->post_url.'" class="card2 w-inline-block1 " target="_blank"> <div class="div-block-15"> <div style="background-color:#eeee22" class="div-block-16"></div> <div class="category-text-sm">'.$x->category_name.'</div> </div> <h3 class="h3-card3" style=" font-size: 15px; line-height: 20px; color: #000; ">'.$z->post_title.'</h3> </a>  </div> </div>';
                // 
                foreach($x->list_posts as $k){
                    $result_tab_5.='<div class="boxb ">
                    <a href="'.$k->post_url.'" class="card2 w-inline-block1 " target="_blank"> <div data-bg="'.$k->thumnail_url.'" style="background-color: rgb(211, 253, 243); border-radius: 8px; margin-bottom: 10px; background-image: url('.$k->thumnail_url.');" class="howto-img-hm rocket-lazyload"></div> <div class="info_big"> <div class="div-block-15"> <div style="background-color:#eeee22" class="div-block-16"></div> <div class="category-text-sm">'.$x->category_name.'</div> </div> <h3 class="h3-card3 dv3" style=" font-size: 15px; line-height: 20px; color: #000; ">'.$k->post_title.'</h3></div> </a> </div>';
                }

                $result_tab_5.='</div>';
            }
        
            if(isset($tab_5->post_2)&&$tab_5->post_2!=''){
                $z=fs_get_info_post_card($tab_5->post_2);
                $x=fs_get_post_by_category_id($tab_5->cate_2,4);
                $result_tab_5.=' <div role="listitem" class="w-dyn-item"> <div> <div class="title-cont"> <h4 class="dv1" style="margin-top: 0px">'.$x->category_name.'</h4> </div> </div>';
                // 
                $result_tab_5.='<div class="boxb bigc"><a href="'.$z->post_url.'" class="card2 w-inline-block1 " target="_blank"><div data-bg="'.$z->thumnail_url.'" 
                style="background-color:#d3fdf3;border-radius: 8px;margin-bottom: 10px;background-image: url('.$z->thumnail_url.');" class="howto-img-hm rocket-lazyload"></div> </a><div class="info_big"><a href="'.$z->post_url.'" class="card2 w-inline-block1 " target="_blank"> <div class="div-block-15"> <div style="background-color:#eeee22" class="div-block-16"></div> <div class="category-text-sm">'.$x->category_name.'</div> </div> <h3 class="h3-card3" style=" font-size: 15px; line-height: 20px; color: #000; ">'.$z->post_title.'</h3> </a>  </div> </div>';
                // 
                foreach($x->list_posts as $k){
                    $result_tab_5.='<div class="boxb ">
                    <a href="'.$k->post_url.'" class="card2 w-inline-block1 " target="_blank"> <div data-bg="'.$k->thumnail_url.'" style="background-color: rgb(211, 253, 243); border-radius: 8px; margin-bottom: 10px; background-image: url('.$k->thumnail_url.');" class="howto-img-hm rocket-lazyload"></div> <div class="info_big"> <div class="div-block-15"> <div style="background-color:#eeee22" class="div-block-16"></div> <div class="category-text-sm">'.$x->category_name.'</div> </div> <h3 class="h3-card3 dv3" style=" font-size: 15px; line-height: 20px; color: #000; ">'.$k->post_title.'</h3></div> </a> </div>';
                }

                $result_tab_5.='</div>';
            }
    
            if(isset($tab_5->post_3)&&$tab_5->post_3!=''){
                $z=fs_get_info_post_card($tab_5->post_3);
                $x=fs_get_post_by_category_id($tab_5->cate_3,4);
                $result_tab_5.=' <div role="listitem" class="w-dyn-item"> <div> <div class="title-cont"> <h4  class="dv1" style="margin-top: 0px">'.$x->category_name.'</h4> </div> </div>';
                // 
                $result_tab_5.='<div class="boxb bigc"><a href="'.$z->post_url.'" class="card2 w-inline-block1 " target="_blank"><div data-bg="'.$z->thumnail_url.'" 
                style="background-color:#d3fdf3;border-radius: 8px;margin-bottom: 10px;background-image: url('.$z->thumnail_url.');" class="howto-img-hm rocket-lazyload"></div> </a><div class="info_big"><a href="'.$z->post_url.'" class="card2 w-inline-block1 " target="_blank"> <div class="div-block-15"> <div style="background-color:#eeee22" class="div-block-16"></div> <div class="category-text-sm">'.$x->category_name.'</div> </div> <h3 class="h3-card3" style=" font-size: 15px; line-height: 20px; color: #000; ">'.$z->post_title.'</h3> </a>  </div> </div>';
                // 
                foreach($x->list_posts as $k){
                    $result_tab_5.='<div class="boxb ">
                    <a href="'.$k->post_url.'" class="card2 w-inline-block1 " target="_blank"> <div data-bg="'.$k->thumnail_url.'" style="background-color: rgb(211, 253, 243); border-radius: 8px; margin-bottom: 10px; background-image: url('.$k->thumnail_url.');" class="howto-img-hm rocket-lazyload"></div> <div class="info_big"> <div class="div-block-15"> <div style="background-color:#eeee22" class="div-block-16"></div> <div class="category-text-sm">'.$x->category_name.'</div> </div> <h3 class="h3-card3 dv3" style=" font-size: 15px; line-height: 20px; color: #000; ">'.$k->post_title.'</h3></div> </a> </div>';
                }

                $result_tab_5.='</div>';
            }
        }





    }
    
?>