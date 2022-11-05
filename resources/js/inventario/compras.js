function compras_home() {
    $.ajax({
        type: "get",
        url: "inventario/compras/home",
        data: "data",
        success: function (data) {
            $("#main-container").html(data);
        },
    });
}
