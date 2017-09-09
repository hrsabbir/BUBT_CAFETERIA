$(document).ready(function(){
    $('a[href^="#"]').on('click',function (e) {
        e.preventDefault();

        var target = this.hash;
        var $target = $(target);

        $('html, body').stop().animate({
            'scrollTop': $target.offset().top
        }, 900, 'swing', function () {
            window.location.hash = target;
        });
    });
    $(".dy").click(function(){
        arr=this.value;
        arr=arr.split("|");
       $("#order_name").val(arr[1]);
       $("#order_id").val(arr[0]);
       $("#order_available").val("Available: "+arr[2]);
       $("#order_amount").attr("min",1);
       $("#order_amount").attr("max",arr[2]);
        $("#order_submit").attr("name","item_submit");
        $("#order_submit").html("Order");
        $(".form_action").attr("action","#order_link");

    });
    $(".edit_order").click(function(){
        arr=this.value;
        arr=arr.split("|");
        $("#order_name").val(arr[1]);
        $("#order_id").val(arr[0]);
        $("#order_available").val("Available: "+arr[2]);
        $("#order_amount").attr("min",0);
        $("#order_amount").attr("max",arr[2]);
        $("#order_submit").attr("name","item_update");
        $("#order_submit").html("Update");
        $(".form_action").attr("action","#ordered_items_link");

    });

    $(".admin_modal_paid").click(function(){
      x=this.value;
      $('#view_order_submit').attr("name","submit_paid");
        $('#order_token').attr("value",x);
        $(".form_action").attr("action","#view_orders_link");

    });
    $(".admin_modal_canceled").click(function(){
        x=this.value;
        $('#view_order_submit').attr("name","submit_canceled");
        $('#order_token').attr("value",x);
        $(".form_action").attr("action","#view_orders_link");
    });
    $(".item_edit_js").click(function(){
        arr=this.value;
        arr=arr.split("|");
        $("#item_update_name").val(arr[1]);
        $("#item_update_id").val(arr[0]);
        $("#item_update_stock").val(arr[2]);
        $("#item_update_price").val(arr[3]);
        $(".form_action").attr("action","#item_list_link");
    });
    $(".delete_item_js").click(function(){
        x=this.value;
        $('#view_order_submit').attr("name","delete_item");
        $('#order_token').attr("value",x);
        $(".form_action").attr("action","#item_list_link");

    });

});