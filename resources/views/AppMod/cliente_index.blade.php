<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Registrar Cliente <small
                    class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">Complete los datos requeridos.</small>
            </h1>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- jQuery Validation (.js-validation class is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _es6/pages/be_forms_validation.js) -->
    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
    <form class="js-validation" action="be_forms_validation.html" method="POST">
        <div class="block">
            <div class="block-content block-content-full">
                <div class="">
                    <!-- Regular -->
                    <div class="row items-push">
                        <div class="col-lg-8 col-xl-5">
                            <div class="form-group">
                                <label for="val-username">Nombre: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" id="val-username" name="val-username"
                                    placeholder="Ingrese Nombre..">
                            </div>
                            <div class="form-group">
                                <label for="val-email">C.I.: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" id="val-email" name="val-email"
                                    placeholder="Ingrese  CI..">
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="">NIT: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" id="val-password" name="val-password"
                                    placeholder="Ingrese  NIT..">
                            </div>
                            <div class="form-group">
                                <label for="">Razon Social: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" id="val-password" name="val-password"
                                    placeholder="Ingrese  Razon Social..">
                            </div>
                            <div class="form-group">
                                <label for="">Telf./Cel.: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" id="val-password" name="val-password"
                                    placeholder="Ingrese  numero telefonico / celular..">
                            </div>
                            <div class="form-group">
                                <label for="">Correo Electronico: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" id="val-password" name="val-password"
                                    placeholder="Ingrese Correo..">
                            </div>
                            <div class="form-group">
                                <label for="">Dirección: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" id="val-password" name="val-password"
                                    placeholder="Ingrese  dirección..">
                            </div>
                        </div>
                    </div>
                    <!-- END Regular -->
                    <!-- Submit -->
                    <div class="row items-push">
                        <div class="col-lg-7 offset-lg-4">
                            <button type="submit" class="btn btn-primary">Completar registro</button>
                        </div>
                    </div>
                    <!-- END Submit -->
                </div>
            </div>
        </div>
    </form>
    <!-- jQuery Validation -->
</div>
<!-- END Page Content -->
