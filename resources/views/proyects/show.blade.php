@extends('layouts.app')

@section('content')
    <div class="d-flex" id="wrapper" >
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="list-group list-group-flush">
                    <a href="{{ url('/home') }}" class="list-group-item list-group-item-action bg-light">Inicio</a>
                @can('beneficios.index')
                    <a href="{{ route('beneficios.index', $proyect->id) }}" class="list-group-item list-group-item-action bg-light">Beneficios</a>
                @endcan
                @can('reconocimientos.index')
                    <a href="{{ route('reconocimientos.index', $proyect->id) }}" class="list-group-item list-group-item-action bg-light">reconocimientos</a>
                @endcan
                @can('proceso.index')
                    <a href="{{ route('procesos.index') }}" class="list-group-item list-group-item-action bg-light">Proceso de Pago</a>
                @endcan
            </div>
        </div>
        <div class="container-fluid m-4">
            <span class="contact100-form-title">
      <h1 class="text-center">{{ $proyect->proyecto }}</h1>
    </span>
        <div class="row">
          <div class="form-group col-md-5"></div>
          <div class="form-group col-md-5"></div>
            <div class="form-group row col-md-2 justify-content-end">
                <label for="inputEmail4"><h6 class="mt-2">Folio</h6></label>
                <input type="text" class="form-control ml-3" style="width: 25%;"  id="id" name="id" value="{{ $proyect->id }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-9"></div>
            <div class="form-group col-md-1">
                <label for="inputEmail4"><h6>Registro</h6></label>
                <input type="text" class="form-control" value="{{ $proyect->fecha_reg }}" readonly>
            </div>
            <div class="form-group col-md-1">
                <label for="inputEmail4"><h6>Fecha Inicio</h6></label>
                <input type="text" class="form-control" value="{{ $proyect->fecha_ini }}" readonly>
            </div>
            <div class="form-group col-md-1">
                <label for="inputPassword4"><h6>Fecha Fin</h6></label>
                <input type="text" class="form-control" value="{{ $proyect->fecha_fin }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-8"></div>
            <div class="form-group col-md-4">
                <label for="inputEmail4"><h6>Departamento</h6></label>
                <input type="text" class="form-control" value="{{ $proyect->depto }}" readonly>
        </div>
        </div>
        <div class="row">
        <div class="form-group col-md-3"></div>
        <div class="form-group col-md-2">
            <label for="inputPassword4"><h6>Asesor</h6></label>
            <input type="text" class="form-control" value="{{ $proyect->asesor }}" readonly>
        </div>
        <div class="form-group col-md-2">
            <label for="inputEmail4"><h6>Estatus</h6></label>
            @if(($proyect->proy_status) == 0)
                    <input type="text" class="form-control" value="CANCELADO" readonly>
                @endif
                @if(($proyect->proy_status) == 1)
                    <input type="text" class="form-control" value="EN PROCESO" readonly>
                @endif
                @if(($proyect->proy_status) == 2)
                   <input type="text" class="form-control" value="TERMINADO" readonly>
                @endif
                @if(($proyect->proy_status) == 3)
                   <input type="text" class="form-control" value="TERMINADO EN PROCESO DE PAGO" readonly>
                @endif
        </div>
        <div class="form-group col-md-1">
            <label for="inputEmail4"><h6>Nivel</h6></label>
            <input type="text" class="form-control"value="{{ $proyect->nivel }}" readonly>
        </div>
        <div class="form-group col-md-1">
            <label for="inputEmail4"><h6>Comite</h6></label>
            <input type="text" class="form-control" value="{{ $proyect->comite }}" readonly>
        </div>
        <div class="form-group col-md-1">
            <label for="inputEmail4"><h6>Avance</h6></label>
            <input type="text" class="form-control" value="{{ $proyect->avance }}" readonly>
        </div>
        <div class="form-group col-md-2">
            <label for="inputEmail4"><h6>Etapa</h6></label>
            <input type="text" class="form-control" value="{{ $proyect->etapa }}" readonly>
        </div>
      </div>
        <div class="row" id="valor">
            <div class="col-md-2"></div>
            <div class=" form-group col-md-3">  
                <label for="inputEmail4"><h6>Valor Corporativo:</h6></label>
                <input type="text" class="form-control" value="{{ $proyect->valor }}" readonly>
            </div>
            <div class=" form-group col-md-3">  
                <label for="inputEmail4"><h6>Metodologia del Proyecto:</h6></label>
                <input type="text" class="form-control" value="{{ $proyect->metodologia }}" readonly>
            </div>
            <div class="form-group col-md-2">
                <label for="inputEmail4"><h6>Empresa</h6></label>
                <input type="text" class="form-control" value="{{ $proyect->empresa }}" readonly>
            </div>
            <div class="form-group col-md-2">
                <label for="inputEmail4"><h6>Ahorro Anual Proyectado</h6></label>
                <input type="text" class="form-control" value="{{ sprintf('$ %s', number_format($proyect->ahorro_anual_proy,0, '.', ',')) }}" readonly>
            </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>Metrico Primario</h6></label>
            <input type="text" class="form-control tomayus" maxlength="249" value="{{ $proyect->metrico_primario }}" readonly>
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>Metrico secundario</h6></label>
            <input type="text" class="form-control tomayus" maxlength="249" value="{{ $proyect->metrico_secundario }}" readonly>
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>¿Porqué consideras que el proyecto es creativo y/o innovador?</h6></label>
            <textarea type="text" class="form-control tomayus" maxlength="499" rows="4" readonly>{{ $proyect->creativo }}</textarea>
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>¿Qué áreas deben participar en el desarrollo del proyecto?</h6></label>
            <input type="text" class="form-control tomayus" maxlength="249" value="{{ $proyect->areas_part }}" readonly>
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>¿Qué conocimientos, especialidades y/o habilidades se requieren de los integrantes?</h6></label>
            <input type="text" class="form-control tomayus" maxlength="249" value="{{ $proyect->skills_integ }}" readonly>
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>¿Cuáles son las principales actividades a realizar por el equipo?</h6></label>
            <input type="text" class="form-control tomayus" maxlength="249" value="{{ $proyect->principales_act }}" readonly>
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>¿Cuál es el conocimiento crítico requerido para el desarrollo del proyecto?</h6></label>
            <input type="text" class="form-control tomayus" maxlength="249" value="{{ $proyect->conocimiento_critico }}" readonly>
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>¿Cómo participa el personal sindicalizado?</h6></label>
            <input type="text" class="form-control tomayus" maxlength="249" value="{{ $proyect->sindicalizados }}" readonly>
          </div> 
        </div>
                <br>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="col-md-12">  
                        <div class="table-responsive">
                        <table id="grid-basic" class="w3-table-all w3-card-4" style="width:100%">
                            <thead>
                                <tr>
                                    <th data-column-id="id">Id</th>
                                    <th data-column-id="nombre">Nombre</th>
                                    <th data-column-id="departamento">Departamento</th>
                                    <th data-column-id="posicion">Posicion</th>
                                    <th data-column-id="rol">Rol</th>
                                    <th data-column-id="compañia">Compañia</th>
                                </tr>
                            </thead>
                        <tbody>  
                            @foreach($proyect->empleados as $integrante)
                                @if(($integrante->nivel) == 1)
                                <tr>
                                    <td>{{ $integrante->id }}</td>
                                    <td>{{ $integrante->nombre }}</td>
                                    <td>{{ $integrante->depto }}</td>
                                    <td>{{ $integrante->posicion }}</td>
                                    @if(($integrante->pivot->rol)== 1)
                                        <td>Autor</td>
                                    @endif
                                    @if(($integrante->pivot->rol)== 2)
                                        <td>Implementador A</td>
                                    @endif 
                                    @if(($integrante->pivot->rol)== 3)
                                        <td>Implementador B</td>
                                    @endif 
                                    @if(($integrante->cia)== 1000)
                                        <td>SIDERURGICA 1</td>
                                    @endif
                                    @if(($integrante->cia)== 2000)
                                        <td>SIDERURGICA 2</td>
                                    @endif
                                    @if(($integrante->cia)> 7999)
                                        <td>AHMSA</td>
                                    @endif
                                    @if((($integrante->cia)>2999) and ($integrante->cia)<8000)
                                        <td>FORJACERO</td>
                                    @endif
                                    @if((($integrante->cia)<1000))
                                        <td>SERVICIOS MONCLOVA</td>
                                    @endif 
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <script>
        $( document ).ready(function(){
            $("#grid-basic").bootgrid({
              }).on("loaded.rs.jquery.bootgrid", function (){
                /* Executes after data is loaded and rendered */
                $(this).find(".edit").click(function (e) {
                  $($(this).attr("data-target")).modal("show");
                  $('#pin').val($(this).data("id"));
                  $('#proy_id').val($(this).data("nombre")); 
                  $('#lname').val($(this).data("departamento"));
                  $('#gender').val($(this).data("posicion"));
                  $('#email').val($(this).data("nivel"));
                  $('#country').val($(this).data("rol"));
                  $('#salary').val($(this).data("direccion"));
                  $('#cia').val($(this).data("compañia"));
                });
              });
            });
            
    </script>
@endsection    