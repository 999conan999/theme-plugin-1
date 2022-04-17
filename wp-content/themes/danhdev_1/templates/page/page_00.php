<div class="about-section">
    <h1 style="text-align: center;"><?php echo $obj->post_title; ?></h1> 
    <div class="article-container about" style="max-width:100%;margin-top: 20px;">
        <?php 
        $content= $obj->post_content;
         // img lazyload
         preg_match_all('/<img(.*)\/\>/', $content,$list_img,PREG_PATTERN_ORDER); 
         foreach($list_img[0] as $img_tag){
             $img_2=str_replace(' src=',' src="'.get_stylesheet_directory_uri().'/templates/assets/img/holder-content.png" style="width:auto;" data-src=',$img_tag);
             $content=str_replace($img_tag,$img_2,$content);
         }
        echo $content;
        
        ?>
    </div>
</div>