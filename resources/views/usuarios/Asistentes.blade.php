@extends('plantilla')

@section('titulo', 'Asistentes')

@section('Vista','Asistentes')

@section('Ruta','Asistentes')

@section('Icono','fa fa-users mr-2')

@section('contenido')
@parent

@stop

@section('contenido-3')
@parent

<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <div class="d-flex justify-content-center m-1 row align-items-center">
    <div class="col-sm-6 d-flex align-items-center">
      <h4 class="mt-2 font-weight-bold"><i class="fa fa-users mr-2 "></i>Creación de asistentes</h4>
    </div>
    <div class="col-sm-6 mb-2 d-flex align-items-center justify-content-center">
      <a href="{{route('Principal')}}" class="mt-2 btn btn-block text-dark"><i class="fa fa-arrow-left"></i> Regresar al
        menu</a>
    </div>

    {{-- Creacion de asistentes --}}
    <form style="letter-spacing: 0.4px" class="" id="asistentes" method="POST" action="{{ route('AgregarAsistente') }}">
      @csrf
      <div class=" row m-2 d-flex align-items-center">


        <div class="font-weight-bold col-sm-6 mb-2">
          1.Nombre del operario
        </div>
        <div class="col-sm-6 mb-2">
          <div class="">
            <input name="nombre_operario" type="text" class="form-control" value="{{old('nombre_operario')}}">
          </div>
        </div>
        @error('nombre_operario')
        <div class="col-sm-12 fade show mb-2" role="alert">
          <div class="text-danger">
            <span><i class="fa fa-exclamation mr-2 "></i>{{  $errors->first('nombre_operario')}}</span>
          </div>
        </div>
        @enderror

        <div class="font-weight-bold col-sm-6">
          2.Apellido del operario
        </div>
        <div class="col-sm-6 mb-2">
          <div class="">
            <input name="apellido_usuario" type="text" class="form-control" value="{{old('apellido_usuario')}}">
          </div>
        </div>
        @error('apellido_usuario')
        <div class="col-sm-12 fade show mb-2" role="alert">
          <div class="text-danger">
            <span><i class="fa fa-exclamation mr-2"></i>{{  $errors->first('apellido_usuario')}}</span>
          </div>
        </div>
        @enderror
        <div class="font-weight-bold col-sm-6">
          3.Segundo apellido
        </div>
        <div class="col-sm-6 mb-2">
          <div class="">
            <input name="segundo_apellido_usuario" type="text" class="form-control"
              value="{{old('segundo_apellido_usuario')}}">
          </div>
        </div>
        @error('segundo_apellido_usuario')
        <div class="col-sm-12 fade show mb-2" role="alert">
          <div class="text-danger">
            <span><i class="fa fa-exclamation mr-2 "></i>{{  $errors->first('segundo_apellido_usuario')}}</span>
          </div>
        </div>
        @enderror

        <div class="font-weight-bold col-sm-6 mb-2">
          4.Nombre de usuario

        </div>
        <div class="col-sm-6 mb-2">
          <div class="">
            <input name="nombre_usuario" type="text" class="form-control" value="{{old('nombre_usuario')}}">
          </div>
        </div>
        @error('nombre_usuario')
        <div class="col-sm-12 fade show mb-2" role="alert">
          <div class="text-danger">
            <span><i class="fa fa-exclamation mr-2 "></i>{{  $errors->first('nombre_usuario')}}</span>
          </div>
        </div>
        @enderror
        <div class="font-weight-bold col-sm-6 mb-2">
          5.Correo Electronico
        </div>
        <div class="col-sm-6 mb-2">
          <div class="">
            <input name="correo" type="email" class="form-control" value="{{old('correo')}}">

          </div>
        </div>
        @error('correo')
        <div class="col-sm-12 fade show mb-2" role="alert">
          <div class="text-danger">
            <span><i class="fa fa-exclamation mr-2 "></i>{{  $errors->first('correo')}}</span>
          </div>
        </div>
        @enderror
        <div class="font-weight-bold col-sm-6 mb-2">
          6.Contraseña
        </div>

        <div class="col-sm-6 mb-2 input-group">
          <input type="password" id="txtPassword" class="form-control" name="password" id="password"
            autocomplete="current-password">

          <div class="input-group-append">
            <button id="show_password" class="btn btn-dark" type="button" onclick="mostrarPassword()"> <span
                class="fa fa-eye-slash icon"></span> </button>
          </div>
        </div>
        @error('password')
        <div class="col-sm-12 fade show mb-2" role="alert">
          <div class="text-danger">
            <span><i class="fa fa-exclamation mr-2 "></i>{{  $errors->first('password')}}</span>
          </div>
        </div>
        @enderror
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
          <button type="submit" class="btn btn-block btn-dark mt-2">Agregar asistente</button>
        </div>
      </div>

    </form>
  </div>
</div>

{{-- Buscador por medio del nombre del operario --}}
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <div class="d-flex m-1 row align-items-center">
    <div class="col-sm-6">
      <h5 class="mt-2 font-weight-bold">Lista de asistentes</h5>
    </div>
    <div class="col-sm-6">
      <form action="{{route('Asistentes')}}" method="GET" class="">
        @csrf
        <div class="input-group">
          <input name="busqueda" type="text" value="" class="rounded form-control">
          <div class="input-group-append">
            <button type="submit" class="btn btn-dark"><span class="fa fa-search icon"></span></button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>

