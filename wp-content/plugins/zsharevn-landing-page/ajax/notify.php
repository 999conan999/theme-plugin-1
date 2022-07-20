<?php 
    $parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
    require_once( $parse_uri[0] . 'wp-load.php' );
    if (!function_exists('is_plugin_active')) {
        include_once(ABSPATH . 'wp-admin/includes/plugin.php');
       }
    //
    function get_data_theme_contact_count($keyz){
        global $wpdb;
        $table_prefix=$wpdb->prefix . 'data_theme';
        $sql = $wpdb->prepare( "SELECT keyz,valuez FROM $table_prefix WHERE keyz =%s ",$keyz);
        $results = $wpdb->get_results( $sql , OBJECT );
        if(count($results)>0){
            return (int)($results[0]->valuez);
        }else{
            $data = array(
                'keyz'=> $keyz,
                'valuez' => 0
            );
            $rs = $wpdb->insert(
                $table_prefix,
                $data
            );
            return 0;
        }
    }
    function check_notify_ok($contact_count_pre,$contact_count_now,$keyz){
        if((int)$contact_count_now-(int)$contact_count_pre<0){
            global $wpdb;
            $table_prefix=$wpdb->prefix . 'data_theme';
            $data = array(
                'keyz'=> $keyz,
                'valuez' => $contact_count_now
            );
            $rs = $wpdb->update(
                $table_prefix,
                $data,
                array('keyz' => $keyz)
            );
            return false;
        }
        return true;
    }
    function count_contact(){
        global $wpdb;
        $name_table_3=$wpdb->prefix . 'contacts_form';
        $sql = $wpdb->prepare( "SELECT COUNT(id) FROM $name_table_3 WHERE typez = 'plugin'");
        $results = $wpdb->get_results( $sql , ARRAY_A );
        return (int)($results[0]["COUNT(id)"]);
    }
    $object = new stdClass();
if(is_plugin_active('zsharevn-landing-page/index.php')){

    if(is_user_logged_in()==false){
        $user = wp_get_current_user();
        $permisstion_type="administrator";
    
        $contact_count_now=count_contact();
        $contact_count_pre=get_data_theme_contact_count('contact_count_plugin');
        if(check_notify_ok($contact_count_pre,$contact_count_now,'contact_count_plugin')){
        $object->contact_count_pre= $contact_count_pre;
        $object->contact_count_now=$contact_count_now;
        }else{
            $object->contact_count_pre= 0;
            $object->contact_count_now=0;
        }
    }
}
    send($object);
?>