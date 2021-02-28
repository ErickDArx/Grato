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
                        <img src="/Grato/resources/media/Logo.png"
                            alt="Logo Sistema Informático Grato Pastas Artesanales"
                            style="width: 10rem;margin-bottom: 2rem;margin-top: 2rem;"
                            class="img-fluid position-relative">

                    </div>


                    <div>
                        <form class="col-10 container card-body shadow bg-light "
                            style="width: 26rem;margin-bottom: 3rem;border-radius: 1rem;" method="POST"
                            action="{{ route('login') }}">
                            @csrf
                            <div class="text-center">
                                <div class="form-group text-center">
                                    <h3 class="mt-2 font-weight-bold">Ingreso al sistema</h3>
                                </div>
                                
                                
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <div class="text-danger">
                                            @foreach ($errors->all() as $error)
                                                <span>{{$error}}</span>
                                            @endforeach
                                        </div>
                                    </div>

                                @endif
                                <div class="form-group text-left">
                                    <label>Usuario</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="nombre_usuario" value="{{ old('email') }}" id="nombre_usuario"
                                        aria-describedby="emailHelp" autofocus required>
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group text-left">
                                    <label>Contraseña</label>
                                    <input type="password"
                                        class="form-control @error('password') is-invalid @enderror" 
                                        name="password" 
                                        id="password"
                                        required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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