@stop

@section('contenido-4')
@parent
@foreach ($t_usuario as $item)
@if ($item->id_usuario != auth()->user()->id_usuario)
<div id="Listado" class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <form action="{{route('ActualizarAsistente',$item->id_usuario)}}" method="POST">
    @csrf
    <div class="d-flex m-1 row align-items-center">
      <div class="col-sm-12 border-bottom mb-2 ">
        <div class="row d-flex align-items-center">
          <div class="col-sm-6">
            <h5 class=" font-weight-normal"><i class="fa fa-user-cog mr-2"></i> {{ $item->nombre_operario }}
              {{ $item->apellido_usuario }}</h5>
          </div>
          <div class="col-sm-6 text-sm-right">
            <h6><i class="fa fa-clock mr-2 mt-2 mb-2"></i>Creado
              {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</h6>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <select class="font-weight-normal form-control" name="rol">
          @if ($item->rol==1)
          <option value="1">Administrador</option>
          <option value="0">Asistente</option>
          @endif
          @if ($item->rol!=1)
          <option value="0">Asistente</option>
          <option value="1">Administrador</option>
          @endif

        </select>
      </div>

      {{-- Actualizar --}}
      <div class="col-sm-3 btn text-danger d-flex justify-content-center">
        <form action="{{ route('EliminarAsistente', $item->id_usuario) }}" method="POST">
          @method('PUT')
          @csrf

          <a data-micromodal-trigger="modal-3{{$item->id_usuario}}"
            class="Eliminar bg-white btn btn-block border-0 text-primary">
            <i class="fa fa-edit mr-2 "></i>Actualizar
          </a>
          <!-- Modal -->
          <div class="modal micromodal-slide" id="modal-3{{$item->id_usuario}}" aria-hidden="true">
            <div class="modal__overlay" tabindex="-1" data-micromodal-close>
              <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                  <div class="">
                    <div class="">
                      <p class="h4 font-weight-bold mb-2 text-primary" id="">
                        <i class="fa fa-edit mr-2 "></i>Actualizar
                      </p>
                    </div>
                  </div>
                  <div class="">
                    <button class="modal__close shadow-sm" aria-label="Close modal" data-micromodal-close></button>
                  </div>
                </header>
                <main class="modal__content" id="modal-1-content">
                  <h6 class="col-12 mt-3">Si usted da aceptar, los cambios se van a aplicar</h6>
                </main>
                <footer class="modal__footer">
                  <button type="submit" class="col-3 modal__btn modal__btn-primary col-3 mr-1">
                    Aceptar
                  </button>
                  <button class="modal__btn col-3" data-micromodal-close
                    aria-label="Close this dialog window ">Cerrar</button>
                </footer>

              </div>
            </div>
          </div>
        </form>
      </div>

  </form>

  {{-- Eliminar --}}
  <div class="col-sm-3 text-danger d-flex justify-content-center">
    <form action="{{ route('EliminarAsistente', $item->id_usuario) }}" method="POST">
      @method('DELETE')
      @csrf

      <a data-micromodal-trigger="modal-2{{$item->id_usuario}}"
        class="Eliminar bg-white btn btn-block border-0 text-danger">
        <i class="fa fa-trash mr-2 "></i>Eliminar
      </a>

      <!-- Modal -->
      <div class="modal micromodal-slide" id="modal-2{{$item->id_usuario}}" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
          <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
            <header class="modal__header">
              <div class="">
                <div class="">
                  <p class="h4 font-weight-bold mb-2 text-danger" id="">
                    <i class="fa fa-trash mr-2 "></i>Eliminar
                  </p>
                </div>
              </div>
              <div class="">
                <button class="modal__close shadow-sm" aria-label="Close modal" data-micromodal-close></button>
              </div>
            </header>
            <main class="modal__content" id="modal-1-content">
              <h6 class="col-12 mt-3">Si usted da aceptar, los cambios se van a aplicar</h6>
            </main>
            <footer class="modal__footer">
              <button type="submit" class="col-3 modal__btn modal__btn-primary col-3 mr-1">
                Aceptar
              </button>
              <button class="modal__btn col-3" data-micromodal-close
                aria-label="Close this dialog window ">Cerrar</button>
            </footer>

          </div>
        </div>
      </div>
    </form>
  </div>

</div>
</div>
@endif
@endforeach
<div class="m-2 d-flex justify-content-center text-dark">
  {{ $t_usuario->render() }}
</div>
<script>
  window.onload=function(){
  var pos=window.name || 0;
  window.scrollTo(0,pos);
  }
  window.onunload=function(){
  window.name=self.pageYOffset || (document.documentElement.scrollTop+document.body.scrollTop);
  }
</script>
<script>
  function mostrarPassword(){
		var cambio = document.getElementById("txtPassword");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	}
</script>
<script>
  MicroModal.init();
  var button = document.querySelector('.Actualizar');
    button.addEventListener('click', function () {
        MicroModal.show('modal-1');
    });
  var button = document.querySelector('.Eliminar');
    button.addEventListener('click', function () {
        MicroModal.show('modal-2');
    });
    var button = document.querySelector('.Actualizar');
    button.addEventListener('click', function () {
        MicroModal.show('modal-3');
    });
</script>

@stop