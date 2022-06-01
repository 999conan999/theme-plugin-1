<?php 
    $parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
    require_once( $parse_uri[0] . 'wp-load.php' );

    
function create_form($namez,$phonez,$addressz,$cityz,$orderz,$genderz,$costz,$emailz,$typez,$dataz){
    $data = array(
        'namez'=> $namez,
        'phonez' => $phonez,
        'addressz' => $addressz,
        'cityz' => $cityz,
        'orderz' => $orderz,
        'genderz' => $genderz,
        'costz' => $costz,
        'emailz' => $emailz,
        'typez' => $typez,
        'dataz' => $dataz,
        'datez' => current_time( 'mysql'),
    );
    global $wpdb;
    $table = $wpdb->prefix . 'contacts_form';
    $wpdb->insert(
        $table,
        $data
    );
}
if (!function_exists('fs_get_data_theme')) {
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
}
if (!function_exists('telegram')) {
    function telegram($msg,$telegrambot,$telegramchatid) {
        $url='https://api.telegram.org/bot'.$telegrambot.'/sendMessage';
        $data=array('chat_id'=>$telegramchatid,'text'=>$msg,'parse_mode'=>'html');
        $options=array('http'=>array('method'=>'POST','header'=>"Content-Type:application/x-www-form-urlencoded\r\n",'content'=>http_build_query($data),),);
        $context=stream_context_create($options);
        $result=file_get_contents($url,false,$context);
        return $result;
    }
}


    $object = new stdClass();
    $object->status=false;
    if(isset($_POST['data'])){
        $data=json_decode(stripslashes(strip_tags($_POST['data'])));
        if(isset($data->user->z_name)&&isset($data->user->z_phone)&&isset($data->user->z_address)){
            create_form($data->user->z_name,$data->user->z_phone,$data->user->z_address,'',json_encode($data->sp),'','','','plugin','');
            $object->status=true;
            //text telegram here
            $plugin_setup=fs_get_data_theme('plugin_setup');
            if($plugin_setup!='null'){
                $Telegram_chat_id=$plugin_setup->data_plugin->Telegram_chat_id;
                $API_telegram=$plugin_setup->data_plugin->API_telegram;
                if($Telegram_chat_id!=''&&$API_telegram!=''){
                    $mss='';
                    $mss.='+ '.$data->sp->name.' - <b>'.$data->sp->attributes_kt.'</b> - <b>'.$data->sp->attributes_ms.'</b>'."\n";
                    $mss.='+ Số lượng : <b>'.$data->sp->quantity.'</b>'. "\n";
                    $mss.='+ Tổng tiền : <b>'.number_format((int)($data->sp->quantity)*(int)($data->sp->price),0,",",".").' đ</b>'. "\n";
                    $mss.='+ Tên : <b>'.$data->user->z_name.'</b>'. "\n";
                    $mss.='+ Địa chỉ : <b>'.$data->user->z_address.'</b>'. "\n";
                    $mss.='+ Điện thoại : <b>'.$data->user->z_phone.'</b>'. "\n";
                    $mss.='+ Ghi chú : <b>'.$data->sp->z_note.'</b>'. "\n";
                    $mss.='================'."\n";
                    $mss.='<pre>'.$data->sp->url_sp.'</pre>'."\n";
                    $mss.=$data->sp->url_img. "\n";
                    telegram($mss,$API_telegram,$Telegram_chat_id);
                }
            }
            // 


        }else{
            $object->status=false;
        }
    }
    send($object);
 
    

?>