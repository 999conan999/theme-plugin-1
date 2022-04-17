
<?php
//    function fixForUri($strX, $options = array()) {
//     $str=delete_all_between("(",")",$strX);
// 	// Make sure string is in UTF-8 and strip invalid UTF-8 characters
// 	$str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
	
// 	$defaults = array(
// 		'delimiter' => '-',
// 		'limit' => null,
// 		'lowercase' => true,
// 		'replacements' => array(),
// 		'transliterate' => true,
// 	);
	
// 	// Merge options
// 	$options = array_merge($defaults, $options);
	
// 	// Lowercase
// 	if ($options['lowercase']) {
// 		$str = mb_strtolower($str, 'UTF-8');
// 	}
	
// 	$char_map = array(
// 		// Latin
// 		'á' => 'a', 'à' => 'a', 'ả' => 'a', 'ã' => 'a', 'ạ' => 'a', 'ă' => 'a', 'ắ' => 'a', 'ằ' => 'a', 'ẳ' => 'a', 'ẵ' => 'a', 'ặ' => 'a', 'â' => 'a', 'ấ' => 'a', 'ầ' => 'a', 'ẩ' => 'a', 'ẫ' => 'a', 'ậ' => 'a', 'đ' => 'd', 'é' => 'e', 'è' => 'e', 'ẻ' => 'e', 'ẽ' => 'e', 'ẹ' => 'e', 'ê' => 'e', 'ế' => 'e', 'ề' => 'e', 'ể' => 'e', 'ễ' => 'e', 'ệ' => 'e', 'í' => 'i', 'ì' => 'i', 'ỉ' => 'i', 'ĩ' => 'i', 'ị' => 'i', 'ó' => 'o', 'ò' => 'o', 'ỏ' => 'o', 'õ' => 'o', 'ọ' => 'o', 'ô' => 'o', 'ố' => 'o', 'ồ' => 'o', 'ổ' => 'o', 'ỗ' => 'o', 'ộ' => 'o', 'ơ' => 'o', 'ớ' => 'o', 'ờ' => 'o', 'ở' => 'o', 'ỡ' => 'o', 'ợ' => 'o', 'ú' => 'u', 'ù' => 'u', 'ủ' => 'u', 'ũ' => 'u', 'ụ' => 'u', 'ư' => 'u', 'ứ' => 'u', 'ừ' => 'u', 'ử' => 'u', 'ữ' => 'u', 'ự' => 'u', 'ý' => 'y', 'ỳ' => 'y', 'ỷ' => 'y', 'ỹ' => 'y', 'ỵ' => 'y'
// 	);
	
// 	// Make custom replacements
// 	$str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
	
// 	// Transliterate characters to ASCII
// 	if ($options['transliterate']) {
// 		$str = str_replace(array_keys($char_map), $char_map, $str);
// 	}
	
// 	// Replace non-alphanumeric characters with our delimiter
// 	$str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
	
// 	// Remove duplicate delimiters
// 	$str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
	
// 	// Truncate slug to max. characters
// 	$str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
	
// 	// Remove delimiter from ends
// 	$str = trim($str, $options['delimiter']);
	
// 	return $str;
//     }
//     // xoa tat ca ki tu ben trong 2 truong cho truoc
//     function delete_all_between($beginning, $end, $string) {
//         $beginningPos = strpos($string, $beginning);
//         $endPos = strpos($string, $end);
//         if ($beginningPos === false || $endPos === false) {
//         return $string;
//         }
    
//         $textToDelete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos);
    
