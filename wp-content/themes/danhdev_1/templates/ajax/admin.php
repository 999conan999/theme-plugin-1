<?php 
echo "admin";
echo "<br>";

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );	// global $wpdb;
//**** */ kiểm tra login ở đây



//****1 */ function META_POST //https://freetuts.net/metadata-api-trong-wordpress-641.html
//type= add / get / update / delete
function set_meta_post($type,$id_post,$meta_key,$meta_value=''){
    if($type=="add"){
       return add_post_meta( $id_post, $meta_key, $meta_value, true);
    }elseif($type=='get'){
       return get_post_meta($id_post, $meta_key, true);
    }elseif($type=='update'){
        return update_post_meta( $id_post, $meta_key, $meta_value);
    }elseif($type=='delete'){
        return delete_post_meta( $id_post, $meta_key);
    }
}
// just get meta post
function get_meta_post($id_post,$meta_key){
    return get_post_meta($id_post, $meta_key, true);
}
// var_dump(get_meta_post(72,'thumnai_url'));
//****1 */ function META_TERM
//type= add / get / update / delete
function set_meta_category($type,$id_category,$meta_key,$meta_value=''){
    if($type=="add"){
       return add_term_meta( $id_category, $meta_key, $meta_value, true);
    }elseif($type=='get'){
       return get_term_meta($id_category, $meta_key, true);
    }elseif($type=='update'){
        return update_term_meta( $id_category, $meta_key, $meta_value);
    }elseif($type=='delete'){
        return delete_term_meta( $id_category, $meta_key);
    }
}
// just get meta term
function get_meta_category($id_category){
    return get_term_meta($id_category, $meta_key, true);
}
// "data post gồm các thông tin như :
// v1
// + ID
// + title
// + content
// + url post
// + status : public | private ..."
//********* cái này khi nào cần thì lấy; ko nên lấy sẵn */ + meta-all: + img url : cái này là tất cả data các trường meta mà post này nhận được
// v2 ==> thêm các trường này.
// + category list (post)
// + tag list(post)

function get_infor_post($id,$v="v0"){
    global $wpdb;
    // get infor posst : ID, post_Date, title, content, *url post, status, meta-all
    $table_prefix=$wpdb->prefix .'posts';
    $sql = $wpdb->prepare( "SELECT ID,post_modified,post_content,post_title,post_status,post_author FROM $table_prefix WHERE ID= %s ",$id);
    $results = $wpdb->get_results( $sql , OBJECT );
    $result=$results[0];
    $author_id=$result->post_author;
    $result->author_name=get_the_author_meta( 'display_name' ,(int)$author_id );
    $result->post_url=get_permalink($id);
    $result->thumnail_url=get_post_meta($id,'thumnail_url', true);
    //
    if($v=='v1'){
        $post_categories=(wp_get_post_categories($id));
        $category_list=array();
        foreach($post_categories as $c){
            $cat = get_category( $c );
            $object = new stdClass();
            $object->category_id=$c;
            $object->category_name=$cat->name;
            $object->category_url=get_category_link($c);
            $categorys_list[] = array( $object);
        }
        $result->categorys_list=$categorys_list;
        //
        $post_tags=wp_get_post_tags($id);
        $tags_list=array();
        foreach($post_tags as $c){
            $object = new stdClass();
            $object->tag_id=$c->term_id;
            $object->tag_name=$c->name;
            $object->tag_url=get_tag_link($c->term_id);
            $tags_list[] = array( $object);
        }
        $result->tags_list=$tags_list;

    }
    
    $table_prefix=$wpdb->prefix .'postmeta';
    $sql = $wpdb->prepare( "SELECT meta_key,meta_value FROM $table_prefix WHERE post_id=%s AND meta_key <> '_edit_lock' ",$id);
    $a2 = $wpdb->get_results( $sql , OBJECT );
    $rs2=array();
    foreach($a2 as $x){
        $rs2[$x->meta_key]=$x->meta_value;
    }

    $result->meta_data=$rs2;
    return($result);
}
// var_dump(get_infor_post(13));
// "data category gồm các thông tin như :
// v1
// + ID
// + title
// + content
// + url cate
// + parent
// + childrent
//********* cái này khi nào cần thì lấy; ko nên lấy sẵn */ + meta-all: + img url : cái này là tất cả data các trường meta mà post này nhận được
function get_infor_category($id){
    $id=(int)$id;
    $cat = get_category( $id);
    $object = new stdClass();
    $object->category_id=$cat->term_id;
    $object->category_title=$cat->name;
    $object->category_content=$cat->description;
    $object->category_url=get_category_link($cat->term_id);
    $object->category_thumnail=get_term_meta($id,'thumnail_url', true);
    $object_parent = new stdClass();
    if($cat->parent!=0){
        $object_parent->category_parent_id=$cat->parent;
        $object_parent->category_parent_title=get_the_category_by_ID($cat->parent);
        $object_parent->category_parent_url=get_category_link($cat->parent);
    }
    $object->category_parent=$object_parent;

    // childrent
    $list_childrent=(get_term_children($id,'category'));
    $category_childrent_list=array();
    foreach($list_childrent as $c){
        $cat = get_category( $c );
        $object_childrent = new stdClass();
        $object_childrent->category_childrent_id=$c;
        $object_childrent->category_childrent_name=$cat->name;
        $object_childrent->category_childrent_content=$cat->description;;
        $object_childrent->category_childrent_url=get_category_link($c);
        $category_childrent_list[] = array( $object_childrent);
    }
    $object->category_child=$category_childrent_list;
    return($object);
}

