// *---------- KARDEX ---------
function kardex_home(param) {
    $.get("inventario/kardex/home", function (data, textStatus, jqXHR) {
        // console.log(data);
        $("#main-container").html(data);
        queryList();
    });
}
function queryList() {
    $.get("inventario/kardex/query_list_1", function (data, textStatus, jqXHR) {
        const_tbody(data);
    });
}
$('#bus_pro').change(function (e) { 
    e.preventDefault();
    console.log($(this).val());
    if ($(this).val()=='all') {
        queryList()
        return
    }
    $.get("inventario/kardex/query_list_2",{id:$(this).val()}, function (data, textStatus, jqXHR) {
        const_tbody(data);
    });
});

function const_tbody(data) {
    html = data
        .map(function (param) {
            flecha = ' <span class="font-w600 text-success"> <i class="far fa-arrow-alt-circle-down"></span>';
            if (param.kd_ent=='-') {
                flecha = ' <span class="font-w600 text-warning"><i class="far fa-arrow-alt-circle-up"></span>';
            }
            return (h = `
        <tr>
            <td class="text-center">${param.id}</td>
            <td class="text-center">${param.pdo_nomGen}</td>
            <td class="text-center">${param.kd_detalle}</td>
            <td class="text-center">${param.kd_respaldo}</td>
            <td class="text-center">${param.kd_ent}</td>
            <td class="text-center">${param.kd_sal}</td>
            <td class="text-center">${param.kd_sdo_fis}</td>
            <td class="text-center">${param.kd_costo} ${flecha}</td>
            <td class="text-center">${param.kd_deb}</td>
            <td class="text-center">${param.kd_hab}</td>
            <td class="text-center">${param.kd_sdo_val}</td>
        </tr>
        `);
        })
        .join(" ");
    $("#tbody_kardex").html(html);
}
function showModalMovPro(param) {
    $.get(
        "inventario/producto/query_list_proActivo",
        {},
        function (data, textStatus, jqXHR) {
            console.log(data.producto);
            sel = data.producto
                .map(function (p) {
                    return (h = `
                <option value="${p.id}">${p.pdo_nomGen}</option>
                `);
                })
                .join(" ");
            provedor = data.provedor
                .map(function (p) {
                    return (h = `
                <option value="${p.id}">${p.prov_contacto}/${p.prov_nombre}</option>
                `);
                })
                .join(" ");
            if (param == "1") {
                $("#ent_pro").html(sel);
                $("#ent_provedor").html(provedor);
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
        "inventario/kardex/mov_E",
        $(this).serialize(),
        function (data, textStatus, jqXHR) {
            console.log(data);
            if (data == "erro_noInicial") {
                console.log("no para carga inicial");
                return;
            }
            if (data == "success") {
                $("#md_pro_entrada").modal("hide");
                queryList();
            }
        }
    );
});
$("#frm_pro_salida").submit(function (e) {
    e.preventDefault();

    $.ajax({
        type: "post",
        url: "inventario/kardex/mov_S",
        data: $(this).serialize(),
        success: function (response) {
            console.log(response);
            if (response == "success") {
                $("#md_pro_salida").modal("hide");
                queryList();
            }
        },
    });
});
