<div data-elementor-type="wp-page" data-elementor-id="6998" class="elementor elementor-6998"
    data-elementor-settings="[]">
    <div class="elementor-inner">
        <div class="elementor-section-wrap">
            <section  class="elementor-section elementor-top-section elementor-element elementor-element-950c07b elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                data-id="950c07b" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-row">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-e1aa9d6"
                            data-id="e1aa9d6" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-0ea22e7 elementor-widget elementor-widget-heading"
                                        data-id="0ea22e7" data-element_type="widget" data-widget_type="heading.default">
                                        <div class="elementor-widget-container">
                                            <h2 class="elementor-heading-title elementor-size-default"><?php echo $catZ->name ?></h2>
                                        </div>
                                    </div>
        
                                    <div class="elementor-element elementor-element-7aa9a76 elementor-tabs-alignment-center elementor-tabs-view-horizontal elementor-widget elementor-widget-tabs"
                                        data-id="7aa9a76" data-element_type="widget" data-widget_type="tabs.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-tabs">
                                                
                                                <div class="elementor-tabs-content-wrapper" role="tablist" aria-orientation="vertical">
 
                                                    <div id="elementor-tab-content-1281" class="elementor-tab-content elementor-clearfix elementor-active" data-tab="1" role="tabpanel" aria-labelledby="elementor-tab-title-1281" tabindex="0" style="display: block;">

                                                        <div class="box" >
                                                            <div class="title" style="background-color: whitesmoke;">
                                                                <a href="Javascript:;" class="xemthem" data-wpel-link="internal"> Phần 1: <?php echo $metaA->title_x1 ?>  <i aria-hidden="true" class="fas fa-chevron-right"></i></a>
                                                            </div>

                                                            <div class="boxs boxsx" style="display: none;" >
                                                                <?php if($metaA->list_des_all_html->list_des_1_html!=''){ ?>
                                                                <div class="boxdetail">
                                                                    <div class="crp_related  ">
                                                                        <p class="ftwp-heading">✔️ Chức năng và ưu điểm: </p>
                                                                        <?php echo $metaA->list_des_all_html->list_des_1_html ?>
                                                                        <div class="crp_clear"></div>
                                                                    </div>
                                                                </div>
                                                                <?php } ?>
                                                                <?php if($metaA->list_des_all_html->list_des_2_html!=''){ ?>
                                                                <div class="boxdetail">
                                                                    <div class="crp_related re  ">
                                                                        <p class="ftwp-headings">🚀 Giao diện thích hợp sử dụng cho : </p>
                                                                        <?php echo $metaA->list_des_all_html->list_des_2_html ?>
                                                                        <div class="crp_clear"></div>
                                                                    </div>
                                                                </div>
                                                                <?php } ?>
                                                                <div style="text-align: center;">
                                                                   <?php
                                                                        if($metaA->demo!=''){
                                                                            echo '<a class="fasc-button fasc-size-large fasc-type-flat fasc-rounded-medium fasc-style-bold" style="background-color: #4ac229; color: #ffffff;margin-right: 5px;" href="'.$metaA->demo.'" target="_blank" rel="noopener nofollow external noreferrer" data-wpel-link="external">Xem Demo</a>';
                                                                        }
                                                                        if($metaA->dowload!=''){
                                                                            echo '<a class="fasc-button fasc-size-large fasc-type-flat fasc-rounded-medium fasc-style-bold" style="background-color: #3861fb; color: #ffffff;display: inline-block;min-width: 116px;margin-right: 5px;" href="'.$metaA->dowload.'" target="_blank" rel="noopener nofollow external noreferrer" data-wpel-link="external">Tải xuống</a>';
                                                                        }
                                                                        if($metaA->group!=''){
                                                                            echo '<a class="fasc-button fasc-size-large fasc-type-flat fasc-rounded-medium fasc-style-bold" style="background-color: #c22929; color: #ffffff;display: inline-block;min-width: 234px;margin-right: 5px;" href="'.$metaA->group.'" target="_blank" rel="noopener nofollow external noreferrer" data-wpel-link="external">Tham gia group hỗ trợ</a>';
                                                                        }
                                                                   ?> 
                                                                    
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="box">
                                                            <div class="title" style="background-color: whitesmoke;">

                                                                <a href="Javascript:;" class="xemthem"
                                                                    data-wpel-link="internal">Phần 2: <?php echo $metaA->title_x2 ?> <i
                                                                        aria-hidden="true"
                                                                        class="fas fa-chevron-right"></i></a>

                                                            </div>

                                                            <div class="boxs" style="display: none;">
                                                                
                                                            <?php 
                                                                foreach($data_category->list_cat as $post){
                                                            ?>
                                                                <div class="links">
                                                                    <a href="<?php echo $post->url; ?>"
                                                                        data-wpel-link="internal" target="_blank">
                                                                        <img width="640" height="240"
                                                                            data-src="<?php echo $post->thumnail; ?>"
                                                                            class="attachment- size- wp-post-image entered lazyload"
                                                                            alt="<?php echo $post->title; ?>"
                                                                            title="<?php echo $post->title; ?>"
                                                                            data-lazy-srcset="<?php echo $post->thumnail; ?> 160w"
                                                                            data-lazy-sizes="(max-width: 640px) 100vw, 640px"
                                                                            data-lazy-src="<?php echo $post->thumnail; ?>"
                                                                            data-ll-status="loaded"
                                                                            sizes="(max-width: 640px) 100vw, 640px"
                                                                        > 
                                                                    </a>
                                                                    <div class="metalink">
                                                                        <a href="<?php echo $post->url; ?>"
                                                                            data-wpel-link="internal" class="dv3"
                                                                            target="_blank"><?php echo $post->title; ?></a>
                                                                    </div>
                                                                </div>
                                                            <?php 
                                                                }
                                                            ?>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-cd57d0c elementor-widget elementor-widget-image" data-id="cd57d0c" data-element_type="widget" data-widget_type="image.default">
                                        <!-- <div class="elementor-widget-container">
                                             <img width="800" height="500"
                                                    src="https://beatdautu.com/wp-content/uploads/elementor/thumbs/30usd-paqftbev8ees4s8kx2k73ijw4v0ko593kkqryuwoso.jpg"
                                                    title="30usd" alt="30usd"
                                                    data-lazy-src="https://beatdautu.com/wp-content/uploads/elementor/thumbs/30usd-paqftbev8ees4s8kx2k73ijw4v0ko593kkqryuwoso.jpg"
                                                    data-ll-status="loaded"
                                                    class="entered lazyloaded"> 
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>