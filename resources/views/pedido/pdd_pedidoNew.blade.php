<div class="content">
    <div class="row">
        <div class=" col-xl-8">
            <div class=" block">
                <div class=" block-header">
                    <h3 class="block-title">Detalle</h3>
                    <div class="block-options">
                        <div class="block-options-item">
                            <button class="btn btn-info btn-sm" id="btn_create_cliente"> <i class="fa fa-plus-circle"></i> BNT</button>
                        </div>
                    </div>
                </div>
                <div class=" block-content-sm">
                    <div class="row">
                        <div class="col-lg-12 col-xl-6">
                            <div class=" content">
                                <div class="form-group">
                                    <div class="input-group">
                                        <select name="sele_cliente" id="sele_cliente" class="form-control form-control-sm" >
                                            <option disabled selected>Bucar Cliente</option>
                                            @foreach($cliente as $cli)
                                            <option value="{{$cli->id}}">{{$cli->cli_nombre}}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-primary btn-sm">
                                                <i class="fa fa-search mr-1"></i> registrar Nuevo
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <p id="p_detalle_cliente" style="font-size: 12px;">
                                    Datos del CLiente: <br>
                                    CI:  <strong></strong>, Nombre: <strong></strong><br>
                                    NIT: <strong></strong>, Razon Social: <strong></strong><br>
                                    Direccion: <strong></strong>
                                </p>
                            </div>
                        </div>
                        <div class=" col-lg-12 content">
                            <div class=" table-responsive-lg">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Detalle</th>
                                            <th>Cantidad</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
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
        </div>
        <div class=" col-xl-4">
            <div class=" block">
                <div class=" block-header">
                    <h3 class="block-title">Buscar Producto</h3>
                    <div class="block-options">
                        <div class="block-options-item">
                            <button class="btn btn-info btn-sm" id=""> <i class="fa fa-plus-circle"></i> BNT</button>
                        </div>
                    </div>
                </div>
                <div class=" block-content-full">
                    <div class=" col-lg-12">
                        <input type="text" class=" form-control form-control-sm" id="inp_buscar_pro" placeholder="Buscar producto...">
                    </div><br>
                    <div class=" col-lg-12">
                        <table class="table table-bordered table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>Detalle</th>
                                    <th width="15%">Precio</th>
                                    <th width="10%"></th>
                                </tr>
                            </thead>
                            <tbody id="listProVenta_tbody">
                                <tr >
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
</div>

<script src="{{ asset('resources/js/pedido/pedidos.js')}}"></script>