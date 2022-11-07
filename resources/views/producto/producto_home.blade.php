<div class="content">
    <!-- Full Table -->
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">LISTA DE PRODUCTOS</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option">
                    <i class="si si-settings"></i>
                </button>
            </div>
        </div>
        <div class="block-content">
            <div class="row">
                <div class="col-md-3 col-xs-12">
                    <input type="text" class="form-control form-control-sm" placeholder="Buscar por código" onkeyup="load(1);">
                </div>
                <div class="col-md-3 col-xs-12">
                    <input type="text" class="form-control form-control-sm" placeholder="Buscar por Detalle" onkeyup="load(2);">
                </div>
                <div class="col-md-1 col-xs-12">
                    <select name="inp_prov" id="inp_prov" class="form-control form-control-sm" onchange="lista_est(this.value)">
                        <option value="t">Todos</option>
                        <option value="a" selected>Activo</option>
                        <option value="i">Inactivo</option>
                    </select>
                </div>
                <div class="col-md-3 col-xs-12" style="text-align:right">
                    <button class="btn btn-info btn-sm" id="btn_pro_add_1" onclick="createProducto()"><i class="fa fa-plus"></i> Nuevo</button>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter table-sm">
                    <thead>
                        <tr>
                            <th class="text-center">Cod.</th>
                            <th>Nom. Comercial</th>
                            <th>Nom. Generico</th>
                            <th>Concentración</th>
                            <th style="width: 10%;">U.Medida</th>
                            <th style="width: 15%;">Forma Farm.</th>
                            <th style="width: 5%;">Cantidad</th>
                            <th style="width: 40px;">Est</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tbody_producto">
                        <tr>
                            <td class="text-center"></td>
                            <td class="font-w600 font-size-sm"></td>
                            <td class="font-size-sm"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-primary " data-toggle="tooltip" title="Edit">
                                        <i class="fa fa-check"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-primary " data-toggle="tooltip" title="Delete">
                                        <i class="fa fa-ban"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Provedor</label>
                            <div class="col-sm-8">
                                <select class=" form-control form-control-sm" name="pdo_id_provedor" id="pdo_id_provedor" required>
                                    @foreach($probs as $p)
                                        <option value="{{$p->id}}">{{$p->prov_nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Nombre Comercial</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="pdo_nomComer" name="pdo_nomComer" placeholder="" required>
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
                                <input type="text" class="form-control form-control-sm" id="pdo_uMedida" name="pdo_uMedida" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Forma Farmaceutica</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="pdo_formFarm" name="pdo_formFarm" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Registro Sanitario</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="pdo_cod2" name="pdo_cod2" placeholder="">
                            </div>
                        </div>
                        <br><p>Datos de Venta <br> utilizar coma (,) para decimales </p>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Costo Region 1</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" placeholder="###,##" id="pdo_preUniVenta1" name="pdo_preUniVenta1" placeholder="">
                            </div>
                        </div><div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Costo Region 2</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" placeholder="###,##" id="pdo_preUniVenta2" name="pdo_preUniVenta2" placeholder="">
                            </div>
                        </div><div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Costo Region 3</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" placeholder="###,##" id="pdo_preUniVenta3" name="pdo_preUniVenta3" placeholder="">
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
