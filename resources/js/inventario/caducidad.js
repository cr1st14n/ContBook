function caducidad_home() {
    $.ajax({
        type: "get",
        url: "inventario/",
        data: {},
        // dataType: "dataType",
        success: function (response) {
            $("#main-container").html(response);
            setTimeout(() => {
                show_list_tbody_caducidad();
            }, 900);
        },
    });
    One.layout("sidebar_toggle");
}

function show_list_tbody_caducidad() {
    $.get(
        "inventario/caducidad/query_list_1",
        data,
        function (data, textStatus, jqXHR) {
            html = data
                .map(function (p) {
                    // console.log(p['dias']);
                    if (p.dias > 61) {
                        h =
                            '<span class="badge badge-success">Valido ' +
                            p.dias +
                            " Dias</span>";
                    }
                    if (p.dias < 61) {
                        h =
                            '<span class="badge badge-info">Observacion ' +
                            p.dias +
                            " Dias</span>";
                    }
                    if (p.dias < 31) {
                        h =
                            '<span class="badge badge-warning">Por Vencer ' +
                            p.dias +
                            " Dias</span>";
                    }
                    if (p.dias < 1) {
                        h = '<span class="badge badge-danger">Vencido</span>';
                    }

                    return (h = `
                    <tr id="tr_tbody_${p.id}">
                        <td class="font-w600 font-size-sm text-center">${p.nombre}</td>
                        <td class="font-w600 font-size-sm">${p.prov}</td>
                        <td class="font-w600 font-size-sm">${p.lote}</td>
                        <td class="font-w600 font-size-sm">${p.cantidad}</td>
                        <td class="d-none d-sm-table-cell">${h}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="Remove Client" onClick="check_estado_cad(${p.id})">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
            `);
                })
                .join(" ");
            $("#tbody_caducidad").html(html);
        }
    );
}
function check_estado_cad(id) {
    $.post(
        "inventario/caducidad/check_est_cad",
        { _token: $('meta[name="csrf-token"]').attr("content"), id: id },
        function (data, textStatus, jqXHR) {
            console.log(data);
            if (data) {
                $("#tr_tbody_" + id).remove();
                show_list_tbody_caducidad();
            } else {
                console.log("Error");
            }
        }
    );
}
