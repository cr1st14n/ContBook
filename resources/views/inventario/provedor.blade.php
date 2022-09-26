<div class="content">
    <!-- Full Table -->
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Gestión de Provedores</h3>

            <div class="heading-elements">
                <button type="button" class="btn btn-primary heading-btn btn-sm" onclick="newProveedor()">
                    <i class="fa fa-database"></i> Agregar Nuevo/a</button>


                <button type="button" id="print_proveedor" class="btn btn-info heading-btn btn-sm">
                    <i class="fa fa-print"></i> Imprimir Reporte</button>

            </div>
        </div>
        <hr>
        <div class="block-content">
            <!-- Small Table -->
            <div class="block">
                <div class="block-header">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="example-hf-email">Buscar:</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control form-control-sm" id="prov_search" name="prov_search" placeholder=".........">
                        </div>
                    </div>
                    <div class="block-options">
                        <div class="block-options-item">
                            <code>.table-sm</code>
                        </div>
                    </div>
                </div>
                <div class="block-content">
                    <table class="table table-sm table-vcenter table-responsive-sm">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10%;">Cod.</th>
                                <th>Provedor</th>
                                <th>NIT</th>
                                <th>Referencia</th>
                                <th>Contacto</th>
                                <th class="d-none d-sm-table-cell text-center" style="width: 8%;">Access</th>
                                <th class="text-center" style="width: 100px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_list">
                            <tr>
                                <th class="text-center" scope="row">1</th>
                                <td class="font-w600 font-size-sm">
                                    <a href="be_pages_generic_profile.html">Scott Young</a> <br> <p style="font-size: 12px;">DNI:</p>
                                </td>
                                <td> </td>
                                <td></td>
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
                                        </button> <i class="fa fa-band-aid"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center" scope="row">3</th>
                                <td class="font-w600 font-size-sm">
                                    <a href="be_pages_generic_profile.html">Judy Ford</a>
                                </td>
                                <td></td>
                                <td></td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge badge-primary">Personal</span>
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
</div>

<div class="modal fade" id="md_provedor_add_1" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Registrar Nuevo Producto</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <form id="form_new_provedor">@csrf
                    <div class="block-content font-size-sm">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Provedor:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="prov_nombre" name="prov_nombre" placeholder="Nombre Completo" required>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">NIT: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="prov_nit" name="prov_nit" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Telefono: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="prov_telf" name="prov_telf" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Correo Electronico: </label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control form-control-sm" id="prov_mail" name="prov_mail" placeholder="" >
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Contacto</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="prov_contacto" name="prov_contacto" placeholder="Nombre del Contacto" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Telefono Contacto</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control form-control-sm" id="prov_telfContacto" name="prov_telfContacto" placeholder="" required>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full text-right border-top">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-check mr-1"></i>Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="md_provedor_edit_1" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Registrar Nuevo Producto</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <form id="form_edit_provedor">@csrf
                    <div class="block-content font-size-sm">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Provedor:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="prov_nombre_edit" name="prov_nombre_edit" placeholder="Nombre Completo" required>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">NIT: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="prov_nit_edit" name="prov_nit_edit" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Telefono: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="prov_telf_edit" name="prov_telf_edit" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Correo Electronico: </label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control form-control-sm" id="prov_mail_edit" name="prov_mail_edit" placeholder="" >
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Contacto</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="prov_contacto_edit" name="prov_contacto_edit" placeholder="Nombre del Contacto" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Telefono Contacto</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control form-control-sm" id="prov_telfContacto_edit" name="prov_telfContacto_edit" placeholder="" required>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full text-right border-top">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-check mr-1"></i>Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('resources/js/inventario/provedor.js')}}"></script>