// get posts by meta_key and sort
// sort= ASC / DESC
// is_sort_number true/ false
// need get_infor_post($id,$v="v0")
// v0 not have category
function get_posts_by_meta($meta_key,$sort,$is_sort_number,$quantity,$offset,$post_v='v0'){
    global $wpdb;
    $table_prefix=$wpdb->prefix .'postmeta';
    if($is_sort_number){
        if($sort=='DESC'){
            $sql = $wpdb->prepare( "SELECT post_id FROM $table_prefix WHERE meta_key= %s ORDER BY cast(meta_value  as unsigned) DESC LIMIT %d OFFSET %d ",$meta_key,$quantity,$offset);
            $results = $wpdb->get_results( $sql , OBJECT );
        }else{
            $sql = $wpdb->prepare( "SELECT post_id FROM $table_prefix WHERE meta_key= %s ORDER BY cast(meta_value  as unsigned) ASC LIMIT %d OFFSET %d ",$meta_key,$quantity,$offset,$meta_key);
            $results = $wpdb->get_results( $sql , OBJECT );
        }
    }else{
        if($sort=='DESC'){
            $sql = $wpdb->prepare( "SELECT post_id FROM $table_prefix WHERE meta_key= %s ORDER BY meta_value DESC LIMIT %d OFFSET %d ",$meta_key,$quantity,$offset);
            $results = $wpdb->get_results( $sql , OBJECT );
        }else{
            $sql = $wpdb->prepare( "SELECT post_id FROM $table_prefix WHERE meta_key= %s ORDER BY meta_value ASC LIMIT %d OFFSET %d ",$meta_key,$quantity,$offset,$meta_key);
            $results = $wpdb->get_results( $sql , OBJECT );
        }
    }
    $data_posts_list=array();
    foreach($results as $c){
        $id= $c->post_id;
        $post = get_infor_post($id,$post_v);
        $data_posts_list[]=array($post);
    }
    return($data_posts_list);

}
// var_dump(get_posts_by_meta('dac_diem','ASC',false,5,0));
// get posts by meta_key and sort
// sort= ASC / DESC
// is_sort_number true/ false
// need get_infor_category($id)
function get_categorys_by_meta($meta_key,$sort,$is_sort_number,$quantity,$offset){
    global $wpdb;
    $table_prefix=$wpdb->prefix .'termmeta';
    if($is_sort_number){
        if($sort=='DESC'){
            $sql = $wpdb->prepare( "SELECT term_id FROM $table_prefix WHERE meta_key= %s ORDER BY cast(meta_value  as unsigned) DESC LIMIT %d OFFSET %d ",$meta_key,$quantity,$offset);
            $results = $wpdb->get_results( $sql , OBJECT );
        }else{
            $sql = $wpdb->prepare( "SELECT term_id FROM $table_prefix WHERE meta_key= %s ORDER BY cast(meta_value  as unsigned) ASC LIMIT %d OFFSET %d ",$meta_key,$quantity,$offset,$meta_key);
            $results = $wpdb->get_results( $sql , OBJECT );
        }
    }else{
        if($sort=='DESC'){
            $sql = $wpdb->prepare( "SELECT term_id FROM $table_prefix WHERE meta_key= %s ORDER BY meta_value DESC LIMIT %d OFFSET %d ",$meta_key,$quantity,$offset);
            $results = $wpdb->get_results( $sql , OBJECT );
        }else{
            $sql = $wpdb->prepare( "SELECT term_id FROM $table_prefix WHERE meta_key= %s ORDER BY meta_value ASC LIMIT %d OFFSET %d ",$meta_key,$quantity,$offset,$meta_key);
            $results = $wpdb->get_results( $sql , OBJECT );
        }
    }
    $data_categorys_list=array();
    foreach($results as $c){
        $id= $c->term_id;
        $category = get_infor_category($id);
        $data_categorys_list[]=array($category);
    }
    return($data_categorys_list);

}
// get_categorys_by_meta('test_sort_222','ASC',true,2,0);

//*** */ Search post by META_data ==> post id
// test post 11 (1) , 13 (2) , 18 (3), 20 (4)
    // $meta_key='danh_test';//
    // $search_data='11';//
    // $table_prefix=$wpdb->prefix .'postmeta';
    // $sql = $wpdb->prepare( "SELECT post_id FROM $table_prefix WHERE meta_key= %s AND meta_value LIKE %s ",$meta_key,'%'.$search_data.'%');
    // $results = $wpdb->get_results( $sql , ARRAY_A );
    // var_dump($results);
