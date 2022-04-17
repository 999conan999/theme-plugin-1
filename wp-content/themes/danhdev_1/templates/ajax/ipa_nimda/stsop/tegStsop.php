<?php 

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;

function get_all_posts($data_search,$quantity,$offset){
    // $list_post_org=get_all_posts($quantity,$page);
   global $wpdb;
   $table_prefix=$wpdb->prefix .'posts';
   $sql = $wpdb->prepare( "SELECT ID,post_content,post_title,post_status,post_author FROM $table_prefix WHERE post_type ='post' AND  post_status <> 'trash' AND post_status <> 'auto-draft' AND post_title LIKE %s ORDER BY post_date DESC LIMIT %d OFFSET %d ",'%'.$data_search.'%',$quantity,$offset);
   $results = $wpdb->get_results( $sql , OBJECT );
   foreach($results as $x){
       $id=$x->ID;
       $x->post_url=get_permalink($id);
       $x->thumnail_url=get_post_meta($id,'thumnail_url', true);
       $author_id=$x->post_author;
       $x->author_name=get_the_author_meta( 'display_name' ,(int)$author_id );
           $post_categories=(wp_get_post_categories($id));
           $categorys_list=array();
           foreach($post_categories as $c){
               $cat = get_category( $c );
            //    $categorys_list[] = array( $cat->name);
               array_push($categorys_list,$cat->name);
           }
           $x->categorys_list=$categorys_list;

   }
   return($results);
}
function get_posts_by_category_id($id_category,$quantity,$offset){
    $list_childrent=(get_term_children($id_category,'category'));
    $args = array('cat' => $id_category, 'post_status' => 'any', 'orderby' => 'post_date', 'order' =>'DESC', 'posts_per_page' => $quantity,'offset' => $offset,'category__not_in' =>$list_childrent);
    $results =query_posts($args);
    $list_posts=array();    
    foreach($results as $x){
        $result = new stdClass();
        $id=$x->ID;
        $result->ID=$id;
        $result->post_modified=$x->post_modified;
        $result->post_content=$x->post_content;
        $result->post_title=$x->post_title;
        $result->post_status=$x->post_status;
        $result->post_url=get_permalink($id);
        $result->thumnail_url=get_post_meta($id,'thumnail_url', true);
        $author_id=$x->post_author;
        $result->author_name=get_the_author_meta( 'display_name' ,(int)$author_id );
        //
        $post_categories=(wp_get_post_categories($id));
        $categorys_list=array();
        foreach($post_categories as $c){
            $cat = get_category( $c );
            array_push($categorys_list,$cat->name);
        }
        $result->categorys_list=$categorys_list;
        array_push($list_posts,$result);
    }
    return( $list_posts);
}
function get_all_posts_by_user_id($user_id,$data_Search,$quantity,$offset){
   global $wpdb;
   $table_prefix=$wpdb->prefix .'posts';
   $sql = $wpdb->prepare( "SELECT ID,post_modified,post_content,post_title,post_status,post_author FROM $table_prefix WHERE post_type ='post' AND post_status <> 'auto-draft' AND post_author=%d AND post_title LIKE %s ORDER BY post_date DESC LIMIT %d OFFSET %d ",$user_id,'%'.$data_Search.'%',$quantity,$offset);
   $results = $wpdb->get_results( $sql , OBJECT );
   foreach($results as $x){
       $id=$x->ID;
       $x->post_url=get_permalink($id);
       $x->thumnail_url=get_post_meta($id,'thumnail_url', true);
       $author_id=$x->post_author;
       $x->author_name=get_the_author_meta( 'display_name' ,(int)$author_id );
           $post_categories=(wp_get_post_categories($id));
           $categorys_list=array();
           foreach($post_categories as $c){
               $cat = get_category( $c );
               $categorys_list[] = array($cat->name);
           }
           $x->categorys_list=$categorys_list;
           //
   }
   return($results);
}
// $v=(get_all_posts_by_user_id(3,25,0,''));
function get_posts_by_category_id_user($user_id,$id_category,$quantity,$offset){
    $args = array('cat' => $id_category,'author__in'=> $user_id, 'orderby' => 'post_date', 'order' =>'DESC', 'posts_per_page' => $quantity,'offset' => $offset);
    $results =query_posts($args);
    $list_posts=array();    
    foreach($results as $x){
        $result = new stdClass();
        $id=$x->ID;
        $result->ID=$id;
        $result->post_modified=$x->post_modified;
        $result->post_content=$x->post_content;
        $result->post_title=$x->post_title;
        $result->post_status=$x->post_status;
        $result->post_url=get_permalink($id);
        $result->thumnail_url=get_post_meta($id,'thumnail_url', true);
        $author_id=$x->post_author;
        $result->author_name=get_the_author_meta( 'display_name' ,(int)$author_id );
        //
        $post_categories=(wp_get_post_categories($id));
        $categorys_list=array();
        foreach($post_categories as $c){
            $cat = get_category( $c );
            array_push($categorys_list,$cat->name);
        }
        $result->categorys_list=$categorys_list;
        array_push($list_posts,$result);
    }
    return( $list_posts);
}
// var_dump(get_posts_by_category_id_user(3,4,25,0));


