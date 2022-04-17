<header id="Top" class="navbar-wrapper sticky-top navigation light navigation-2 navbar-search">
    <div class="container-2 navcontainer">
        <div data-collapse="medium" data-animation="default" data-duration="400" role="banner"
            class="navbar-2 w-nav">
            <div class="navbar-row">
                <div class="div-block">
                    <a href="<?php echo get_home_url(); ?>" aria-current="page" class="navbar-1-brand w-nav-brand w--current" data-wpel-link="internal">
                        <img src="<?php echo(isset($data_setup->logo_url_1)?$data_setup->logo_url_1:'');?>" width="179" alt="" class="image-2 no-lazy">
                        <img src="<?php echo(isset($data_setup->logo_url_2)?$data_setup->logo_url_2:'');?>" width="40px" height="40px" alt="" class="image entered lazyloaded">
                            <noscript>
                                <img src="<?php echo(isset($data_setup->logo_url_2)?$data_setup->logo_url_2:'');?>" width="40px" height="40px" alt="" class="image" />
                            </noscript>
                    </a>
                </div>
                <div class="navbar-controls">
                    <div class="navbar-buttons-2">
                        <div class="modal-button-container-2">
                            <nav role="navigation" class="nav-menu w-nav-menu" style="transform: translateY(0px) translateX(0px);">
                            <?php echo(isset($data_setup->menu_html)?$data_setup->menu_html:'');?>
                                <div data-hover="" data-delay="0" class="searchnav w-dropdown">
                                    <div id="search-dropdown-toggle" class="dropdown-toggle-2 w-dropdown-toggle" aria-controls="search-dropdown" aria-haspopup="menu"  aria-expanded="false" role="button" tabindex="0">
                                        <img src="<?php echo get_stylesheet_directory_uri().'/templates/assets/css/icon/search.svg';?>" loading="lazy" width="24px" height="24px" alt="" class="entered lazyloaded">
                                            <noscript>
                                                <img src="<?php echo get_stylesheet_directory_uri().'/templates/assets/css/icon/search.svg';?>" loading="lazy" width="24px" height="24px" alt="" />
                                            </noscript>
                                                
                                    </div>
                                    <nav id="search-dropdown" class="dropdown-list-3 w-dropdown-list"
                                        aria-labelledby="search-dropdown-toggle">
                                        <div class="form-block-2 w-form">
                                            <form id="search-form" name="email-form" data-name="Email Form"
                                                action="<?php echo get_home_url(); ?>" class="form-4 form-4custom">
                                                <label for="query" class="field-label-2">Tìm kiếm</label>
                                                <div class="div-block-50 w-clearfix">
                                                    <input type="text" class="text-field w-input" autocomplete="off"
                                                        autofocus="true" maxlength="256" name="s" data-name="s"
                                                        placeholder="Tìm kiếm..." id="search-query-navbar-desktop">
                                                    <input type="submit" value="" data-wait="Please wait..."
                                                        class="submit-button w-button">
                                                </div>
                                            </form>
                                        </div>
                                    </nav>
                                </div>
                            </nav>

                        </div>
                        <div class="modal-container">
                            <div class="modal-background"></div>
                            <div class="content-width-medium-2 modal-content">
                                <div class="panel-2 modal-panel">
                                    <div class="modal-panel-bg"></div>
                                    <div class="panel-body-2 modal-panel-body">
                                        <form action="<?php echo get_home_url(); ?>" class="search-form w-form">
                                            <input type="search"
                                                class="form-input-2 form-input-large search-modal-input w-input"
                                                autofocus="true" maxlength="256" name="s"
                                                placeholder="Type your search" id="search" required="">
                                            <input type="submit" value="Search"
                                                class="button search-form-button w-button">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><a href="<?php echo get_home_url(); ?>#" class="button alt medium w-button">Sign up</a>
                    </div>
                    <div data-hover="" data-delay="0" class="searchnav searchnavmobile w-dropdown">
                        <div id="search-dropdown-toggle-mobile" class="dropdown-toggle-2 w-dropdown-toggle"
                            aria-controls="search-dropdown" aria-haspopup="menu" aria-expanded="false" role="button"
                            tabindex="0"><img src="<?php echo get_stylesheet_directory_uri().'/templates/assets/css/icon/search.svg';?>" loading="lazy"
                                width="24px" height="24px" alt="" class="entered lazyloaded">
                                <noscript>
                                    <img
                                    src="<?php echo get_stylesheet_directory_uri().'/templates/assets/css/icon/search.svg';?>"
                                    loading="lazy" width="24px" height="24px" alt="" />
                                </noscript>
                        </div>
                        <nav id="search-dropdown" class="dropdown-list-3 w-dropdown-list"
                            aria-labelledby="search-dropdown-toggle-mobile">
                            <div class="form-block-2 w-form">
                                <form id="search-form" name="email-form" data-name="Email Form"
                                    action="<?php echo get_home_url(); ?>" class="form-4 form-4custom">
                                    <label for="query" class="field-label-2">Tìm kiếm</label>
                                    <div class="div-block-50 w-clearfix">
                                        <input type="text" class="text-field w-input" autocomplete="off"
                                            autofocus="true" maxlength="256" name="s" data-name="s"
                                            placeholder="Tìm kiếm..." id="search-query-nav-mobile">
                                        <input type="submit" value="" data-wait="Please wait..."
                                            class="submit-button w-button">
                                    </div>
                                </form>
                                <div class="w-form-done">
                                    <div>Thank you! Your submission has been received!</div>
                                </div>
                                <div class="w-form-fail">
                                    <div>Oops! Something went wrong while submitting the form.</div>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="menu-button w-nav-button" style="-webkit-user-select: text;" aria-label="menu"
                        role="button" tabindex="0" aria-controls="w-nav-overlay-0" aria-haspopup="menu"
                        aria-expanded="false"><img src="<?php echo get_stylesheet_directory_uri().'/templates/assets/css/icon/menuicon.svg';?>"
                            width="24px" height="24px" alt="menu" class="entered"><noscript><img
                                src="<?php echo get_stylesheet_directory_uri().'/templates/assets/css/icon/menuicon.svg';?>"
                                width="24px" height="24px" alt="menu" /></noscript>
                    </div>
                </div>
            </div>
            <div class="w-nav-overlay" data-wf-ignore="" id="w-nav-overlay-0" style="display: none;"></div>
        </div>
    </div>
    <div class="html-embed-3 w-embed w-script">
        <script>
            document.getElementById("search-dropdown-toggle").onclick = function () {
                setTimeout(function () {
                    document.getElementById("search-query-navbar-desktop").focus();
                }, 200);
            }

            document.getElementById("search-dropdown-toggle-mobile").onclick = function () {
                setTimeout(function () {
                    document.getElementById("search-query-nav-mobile").focus();
                }, 200);
            }
        </script>
    </div>
</header>