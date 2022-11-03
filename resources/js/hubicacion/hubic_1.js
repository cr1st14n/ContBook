data_list = [];
data = [-16.496995, -68.173524];
var map = L.map("map").setView(data, 18);

L.tileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
        'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
    maxZoom: 18,
}).addTo(map);

L.control.scale().addTo(map);
L.marker(data, {
    draggable: true,
}).addTo(map);

function show_list_pedido() {
    $.ajax({
        type: "get",
        url: "Hubicaion/list_1",
        data: { fecha: $("#ped_fecha").val(), usu: $("#ped_usu").val() },
        dataType: "json",
        success: function (response) {
            data_list = response;
            console.log(response);
            html = response.map(function (p, i) {
                console.log(p.ca_ubi.lat);
                st=''
                if (!p.ca_ubi.lat) {
                  i=null  ;
                  st='style="color:red"';
                } 
                return (a = `
                <li>
                    <a class="media py-2" href="#" onClick="show_ubi_1(${i})" >
                        <div class="media-body">
                            <div class="font-w600" ${st}> Cliente: ${p.cli_nombre} C.I:${p.cli_ci}</div>
                            <div class="font-w400 text-muted">R.S.: ${p.cli_razonSocial} NIT: ${p.cli_razonSocialNit}</div>
                            <div class="font-w400 text-muted">Dirección: ${p.cli_direccion}</div>
                        </div>
                    </a>
                </li>
                `);
            });
            $("#list_ped").html(html);
        },
    });
}
function show_ubi_1(i) {
    if (i==null) {
        notif(3,'Sin datos GPS')
        return
    }
    console.log(data_list[i]["ca_ubi"]);
    data = [data_list[i]["ca_ubi"]['lat'],data_list[i]["ca_ubi"]['lon']];
    map.flyTo(data, 18);
    L.marker(data, {
        draggable: true,
    }).addTo(map);
}
