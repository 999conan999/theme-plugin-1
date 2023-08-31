// Todo list
// xu ly xem them binh luan
$(document).ready(function(){

    var home=$("#header").attr("index");
    var url_binh_luan=home+'/wp-content/plugins/qc_landingpage/ajax/comment/add_like.php';
    var url_post_comment=home+'/wp-content/plugins/qc_landingpage/ajax/comment/add_comment.php';
    var url_get_comment=home+'/wp-content/plugins/qc_landingpage/ajax/comment/get_comment.php?page='
    var img_input;
    var triger_show_cm='';
    //

    //
    var user_comments=JSON.parse(localStorage.getItem("user_comments"))==null?[]:JSON.parse(localStorage.getItem("user_comments"));
    $(".bl_btn").click(function(){
        $(".anime").removeClass("anime")
       let i= $(this).attr("data");
        if(triger_show_cm.search(i+',')==-1){
            $("#comment_"+i).show(300,"linear");
            triger_show_cm+=i+',';
            let a=jQuery("span", this).text();

            //[todo] lấy giá trị comment từ server hiển thị ra đây
            let index= $(this).attr("index");
            
            // Abnzsy_Hrsxko_0
                if(Number(a)==0){
                    $("#noComment_"+i).show();
                    $("#loading_"+i).hide();
                    $("#more_"+i).hide();
                    let rs='';
                    let k=0;
                    user_comments.forEach(e => {
                        if(e.index==index){

                            rs='<div class="com1"> <div class="w1"> <b>'+e.comment.name+'</b><span style="padding-left: 12px;"> <svg width="24px" hight="24px" style="fill:#446cb3;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M274.7 304H173.3C77.61 304 0 381.6 0 477.3C0 496.5 15.52 512 34.66 512H413.3C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304zM224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM632.3 134.4c-9.703-9-24.91-8.453-33.92 1.266l-87.05 93.75l-38.39-38.39c-9.375-9.375-24.56-9.375-33.94 0s-9.375 24.56 0 33.94l56 56C499.5 285.5 505.6 288 512 288h.4375c6.531-.125 12.72-2.891 17.16-7.672l104-112C642.6 158.6 642 143.4 632.3 134.4z"/></svg></span><i style="color:#446cb3;">Người ghé thăm</i> <p>'+e.comment.comment+'</p> </div> </div>'+rs;
                            k++;

                        }
                    });
                    let bl=$("#bnt_bl_"+i).text();
                    $("#bnt_bl_"+i).html(Number(bl)+k);
                    $("#loading_"+i).hide();
                    $("#showrs_"+i).html(rs);
                    $("#more_"+i).hide();
                }else{
                    // setTimeout(()=>{

                        //[todo] here
                        $.get(url_get_comment+0+"&id="+index, function(data) {
                            let rs='';
                            let k=0;
                            user_comments.forEach(e => {
                                if(e.index==index){

                                    if(data.text_id_catch.search(e.in_catch+',')==-1){
                                        rs='<div class="com1"> <div class="w1"> <b>'+e.comment.name+'</b><span style="padding-left: 12px;"> <svg width="24px" hight="24px" style="fill:#446cb3;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M274.7 304H173.3C77.61 304 0 381.6 0 477.3C0 496.5 15.52 512 34.66 512H413.3C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304zM224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM632.3 134.4c-9.703-9-24.91-8.453-33.92 1.266l-87.05 93.75l-38.39-38.39c-9.375-9.375-24.56-9.375-33.94 0s-9.375 24.56 0 33.94l56 56C499.5 285.5 505.6 288 512 288h.4375c6.531-.125 12.72-2.891 17.16-7.672l104-112C642.6 158.6 642 143.4 632.3 134.4z"/></svg></span><i style="color:#446cb3;">Người ghé thăm</i> <p>'+e.comment.comment+'</p> </div> </div>'+rs;
                                        k++;
                                    }

                                }
                            });
                            let bl=$("#bnt_bl_"+i).text();
                            $("#bnt_bl_"+i).html(Number(bl)+k);
                            $("#loading_"+i).hide();


                            $("#showrs_"+i).html(rs+data.data);
                            let more=data.more;
                            if(more){
                                $("#more_"+i).attr("index", more);
                            }else{
                                $("#more_"+i).hide();
                            }
                        });

                        // $("#showrs_"+i).html(rs+test1)
                    // },1000)
                }
                
                
            

        }else{//da bam roi
            $("#comment_"+i).show(300,"linear");
        }
    })
    // an binh luan
    $(".anBinhLuan").click(function(){
        let i= $(this).attr("data");
       $("#comment_"+i).hide(300,"linear");
       $("#write_comment_input_"+i).hide();
       $("#vbl_"+i).show();
    })
    // viet binh luan
    $(".vietBinhLuan").click(function(){
        $(this).hide();
        let i= $(this).attr("data");
       $("#write_comment_input_"+i).show(300,"linear");
    })
    // nhấn like
    var triger_like=(localStorage.getItem("comment_like"))==null?'':(localStorage.getItem("comment_like"));
    var triger_liked=(localStorage.getItem("comment_liked"))==null?'':(localStorage.getItem("comment_liked"));
    $(".likez").click(function(){
        let id= $(this).attr("data");
        if(triger_like.search(id+',')==-1){// chua co gi
            jQuery("div", this).addClass("liked");
            let i=jQuery("span", this).text();
            jQuery("span", this).html(Number(i)+1);
            triger_like+=id+','
            localStorage.setItem("comment_like", triger_like);
            if(triger_liked.search(id+',')==-1){// post like only one
                //[todo] post like here;
                let data_send=new FormData();
                data_send.append('id_comment',id)
                data_send.append('type','like')
                $.ajax({
                    url: url_binh_luan,
                    data: data_send,
                    processData: false,
                    type: 'POST',
                    contentType: false,
                })
                triger_liked+=id+','
                localStorage.setItem("comment_liked", triger_liked);
            }
        }else{// da co
            jQuery("div", this).removeClass("liked");
            let i=jQuery("span", this).text();
            let a=Number(i)>0?Number(i)-1:0;
            jQuery("span", this).html(a);
            triger_like=triger_like.replace(id+',', "");
            localStorage.setItem("comment_like", triger_like);
        }
    })
    $(".likez").map(function() {
        let id= $(this).attr("data");
        if(triger_like.search(id+',')>-1){
            jQuery("div", this).addClass("liked");
        }
    })
    // nhấn share
    var triger_shared=(localStorage.getItem("comment_shared"))==null?'':(localStorage.getItem("comment_shared"));
    $(".sharez").click(function(){
        let id= $(this).attr("data");
        if(triger_shared.search(id+',')==-1){// post like only one
            //[todo] post share here;
            let data_send=new FormData();
            data_send.append('id_comment',id)
            data_send.append('type','share')
            $.ajax({
                url: url_binh_luan,
                data: data_send,
                processData: false,
                type: 'POST',
                contentType: false,
            })
            triger_shared+=id+','
            localStorage.setItem("comment_shared", triger_shared);
            let i=jQuery("span", this).text();
            jQuery("span", this).html(Number(i)+1);
        }
    })
    // Nhấn gửi bình luận
    $(".sendbl").click(function(){
        let i= $(this).attr("data");
        let url_ref= $(this).attr("url_ref");
        let id_comment= $(this).attr("data").replace(/<[^>]*>/g, "");
        let comment=$("#rs_comment_"+i).val().replace(/<[^>]*>/g, "");
        let name=$("#author_"+i).val().replace(/<[^>]*>/g, "");
        let phone=$("#phone_"+i).val().replace(/<[^>]*>/g, "");
        let is_ok=validate_comment(comment,name,phone);
        if(is_ok){
            // [todo] post binh luan o day
            let data_send=new FormData();
            let in_catch=makeid(5);
            data_send.append('value_comment',JSON.stringify({
                url_ref:url_ref,
                id_catch:in_catch,
                content:comment,
                author:name,
                phone:phone,
                type:'nl',
                img:[],
                rep:{
                    author:'',
                    contents:''
                },
                // is_set:false
            }));
            data_send.append('id_comment',id_comment);
            data_send.append('phone',phone);
            $.ajax({
                url: url_post_comment,
                data: data_send,
                processData: false,
                type: 'POST',
                contentType: false,
                success: function ( data ) {
                    console.log("🚀 ~ file: script-detail.js:163 ~ $ ~ data", data)
                }
            })
            // // luu vao local
            let your_comment='<div class="com1"> <div class="w1"> <b>'+name+'</b><span style="padding-left: 12px;"> <svg width="24px" hight="24px" style="fill:#446cb3;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M274.7 304H173.3C77.61 304 0 381.6 0 477.3C0 496.5 15.52 512 34.66 512H413.3C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304zM224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM632.3 134.4c-9.703-9-24.91-8.453-33.92 1.266l-87.05 93.75l-38.39-38.39c-9.375-9.375-24.56-9.375-33.94 0s-9.375 24.56 0 33.94l56 56C499.5 285.5 505.6 288 512 288h.4375c6.531-.125 12.72-2.891 17.16-7.672l104-112C642.6 158.6 642 143.4 632.3 134.4z"/></svg></span><i style="color:#446cb3;">Người ghé thăm</i> <p>'+comment+'</p> </div> </div>';
            user_comments.push({
                in_catch:in_catch,
                i:i,
                index:id_comment,
                comment:{
                    name:name,
                    comment:comment
                }
            })
            localStorage.setItem("user_comments", JSON.stringify(user_comments));
            let html=your_comment+ $("#showrs_"+i).html();
            $("#showrs_"+i).html(html);
            $("#noComment_"+i).hide();
            $("#rs_comment_"+i).val('');
            $("#write_comment_input_"+i).hide(300,"linear");
            $(".vietBinhLuan").show(300,"linear");
            let bl=$("#bnt_bl_"+i).text();
            $("#bnt_bl_"+i).html(Number(bl)+1);
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#bnt_bl_"+i).offset().top
            }, 800);
        }
    })
    // nhấn xem thêm bình luận
    $(".more-bl").click(function(){
        let i= $(this).attr("data");
        let page= $(this).attr("index");
        // [todo] get post here
        $.get(url_get_comment+page+"&id="+i, function(data) {
            console.log("🚀 ~ file: script-detail.js:47 ~ $.get ~ data", data)
            $("#showrs_"+i).append(data.data);
            let more=data.more;
            if(more){
                $("#more_"+i).attr("index", more);
            }else{
                $("#more_"+i).hide();
            }
        });
        // $("#showrs_"+i).append(test1);
    })
    // hien thi hinh anh input img
    // $("#img_read").change(function(){
    //     readURL(this);
    // });
    // function readURL(input) {
    //     if (input.files && input.files[0]) {
    //         $('#show_img').html('');
    //         for(let i=0;i<input.files.length;i++){
    //             if(input.files[i]){ 
    //                 let reader = new FileReader();
    //                 reader.onload = function (e) {
    //                     let  imgs='<img class="uouo" src="'+e.target.result+'">';
    //                     $('#show_img').append(imgs);
    //                 }
    //                 reader.readAsDataURL(input.files[i]);
    //             }
    //         };

    //     }
    // }
    function validate_comment(comment,name,phone){
        var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
        if(comment.length<20){
            alert('Nội dung "Bình luận" ít nhất 10 kí tự, phiền bạn ghi thêm cảm nhận.')
            return false;
        }
        if (vnf_regex.test(phone) == false) {
            alert('Số điện thoại không chính xác!')
            return false;
        }
        if(name.length<2){
            alert('Bạn cần điền thêm thông tin "Họ tên"!')
            return false;
        }
        return true
    }
    
    function makeid(length){
        var result           = '';
        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
      }
      $(document).bind('contextmenu', function (e) { return false; });$('body').bind('cut copy', function (e) { return false;});
})