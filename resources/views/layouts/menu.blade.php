<header role="banner">
  <button type="button" style=""
    class="drawer-toggle drawer-hamburger shadow">
    <img class="m-0 img-fluid" src="{{ asset('css/ravioles.svg') }}" alt="">
</button>
  <nav class="drawer-nav" role="navigation" style="background-color:#343838;">
    <ul class="drawer-menu">
      <div class="d-flex align-items-center m-4 justify-content-center">
        <li><img src="{{ asset('media/Logo-negativo.png')}}" class="img-fluid" alt=""></li>
      </div>

      <div class="m-5" style="">

        <li><a class="drawer-menu-item text-white btn m-1 btn-outline-gray" href="{{('Principal') }}"><i
              class="fa fa-home mr-2 "></i>Menú Principal</a></li>
        <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="{{('Perfil') }}"><i
              class="fa fa-user mr-2"></i>Mi perfil</a></li>
        <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="{{('Asistentes') }}"><i
              class="fa fa-users mr-2"></i>Asistentes</a></li>

        <li><a class="drawer-menu-item m-0 border-bottom"></a></li>
        <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="{{('Productos') }}"><i
              class="fa fa-check-square mr-2"></i>Productos</a></li>
        <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="{{('MateriaPrima') }}"><i
              class="fa fa-clipboard mr-2"></i>Materia Prima</a></li>
        <li><a class="drawer-menu-item text-white  btn-outline-gray btn m-1" href="{{('ManoObra') }}"><i
              class="fa fa-users mr-2"></i>Mano de obra</a></li>
        <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="{{('Equipo') }}"><i
              class="fa fa-cogs mr-2"></i>Equipo</a></li>
        <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="{{('CIF') }}"><i
              class="fas fa-coins mr-2"></i>Costos Indirectos (CIF)</a></li>
        <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="{{('Viaticos') }}"><i
              class="fa fa-suitcase mr-2"></i>Viaticos</a></li>

        <li style="border-top: 1px solid #707070;margin-left: -100%;background: #707070;" class="mt-1 mb-1"></li>
        <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="{{('Pedidos') }}"><i
              class="fa fa-pencil-alt mr-2"></i>Costo Unitario</a></li>
        <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="{{('Reportes') }}"><i
              class="fa fa-copy mr-2"></i>Reportes</a></li>

        <li><a class="drawer-menu-item text-white btn btn-danger m-1 mb-5" href="#" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i class="fa fa-sign-out-alt mr-2 "></i>Cerrar Sesion</a>
        </li>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </ul>
  </nav>
</header>
