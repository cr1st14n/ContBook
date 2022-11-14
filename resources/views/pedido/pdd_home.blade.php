<div class="content">
    <div class="row">
        <div class="col-xl-5">
            <!-- Hover Table -->
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">Pedidos Registrados</h3>
                    <div class="block-options">
                        <div class="block-options-item">
                            <button class="btn btn-info btn-sm" id="btn_create_cliente"> <i class="fa fa-plus-circle"></i>
                                BNT</button>
                        </div>
                    </div>

                </div>
                <div class="block-content">
                    <form class=" form-group form-row">
                        <div class=" col-4">
                            <select name="" id="" class=" form-control form-control-sm"
                                onchange="listPedSelc(1,this.value)">
                                <option value="0">Todos</option>
                                @foreach ($clientes as $cli)
                                    <option value="{{ $cli->id }}">{{ $cli->cli_nombre }} {{ $cli->cli_ci }} <br>
                                        {{ $cli->cli_razonSocial }} {{ $cli->cli_ccli_razonSocialNiti }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class=" col-2">
                            <select name="" id="" class=" form-control form-control-sm"
                                onchange="listPedSelc(2,this.value)">
                                <option value="0">Todos</option>
                                @foreach ($usuarios as $usu)
                                    <option value="{{ $usu->id }}">{{ $usu->usu_nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                    <table class="table table-hover table-vcenter table-responsive" style="width: 100%">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10%;">Cod</th>
                                <th class="text-center" style="width: 10%">Usuario</th>
                                <th class="text-center" style="width: 20%">Cliente</th>
                                <th class="text-center" style="width: 10%">Pedido</th>
                                <th class="text-center" style="width: 10%">Fecha</th>
                                <!-- <th class="d-none d-sm-table-cell" style="width: 20%;"></th> -->
                                <th class="text-center" style="width: 5%;"></th>
                            </tr>
                        </thead>
                        <tbody id="tbodyList_pedidos">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td> <a href=""></a> </td>
                            </tr>
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
            <!-- END Hover Table -->
        </div>
        <div class=" col-xl-7">
            <div class="block">
                <div class=" block-header">
                    <h3 class=" block-title">Pedido a Venta</h3>
                    <div class=" block-options-item">
                        <button class="btn btn-danger btn-sm"> <i class="fa fa-desktop"></i> Cancelar</button>
                        <button class="btn btn-success btn-sm" onclick="registraVentPedido()"> <i
                                class="fa fa-desktop"></i> Registrar</button>
                    </div>
                </div>
                <div class=" block-content">
                    {{-- <p style="font-size: 12px">
                        Datos Cliente: <br>
                        <strong>datos del cliente</strong><br>
                        Fecha Pedido: <strong>01-01-2022</strong><br>
                        Ejecutivo de ventas: <br> <strong>usuario </strong>
                    </p> --}}
                    <div>
                        <table class="table table-responsive table-responsive-lg table-striped" style="height: 100%">
                            <thead>
                                <tr>
                                    <th width="40%">Producto</th>
                                    <th width="5%" style="font-size: 12px">Stock</th>
                                    <th width="5%" style="font-size: 12px">Cantidad</th>
                                    <th width="5%" style="font-size: 12px"></th>
                                    <th width="15%" style="font-size: 11px">Precio U.</th>
                                    <th width="20%" style="font-size: 11px">Precio T.</th>
                                    <th width="5%"></th>
                                </tr>
                            </thead>
                            <tbody id="tbody_PedComp_1">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Large Block Modal -->
<div class="modal" id="md_ubi" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div id="map"></div>
        </div>
    </div>
</div>
<div class="modal" id="md_listPedido_producto" tabindex="-1" role="dialog" aria-labelledby="modal-block-large"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
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
                    <table class="table table-active table-striped table-responsive table-colored">
                        <thead>
                            <tr>
                                <th style="width: 50%">Producto</th>
                                <th style="width: 10%">Cantidad</th>
                                <th style="width: 15%">Precio</th>
                                <th style="width: 15%">C.P.</th>
                            </tr>
                        </thead>
                        <tbody id="mq_listPro_pedido">
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="block-content block-content-full text-right border-top">
                    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal"><i
                            class="fa fa-check mr-1"></i>Ok</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Large Block Modal -->
<!-- Small Block Modal -->
<div class="modal" id="md_confirmar_PedVenta" tabindex="-1" role="dialog" aria-labelledby="modal-block-small"
    aria-hidden="true">
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
                    <p>Confirmar y registrar Pedido a Venta?</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <button type="button" class="btn btn-sm btn-warning"
                                data-dismiss="modal">Cancelar</button>
                        </div>
                        <div class="col-lg-6">
                            <button type="button" class="btn btn-sm btn-primary" onclick="registraVentPedido(2)"><i
                                    class="fa fa-check mr-1"></i>Confirmar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Small Block Modal -->
<script src="{{ asset('resources/js/pedido/pedidos.js') }}"></script>
