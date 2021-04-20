{{-- Extencion de plantilla --}}
@extends('plantilla')

{{-- Se llama a la variables yield para otorgarle un valor --}}
@section('titulo', 'Perfil')
@section('Vista','Perfil')
@section('Ruta','Perfil')
@section('Icono','fa fa-user mr-2')

{{-- Datos personales y edicion de datos --}}
@section('contenido')
@parent
{{-- Formulario de informacion del usuario --}}
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
   <div class="d-flex m-1 row align-items-center">
      <div class="col-sm-6 text-sm-left text-center">
         <h4 class="font-weight-bold" style="letter-spacing: 1.1px"><i class="fa fa-user mr-1"></i>Perfil</h4>
         <h6 class="m-0 text-gray">Mis datos personales</h6>
      </div>
      <div class="col-sm-6 d-flex align-items-center justify-content-center">
         <a href="{{route('Principal')}}" class="mt-2 btn btn-block text-dark"><i class="fa fa-arrow-left"></i> Regresar al
            menu</a>
      </div>
   </div>
   <div class="">
      <form id="Crear" action="{{ route('actualizar', auth()->user()->id_usuario) }}" method="post">
         @csrf
         @method('PUT')
         @if(Session::has('message'))
         <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                  aria-hidden="true">&times;</span></button>
            {{Session::get('message')}}
         </div>
         @endif
         <div class="row rounded mt-1 m-0 d-flex align-items-center">
            <div class="p-3 font-weight-bold col-sm-6">
               Primer Nombre del operario(a)
            </div>
            <div class="col-sm-6">
               <input type="text" class="form-control" name="nombre_operario"
                  value="{{ auth()->user()->nombre_operario }}" />
            </div>
            @error('nombre_operario')
            <div class="col-sm-12 fade show" role="alert">
               <div class="text-danger">
                  <span><i class="fa fa-exclamation mr-1"></i> {{  $errors->first('nombre_operario')}}</span>
               </div>
            </div>
            @enderror

            <div class="p-3 font-weight-bold col-sm-6">
               Primer apellido
            </div>
            <div class="col-sm-6">
               <input type="text" class="form-control" name="apellido_usuario"
                  value="{{ auth()->user()->apellido_usuario }}" />
            </div>
            @error('apellido_usuario')
            <div class="col-sm-12 fade show" role="alert">
               <div class="text-danger">
                  <span><i class="fa fa-exclamation mr-1"></i>{{  $errors->first('apellido_usuario')}}</span>
               </div>
            </div>
            @enderror

            <div class="p-3 font-weight-bold col-sm-6">
               Segundo apellido
            </div>
            <div class="col-sm-6">
               <input type="text" class="form-control" name="segundo_apellido_usuario"
                  value="{{ auth()->user()->segundo_apellido_usuario }}" />
            </div>
            @error('segundo_apellido_usuario')
            <div class="col-sm-12 fade show" role="alert">
               <div class="text-danger">
                  <span><i class="fa fa-exclamation mr-1"></i>{{  $errors->first('segundo_apellido_usuario')}}</span>
               </div>
            </div>
            @enderror

            <div class="p-3 font-weight-bold col-sm-6">
               Modo acceso
            </div>
            <div class="col-sm-6">
               <input readonly type="text" class="form-control" name="" id="nombre_usuario" @if(auth()->user()->rol== 1) value="Administrador" @else  value="Asistente"  @endif />
            </div>
            <div class="col-sm-6">

            </div>
            <div class="col-sm-6 mt-2">
               <a class="Personal mt-2 btn btn-dark btn-block rounded text-white">
                  Editar mis datos
               </a>
            </div>
         </div>

         {{-- Mensaje modal --}}
         <div class="modal micromodal-slide" id="modal-5" aria-hidden="true">
            <div class="modal__overlay" tabindex="-1" data-micromodal-close>
               <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                  <header class="modal__header">
                     <div class="">
                        <div class="">
                           <p class="h4 font-weight-normal mb-2" id="modal-1-title">
                              ¿Desea guardar estos cambios?
                           </p>
                        </div>
                     </div>
                     <div class="">
                        <button class="modal__close shadow-sm" aria-label="Close modal" data-micromodal-close></button>
                     </div>
                  </header>
                  <main class="modal__content row" id="modal-1-content">
                     <div class="col-sm-11 mt-2">
                        <h5 class="m-0">
                           Todos lo cambios realizados seran guardados si selecciona aceptar
                        </h5>
                     </div>

                  </main>
                  <footer class="">
                     <button type="submit" class="modal__btn modal__btn-primary col-3 mr-1">Aceptar</button>
                     <button class="modal__btn col-3" data-micromodal-close
                        aria-label="Close this dialog window ">Cerrar</button>
                  </footer>
               </div>
            </div>
         </div>

         <div class="row rounded mt-2 m-0 d-flex align-items-center">
         </div>
      </form>
   </div>
</div>

@stop