// if(is_user_logged_in()){
//     $id_user=get_current_user_id();
//     $user = wp_get_current_user();
//     $permisstion_type=$user->roles[0];
//     $quantity=25;
//     $list_post_org=array();
 //[todo]
 if(true){
 $quantity=25;
 $id_user=6;
 $permisstion_type="editor";
 $list_post_org=array();
 //[end-todo]
    if($permisstion_type=="administrator"||$permisstion_type=="editor"){
        // all post
      if($_GET){
            if(isset($_GET['page'])){
                $page=abs((int)stripslashes(strip_tags( $_GET['page']))*$quantity);
                $data_search='';
                if(isset($_GET['data_search'])) $data_search=stripslashes(strip_tags($_GET['data_search']));
                $category_id=-1;
                if(isset($_GET['category_id'])) $category_id=abs((int)stripslashes(strip_tags($_GET['category_id'])));
                if($category_id==-1){// get all
                    //  http://localhost/test/wp-content/themes/danhdev_1/templates/ajax/ipa_nimda/stsop/tegStsop.php?page=0&data_search=t%C3%A9st
                    $list_post_org=get_all_posts($data_search,$quantity,$page);
                }else{// get by category id
                    //http://localhost/test/wp-content/themes/danhdev_1/templates/ajax/ipa_nimda/stsop/tegStsop.php?page=0&category_id=4
                    $list_post_org=get_posts_by_category_id($category_id,$quantity,$page);
                }
                $results=array();
                foreach($list_post_org as $x){
                    $obj= new stdClass();
                    $obj->id=$x->ID;
                    $obj->title=$x->post_title;
                    $obj->status=$x->post_status;
                    $obj->category=$x->categorys_list;
                    $obj->url=$x->post_url;
                    $obj->thumnail_url=$x->thumnail_url;
                    $obj->author_name=$x->author_name;
                    array_push($results,$obj);
                }
                send($results);
            }else{
                send(array());
             }
        }else{
            send(array());
         }
      //
    }elseif($permisstion_type=="author"||$permisstion_type=="contributor"){
        // 'post by user';
        if($_GET){
            if(isset($_GET['page'])){
                $page=abs((int)stripslashes(strip_tags( $_GET['page']))*$quantity);
                $data_search='';
                if(isset($_GET['data_search'])) $data_search=stripslashes(strip_tags($_GET['data_search']));
                $category_id=-1;
                if(isset($_GET['category_id'])) $category_id=abs((int)stripslashes(strip_tags($_GET['category_id'])));
                if($category_id==-1){// get all
                    //  http://localhost/test/wp-content/themes/danhdev_1/templates/ajax/ipa_nimda/stsop/tegStsop.php?page=0&data_search=t%C3%A9st
                    $list_post_org=get_all_posts_by_user_id($id_user,$data_search,$quantity,$page);
                }else{// get by category id
                    //http://localhost/test/wp-content/themes/danhdev_1/templates/ajax/ipa_nimda/stsop/tegStsop.php?page=0&category_id=4
                    $list_post_org=get_posts_by_category_id_user($id_user,$category_id,$quantity,$page);
                }
                $results=array();
                foreach($list_post_org as $x){
                    $obj= new stdClass();
                    $obj->id=$x->ID;
                    $obj->title=$x->post_title;
                    $obj->status=$x->post_status;
                    $obj->category=$x->categorys_list;
                    $obj->url=$x->post_url;
                    $obj->thumnail_url=$x->thumnail_url;
                    $obj->author_name=$x->author_name;
                    array_push($results,$obj);
                }
                send($results);
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