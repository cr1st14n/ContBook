<div class="content">
    <div class="row">
        <div class="col-xl-12">
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
                    <input type="text" class="form-control form-control-sm col-2" id="inp_search_clie"
                        placeholder="Buscar Cliente"><br>
                    <table class="table table-hover table-vcenter table-responsive" style="width: 100%">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10%;">Cod</th>
                                <th class="text-center" style="width: 10%">Usuario</th>
                                <th class="text-center" style="width: 20%">Cliente</th>
                                <th class="text-center" style="width: 10%">Pedido</th>
                                <th class="text-center" style="width: 10%">Fecha</th>
                                <th class="text-center" style="width: 10%">Ref</th>
                                <!-- <th class="d-none d-sm-table-cell" style="width: 20%;"></th> -->
                                <th class="text-center" style="width: 10%;"></th>
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
                    </table>
                </div>
            </div>
            <!-- END Hover Table -->
        </div>
    </div>
</div>
<!-- Large Block Modal -->
<div class="modal" id="md_ubi" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
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
                    <iframe src="" id="emb_mapa_1" type=""></iframe>
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
                                <th style="width: 70%">Producto</th>
                                <th style="width: 10%">Cantidad</th>
                                <th style="width: 10%">Precio</th>
                                <th style="width: 10%">C.T.</th>
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
<script src="{{ asset('resources/js/pedido/pedidos.js') }}"></script>
