<div class="content">
    <div class="row">
        <div class=" col-xl-4">
            <div class=" block">
                <div class=" block-header">
                    <h3 class="block-title">Buscar Producto</h3>
                    <div class="block-options">
                        <div class="block-options-item">
                            <!-- <button class="btn btn-info btn-sm" id=""> <i class="fa fa-plus-circle"></i> BNT</button> -->
                        </div>
                    </div>
                </div>
                <div class=" block-content">
                    <div class="form-group form-row form-group-sm">
                        <div class=" col-lg-6">
                            <select name="sel_pro" id="sel_pro" class="form-control form-control-sm" onchange="listProv(this.value)">
                                $pros
                                @foreach($pros as $pro)
                                <option value="{{$pro->id}}">{{$pro->prov_sigla}} - {{$pro->prov_nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class=" col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class=" form-control form-control-sm" id="" placeholder="COD">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-primary btn-sm">
                                            <i class="fa fa-search mr-1"></i> Search
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-row form-group-sm">
                        <div class=" col-lg-12">
                            <input type="text" class=" form-control form-control-sm" id="" placeholder="Descripción">
                        </div>
                    </div>
                    <div class=" row">
                        <table id="table_001" class="table table-responsive table-hover table-striped" style="width:100%;">
                            <thead>
                                <tr>
                                    <th width="20%">Cod</th>
                                    <th width="80%">Detalle</th>
                                </tr>
                            </thead>
                            <tbody id="listCompra_1">
                            </tbody>
                            <style type="text/css">
                                thead tr th {
                                    position: sticky;
                                    top: 0;
                                    z-index: 10;
                                    background-color: #ffffff;
                                    font-size: 9px;
                                }

                                .table-responsive {
                                    height: 600px;
                                    overflow: scroll;
                                }
                            </style>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class=" col-xl-8">
            <div class=" block">
                <div class=" block-header">
                    <h3 class="block-title">Detalle</h3>
                    <div class="block-options">
                        <div class="block-options-item">
                            <button class="btn btn-danger btn-sm" onclick="resetVenta(1)"> <i class="fa fa-eraser"></i> Cancelar</button>
                            <button class="btn btn-success btn-sm" onclick="finCompra(1)"> <i class="fa fa-plus-circle"></i> Finalizar Compra</button>
                        </div>
                    </div>
                </div>
                <div class=" block-content">
                    <form onsubmit="event.preventDefault(); add_pro();">
                        <div class="form-group form-row form-group-sm">
                            <div class="col-lg-3">
                                <p style="font-size: 13px;" id="datoProducto_1">Producto:<br>- comer <br> - gen <br>Cod: <br> -
                                </p>
                            </div>
                            <div class="col-lg-3">
                                <label for="" style="font-size: 12px;">Cantidad:</label>
                                <input type="number" class=" form-control form-control-sm" id="sp_cant" name="sp_cant" required>
                                <label for="" style="font-size: 12px;">Costo:</label>
                                <input type="number" step="any" class=" form-control form-control-sm" id="sp_cost" name="sp_cost" placeholder=" (,) usar coma decimal" required>
                            </div>
                            <div class="col-lg-3">
                                <label for="" style="font-size: 12px;">Lote:</label>
                                <input type="text" class=" form-control form-control-sm" id="sp_lot" name="sp_lot" required>
                                <label for="" style="font-size: 12px;">Fecha Vencimiento</label>
                                <input type="date" class=" form-control form-control-sm" id="sp_fev" name="sp_fev" required>
                            </div>
                            <div class="col-lg-3">
                                <label for="" style="font-size: 12px;">Doc. respaldo</label>
                                <input type="text" class=" form-control form-control-sm is-invalid" id="sp_rep" name="sp_rep" placeholder=" R: / F: " required>
                                <br>
                                <button type="submit" accesskey="a" class="btn btn-block btn-warning btn-sm"><i class=" fa fa-plus-circle"></i></button>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class=" col-lg-12 content">
                            <div class=" table-responsive-lg">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Cod</th>
                                            <th>Detalle</th>
                                            <th>Vencimiento</th>
                                            <th>Cantidad</th>
                                            <th>Costo</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_1">
                                        <tr>
                                            <td colspan="5"></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td colspan="4" style="text-align:right;"> TOTAL:</td>
                                            <td id="costo_total"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Small Block Modal -->
<div class="modal" id="md_confirmar" tabindex="-1" role="dialog" aria-labelledby="modal-block-small" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title"></h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content font-size-sm">
                    <p>Confirmar y registrar Compra?</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Cancelar</button>
                        </div>
                        <div class="col-lg-6">
                            <button type="button" class="btn btn-sm btn-primary"   onclick="finCompra(2)"><i class="fa fa-check mr-1"></i>Confirmar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Small Block Modal -->

{{--
<script src="{{ asset('resources/js/pedido/pedidos.js')}}"></script> --}}
