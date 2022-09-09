function producto_home(param) {
    $.get("inventario/producto/home", function (data, textStatus, jqXHR) {
        // console.log(data);
        $("#main-container").html(data);
    });
}

$('#btn_pro_add_1').click(function (e) { 
    e.preventDefault();
    $('#md_pro_add_1').modal('show');
});
