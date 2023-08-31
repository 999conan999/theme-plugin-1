<?php
    function get_setup_qc(){
        $common=get_option('setups_qc');
        if($common==false){
            $common=json_decode('{"header":{"icon_mini_url":"","logo":"","chao_mung":"","chao_mung_url":"","menu":[]},"lien_he":{"sdt_zalo":"","sdt_hotline":"","url_fb":"","dia_chi":""},"footer":{"about":[],"privacy":[],"job":[],"design_by":"","bo_cong_thuong":{"name":"","url":""}},"code_gg":{"code_header":"","code_body":""}}');
        }else{
            $common=json_decode(stripslashes($common));
        }
        return($common);
    
    }

    function get_qc_infor($id){
        $metaA=get_post_meta($id,'metaA', true);
        $data_metaA=json_decode($metaA);
        $object= new stdClass();
        if($data_metaA->id_parent!=-1){
            $a=return_dm_fix($data_metaA->top->top_1,$data_metaA->top->top_2,$data_metaA->id_parent,$data_metaA);
            $data_metaA->data_qc->dm=$a->dm;
        }else{
        // var_dump($data_metaA);

            $a=return_dm_fix($data_metaA->top->top_1,$data_metaA->top->top_2,$data_metaA->id_parent,$data_metaA);
            $data_metaA->data_qc->dm=$a->dm;
        }
        $object->data_metaA=$data_metaA;
        $object->gia_tri_chuyen_doi=$a->gia_tri_chuyen_doi;
        return($object);
    }
    function get_infor_by_id_comment($id_comment){
        global $wpdb;
        $table_prefix=$wpdb->prefix .'qc_count';
             $sql = $wpdb->prepare( "SELECT * FROM $table_prefix WHERE id_comment=%s",$id_comment);
        $results = $wpdb->get_results( $sql , OBJECT );
        if(count($results)>0){
            return $results[0];
        }else{
            return false;
        }
    }

?>