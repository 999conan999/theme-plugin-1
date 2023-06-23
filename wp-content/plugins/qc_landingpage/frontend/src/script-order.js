$(document).ready(function(){
    // localStorage.setItem("order",JSON.stringify({
    //     img:"https://anbinhnew.com/wp-content/uploads/2021/01/Ban-hoc-doi-bang-nhua-cho-be-trai-va-gai-1-300x300.jpg",
    //     title:"Combo Bộ Bàn Học Đôi Bằng Nhựa Có Kệ Sách Cho Bé Trai, Bé Gái",
    //     size:"1m4 X 50cm X 1m5",
    //     price:"2000000",
    //     sl:"1",
    //     url:"file:///E:/CODE_%20fronEnd/Landding-tu-do-frontend/detailSP/index.html#"
    // }));
    let product_order=JSON.parse(localStorage.getItem("order_2"));
    window.value=localStorage.getItem("value");
    show_product(product_order);
    //
    $("#tien-hanh-dat-hang").click(function(){
        let name=$("#billing_first_name").val();
        let phone=$("#billing_phone").val();
        let adress=$("#billing_address_1").val();
        let note=$("#order_comments").val();
        let is_ok=true;
        if(name.length<1){
            is_ok=false;
            $("#note1").css("display", "contents");
        }else{
            $("#note1").css("display", "none");
        }
        
        var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
        if (vnf_regex.test(phone) == false) 
        {
            is_ok=false;
            $("#note2").css("display", "contents");
        }else{
            $("#note2").css("display", "none");
        }

        if(adress.length<8){
            is_ok=false;
            $("#note3").css("display", "contents");
        }else{
            $("#note3").css("display", "none");
        }

        if(is_ok){
            $("#loading").css("display", "block");
            const home=$("#header").attr("index");
            const url_order=home+'/wp-content/plugins/qc_landingpage/ajax/order/add_checkout.php';
            const url_telegram=home+'/wp-content/plugins/qc_landingpage/ajax/order/telegram.php';
            let data=JSON.stringify({
                kt:product_order.size,
                g:product_order.price,
                name:product_order.title,
                msp:'',
                img:product_order.img,
                sl:product_order.sl,
                url_sp:product_order.url,
                z_name:name,
                z_phone:phone,
                z_address:adress,
                z_note:note
            })
            window.value=window.value*product_order.sl;
            let data_send=new FormData();
            data_send.append('data',data)
            data_send.append('phone',phone)

            $.ajax({
                url: url_order,
                data: data_send,
                processData: false,
                type: 'POST',
                contentType: false,
                success: function ( data ) {
                    if(data.status){
                        $("#loading").css("display", "none");
                        set_data_success(name,phone,adress,note,product_order);
                        $.ajax({
                            url: url_telegram,
                            data: data_send,
                            processData: false,
                            type: 'POST',
                            contentType: false,
                        })
                   }else{
                        alert('Đặt hàng thất bại, xin vui lòng liên hệ trực tiếp chúng tôi.')
                   }

                }
            });






            // setTimeout(()=>{
            //     $("#loading").css("display", "none");
            //     set_data_success(name,phone,adress,note,product_order)
            // },2000)
            //
        }

    });
    //

    $("#de").click(function(){
        let sl=Number(product_order.sl);
        if(sl>1) sl--;
        product_order.sl=sl;
        show_product(product_order);
    });
    $("#en").click(function(){
        let sl=Number(product_order.sl);
         sl++;
        product_order.sl=sl;
        show_product(product_order);
    });
    function show_product(product_order){
        let show_titlez='<span>'+product_order.title+'</span> - <span style="font-weight: 600;">'+product_order.size+'</span> - <span style="font-weight: 600;color: green;"> '+(product_order.price!=0?Number(product_order.price).toLocaleString('vi-VN', {style : 'currency', currency : 'VND'}):"Liên hệ (Chúng tôi sẽ liên hệ bạn)")+' </span>'
        $("#thum").attr("src",product_order.img);
        $("#titlez").html(show_titlez);
        $("#num").html(product_order.sl);
        $("#sump").html((Number(product_order.sl)*Number(product_order.price)).toLocaleString('vi-VN', {style : 'currency', currency : 'VND'}));
    }
    function set_data_success(name,phone,adress,note,product_order){
        let sp='<td><span style="color: #333;">'+product_order.title+'</span></td> <td>'+Number(product_order.price).toLocaleString('vi-VN', {style : 'currency', currency : 'VND'})+'</td> <td>'+product_order.sl+'</td> <td>'+(Number(product_order.sl)*Number(product_order.price)).toLocaleString('vi-VN', {style : 'currency', currency : 'VND'})+'</td>';
        $("#sp").html(sp);
        $("#sum-price").html((Number(product_order.sl)*Number(product_order.price)).toLocaleString('vi-VN', {style : 'currency', currency : 'VND'}));
        let guess='<p style=" text-align: left; margin-bottom: 8px; color: currentColor;margin-top: 6px;"> Thông tin người nhận :</p> <p style="text-align: left;margin-bottom: 8px;color: currentColor;margin-top: 6px;"> Tên : <b>'+name+'</b></p> <p style="text-align: left;margin-bottom: 8px;color: currentColor;margin-top: 6px;"> Địa chỉ : <b>'+adress+'</b></p> <p style="text-align: left;margin-bottom: 8px;color: currentColor;margin-top: 6px;"> Số điện thoại : <b>'+phone+'</b></p> <p style="text-align: left;margin-bottom: 8px;color: currentColor;margin-top: 6px;"> Ghi chú : '+note+'</p> <p style="text-align: left;margin-bottom: 8px;color: currentColor;margin-top: 6px;"> Thanh toán : Trả tiền mặt khi nhận hàng.</p>'
        $("#guess").html(guess);
        $("#backz").attr("href",product_order.url);
        $("#order_ok").css("display", "block");
    }

})