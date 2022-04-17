// let data=window.data;
// var time=data.time==undefined?90:parseInt(data.time);
// var timeval=setInterval(()=>{
//     document.getElementById("ztime").innerHTML = time;
//     time--;
//     if(time==-1) {
//         clearInterval(timeval);
//         document.getElementById("showz").innerHTML = '<div class="load-6" style="width: 67px;margin: auto;"> <div class="letter-holder"> <div class="l-1 letter">L</div> <div class="l-2 letter">o</div> <div class="l-3 letter">a</div> <div class="l-4 letter">d</div> <div class="l-5 letter">i</div> <div class="l-6 letter">n</div> <div class="l-7 letter">g</div> <div class="l-8 letter">.</div> <div class="l-9 letter">.</div> <div class="l-10 letter">.</div> </div> </div>';
//         jQuery('html, body').animate({
//             scrollTop: jQuery("#lien-he").offset().top
//         },6000);
//         document.getElementById("notifyz").innerHTML ="Hệ thống sẽ tự động chuyển hướng tới trang đích sau vài giây nữa.";
//         setTimeout(() => {
//             let data_ma_code=JSON.parse(localStorage.getItem("code"));
//             var data_send=new FormData();
//             data_send.append('ma_code',data_ma_code.code);
//             data_send.append('id',data.id);
//             jQuery.ajax({
//                 url : data.url,
//                 type: 'POST',
//                 data: data_send,
//                 processData: false,
//                 contentType: false,
//                 success:(function(response) {
//                     if(response.status==true){
//                         window.location.replace(response.url);
//                     }else{
//                         alert("Dữ liệu đã bị xóa, vui lòng liên hệ tác giả để có thêm thông tin.")
//                     }
//                 }),
//                 error: function(xhr, error){
//                     alert("Lỗi không lấy được dữ liệu, Phiền bạn thông báo cho tác giả để sửa lỗi này.")
//                 },
//             })
//         }, 10000);
//     };

// },1000)  