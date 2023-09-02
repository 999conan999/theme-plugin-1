<?php 
    $parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
    require_once( $parse_uri[0] . 'wp-load.php' );
    function get_imgs($tag){
        global $wpdb;
        $table_prefix=$wpdb->prefix .'shopseo_imgs';
             $sql = $wpdb->prepare( "SELECT id,url,url300,url150,tag FROM $table_prefix WHERE tag = %s ORDER BY date_create DESC",$tag);
        $results = $wpdb->get_results( $sql , OBJECT );
        $rs=array();
        $home=home_url();
        foreach($results as $x){
          $object = new stdClass();
          $object->id=$x->id;
          $object->url=$home.'/'.$x->url;
          $object->url300=$home.'/'.$x->url300;
          $object->url150=$home.'/'.$x->url150;
          $object->tag=$x->tag;
          array_push($rs,$object);
        }
        send($rs);
    }

    if(is_user_logged_in()){
        $tag=$_GET['tag'];
        get_imgs($tag);
    }