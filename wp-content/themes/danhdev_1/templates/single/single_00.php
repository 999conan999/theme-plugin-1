<div class="article-section">

    <div class="article-container1 content-container flex">

        <aside class="aside-1">
            <?php echo $muc_luc; ?>
        </aside>

        <article class="chitiet">
            <div class="boxdetail_1">
                <div class="article-container2">
                    <a href="<?php echo $category_data->category_url; ?>" class="link-block-2 w-inline-block"
                        data-wpel-link="internal" target="_blank">
                        <div>
                            <div>🔻 <?php echo $category_data->category_name; ?></div>
                        </div>
                    </a>
                    <h1 class="h1-article"><?php echo $obj->post_title; ?></h1>
                </div>
                <!-- <div class="banner desktop">
                        <p><a href="#" data-wpel-link="internal" target="_blank"><img
                                    class="alignnone size-full wp-image-16820 entered lazyloaded"
                                    src="#" alt=""
                                    width="1097" height="100"
                                    data-lazy-src="#"
                                    data-ll-status="loaded"><noscript><img class="alignnone size-full wp-image-16820"
                                        src="#" alt=""
                                        width="1097" height="100" /></noscript></a></p>
                        
                    </div>
                    <div class="banner mobile">
                        <p><a href="#" data-wpel-link="internal" target="_blank"><img
                                    class="aligncenter wp-image-14008 entered lazyloaded"
                                    src="#"
                                    alt="" width="309" height="309"
                                    data-lazy-srcset="# 600w,"
                                    data-lazy-sizes="(max-width: 309px) 100vw, 309px"
                                    data-lazy-src="#"
                                    data-ll-status="loaded" sizes="(max-width: 309px) 100vw, 309px"
                                    srcset="# 600w,"><noscript><img
                                        class="aligncenter wp-image-14008"
                                        src="#"
                                        alt="" width="309" height="309"
                                        srcset="# 600w,"
                                        sizes="(max-width: 309px) 100vw, 309px" /></noscript></a></p>
                </div> -->
                <div class="boxdetail">
                    <div id="ftwp-postcontent">
                         <?php echo $content; ?>
                    </div>
                    <div class="crp_related  ">
                        <p class="ftwp-heading">Có thể bạn quan tâm: </p>
                        <ul>
                            <?php
                                foreach($list_post_footer as $post){
                            ?>
                                <li><a href="<?php echo $post->url; ?>" class="crp_link post-7260" data-wpel-link="internal" target="_blank"><span  class="crp_title"><?php echo $post->post_title; ?></span></a></li>
                            <?php
                                }
                            ?>
                        </ul>
                        <div class="crp_clear"></div>
                    </div>
                </div>

                <div class="banner desktop">
                </div>
                <div class="banner mobile">
                </div>
            </div>
        </article>
        <button class="button-bg">
            <img width="30px" height="22px"
                src="<?php echo get_stylesheet_directory_uri().'/templates/assets/img/zz.jpg'?>" class="entered lazyload "> 
        </button>
        <aside class="aside-2">

            <div class="widgetbox">
                <?php
                //<!-- <div class="banner">ads banner </div> -->
                ?>
                <?php
                   if(count($category_data->list_post)>0){
                ?>
                <div class="lesson">
                    <div class="lesson-list">
                        <h2 class="lesson-list-title">Bài hướng dẫn</h2>
                        <ul class="list-unstyled">
                            <?php
                                $i=0;
                                foreach($category_data->list_post as $post){
                                    $i++;
                            ?>
                                <li class="baiviet ">
                                    <strong>Hướng dẫn số <?php echo $i; ?>:</strong>
                                    <br>
                                    <a href="<?php echo $post->url; ?>" data-wpel-link="internal" target="_blank"><?php echo $post->title; ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <?php } ?>
            </div>
            
        </aside>

    </div>


</div>