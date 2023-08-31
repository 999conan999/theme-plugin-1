let ww = document.getElementsByClassName("imgz")[0].offsetWidth;
var imgElements = document.querySelectorAll(".zz");
imgElements.forEach(e => {
        e.style.height = (ww - 2) + "px";
        clock=true;
});
function setdata(id,git) {
    // localStorage.setItem("value",git);
    let data=document.getElementById(id).getAttribute("data");
    localStorage.setItem("order_2", data);
}
function set_kt(data,v,i){
  document.getElementById("price_og_"+v).innerHTML=(Number(data.g_og)).toLocaleString('vi-VN', {style : 'currency', currency : 'VND'});
  document.getElementById("ktz_"+v).innerHTML=data.kt;
  document.getElementById("price_sale_"+v).innerHTML=(Number(data.g_sale)).toLocaleString('vi-VN', {style : 'currency', currency : 'VND'});
  remove_class_by_class("xxx_"+v);
  document.getElementById("kt_"+v+'_'+i).classList.add("checked");
  let data_checkout=JSON.parse(document.getElementById('buy_'+v).getAttribute("data"));
   data_checkout.price=data.g_sale;
   data_checkout.size=data.kt;
   document.getElementById('buy_'+v).setAttribute("data", JSON.stringify(data_checkout));
}

function remove_class_by_class(triger){
    var testarray = document.getElementsByClassName(triger);
    for(var i = 0; i < testarray.length; i++)
    {
        testarray[i].classList.remove("checked");
    }
}
