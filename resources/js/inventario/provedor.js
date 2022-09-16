function provedor_home() {
    $.get("inventario/provedor/home", {}, function (data, textStatus, jqXHR) {
        $("#main-container").html(data);
        show_list_1();
    });
}
function newProveedor() {
    $("#md_provedor_add_1").modal("show");
    $("#form_new_provedor").trigger("reset");
}
function show_list_1() {
    $.get(
        "inventario/provedor/query_list",

        function (data, textStatus, jqXHR) {
            html = data
                .map(function (e) {
                    est =
                        '<span class="badge badge-danger"><i class="fa fa-times-circle"></i></span>';
                    if (e.ca_estado == "1") {
                        est =
                            '<span class="badge badge-primary"><i class="fa fa-check-circle"></i></span>';
                    }
                    return (h = `
            <tr>
                <th class="text-center" scope="row">${e.id}</th>
                <td class="font-w600 font-size-sm">
                    <p style="font-size: 18px;">${e.prov_nombre}</p>
                </td>
                <td>${e.prov_nit}</td>
                <td>
                        Telf: ${e.prov_telf}
                    <br>Correo: <strong>${e.prov_mail}</strong>
                </td>
                <td>
                    <strong>${e.prov_contacto}</strong> <br> <p>${e.prov_telfContacto}</p>
                </td>
                <td class="d-none d-sm-table-cell text-center">
                    ${est}
                </td>
                <td class="text-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="Edit Client">
                            <i class="fa fa-fw fa-pencil-alt"></i>
                        </button>
                        <button type="button" onClick="upd_estado(${e.id})" class="btn btn-sm btn-light" data-toggle="tooltip" title="Remove Client">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </td>
            </tr>
            `);
                })
                .join(" ");
            $("#tbody_list").html(html);
        }
    );
}
$("#form_new_provedor").submit(function (e) {
    e.preventDefault();
    console.log($(this).serialize());
    $.ajax({
        type: "post",
        url: "inventario/provedor/query_store",
        data: $(this).serialize(),
        success: function (response) {
            console.log(response);
            if (response) {
                show_list_1()
                $("#md_provedor_add_1").modal("hide");
            } else {
                console.log("error");
            }
        },
    });
});

function upd_estado(id) { 
    $.get("inventario/provedor/query_upd_estado", {id:id},
        function (data, textStatus, jqXHR) {
            if (data) {
                show_list_1()
            }else{
                console.log('error');
            }
        },
    );
 }
