data = Array; //*datos de sb
let compra = []; //* tota lista de carrito
let item = Array; //*almacena item seleccionado
function compras_home() {
    $.ajax({
        type: "get",
        url: "inventario/compras/home",
        data: "data",
        success: function (data) {
            $("#main-container").html(data);
        },
    });
}
function listProv(value) {
    console.log(value);
    $.ajax({
        type: "get",
        url: "inventario/producto/query_buscarListPro",
        data: { data: value },
        dataType: "json",
        success: function (response) {
            console.log(response);

            data = response;
            html = response
                .map(function (pro, i) {
                    return (a = `
                    <tr onClick="proSelect(${i})">
                        <td style="font-size: 12px;">${pro.prov_sigla}- ${pro.pdo_cod}</td>
                        <td style="font-size: 12px;">${pro.pdo_nomComer} <br> ${pro.pdo_nomGen}</td>
                    </tr>
                `);
                })
                .join(" ");
            $("#listCompra_1").html(html);
        },
    });
}
function proSelect(i) {
    console.log(data[i]);
    item = data[i];
    $("#sp_cant").val("");
    $("#sp_cost").val("");
    $("#sp_lot").val("");
    $("#sp_fev").val("");
    $("#datoProducto_1").html(`
    Producto:<br>- ${data[i]["pdo_nomComer"]} <br> - ${data[i]["pdo_nomGen"]} <br>Cod: <br> ${data[i]["prov_sigla"]}-${data[i]["pdo_cod"]}
    `);
    $("#sp_cant").focus();
}

function add_pro() {
    if (item["id"] == null) {
        notif(3, "Seleccione producto");
        return;
    }
    $("#sel_pro").focus();
    a = {
        id: item["id"],
        cod: item["prov_sigla"] + "-" + item["pdo_cod"],
        cant: $("#sp_cant").val(),
        cost: $("#sp_cost").val(),
        lote: $("#sp_lot").val(),
        feve: $("#sp_fev").val(),
        data: { gen: item["pdo_nomGen"], com: item["pdo_nomComer"] },
    };
    compra.push(a);
    console.log(compra);
    console.log("compra");
    listitem_1();
}
function listitem_1() {
    let total = 0;
    html = compra
        .map(function (e) {
            total = total + parseFloat(e.cost);
            console.log(parseFloat(e.cost));
            return (h = `
            <tr>
                <td>${e.cod}</td>
                <td>${e.data.com} <br> ${e.data.gen}</td>
                <td>${e.feve}</td>
                <td>U. ${e.cant}</td>
                <td>Bs.- ${e.cost}</td>
            </tr>
        `);
        })
        .join(" ");
    $("#costo_total").html("Bs.-" + total.toFixed(2));
    $("#tbody_1").html(html);
}

function finCompra(tipo) {
    if (tipo == 1) {
        $("#md_confirmar").modal("show");
        return;
    }

    $.ajax({
        type: "post",
        url: "inventario/compras/store_1",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            data: compra,
            docr: $("#sp_rep").val(),
        },
        // dataType: "int",
        success: function (response) {
            console.log(response);
            if (response == "success") {
                notif(1, "Compra Registrada");
                resetVenta();
                $("#md_confirmar").modal("hide");
            } else {
                notif(4, "Error! Comprobar datos");
            }
        },
    });
}
function resetVenta() {
    console.log("resetear venta");
    $("#sp_cant").val("");
    $("#sp_cost").val("");
    $("#sp_lot").val("");
    $("#sp_fev").val("");
    $("#sp_rep").val('')
    $("#datoProducto_1").html(`Producto:<br>-`);
    compra = [];
    item = Array;
    $("#tbody_1").html('');
    $("#costo_total").html("Bs.-");
}