//         return delete_all_between($beginning, $end, str_replace($textToDelete, '', $string)); // recursion to ensure all occurrences are replaced
//     } 
?>
<?php 
    /**
     * Breadcrumb
     */
    // function dimox_breadcrumbs_destop() {
    //     $delimiter = '';
    //     $home = 'Home'; // chữ thay thế cho phần 'Home' link
    //     $before = '<a href="#">'; // thẻ html đằng trước mỗi link
    //     $after = '</a>'; // thẻ đằng sau mỗi link
    //     $result="";
    //     if ( !is_home() && !is_front_page() || is_paged() ) {
    //         $result .= '';
    //         global $post;
    //         $homeLink = get_bloginfo('url');
    //         $result .= '<a href="'.$homeLink.'" >Home</a>' . $delimiter . ' ';
    //         if ( is_category() ) {
    //             global $wp_query;
    //             $cat_obj = $wp_query->get_queried_object();
    //             $thisCat = $cat_obj->term_id;
    //             $thisCat = get_category($thisCat);
    //             $parentCat = get_category($thisCat->parent);
    //             if ($thisCat->parent != 0) $result .=(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
    //             $result .= $before . single_cat_title('', false) . $after;
    //         } elseif ( is_day() ) {
    //             $result .= '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
    //             $result .= '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
    //             $result .= $before . get_the_time('d') . $after;
    //         } elseif ( is_month() ) {
    //             $result .= '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
    //             $result .= $before . get_the_time('F') . $after;
    //         } elseif ( is_year() ) {
    //             $result .= $before . get_the_time('Y') . $after;
    //         } elseif ( is_single() && !is_attachment() ) {
    //             if ( get_post_type() != 'post' ) {
                    
    //                 $post_type = get_post_type_object(get_post_type());
    //                 $slug = $post_type->rewrite;
    //                 $result .= '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
    //                 $result .= $before . get_the_title() . $after;
    //             } else {
                    
    //                 $cat = get_the_category(); $cat = $cat[0];
    //                 $result .= get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
    //                 $result .= $before . get_the_title() . $after;
    //             }
    //         } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
    //             $post_type = get_post_type_object(get_post_type());
    //             $result .= $before . $post_type->labels->singular_name . $after;
    //         } elseif ( is_attachment() ) {
    //             $parent = get_post($post->post_parent);
    //             $cat = get_the_category($parent->ID); $cat = $cat[0];
    //             $result .= get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
    //             $result .= '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
    //             $result .= $before . get_the_title() . $after;
    //         } elseif ( is_page() && !$post->post_parent ) {
    //             $result .= $before . get_the_title() . $after;
    //         } elseif ( is_page() && $post->post_parent ) {
    //             $parent_id = $post->post_parent;
    //             $breadcrumbs = array();
    //             while ($parent_id) {
    //                 $page = get_page($parent_id);
    //                 $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
    //                 $parent_id = $page->post_parent;
    //             }
    //             $breadcrumbs = array_reverse($breadcrumbs);
    //             foreach ($breadcrumbs as $crumb) $result .= $crumb . ' ' . $delimiter . ' ';
    //             $result .= $before . get_the_title() . $after;
    //         } elseif ( is_search() ) {
    //             $result .= $before . 'Search results for "' . get_search_query() . '"' . $after;
    //         } elseif ( is_tag() ) {
    //             $result .= $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
    //         } elseif ( is_author() ) {
    //             global $author;
    //             $result .= $before . 'Articles posted by ' . $userdata->display_name . $after;
    //         } elseif ( is_404() ) {
    //             $result .= $before . 'Error 404' . $after;
    //         }
    //         if ( get_query_var('paged') ) {
    //             if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) $result .= ' (';
    //             $result .= __('Page') . ' ' . get_query_var('paged');
    //             if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) $result .= ')';
    //         }
    //         $result .= '';
    //         $result2=explode("/a>",$result);
    //         $breakcum='<div class="breadcrumbs info-detail">';
    //         $i=0;
    //         $schema_breadcum='<script type="application/ld+json"> { "@context": "https://schema.org", "@type": "BreadcrumbList", "itemListElement": [';
    //         foreach ($result2 as &$value) {
    //             preg_match('/"(.*)"/', $value, $a1);
    //             preg_match('/>(.*)</', $value, $b1);
    //             $i++;
    //             if($a1[1]!=NULL){
    //                 if($a1[1]!='#'){
    //                     if($i==1){
    //                         $breakcum.='<span class="first breadcrumb"> <a href="'.$a1[1].'"> </a> </span>';
    //                     }else{
    //                         $breakcum.='<span class="breadcrumb"> <a href="'.$a1[1].'"> '.$b1[1].' </a> </span>';
    //                     }
    //                 }
    //                 if($b1[1]=="Home"){
    //                     $schema_breadcum .='{ "@type": "ListItem", "position": "'.$i.'", "name": "'.$b1[1].'", "item": "'.get_home_url().'/" },';
    //                 }else{
    //                     $schema_breadcum .='{ "@type": "ListItem", "position": "'.$i.'", "name": "'.$b1[1].'", "item": "'.$a1[1].'" },';
    //                 }
    //             }
    //         }
    //         $schema_breadcum .= ']}</script>';
    //         $breakcum.='</div>';
    //         $schema_breadcum_rs=str_replace(",]}","]}",$schema_breadcum);
    //         if($i==0){
    //             $breakcum="";
    //             $schema_breadcum="";
    //         }
    //         $breadcrumbs_schema=array($breakcum,$schema_breadcum_rs);
    //         return $breadcrumbs_schema;
    //     }
    // }
?>
<?php
    //     // Remove Parent Category from Child Category URL
    // add_filter('term_link', 'devvn_no_category_parents', 1000, 3);
    // function devvn_no_category_parents($url, $term, $taxonomy) {
    //     if($taxonomy == 'category'){
    //         $term_nicename = $term->slug;
    //         $url = trailingslashit(get_option( 'home' )) . user_trailingslashit( $term_nicename, 'category' );
    //     }
    //     return $url;
    // }
    // // Rewrite url new
    // function devvn_no_category_parents_rewrite_rules($flash = false) {
    //     $terms = get_terms( array(
    //         'taxonomy' => 'category',
    //         'post_type' => 'post',
    //         'hide_empty' => false,
    //     ));
    //     if($terms && !is_wp_error($terms)){
    //         foreach ($terms as $term){
    //             $term_slug = $term->slug;
    //             add_rewrite_rule($term_slug.'/?$', 'index.php?category_name='.$term_slug,'top');
    //             add_rewrite_rule($term_slug.'/page/([0-9]{1,})/?$', 'index.php?category_name='.$term_slug.'&paged=$matches[1]','top');
    //             add_rewrite_rule($term_slug.'/(?:feed/)?(feed|rdf|rss|rss2|atom)/?$', 'index.php?category_name='.$term_slug.'&feed=$matches[1]','top');
    //         }
    //     }
    //     if ($flash == true)
    //         flush_rewrite_rules(false);
    // }
    // add_action('init', 'devvn_no_category_parents_rewrite_rules');
    
    // /*fix error category 404*/
    // function devvn_new_category_edit_success() {
    //     devvn_no_category_parents_rewrite_rules(true);
    // }
    // add_action('created_category','devvn_new_category_edit_success');
    // add_action('edited_category','devvn_new_category_edit_success');
    // add_action('delete_category','devvn_new_category_edit_success');
?>
