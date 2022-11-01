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
                    <iframe id="emb_mapa_1"
                        src=`https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d478.1845736725786!2d-68.13103288470776!3d-16.502020085584633!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915f207008106593%3A0xd52a4c464c7e8179!2sAv.%2016%20de%20Julio%2C%20La%20Paz!5e0!3m2!1ses-419!2sbo!4v1666787134014!5m2!1ses-419!2sbo`
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                                <th style="width: 50%">Producto</th>
                                <th style="width: 10%">Cantidad</th>
                                <th style="width: 15%">Precio</th>
                                <th style="width: 15%">C.T.</th>
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
