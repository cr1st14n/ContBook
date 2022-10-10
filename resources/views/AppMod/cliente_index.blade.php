<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Registrar Cliente <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">Complete los datos requeridos.</small>
            </h1>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- jQuery Validation (.js-validation class is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _es6/pages/be_forms_validation.js) -->
    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
    <div class="block">
        <div class="block-content block-content-full">
           
            <form id="" onsubmit="event.preventDefault(); createCliente($(this).serialize());">@csrf
                <!-- Regular -->
                <div class="row">
                    <div class="col-lg-8 col-xl-5">
                        <div class="form-group">
                            <label for="val-username">Nombre: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="cli_nombre" name="cli_nombre" placeholder="Ingrese Nombre.." required>
                        </div>
                        <div class="form-group">
                            <label for="val-email">C.I.: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="cli_ci" name="cli_ci" placeholder="Ingrese  CI.." required>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="">NIT: <span class="text-danger">*</span></label>
                            <input type="number" class="form-control form-control-sm" id="cli_razonSocial" name="cli_razonSocial" placeholder="Ingrese  NIT..">
                        </div>
                        <div class="form-group">
                            <label for="">Razon Social: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="cli_razonSocialNit" name="cli_razonSocialNit" placeholder="Ingrese  Razon Social..">
                        </div>
                        <div class="form-group">
                            <label for="">Telf./Cel.: <span class="text-danger">*</span></label>
                            <input type="number" class="form-control form-control-sm" id="cli_telf" name="cli_telf" placeholder="Ingrese  numero telefonico / celular..">
                        </div>
                        <div class="form-group">
                            <label for="">Correo Electronico: <span class="text-danger">*</span></label>
                            <input type="email" class="form-control form-control-sm" id="cli_mail" name="cli_mail" placeholder="Ingrese Correo..">
                        </div>
                        <div class="form-group">
                            <label for="">Dirección: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="cli_direccion" name="cli_direccion" placeholder="Ingrese  dirección..">
                        </div>
                    </div>
                </div>
                <!-- END Regular -->
                <!-- Submit -->
                <div class="row ">
                    <div class="col-lg-7 offset-lg-4">
                        <button type="submit" class="btn btn-primary">Completar registro</button>
                    </div>
                </div>
                <!-- END Submit -->
            </form>
        </div>
    </div>
    <!-- jQuery Validation -->
</div>
<!-- END Page Content -->