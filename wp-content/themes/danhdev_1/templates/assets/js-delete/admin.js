$(document).ready(function() {
    var time = document.querySelectorAll(".date");
    var time_now = new Date().getTime();
    time.forEach(e => {
        // e.textContent="red";
        let time_his = Date.parse(e.textContent);
        let time_long = Math.floor((time_now - time_his) / 60000); //all phut
        let count_day = Math.floor(time_long / 1440); //
        let count_hour = Math.floor(time_long / 60) - count_day * 24; //
        let count_Minutes = time_long - count_day * 24 * 60 - count_hour * 60;
        let text_show = '<span>';
        if (count_day > 0) {
            text_show += count_day + " ngày ";
        }
        if (count_hour > 0) {
            text_show += count_hour + " giờ ";
        }
        text_show += count_Minutes + " phút trước</span>";
        e.innerHTML = text_show;
        // console.log("🚀 ~ file: admin.js ~ line 20 ~ $ ~ text_show", text_show)
    });

})

function xoa(id) {
    var r = confirm("có chắc chắn muốn xóa đơn hàng này hay không ?");
    if (r == true) {
        url = $("#url").attr("data") + "/wp-content/themes/danhdev_1/templates/ajax/admin.php";
        $.ajax({
            type: 'POST',
            url: url,
            data: { id: id },
            success: function(data) {
                location.reload();
            }
        });
    }

}