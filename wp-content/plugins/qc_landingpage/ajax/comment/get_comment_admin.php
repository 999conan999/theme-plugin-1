<?php 
    $parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
    require_once( $parse_uri[0] . 'wp-load.php' );
 
    function get_comment_qc($quantity,$offset,$page,$sl){// search phone or email ~~ '' => get all
        global $wpdb;
        $table_prefix=$wpdb->prefix .'qc_comment';
             $sql = $wpdb->prepare( "SELECT * FROM $table_prefix ORDER BY date_create DESC LIMIT %d OFFSET %d ",$quantity,$offset);
        $results = $wpdb->get_results( $sql , OBJECT );
        $rs=array();
        foreach($results as $x){
          $object = new stdClass();
          $value_comment=json_decode($x->value_comment);
          $value_comment->status=$x->status;
          $value_comment->id_comment=$x->id_comment;
          $object->data=$value_comment;
          $object->id=$x->id;
          $object->time=$x->date_create;
          $object->is_set=$x->is_set;
          array_push($rs,$object);
        }
        send($rs);
        
        }



  if(is_user_logged_in()){
     if($_GET){
        if(isset($_GET['page'])){
            $page=abs((int)stripslashes(strip_tags($_GET['page'])));
            $sl=6;
            $offset=$page*$sl;
            get_comment_qc($sl,$offset,$page,$sl);
        }
     }
    }