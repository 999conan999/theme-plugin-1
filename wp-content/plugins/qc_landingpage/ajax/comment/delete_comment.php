<?php 

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;
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
function delete_contact_by_id($id){// search phone or email ~~ '' => get all
     global $wpdb;
     $table = $wpdb->prefix . 'qc_comment';
     $delete = $wpdb->delete(
     $table,
     array( 'id' => $id ),
     array( '%d' )
     );
}
if(is_user_logged_in()){
     $object = new stdClass();
     $object->status=false;
          if(isset($_POST['id'])){
               $id=(int)stripslashes(strip_tags($_POST['id']));
               $status=stripslashes(strip_tags($_POST['status']));
               $id_comment=stripslashes(strip_tags($_POST['id_comment']));
               delete_contact_by_id($id);
               $data_count= get_infor_by_id_comment($id_comment);
               if($data_count){// co da ta
                    $id_comment=$data_count->id_comment;
                    $like=(int)$data_count->like;
                    $comment=(int)$data_count->comment;
                    $share=(int)$data_count->share;
                    $id=(int)$data_count->id;
                    if($status=='publish'){
                         $comment--;
                         add_data_count($id,$id_comment,$like,$comment,$share);
                    }
                }
               $object->status=true;
          }
     send($object);
}
 ?>