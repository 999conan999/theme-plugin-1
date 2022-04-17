<?php
    $obj=get_queried_object();
    $id=$obj->term_id;
    global $wpdb;
    $args = array('tag_id' => $id, 'orderby' => 'post_date', 'order' =>'DESC', 'posts_per_page' => 21,'post_status' => 'publish','offset' => 0);
    $results =query_posts($args);   
    foreach($results as $x){
        $id=$x->ID;
        $x->post_url=get_permalink($id);
        $x->thumnail_url=get_post_meta($id,'thumnail_url', true);
    }
    $title=$obj->name;

?>