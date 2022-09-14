function provedor_home() {
    $.get("inventario/provedor/home", {}, function (data, textStatus, jqXHR) {
        $("#main-container").html(data);
    });
}
function newProveedor() {
    $("#md_provedor_add_1").modal("show");
    $("#form_new_provedor").trigger("reset");
}
$("#form_new_provedor").submit(function (e) {
    e.preventDefault();
});