//*** */ Search category by META_data
// test category 3 (1) , 4 (2)
// $meta_key='danh_test';//
// $search_data='thanh cong';//
// $table_prefix=$wpdb->prefix .'termmeta';
// $sql = $wpdb->prepare( "SELECT term_id, meta_key FROM $table_prefix WHERE meta_key= %s AND meta_value LIKE %s ",$meta_key,'%'.$search_data.'%');
// $results = $wpdb->get_results( $sql , ARRAY_A );
// var_dump($results);


// search posts by title
//$post_status * / publish / private
// "data post gồm các thông tin như :
// v1
// + ID
// + title
// + content
// + url post
// + status : public | private ..."
//********* cái này khi nào cần thì lấy; ko nên lấy sẵn */ + meta-all: + img url : cái này là tất cả data các trường meta mà post này nhận được
// v2 ==> thêm các trường này.
// + category list (post)
// + tag list(post)
function search_posts_by_title($data_search,$post_status,$sort,$quantity,$offset,$v="v0"){
    global $wpdb;
    $table_prefix=$wpdb->prefix .'posts';
    if($sort=='ASC'){
        if($post_status=='*'){
            $sql = $wpdb->prepare( "SELECT ID,post_modified,post_content,post_title,post_status,post_author FROM $table_prefix WHERE post_type ='post' AND post_status <> 'auto-draft' AND post_title LIKE %s ORDER BY post_date ASC LIMIT %d OFFSET %d ",'%'.$data_search.'%',$quantity,$offset);
        }else{
            $sql = $wpdb->prepare( "SELECT ID,post_modified,post_content,post_title,post_status,post_author FROM $table_prefix WHERE post_status =%s AND post_status <> 'auto-draft' AND post_type ='post' AND post_title LIKE %s ORDER BY post_date ASC LIMIT %d OFFSET %d ",$post_status,'%'.$data_search.'%',$quantity,$offset);
        }
    }else{
        if($post_status=='*'){
            $sql = $wpdb->prepare( "SELECT ID,post_modified,post_content,post_title,post_status,post_author FROM $table_prefix WHERE post_type ='post' AND post_status <> 'auto-draft' AND post_title LIKE %s ORDER BY post_date DESC LIMIT %d OFFSET %d ",'%'.$data_search.'%',$quantity,$offset);
        }else{
            $sql = $wpdb->prepare( "SELECT ID,post_modified,post_content,post_title,post_status,post_author FROM $table_prefix WHERE post_status =%s AND post_status <> 'auto-draft' AND post_type ='post' AND post_title LIKE %s ORDER BY post_date DESC LIMIT %d OFFSET %d ",$post_status,'%'.$data_search.'%',$quantity,$offset);
        }
    }
    $results = $wpdb->get_results( $sql , OBJECT );
    foreach($results as $x){
        $id=$x->ID;
        $x->post_url=get_permalink($id);
        $x->thumnail_url=get_post_meta($id,'thumnail_url', true);
        $author_id=$x->post_author;
        $x->author_name=get_the_author_meta( 'display_name' ,(int)$author_id );
        if($v=='v1'){
            $post_categories=(wp_get_post_categories($id));
            $category_list=array();
            foreach($post_categories as $c){
                $cat = get_category( $c );
                $object = new stdClass();
                $object->category_id=$c;
                $object->category_name=$cat->name;
                $object->category_url=get_category_link($c);
                $categorys_list[] = array( $object);
            }
            $x->categorys_list=$categorys_list;
            //
            $post_tags=wp_get_post_tags($id);
            $tags_list=array();
            foreach($post_tags as $c){
                $object = new stdClass();
                $object->tag_id=$c->term_id;
                $object->tag_name=$c->name;
                $object->tag_url=get_tag_link($c->term_id);
                $tags_list[] = array( $object);
            }
            $x->tags_list=$tags_list;

        }
    }
    return($results);
}
// var_dump(search_posts_by_title('','*','DESC',6,0,'v1'));

