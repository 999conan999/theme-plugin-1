<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;

function create_post($titleS,$contentS,$statusS,$categoryA,$tagA,$metaA,$thumnailS){
    $my_post = array(
        'post_title'    => $titleS,
        'post_content'  => $contentS,
        'post_status'   => $statusS,
        'post_category' => $categoryA,
        'tags_input' => $tagA,
        'meta_input'    =>$metaA
    );
    $post_ID=wp_insert_post( $my_post );
    add_post_meta($post_ID,'thumnail_url',$thumnailS, true);
    return $post_ID;
}
function update_post($idN,$titleS,$contentS,$statusS,$categoryA,$tagA,$metaA,$thumnailS){
    $my_post = array(
        'ID'            =>$idN,
        'post_title'    => $titleS,
        'post_content'  => $contentS,
        'post_status'   => $statusS,
        'post_category' => $categoryA,
        'tags_input' => $tagA,
        'meta_input'    =>$metaA
    );
    $post_ID=wp_update_post( $my_post );
    if(isset($thumnailS)&&$thumnailS!=""){
        update_post_meta( $post_ID, 'thumnail_url', $thumnailS);
    }
    return $post_ID;
}
function check_post_create_by_user($id_user,$id_post){
    global $wpdb;
    $table_prefix=$wpdb->prefix .'posts';
            $sql = $wpdb->prepare( "SELECT COUNT(ID) FROM $table_prefix WHERE post_author=%d AND ID=%d",$id_user,$id_post);
    $results = $wpdb->get_results( $sql , ARRAY_A );
    $v=$results[0]["COUNT(ID)"];
    if($v==0){
        return false;
    }else{
        return true;
    }
}
function send_data_return($id){
    $object = new stdClass();
    $object->id=$id;
    $object->status='ok';
    $object->url=get_permalink($id);
    $user_name=wp_get_current_user();
    $object->author_name=$user_name->display_name;
    //
    $post_categories=(wp_get_post_categories($id));
    $categorys_list=array();
    foreach($post_categories as $c){
        $cat = get_category( $c );
        array_push($categorys_list,$cat->name);
    }
    $object->category=$categorys_list;
    //
    send($object);
}

if(true){//[todo]
    $id_user=6;
    $permisstion_type="editor";
// if(is_user_logged_in()==false){
//     $id_user=get_current_user_id();
//     $user = wp_get_current_user();
//     $permisstion_type="administrator";
    //
    if($_POST){
        $idN=(int)$_POST['idN']; // id =-1 >create || update
        $titleS=$_POST['titleS']; // "tieu de"
        $contentS=$_POST['contentS'];// "noi dung"
        $statusS=$_POST['statusS'];//'publish'
        $categoryA=($_POST['categoryA'])!="null"?$_POST['categoryA']:array();// '3,4'
        $tagA=($_POST['tagA'])!="null"?$_POST['tagA']:array();;//'danhx1,danhx2,danhx3'
        $metaA=($_POST['metaA'])!="null"?$_POST['metaA']:array();//
        $thumnailS=$_POST['thumnailS'];//"anbinhnew.com"
        
        if($permisstion_type=="administrator"||$permisstion_type=="editor"){// create, edit full permisstion
            if($idN==-1){// create new post 93
                $id=create_post($titleS,$contentS,$statusS,$categoryA,$tagA,$metaA,$thumnailS);
                send_data_return($id);
                // $object = new stdClass();
                // $object->id=$id;
                // $object->status='ok';
                // send($object);
            }else{
                $id=update_post($idN,$titleS,$contentS,$statusS,$categoryA,$tagA,$metaA,$thumnailS);
                send_data_return($idN);
                // $object = new stdClass();
                // $object->id=$id;
                // $object->status='ok';
                // send($object);
            }
        }elseif($permisstion_type=="author"||$permisstion_type=="contributor"){// create and edit just for own user
            if(check_post_create_by_user($id_user,$idN)){
                if($permisstion_type=="contributor") $statusS='private';
                if($idN==-1){// create new post 93
                    $id=create_post($titleS,$contentS,$statusS,$categoryA,$tagA,$metaA,$thumnailS);
                    send_data_return($id);
                    // $object = new stdClass();
                    // $object->id=$id;
                    // $object->status='ok';
                    // send($object);
                }else{
                    $id=update_post($idN,$titleS,$contentS,$statusS,$categoryA,$tagA,$metaA,$thumnailS);
                    send_data_return($idN);
                    // $object = new stdClass();
                    // $object->id=$id;
                    // $object->status='ok';
                    // send($object);
                }
            }else{
                $object = new stdClass();
                $object->id=$idN;
                $object->status='fail';
                send($object);
            }
        }else{
            $object = new stdClass();
            $object->status='fail';
            send($object);
        }
    }else{
        $object = new stdClass();
        $object->status='fail';
        send($object);
    }
}else{
    $object = new stdClass();
    $object->status='fail';
    send($object);
}















?>