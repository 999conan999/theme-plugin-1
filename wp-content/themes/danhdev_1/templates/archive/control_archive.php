<?php
    $obj=get_queried_object();
    $id=$obj->term_id;
    $metaA=json_decode(get_term_meta($id,'metaA', true));
    $template_selected=$metaA->template_selected;
    $current_url=get_category_link($id);
    $home_url=get_home_url();
    //

    //
    $thumnail_url=get_term_meta($id,'thumnail_url', true);
    if($template_selected=='0'){
        $data_category=fs_get_info_category_by_id_show_cate($id);
    }elseif($template_selected=='1'){
        $q=15;
        $page=isset($_GET['page'])?(int)stripslashes($_GET['page']):0;
        $data_category=fs_get_post_by_category_id($id,$q,$page);
        $count=(int)($data_category->count);
        $page_count=(round($count/$q));
        $pageing='<div class="paging">';
        for($i=0;$i<$page_count;$i++){
            if($page==$i){
                $pageing.='<span class="page-numbers current">'.$i.'</span>';
            }else{
                $pageing.='<a class="page-numbers" href="?page='.$i.'" data-wpel-link="internal" target="_blank">'.$i.'</a>';
            }
        }
        if($page_count>$page+1){
            $pageing.='<a class="next page-numbers" href="?page='.($page+1).'" data-wpel-link="internal" target="_blank"> &gt; </a></div>';
        }else{
            $pageing.='</div>';
        }
    }elseif($template_selected=='2' && isset($metaA->treeData)){
        $catZ = get_category($id);
        $data_category = new stdClass();
        $data_category->list_cat=fs_get_posts_by_list_id($metaA->treeData);
        $data_category->category_name=$catZ->name;
        $data_category->descriptions=$metaA->descriptions;
    }
    

?>