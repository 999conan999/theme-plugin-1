<?php
//Header set Access-Control-Allow-Origin "*"
    function fs_get_data_theme($keyz){
        global $wpdb;
        $table_prefix = $wpdb->prefix . 'data_theme';
        $sql = $wpdb->prepare( "SELECT keyz,valuez FROM $table_prefix WHERE keyz =%s ",$keyz);
        $results = $wpdb->get_results( $sql , OBJECT );
        if(count($results)>0){
            return json_decode($results[0]->valuez);
        }else{
            return 'null';
        }
    }
    function get_posts_list_footer_post($quantity,$offset){
       global $wpdb;
       $table_prefix=$wpdb->prefix .'posts';
       $sql = $wpdb->prepare( "SELECT ID,post_title FROM $table_prefix WHERE post_type ='post' AND  post_status = 'publish' ORDER BY post_date DESC LIMIT %d OFFSET %d ",$quantity,$offset);
       $results = $wpdb->get_results( $sql , OBJECT );
       foreach($results as $x){
           $id=$x->ID;
           $x->url=get_permalink($id);
        //    $x->thumnail=get_post_meta($id,'thumnail_url', true);
       }
       return($results);
    }
    function fs_get_posts_by_list_id($arr){
        $rs=array();
        foreach($arr as $post){
            $idP=$post->value;
            $obj= new stdClass();
            $obj->title=get_the_title($idP);
            $obj->url=get_permalink($idP);
            $obj->thumnail=get_post_meta($idP,'thumnail_url', true);
            array_push($rs,$obj);
        }
        return $rs;

    }
    function fs_get_post_by_category_id($id_cate,$quantity_post,$offset=0){
        global $wpdb;
        $list_childrent=(get_term_children($id_cate,'category'));
        $args = array('cat' => $id_cate, 'orderby' => 'post_date', 'order' =>'DESC', 'posts_per_page' => $quantity_post,'post_status' => 'publish','offset' => $offset,'category__not_in' =>$list_childrent);
        $results =query_posts($args);
        //
        $cat = get_category($id_cate);
        $obj=$object = new stdClass();
        $obj->category_id=$cat->term_id;
        $obj->count=$cat->count;
        $obj->category_name=$cat->name;
        $obj->category_thumnail_url=get_term_meta($id_cate,'thumnail_url', true);
        $obj->descriptions=json_decode(get_term_meta($id_cate,'metaA', true))->descriptions;
        $obj->category_url=get_category_link($cat->term_id);
        $list_posts=array(); 
        foreach($results as $x){
            $result = new stdClass();
            $result->post_modified=$x->post_modified;
            $result->id=$x->ID;
            $result->post_title=$x->post_title;
            $metaA=json_decode(get_post_meta($x->ID,'metaA', true));
            $result->descriptions=$metaA->descriptions;
            $result->post_url=get_permalink($x->ID);
            $result->thumnail_url=get_post_meta($x->ID,'thumnail_url', true);
            array_push($list_posts,$result);
        };
        $obj->list_posts=$list_posts;
        return $obj;
    }
    function fs_get_category_and_post_by_id_post($id){
        $category_list_id=wp_get_post_categories($id);
        $cat_id=$category_list_id[count($category_list_id)-1];
        $cat = get_category($cat_id);
        $object = new stdClass();
        $object->category_id=$cat_id;
        $object->category_name=$cat->name;
        $object->category_url=get_category_link($cat_id);
        $metaA_cat=json_decode(get_term_meta($cat_id,'metaA', true));
        // var_dump($metaA_cat);
        global $wpdb;
        $table_prefix=$wpdb->prefix .'posts';
        $list_posts=array();
        if(isset($metaA_cat->treeData)&&count($metaA_cat->treeData)>0&&$metaA_cat->treeData!=''){
            // get data by treedata
            foreach($metaA_cat->treeData as $post){
                $idP=$post->value;
                $sql = $wpdb->prepare( "SELECT ID,post_title FROM $table_prefix WHERE ID= %d ",$idP);
                $results = $wpdb->get_results( $sql , OBJECT );
                if(count($results)>0){
                    $obj= new stdClass();
                    $obj->title=$results[0]->post_title;
                    $obj->id=$results[0]->ID;
                    $obj->url=get_permalink($idP);
                    array_push($list_posts,$obj);
                }
            }
        }else{
            $args = array('cat' => $cat_id, 'orderby' => 'post_date', 'order' =>'DESC', 'posts_per_page' => 25,'post_status' => 'publish','offset' => 0);
            $results =query_posts($args);
            foreach($results as $x){
                $obj = new stdClass();
                $obj->id=$x->ID;
                $obj->title=$x->post_title;
                $obj->url=get_permalink($x->ID);
                array_push($list_posts,$obj);
            };
        }
        $object->list_post=$list_posts;
        return $object;
    }
    function fs_get_info_post_card($id){
        global $wpdb;
        $table_prefix=$wpdb->prefix .'posts';
        $sql = $wpdb->prepare( "SELECT ID,post_modified,post_title FROM $table_prefix WHERE ID= %d ",$id);
        $results = $wpdb->get_results( $sql , OBJECT );
        if(count($results)>0){
            $result = new stdClass();
            $result->post_modified=$results[0]->post_modified;
            $result->id=$results[0]->ID;
            $result->post_title=$results[0]->post_title;
            $result->post_url=get_permalink($results[0]->ID);
            $result->thumnail_url=get_post_meta($results[0]->ID,'thumnail_url', true);
            return $result;
        }else{
            $result = new stdClass();
            $result->post_modified='';
            $result->post_title='';
            $result->post_url='';
            $result->thumnail_url='';
            return $result;
        }
    }
    function fs_check_category_created($id){
        global $wpdb;
        $table_prefix=$wpdb->prefix .'term_taxonomy';
        $sql = $wpdb->prepare( "SELECT COUNT(term_taxonomy_id) FROM $table_prefix WHERE term_id= %d AND taxonomy='category' ",$id);
        $results = $wpdb->get_results( $sql , ARRAY_A );
        if((int)$results[0]["COUNT(term_taxonomy_id)"]>0) return true;
        return false;
    }
    function fs_get_child_category_by_category_parent_id($id){//home
        $cat = get_category( $id);
        $object = new stdClass();
        $object->category_id=$cat->term_id;
        $object->category_name=$cat->name;
        $object->category_url=get_category_link($cat->term_id);
        $list_childrent=(get_term_children($id,'category'));
        $category_childrent_list=array();
        foreach($list_childrent as $c){
            $cat = get_category( $c );
            $object_childrent = new stdClass();
            $object_childrent->category_childrent_id=$c;
            $object_childrent->category_childrent_name=$cat->name;
            $object_childrent->category_childrent_url=get_category_link($c);
            $object_childrent->category_childrent_thumnail=get_term_meta($c,'thumnail_url', true);
            array_push($category_childrent_list,$object_childrent);
        }
        $object->category_child_list=$category_childrent_list;
        return $object;
    }
    function fs_get_info_category_by_id_show_cate($id){//category show category list
        $cat = get_category( $id);
        $object = new stdClass();
        $object->category_id=$cat->term_id;
        $object->category_name=$cat->name;
        $object->category_url=get_category_link($cat->term_id);
        $object->category_thumnail_url=get_term_meta($id,'thumnail_url', true);
        $metaA=json_decode(get_term_meta($id,'metaA', true));
        $object->descriptions=$metaA->descriptions;
        $list_childrent=(get_term_children($id,'category'));
        $category_childrent_list=array();
        foreach($list_childrent as $c){
            $cat = get_category( $c );
            $object_childrent = new stdClass();
            $object_childrent->category_childrent_id=$c;
            $object_childrent->category_childrent_name=$cat->name;
            $object_childrent->category_childrent_url=get_category_link($c);
            $object_childrent->category_childrent_thumnail=get_term_meta($c,'thumnail_url', true);
            $metaA=json_decode(get_term_meta($c,'metaA', true));
            $object_childrent->descriptions=$metaA->descriptions;
            array_push($category_childrent_list,$object_childrent);
        }
        $object->category_child_list=$category_childrent_list;
        return $object;
    }
    function fixForUri($strX, $options = array()) {
        $str=delete_all_between("(",")",$strX);
        // Make sure string is in UTF-8 and strip invalid UTF-8 characters
        $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
        
        $defaults = array(
            'delimiter' => '-',
            'limit' => null,
            'lowercase' => true,
            'replacements' => array(),
            'transliterate' => true,
        );
        
        // Merge options
        $options = array_merge($defaults, $options);
        
        // Lowercase
        if ($options['lowercase']) {
            $str = mb_strtolower($str, 'UTF-8');
        }
        
        $char_map = array(
            // Latin
            'á' => 'a', 'à' => 'a', 'ả' => 'a', 'ã' => 'a', 'ạ' => 'a', 'ă' => 'a', 'ắ' => 'a', 'ằ' => 'a', 'ẳ' => 'a', 'ẵ' => 'a', 'ặ' => 'a', 'â' => 'a', 'ấ' => 'a', 'ầ' => 'a', 'ẩ' => 'a', 'ẫ' => 'a', 'ậ' => 'a', 'đ' => 'd', 'é' => 'e', 'è' => 'e', 'ẻ' => 'e', 'ẽ' => 'e', 'ẹ' => 'e', 'ê' => 'e', 'ế' => 'e', 'ề' => 'e', 'ể' => 'e', 'ễ' => 'e', 'ệ' => 'e', 'í' => 'i', 'ì' => 'i', 'ỉ' => 'i', 'ĩ' => 'i', 'ị' => 'i', 'ó' => 'o', 'ò' => 'o', 'ỏ' => 'o', 'õ' => 'o', 'ọ' => 'o', 'ô' => 'o', 'ố' => 'o', 'ồ' => 'o', 'ổ' => 'o', 'ỗ' => 'o', 'ộ' => 'o', 'ơ' => 'o', 'ớ' => 'o', 'ờ' => 'o', 'ở' => 'o', 'ỡ' => 'o', 'ợ' => 'o', 'ú' => 'u', 'ù' => 'u', 'ủ' => 'u', 'ũ' => 'u', 'ụ' => 'u', 'ư' => 'u', 'ứ' => 'u', 'ừ' => 'u', 'ử' => 'u', 'ữ' => 'u', 'ự' => 'u', 'ý' => 'y', 'ỳ' => 'y', 'ỷ' => 'y', 'ỹ' => 'y', 'ỵ' => 'y'
        );
        
        // Make custom replacements
        $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
        
        // Transliterate characters to ASCII
        if ($options['transliterate']) {
            $str = str_replace(array_keys($char_map), $char_map, $str);
        }
        
        // Replace non-alphanumeric characters with our delimiter
        $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
        
        // Remove duplicate delimiters
        $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
        
        // Truncate slug to max. characters
        $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
        
        // Remove delimiter from ends
        $str = trim($str, $options['delimiter']);
        
        return $str;
        }
        // xoa tat ca ki tu ben trong 2 truong cho truoc
        function delete_all_between($beginning, $end, $string) {
            $beginningPos = strpos($string, $beginning);
            $endPos = strpos($string, $end);
            if ($beginningPos === false || $endPos === false) {
            return $string;
            }
        
            $textToDelete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos);
        
            return delete_all_between($beginning, $end, str_replace($textToDelete, '', $string)); // recursion to ensure all occurrences are replaced
        } 













?>