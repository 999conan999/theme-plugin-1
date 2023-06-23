<?php
$_path_qc=plugin_dir_path( __FILE__ );
   require_once($_path_qc.'/frontend/control.php');

   if($_GET){
        //dm="ID danh muc" && dt="ID bai viet"
        //p="order"
        //else page cate
        // $dm=$_GET['dm'];
        // $dt=$_GET['dt'];
        // $p=$_GET['p']="order;
        
        if(!empty($_GET['dm'])&&!empty($_GET['dt'])){
            $is_goc=false;
            require_once($_path_qc.'/frontend/detail/qc_detail.php');
        }elseif(!empty($_GET['order'])){
            $is_goc=false;
            require_once($_path_qc.'/frontend/order/qc_order.php');
        }else{
            require_once($_path_qc.'/frontend/home/qc_home.php');
        }
    }else{
        require_once($_path_qc.'/frontend/home/qc_home.php');
    }


?>