// get all post sort by date
//$post_status * / publish / private
function get_all_posts($post_status,$sort,$quantity,$offset,$v="v0"){
    global $wpdb;
    $table_prefix=$wpdb->prefix .'posts';
    if($sort=='ASC'){
        if($post_status=='*'){
            $sql = $wpdb->prepare( "SELECT ID,post_modified,post_content,post_title,post_status,post_author FROM $table_prefix WHERE post_type ='post' AND post_status <> 'auto-draft' ORDER BY post_date ASC LIMIT %d OFFSET %d ",$quantity,$offset);
        }else{
            $sql = $wpdb->prepare( "SELECT ID,post_modified,post_content,post_title,post_status,post_author FROM $table_prefix WHERE post_status =%s AND post_type ='post' AND post_status <> 'auto-draft' ORDER BY post_date ASC LIMIT %d OFFSET %d ",$post_status,$quantity,$offset);
        }
    }else{
        if($post_status=='*'){
            $sql = $wpdb->prepare( "SELECT ID,post_modified,post_content,post_title,post_status,post_author FROM $table_prefix WHERE post_type ='post' AND post_status <> 'auto-draft' ORDER BY post_date DESC LIMIT %d OFFSET %d ",$quantity,$offset);
        }else{
            $sql = $wpdb->prepare( "SELECT ID,post_modified,post_content,post_title,post_status,post_author FROM $table_prefix WHERE post_status =%s AND post_type ='post' AND post_status <> 'auto-draft' ORDER BY post_date DESC LIMIT %d OFFSET %d ",$post_status,$quantity,$offset);
        }
    }
    $results = $wpdb->get_results( $sql , OBJECT );
    foreach($results as $x){
        $id=$x->ID;
        $x->post_url=get_permalink($id);
        $x->thumnail_url=get_post_meta($id,'thumnail_url', true);
        $author_id=$x->post_author;
        $x->author_name=get_the_author_meta( 'display_name' ,(int)$author_id );
        if($v=='v1'){
            $post_categories=(wp_get_post_categories($id));
            $category_list=array();
            foreach($post_categories as $c){
                $cat = get_category( $c );
                $object = new stdClass();
                $object->category_id=$c;
                $object->category_name=$cat->name;
                $object->category_url=get_category_link($c);
                $categorys_list[] = array( $object);
            }
            $x->categorys_list=$categorys_list;
            //
            $post_tags=wp_get_post_tags($id);
            $tags_list=array();
            foreach($post_tags as $c){
                $object = new stdClass();
                $object->tag_id=$c->term_id;
                $object->tag_name=$c->name;
                $object->tag_url=get_tag_link($c->term_id);
                $tags_list[] = array( $object);
            }
            $x->tags_list=$tags_list;

        }
    }
    return($results);
}
// var_dump(get_all_posts('*','ASC',5,0));
// get all post  by id user create AND sort by date
//$post_status * / publish / private
function get_all_posts_by_user_id($user_id,$sort,$quantity,$offset,$v="v0"){
    global $wpdb;
    $table_prefix=$wpdb->prefix .'posts';
    if($sort=='ASC'){
            $sql = $wpdb->prepare( "SELECT ID,post_modified,post_content,post_title,post_status,post_author FROM $table_prefix WHERE post_type ='post' AND post_status <> 'auto-draft' AND post_author=%d ORDER BY post_date ASC LIMIT %d OFFSET %d ",$user_id,$quantity,$offset);
    }else{
            $sql = $wpdb->prepare( "SELECT ID,post_modified,post_content,post_title,post_status,post_author FROM $table_prefix WHERE post_type ='post' AND post_status <> 'auto-draft' AND post_author=%d  ORDER BY post_date DESC LIMIT %d OFFSET %d ",$user_id,$quantity,$offset);
    }
    $results = $wpdb->get_results( $sql , OBJECT );
    foreach($results as $x){
        $id=$x->ID;
        $x->post_url=get_permalink($id);
        $x->thumnail_url=get_post_meta($id,'thumnail_url', true);
        $author_id=$x->post_author;
        $x->author_name=get_the_author_meta( 'display_name' ,(int)$author_id );
        if($v=='v1'){
            $post_categories=(wp_get_post_categories($id));
            $category_list=array();
            foreach($post_categories as $c){
                $cat = get_category( $c );
                $object = new stdClass();
                $object->category_id=$c;
                $object->category_name=$cat->name;
                $object->category_url=get_category_link($c);
                $categorys_list[] = array( $object);
            }
            $x->categorys_list=$categorys_list;
            //
            $post_tags=wp_get_post_tags($id);
            $tags_list=array();
            foreach($post_tags as $c){
                $object = new stdClass();
                $object->tag_id=$c->term_id;
                $object->tag_name=$c->name;
                $object->tag_url=get_tag_link($c->term_id);
                $tags_list[] = array( $object);
            }
            $x->tags_list=$tags_list;

        }
    }
    return($results);
}

// var_dump(get_all_posts_by_user_id(1,'ASC',5,0,'v0'));
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
// var_dump(check_post_create_by_user(1,20));


