<?php
$obj=get_queried_object();
$id=$obj->ID;
$metaA=json_decode(get_post_meta($id,'metaA', true));
$home_url=get_home_url();
$template_selected=$metaA->template_selected;
$current_url=get_permalink($id);
$descriptions=json_decode(get_post_meta($id,'metaA', true))->descriptions;
$thumnail_url=get_post_meta($id,'thumnail_url', true);
?>