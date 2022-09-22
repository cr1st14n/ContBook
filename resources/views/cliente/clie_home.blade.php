<div class="content">
    <div class="row">
        <div class="col-xl-12">
            <!-- Hover Table -->
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">Lista de productos a caducar </h3>
                    <div class="block-options">
                        <div class="block-options-item">
                            <button class="btn btn-info btn-sm" id="btn_create_cliente"> <i class="fa fa-plus-circle"></i> Registrar nuevo Cliente</button>
                        </div>
                    </div>

                </div>
                <div class="block-content">
                    <input type="text" class="form-control form-control-sm col-2" placeholder="Buscar Cliente"><br>
                    <table class="table table-hover table-vcenter">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10%;">cod</th>
                                <th class="text-center">CI</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Razon Social</th>
                                <th class="text-center">Nit</th>
                                <th class="text-center">Telefono</th>
                                <th class="text-center">Correo</th>
                                <th class="text-center">Dirección</th>
                                <!-- <th class="d-none d-sm-table-cell" style="width: 20%;"></th> -->
                                <th class="text-center" style="width: 10%;"></th>
                            </tr>
                        </thead>
                        <tbody id="tbodyList_clientes">
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Hover Table -->
        </div>
    </div>
</div>
<div class="modal fade" id="md_create_cliente" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Registrar Nuevo Cliente</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <form id="form_new_cliente1">@csrf
                    <div class="block-content font-size-sm">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">CI:</label>
                            <div class="col-sm-8">
                                <input type="number" minlength="7" class="form-control form-control-sm" id="clie_ci" name="clie_ci" placeholder="Nombre Completo" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Nombre: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="clie_nombre" name="clie_nombre" placeholder="" required>
                            </div>
                        </div><hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">NIT: </label>
                            <div class="col-sm-8">
                                <input type="text" minlength="7" class="form-control form-control-sm" id="cli_razonSocialNit" name="cli_razonSocialNit" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Razon Social: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="cli_razonSocial" name="cli_razonSocial" placeholder="" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Correo electronico</label>
                            <div class="col-sm-8">
                                <input type="mail" class="form-control form-control-sm" id="cli_mail" name="cli_mail" placeholder="Nombre del Contacto" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Telefono Contacto</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="cli_telf" name="cli_telf" placeholder="" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="example-hf-email">Dirección</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="cli_direccion" name="cli_direccion" placeholder="" >
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full text-right border-top">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-check mr-1"></i>Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('resources/js/cliente/cliente.js')}}"></script>