<?php 
//     $parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
//     require_once( $parse_uri[0] . 'wp-load.php' );

    
// function update_setup(
//         $id,
//         $icon,
//         $logo ,
//         $menu_json ,
//         $menu_html ,
//         $contact_code ,
//         $contact_html ,
//         $css_code ,
//         $header_code ,
//         $body_code ,
//         $footer_code ,
//         $value_1 ,
//         $value_2 ,
//         $value_3 ,
//         $value_4 ,
//         $value_5 ,
//         $value_6 ,
//         $value_7 ,
//         $value_8 ,
//     ){
//     $data = array(
//         'icon'=> $icon,
//         'logo' => $logo,
//         'menu_json' => $menu_json,
//         'menu_html' => $menu_html,
//         'contact_code' => $contact_code,
//         'contact_html' => $contact_html,
//         'css_code' => $css_code,
//         'header_code' => $header_code,
//         'body_code' => $body_code,
//         'footer_code' => $footer_code,
//         'value_1' => $value_1,
//         'value_2' => $value_2,
//         'value_3' => $value_3,
//         'value_4' => $value_4,
//         'value_5' => $value_5,
//         'value_6' => $value_6,
//         'value_7' => $value_7,
//         'value_8' => $value_8,
//     );
//     global $wpdb;
//     $id = (int)$id;
//     $table = $wpdb->prefix . 'common_setup';
//     $update = $wpdb->update(
//         $table,
//         $data,
//         array('id' => $id)
//     );
//     if($update==false) return false;
//     return true;
// }


// if(true){//[todo]
//     $id_user=6;
//     $permisstion_type="editor";
// // if(is_user_logged_in()){
// //     $user = wp_get_current_user();
// //     $permisstion_type=$user->roles[0];
// //
//         if($permisstion_type=="administrator"||$permisstion_type=="editor"){
//             if($_POST){
//                 $idN=(int)$_POST['idN'];
//                 $icon=stripslashes($_POST['icon']);
//                 $logo =stripslashes($_POST['logo']);
//                 $menu_json =stripslashes($_POST['menu_json']);
//                 $menu_html =stripslashes($_POST['menu_html']);
//                 $contact_code =stripslashes($_POST['contact_code']);
//                 $contact_html =stripslashes($_POST['contact_html']);
//                 $css_code =stripslashes($_POST['css_code']);
//                 $header_code =stripslashes($_POST['header_code']);
//                 $body_code =stripslashes($_POST['body_code']);
//                 $footer_code =stripslashes($_POST['footer_code']);
//                 $value_1 =stripslashes($_POST['value_1']);
//                 $value_2 =stripslashes($_POST['value_2']);
//                 $value_3 =stripslashes($_POST['value_3']);
//                 $value_4 =stripslashes($_POST['value_4']);
//                 $value_5 =stripslashes($_POST['value_5']);
//                 $value_6 =stripslashes($_POST['value_6']);
//                 $value_7 =stripslashes($_POST['value_7']);
//                 $value_8 =stripslashes($_POST['value_8']);
//                 $status= update_setup(
//                     $idN,
//                     $icon,
//                     $logo ,
//                     $menu_json ,
//                     $menu_html ,
//                     $contact_code ,
//                     $contact_html ,
//                     $css_code ,
//                     $header_code ,
//                     $body_code ,
//                     $footer_code ,
//                     $value_1 ,
//                     $value_2 ,
//                     $value_3 ,
//                     $value_4 ,
//                     $value_5 ,
//                     $value_6 ,
//                     $value_7 ,
//                     $value_8 ,
//                 );
//                 $objects = new stdClass();
//                 $objects->status=$status;
//                 send($objects);
//             }else{
//                 $object = new stdClass();
//                 send($object);
//             } 
//         }else{
//             $object = new stdClass();
//             send($object);
//         } 
//     }else{
//         $object = new stdClass();
//         send($object);
//     } 









?>