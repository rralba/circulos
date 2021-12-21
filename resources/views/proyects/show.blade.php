@extends('layouts.app')

@section('content')
    <div class="d-flex" id="wrapper" >
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="list-group list-group-flush">
                    <a href="{{ url('/home') }}" class="list-group-item list-group-item-action bg-light">Inicio</a>
                @can('integrants.edit')
                @if ($proyect->comite == 0 && $proyect->proy_status == 1)
                    <a href="   {{ route('proyects.editinteg', $proyect->id) }}" class="list-group-item list-group-item-action bg-light">Editar integrantes</a>
                @else
                    <a href="#" class="list-group-item list-group-item-action bg-light disabled">Editar integrantes</a>   
                @endif        
                @endcan
                @can('beneficios.index')
                    <a href="{{ route('beneficios.index', $proyect->id) }}" class="list-group-item list-group-item-action bg-light">Beneficios</a>
                @endcan
                @can('reconocimientos.index')
                    <a href="{{ route('reconocimientos.index', $proyect->id) }}" class="list-group-item list-group-item-action bg-light">reconocimientos</a>
                @endcan
                @can('proceso.index')
                    <a href="{{ route('procesos.index') }}" class="list-group-item list-group-item-action bg-light">Proceso de Pago</a>
                @endcan
                    <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="">   
                <h1 align="center">{{ $proyect->proyecto }}</h1>  
                <br>
            <div class="card">
                <div class="card-group">
                    <div class="card">
                        <h5>
                        <a>Fecha de Registro</a>
                        <small class="text-muted">{{ \carbon\carbon::parse($proyect->fecha_reg)->format('M-Y') }}</small>
                        </h5>
                    </div>
                    <div class="card">
                        <h5>
                        <a>Nivel del Proyecto</a>
                        <small class="text-muted">{{ $proyect->nivel }}</small>
                        </h5>
                    </div>
                    <div class="card">
                        <h5>
                        <a>Asesor Asignado</a>
                        <small class="text-muted">{{ $proyect->asesor }}</small>
                        </h5>
                    </div>
                </div>
                <div class="card-group">
                    <div class="card">    
                        <h5>
                        <a>Fecha de Inicio del Proyecto</a>
                        <small class="text-muted">{{ \carbon\carbon::parse($proyect->fecha_ini)->format('M-Y') }}</small>
                        </h5>
                    </div>
                    <div class="card">
                        <h5>
                        <a>Fecha Fin del Proyecto</a>
                        <small class="text-muted">{{ \carbon\carbon::parse($proyect->fecha_fin)->format('M-Y') }}</small>
                        </h5>
                    </div>
                    <div class="card">
                        <h5>
                        <a>Comite Evaluador</a>
                        <small class="text-muted">{{ $proyect->comite }}</small>
                        </h5>
                    </div>
                </div>
                <div class="card-group">
                    <div class="card"> 
                        <h5>
                        <a>Valor Corporativo</a>
                        <small class="text-muted">{{ $proyect->valor }}</small>
                        </h5>
                    </div>
                    <div class="card">
                        <h5>
                        <a>Metodologia Aplicada</a>
                        <small class="text-muted">{{ $proyect->metodologia }}</small>
                        </h5>
                    </div>
                    <div class="card">
                        <h5>
                        <a>Ahorro Anual Proyectado</a>
                        <small class="text-muted">{{ sprintf('$ %s', number_format($proyect->ahorro_anual_proy,0, '.', ',')) }}</small>
                        </h5>
                    </div>
                </div>
            </div>
            </div>
                <br>
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Integrantes</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                </div>
            </nav>
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
                                    <th data-column-id="nivel">Nivel</th>
                                    <th data-column-id="rol">Rol</th>
                                    <th data-column-id="direccion">Direccion</th>
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
                                    <td>{{ $integrante->nivel }}</td>
                                    <td>{{ $integrante->pivot->rol }}</td> 
                                    <td>{{ $integrante->direccion }}</td>
                                    <td>{{ $integrante->cia }}</td> 
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
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