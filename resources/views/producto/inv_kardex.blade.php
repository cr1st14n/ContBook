<div class="content">
    <!-- Full Table -->
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">RESUMEN - SALDOS Y MOVIMIENTOS DE PRODUCTOS</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option">
                    <i class="si si-settings"></i>
                </button>
            </div>
        </div>
        <div class="block-content">
            <div class="row">
                <div class="col-md-3 col-xs-12">
                    <div class=" input-group">
                        <input type="month" class=" form-control form-control-sm" id="" name="" placeholder="hola">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-primary btn-sm">
                                <i class="fa fa-search mr-1"></i> Buscar
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12">
                    <input type="text" class="form-control form-control-sm" placeholder="Buscar por Detalle" onkeyup="load(2);">
                </div>
                <div class="col-md-2 col-xs-12">
                </div>
                <div class="col-md-2 col-xs-12">
                    <div class="dropdown" style="align-items: center;">
                        <button type="button" class="btn btn-outline-info dropdown-toggle btn-block btn-sm" id="dropdown-default-outline-info" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Registrar Movimiento
                        </button>
                        <div class="dropdown-menu font-size-sm" aria-labelledby="dropdown-default-outline-info">
                            <a class="dropdown-item" href="#" onclick="showModalMovPro(1)"><i class="far fa-arrow-alt-circle-down"></i> Registrar - Entradas</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" onclick="showModalMovPro(2)"><i class="far fa-arrow-alt-circle-up"></i> Registrar - Salidas</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-xs-12">
                    <div class="dropdown" style="text-align: rigth;">
                        <button type="button" class="btn  btn-outline-success dropdown-toggle btn-block btn-sm" id="dropdown-default-outline-info" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Imprimir Movimiento
                        </button>
                        <div class="dropdown-menu font-size-sm" aria-labelledby="dropdown-default-outline-success">
                            <a class="dropdown-item" href="#"><i class="fa fa-file-pdf"></i> Saldos y Movimientos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="fa fa-file-pdf"></i> Entradas del Mez</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-file-pdf"></i> Salidas del Mez</a>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter table-sm">
                    <thead>
                        <tr>
                            <th class="text-center" colspan="4">Detalle</th>
                            <th class="text-center" colspan="3" style="background-color: #5BD648;">Fisico</th>
                            <th class="text-center" rowspan="2" width="6%">Costo <br> Unitario</th>
                            <th class="text-center" colspan="3" style="background-color:#DEF233;">Valorado</th>
                            
                        </tr>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Producto</th>
                            <th class="text-center">Marca</th>
                            <th class="text-center"># Factura</th>

                            <th class="text-center" width="6%" >Entrada</th>
                            <th class="text-center" width="6%" >Salida</th>
                            <th class="text-center" width="6%" >Saldo</th>
                            <th class="text-center" width="6%" >Debe</th>
                            <th class="text-center" width="6%" >Haber</th>
                            <th class="text-center" width="6%" >Saldo</th>
                        </tr>
                    </thead>
                    <tbody id="tbody_producto">
                        <tr>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
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
<div class="modal fade" id="md_pro_add_1" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
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
                <form id="form_new_producto">@csrf
                    <div class="block-content font-size-sm">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Codigo</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="pdo_cod" name="pdo_cod" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Cod. Vademecum</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="pdo_cod2" name="pdo_cod2" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Nombre Generico</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="pdo_nomGen" name="pdo_nomGen" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Concentración</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="pdo_concentracion" name="pdo_concentracion" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Unidad de Medida</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="pdo_uMedica" name="pdo_uMedica" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Forma Farmaceutica</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="pdo_formFarm" name="pdo_formFarm" placeholder="" required>
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

<script src="{{ asset('resources/js/inventario/producto.js')}}"></script>