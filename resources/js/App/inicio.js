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

    ped_data.push({ id: ped_idPro, cant: $("#inp_text_pro_2").val() });

    console.log(ped_data);
    html=ped_data.map(function (p) { 
        return h=`
        <tr>
        <th class="text-center" scope="row">${p.id.id}</th>
        <td class="font-w600 font-size-sm">${p.id.pdo_nomGen} - ${p.id.pdo_nomComer} <br> cantidad: ${p.cant}</td>
        <td class="text-center">
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip"
                    title="Edit Client" >
                    <i class="fa fa-fw fa-arrow-circle-right"></i>
                </button>
            </div>
        </td>
    </tr>
        `;
     }).join(' ');
     $('#tbody_listProsect').html(html);
    $("#modal_busCliente").modal("hide");
    $("#inp_text_pro_2").html("");
    $("#inp_text_pro_1").html("");
}
