show_list_usu();
usu_s = "";

function view_usu() {
    $.get("adm/usu", function (data, textStatus, jqXHR) {
        $("#main-container").html(data);
    });
}
$("#btn_new_usu").click(function (e) {
    e.preventDefault();
    $("#form_new_usu").trigger("reset");
    $("#md_new_usu").modal("show");
});

$("#form_new_usu").submit(function (e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "adm/usu/store",
        data: $(this).serialize(),
        success: function (response) {
            console.log(response);
            if (response == 1) {
                $("#md_new_usu").modal("hide");
                notif(1, "usuario Registrado");
            }
            if (response == "Er_mail") {
                notif(4, "Email ya registrado");
            }
            if (response == "Er_cod") {
                notif(4, "Codigo ya registrado");
            }
        },
    });
});

function show_list_usu() {
    $.ajax({
        type: "get",
        url: "adm/usu/list_1",
        data: {},
        success: function (response) {
            console.log(response);
            html = response
                .map(function (p) {
                    var f = new Date(p.created_at);
                    f = f.toLocaleDateString();
                    var y = new Date(p.usu_fechnac);
                    y = y.toLocaleDateString();
                    if (p.usu_fechnac == null) {
                        y = "---";
                    }
                    tm = '<span class="badge badge-primary">Activo</span>';
                    if (p.usu_estado == "0") {
                        tm = '<span class="badge badge-danger">Inactivo</span>';
                    }
                    // console.log(tm);
                    return (h = `
                 <tr>
                    <th class="text-center" scope="row">${p.id}</th>
                    <td>${p.usu_nombre}</td>
                    <td>${p.usu_ci}</td>
                    <td>${y}</td>
                    <td style="font-size: 12px;">Telf: <strong>${p.usu_telf}</strong> <br>Correo: <strong>${p.email}</strong> <br>Dom.: <strong>${p.usu_domicilio}</strong></td>
                    <td>${p.usu_grupoPermiso}</td>
                    <td class="font-w600 font-size-sm">
                        <a href="be_pages_generic_profile.html">${f}</a>
                    </td>
                    <td class="d-none d-sm-table-cell">
                        ${tm}
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-light"  title="Edit Client" onClick='edit_usu(${p.id})'>
                                <i class="fa fa-fw fa-pencil-alt"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="Remove Client" onClick='usuEditPermiso(${p.id})'>
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                `);
                })
                .join(" ");
            $("#usu_table").html(html);
        },
    });
}
function edit_usu(param, est = 0) {
    console.log("aca ");
    if (est == 0) {
        $.get(
            "adm/usu/edit_1",
            { id: param },
            function (data, textStatus, jqXHR) {
                usu_s = data.id;
                $("#u_cod_edit").val(data.usu_cod);
                $("#u_nombre_edit").val(data.usu_nombre);
                $("#u_ci_edit").val(data.usu_ci);
                $("#u_fn_edit").val(data.usu_fechnac);
                $("#u_telf_edit").val(data.usu_telf);
                $("#u_mail_edit").val(data.email);
                $("#u_dom_edit").val(data.usu_domicilio);
                $("#u_est_edit").val(data.usu_estado);
                $("#u_grupo_edit").val(data.usu_grupoPermiso);
                $("#md_edit_usu").modal("show");
            }
        );
        return;
    }
}
$("#form_edit_usu").submit(function (e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "adm/usu/update_1/" + usu_s + "",
        data: $(this).serialize(),
        success: function (response) {
            if (response == 1) {
                $("#md_edit_usu").modal("hide");
                show_list_usu();
                notif(1, "Actualizado");
            }
            if (response == "Er_mail") {
                notif(4, "Email ya registrado");
            }
            if (response == "Er_cod") {
                notif(4, "Codigo ya registrado");
            }
        },
    });
});
function usuEditPermiso(param) {
    $.post("adm/usu/update_estado",{"_token": $('meta[name="csrf-token"]').attr('content'),'id':param} ,
        function (data, textStatus, jqXHR) {
            console.log(data);
            if (data) {
                show_list_usu()
            } else {
                console.log('Error');
            }
        },
    );
}
