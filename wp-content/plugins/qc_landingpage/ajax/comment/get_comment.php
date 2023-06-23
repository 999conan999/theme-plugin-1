<?php 
    $parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
    require_once( $parse_uri[0] . 'wp-load.php' );
 
    function get_comment_qc($quantity,$offset,$page,$sl,$id_comment){// search phone or email ~~ '' => get all
        global $wpdb;
        $table_prefix=$wpdb->prefix .'qc_comment';
             $sql = $wpdb->prepare( "SELECT value_comment FROM $table_prefix WHERE status='publish' AND id_comment=%s ORDER BY date_create DESC LIMIT %d OFFSET %d ",$id_comment,$quantity,$offset);
        $results = $wpdb->get_results( $sql , OBJECT );
        // $rs=array();
        // foreach($results as $x){
        //   $object = new stdClass();
        //   $object->value_comment=$x->value_comment;
        //   array_push($rs,$object);
        // }
        // send($rs);
        $rs='';
        $home_url=get_home_url();
        $home_name=str_replace('https://', '', $home_url);
        $home_name=str_replace('http://', '', $home_name);
        $text_id_catch='';
        foreach($results as $a){
          $x=json_decode($a->value_comment);
          $text_id_catch.=$x->id_catch.',';
           $rs.=' <div class="com1">';
           $rs.='<div class="w1"> ';
           $rs.='<b>'.$x->author.'</b>';
           if($x->type=='nm'){
            $rs.='<img style=" margin-left: 12px; " class="luna" src="'.$home_url.'/wp-content/plugins/qc_landingpage/frontend/src/media/check.png"><i>Đã mua tại '.$home_name.'</i>';
           }elseif($x->type=='nl'){
            $rs.='<span style="padding-left: 12px;"> <svg width="24px" hight="24px" style="fill:#446cb3;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M274.7 304H173.3C77.61 304 0 381.6 0 477.3C0 496.5 15.52 512 34.66 512H413.3C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304zM224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM632.3 134.4c-9.703-9-24.91-8.453-33.92 1.266l-87.05 93.75l-38.39-38.39c-9.375-9.375-24.56-9.375-33.94 0s-9.375 24.56 0 33.94l56 56C499.5 285.5 505.6 288 512 288h.4375c6.531-.125 12.72-2.891 17.16-7.672l104-112C642.6 158.6 642 143.4 632.3 134.4z"/></svg></span><i style="color:#446cb3;">Người ghé thăm</i>';
           }elseif($x->type=='nb'){
            $rs.='<span style="padding-left: 12px;"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style=" width: 18px; fill: #4caf50;"> <path d="M466.5 83.71l-192-80c-4.875-2.031-13.16-3.703-18.44-3.703c-5.312 0-13.55 1.672-18.46 3.703L45.61 83.71C27.7 91.1 16 108.6 16 127.1C16 385.2 205.2 512 255.9 512C307.1 512 496 383.8 496 127.1C496 108.6 484.3 91.1 466.5 83.71zM352 200c0 5.531-1.901 11.09-5.781 15.62l-96 112C243.5 335.5 234.6 335.1 232 335.1c-6.344 0-12.47-2.531-16.97-7.031l-48-48C162.3 276.3 160 270.1 160 263.1c0-12.79 10.3-24 24-24c6.141 0 12.28 2.344 16.97 7.031l29.69 29.69l79.13-92.34c4.759-5.532 11.48-8.362 18.24-8.362C346.4 176 352 192.6 352 200z"></path></svg></span><i style="color:#e91e63;">Người bán</i>';
           }
           $rs.='<p>'.$x->content.'</p>';
           $rs.='<div class="w-img-com row">';
            foreach($x->img as $img){
              $rs.='<div class="dev-3 pdr-3">';
              $rs.='<img class="img-com" src="'.$img.'" width="100%">';
              $rs.='</div>';
            }

              if($x->rep->contents !=''){
                $rs.='</div> <span class="rep">Trả lời</span>';
                $rs.='<div class="w1 w2"> <b>'.$x->rep->author.'</b>';
                $rs.='<p>'.$x->rep->contents.'</p>';
                $rs.='</div>';
              }
            $rs.='</div>';
            $rs.='</div>';
        }
        $obj = new stdClass();
        $obj->data=$rs;
        $obj->text_id_catch=$text_id_catch;
        // $obj->test= count($results);
        if(count($results)<$sl){
          $obj->more=false;
        }else{
          $obj->more=$page+1;
        }
        
        send($obj);

     }


     if($_GET){
        if(isset($_GET['page'])){
            $page=abs((int)stripslashes(strip_tags($_GET['page'])));
            $id_comment=stripslashes(strip_tags($_GET['id']));
            $sl=10;
            $offset=$page*$sl;
            get_comment_qc($sl,$offset,$page,$sl,$id_comment);
        }
     }