<div class="content row">

    <div class="col-xl-12">
        <!-- Small Table -->
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Registro de Usuarios</h3>
                <div class="block-options">
                    <div class="block-options-item">
                        <code></code>
                    </div>
                </div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-md-3 col-xs-12">
                    </div>
                    <div class="col-md-3 col-xs-12">
                    </div>
                    <div class="col-md-3 col-xs-12">
                    </div>
                    <div class="col-md-3 col-xs-12" style="text-align:right">
                        <button class="btn btn-info btn-sm" id="btn_new_usu"><i class="fa fa-plus"></i> Nuevo</button>
                    </div>
                </div>
                <br>
                <table class="table table-sm table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th>Nombre</th>
                            <th>CI</th>
                            <th>F.N.</th>
                            <th>Datos</th>
                            <th>Grupo</th>
                            <th>Agregado</th>
                            <th class="d-none d-sm-table-cell" style="width: 5%;">Estado</th>
                            <th class="text-center" style="width: 10%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="usu_table">
                        <tr>
                            <th class="text-center" scope="row">1</th>
                            <td></td>
                            <td></td>
                            <td></td><br>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="font-w600 font-size-sm">
                                <a href="be_pages_generic_profile.html">Scott Young</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-danger">Disabled</span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="Edit Client">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="Remove Client">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Small Table -->
    </div>
</div>
<div class="modal fade" id="md_new_usu" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Nuevo Usuario</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <form class="mb-5" id="form_new_usu">@csrf
                    <div class="block-content font-size-sm">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Codigo Usuario</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="u_cod" name="u_cod" placeholder="" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Nombre</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="u_nombre" name="u_nombre" placeholder="" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email"># de C.I.</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control form-control-sm" id="u_ci" name="u_ci" placeholder="" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Fecha Nacimiento</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control form-control-sm" id="u_fn" name="u_fn" placeholder="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Telefono</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control form-control-sm" id="u_telf" name="u_telf" placeholder="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control form-control-sm" id="u_mail" name="u_mail" placeholder="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Domicilio</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="u_dom" name="u_dom" placeholder="" autocomplete="off">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Estado</label>
                            <div class="col-sm-8">
                                <select class="form-contrl form-control-sm" id="u_est" name="u_est" required style="font-size: 10px;">
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">grupo</label>
                            <div class="col-sm-8">
                                <select class="form-contrl form-control-sm" id="u_grupo" name="u_grupo" required>
                                    <option value="1">Administrador</option>
                                    <option value="2">Operador</option>
                                    <option value="3">Visitador</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full text-right border-top">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="Submit" class="btn btn-sm btn-primary"><i class="fa fa-check mr-1"></i>Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="md_edit_usu" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Actualizar datos</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <form class="mb-5" id="form_edit_usu">@csrf
                    <div class="block-content font-size-sm">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Codigo Usuario</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="u_cod_edit" name="u_cod_edit" placeholder="" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Nombre</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="u_nombre_edit" name="u_nombre_edit" placeholder="" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email"># de C.I.</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control form-control-sm" id="u_ci_edit" name="u_ci_edit" placeholder="" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Fecha Nacimiento</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control form-control-sm" id="u_fn_edit" name="u_fn_edit" placeholder="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Telefono</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control form-control-sm" id="u_telf_edit" name="u_telf_edit" placeholder="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control form-control-sm" id="u_mail_edit" name="u_mail_edit" placeholder="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Domicilio</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="u_dom_edit" name="u_dom_edit" placeholder="" autocomplete="off">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Estado</label>
                            <div class="col-sm-8">
                                <select class="form-contrl form-control-sm" id="u_est_edit" name="u_est_edit" required style="font-size: 10px;">
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">grupo</label>
                            <div class="col-sm-8">
                                <select class="form-contrl form-control-sm" id="u_grupo_edit" name="u_grupo_edit" required>
                                    <option value="1">Administrador</option>
                                    <option value="2">Operador</option>
                                    <option value="3">Visitador</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full text-right border-top">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="Submit" class="btn btn-sm btn-primary"><i class="fa fa-check mr-1"></i>Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('resources/js/adm/usu.js')}}"></script>