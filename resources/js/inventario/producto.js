url = "inventario/producto/list_1";
data = { lista: "a" };

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
    $.ajax({
        type: "get",
        url: url,
        data: data,
        success: function (response) {
            body_html = response
                .map(function (param) {
                    tm = '<i class="fa fa-check"></i>';
                    if (param.ca_estado == "0") {
                        tm = '<i class="fa fa-ban"></i>';
                    }
                    return (h = `
                    <tr>
                        <td class="text-center">${param.id}</td>
                        <td class="font-w600 font-size-sm">${param.pdo_cod}</td>
                        <td>${param.pdo_cod2}</td>
                        <td>${param.pdo_nomGen}</td>
                        <td>${param.pdo_concentracion}</td>
                        <td>${param.pdo_uMedica}</td>
                        <td>${param.pdo_formFarm}</td>
                        <td class="font-size-sm">${param.pdo_cant}</td>
                        <td>${tm}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary "  title="Edit">
                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-primary " onClick="fun_proEstado(${param.id})" title="Inhabilitar">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    `);
                })
                .join(" ");
            $("#tbody_producto").html(body_html);
        },
    });
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

// *---------- KARDEX ---------
function kardex_home(param) {
    $.get("inventario/kardex/home", function (data, textStatus, jqXHR) {
        // console.log(data);
        $("#main-container").html(data);
    });
}
$("#btn_pro_add_1").click(function (e) {
    e.preventDefault();
    $("#form_new_producto").trigger("reset");
    $("#md_pro_add_1").modal("show");
});

function showModalMovPro(param) {
    $.get(
        "inventario/producto/query_list_proActivo",
        {},
        function (data, textStatus, jqXHR) {
            console.log(data);
            sel = data
                .map(function (p) {
                    return (h = `
                <option value="${p.id}">${p.pdo_nomGen}</option>
                `);
                })
                .join(" ");
            if (param == "1") {
                $("#ent_pro").html(sel);
                $("#md_pro_entrada").modal("show");
                $("#frm_pro_entrada").trigger("reset");
            }
            if (param == "2") {
                $("#sal_pro").html(sel);
                $("#md_pro_salida").modal("show");
                $("#frm_pro_salida").trigger("reset");
            }
        }
    );
}
$("#frm_pro_entrada").submit(function (e) {
    e.preventDefault();
    $.post(
        "inventario/kardex/mov_1/" + "E",
        $(this).serialize(),
        function (data, textStatus, jqXHR) {
            console.log(data);
        }
    );
});
$("#frm_pro_salida").submit(function (e) {
    e.preventDefault();
    $.post(
        "inventario/kardex/mov_1/" + "S",
        $(this).serialize(),
        function (data, textStatus, jqXHR) {
            console.log(data);
        }
    );
});
