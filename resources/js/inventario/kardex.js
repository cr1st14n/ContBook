// *---------- KARDEX ---------
function kardex_home(param) {
    $.get("inventario/kardex/home", function (data, textStatus, jqXHR) {
        // console.log(data);
        $("#main-container").html(data);
        queryList();
    });
    modoApp();
}
function queryList() {
    $.get("inventario/kardex/query_list_1", function (data, textStatus, jqXHR) {
        const_tbody(data);
    });
} q
function searchIdProKard(val) {
    val = val.split("-");
    l_1 = val[0];
    l_2 = val[1];
    if (l_2 >= 1 && l_2.length <= 4) {
        console.log("+++  Es un número");
        $.ajax({
            type: "get",
            url: "inventario/kardex/query_list_3",
            data: { prov: l_1, id: l_2 },
            dataType: "json",
            success: function (r) {
                console.log(r);
                const_tbody(r);
            },
        });
    } else {
        console.log("---  no es  número");
    }
}
$("#bus_pro").change(function (e) {
    e.preventDefault();
    console.log($(this).val());
    if ($(this).val() == "all") {
        queryList();
        return;
    }
    $.get(
        "inventario/kardex/query_list_2",
        { id: $(this).val() },
        function (data, textStatus, jqXHR) {
            const_tbody(data);
        }
    );
});

function const_tbody(data) {
    console.log(data);
    html = data
        .map(function (param) {
            flecha =
                ' <span class="font-w600 text-success"> <i class="far fa-arrow-alt-circle-down"></span>';
            if (param.kd_ent == "-") {
                flecha =
                    ' <span class="font-w600 text-warning"><i class="far fa-arrow-alt-circle-up"></span>';
            }
            return (h = `
        <tr>
            <td class="text-center">${param.id}</td>
            <td class="text-center">${param.prov_sigla}-${param.pdo_cod}</td>
            <td class="text-center"> ${verNull(param.pdo_nomComer)} | ${verNull(
                param.pdo_nomGen
            )}</td>
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
            console.log("data.producto");
            sel = data.producto
                .map(function (p) {
                    return (h = `
                <option value="${p.id}">${verNull(p.pdo_nomComer)} | ${verNull(
                        p.pdo_nomGen
                    )} | ${p.prov_sigla}-${p.pdo_cod}</option>
                `);
                })
                .join(" ");
            // provedor = data.provedor
            //     .map(function (p) {
            //         return (h = `
            //     <option value="${p.id}">${verNull(p.prov_contacto)}/${verNull(p.prov_nombre)}</option>
            //     `);
            //     })
            //     .join(" ");
            if (param == "1") {
                $("#ent_pro").html(sel);
                // $("#ent_provedor").html(provedor);
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
                notif(3, "Aviso! Item no apto para carga inicial!.");
                return;
            }
            if (data == "success") {
                $("#md_pro_entrada").modal("hide");
                queryList();
            }
            if (data == "Error_iniciarStock") {
                notif(
                    3,
                    "Aviso! El item requiere inserción por inv. inicial!."
                );
                return;
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
