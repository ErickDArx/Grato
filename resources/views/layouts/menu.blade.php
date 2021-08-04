<header role="banner">

  <nav class="drawer-nav slider-menu" role="navigation" style="overflow: auto;">
    <ul class="drawer-menu">
      <div class="d-flex align-items-end m-4">
        <li><img src="{{ asset('media/Logo-negativo.png')}}" class="img-fluid" alt=""></li>
      </div>

      <div class="ml-4 mr-4" style="">
        <li class="">
          <a class="drawer-menu-item text-white btn m-1 btn-outline-gray" href="{{route('Principal') }}"><i
              class="fa fa-home mr-2 "></i>Men&uacute; Principal</a>
        </li>

        <li>
          <a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="{{route('Perfil') }}"><i
              class="fa fa-user mr-2"></i>Mi perfil</a></li>
        @if ( auth()->user()->rol == 1)
        <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="{{ route('Asistentes') }}"><i
              class="fa fa-users mr-2"></i>Asistentes</a></li>
        @endif
        @if ( auth()->user()->rol == 1)
        <li>
          <a class="drawer-menu-item btn btn-outline-gray-2 m-1" data-toggle="collapse" href="#menu" role="button"
            aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-border-all mr-2"></i>M&oacute;dulos
          </a>
        </li>

        <div class="drawer-menu-item collapse" id="menu">
          <div>

            <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="{{route('Productos') }}"><i
                  class="fa fa-check-square mr-2"></i>Productos</a>
            </li>
            <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="{{route('materia') }}"><i
                  class="fa fa-clipboard mr-2"></i>Materia
                Prima</a>
            </li>
            <li><a class="drawer-menu-item text-white  btn-outline-gray btn m-1" href="{{route('ManoObra') }}"><i
                  class="fa fa-users mr-2"></i>Mano de obra</a></li>
            <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="{{route('Equipo') }}"><i
                  class="fa fa-cogs mr-2"></i>Equipo</a></li>
            <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="{{route('CIF') }}"><i
                  class="fas fa-coins mr-2 text-break"></i>Costos
                Indirectos (CIF)</a></li>
            <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="{{route('Viaticos') }}"><i
                  class="fa fa-suitcase mr-2"></i>Vi&aacute;ticos</a></li>

          </div>

        </div>
        @endif


        <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="{{route('Pedidos') }}"><i
              class="fa fa-pencil-alt mr-2"></i>Costo
            Unitario</a></li>

        <li><a class="drawer-menu-item text-white btn btn-danger m-1 mb-5" href="#" style=""
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
              class="fa fa-sign-out-alt mr-2"></i>Cerrar Sesi&oacute;n</a>
        </li>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </ul>
  </nav>
</header>