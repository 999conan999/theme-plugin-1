 jQuery('.box .title').click(function(){jQuery(this).toggleClass('active');jQuery(this).parent('.box').children('.boxs').slideToggle()});jQuery('.button-bg').click(function(){jQuery('.aside-2').toggleClass('open')});jQuery(function(){jQuery('a[href^="https://"]').attr('target','_blank')});jQuery(document).ready(function(){
 if($('#slider_4').length){jQuery('#slider_4').owlCarousel({loop:!0,margin:20,nav:!0,autoplay:!0,autoplayTimeout:2000,autoplayHoverPause:!0,responsive:{0:{items:1},600:{items:4},1000:{items:4}}})}
if($('#slider_6').length){jQuery('#slider_6').owlCarousel({loop:!0,margin:20,nav:!1,autoplay:!0,autoplayTimeout:2000,autoplayHoverPause:!0,responsive:{0:{items:2},600:{items:4},1000:{items:6}}})}});$(document).ready(function(){$('.gnws-video_playlist .gnws-video_playlist-id').each(function(index){$(this).on('click',function(e){var id_youtube=$(this).attr('data-id');var url_id_youtube='https://www.youtube.com/embed/'+id_youtube;var url_img='https://img.youtube.com/vi/'+id_youtube+'/hqdefault.jpg';jQuery('.newposts-featimg.video-wrapper iframe').attr('src',url_id_youtube);jQuery('.newposts-featimg.video-wrapper .rll-youtube-player').attr('data-src',url_id_youtube);jQuery('.newposts-featimg.video-wrapper .rll-youtube-player').attr('data-id',id_youtube);jQuery('.newposts-featimg.video-wrapper .rll-youtube-player > div').attr('data-src',url_id_youtube);jQuery('.newposts-featimg.video-wrapper .rll-youtube-player > div').attr('data-id',id_youtube);jQuery('.newposts-featimg.video-wrapper .rll-youtube-player > div > img').attr('src',url_img);var title=$(this).find('.gnws-video_playlist-title').text();$('.h3-newpost-title_title').text(title);var current_index=index+1;$('.gnws-video_playlist-id').removeClass('active');$('.gnws-video_playlist-id:nth-child('+current_index+')').addClass('active')})})})