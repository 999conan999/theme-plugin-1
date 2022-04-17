<?php
    $key= stripslashes(strip_tags($_GET['s']));
    global $wpdb;
    $table_prefix=$wpdb->prefix .'posts';
    $sql = $wpdb->prepare( "SELECT ID,post_title FROM $table_prefix WHERE post_type ='post' AND  post_status ='publish' AND post_title LIKE %s ORDER BY post_date DESC LIMIT 20 OFFSET 0 ",'%'.$key.'%');
    $results = $wpdb->get_results( $sql , OBJECT );
    foreach($results as $x){
        $id=$x->ID;
        $x->post_url=get_permalink($id);
        $x->thumnail_url=get_post_meta($id,'thumnail_url', true);
    }
    $title='Tìm kiếm';
    if(count($results)>0) $title.=': "'.$key.'"';

?>