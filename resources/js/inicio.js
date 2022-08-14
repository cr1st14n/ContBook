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

$('#btn_menu_users').click(function (e) { 
    e.preventDefault();
    console.log('printjj');
   $('#main-container').html(""); 
});