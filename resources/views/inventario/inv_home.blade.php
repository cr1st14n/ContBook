<div class="content">
    <div class="row">
        <div class="col-xl-6">
            <!-- Hover Table -->
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">Hover Table</h3>
                    <div class="block-options">
                        <div class="block-options-item">
                            <code></code>
                        </div>
                    </div>
                </div>
                <div class="block-content">
                    <table class="table table-hover table-vcenter">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 30%;">Producto</th>
                                <th>Provedor</th>
                                <th>Lote</th>
                                <th>Cantidad</th>
                                <th class="d-none d-sm-table-cell" style="width: 20%;"></th>
                                <th class="text-center" style="width: 10%;"></th>
                            </tr>
                        </thead>
                        <tbody id="tbody_caducidad">
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Hover Table -->
        </div>
    </div>
</div>
<script src="{{ asset('resources/js/inventario/producto.js')}}"></script>
<script src="{{ asset('resources/js/inventario/provedor.js')}}"></script>
<script src="{{ asset('resources/js/inventario/kardex.js')}}"></script>
<script src="{{ asset('resources/js/inventario/caducidad.js')}}"></script>