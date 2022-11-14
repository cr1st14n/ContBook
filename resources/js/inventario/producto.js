url = "inventario/producto/list_1";
data = { lista: "a" };
data_producto = [];
function producto_home(param) {
    $.get("inventario/producto/home", function (data, textStatus, jqXHR) {
        $("#main-container").html(data);
        showList_producto();
    });
}
function lista_est(param) {
    data = { lista: param };
    showList_producto();
}
function showList_producto() {
    console.log("imprimiendo la lista");
    $.ajax({
        type: "get",
        url: url,
        data: data,
        success: function (response) {
            maq_tbody(response);
        },
    });
}
function maq_tbody(data) {
    data_producto = data;
    body_html = data
        .map(function (param, i) {
            tm = '<i class="fa fa-check"></i>';
            if (param.ca_estado == "0") {
                tm = '<i class="fa fa-ban"></i>';
            }
            return (h = `
            <tr id="tr-${i}">
                <td class="font-w600 font-size-sm">${param.prov_sigla}-${
                param.pdo_cod
            }</td>
                <td>${verNull(param.pdo_nomComer)}</td>
                <td>${verNull(param.pdo_nomGen)}</td>
                <td>${verNull(param.pdo_concentracion)}</td>
                <td>${verNull(param.pdo_uMedida)}</td>
                <td>${verNull(param.pdo_formFarm)}</td>
                <td class="font-size-sm">${param.pdo_data["cantidad"]}</td>
                <td>${tm}</td>
                <td class="text-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-primary " onClick="fun_edit(${i})"  title="Edit">
                            <i class="fa fa-fw fa-pencil-alt"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-danger " onClick="fun_proEstado(${
                            param.id
                        })" title="Inhabilitar">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </td>
            </tr>
            `);
        })
        .join(" ");
    $("#tbody_producto").html(body_html);
}
$("#form_new_producto").submit(function (e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "inventario/producto/store_1",
        data: $(this).serialize(),
        success: function (response) {
            console.log(response);
            if (response == "1") {
                $("#md_pro_add_1").modal("hide");
                $("#form_new_producto").trigger("reset");
                showList_producto();
            }
            if (response == "err_cod1") {
                console.log("error codigo 1");
            }
            if (response == "err_cod2") {
                console.log("error codigo 2");
            }
        },
    });
});
function fun_proEstado(id) {
    $.ajax({
        type: "post",
        url: "inventario/producto/change_est",
        data: { _token: $('meta[name="csrf-token"]').attr("content"), id: id },
        success: function (response) {
            if (response) {
                showList_producto();
                return;
            }
            console.log("error !");
        },
    });
}
itemEdit = ""; //*--- variable cache
item_indice = "";
function fun_edit(id) {
    item_indice = id;
    item_edit = data_producto[id];
    console.log(item_indice);
    console.log(item_edit);
    $("#pdo_nomComer_edit").val(item_edit["pdo_nomComer"]);
    $("#pdo_nomGen_edit").val(item_edit["pdo_nomGen"]);
    $("#pdo_concentracion_edit").val(item_edit["pdo_concentracion"]);
    $("#pdo_uMedida_edit").val(item_edit["pdo_uMedida"]);
    $("#pdo_formFarm_edit").val(item_edit["pdo_formFarm"]);
    $("#pdo_cod2_edit").val(item_edit["pdo_cod2"]);
    $("#pdo_preUniVenta1_edit").val(item_edit["pdo_preUniVenta1"]);
    $("#pdo_preUniVenta2_edit").val(item_edit["pdo_preUniVenta2"]);
    $("#pdo_preUniVenta3_edit").val(item_edit["pdo_preUniVenta3"]);
    $("#md_pro_edit_1").modal("show");
}
function fun_update() {
    data = $("#form_edit_producto").serialize() + "&" + "id=" + item_edit["id"];
    console.log(data["id"]);
    $.ajax({
        type: "post",
        url: "inventario/producto/update_1",
        data: data,
        success: function (r) {
            console.log(r);
            if (r == 0) {
                notif(3, "ERROR! no se puedo actualzar");
                return;
            }
            data_producto[item_indice] = r;
            tm = '<i class="fa fa-check"></i>';
            if (r.ca_estado == "0") {
                tm = '<i class="fa fa-ban"></i>';
            }
            up_fila = `

                        <td class="font-w600 font-size-sm">${r.labSigla}-${
                r.pdo_cod
            }</td>
                        <td>${verNull(r.pdo_nomComer)}</td>
                        <td>${verNull(r.pdo_nomGen)}</td>
                        <td>${verNull(r.pdo_concentracion)}</td>
                        <td>${verNull(r.pdo_uMedida)}</td>
                        <td>${verNull(r.pdo_formFarm)}</td>
                        <td class="font-size-sm">${r.pdo_data["cantidad"]}</td>
                        <td>${tm}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary " onClick="fun_edit(${item_indice})"  title="Edit">
                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger " onClick="fun_proEstado(${
                                    r.id
                                })" title="Inhabilitar">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </td>
            `;
            $("#tr-" + item_indice).html(up_fila);
            $("#form_edit_producto").trigger("reset");
            $("#md_pro_edit_1").modal("hide");
        },
    });
}

$("#btn_pro_add_1").click(function (e) {
    e.preventDefault();
    $("#form_new_producto").trigger("reset");
    $("#md_pro_add_1").modal("show");
});

function searchPro_1(val) {
    val = val.split("-");
    l_1 = val[0];
    l_2 = val[1];
    if (l_2 >= 1 && l_2.length <= 4) {
        console.log("+++  Es un número");
        $.ajax({
            type: "get",
            url: "inventario/producto/query_buscarListPro_2",
            data: { prov: l_1, id: l_2 },
            dataType: "json",
            success: function (r) {
                console.log(r);
                maq_tbody(r);
            },
        });
    } else {
        console.log("---  no es  número");
    }
}
function searchPro_2(val) {
    $.ajax({
        type: "get",
        url: "inventario/producto/query_buscarListPro_3",
        data: { val: val },
        dataType: "json",
        success: function (r) {
            maq_tbody(r);
        },
    });
}
