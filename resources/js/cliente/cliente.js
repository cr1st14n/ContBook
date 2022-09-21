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
        showCliente_body();
    });
}

function showCliente_body(param) {
    $("#tbodyList_clientes").html(
        param
            .map(function (p) {
                return (h = `
           ${p} <tr>
                <td class="text-center">${p}</td>
                <td class="text-center">${p}</td>
                <td class="text-center">${p}</td>
                <td class="text-center">${p}</td>
                <td class="text-center">${p}</td>
                <td class="text-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="Remove Client" onClick="123(${p.id})">
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
