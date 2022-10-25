<div class="content">
    <div class="row">
        <div class="col-xl-12">
            <!-- Hover Table -->
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">Pedidos Registrados</h3>
                    <div class="block-options">
                        <div class="block-options-item">
                            <button class="btn btn-info btn-sm" id="btn_create_cliente"> <i class="fa fa-plus-circle"></i> BNT</button>
                        </div>
                    </div>

                </div>
                <div class="block-content">
                    <input type="text" class="form-control form-control-sm col-2" id="inp_search_clie" placeholder="Buscar Cliente"><br>
                    <table class="table table-hover table-vcenter table-responsive" style="width: 100%" >
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10%;">Cod</th>
                                <th class="text-center" style="width: 10%">Usuario</th>
                                <th class="text-center" style="width: 20%">Detalle</th>
                                <th class="text-center" style="width: 10%">C.T.</th>
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

<script src="{{ asset('resources/js/pedido/pedidos.js')}}"></script>
