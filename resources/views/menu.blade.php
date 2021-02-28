<header role="banner">
    <button type="button" style="opacity: 0.8;"
      class="drawer-toggle drawer-hamburger rounded-circle shadow-sm bg-white ml-3 mt-3">
      <span class="sr-only">toggle navigation</span>
      <span class="drawer-hamburger-icon"></span>
    </button>
    <nav class="drawer-nav " role="navigation" style="background-color:#343838;">
      <ul class="drawer-menu ">
        <li class="card bg-white border-0 rounded-0"></li>
        <div class="d-flex align-items-center mt-3 mr-1 ml-1">
          <li><img src="/Grato/resources/media/Logo-negativo.png" class="img-fluid" alt=""></li>
        </div>
        <div class="ml-4" style="padding-top: 1.5rem;">

          <li><a class="drawer-menu-item text-white btn  bg-gray m-1" href="{{('Principal') }}"><i
                class="fa fa-home mr-2 "></i>Menú Principal</a></li>
          <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="{{('Perfil') }}"><i
                class="fa fa-user mr-2"></i>Mi perfil</a></li>

          <li style="border-top: 1px solid #707070;margin-left: -100%;background: #707070;" class="mt-1 mb-1"></li>

          <li><a class="drawer-menu-item text-white  btn-outline-gray btn m-1" href="{{('ManoObra') }}"><i
                class="fa fa-users mr-2"></i>Mano de obra</a></li>
          <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="{{('Equipo') }}"><i
                class="fa fa-cogs mr-2"></i>Equipo</a></li>
          <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="{{('CIF') }}"><i
                class="fas fa-coins mr-2"></i>Costos Indirectos (CIF)</a></li>
          <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="{{('Viaticos') }}"><i
                class="fa fa-suitcase mr-2"></i>Viaticos</a></li>
          <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="{{('MateriaPrima') }}"><i
                class="fa fa-clipboard mr-2"></i>Materia Prima</a></li>
          <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="{{('Recetario') }}"><i
                class="fa fa-utensil-spoon mr-2"></i>Recetario</a></li>
          <li style="border-top: 1px solid #707070;margin-left: -100%;background: #707070;" class="mt-1 mb-1"></li>
          <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="{{('Pedidos') }}"><i
                class="fa fa-pencil-alt mr-2"></i>Pedidos</a></li>
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
  