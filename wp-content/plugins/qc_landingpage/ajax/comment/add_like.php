<?php 
    $parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
    require_once( $parse_uri[0] . 'wp-load.php' );
 


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
    //
    function add_data_count($id,$id_comment,$like,$comment,$share){
       if($id){
            $data = array(
                'id_comment'=> $id_comment,
                'like'=> $like,
                'comment'=> $comment,
                'share'=> $share,
            );
            global $wpdb;
            $table = $wpdb->prefix . 'qc_count';
            $rs=$wpdb->update(
                $table,
                $data,
                array('id' => $id)
            );
       }else{
        $data = array(
            'id_comment'=> $id_comment,
            'like'=> $like,
            'comment'=> $comment,
            'share'=> $share,
        );
        global $wpdb;
        $table = $wpdb->prefix . 'qc_count';
        $rs=$wpdb->insert(
            $table,
            $data
        );
       } 
    }
    if(isset($_POST['id_comment'])){
        $id_comment=stripslashes(strip_tags($_POST['id_comment']));
        $type=stripslashes(strip_tags($_POST['type']));
        $data_count= get_infor_by_id_comment($id_comment);
        if($data_count){// co da ta
            $id_comment=$data_count->id_comment;
            $like=(int)$data_count->like;
            $comment=(int)$data_count->comment;
            $share=(int)$data_count->share;
            $id=(int)$data_count->id;
            if($type=='like'){
                $like++;
                add_data_count($id,$id_comment,$like,$comment,$share);
            }elseif($type=='comment'){
                $comment++;
                add_data_count($id,$id_comment,$like,$comment,$share);
            }elseif($type=="share"){
                $share++;
                add_data_count($id,$id_comment,$like,$comment,$share);
            }
        }else{// khong co data
            if($type=='like'){
                add_data_count(false,$id_comment,'1','0','0');
            }elseif($type=='comment'){
                add_data_count(false,$id_comment,'0','1','0');
            }elseif($type=="share"){
                add_data_count(false,$id_comment,'0','0','1');
            }
        }
    }

    

    

?>