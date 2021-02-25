<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso</title>
    @extends('enlaces')

</head>

<body class="">

    <header class="slider-hero">
        <section class="">
            <div class="">
                <div class="">

                    <div class="text-center">
                        <img src="/Grato/resources/media/Logo.png" alt="Logo Sistema Informático Grato Pastas Artesanales"
                            style="width: 10rem;margin-bottom: 2rem;margin-top: 2rem;"
                            class="img-fluid position-relative">

                    </div>


                    <div>
                        <form class="col-10 container card-body shadow bg-light"
                            style="width: 26rem;margin-bottom: 3rem;border-radius: 1rem;" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="text-center">
                                <div class="form-group text-center">
                                    <h3 class="mt-2 font-weight-bold">Ingreso al sistema</h3>
                                </div>
                                <div class="form-group text-left">
                                    <label for="exampleInputEmail1">Usuario o Correo Electrónico</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" required autocomplete="email" autofocus>
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group text-left">
                                    <label for="exampleInputPassword1">Contraseña</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"  name="password" required autocomplete="current-password" id="exampleInputPassword1">
                                </div>
                                <div class="form-group form-check text-left">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Mantener la sesión
                                        activa</label>
                                </div>
                                <button type="submit" 
                                class="btn btn-red shadow btn-block border-0 mb-2">Acceder</button>

                                <a href="submit" class="btn btn-outline-gray btn-block">Olvide mi contraseña</a>
                            </div>

                        </form>

                    </div>

                </div>
            </div>

        </section>
    </header>


    <script>
        $(window).on("load", function () {
            document.querySelector(".pre-loader");
        });
    </script>

</body>

</html>