{{-- ver y actualizar correo electronico --}}
@section('contenido-2')
@parent
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
   <form action="{{ route('actualizar_correo', auth()->user()->id_usuario) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="m-2 row d-flex align-items-center justify-content-center">
         <div class="col-sm-12">
            <h5 class="font-weight-bold"><i class="fa fa-envelope mr-2"></i>Mi correo electr&oacute;nico</h5>
         </div>

         <div class="col-sm-6 mt-2">
            <input name="correo" id="correo" type="text" class="form-control m-0" value="{{ auth()->user()->email }}" />
         </div>
         <div class="col-sm-6 mt-2">
            <a class="btn-block text-primary btn btn-block" data-micromodal-trigger="modal-4">
               <i class="fa fa-edit mr-2"></i>
               Actualizar
               informaci&oacute;n</a>
         </div>
         @error('correo')
         <div class="col-sm-12 fade show" role="alert">
            <div class="text-danger m-1">
               <span><i class="fa fa-exclamation mr-2"></i>{{  $errors->first('correo')}}</span>
            </div>
         </div>
         @enderror
      </div>

      {{-- Mensaje modal --}}
      <div class="modal micromodal-slide" id="modal-4" aria-hidden="true">
         <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
               <header class="modal__header">
                  <div class="">
                     <div class="">
                        <p class="h4 font-weight-normal mb-2" id="modal-1-title">
                           ¿Desea guardar estos cambios?
                        </p>
                     </div>
                  </div>
                  <div class="">
                     <button class="modal__close shadow-sm" aria-label="Close modal" data-micromodal-close></button>
                  </div>
               </header>
               <main class="modal__content row" id="modal-1-content">
                  <div class="col-sm-11 mt-2">
                     <h5 class="m-0">
                        Todos lo cambios realizados seran guardados si selecciona aceptar
                     </h5>
                  </div>

               </main>
               <footer class="">
                  <button type="submit" class="modal__btn modal__btn-primary col-3 mr-1">Aceptar</button>
                  <button class="modal__btn col-3" data-micromodal-close
                     aria-label="Close this dialog window ">Cerrar</button>
               </footer>
            </div>
         </div>
      </div>
   </form>
</div>
@stop

{{-- Ver y actualizar nombre de usuario--}}
@section('contenido-3')
@parent
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
   <form action="{{ route('actualizar_usuario', auth()->user()->id_usuario) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="row d-flex m-2 align-items-center justify-content-center">
         <div class="col-sm-12">
            <h5 class="font-weight-bold"><i class="fa fa-user-cog mr-2"></i>Mi nombre de usuario</h5>
         </div>
         <div class="col-sm-6 mt-2">
            <input name="nombre_usuario" id="correo" type="text" class="form-control m-0"
               value="{{ auth()->user()->nombre_usuario }}" />
         </div>
         {{-- Llamar al modal --}}
         <div class="col-sm-6 mt-2">
            <a href="#nombre_usuario" class=" btn-block btn" data-micromodal-trigger="modal-3">
               <i class="fa fa-edit mr-2"></i>
               Actualizar informaci&oacute;n</a>
         </div>
         {{-- Mensaje de validacion: Nombre de usuario --}}
         @error('nombre_usuario')
         <div class="col-sm-12 fade show m-1" role="alert">
            <div class="text-danger m-1">
               <span><i class="fa fa-exclamation mr-2"></i>{{  $errors->first('nombre_usuario')}}</span>
            </div>
         </div>
         @enderror

      </div>
      {{-- Mensaje modal --}}
      <div class="modal micromodal-slide" id="modal-3" aria-hidden="true">
         <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
               <header class="modal__header">
                  <div class="">
                     <div class="">
                        <p class="h4 font-weight-normal mb-2" id="modal-1-title">
                           ¿Desea guardar estos cambios?
                        </p>
                     </div>
                  </div>
                  <div class="">
                     <button class="modal__close shadow-sm" aria-label="Close modal" data-micromodal-close></button>
                  </div>
               </header>
               <main class="modal__content row" id="modal-1-content">
                  <div class="col-sm-11 mt-2">
                     <h5 class="m-0">
                        Todos lo cambios realizados seran guardados si selecciona aceptar
                     </h5>
                  </div>

               </main>
               <footer class="">
                  <button type="submit" class="modal__btn modal__btn-primary col-3 mr-1">Aceptar</button>
                  <button class="modal__btn col-3" data-micromodal-close
                     aria-label="Close this dialog window ">Cerrar</button>
               </footer>
            </div>
         </div>
      </div>
   </form>
</div>

<script>
   $(document).ready(function () {$('.drawer').drawer();});
      MicroModal.init({
          onShow: modal => console.info(`${modal.id} is shown`), // [1]
          onClose: modal => console.info(`${modal.id} is hidden`), // [2]
      });

      var button = document.querySelector('.Personal');
      button.addEventListener('click', function () {
          MicroModal.show('modal-5');
      });
      var button = document.querySelector('.Usuario');
      button.addEventListener('click', function () {
          MicroModal.show('modal-5');
      });
</script>

<script>
   window.onload=function(){
   var pos=window.name || 0;
   window.scrollTo(0,pos);
   }
   window.onunload=function(){
   window.name=self.pageYOffset || (document.documentElement.scrollTop+document.body.scrollTop);
   }
</script>
@stop
