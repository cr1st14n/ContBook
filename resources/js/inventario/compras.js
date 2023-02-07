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
function searchPro() {
    val2 = $('#inp_codPro_1').val();
    val = val2.split("-");
    l_1 = val[0];
    l_2 = val[1];
    if (l_2 >= 1 && l_2.length <= 4) {
        console.log("+++  Es un número");
        $.ajax({
            type: "get",
            url: "inventario/producto/query_buscarListPro_22",
            data: { prov: l_1, id: l_2 },
            dataType: "json",
            success: function (response) {
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
    } else {
        notif(4, 'Error!. Ingrese Codigo con Formato "CODLAB-##"')
        console.log("---  no es  número");
    }
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
            total = total + parseFloat((e.cost * e.cant).toFixed(2));
            console.log(parseFloat(e.cost));
            return (h = `
            <tr>
                <td>${e.cod}</td>
                <td>${e.data.com} <br> ${e.data.gen}</td>
                <td>${e.feve}</td>
                <td>U. ${e.cant}</td>
                <td>Bs.- ${e.cost}</td>
                <td>Bs.- ${(e.cost * e.cant).toFixed(2)}</td>
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
                notif(2, "Compra Registrada");
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
    $("#sp_rep").val("");
    $("#datoProducto_1").html(`Producto:<br>-`);
    compra = [];
    item = Array;
    $("#tbody_1").html("");
    $("#costo_total").html("Bs.-");
}

// * ------- REGISTRO DE COMPRAS
let dataCompras;
let view_RegisCompra = () => {
    fetch("inventario/compras/home_listCompras")
        .then((response) => response.text())
        .catch((error) => console.error(error))
        .then((data) => $("#main-container").html(data));
};
// *--||| funciones manejo de tabla -----------
let showCompra_1 = () => {
    fetch("inventario/compras/showListCompra_1/")
        .then((response) => response.json())
        .catch((error) => notif(4, "ERROR !"))
        .then((data) => printTablaCompra_1(data));
};

let printTablaCompra_1 = (data) => {
    dataCompras = data;
    html = data
        .map((p, i) => {
            return printFilaCompra_1(p, i);
        })
        .join(" ");
    $("#tbodyTableCompras").html(html);
};

let printFilaCompra_1 = (p, i) => {
    console.log(p);
    return (fila = `
    <tr id="fiCo_${p.id}">
        <td>${p.id}</td>
        <td>${p.created_at2}</td>
        <td></td>
        <td>${p.user.usu_nombre} <br>${p.user.usu_cod}</td>
        <td>${compraDetalle(p.compra_data)}</td>
    </tr>
    `);
};

let compraDetalle = (data) => {
    let costo = 0;
    let item = 0;
    html = data
        .map((e, i) => {
            costo += parseFloat(e.cost);
            item += 1;
            return (h = `
            - ${e.cant}u. | Cod:${e.cod} | Costo:${e.cost}   <br>
            `);
        })
        .join(" ");
    return html2 = ` <p style="font-size: 11px">
                ${html}
            </p>
            Total Bs: ${costo} | Items: ${item} 
            `;
};
// *--||| funciones manejo de tabla------------------
