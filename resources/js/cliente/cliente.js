function clientes_home() {
    $.get("cliente", function (data, textStatus, jqXHR) {
        $("#main-container").html(data);
        setTimeout(() => {
            queryListCliente();
        }, 800);
    });
}
function queryListCliente() {
    $.get("cliente/list_1", function (data, textStatus, jqXHR) {
        showCliente_body(data);
        console.log(data);
    });
}

function showCliente_body(param) {
    $("#tbodyList_clientes").html(
        param
            .map(function (p) {
                return (h = `
            <tr id="tr_clie_${p.id}">
                <td class="text-center">${p.id}</td>
                <td class="text-center">${p.cli_ci}</td>
                <td class="text-center">${p.cli_nombre}</td>
                <td class="text-center">${p.cli_razonSocial}</td>
                <td class="text-center">${p.cli_razonSocialNit}</td>
                <td class="text-center">${p.cli_telf}</td>
                <td class="text-center">${p.cli_mail}</td>
                <td class="text-center">${p.cli_direccion}</td>
                <td class="text-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="Remove Client" onClick="clie_edit(${p.id})">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="Remove Client" onClick="(clie_delete${p.id})">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </td>
            </tr>
            `);
            })
            .join(" ")
    );
}
$('#btn_create_cliente').click(function (e) { 
    e.preventDefault();
    $('#md_create_cliente').modal('show');
    $('#form_new_cliente1').trigger('reset');
 });
 $('#form_new_cliente1').submit(function (e) { 
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "cliente/query_create",
        data: $(this).serialize(),
        success: function (response) {
            console.log(response);
            if (response=='error_1') {
                console.log('error_ci');
            }            
            if (response=='error_2') {
                console.log('error_nit');
            }            
            if (response=='error_3') {
                console.log('error_RZ');
            }            
            if (response=='error_4') {
                console.log('error_mail');
            }                      
        }
    });
 });
