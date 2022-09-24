id_cliente_select = "";
function clientes_home() {
    $.get("cliente", function (data, textStatus, jqXHR) {
        $("#main-container").html(data);
        setTimeout(() => {
            queryListCliente();
        }, 800);
    });
    One.layout('sidebar_toggle');

}
function queryListCliente() {
    $.get("cliente/list_1", function (data, textStatus, jqXHR) {
        showCliente_body(data);
        console.log(data);
    });
}

function showCliente_body(param) {
    $("#tbodyList_clientes").html(
        param
            .map(function (p) {
                return (h = `
            <tr id="tr_clie_${p.id}">
                <td class="text-center">${p.id}</td>
                <td class="text-center">${p.cli_ci}</td>
                <td class="text-center">${p.cli_nombre}</td>
                <td class="text-center">${p.cli_razonSocial}</td>
                <td class="text-center">${p.cli_razonSocialNit}</td>
                <td class="text-center">${p.cli_telf}</td>
                <td class="text-center">${p.cli_mail}</td>
                <td class="text-center">${p.cli_direccion}</td>
                <td class="text-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="Remove Client" onClick="clie_editar(${p.id})">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="Remove Client" onClick="clie_edit_estado(${p.id})">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </td>
            </tr>
            `);
            })
            .join(" ")
    );
}
$("#btn_create_cliente").click(function (e) {
    e.preventDefault();
    $("#md_create_cliente").modal("show");
    $("#form_new_cliente1").trigger("reset");
});
$("#form_new_cliente1").submit(function (e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "cliente/query_create",
        data: $(this).serialize(),
        success: function (response) {
            console.log(response);
            if (response == "error_1") {
                console.log("error_ci");
                return;
            }
            if (response == "error_2") {
                console.log("error_nit");
                return;
            }
            if (response == "error_3") {
                console.log("error_RZ");
                return;
            }
            if (response == "error_4") {
                console.log("error_mail");
                return;
            }
            $("#md_create_cliente").modal("hide");
            queryListCliente();
        },
    });
});
function clie_editar(id) {
    $.get("cliente/query_edit", { id: id }, function (data, textStatus, jqXHR) {
        console.log(data);
        id_cliente_select = data.id;
        $("#edit_cli_ci").val(data.cli_ci);
        $("#edit_cli_nombre").val(data.cli_nombre);
        $("#edit_cli_razonSocialNit").val(data.cli_razonSocialNit);
        $("#edit_cli_razonSocial").val(data.cli_razonSocial);
        $("#edit_cli_mail").val(data.cli_mail);
        $("#edit_cli_telf").val(data.cli_telf);
        $("#edit_cli_direccion").val(data.cli_direccion);
        $("#md_edit_cliente").modal("show");
    });
}

$("#form_edit_cliente1").submit(function (e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "cliente/query_update/" + id_cliente_select,
        data: $(this).serialize(),
        success: function (response) {
            console.log(response);
            if (response == "Er_ci") {
                console.log("error_ci");
                return;
            }
            if (response == "Er_nit") {
                console.log("error_nit");
                return;
            }
            if (response == "Er_mail") {
                console.log("error_RZ");
                return;
            }

            if (response == "1") {
                $("#md_edit_cliente").modal("hide");
                queryListCliente();
            }
        },
    });
});
function clie_edit_estado(id) {
    $.post(
        "cliente/query_edit_estado",
        { _token: $('meta[name="csrf-token"]').attr("content"), id: id },
        function (data, textStatus, jqXHR) {
            if (data) {
                $("#tr_clie_" + id).remove();
            } else {
                console.log("error!");
            }
        }
    );
}
$("#inp_search_clie").keyup(function (e) {
    console.log($(this).val());
    if ($(this).val() != "") {
        $.get(
            "cliente/query_search_1",
            { data: $(this).val() },
            function (data, textStatus, jqXHR) {
                showCliente_body(data);
            }
        );
    } else {
        queryListCliente();
    }
});