function get_posts_by_id_category($id_category,$post_per_page,$offset=0, $sort='DESC',$post_status='publish',$v='v0'){
    global $wpdb;
    // $objects = new stdClass();
    // $count = (get_category($id_category))->count;
    // $objects->count= $count;
    // $objects->offset= $offset;
    // $objects->post_per_page= $post_per_page;
    $args = array('cat' => $id_category, 'orderby' => 'post_date', 'order' =>$sort, 'posts_per_page' => $post_per_page,'post_status' => $post_status,'offset' => $offset);
    $results =query_posts($args);
    $list_posts_data=array();    
    foreach($results as $x){
        $result = new stdClass();
        // ID,post_modified,post_content,post_title,post_status 
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
        if($v=='v1'){
            $post_categories=(wp_get_post_categories($id));
            $categorys_list=array();
            foreach($post_categories as $c){
                $cat = get_category( $c );
                $object = new stdClass();
                $object->category_id=$c;
                $object->category_name=$cat->name;
                $object->category_url=get_category_link($c);
                $categorys_list[] = array( $object);
            }
            $result->categorys_list=$categorys_list;
            //
            $post_tags=wp_get_post_tags($id);
            $tags_list=array();
            foreach($post_tags as $c){
                $object = new stdClass();
                $object->tag_id=$c->term_id;
                $object->tag_name=$c->name;
                $object->tag_url=get_tag_link($c->term_id);
                $tags_list[] = array( $object);
            }
            $result->tags_list=$tags_list;
    
        }
        $list_posts_data[]=array($result);
    }
    // $objects->posts_list=$list_posts_data;
    return($list_posts_data);
}
// var_dump(get_posts_by_id_category(3,4,0,'ASC','publish','v0'));

function get_posts_by_id_tag($id_category,$post_per_page,$offset=0, $sort='DESC',$post_status='publish',$v='v0'){
    global $wpdb;
    // $objects = new stdClass();
    // $count = (get_tag($id_category))->count;
    // $objects->count= $count;
    // $objects->offset= $offset;
    // $objects->post_per_page= $post_per_page;
    $args = array('tag_id' => $id_category, 'orderby' => 'post_date', 'order' =>$sort, 'posts_per_page' => $post_per_page,'post_status' => $post_status,'offset' => $offset);
    $results =query_posts($args);
    $list_posts_data=array();    
    foreach($results as $x){
        
        $result = new stdClass();
        // ID,post_modified,post_content,post_title,post_status 
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
        if($v=='v1'){
            $post_categories=(wp_get_post_categories($id));
            $category_list=array();
            foreach($post_categories as $c){
                $cat = get_category( $c );
                $object = new stdClass();
                $object->category_id=$c;
                $object->category_name=$cat->name;
                $object->category_url=get_category_link($c);
                $categorys_list[] = array( $object);
            }
            $result->categorys_list=$categorys_list;
            //
            $post_tags=wp_get_post_tags($id);
            $tags_list=array();
            foreach($post_tags as $c){
                $object = new stdClass();
                $object->tag_id=$c->term_id;
                $object->tag_name=$c->name;
                $object->tag_url=get_tag_link($c->term_id);
                $tags_list[] = array( $object);
            }
            $result->tags_list=$tags_list;
    
        }
        $list_posts_data[]=array($result);
    }
    // $objects->posts_list=$list_posts_data;
    return($list_posts_data);
}
// var_dump(get_posts_by_id_tag(5,4,0,'ASC','publish','v0'));

// DElete post
function delete_post_by_id($id){
    wp_delete_post($id,true);
}
// delete_post_by_id(29);
// Create post
//  title, content, status, meta_input, catgory, tag
// create_post('$thanhviendangki','$thanhviendangki','publish','3,4','danhx1,danhx2,danhx3',array('mo_ta_ngan' => '$mo_ta_ngan','dac_diem' => '$dac_diem'),'anbinhnew');
function create_post($title,$content,$status,$category_arr,$tag_arr,$meta_input_arr,$thumnail_url){
    $category_arr=explode(",",$category_arr);
    $tag_arr=array_unique(array_filter(explode(',',$tag_arr)));
    // Create post object
    $my_post = array(
        'post_title'    => $title,
        'post_content'  => $content,
        'post_status'   => $status,
        'post_category' => $category_arr,
        'tags_input' => $tag_arr,
        'meta_input'    =>$meta_input_arr
        // 'tags_input' =>  array_unique(array_filter(explode(',', 'bàn học,giường sắt')))
        // 'meta_input'    => array(
        //     'mo_ta_ngan' => '$mo_ta_ngan',
        //     'gia_san_pham' => '$price',
        //     'dac_diem' => '$dac_diem',
        // )
    );
    // Insert the post into the database
    $post_ID=wp_insert_post( $my_post );
    add_post_meta($post_ID,'thumnail_url',$thumnail_url, true);
    return $post_ID;
}
// create_post('$tite','$content','publish','3,4','danhx1,danhx2,danhx3',array('mo_ta_ngan' => '$mo_ta_ngan','dac_diem' => '$dac_diem'),"anbinhnew.com");
// Create post
//  title, content, status, meta_input, catgory, tag
// create_post('$tite','$content','publish','3,4','danhx1,danhx2,danhx3',array('mo_ta_ngan' => '$mo_ta_ngan','dac_diem' => '$dac_diem'));
function update_post($id_post,$title,$content,$status,$category_arr,$tag_arr,$meta_input,$thumnail_url){
    $category_arr=explode(",",$category_arr);
    $tag_arr=array_unique(array_filter(explode(',',$tag_arr)));
    // Create post object
    $my_post = array(
        'ID'            =>$id_post,
        'post_title'    => $title,
        'post_content'  => $content,
        'post_status'   => $status,
        'post_category' => $category_arr,
        'tags_input' => $tag_arr,
        'meta_input'    =>$meta_input
        // 'tags_input' =>  array_unique(array_filter(explode(',', 'bàn học,giường sắt')))
        // 'meta_input'    => array(
        //     'mo_ta_ngan' => '$mo_ta_ngan',
        //     'gia_san_pham' => '$price',
        //     'dac_diem' => '$dac_diem',
        // )
    );
    // Insert the post into the database
    $post_ID=wp_update_post( $my_post );
    if(isset($thumnail_url)&&$thumnail_url!=""){
        update_post_meta( $post_ID, 'thumnail_url', $thumnail_url);
    }
    return $post_ID;
}
// update_post(29,'$tite_update','$content_update','publish','3,4','danhx1_update,danhx2,danhx3',array('mo_ta_ngan' => '$mo_ta_ngan_update','dac_diem' => '$dac_diem_update'));

