
$(document).ready(function(){
    data_km=JSON.parse(window.data_km);
    //add kich thuoc
    let kt_text=''
    let home_url=window.location.origin;
    data_km.forEach((e,i) => {
        kt_text+='<button id="km_kt_'+i+'" class="btnz km-ls" index="'+i+'">'+e.kt_sp_chinh+'<img src="'+home_url+'/wp-content/plugins/qc_landingpage/frontend/src/media/check.svg" class="img-check"> </button>';
    });
    $("#test").html(kt_text);
    // countdown
    var timer_user_start=JSON.parse(localStorage.getItem("timer_user_start"))==null?0:JSON.parse(localStorage.getItem("timer_user_start"));
    let now=new Date().getTime();
    if(timer_user_start==0){
        let time=window.timer_run;
        localStorage.setItem("timer_user_start", now);
       let intervalId = setInterval(function(){
            time-=1000;
            if(time>=0){
                countdown(time);
            }else{
                // het khuyen mai
                end_km()
                clearInterval(intervalId);
            }
        },1000)
    }else{
        let time=window.timer_run-now+timer_user_start;
        if(time>=0){
            let intervalId =setInterval(function(){
                time-=1000;
                if(time>=0){
                    countdown(time);
                }else{
                    // het khuyen mai
                    end_km();
                    clearInterval(intervalId);
                }
            },1000)
        }else{
            if(Math.abs(time)>window.timer_lock){
                let time=window.timer_run;
                localStorage.setItem("timer_user_start", now);
                let intervalId =setInterval(function(){
                    time-=1000;
                    if(time>=0){
                        countdown(time);
                    }else{
                        // het khuyen mai
                        end_km();
                        clearInterval(intervalId);
                    }
                },1000)
            }else{
                // het khuyen mai
                end_km();
                clearInterval(intervalId);
            }
        }
    }
    function countdown(time) {
        let seconds = Math.floor(time / 1000);
        let minutes = Math.floor(seconds / 60);
        let hours = Math.floor(minutes / 60);
        let days = Math.floor(hours / 24);
      
        hours %= 24;
        minutes %= 60;
        seconds %= 60;
        
        $("#day-timer").html(days);
        $("#hour-timer").html(hours);
        $("#minues-timer").html(minutes);
        $("#secon-timer").html(seconds);
      }
      function end_km(){
        $("#end-km").show();
        $("#btn-km-order").hide()
        $("#wrap-km").addClass("opa-05")
      }
    // show gia va thong tin km
    set_selected_km(0);
    $(".km-ls").click(function(){
        let i= $(this).attr("index");
        $(".km-ls").removeClass("checked")
        set_selected_km(i)
    })
    function set_selected_km(i){
        $("#km_kt_"+i).addClass("checked");
        let km_combo="";
        let tong_gia=0;
        let title_combo=''
        // combo mua
        data_km[i].combo_sp.forEach(e => {
            km_combo+='<li>+ '+e.name+' (<b>'+e.kt+'</b>) (Giá:<b class="clo-red">'+(Number(e.price)).toLocaleString('vi-VN', {style : 'currency', currency : 'VND'})+'</b>)</li>';
            tong_gia+=Number(e.price);
            title_combo+='+ '+e.name+'('+e.kt+') | ';
        });
        $("#km_combo").html(km_combo);
        $("#tong_gia").html(tong_gia.toLocaleString('vi-VN', {style : 'currency', currency : 'VND'}));
        let km_qua_tang='';
        // combo khuyen mai
        let tien_tiet_kiem=0;
        if(Number(data_km[i].discount)>0){
            km_qua_tang='<li>+ Mã giảm giá :<b class="clo-xb">- '+Number(data_km[i].discount).toLocaleString('vi-VN', {style : 'currency', currency : 'VND'}) +'</b></li>';
            tien_tiet_kiem+=Number(data_km[i].discount);
            $("#scroll_giam_ngay").html('<b>🍀Giảm ngay:</b> <span class="price-tiet-kiem" style="color:#2196F3;"> + '+Number(data_km[i].discount).toLocaleString('vi-VN', {style : 'currency', currency : 'VND'}) +'</span>');
        }
        if(data_km[i].combo_qt.length>0){
            data_km[i].combo_qt.forEach(e => {
                km_qua_tang+='<li>+ '+e.name+' (Trị giá :<b class="clo-xb">'+Number(e.price).toLocaleString('vi-VN', {style : 'currency', currency : 'VND'})+'</b>)</li>';
                tien_tiet_kiem+=Number(e.price);
            })
            $("#scroll_tang_kem").html('<b> ✔️Tặng kèm</b><span class="price-tiet-kiem" style="color:#2196F3;">'+data_km[i].combo_qt.length+' món</span>');
            title_combo+=' và <b>'+data_km[i].combo_qt.length+'</b> món Quà Tặng kèm';
        }

        $("#tien_tiet_kiem").html("+ "+tien_tiet_kiem.toLocaleString('vi-VN', {style : 'currency', currency : 'VND'}));
        $("#sum-km").html(tien_tiet_kiem.toLocaleString('vi-VN', {style : 'currency', currency : 'VND'}));
        $("#tkkm-pp").html(tien_tiet_kiem.toLocaleString('vi-VN', {style : 'currency', currency : 'VND'}));
        $("#km_qt").html(km_qua_tang);
        let tong_tien=0;
        let rs_tt='';
        if(Number(data_km[i].discount)>0){
            tong_tien=tong_gia-Number(data_km[i].discount);
            rs_tt+='<tr><th style="text-align:left;">Giá gốc:</th> <th>'+tong_gia.toLocaleString('vi-VN', {style : 'currency', currency : 'VND'})+'</th> </tr> <tr> <td>Mã giảm giá(ở trên):</td> <td id="discountz">- '+Number(data_km[i].discount).toLocaleString('vi-VN', {style : 'currency', currency : 'VND'})+'</td> </tr> <tr> <td>Tổng tiền :</td> <td style=" color: blue; ">'+tong_tien.toLocaleString('vi-VN', {style : 'currency', currency : 'VND'})+'</td> </tr>';
        }else{
            rs_tt+='<tr><td>Tổng tiền :</td><td style=" color: blue; ">'+tong_gia.toLocaleString('vi-VN', {style : 'currency', currency : 'VND'})+'</td></tr>'
        }
        $("#tong_tien").html(rs_tt);
        $("#mua_km").html(tong_tien.toLocaleString('vi-VN', {style : 'currency', currency : 'VND'}));
        // xu ly change data nut bam mua ngay
        let thumthum=$("#thumthum").attr("data-srcset");
        let data_buy='{"img":"'+thumthum+'","title":"'+title_combo+'","size":"Tổng tiền: ","price":"'+tong_tien+'","sl":"1","url":"'+window.location.href+'"}';
        $("#km_btn").attr("data",data_buy);
    }
    // popup
    $("#tag-km").click(function(){
        window.is_showed=true;
        $('#khuyen-mai-popop').hide();
        $('html, body').animate({
        scrollTop: $('#khuyen-mai').offset().top
        }, 1000);
    })
    try{
        var A_offset = $('#id_2').offset().top-100;
        var C_offset = $('#khuyen-mai').offset().top+300;
        $(window).scroll(function() {
            if(window.is_showed==undefined||window.is_showed==false){
                var scroll_pos = $(window).scrollTop();
                if (scroll_pos >= A_offset && scroll_pos < C_offset) {
                    $('#khuyen-mai-popop').show();
                } else {
                    $('#khuyen-mai-popop').hide();
                    if(scroll_pos > C_offset)  window.is_showed=true;
                }
            }
        });
    }catch(e){}
})