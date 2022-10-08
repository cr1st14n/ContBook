<!-- Page Content -->
<div class="content">
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Catalogo De productos  </h3>
            <div class="block-options">
                <div class="block-options-item">
                    <button class="btn btn-secondary btn-sm btn-rounded" onclick="clienteSearch()"><i
                            class="fa fa-fw fa-user-alt "></i>
                    </button>
                    <button class="btn btn-secondary btn-sm btn-rounded" onclick="showcatalogo()"><i
                            class="fa fa-fw fa-arrow"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="block-content">
            <p style="font-size: 14px" id="p_datClie">Nombre: CI: <br>
                R.Z.: NIT:</p>
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
    <div class=" " style="text-align: right">
    <p id="secCostoTotal">Costo Total</p>
        <button class="btn btn-dark  btn-rounded " onclick="concluirPedido()"><i
                class="fa  fa-arrow-alt-circle-right"></i>
        </button>
    </div>
    <!-- END Small Table -->
</div>
<!-- END Page Content -->