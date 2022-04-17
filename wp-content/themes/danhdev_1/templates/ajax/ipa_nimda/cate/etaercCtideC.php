<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;

function create_category($nameS,$contentS,$parentIdN,$metaA,$thumnailS){
    if ( ! function_exists( 'wp_insert_category' ) ) require_once(ABSPATH . 'wp-admin/includes/taxonomy.php'); 
    $my_category= array(
        'cat_name'    => $nameS,
        'category_description'  => $contentS,
        'category_parent'   => $parentIdN
    );
    $category_ID=wp_insert_category($my_category);
    add_term_meta( $category_ID, 'thumnail_url', $thumnailS, true);
    foreach($metaA as $key => $x){
        if(isset($category_ID)){
            add_term_meta( $category_ID, $key, $x, true);
        }
    }
    return $category_ID;
}
// var_dump(create_category('$nameS','$contentS',4,array('test_1'=>'111','test_2'=>'222','test_3'=>'333',),'$thumnailS'));//32
function update_category($idN,$nameS,$contentS,$parentIdN,$metaA,$thumnailS){
    if ( ! function_exists( 'wp_insert_category' ) ) require_once(ABSPATH . 'wp-admin/includes/taxonomy.php'); 
    $my_category= array(
        'cat_ID'    => $idN,
        'cat_name'    => $nameS,
        'category_description'  => $contentS,
        'category_parent'   => $parentIdN
    );
    $category_ID=wp_insert_category($my_category);
    update_term_meta( $idN, 'thumnail_url', $thumnailS);
    foreach($metaA as $key => $x){
            update_term_meta( $idN, $key, $x);
    }
    return $category_ID;
}
// var_dump(update_category(32,'$nameS_ok','$contentS_ok',4,array('test_1'=>'111_ok_ok','test_2'=>'222_ok','test_3'=>'333_ok','test_4'=>'4444',),'$thumnailS_ok'));//32

if(true){//[todo]
    $id_user=6;
    $permisstion_type="editor";
// if(is_user_logged_in()){
//     $user = wp_get_current_user();
//     $permisstion_type=$user->roles[0];
    //
    if($_POST){
        $idN=(int)$_POST['idN']; // id =-1 >create || update
        $parentIdN=(int)$_POST['parentIdN']; // id =-1 >create || update
        $nameS=$_POST['nameS']; // "tieu de"
        $contentS=$_POST['contentS'];// "noi dung"
        $metaA=($_POST['metaA'])!="null"?$_POST['metaA']:array();//
        $thumnailS=$_POST['thumnailS'];//"anbinhnew.com"
        if($permisstion_type=="administrator"||$permisstion_type=="editor"){// create, edit full permisstion
            if($idN==-1){// create new cate 93
                $id=create_category($nameS,$contentS,$parentIdN,$metaA,$thumnailS);
                $object = new stdClass();
                $object->id=$id;
                $object->status='ok';
                send($object);
            }else{
                $id=update_category($idN,$nameS,$contentS,$parentIdN,$metaA,$thumnailS);
                $object = new stdClass();
                $object->id=$id;
                $object->status='ok';
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