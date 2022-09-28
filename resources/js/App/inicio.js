function notif(tipo, texto) {
    switch (tipo) {
        case 1:
            One.helpers("notify", {
                type: "info",
                icon: "fa fa-info-circle mr-1",
                message: texto,
            });
            break;

        case 2:
            One.helpers("notify", {
                type: "success",
                icon: "fa fa-check mr-1",
                message: texto,
            });
            break;

        case 3:
            One.helpers("notify", {
                type: "warning",
                icon: "fa fa-exclamation mr-1",
                message: texto,
            });
            break;

        case 4:
            One.helpers("notify", {
                type: "danger",
                icon: "fa fa-times mr-1",
                message: texto,
            });
            break;

        default:
            $.notific8("Registro actualizado .", {
                life: 3000,
                heading: "Correcto",
                icon: "info-circled",
                theme: "amethyst",
                family: "atomic",
                // sticky: true,
                horizontalEdge: "top",
                // horizontalEdge: 'bottom',
                verticalEdge: "rigth",
                zindex: 1500,
                // closeText: 'près',
                onInit: function (data) {
                    console.log("--onInit--Inicial");
                    console.log("data:");
                    console.log(data);
                },
                onCreate: function (notification, data) {
                    console.log("--onCreate-- Creado");
                    console.log("notification:");
                    console.log(notification);
                    console.log("data:");
                    console.log(data);
                },
                onClose: function (notification, data) {
                    console.log("--onClose-- Cerrado");
                    console.log("notification:");
                    console.log(notification);
                    console.log("data:");
                    console.log(data);
                },
            });
            break;
    }
}
function viewInicio() {
    console.log("home ");
    $.get("indexApp", function (data, textStatus, jqXHR) {
        $("#main-container").html(data);
    });
}
function viewCliente() {
    console.log("home cliente");
    $.get("ContApp/cliente", function (data, textStatus, jqXHR) {
        $("#main-container").html(data);
    });
}
function viewPedido() {
    console.log("home cliente");
    $.get("ContApp/Pedido", function (data, textStatus, jqXHR) {
        $("#main-container").html(data);
    });
}

// *-------------- PEDIDO AGREGAR-----------
ped_idCliente = "";
ped_clientes = "";
ped_idPro = "";
ped_data = [];
$("#btn_clienteSearch").click(function (e) {
    e.preventDefault();
    $("#modal_busCliente").modal("show");
});
$("#btn_searchClie").click(function (e) {
    e.preventDefault();
    $.get(
        "ContApp/Pedido/busCliente",
        { data: $("#inp_text_1").val() },
        function (data, textStatus, jqXHR) {
            ped_clientes = data;
            html = data
                .map(function (p, i) {
                    return (h = `
                <tr>
                    <th class="text-center" scope="row">${p.id}</th>
                    <td class="font-w600 font-size-sm">${p.cli_nombre} CI: ${p.cli_ci} <br> ${p.cli_razonSocial} NIT:${p.cli_razonSocialNit}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip"
                                title="Edit Client" onclick="funSelectClie(${i})">
                                <i class="fa fa-fw fa-arrow-circle-right"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                `);
                })
                .join(" ");
            $("#tbodylistCliePed").html(html);
        }
    );
});
function funSelectClie(p) {
    ped_idCliente = ped_clientes[p].id;
    $("#modal_busCliente").modal("hide");
    $("#tbodylistCliePed").html("");
    $("#inp_text_1").val("");
    strin1 = ` 
    Nombre:${ped_clientes[p].cli_nombre} CI:${ped_clientes[p].cli_ci} <br>
    R.Z.:${ped_clientes[p].cli_razonSocial} NIT:${ped_clientes[p].cli_razonSocialNit}`;
    $("#p_datClie").html(strin1);
}

$("#btn_showcatalogo").click(function (e) {
    e.preventDefault();
    $("#modal_busProducto").modal("show");
});
$("#btn_searchPro").click(function (e) {
    e.preventDefault();
    console.log("click click");
    $.get(
        "ContApp/Pedido/busProducto",
        { data: $("#inp_text_pro_1").val() },
        function (data, textStatus, jqXHR) {
            ped_producto = data;
            html = data
                .map(function (p, i) {
                    return (h = `
                <tr>
                    <th class="text-center" scope="row">${p.id}</th>
                    <td class="font-w600 font-size-sm">${p.pdo_nomGen} - ${p.pdo_nomComer} <br> Stock: ${p.pdo_cant}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip"
                                title="Edit Client" onclick="funSelectPro(${i})">
                                <i class="fa fa-fw fa-arrow-circle-right"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                `);
                })
                .join(" ");
            $("#tbodylistProPed").html(html);
        }
    );
});
function funSelectPro(p) {
    ped_idPro = ped_producto[p];

    console.log($("#inp_text_pro_2").val());
    console.log(ped_producto[p].pdo_cant);
    if (
        parseInt($("#inp_text_pro_2").val()) >
        parseInt(ped_producto[p].pdo_cant)
    ) {
        notif(3, "Cantidad superada");
        return;
    }

    ped_data.push({ pro: ped_idPro, cant: $("#inp_text_pro_2").val() });

    notif(1, "Producto agregado");
    console.log(ped_data);
    html = ped_data
        .map(function (p) {
            return (h = `
        <tr>
        <th class="text-center" scope="row">${p.pro.id}</th>
        <td class="font-w600 font-size-sm">${p.pro.pdo_nomGen} - ${p.pro.pdo_nomComer} <br> cantidad: ${p.cant}</td>
        <td class="text-center">
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip"
                    title="Edit Client" >
                    <i class="fa fa-fw fa-arrow-circle-right"></i>
                </button>
            </div>
        </td>
    </tr>
        `);
        })
        .join(" ");
    $("#tbody_listProsect").html(html);
    $("#modal_busCliente").modal("hide");
    $("#inp_text_pro_2").html("");
    $("#inp_text_pro_1").html("");
}
function concluirPedido() {
    if (ped_idCliente == '') {
        notif(3, 'seleccione Cliente')
        return
    }
    if ( ped_data == '' ) {
        notif(3, 'seleccione Productos')
        return
    }
    $.ajax({
        type: "post",
        url: "ContApp/Pedido/storePedido",
        data: {_token: $('meta[name="csrf-token"]').attr("content"), C:ped_idCliente,P:ped_data},
        success: function (response) {
            console.log(response);
            notif(2,'Pedido registrado')
            viewInicio()
        }
    });
}
