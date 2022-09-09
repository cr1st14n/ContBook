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
                    <input type="text" class="form-control form-control-sm" placeholder="Buscar por nombre" onkeyup="load(1);">
                </div>
                <div class="col-md-3 col-xs-12">
                    <select name="inp_prov" id="inp_prov" class="form-control form-control-sm">
                        <option value="" disabled selected>seleccionar Fabricante</option>
                        <option value="">Todos</option>
                    </select>
                </div>
                <div class="col-md-3 col-xs-12" style="text-align:right">
                    <button class="btn btn-info btn-sm" id="btn_pro_add_1"><i class="fa fa-plus"></i> Nuevo</button>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center">Cod</th>
                            <th>Producto</th>
                            <th>Descripocion</th>
                            <th style="width: 30%;">Fabricante</th>
                            <th style="width: 15%;">Cantidad</th>
                            <th style="width: 15%;">Precio</th>
                            <th style="width: 15%;">Estado</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center"></td>
                            <td class="font-w600 font-size-sm"></td>
                            <td class="font-size-sm"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-primary " data-toggle="tooltip" title="Edit">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-primary " data-toggle="tooltip" title="Delete">
                                        <i class="fa fa-fw fa-times"></i>
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
                    <h3 class="block-title">Modal Title</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content font-size-sm">
                    <form class="mb-5" action="be_forms_layouts.html" method="POST" onsubmit="return false;">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Producto</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="" name="" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">descipcion</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="" name="" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Fabricante</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="" name="" placeholder="">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Cantidad Inicial</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control form-control-sm" id="" name="" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Precio</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control form-control-sm" id="" name="" placeholder="">
                            </div>
                        </div>
                        
                    </form>
                </div>
                <div class="block-content block-content-full text-right border-top">
                    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal"><i class="fa fa-check mr-1"></i>Ok</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('resources/js/inventario/producto.js')}}"></script>