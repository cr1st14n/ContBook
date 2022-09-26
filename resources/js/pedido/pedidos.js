id_Pedido_select = "";

function pedido_registro() {
    $.get("Pedido", function (data, textStatus, jqXHR) {
        $("#main-container").html(data);
        setTimeout(() => {
            list_1();
        }, 800);
    });
    modoApp()
}
function pedido_new() {
    $.get("Pedido/create_1", function (data, textStatus, jqXHR) {
        $("#main-container").html(data);
        setTimeout(() => {
            list_1();
        }, 800);
    });
    modoApp()
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
