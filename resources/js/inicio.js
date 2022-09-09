function notif(tipo, texto) {
    switch (tipo) {
        case 1:
            $.notific8(texto, {
                life: 3000,
                heading: "Correcto",
                icon: "info-circled",
                theme: "amethyst",
                family: "atomic",
                // sticky: true,
                horizontalEdge: "top",
                // horizontalEdge: 'bottom',
                verticalEdge: "rigth",
                zindex: 1500,
                // closeText: 'près',
            });
            break;

        case 2:
            $.notific8(texto, {
                life: 3000,
                heading: "Correcto",
                icon: "info-circled",
                theme: "amethyst",
                family: "atomic",
                // sticky: true,
                horizontalEdge: "top",
                // horizontalEdge: 'bottom',
                verticalEdge: "rigth",
                zindex: 1500,
                // closeText: 'près',
            });
            break;

        case 3:
            $.notific8(texto, {
                life: 3000,
                heading: "Correcto",
                icon: "info-circled",
                theme: "amethyst",
                family: "atomic",
                // sticky: true,
                horizontalEdge: "top",
                // horizontalEdge: 'bottom',
                verticalEdge: "rigth",
                zindex: 1500,
                // closeText: 'près',
            });
            break;

        case 4:
            $.notific8(texto, {
                life: 3000,
                heading: "Correcto",
                icon: "info-circled",
                theme: "amethyst",
                family: "atomic",
                // sticky: true,
                horizontalEdge: "top",
                // horizontalEdge: 'bottom',
                verticalEdge: "rigth",
                zindex: 1500,
                // closeText: 'près',
            });
            break;

        default:
            $.notific8("Registro actualizado .", {
                life: 3000,
                heading: "Correcto",
                icon: "info-circled",
                theme: "amethyst",
                family: "atomic",
                // sticky: true,
                horizontalEdge: "top",
                // horizontalEdge: 'bottom',
                verticalEdge: "rigth",
                zindex: 1500,
                // closeText: 'près',
                onInit: function (data) {
                    console.log("--onInit--Inicial");
                    console.log("data:");
                    console.log(data);
                },
                onCreate: function (notification, data) {
                    console.log("--onCreate-- Creado");
                    console.log("notification:");
                    console.log(notification);
                    console.log("data:");
                    console.log(data);
                },
                onClose: function (notification, data) {
                    console.log("--onClose-- Cerrado");
                    console.log("notification:");
                    console.log(notification);
                    console.log("data:");
                    console.log(data);
                },
            });
            break;
    }
}

$("#btn_menu_users").click(function (e) {
    e.preventDefault();
    console.log("printjj");
    $("#main-container").html("");
});

$("#btn_home_invetario").click(function (e) {
    e.preventDefault();
    $.ajax({
        type: "get",
        url: "inventario/",
        data: {},
        // dataType: "dataType",
        success: function (response) {
            $("#main-container").html(response);
            html1 = `
            <a class="nav-main-link active" href="#" onclick='producto_home()'>
                <i class="nav-main-link-icon si si-users"></i>
                <span class="nav-main-link-name">Productos</span>
            </a>
            <a class="nav-main-link active" href="#" id="btn_menu_inv_inve">
                <i class="nav-main-link-icon si si-users"></i>
                <span class="nav-main-link-name">Inventario</span>
            </a>
            <a class="nav-main-link active" href="#" id="btn_menu_inv_Pedi">
                <i class="nav-main-link-icon si si-users"></i>
                <span class="nav-main-link-name">Pedidos</span>
            </a>
            <a class="nav-main-link active" href="#" id="btn_menu_inv_Pedi">
                <i class="nav-main-link-icon si si-users"></i>
                <span class="nav-main-link-name">Provedores</span>
            </a>
            `;
            $("#menu_1").html(html1);
        },
    });
});

