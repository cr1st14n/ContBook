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
function viewPedido(key) {
    console.log("home cliente");
    switch (key) {
        case 1:
            $("#md_tipoPrecio").modal("show");
            break;
        case 2:
            $("#md_tipoPrecio").modal("hide");
            ped_TipoPrecio = $("#inp_tipoPrecio").val();
            $.get("ContApp/Pedido/", function (data, textStatus, jqXHR) {
                $("#main-container").html(data);
            });

            break;
        case 3:
            $.get("ContApp/Pedido", function (data, textStatus, jqXHR) {
                $("#main-container").html(data);
            });

            break;

        default:
            break;
    }
}

// *-------------- PEDIDO AGREGAR-----------
ped_idCliente = "";
ped_clientes = "";
ped_idPro = "";
ped_data = [];
ped_TipoPrecio = "";
let ped_costoTotal = 0;

function clienteSearch() {
    $("#modal_busCliente").modal("show");
}
function searchClie() {
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
}
function funSelectClie(p) {
    ped_idCliente = ped_clientes[p].id;
    $("#modal_busCliente").modal("hide");
    $("#tbodylistCliePed").html("");
    $("#inp_text_1").val("");
    strin1 = ` 
    Nombre: <strong>${ped_clientes[p].cli_nombre}</strong> CI:<strong>${ped_clientes[p].cli_ci}</strong> <br>
    R.Z.:<strong>${ped_clientes[p].cli_razonSocial}</strong> NIT:<strong>${ped_clientes[p].cli_razonSocialNit}</strong>`;
    $("#p_datClie").html(strin1);
}

function showcatalogo() {
    $("#modal_busProducto").modal("show");
}
function showlistPro(param) {
    showCarga_1();
    $.ajax({
        type: "get",
        url: "ContApp/Pedido/listProducto",
        data: { TP: ped_TipoPrecio },
        success: function (response) {
            console.log(response);
            ped_producto = response;

            tbodyProdMaque(response);
        },
    });
}
function searchPro(e) {
    showCarga_1();
    $.get(
        "ContApp/Pedido/busProducto",
        { data: $("#inp_text_pro_1").val(), TP: ped_TipoPrecio },
        function (data, textStatus, jqXHR) {
            console.log(data);
            ped_producto = data;
            tbodyProdMaque(data);
        }
    );
}
function showCarga_1() {
    html = `
    <tr>
        <td colspan="4">
            <div class="row items-push-3x text-center">
                <div class="col-12 col-md-12">
                    <i class="fa fa-2x fa-cog fa-spin"></i>
                </div>
            </div>
        </td>
    </tr>
    `;
    $("#tbodylistProPed").html(html);
}
function tbodyProdMaque(data) {
    html = data
        .map(function (p, i) {
            switch (ped_TipoPrecio) {
                case "P1":
                    tp = p.pdo_preUniVenta1;
                    break;
                case "P2":
                    tp = p.pdo_preUniVenta2;
                    break;
                case "P3":
                    tp = p.pdo_preUniVenta3;
                    break;

                default:
                    break;
            }
            return (h = `
    <tr>
        <td class="text-center">
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip"
                    title="Edit Client" onclick="funSelectPro(${i})">
                    <i class="fa fa-fw fa-arrow-circle-right"></i>
                </button>
            </div>
        </td>
        <th class="text-center" scope="row">${p.prov_sigla}-${p.pdo_cod}</th>
        <td class="font-w600 font-size-sm">-NG: ${p.pdo_nomGen} <hr>-NC: ${p.pdo_nomComer} <hr>Precio: ${tp}Bs.-  Stock: ${p.pdo_cant}</td>
    </tr>
    `);
        })
        .join(" ");
    $("#tbodylistProPed").html(html);
}
function funSelectPro(p) {
    console.log($("#inp_text_pro_2").val());
    console.log(ped_producto[p].pdo_cant);
    console.log(ped_producto[p]);
    if ($("#inp_text_pro_2").val() < 0 || $("#inp_text_pro_2").val() == "") {
        notif(3, "Error. cantidad!");
        return;
    }
    ped_idPro = ped_producto[p];
    let cantidad = $("#inp_text_pro_2").val();
    let tp = 0;
    switch (ped_TipoPrecio) {
        case "P1":
            tp = ped_producto[p].pdo_preUniVenta1;
            break;
        case "P2":
            tp = ped_producto[p].pdo_preUniVenta2;
            break;
        case "P3":
            tp = ped_producto[p].pdo_preUniVenta3;
            break;

        default:
            break;
    }
    console.log( tp );
    console.log( parseFloat(tp) );

    ped_costoTotal = (ped_costoTotal + (cantidad  * parseFloat((tp).replace(/,/g, '.') ).toFixed(2) ));
    $("#secCostoTotal").html("TOTAL :" + ped_costoTotal);

    ped_data.push({ pro: ped_idPro, cant: $("#inp_text_pro_2").val() });

    notif(1, "Producto agregado");
    console.log(ped_data);
    showListProSelec();
}
function showListProSelec() {
    html = ped_data
        .map(function (p) {
            switch (ped_TipoPrecio) {
                case "P1":
                    tp = p.pro.pdo_preUniVenta1;
                    tpT = (parseFloat((tp).replace(/,/g, '.') ).toFixed(2) * parseFloat(p.cant)).toFixed(2);
                    break;
                case "P2":
                    tp = p.pro.pdo_preUniVenta2;
                    tpT = (parseFloat((tp).replace(/,/g, '.') ).toFixed(2) * parseFloat(p.cant)).toFixed(2);
                    break;
                case "P3":
                    tp = p.pro.pdo_preUniVenta3;
                    tpT = (parseFloat((tp).replace(/,/g, '.') ).toFixed(2) * parseFloat(p.cant)).toFixed(2);
                    break;

                default:
                    break;
            }

            return (h = `
    <tr>
    <th class="text-center" scope="row">${p.pro.id}</th>
    <td class="font-w600 font-size-sm">${p.pro.pdo_nomGen} - ${p.pro.pdo_nomComer} <br>C.U.:${tp},  cantidad: ${p.cant}  P.T.:${tpT}</td>
    <td class="text-center">
        <div class="btn-group">
            <button type="button" class="btn btn-sm btn-dark" data-toggle="tooltip"
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
    $("#modal_busProducto").modal("hide");
    $("#inp_text_pro_2").html("");
    $("#inp_text_pro_1").html("");
}
function calcularPrecio(p) {
    ped_producto[p].pdo_cant;
    ped_costoTotal = ped_costoTotal + parseFloat(p);
    $("#secCostoTotal").html("TOTAL:" + ped_costoTotal);
}
function concluirPedido() {
    if (ped_idCliente == "") {
        notif(3, "seleccione Cliente");
        return;
    }
    if (ped_data == "") {
        notif(3, "seleccione Productos");
        return;
    }
    $.ajax({
        type: "post",
        url: "ContApp/Pedido/storePedido",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            C: ped_idCliente,
            P: ped_data,
        },
        success: function (response) {
            console.log(response);
            notif(2, "Pedido registrado");
            viewInicio();
        },
    });
}
