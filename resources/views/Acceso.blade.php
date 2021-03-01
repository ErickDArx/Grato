<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso</title>
    {!! htmlScriptTagJsApi([
        'action' => 'homepage',
        'callback_then' => 'callbackThen',
        'callback_catch' => 'callbackCatch'
    ]) !!}
        {{-- Favicon --}}
        <link rel="icon" type="image/png" href="././css/acceso.jpg" />
        {{-- Meta-SEO --}}
        <meta name="description" content="Acceso al Sistema Informático Grato Pastas Artesanales">
        <meta name="robots" value="Noindex">
        <meta name="keywords" content="Acceso">
        <meta name="theme-color" content="#E23636">
        {{-- Fuente de iconos --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
        <!-- Jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
        <!-- Libreria Menú -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css">
    
        {{-- Estilos --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.4/chartist.min.css" integrity="sha512-V0+DPzYyLzIiMiWCg3nNdY+NyIiK9bED/T1xNBj08CaIUyK3sXRpB26OUCIzujMevxY9TRJFHQIxTwgzb0jVLg==" crossorigin="anonymous" />
    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css">
        <link rel="stylesheet" href="././css/app.css">  
        {{-- Javascript --}}
    
      <!-- jquery & iScroll -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js"></script>
      <!-- drawer.js -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/lax.js"></script>
      <script>
        
        $(document).ready(function () {
          $('.drawer').drawer();
          $('.js-tilt').tilt({
            option: value,
            option: value,
          });
        });
      </script>
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