// Delete category  by id
function delete_category($id){
    wp_delete_category($id);
}
// delete_category(23);

// Create category
function create_category($category_name,$category_description,$category_parent_id,$thumnail_url){
    if ( ! function_exists( 'wp_insert_category' ) ) require_once(ABSPATH . 'wp-admin/includes/taxonomy.php'); 
    $my_category= array(
        'cat_name'    => $category_name,
        'category_description'  => $category_description,
        'category_parent'   => $category_parent_id
    );
    $category_ID=wp_insert_category($my_category);
    add_term_meta( $category_ID, 'thumnail_url', $thumnail_url, true);
    return $category_ID;
}
// create_category('$category_name','$category_description',4,'$thumnail_url');
// var_dump(get_infor_category(21));
// Update category
function update_category($id,$category_name,$category_description,$category_parent_id,$thumnail_url){
    if ( ! function_exists( 'wp_insert_category' ) ) require_once(ABSPATH . 'wp-admin/includes/taxonomy.php'); 
    $my_category= array(
        'cat_ID'    => $id,
        'cat_name'    => $category_name,
        'category_description'  => $category_description,
        'category_parent'   => $category_parent_id
    );
    $category_ID=wp_insert_category($my_category);
    add_term_meta( $category_ID, 'thumnail_url', $thumnail_url, true);
    return $category_ID;
}
// update_category(4,'$category_namexxx','$category_descriptionxxx',3,'$thumnail_urlxx');

// Delete img
function delete_img_by_id($id){
    $name= explode("uploads",get_post_meta( $id, '_wp_attached_file', true ));
    $uploads = wp_get_upload_dir();
    $file = $uploads['basedir'] . $name[1];
    wp_delete_file($file);
    wp_delete_attachment($id,false);
}

// delete_img_by_id(63);

function get_images($quantity,$offset){
    $query_images_args = array(
        'post_type'      => 'attachment',
        'post_mime_type' => 'image',
        'post_status'    => 'inherit',
        'posts_per_page' => $quantity,
        'offset'=>$offset,
        'order'=> 'DESC'
    );
    
    $query_images = new WP_Query( $query_images_args);            
    // $myArray = array();
    foreach ( $query_images->posts as $image ) {
        $myArray[] = (object) ['id' => $image->ID,'url'=>wp_get_attachment_url( $image->ID ),'post_title'=>$image->post_title];
    }
    return($myArray);
}

// get_images(10,2);

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

// get_all_categorys();
 function get_all_tags(){
    $tags = get_tags(array(
        'taxonomy' => 'post_tag',
        'orderby' => 'name',
        'hide_empty' => false // for development
      ));
    $tags_list=array();
    foreach($tags as $c){
        $object = new stdClass();
        $object->tag_id=$c->term_id;
        $object->tag_name=$c->name;
        $object->tag_url=get_tag_link($c->term_id);
        $tags_list[] = array( $object);
    }
    return  $tags_list;
 }
//  var_dump(get_all_tags());

// **********tạo bảng theo yêu cầu của bản thân //http://dienloi.com/bai-35-huong-dan-tao-bang-moi-trong-database-wordpress.html
//    function hk_CreatDatabaseContacts(){
//         global $wpdb;
//         $charsetCollate = $wpdb->get_charset_collate();
//         $cacheCate = $wpdb->prefix . 'cache_cate';
//         $createTable = "CREATE TABLE IF NOT EXISTS `{$cacheCate}` (
//             `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
//             `id_cate` bigint(20) UNSIGNED NOT NULL,
//             `title` varchar(255) NULL,
//             `tu_khoa_lien_quan` varchar(20) NULL,
//             `short_des` longtext NULL,
//             `data_mp3` longtext NULL,
//             `date` timestamp NOT NULL,
//             PRIMARY KEY (`id`)
//         ) {$charsetCollate};";
//         require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
//         dbDelta( $createTable );
//     }
//     add_action('init', 'hk_CreatDatabaseContacts');

// ************get table  list

