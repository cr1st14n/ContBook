id_Pedido_select = "";
$(document).ready(function () {
    list_pp1();
});

function list_pp1() {
    $.ajax({
        type: "get",
        url: "Pedido/list_1",
        data: { data: "tipo_1" },
        success: function (response) {
            console.log(response);
            maq_tbody_pedidos(response)
        },
    });
}

function maq_tbody_pedidos(data) {
    html = data
        .map(function (e) {
            h1=e.pdd_productos.map(function (param) {
                return h=`
                    <p>${param.cant}
                    </p>
                `;
             }).join(' ')
            return (h = `
            <tr>
                <td class="text-center">${e.id}</td>
                <td class="text-center">${e.ca_usu_cod}</td>
                <td class="text-center">${e.id_cliente} <br> ${e.pdd_region} </td>
                <td class="text-center">${h1}</td>
                <td class="text-center">${e.pdd_costo}</td>
                <td class="text-center">${e.created_at}</td>
                <td class="text-center"> <a href='${e.ca_ubi.link}' target="_blank"><i class=' fa fa-map-marked'></i> Hubicación</a></td>
                <td class="text-center"></td>

            </tr>
        `);
        })
        .join(" ");
        $('#tbodyList_pedidos').html(html);
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
