// *-----------varibles de inicio-----
provedor_1 = "";
// *-----------end-----
function provedor_home() {
    $.get("inventario/provedor/home", {}, function (data, textStatus, jqXHR) {
        $("#main-container").html(data);
        show_list_1();
    });
}

// *--------crear provedor -----------
function newProveedor() {
    $("#md_provedor_add_1").modal("show");
    $("#form_new_provedor").trigger("reset");
}
$("#form_new_provedor").submit(function (e) {
    e.preventDefault();
    // console.log($(this).serialize());
    $.ajax({
        type: "post",
        url: "inventario/provedor/query_store",
        data: $(this).serialize(),
        success: function (response) {
            // console.log(response);
            if (response) {
                show_list_1();
                $("#md_provedor_add_1").modal("hide");
            } else {
                console.log("error");
            }
        },
    });
});
// *--------- end ------------

// *--------- funcines de listar ------------
function show_list_1() {
    $.get(
        "inventario/provedor/query_list",

        function (data, textStatus, jqXHR) {
            print_tbody(data);
        }
    );
}
$("#prov_search").keyup(function (e) {
    if ($(this).val() == "") {
        console.log("sin data");
        show_list_1();
        return;
    }
    $.get(
        "inventario/provedor/query_prov_search",
        { data: $(this).val() },
        function (data, textStatus, jqXHR) {
            print_tbody(data);
        }
    );
});
function print_tbody(data) {
    html = data
        .map(function (e) {
            est =
                '<span class="badge badge-danger"><i class="fa fa-times-circle"></i></span>';
            if (e.ca_estado == "1") {
                est =
                    '<span class="badge badge-primary"><i class="fa fa-check-circle"></i></span>';
            }
            return (h = `
<tr id="trProv_${e.id}">
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
            <button type="button" onClick="edit_prov(${e.id})" class="btn btn-sm btn-light" data-toggle="tooltip" title="Edit Client">
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
// *--------- end ------------

// *--------- cambiar estado ------------
function upd_estado(id) {
    $.get(
        "inventario/provedor/query_upd_estado",
        { id: id },
        function (data, textStatus, jqXHR) {
            if (data) {
                show_list_1();
            } else {
                console.log("error");
            }
        }
    );
}
// *--------- end ------------

function edit_prov(id) {
    $("#form_new_provedor").trigger("reset");
    $.get(
        "inventario/provedor/query_edit_prov",
        { id: id },
        function (data, textStatus, jqXHR) {
            provedor_1 = data.id;
            $("#prov_nombre_edit").val(data.prov_nombre);
            $("#prov_nit_edit").val(data.prov_nit);
            $("#prov_telf_edit").val(data.prov_telf);
            $("#prov_mail_edit").val(data.prov_mail);
            $("#prov_contacto_edit").val(data.prov_contacto);
            $("#prov_telfContacto_edit").val(data.prov_telfContacto);
            $("#md_provedor_edit_1").modal("show");
        }
    );
}
$("#form_edit_provedor").submit(function (e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "inventario/provedor/query_update_prov/" + provedor_1,
        data: $(this).serialize(),
        success: function (e) {
            if (!e) {
                console.log("error");
                return;
            }
            $("#md_provedor_edit_1").modal("hide");
            $par = `
            
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
                        <button type="button" onClick="edit_prov(${e.id})" class="btn btn-sm btn-light" data-toggle="tooltip" title="Edit Client">
                            <i class="fa fa-fw fa-pencil-alt"></i>
                        </button>
                        <button type="button" onClick="upd_estado(${e.id})" class="btn btn-sm btn-light" data-toggle="tooltip" title="Remove Client">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </td>
            `;
            $("#trProv_" + provedor_1).html($par);
        },
    });
});
// trProv_;
