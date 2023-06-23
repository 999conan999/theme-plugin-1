<div style="position:relative;"  id="khuyen-mai">
    <div id="end-km" style="display:none;"><span>Chương trình khuyến mãi đã kết thúc!</span></div>
    <div class="wrapz bkr-km" id="wrap-km">
        <div class="countdow wrapz">
            <div class="title-km"><?php echo $list_sp->km->title; ?></div>
            <div class="tt-km">*Lưu ý: Thời gian khuyến mãi chỉ còn:</div>
            <div class="wrapt-km">
                <!-- <div class="tt-km">Thời hạn còn:</div> -->
                <div class="count-num-km">
                    <div class="countn-1">
                        <div class="countn-2" id="day-timer">00</div>
                        <div class="countn-3">Ngày</div>
                    </div>
                    <div class="countn-1">
                        <div class="countn-2" id="hour-timer">00</div>
                        <div class="countn-3">Giờ</div>
                    </div>
                    <div class="countn-1">
                        <div class="countn-2" id="minues-timer">00</div>
                        <div class="countn-3">phút</div>
                    </div>
                    <div class="countn-1">
                        <div class="countn-2" id="secon-timer">00</div>
                        <div class="countn-3">giây</div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="imgz img-sale">
                <div class="title-combo1">
                    <!-- <div class="text-combo">📌Lựa chọn 1:</div> -->
                    <div id="scroll-container">
                        <div id="scroll-text">
                            👉<?php echo $list_sp->km->des_scroll; ?>. 
                            <div id="scroll_giam_ngay"><b>🍀Giảm ngay:</b> <span class="price-tiet-kiem" style="color:#2196F3;"></span></div>
                            <div id="scroll_tang_kem"><b> ✔️Tặng kèm</b><span class="price-tiet-kiem" style="color:#2196F3;"></span></div>
                        </div>
                    </div>
                </div>
                <div class="tiet-kiem">
                    <div class="w1-tiet-kiem">
                        <span>Tiết kiệm được:</span><span class="price-tiet-kiem" id="tien_tiet_kiem"></span>
                    </div>
                </div>
                <img id="thumthum" class="sp-chinhx lazyload" data-srcset="<?php echo $img_km; ?>" width="100%">
                <img class="lazyload" data-srcset="<?php echo $list_sp->km->img; ?>" width="100%">
            </div>
        </div>
        <div class="sale-infor">
            <div class="imgz bgr-z">
                <div class="ttkm">Thông tin Khuyến Mãi :</div>
                <div style=" padding: 0px 9px; ">
                    <div>Chọn kích thước bạn muốn mua:</div>
                    <div style="margin-top:12px;" id="test"></div>
                </div>
                <div class="card-2cs">
                    <span class="pingx">⭐⭐⭐</span>
                    <span class="tt-if">Bạn mua sản phẩm gồm:</span>
                    <ul class="list-spkm" id="km_combo"></ul>
                    <div>Tổng giá trị đơn hàng là: <b class="clo-og" id="tong_gia"></b></div>
                    <span class="tt-if">Bạn sẽ được tặng:</span>
                    <ul class="list-spkm" id="km_qt"></ul>
                    <div>Tổng giá trị khuyến mãi: <b class="clo-og" id="sum-km"></b></div>
                    <i class="color-red"><b>*Lưu ý:</b><?php echo $list_sp->km->note; ?></i>
                </div>
                <div class="table-km">
                    <table id="tong_tien"></table>
                </div>
            </div>
        </div>
        <div class="xzu">
            <div class="orderz row" id="btn-km-order">
                <div class="col-5 pdr-3">
                    <a id="lien-he-zalo-2" rel="nofollow" target="_blank"  class="lhzl" href="https://zalo.me/<?php echo $zalo; ?>" onClick="window.value=<?php echo (int)$list_sp->rate*(float)$common->gia_tri_chuyen_doi->zalo_percent; ?>">
                        <span class="lh1">Liên hệ zalo</span>
                        <span style=" font-size: 15px; ">Đặt theo yêu cầu</span>
                    </a>
                </div>
                <div class="col-5">
                    <a href="<?php echo $current_url; ?>?order=order" style="text-decoration: none;" data="" id="km_btn" onclick="setdata('km_btn');localStorage.setItem('value',<?php echo (int)$list_sp->rate*(float)$common->gia_tri_chuyen_doi->order_percent; ?>);">
                        <button id="order" class="ordery">
                            <span class="mh2">Mua combo này</span>
                            <span style=" font-size: 16px; ">giá: <b style="color: #ffc107;" id="mua_km"></b></span>
                        </button>
                    </a>
                </div>
                <div class="divz"></div>
            </div>
        </div>
    </div>
    <div class="popup" id="khuyen-mai-popop" style="display:none;">
    <a class="popop" id="tag-km">
        <span class="anime" style=" left: 3px; top: -2px; ">1</span>
            Combo <span style="color: red;">Khuyến mãi:</span> <br>⭐tiết kiệm: <b style=" color: blue; " id="tkkm-pp"></b><br>👉<span class="morepp"> Xem ngay</span>
        </a>
    </div>
</div>