// function get_data_list_of_table(,,){
//     global $wpdb;
//     $table_prefix=$wpdb->prefix .'name_table';
//     $sql = $wpdb->prepare( "SELECT id,id_cate,title FROM $table_prefix WHERE post_type ='post' AND post_status <> 'auto-draft' ORDER BY post_date ASC LIMIT %d OFFSET %d ",$quantity,$offset);
//     $results = $wpdb->get_results( $sql , OBJECT );
// }

// *********add data to table
// function add_data_base($ten,$sdt,$dia_chi,$ghi_chu,$ten_sp,$kich_thuoc,$so_luong,$url,$gia){
//     $data = array(
// 	    'ten' => $ten,
// 	    'sdt' => $sdt,
// 	    'dia_chi' => $dia_chi,
// 	    'ghi_chu' => $ghi_chu,
// 	    'ten_sp' => $ten_sp,
// 	    'kich_thuoc' => $kich_thuoc,
// 	    'so_luong' => $so_luong,
// 	    'url' => $url,
// 	    'gia' => $gia,
// 	    'date' => current_time( 'mysql')
// 	);
// 	global $wpdb;
// 	$table = $wpdb->prefix . 'users_order';
// 	$wpdb->insert(
// 	    $table,
// 	    $data
// 	);
// 	$contact = $wpdb->insert_id;
//   }

// *********sua data by id
// $data = array(
//     'name' => 'Võ Quang Huy',
//     'email' => 'huykira@gmail.com',
//     'phone' => '0908888888',
//     'address' => 'Thạch Thang, Hải Châu, Tp.Đà Nẵng',
//     'content' => 'Mình cần làm website, bạn có thể báo giá cho mình được không!',
//     'date' => current_time( 'mysql' )
// );
// global $wpdb;
// $id = 1;
// $table = $wpdb->prefix . 'contacts';
// $update = $wpdb->update(
//     $table,
//     $data,
//     array('id' => $id)
// );

//*************** */ Xoa data
// global $wpdb;
// $id = 1;
// $table = $wpdb->prefix . 'contacts';
// $delete = $wpdb->delete(
//     $table,
//     array( 'id' => $id ),
//     array( '%d' )
// );

//*************************page */

// get all page
function get_all_page($post_status,$sort,$quantity,$offset){
    global $wpdb;
    $table_prefix=$wpdb->prefix .'posts';
    if($sort=='ASC'){
        if($post_status=='*'){
            $sql = $wpdb->prepare( "SELECT ID,post_modified,post_content,post_title,post_status FROM $table_prefix WHERE post_type ='page' AND post_status <> 'auto-draft' ORDER BY post_date ASC LIMIT %d OFFSET %d ",$quantity,$offset);
        }else{
            $sql = $wpdb->prepare( "SELECT ID,post_modified,post_content,post_title,post_status FROM $table_prefix WHERE post_status =%s AND post_type ='page' AND post_status <> 'auto-draft' ORDER BY post_date ASC LIMIT %d OFFSET %d ",$post_status,$quantity,$offset);
        }
    }else{
        if($post_status=='*'){
            $sql = $wpdb->prepare( "SELECT ID,post_modified,post_content,post_title,post_status FROM $table_prefix WHERE post_type ='page' AND post_status <> 'auto-draft' ORDER BY post_date DESC LIMIT %d OFFSET %d ",$quantity,$offset);
        }else{
            $sql = $wpdb->prepare( "SELECT ID,post_modified,post_content,post_title,post_status FROM $table_prefix WHERE post_status =%s AND post_type ='page' AND post_status <> 'auto-draft' ORDER BY post_date DESC LIMIT %d OFFSET %d ",$post_status,$quantity,$offset);
        }
    }
    $results = $wpdb->get_results( $sql , OBJECT );
    foreach($results as $x){
        $id=$x->ID;
        $x->post_url=get_permalink($id);
        $x->thumnail_url=get_post_meta($id,'thumnail_url', true);
    }
    return($results);
}
// var_dump(get_all_page('publish','ASC',3,0));
// get infor PAGE
function get_infor_page($id){
    global $wpdb;
    // get infor posst : ID, post_Date, title, content, *url post, status, meta-all
    $table_prefix=$wpdb->prefix .'posts';
    $sql = $wpdb->prepare( "SELECT ID,post_modified,post_content,post_title,post_status FROM $table_prefix WHERE ID= %s ",$id);
    $results = $wpdb->get_results( $sql , OBJECT );
    $result=$results[0];
    $result->post_url=get_permalink($id);
    $result->thumnail_url=get_post_meta($id,'thumnail_url', true);

    $table_prefix=$wpdb->prefix .'postmeta';
    $sql = $wpdb->prepare( "SELECT meta_key,meta_value FROM $table_prefix WHERE post_id=%s AND meta_key <> '_edit_lock' ",$id);
    $a2 = $wpdb->get_results( $sql , OBJECT );
    $rs2=array();
    foreach($a2 as $x){
        $rs2[$x->meta_key]=$x->meta_value;
    }
    $result->meta_data=$rs2;
    return($result);
}
// (get_infor_page(75));
function create_page($title,$content,$status,$meta_input_arr,$thumnail_url){
    // Create post object
    $my_post = array(
        'post_title'    => $title,
        'post_content'  => $content,
        'post_status'   => $status,
        'post_type'      => 'page',
        'meta_input'    =>$meta_input_arr
        // 'meta_input'    => array(
        //     'mo_ta_ngan' => '$mo_ta_ngan',
        //     'gia_san_pham' => '$price',
        //     'dac_diem' => '$dac_diem',
        // )
    );
    // Insert the post into the database
    $post_ID=wp_insert_post( $my_post );
    add_post_meta($post_ID,'thumnail_url',$thumnail_url, true);
    return $post_ID;
}
// var_dump(create_page('$tite','$content','publish',array('mo_ta_ngan' => '$mo_ta_ngan','dac_diem' => '$dac_diem'),'anbinhnew.com'));
// update page
function update_page($id_post,$title,$content,$status,$meta_input_arr,$thumnail_url){
    // Create post object
    $my_post = array(
        'ID'            =>$id_post,
        'post_title'    => $title,
        'post_content'  => $content,
        'post_status'   => $status,
        'post_type'      => 'page',
        'meta_input'    =>$meta_input_arr
        // 'tags_input' =>  array_unique(array_filter(explode(',', 'bàn học,giường sắt')))
        // 'meta_input'    => array(
        //     'mo_ta_ngan' => '$mo_ta_ngan',
        //     'gia_san_pham' => '$price',
        //     'dac_diem' => '$dac_diem',
        // )
    );
    // Insert the post into the database
    $post_ID=wp_update_post( $my_post );
    if(isset($thumnail_url)&&$thumnail_url!=""){
        update_post_meta( $post_ID, 'thumnail_url', $thumnail_url);
    }
    return $post_ID;
}
// update_page(75,'$tite_update 1111 ','$content_updatex 1111','publish',array('mo_ta_ngan' => '$mo_ta_ngan_update 111','dac_diem' => '$dac_diem_update 111'),'google.com');

