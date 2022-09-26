<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>ContBook</title>

    <!-- vendor css -->
    <link href="{{ asset('resources/template/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{ asset('resources/template/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('resources/template/css/bracket.css')}}">
    <!-- norific8 -->

    <link rel="stylesheet" href="{{ asset('resources/template/lib2/notific8/src/css/jquery.notific8.css')}}" media="screen">
</head>

<body>
    <form id="formLogin">
        {{ csrf_field()}}

        <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

            <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
                <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> ContBook <span class="tx-normal">]</span></div>
                <div class="tx-center mg-b-60">Sistema Contable Comercial</div>

                <div class="form-group">
                    <input type="text" class="form-control" name="usu_cod" placeholder="Codigo de Usuario" required autocomplete="off">
                </div><!-- form-group -->
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                    <a href="" class="tx-info tx-12 d-block mg-t-10">Olvido la contraseña?</a>
                </div><!-- form-group -->
                <button type="submit" class="btn btn-info btn-block">Ingresar</button>
            </div><!-- login-wrapper -->
        </div><!-- d-flex -->
    </form>

    <script src="{{ asset('resources/template/lib/jquery/jquery.js')}}"></script>
    <script src="{{ asset('resources/template/lib/popper.js/popper.js')}}"></script>
    <script src="{{ asset('resources/template/lib/bootstrap/bootstrap.js')}}"></script>
    <!-- notific8 -->
    <script src="{{ asset('resources/template/lib2/notific8/dist/jquery.notific8.min.js')}}"></script>
    <script>
        $("#formLogin").submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: "log1",
                data: $(this).serializeArray(),
                type: "POST",
                // dataType: 'json',
                success: function(e) {
                    console.log(e);
                    if (e == 'success') {
                        let navegador = navigator.userAgent;
                        if (
                            navigator.userAgent.match(/Android/i) ||
                            navigator.userAgent.match(/webOS/i) ||
                            navigator.userAgent.match(/iPhone/i) ||
                            navigator.userAgent.match(/iPad/i) ||
                            navigator.userAgent.match(/iPod/i) ||
                            navigator.userAgent.match(/BlackBerry/i) ||
                            navigator.userAgent.match(/Windows Phone/i)
                        ) {
                            window.location.href = 'ContApp';
                            return
                        }
                        window.location.href = 'index';

                    } else if (e == 0) {
                        $.notific8('Usuario no registrado.', {
                            life: 3000,
                            heading: 'Advertencia.',
                            icon: 'info-circled',
                            theme: 'mustard',
                            family: 'atomic',
                            // sticky: true,
                            horizontalEdge: 'top',
                            // horizontalEdge: 'bottom',
                            verticalEdge: 'rigth',
                            zindex: 1500,
                        })
                    } else if (e == 1) {
                        $.notific8('Contraseña incorrecta.', {
                            life: 3000,
                            heading: 'Advertencia.',
                            icon: 'info-circled',
                            theme: 'tomato',
                            family: 'atomic',
                            // sticky: true,
                            horizontalEdge: 'top',
                            // horizontalEdge: 'bottom',
                            verticalEdge: 'rigth',
                            zindex: 1500,
                        })
                    }

                }
            }).fail();

        });
    </script>

</body>

</html>