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
                            <input type="email" class="form-control form-control-sm" id="" name="" placeholder=".........">
                        </div>
                    </div>
                    <div class="block-options">
                        <div class="block-options-item">
                            <code>.table-sm</code>
                        </div>
                    </div>
                </div>
                <div class="block-content">
                    <table class="table table-sm table-vcenter">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10%;">Cod.</th>
                                <th>Provedor</th>
                                <th>RUC</th>
                                <th>Telef.</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>
                                <th class="text-center" style="width: 100px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="text-center" scope="row">1</th>
                                <td class="font-w600 font-size-sm">
                                    <a href="be_pages_generic_profile.html">Scott Young</a> <br> <p style="font-size: 12px;">DNI:</p>
                                </td>
                                <td></td>
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
                                        </button>
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
<div class="modal fade" id="md_pro_entrada" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">REGISTAR <strong>ENTRADA</strong> DE PRODUCTO</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <form id="frm_pro_entrada"> @csrf
                    <div class="block-content font-size-sm">
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <div class="flex-00-auto">
                                <i class="fa fa-info"></i>
                            </div>
                            <div class="flex-fill ml-3">
                                <p class="mb-0"> Recuerda que los Campos con <strong>*</strong>son obligatorios!</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Producto</label>
                                <select class="form-control form-control-sm" name="ent_pro" id="ent_pro">
                                    <option value=""></option>
                                </select>
                            </div>
                            <br>
                            <div class="col-md-6"> <br>
                                <label for="">Motivo</label>
                                <select name="ent_motivo" id="ent_motivo" class="form-control ">
                                    <option value="">Por Inventario Inicial</option>
                                    <option value="">Por Ajuste de inventario</option>
                                    <option value="">Por promocional de provedor</option>
                                    <option value="">Por canje de provedor</option>
                                </select>
                            </div>
                            <div class="col-md-6"> <br>
                                <label for="">Cantidad</label>
                                <div class="form-group ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control" id="ent_cant" name="ent_cant" min="1" required>
                                        <div class="input-group-append ">
                                            <span class="input-group-text">
                                                * Cantidad
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="block-content block-content-full text-right border-top">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-check mr-1"></i>Ok</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="md_pro_salida" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">REGISTAR <strong>SALIDA</strong> DE PRODUCTO</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <form id="frm_pro_salida">@csrf
                    <div class="block-content font-size-sm">
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <div class="flex-00-auto">
                                <i class="fa fa-info"></i>
                            </div>
                            <div class="flex-fill ml-3">
                                <p class="mb-0"> Recuerda que los Campos con <strong>*</strong>son obligatorios!</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <select class="form-control form-control-sm" name="sal_pro" id="sal_pro">
                                    <option value=""></option>
                                </select>
                            </div>
                            <br>
                            <div class="col-md-6"> <br>
                                <select name="sal_motivo" id="sal_motivo" class="form-control ">
                                    <option value="">Por Ajuste de inventario</option>
                                    <option value="">Por Averia de producto</option>
                                    <option value="">Por canje de provedor</option>
                                </select>
                            </div>
                            <div class="col-md-6"> <br>
                                <div class="form-group ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control" id="sal_cant" name="sal_cant" min="1" required>
                                        <div class="input-group-append ">
                                            <span class="input-group-text">
                                                * Cantidad
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="block-content block-content-full text-right border-top">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-check mr-1"></i>Ok</button>
                    </div>
                </form>
            </div>
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
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Codigo:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="prov_cod" name="prov_cod" disabled placeholder="Generado Automaticamente" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Provedor:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="prov_nombredni" name="prov_nombredni" placeholder="Nombre Completo">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">DNI:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="prov_dni" name="prov_dni" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">RUC: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="prov_ruc" name="prov_ruc" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Telefono: </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control form-control-sm" id="prov_telf" name="prov_telf" placeholder="" required>
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

<script src="{{ asset('resources/js/inventario/provedor.js')}}"></script>