// DElete post
function delete_page_by_id($id){
    wp_delete_post($id,true);
}
// delete_page_by_id(75);






function create_table_home(){
    global $wpdb;
    $charsetCollate = $wpdb->get_charset_collate();
    $name_table = $wpdb->prefix . 'hoke';
    $createTable = "CREATE TABLE IF NOT EXISTS `{$name_table}` (
        `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `key` varchar(50) NULL,
        `value` longtext NULL,
        PRIMARY KEY (`id`)
    ) {$charsetCollate};";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $createTable );
}
// hk_CreatDatabaseContacts();
function is_table_created($table_name){
    global $wpdb;
    $query = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $table_name ) );
    if ( $wpdb->get_var( $query ) === $table_name ) {
        return true;
    }else{
        return false;
    }
}
// var_dump(is_table_created('wp_test_danh'));



function create_pagexx($titleS,$contentS,$statusS,$metaA,$thumnailS){

    $label = array(
        'name' => 'Các landing Page', //Tên post type dạng số nhiều
        'singular_name' => 'Landing Page' //Tên post type dạng số ít
    );
    $args = array(
        'labels' => $label, //Gọi các label trong biến $label ở trên
        'description' => 'description', //Mô tả của post type
        'supports' => array(
        'title',
        'editor',
        'excerpt',
        'author',
        'thumbnail',
        'comments',
        'trackbacks',
        'revisions',
        'custom-fields'
        ),
        'taxonomies' => array(), //Các taxonomy được phép sử dụng để phân loại nội dung
        'hierarchical' => true, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
        'public' => true, //Kích hoạt post type
        'show_ui' => false, //Hiển thị khung quản trị như Post/Page
        'show_in_menu' => false, //Hiển thị trên Admin Menu (tay trái)
        'show_in_nav_menus' => false, //Hiển thị trong Appearance -> Menus
        'show_in_admin_bar' => false, //Hiển thị trên thanh Admin bar màu đen.
        'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
        'menu_icon' => '', //Đường dẫn tới icon sẽ hiển thị
        'can_export' => true, //Có thể export nội dung bằng Tools -> Export
        'has_archive' => true, //Cho phép lưu trữ (month, date, year)
        'exclude_from_search' => true, //Loại bỏ khỏi kết quả tìm kiếm
        'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
        'capability_type' => 'post' //
    );
    register_post_type('zshare_vn_ldp', $args);
    $my_post = array(
        'post_title'    => $titleS,
        'post_content'  => $contentS,
        'post_status'   => $statusS,
        'post_type'      => 'zshare_vn_ldp',
        'meta_input'    =>$metaA
    );
    $post_ID=wp_insert_post( $my_post );
    add_post_meta($post_ID,'thumnail_url',$thumnailS, true);
}
// create_pagexx('$titleS','$contentS','publish',array('data'=>'data'),'$thumnailS');
// echo '123';
?>