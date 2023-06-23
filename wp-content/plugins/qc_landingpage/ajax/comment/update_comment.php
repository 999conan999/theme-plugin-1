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
    function update_comment_qc($id_comment,$value_comment,$phone,$status,$id,$is_set){
        $data = array(
            'id_comment'=> $id_comment,
            'value_comment'=> $value_comment,
            'phone'=> $phone,
            'status'=> $status,
            'is_set'=> $is_set,
        );
        global $wpdb;
        $table = $wpdb->prefix . 'qc_comment';
        $rs=$wpdb->update(
            $table,
            $data,
            array('id' => $id)
        );
        $obj = new stdClass();
        $obj->status=true;
        $obj->is_set=$is_set;
        send($obj);
    }
    if(is_user_logged_in()){
      if(isset($_POST['id_comment'])){
          $id_comment=stripslashes(strip_tags($_POST['id_comment']));
          $value_comment=stripslashes(strip_tags($_POST['value_comment']));
          $phone=stripslashes(strip_tags($_POST['phone']));
          $status=stripslashes(strip_tags($_POST['status']));
          $is_set=stripslashes(strip_tags($_POST['is_set']));
          $id=(int)stripslashes(strip_tags($_POST['id']));
          $vl_is_set=$is_set;
          if($status=='publish'&&$is_set=='0'){
              $vl_is_set='1';
            }elseif($status=='private'&&$is_set=='1'){
              $vl_is_set='0';
            }
          update_comment_qc($id_comment,$value_comment,$phone,$status,$id,$vl_is_set);
          $data_count= get_infor_by_id_comment($id_comment);
          if($data_count){// co da ta
              $id_comment=$data_count->id_comment;
              $like=(int)$data_count->like;
              $comment=(int)$data_count->comment;
              $share=(int)$data_count->share;
              $id=(int)$data_count->id;
              if($status=='publish'&&$is_set=='0'){
                $comment++;
                add_data_count($id,$id_comment,$like,$comment,$share);
              }elseif($status=='private'&&$is_set=='1'){
                $comment--;
                add_data_count($id,$id_comment,$like,$comment,$share);
              }
              
          }else{// khong co data
            if($status=='publish'){
              $comment='1';
            }else{
              $comment='0';
            }
              add_data_count(false,$id_comment,'0',$comment,'0');
          }
      }
    }
?>