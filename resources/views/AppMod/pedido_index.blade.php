<!-- Page Content -->
<div class="content">
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Datos Cliente</h3>
            <div class="block-options">
                <div class="block-options-item">
                    <button class="btn btn-secondary btn-sm btn-rounded" onclick="clienteSearch()"><i class="fa fa-fw fa-user-alt "></i>
                    </button>
                    <button class="btn btn-secondary btn-sm btn-rounded" onclick="showcatalogo()"><i class="fa fa-fw fa-shopping-cart "></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="block-content">
            <div class="row">
                <div class="col-sm-6">

                    <p style="font-size: 14px" id="p_datClie">Nombre: CI: <br>
                        R.Z.: NIT:</p>
                </div>
                <div class="col-sm-4">
                    <p id="secCostoTotal">Costo Total: <br> <span style=" font-size:25px ">Bs.- 0.00</span></p>
                </div>
                <div class=" col-sm-2" style="text-align:right;">
                    <button type="button" class=" btn btn-warning btn"  onclick="concluirPedido()" style="color:floralwhite;"><i class="fa fa-fw fa-2x fa-shopping-cart"></i></button>
                </div>
            </div>
            <table class="table   table-hover table-responsive">
                <thead class=" thead-indigo ">
                    <tr>
                        <th style="width: 15%;">Cod</th>
                        <th style="width: 75%;">Descripción</th>
                        <th style="width: 10%;"></th>
                    </tr>
                </thead>
                <tbody id="tbody_listProsect">
                    <tr>
                        <td class="text-center" scope="row">--</td>
                        <td class="font-w600 font-size-sm">--</td>
                        <td class="d-none d-sm-table-cell">--</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Small Table -->
</div>
<!-- END Page Content -->
<!-- Fade In Block Modal -->
<div class="modal fade" id="modal_busCliente" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top " role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Seleccionar Cliente</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content font-size-sm">
                    <table class="table table-sm table-vcenter table-hover table-responsive ">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm col-12" id="inp_text_clie" name="example-group3-input1" placeholder="Buscar ">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-primary btn-sm" onclick="searchClie()">
                                        <i class="fa fa-search mr-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10%;">Cod</th>
                                <th style="width: 80%;">Datos</th>
                                <th class="text-center" style="width: 10%;"></th>
                            </tr>
                        </thead>
                        <tbody id="tbodylistCliePed">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_busProducto" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top modal-xl" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Seleccionar producto</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content font-size-sm row">
                    <table class="table table-striped table-vcenter table-hover table-responsive">
                        <div class="form-group form-row">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="showlistPro()">
                                        <i class="fa fa-search mr-1"></i>
                                    </button>
                                </div>
                                <input type="number" class="form-control form-control-sm col-3" id="inp_text_pro_2" name="example-group3-input1" placeholder="Cantidad..">
                                <input type="text" class="form-control form-control-sm col-9" id="inp_text_pro_1" name="example-group3-input1" placeholder="Buscar ">

                                <select name="inp_lab" id="inp_lab" class="form-control form-control-sm" onchange="searchPro_2($(this).val())">
                                    <option value="all">Todo</option>
                                    @foreach( $provs as $p)
                                    <option value="{{$p->id}}">{{$p->prov_nombre}}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-primary btn-sm" onclick="searchPro()">
                                        <i class="fa fa-search mr-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10%;">-</th>
                                <th class="text-center" style="width: 10%;">Cod</th>
                                <th class="text-center" style="width: 80%;">Datos</th>
                            </tr>
                            <style type="text/css">
                                thead tr th {
                                    position: sticky;
                                    top: 0;
                                    z-index: 10;
                                    background-color: #ffffff;
                                }

                                .table-responsive {
                                    height: 1000px;
                                    overflow: scroll;
                                }
                            </style>
                        </thead>
                        <tbody id="tbodylistProPed">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Fade In Block Modal -->

{{-- <script src="{{ asset('resources/js/App/inicio.js') }}"></script> --}}
