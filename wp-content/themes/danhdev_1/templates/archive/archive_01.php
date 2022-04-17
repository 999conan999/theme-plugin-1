
<div class="category-section-hero" style="background:tan;padding-top:20px">

<div class="content-container">
    <div class="title-container category-pg">
        <div class="div-block-18">
            <div class="title-cont category-titlecont">
                <h1 class="h1-article"><?php echo  $data_category->category_name; ?></h1>
            </div>
            <div class="subtitle-section category-pg">

                <p><?php echo  $data_category->descriptions; ?></p>

            </div>
        </div>
    </div>


    <div class="w-dyn-list">
        <div role="list" class="howto-cardcont w-dyn-items boxwhile">

<?php 
$list_posts=$data_category->list_posts;
foreach($list_posts as $post){
?>
            <div role="listitem" class="w-dyn-item">
                <a href="<?php echo $post->post_url;?>" class="card2 dropshadow w-inline-block" data-wpel-link="internal" target="_blank" style="display: block;">
                    <div data-bg="<?php echo $post->thumnail_url;?>" style="background-color: rgb(138, 63, 252); background-image: url(<?php echo $post->thumnail_url;?>);" class="howto-img-hm rocket-lazyload entered lazyload" data-ll-status="load"></div>
                    <div style="padding:15px">
                        <h3 class="h3-card1" style="min-height: 48px;"><?php echo $post->post_title;?></h3>
                        <p class="p-card dv3" style="min-height: 63px;"><?php echo mb_substr($post->descriptions,0,120, "utf-8"); ?>...</p>
                        <div class="div-block-33">
                            <div class="dot-light"></div>
                            <div class="div-block-37">
                                <p class="paragraph-5"><?php echo $data_setup->website_name; ?></p>
                            </div>
                            
                        </div>
                    </div>
                </a>
            </div>
<?php 
} 
?>



        </div>
    </div>
</div>
</div>