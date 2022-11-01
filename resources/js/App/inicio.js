function notif(tipo, texto) {
    switch (tipo) {
        case 1:
            One.helpers("notify", {
                type: "info",
                icon: "fa fa-info-circle mr-1",
                message: texto,
                align: "left",
            });
            break;

        case 2:
            One.helpers("notify", {
                type: "success",
                icon: "fa fa-check mr-1",
                message: texto,
                align: "left",
            });
            break;

        case 3:
            One.helpers("notify", {
                type: "warning",
                icon: "fa fa-exclamation mr-1",
                message: texto,
                align: "left",
            });
            break;

        case 4:
            One.helpers("notify", {
                type: "danger",
                icon: "fa fa-times mr-1",
                message: texto,
                align: "left",
            });
            break;

        default:
            break;
    }
}
function viewInicio() {
    let data = `<!-- Page Content -->
    <div class="content content-narrow">
        <!-- Stats -->
        <div class="row">
            <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="#" onclick="viewCliente()">
                    <div class="block-content block-content-full">
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Cliente <i class="fa fa-plus-circle"></i> </div>
                        <i class=" fa fa-address-book  fa-2x text-muted"></i>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="#" onclick="viewPedido(1)">
                    <div class="block-content block-content-full">
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Pedido <i class="fa fa-plus-circle"></i> </div>
                        <i class="fa fa-shopping-cart fa-2x text-muted"></i>

                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="#" onclick="viewCatalogo(1)">
                    <div class="block-content block-content-full">
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Catalogo</div>
                        <i class="fa fa-store fa-2x text-muted"></i>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="#" onclick="viewCatalogo(2)">
                    <div class="block-content block-content-full">
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Ofertas / Promociones</div>
                        <i class="fa fa-store fa-2x text-muted"></i>
                    </div>
                </a>
            </div>
        </div>
        <!-- END Stats -->
    </div>
    <!-- END Page Content -->`;
    $("#main-container").html(data);
    // $.get("indexApp", function (data, textStatus, jqXHR) {
    //     $("#main-container").html(data);
    // });
}
function viewCliente() {
    $.get("ContApp/cliente", function (data, textStatus, jqXHR) {
        $("#main-container").html(data);
    });
}
const viewPedido = () => {
    if (ped_TipoPrecio == "") {
        notif(4, "Seleccione Región");
        return;
    }
    $.get("ContApp/Pedido/", function (data, textStatus, jqXHR) {
        $("#main-container").html(data);
    });
};
const itemSector = (tipo) => {
    switch (tipo) {
        case 1:
            $("#md_tipoPrecio").modal("show");
            break;
        case 2:
            ped_TipoPrecio = document.querySelector(
                'input[name="inp_tipoPrecio"]:checked'
            ).value;
            $("#md_tipoPrecio").modal("hide");
            switch (ped_TipoPrecio) {
                case "P1":
                    texto = `<span class="badge badge-pill badge-primary"><i class="fa fa-fw fa-info"></i> RERGION 1</span>`;
                    break;
                case "P2":
                    texto = `<span class="badge badge-pill badge-info"><i class="fa fa-fw fa-info"></i> RERGION 2</span>`;
                    break;
                case "P3":
                    texto = `<span class="badge badge-pill badge-warning"><i class="fa fa-fw fa-info"></i> RERGION 3</span>`;
                    break;
            }
            $("#itemSector_sec").html(texto);
            break;
    }
};

const vernull = (data) => {
    if (data != null) {
        return data;
    } else {
        return "";
    }
};
// *-------------- PEDIDO AGREGAR-----------
ped_idCliente = "";
ped_clientes = "";
ped_idPro = "";
ped_data = [];
ped_TipoPrecio = "";
ped_costoTotal = 0;
// *------ cliente----

