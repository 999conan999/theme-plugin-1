<?php 

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;


// get all page
function get_all_page($quantity,$offset){
    global $wpdb;
    $table_prefix=$wpdb->prefix .'posts';
    $sql = $wpdb->prepare( "SELECT ID,post_title,post_status FROM $table_prefix WHERE post_type ='page' AND post_status <> 'trash' AND post_status <> 'auto-draft' ORDER BY post_date DESC LIMIT %d OFFSET %d ",$quantity,$offset);
    $results = $wpdb->get_results( $sql , OBJECT );
    foreach($results as $x){
        $id=$x->ID;
        $x->post_url=get_permalink($id);
    }
    return($results);
}
if(true){//[todo]
    $id_user=6;
    $permisstion_type="editor";
// if(is_user_logged_in()==false){
//     $id_user=get_current_user_id();
//     $user = wp_get_current_user();
//     $permisstion_type="administrator";
    $quantity=30;
    if($permisstion_type=="administrator"||$permisstion_type=="editor"){
        if($_GET){
            if(isset($_GET['page'])){
                $page=abs((int)stripslashes(strip_tags( $_GET['page']))*$quantity);
                $data_page=get_all_page($quantity,$page);
                $homeId = get_option('page_on_front');
                $data_final=array();
                foreach($data_page as $x){
                    $obj= new stdClass();
                    if($x->ID==$homeId){
                        $obj->is_home=true;
                    }else{
                        $obj->is_home=false;
                    }
                    $obj->id=$x->ID;
                    $obj->title=$x->post_title;
                    $obj->status=$x->post_status;
                    $obj->url=$x->post_url;
                    array_push($data_final,$obj);
                }
                send($data_final);

            }else{
                send(array());
             }
        }else{
            send(array());
         }
    }else{
        send(array());
     }
}else{
    send(array());
 }
 
 
 
 ?>