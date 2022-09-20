function caducidad_home() {
    $.ajax({
        type: "get",
        url: "inventario/",
        data: {},
        // dataType: "dataType",
        success: function (response) {
            $("#main-container").html(response);
            setTimeout(() => {
                show_list_tbody_caducidad();
            }, 500);
        },
    });
}

function show_list_tbody_caducidad() {
    $.get(
        "inventario/caducidad/query_list_1",
        data,
        function (data, textStatus, jqXHR) {
            if (data[0][0] < 1) {
                console.log('vencido');
            } else {
                console.log('no vencido');
            }
            console.log(data[0][0]);
            html = data
                .map(function (p) {
                    return (h = `
            
            `);
                })
                .join(" ");
        }
    );
}