function clienteSearch() {
    $("#modal_busCliente").modal("show");
}
function searchClie() {
    $.get(
        "ContApp/Pedido/busCliente",
        { data: $("#inp_text_clie").val() },
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
            ped_producto = response;

            tbodyProdMaque(response);
        },
    });
}
function searchPro(e) {
    showCarga_1();
    datos = {
        data: $("#inp_text_pro_1").val(),
        TP: ped_TipoPrecio,
        lab: $("#inp_lab").val(),
    };
    $.get(
        "ContApp/Pedido/busProducto",
        datos,
        function (data, textStatus, jqXHR) {
            ped_producto = data;
            tbodyProdMaque(data);
        }
    );
}
function searchPro_2(data) {
    if (data == "all") {
        $("#tbodylistProPed").html("");
        return;
    }
    $.ajax({
        type: "get",
        url: "ContApp/Pedido/busProducto_2",
        data: { lab: data },
        success: function (data) {
            ped_producto = data;
            tbodyProdMaque(data);
        },
    });
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
                    <i class="fa fa-fw fa-plus-circle"></i>
                </button>
            </div>
        </td>
        <th class="text-center" scope="row">${p.prov_sigla}-${p.pdo_cod}</th>
        <td class="font-w600 font-size-sm">- N.C.: ${vernull(
            p.pdo_nomComer
        )} <br> - N.G.: ${vernull(p.pdo_nomGen)} <br>Stock: ${
                p.pdo_data.cantidad
            } / Precio: ${tp}Bs.- <span style="color:blue">F.V.: ${vernull(
                p.pdo_data.fechVenc
            )}</span> </td>
    </tr>
    `);
        })
        .join(" ");
    $("#tbodylistProPed").html(html);
}
function funSelectPro(p) {
    if ($("#inp_text_pro_2").val() < 0 || $("#inp_text_pro_2").val() == "") {
        notif(3, "Ingrese Cantidad !");
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
    ped_data.push({
        pro: ped_idPro,
        cant: $("#inp_text_pro_2").val(),
        precio: tp,
        region: ped_TipoPrecio,
    });

    notif(1, "Producto agregado");
    showListProSelec();
}
function showListProSelec() {
    html = ped_data
        .map(function (p, i) {
            switch (ped_TipoPrecio) {
                case "P1":
                    tp = p.pro.pdo_preUniVenta1;
                    tpT = (
                        parseFloat(tp.replace(/,/g, ".")).toFixed(2) *
                        parseFloat(p.cant)
                    ).toFixed(2);
                    break;
                case "P2":
                    tp = p.pro.pdo_preUniVenta2;
                    tpT = (
                        parseFloat(tp.replace(/,/g, ".")).toFixed(2) *
                        parseFloat(p.cant)
                    ).toFixed(2);
                    break;
                case "P3":
                    tp = p.pro.pdo_preUniVenta3;
                    tpT = (
                        parseFloat(tp.replace(/,/g, ".")).toFixed(2) *
                        parseFloat(p.cant)
                    ).toFixed(2);
                    break;

                default:
                    break;
            }

            return (h = `
    <tr>
    <th class="text-center" scope="row">${p.pro.id}</th>
    <td class="font-w600 font-size-sm">${p.pro.pdo_nomGen} - ${p.pro.pdo_nomComer} <br>P.U.:${tp},  cantidad: ${p.cant} =>  P.T.:${tpT}</td>
    <td class="text-center">
        <div class="btn-group">
            <button type="button" class="btn btn-sm btn-dark" data-toggle="tooltip"
                title="Eliminar" onclick="deleteItemPedido(${i})">
                <i class="fa fa-fw fa-arrow-circle-right"></i>
            </button>
        </div>
    </td>
</tr>
    `);
        })
        .join(" ");

    let cos = 0;
    ped_data.map(function (p, i) {
        switch (ped_TipoPrecio) {
            case "P1":
                tp = p.pro.pdo_preUniVenta1;
                tpT = (
                    parseFloat(tp.replace(/,/g, ".")).toFixed(2) *
                    parseFloat(p.cant)
                ).toFixed(2);
                break;
            case "P2":
                tp = p.pro.pdo_preUniVenta2;
                tpT = (
                    parseFloat(tp.replace(/,/g, ".")).toFixed(2) *
                    parseFloat(p.cant)
                ).toFixed(2);
                break;
            case "P3":
                tp = p.pro.pdo_preUniVenta3;
                tpT = (
                    parseFloat(tp.replace(/,/g, ".")).toFixed(2) *
                    parseFloat(p.cant)
                ).toFixed(2);
                break;

            default:
                break;
        }

        cos = parseFloat(cos) + parseFloat(tpT);
        ped_costoTotal = cos;
    });
    $("#secCostoTotal").html(
        "Costo Total: <br> <span style='font-size:25px '>Bs.- " +
            parseFloat(cos).toFixed(2) +
            "</span>"
    );

    $("#tbody_listProsect").html(html);
    $("#modal_busProducto").modal("hide");
    $("#inp_text_pro_2").html("");
    $("#inp_text_pro_1").html("");
}
function deleteItemPedido(i) {
    ped_costoTotal -=
        parseFloat(ped_data[i]["cant"]) - parseFloat(ped_data[i]["precio"]);
    ped_data1 = [];
    ped_data.forEach((element, e) => {
        if (i != e) {
            ped_data1.push(element);
        }
    });
    ped_data = ped_data1;
    showListProSelec();
}

function concluirPedido() {
    funcionInit();
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
            Cliente: ped_idCliente,
            productos: ped_data,
            region: ped_TipoPrecio,
            costoTotal: ped_costoTotal,
            ubi: { lat: lat, lon: lon, link: enlace  },
        },
        success: function (response) {
            console.log(response);
            notif(2, "Pedido registrado");
            viewInicio();
        },
    });
}

// *-------------- Catalogo---------
const viewCatalogo = () => {
    if (ped_TipoPrecio == "") {
        notif(4, "Seleccione Región");
        return;
    }
    $.get("ContApp/Catalogo/", { tipo: 1 }, function (data, textStatus, jqXHR) {
        $("#main-container").html(data);
    });
};
const listCatalogo = () => {
    html = `
    <tr>
        <td colspan="5">
            <div class="row items-push-3x text-center">
                <div class="col-12 col-md-12">
                    <i class="fa fa-2x fa-cog fa-spin"></i>
                </div>
            </div>
        </td>
    </tr>
    `;
    $("#tbodyListCatalogo").html(html);
    $.get(
        "ContApp/Catalogo/list1",
        { data: ped_TipoPrecio },
        function (data, textStatus, jqXHR) {
            html = data
                .map(function (e) {
                    switch (ped_TipoPrecio) {
                        case "P1":
                            precio = e.pdo_preUniVenta1;
                            break;
                        case "P2":
                            precio = e.pdo_preUniVenta2;
                            break;
                        case "P3":
                            precio = e.pdo_preUniVenta3;
                            break;

                        default:
                            break;
                    }
                    return (h = `
                <tr>
                    <td class="text-center">
                        <img class="img-avatar img-avatar48" src="resources/plantilla/assets/media/avatars/logo_1.jpg" alt="">
                    </td>
                    <td class="text-center">
                       ${e.prov_sigla}-${e.pdo_cod}
                    </td>
                    <td class="font-w600 font-size-sm"><span>
                        N.Com: ${vernull(e.pdo_nomComer)}
                        <br>
                        N.Gen: ${vernull(e.pdo_nomGen)}
                        </span> <br>
                        <span class="">stock: ${e.pdo_data.cantidad}</span><br>
                        <span class="badge badge-info" style="color:black;font-size:medium " >Bs.- ${precio}</span>
                        <span class="">F.V.:${e.pdo_data.fechVenc}</span>
                    </td>
                </tr>
                `);
                })
                .join(" ");
            $("#tbodyListCatalogo").html(html);
        }
    );
};

const createCliente = (data) => {
    data += "&lat=" + lat + "&lon=" + lon + "&link=" + enlace;
    funcionInit();
    $.ajax({
        type: "post",
        url: "ContApp/cliente/storeCliente",
        data: data,
        success: function (response) {
            if (response) {
                viewInicio();
                notif(1, "Cliente Registrado");
            } else {
                notif("2", "Error ");
            }
        },
    });
};

const datamapa={

}
