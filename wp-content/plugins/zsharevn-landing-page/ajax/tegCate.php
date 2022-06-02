
<?php 

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;
if (!function_exists('is_plugin_active')) {
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
   }
//
function get_all_categorys(){
    global $wpdb;
    $table_prefix=$wpdb->prefix .'term_taxonomy';
    $sql = $wpdb->prepare( "SELECT term_id,parent FROM $table_prefix WHERE taxonomy ='category' ORDER BY term_id ASC");
    $results = $wpdb->get_results( $sql , OBJECT );
    foreach($results as $x){
        $id=$x->term_id;
       $cat = get_category( $id );
       $x->category_name=$cat->name;
       $x->category_url=get_category_link($id);
    }
    return $results;
}

if(is_plugin_active('zsharevn-landing-page/index.php')){

    if(is_user_logged_in()){
        $id_user=get_current_user_id();
        $user = wp_get_current_user();
        $permisstion_type=$user->roles[0];
        if($permisstion_type=="administrator"||$permisstion_type=="editor"||$permisstion_type=="author"||$permisstion_type=="contributor"){
            $cate_list=(get_all_categorys());
            $results=array();
            foreach($cate_list as $x){
                $obj= new stdClass();
                $obj->id=(int)$x->term_id;
                $obj->name=$x->category_name;
                $obj->title=$x->category_name;
                $obj->key=$x->category_name;
                $obj->text=$x->category_name;
                $obj->value=$x->category_name;
                $obj->url=$x->category_url;
                $obj->parent_id=(int)$x->parent;
                array_push($results,$obj);
            }
            send($results);
        }else{
            send(array());
        }
    }else{
        send(array());
    }
}
?>