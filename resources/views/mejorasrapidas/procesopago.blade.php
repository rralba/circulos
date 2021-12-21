@extends('layouts.appm')

@section('content')
<div class="container-fluid">
<br>
<h1 class="text-center">Circulos de Eficiencia Nivel 3 en Proceso de Pago</h1>
<hr>
<a  href="{{ route('mejoras.procesopago') }}" class="btn btn-outline-primary btn-lg float-right fa fa-usd" title="Ejecutar Proceso de Pago">  Ejecutar Proceso</a>
<button type="button" class="btn btn-outline-primary btn-lg float-right fa fa-usd mr-3" data-toggle="modal" data-target="#addbenef" title="Reporte de Pago">  Reporte de Pago</button>
<br>
<br>   
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr style="background-color: #026DE2; color: #ffffff;">
                    <th class="text-center">ID</th>
                    <th class="text-center">REGISTRO</th>
                    <th class="text-center">DEPARTAMENTO</th>
                    <th class="text-center">INICIO</th>
                    <th class="text-center">FINAL</th>
                    <th class="text-center">ASESOR</th>
                    <th class="text-center" width="40%">OBJETIVO</th>
                    <th colspan="3">&nbsp;</th>
                </tr>
            </thead>
            <tbody>  
            @foreach($mejoras as $mejora) 
                <tr>
                    <td>{{ $mejora->id }}</td>
                    <td>{{ $mejora->registro }}</td> 
                    <td>{{ $mejora->departamento }}</td>
                    <td>{{ $mejora->inicio }}</td>
                    <td>{{ $mejora->final }}</td>
                    <td>{{ $mejora->asesor }}</td>
                    <td>{{ $mejora->objetivo }}</td>
                    <td width="07px">
                        <a  href="{{ route('mejoras.print', $mejora->id) }}"
                            class="btn btn-sm btn-outline-primary fa fa-print" title="Imprimir Mejora Rapida">
                        </a>
                    </td>
                    <td width="07px">
                        <a href="{{ route('mejoras.aterm', $mejora->id) }}"
                            class="btn btn-sm btn-outline-primary fa fa-check-square-o" title="Editar Mejora Rapida">
                        </a>
                    </td>
                </tr>
            @endforeach   
            </tbody>
        </table>
    </div>
    <br>
    {{ $mejoras->links() }}
    <br>
    <br>
    <h1 class="text-center">Listado de Personal</h1>
    <br>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-ahmsa-tab" data-toggle="tab" href="#nav-ahmsa" role="tab" aria-controls="nav-ahmsa" aria-selected="true">Empleados de Confianza</a>
            <a class="nav-item nav-link" id="nav-sid1-tab" data-toggle="tab" href="#nav-sid1" role="tab" aria-controls="nav-sid1" aria-selected="false">Sindicalizados Sid. 1</a>
            <a class="nav-item nav-link" id="nav-sid2-tab" data-toggle="tab" href="#nav-sid2" role="tab" aria-controls="nav-sid2" aria-selected="false">Sindicalizados Sid. 2</a>
        </div>
    </nav>
    <br>
    <div class="container">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-ahmsa" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row">
                <div style="width: 20%"><i>.</i></div>
                <div class="table-responsive" style="width: 60%">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr style="background-color: #026DE2; color: #ffffff;">
                                <th class="text-center">Cant.</th>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Equipo de Trabajo</th>
                                <th class="text-center" width="120px">Pago por Persona</th>
                            </tr>
                        </thead>
                        <tbody>  
                            <?php $x=0;?>
                            <?php $tpagoconf = 0; ?>
                            @foreach($mrint as $integrante) 
                            @if($integrante->nivel == 1)
                            @if((($integrante->cia<>1000) and ($integrante->cia)<>2000))
                            <?php $x=$x+1 ?>
                                <tr>
                                    <td width="5%" class="text-center">{{ $x }}</td>
                                    <td width="5%" class="text-center">{{ $integrante->empleado_id }}</td> 
                                    <td width="50%">{{ $integrante->nombre }}</td>
                                    <td width="10%" class="text-center">MR-{{ $integrante->id }}</td>
                                    <td width="10%" class="text-right">{{ sprintf('$ %s', number_format(($integrante->ppp),0, '.', ',')) }}</td>
                                </tr>
                            <?php $tpagoconf = $tpagoconf + $integrante->ppp; ?>
                            @endif
                            @endif
                            @endforeach   
                        </tbody>
                    </table>
                    <div class="row justify-content-end mt-2 mr-2"> 
                        <div class="float-right mr-2">
                            <h6 class="font-weight-bold float-right"><p class="titulosmr">Total:</p></h6>
                        </div>
                        <div class="float-right">
                            <div class="font-weight-bold float-right mt-1"><p class="titulosmr">{{ sprintf('$ %s', number_format(($tpagoconf),0, '.', ',')) }}</p></div>
                        </div>
                    </div>
                </div>
                <div style="width: 20%"><i>.</i></div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-sid1" role="tabpanel" aria-labelledby="nav-sid1-tab">
                <div class="row">
                <div style="width: 20%"><i>.</i></div>
                <div class="table-responsive" style="width: 60%">
                    <table id="grid-basic" class="w3-table-all w3-card-4">
                        <thead>
                            <tr style="background-color: #026DE2; color: #ffffff;">
                                <th class="text-center">Cant.</th>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Equipo de Trabajo</th>
                                <th class="text-center" width="120px">Pago por Persona</th>
                            </tr>
                        </thead>
                        <tbody>  
                            <?php $x=0;?>
                            <?php $tpagoconf = 0; ?>
                            @foreach($mrint as $integrante) 
                            @if($integrante->nivel == 1)
                            @if(($integrante->cia) == 1000)
                            <?php $x=$x+1 ?>
                                <tr>
                                    <td width="5%" class="text-center">{{ $x }}</td>
                                    <td width="5%" class="text-center">{{ $integrante->empleado_id }}</td> 
                                    <td width="50%">{{ $integrante->nombre }}</td>
                                    <td width="10%" class="text-center">MR-{{ $integrante->id }}</td>
                                    <td width="10%" class="text-right">{{ sprintf('$ %s', number_format(($integrante->ppp),0, '.', ',')) }}</td>
                                </tr>
                            <?php $tpagoconf = $tpagoconf + $integrante->ppp; ?>
                            @endif
                            @endif
                            @endforeach   
                        </tbody>
                    </table>
                    <div class="row justify-content-end mt-2 mr-2"> 
                        <div class="float-right mr-2">
                            <h6 class="font-weight-bold float-right"><p class="titulosmr">Total:</p></h6>
                        </div>
                        <div class="float-right">
                            <div class="font-weight-bold float-right mt-1"><p class="titulosmr">{{ sprintf('$ %s', number_format(($tpagoconf),0, '.', ',')) }}</p></div>
                        </div>
                    </div>
                </div>
                <div style="width: 20%"><i>.</i></div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-sid2" role="tabpanel" aria-labelledby="nav-sid2-tab">
                <div class="row">
                <div style="width: 20%"><i>.</i></div>
                <div class="table-responsive" style="width: 60%">
                    <table id="grid-basic" class="w3-table-all w3-card-4">
                        <thead>
                            <tr style="background-color: #026DE2; color: #ffffff;">
                                <th class="text-center">Cant.</th>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Equipo de Trabajo</th>
                                <th class="text-center" width="120px">Pago por Persona</th>
                            </tr>
                        </thead>
                        <tbody>  
                            <?php $x=0;?>
                            <?php $tpagoconf = 0; ?>
                            @foreach($mrint as $integrante) 
                            @if($integrante->nivel == 1)
                            @if(($integrante->cia) == 2000)
                            <?php $x=$x+1 ?>
                                <tr>
                                    <td width="5%" class="text-center">{{ $x }}</td>
                                    <td width="5%" class="text-center">{{ $integrante->empleado_id }}</td> 
                                    <td width="50%">{{ $integrante->nombre }}</td>
                                    <td width="10%" class="text-center">MR-{{ $integrante->id }}</td>
                                    <td width="10%" class="text-right">{{ sprintf('$ %s', number_format(($integrante->ppp),0, '.', ',')) }}</td>
                                </tr>
                            <?php $tpagoconf = $tpagoconf + $integrante->ppp; ?>
                            @endif
                            @endif
                            @endforeach   
                        </tbody>
                    </table>
                    <div class="row justify-content-end mt-2 mr-2"> 
                        <div class="float-right mr-2">
                            <h6 class="font-weight-bold float-right"><p class="titulosmr">Total:</p></h6>
                        </div>
                        <div class="float-right">
                            <div class="font-weight-bold float-right mt-1"><p class="titulosmr">{{ sprintf('$ %s', number_format(($tpagoconf),0, '.', ',')) }}</p></div>
                        </div>
                    </div>
                </div>
                <div style="width: 20%"><i>.</i></div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
</div>
<div class="modal fade" id="addbenef" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reporte de Pago Circulos de Eficiencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ route('mejoras.report') }}" method = "POST">
           {{ csrf_field() }}
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Fecha de Pago:</label>
            <select class="form-control" id="folio" name="folio" required>
              @foreach($folios as $folios)
                <option value="{{ $folios->mes_terminacion }}">{{ $folios->mes_terminacion }}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
      </div>    
        </form>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger small" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
</div>
@endsection