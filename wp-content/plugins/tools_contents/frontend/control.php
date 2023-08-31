<?php
        require_once(plugin_dir_path( __FILE__ ).'/fs.php');
        $obj=get_queried_object();
        $id=$obj->ID;
        $common= get_setup_qc();//
        $home_url=get_home_url();
        $home_name=str_replace('https://', '', $home_url);
        $home_name=str_replace('http://', '', $home_name);
        $a=get_qc_infor($id);//
        $post_infor=$a->data_metaA;//
        $gia_tri_chuyen_doi=$a->gia_tri_chuyen_doi;//
        $current_url=get_permalink($id);
        $is_goc=true;
        $robot_flow="index,follow";
        if($post_infor->id_parent==-1){
            $parent_url=$current_url;
        }else{
            $parent_url=get_permalink($post_infor->id_parent);
        }
        if($post_infor->data_qc->canonical!=""){
            $canonical=$post_infor->data_qc->canonical;$is_goc=false;
            $robot_flow="noindex, nofollow";
        }else{
            $canonical=$current_url;
        };
        $sdt=$post_infor->data_qc->sdt==''?$common->lien_he->sdt_hotline:$post_infor->data_qc->sdt;
        $zalo=$post_infor->data_qc->zalo==''?$common->lien_he->sdt_zalo:$post_infor->data_qc->zalo;
        $fb=$post_infor->data_qc->fb==''?$common->lien_he->url_fb:$post_infor->data_qc->fb;
        $phone_show=substr($sdt, -10, -7) . "-" . substr($sdt, -7, -4) . "-" . substr($sdt, -4);
?>