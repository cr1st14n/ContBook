<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>ContBook</title>

    <!-- vendor css -->
    <link href="{{ asset('template/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{ asset('template/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('template/css/bracket.css')}}">
</head>

<body>
    <form id="formLogin">
        <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

            <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
                <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> ContBook <span class="tx-normal">]</span></div>
                <div class="tx-center mg-b-60">Sistema Contable Comercial</div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Codigo de Usuario" required>
                </div><!-- form-group -->
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Contraseña" required>
                    <a href="" class="tx-info tx-12 d-block mg-t-10">Olvido la contraseña?</a>
                </div><!-- form-group -->
                <button type="submit" class="btn btn-info btn-block">Ingresar</button>
            </div><!-- login-wrapper -->
        </div><!-- d-flex -->
    </form>

    <script src="{{ asset('template/lib/jquery/jquery.js')}}"></script>
    <script src="{{ asset('template/lib/popper.js/popper.js')}}"></script>
    <script src="{{ asset('template/lib/bootstrap/bootstrap.js')}}"></script>
    <script>
        $("#formLogin").submit(function(event) {
            $.ajax({
                url: "login",
                data: $(this).serializeArray(),
                type: "POST",
                dataType: 'json',
                success: function(e) {
                    console.log(typeof(e));
                }
            });

        });
    </script>

</body>

</html>