<?php
   $menu_breacrum=get_menu_breacrum($typez,$id,$category_parent);
   $header='';
   $header.='<header id="header" class="header header-wrapper">';
   $header.='<div class="colorz header-top">';
   $header.='<div class="container">';
   $header.='<div class="row">';
   $header.='<div class="col-12 col-lg-6 pd8">';
   $header.='<p class="zxs">'.$common->loi_chao_mung.'</p>';
   $header.='</div>';
   $header.='<div class="col-lg-3 hd992 pd8">';
   $header.='<p class="zxs tal-r">';
   $header.='<img src="'.$home_url.'/wp-content/themes/theme_meme/templates/src/phone.svg" class="icon-headrez">';
   $header.='Hotline: '.substr($common->sdt_hotline, -10, -7) . "-" . substr($common->sdt_hotline, -7, -4) . "-" . substr($common->sdt_hotline, -4).'';
   $header.='</p>';
   $header.='</div>';
   $header.='<div class="col-lg-3 hd992 pd8">';
   $header.='<p class="zxs cshv tal-r">';
   $header.='<img src="'.$home_url.'/wp-content/themes/theme_meme/templates/src/user.svg" class="icon-headrez">';
   $header.='Đăng nhập/Đăng ký';
   $header.='</p>';
   $header.='</div>';
   $header.='</div>';
   $header.='</div>';
   $header.='</div>';
   $header.='<div class="header-main" style="background-image: url('.$common->background_header.');">';
   $header.='<div class="icon-menu" id="menu-mb">';
   $header.='<img src="'.$home_url.'/wp-content/themes/theme_meme/templates/src/menumb.svg">';
   $header.='</div>';
   $header.='<div class="icon-cart">';
   $header.='<a href="#" style="text-decoration: none;">';
   $header.='<div class="wrap-icon-cart">';
   $header.='<img src="'.$home_url.'/wp-content/themes/theme_meme/templates/src/cart.svg">';
   $header.='<span class="gh">Giỏ hàng</span><span class="nuvbe">(0)</span>';
   $header.='</div>';
   $header.='</a>';
   $header.='</div>';
   $header.='<div class="container setz">';
   $header.='<div class="row">'; 
   $header.='<div class="col-12 col-lg-3 brz">';
   $header.='<div class="logo"><a href="'.$home_url.'"><img src="'.$common->logo_website.'" class="header-logo-dark" alt="cofa.vn" width="203px" height="48px"></a></div>';
   $header.='</div>';
   $header.='<div class="col-12 col-lg-6 seah">';
   $header.='<form>';
   $header.='<div class="input-group">';
   $header.='<input type="search" name="s" placeholder="Tìm kiếm..." aria-describedby="button-addon5" class="form-control" autocomplete="off">';
   $header.='<div class="input-group-append">';
   $header.='<button id="button-addon5" type="submit" class="btn brs" style="background: rgb(255, 152, 0);">';
   $header.='<img src="'.$home_url.'/wp-content/themes/theme_meme/templates/src/search.svg" width="16px" height="16px">';
   $header.='</button>';
   $header.='</div>';
   $header.='</div>';
   $header.='</form>';
   $header.='</div>';
   $header.='</div>';
   $header.='</div>';
   $header.='</div>';
   $header.='<div class="colorz header-bottom">';
   $header.='<div class="container wr-menu ">';
   $header.='<div id="set-menu" class="set-menu hide-menu">';
   $header.='<div class="menu">';
   $header.='<ul>';
   $header.='<li><a href="'.$home_url.'" title="'.$home_name.'">Trang Chủ</a></li>';
   $header.=$menu_breacrum->menu;
   $header.='</ul>';
   $header.='</div>';
   $header.='<div class="dimmer" id="dimmer" onclick="hide_menu()"><span>x</span></div>';
   $header.='</div>';
   $header.='</div>';
   $header.='</div>';
   $header.='</header>';
?>