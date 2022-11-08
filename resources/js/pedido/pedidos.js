id_Pedido_select = "";
data_pedidos_1 = Array;
$(document).ready(function () {
    list_pp1();
});
function listPedSelc(tipo, dato) {
    if (dato == 0) {
        list_pp1();
        return;
    }
    $data = {};
    switch (tipo) {
        case 1:
            $data = { data: "tipo_2", id: dato };
            break;
        case 2:
            $data = { data: "tipo_3", id: dato };
            break;

        default:
            break;
    }
    $.ajax({
        type: "get",
        url: "Pedido/list_1",
        data: $data,
        success: function (response) {
            maq_tbody_pedidos(response);
        },
    });
}
function list_pp1() {
    $.ajax({
        type: "get",
        url: "Pedido/list_1",
        data: { data: "tipo_1" },
        success: function (response) {
            maq_tbody_pedidos(response);
        },
    });
}

function maq_tbody_pedidos(data) {
    const contItem = 0;
    data_pedidos_1 = data;
    console.log("datasd");
    html = data
        .map(function (e, i) {
            var f = new Date(e.created_at);
            f1 = f.toLocaleDateString();
            f2 = f.toLocaleTimeString();
            switch (e.pdd_region) {
                case "P1":
                    region = "region 1";
                    break;
                case "P2":
                    region = "region 2";
                    break;
                case "P3":
                    region = "region 3";
                    break;

                default:
                    break;
            }
            h1 = e.pdd_productos
                .map(function (param) {
                    return (h = `
                    <p>${param.cant}
                    </p>
                `);
                })
                .join(" ");
            return (h = `
            <tr onClick="pedidoVenta_1(${i})">
                <td class="text-center">Ped-${e.id}</td>
                <td class="text-center">${e.usu_nombre}</td>
                <td class="text-center" style="font-size: 12px"><strong>
                ${e.cli_nombre} - CI: ${e.cli_ci} <br>
                ${e.cli_razonSocial} NIT.:${e.cli_razonSocialNit}
                </strong>  <br>- ${region} </td>
                <td class="text-center"><a href='#' onClick='showListProPed("${i}")'>${
                e.pdd_productos.length
            } Items.</a>  <br> <strong>Bs.- ${parseFloat(e.pdd_costo).toFixed(
                2
            )}</strong>  </td>
                <td class="text-center"> ${f1} ${f2}</td>
                <td class="text-center"></td>

            </tr>
        `);
        })
        .join(" ");
    $("#tbodyList_pedidos").html(html);
}
function show_hubi(lat, lon) {
    // iniciar_mapa();
    latlng = { lat: lat, lng: lon };
    var map = L.map("map").setView(
        [-16.502026040289255, -68.13101576997244],
        18
    );

    L.tileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution:
            'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
        maxZoom: 50,
    }).addTo(map);

    L.control.scale().addTo(map);
    L.marker([-16.502026040289255, -68.13101576997244], {
        draggable: true,
    }).addTo(map);

    $("#md_ubi").modal("show");
}
function showListProPed(data) {
    console.log(data_pedidos_1[data]["pdd_productos"]);
    html = data_pedidos_1[data]["pdd_productos"]
        .map(function (p) {
            return (h = `
        <tr>
            <td class="text-center">${p.pro.pdo_nomGen} ${
                p.pro.pdo_nomComer
            }</td>
            <td class="text-center">${p.cant}</td>
            <td>Bs.- ${p.precio}</td>
            <td>Bs.- ${parseFloat(
                parseFloat(p.cant) * parseFloat(p.precio.replace(/,/g, "."))
            ).toFixed(2)}</td>
        </tr>
        `);
        })
        .join(" ");
    $("#mq_listPro_pedido").html(html);
    $("#md_listPedido_producto").modal("show");
}

function pedido_registro() {
    $.get("Pedido", function (data, textStatus, jqXHR) {
        $("#main-container").html(data);
        setTimeout(() => {
            list_1();
        }, 800);
    });
    modoApp();
}
function pedido_new() {
    $.get("Pedido/create_1", function (data, textStatus, jqXHR) {
        $("#main-container").html(data);
        setTimeout(() => {
            list_1();
        }, 800);
    });
    modoApp();
}
$("select[name=sele_cliente]").change(function (e) {
    e.preventDefault();
    $.get(
        "cliente/query_edit",
        { id: $(this).val() },
        function (data, textStatus, jqXHR) {
            console.log(data);
            phtml = `
                Datos del CLiente: <br>
                CI:  <strong>${data.cli_ci}</strong>, Nombre: <strong>${data.cli_nombre}></strong><br>
                NIT: <strong>${data.cli_razonSocialNit}</strong>, Razon Social: <strong>${data.cli_razonSocial}</strong><br>
                Direccion: <strong>${data.cli_direccion}</strong>
            `;
            $("#p_detalle_cliente").html(phtml);
        }
    );
});
$("#inp_buscar_pro").keyup(function (e) {
    if ($(this).val() != "") {
        console.log($(this).val());
        $.get(
            "inventario/producto/query_buscarPro",
            { data: $(this).val() },
            function (data, textStatus, jqXHR) {
                ht = data
                    .map(function (p) {
                        return (h = `
                <tr>
                    <td>${p.pdo_cod} ${p.pdo_nomGen} ${p.pdo_desc}</td>
                    <td></td>
                    <td>
                    <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary "  title="Edit">
                                    <i class="fa fa-plus-circle"></i>
                                </button>
                            </div>
                        </td>
                    </td>
                </tr>
                `);
                    })
                    .join(" ");
                $("#listProVenta_tbody").html(ht);
            }
        );
    }
});
function detalle_clie(param) {}
function list_1(param) {}

// * PEdido a venta
function pedidoVenta_1(i) {
    $.ajax({
        type: "get",
        url: "inventario/producto/query_verf_cant_1",
        data: { data: data_pedidos_1[i]["pdd_productos"] },
        // dataType: "json",
        success: function (response) {
            html = response
                .map(function (p, i) {
                    console.log(response[i][0]["enStock"]);
                    stock = response[i][0]["enStock"];
                    return (h = `
                <tr>
                    <td class="text-left"style="font-size: 14px"><p>NC.: ${verNull(
                        p.pro.pdo_nomComer
                    )}<br>NG.: ${verNull(p.pro.pdo_nomGen)}</p></td>
                    <td class="text-center">${stock}</td>
                    <td class="text-center"><input type="number" onkeyup='calCant(this.value,${stock})' min="0" max="${stock}" class=' form-control form-control-sm' value='${
                        p.cant
                    }'></td>
                    <td>Bs.- ${p.precio}</td>
                    <td>Bs.- ${parseFloat(
                        parseFloat(p.cant) *
                            parseFloat(p.precio.replace(/,/g, "."))
                    ).toFixed(2)}</td>
                    <td></td>
                </tr>
                `);
                })
                .join(" ");
            $("#tbody_PedComp_1").html(html);
        },
    });
    console.log(data_pedidos_1[i]);
}
function calCant(v,s) {
    console.log(v,s);
 }
