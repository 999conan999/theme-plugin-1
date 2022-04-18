<?php 
//     $parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
//     require_once( $parse_uri[0] . 'wp-load.php' );

    
// function create($keyz,$valuez,$name_table){
//     $data = array(
//         'keyz'=> $keyz,
//         'valuez' => $valuez
//     );
//     global $wpdb;
    
//     $rs = $wpdb->insert(
// 	    $name_table,
// 	    $data
// 	);
//     if($rs==false) return false;
//     return true;
// }
// function is_created($keyz,$name_table){
//     global $wpdb;
//     $sql = $wpdb->prepare( "SELECT COUNT(keyz) FROM $name_table WHERE keyz=%s",$keyz);
//     $results = $wpdb->get_results( $sql , ARRAY_A );
//     $z= (int)($results[0]['COUNT(keyz)']);
//     if($z==1) return true;
//     return false;
// }
// // $name_table = $wpdb->prefix . 'data_theme';
// // create('$keyz','$valuez',$name_table)
// /// create => input "keyz"
// if(true){//[todo]
//     $id_user=6;
//     $permisstion_type="editor";
// // if(is_user_logged_in()){
// //     $user = wp_get_current_user();
// //     $permisstion_type=$user->roles[0];
// //
//         if($permisstion_type=="administrator"||$permisstion_type=="editor"){
//             if($_POST){
//                 $keyz=stripslashes($_POST['keyz']);/////////////////////////////////////////////////////>>>>>>>>>>>>>>>
//                    $name_table = $wpdb->prefix . 'data_theme';
//                    if(!is_created($keyz,$name_table)){
//                         create($keyz,'',$name_table);
//                    }
//                 // 
//                 $objects = new stdClass();
//                 // $objects->status=$status;
//                 send($objects);
//             }else{
//                 $object = new stdClass();
//                 $object->status=false;
//                 send($object);
//             } 
//         }else{
//             $object = new stdClass();
//             $object->status=false;
//             send($object);
//         } 
//     }else{
//         $object = new stdClass();
//         $object->status=false;
//         send($object);
//     }









?>