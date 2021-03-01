<div class="col-md-4">
  <div class="card shadow" style="border-radius: 0.5rem;">
    <div class="card-body text-center">

      <h4>{{date('h:i a')}}</h4>

      <p class="text-gray">{{date('d')}} de {{date('M')}} del {{date('Y')}}</p>

      <h5 class="text-center mb-3 text-oscuro">Acciones Rápidas</h5>
      <div class=" mt-2">
        <a class="shadow-sm btn btn-block btn-outline-dark border-0" href="Pedidos.html">
          <div class="row ">
            <p class="m-0 col-8 text-left"><i class="fa fa-plus mr-2"></i> Alistar pedido</p>
            <p class="m-0 col-4 text-right text-danger material-icons">
              navigate_next
            </p>
          </div>
        </a>
      </div>
      <div class=" mt-2">
        <a class="shadow-sm btn btn-block btn-outline-dark border-0" href="Reportes.html">
          <div class="row ">
            <p class="m-0 col-8 text-left"><i class="fa fa-eye mr-2"></i>Ver los pedidos hechos</p>
            <p class="m-0 col-4 text-right text-danger material-icons">
              navigate_next
            </p>
          </div>
        </a>
      </div>
      <div class=" mt-2">
        <a class="shadow-sm btn btn-block btn-outline-dark border-0" href="MateriaPrima.html">
          <div class="row">
            <p class="m-0 col-8 text-left"><i class="fa fa-clipboard-list mr-2"></i>Ingresar materia prima</p>
            <p class="m-0 col-4 text-right text-danger material-icons">
              navigate_next
            </p>
          </div>
        </a>
      </div>
      <div class=" mt-2">
        <a class="shadow-sm btn btn-block btn-outline-dark border-0" href="Equipo.html">
          <div class="row ">
            <p class="m-0 col-8 text-left"><i class="fa fa-cog mr-2"></i>Ingresar nuevo equipo</p>
            <p class="m-0 col-4 text-right text-danger material-icons">
              navigate_next
            </p>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>

<div class="col-md-12 mt-2 mb-3">
  <div class="card shadow" style="border-radius: 0.5rem;">
    <div class="card-body text-center text-oscuro">
      Copyright © {{ date('Y') }} Grato Pastas Artesanales
    </div>
  </div>
</div>