function modoApp() {
    let navegador = navigator.userAgent;
    if (
        navigator.userAgent.match(/Android/i) ||
        navigator.userAgent.match(/webOS/i) ||
        navigator.userAgent.match(/iPhone/i) ||
        navigator.userAgent.match(/iPad/i) ||
        navigator.userAgent.match(/iPod/i) ||
        navigator.userAgent.match(/BlackBerry/i) ||
        navigator.userAgent.match(/Windows Phone/i)
    ) {
        // console.log("Estás usando un dispositivo móvil!!");
        One.layout("sidebar_toggle");
    } else {
        // console.log("No estás usando un móvil");
    }
}

function notif(tipo, texto) {
    switch (tipo) {
        case 1:
            One.helpers("notify", {
                type: "info",
                icon: "fa fa-info-circle mr-1",
                texto,
            });
            break;

        case 2:
            One.helpers("notify", {
                type: "success",
                icon: "fa fa-check mr-1",
                message: texto,
            });
            break;

        case 3:
            One.helpers("notify", {
                type: "warning",
                icon: "fa fa-exclamation mr-1",
                message: texto,
            });
            break;

        case 4:
            One.helpers("notify", {
                type: "danger",
                icon: "fa fa-times mr-1",
                message: texto,
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

function zeroPad(num, numZeros) {
    var n = Math.abs(num);
    var zeros = Math.max(0, numZeros - Math.floor(n).toString().length);
    var zeroString = Math.pow(10, zeros).toString().substr(1);
    if (num < 0) {
        zeroString = "-" + zeroString;
    }

    return zeroString + n;
}

function verNull(param) {
    if (param == null) {
        param = "***";
    }
    return param
}
$("#btn_menu_users").click(function (e) {
    e.preventDefault();
    console.log("printjj");
    $.get("adm", function (data, textStatus, jqXHR) {
        html1 = `
            <a class="nav-main-link active" href="#" onclick='view_usu()'>
                <i class="nav-main-link-icon si si-users"></i>
                <span class="nav-main-link-name">Usuarios</span>
            </a>
            <a class="nav-main-link active" href="#" id="btn_menu_inv_inve">
                <i class="nav-main-link-icon si si-users"></i>
                <span class="nav-main-link-name">Datos de la Empresa</span>
            </a>
            <a class="nav-main-link active" href="#" id="btn_menu_inv_Pedi">
                <i class="nav-main-link-icon si si-users"></i>
                <span class="nav-main-link-name">Reportes</span>
            </a>
            `;
        $("#menu_1").html(html1);
        $("#main-container").html(data);
    });
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
            <a class="nav-main-link active" href="#" onclick='caducidad_home()'>
                <i class="nav-main-link-icon si si-users"></i>
                <span class="nav-main-link-name">Caducidad</span>
            </a>
            <a class="nav-main-link active" href="#" onclick='producto_home()'>
                <i class="nav-main-link-icon si si-users"></i>
                <span class="nav-main-link-name">Productos</span>
            </a>
            <a class="nav-main-link active" href="#" onclick="kardex_home()">
                <i class="nav-main-link-icon si si-users"></i>
                <span class="nav-main-link-name">Kardex</span>
            </a>
            <a class="nav-main-link active" href="#" onclick="provedor_home()">
                <i class="nav-main-link-icon si si-users"></i>
                <span class="nav-main-link-name">Provedores</span>
            </a>
            `;
            $("#menu_1").html(html1);
            setTimeout(() => {
                show_list_tbody_caducidad();
            }, 900);
        },
    });
});
$("#btn_home_cliente").click(function (e) {
    e.preventDefault();
    $.ajax({
        type: "get",
        url: "cliente/",
        data: {},
        // dataType: "dataType",
        success: function (response) {
            $("#main-container").html(response);
            html1 = `
            <a class="nav-main-link active" href="#" onclick='clientes_home()'>
                <i class="nav-main-link-icon si si-users"></i>
                <span class="nav-main-link-name">Registro de Clientes</span>
            </a>
            `;
            $("#menu_1").html(html1);
            setTimeout(() => {}, 900);
        },
    });
});
$("#btn_home_pedidos").click(function (e) {
    e.preventDefault();
    $.ajax({
        type: "get",
        url: "Pedido/",
        data: {},
        // dataType: "dataType",
        success: function (response) {
            $("#main-container").html(response);
            html1 = `
            <a class="nav-main-link active" href="#" onclick='pedido_registro()'>
                <i class="nav-main-link-icon si si-users"></i>
                <span class="nav-main-link-name">Pedidos Registrados</span>
            </a>
            <a class="nav-main-link active" href="#" onclick='pedido_new()'>
                <i class="nav-main-link-icon si si-users"></i>
                <span class="nav-main-link-name">Nuevo Pedido</span>
            </a>
            `;
            $("#menu_1").html(html1);
            setTimeout(() => {}, 900);
        },
    });
});
