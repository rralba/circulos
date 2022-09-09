@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <span class="contact100-form-title">
      <h1 class="text-center">Círculo de Eficiencia Nivel 1 y 2</h1>
    </span>
    <form id="editpy" name="editpy" action="{{ route('proyects.update') }} " method = "POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="form-group col-md-10">
                <label for="inputEmail4"><h6>Proyecto</h6></label>
                <input type="text" class="form-control tomayus" id="proyecto" name="proyecto" value="{{ $proyect->proyecto }}">
            </div>
            <div class="form-group col-md-1">
                <label for="inputEmail4"><h6>Folio</h6></label>
                <input type="text" class="form-control" style="width: 70%;"  id="id" name="id" value="{{ $proyect->id }}" readonly>
            </div>
        
            <div class="form-group col-md-1">
                <label for="inputEmail4"><h6>Registro</h6></label>
                <input type="text" class="form-control" id="registro" name="registro" value="{{ $proyect->fecha_reg }}" readonly>
            </div>
        </div>
        <input type="hidden" id="sub" name="sub" value="{{ $proyect->subdireccion }}">
        <input type="hidden" id="depa" name="depa" value="{{ $proyect->depto }}">
        <div class="row">
        <div class="form-group col-md-4">  
            <label for="recipient-name"><h6>Dirección:</h6></label>
            <select class="form-control" id="direccion" name="direccion" required>
                <option value="{{ $proyect->direccion }}">{{ $proyect->direccion }}</option>
                <option value="CONSEJO">CONSEJO</option>
                <option value="DIRECCIONGENERAL">DIRECCION GENERAL</option>
                <option value="COMUNICACION SOCIAL Y REL PUBLICAS">COMUNICACION SOCIAL Y REL PUBLICAS</option>
                <option value="GENERAL ADJUNTA DE OPERACIONES">GENERAL ADJUNTA DE OPERACIONES</option>
                <option value="ACERO">ACERO</option>
                <option value="LAMINACION MANTENIMIENTOS Y SERVICIOS">LAMINACION MANTENIMIENTOS Y SERVICIOS</option>
                <option value="GRAL ADJ DE ADMINISTRACION Y FINANZAS">GRAL ADJ DE ADMINISTRACION Y FINANZAS</option>
                <option value="COMERCIALIZACION Y MERCADOTECNIA">COMERCIALIZACION Y MERCADOTECNIA</option>
                <option value="CORPORATIVO DE ABASTECIMIENTOS">CORPORATIVO DE ABASTECIMIENTOS</option>
                <option value="CONTRALORIA Y SISTEMAS">CONTRALORIA Y SISTEMAS</option>
                <option value="CORPORATIVO DE RECURSOS HUMANOS">CORPORATIVO DE RECURSOS HUMANOS</option>
                <option value="CORPORATIVO DE RELACIONES INDUSTRIALES">CORPORATIVO DE RELACIONES INDUSTRIALES</option>
                <option value="SEGURIDAD Y MEDIO AMBIENTE">SEGURIDAD Y MEDIO AMBIENTE</option>
                <option value="JURIDICO CORPORATIVO">JURIDICO CORPORATIVO</option>
                <option value="VICEPRESIDENCIA DEL CONSEJO">VICEPRESIDENCIA DEL CONSEJO</option>
                <option value="PLANEACION FINANCIERA Y TESORERIA">PLANEACION FINANCIERA Y TESORERIA</option>
                <option value="CORPORATIVO DE FINANZAS Y PLANEACION">CORPORATIVO DE FINANZAS Y PLANEACION</option>
                <option value="CORPORATIVA DE OPERACIONES">CORPORATIVA DE OPERACIONES</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="recipient-name"><h6>Subdirección:</h6></label>
            <select class="form-control" id="subdireccion" name="subdireccion" required></select>
        </div>
        <div class="form-group col-md-4">
            <label for="inputEmail4"><h6>Departamento</h6></label>
            <select class="form-control" id="departamento" name="departamento"></select>
        </div>
      </div>
     @if (Auth::user()->can('mestro.index'))
      <div class="row">
        <div class="form-group col-md-4"></div>
        <div class="form-group col-md-2">
            <label for="inputEmail4"><h6>Estatus</h6></label>
            <select type="text" class="form-control" id="estatus" name="estatus" required>
                @if(($proyect->proy_status) == 0)
                    <option value="{{ $proyect->proy_status }}">Cancelado</option>
                    <option value="1">En Proceso</option>
                    <option value="2">Terminado</option>
                    <option value="3">Terminado en Proceso de Pago</option>
                @endif
                @if(($proyect->proy_status) == 1)
                    <option value="{{ $proyect->proy_status }}">En Proceso</option>
                    <option value="0">Cancelado</option>
                    <option value="2">Terminado</option>
                    <option value="3">Terminado en Proceso de Pago</option>
                @endif
                @if(($proyect->proy_status) == 2)
                    <option value="{{ $proyect->proy_status }}">Terminado</option>
                    <option value="0">Cancelado</option>
                    <option value="1">En Proceso</option>
                    <option value="3">Terminado en Proceso de Pago</option>
                @endif
                @if(($proyect->proy_status) == 3)
                    <option value="{{ $proyect->proy_status }}">Terminado en Proceso de Pago</option>
                    <option value="0">Cancelado</option>
                    <option value="1">En Proceso</option>
                    <option value="2">Terminado</option>
                @endif
            </select>
        </div>
        <div class="form-group col-md-1">
            <label for="inputEmail4"><h6>Nivel</h6></label>
            <select type="text" class="form-control" id="nivel" name="nivel" required>
                <option value="{{ $proyect->nivel }}">{{ $proyect->nivel }}</option>
                <option value="1">1</option>
                <option value="2">2</option>
              </select>
        </div>
        <div class="form-group col-md-1">
            <label for="inputEmail4"><h6>Comite</h6></label>
            <select type="text" class="form-control" id="comite" name="comite" required>
                <option value="{{ $proyect->comite }}">{{ $proyect->comite }}</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
              </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputPassword4"><h6>Asesor</h6></label>
            <input type="text" class="form-control" id="asesor" name="asesor" value="{{ $proyect->asesor }}" readonly>
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
          <div class="form-group col-md-2">
            <label for="inputEmail4"><h6>Empresa</h6></label>
            <select type="text" class="form-control" id="empresa" name="empresa" required>
                <option value="{{ $proyect->empresa }}">{{ $proyect->empresa }}</option>
                <option value="AHMSA 1">AHMSA 1</option>
                <option value="AHMSA 2">AHMSA 2</option>
                <option value="NASA">NASA</option>
                <option value="MICARE">MICARE</option>
                <option value="MIMOSA">MIMOSA</option>
                <option value="HERCULES">HERCULES</option>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputPassword4"><h6>Descuento</h6></label>
            <select type="text" class="form-control" id="descuento" name="descuento" required>
                @if(($proyect->desc_proy) == 0)
                    <option value="{{ $proyect->desc_proy }}">Proyecto con Descuento</option>
                    <option value="1">Proyecto sin Descuento</option>
                @endif
                @if(($proyect->desc_proy) == 1)
                    <option value="{{ $proyect->desc_proy }}">Proyecto sin Descuento</option>
                    <option value="0">Proyecto con Descuento</option>
                @endif
            </select>
        </div>
      </div>
      @endif
      @unless (Auth::user()->can('mestro.index'))
      <div class="row">
        <div class="form-group col-md-6"></div>
        <div class="form-group col-md-2">
            <label for="inputEmail4"><h6>Estatus</h6></label>
                @if(($proyect->proy_status) == 0)
                    <input type="hidden" class="form-control" id="estatus" name="estatus" value="{{ $proyect->proy_status }}">
                    <input type="text" class="form-control" value="Cancelado" readonly>
                @endif
                @if(($proyect->proy_status) == 1)
                    <input type="hidden" class="form-control" id="estatus" name="estatus" value="{{ $proyect->proy_status }}">
                    <input type="text" class="form-control" value="En Proceso" readonly>
                @endif
                @if(($proyect->proy_status) == 2)
                    <input type="hidden" class="form-control" id="estatus" name="estatus" value="{{ $proyect->proy_status }}">
                    <input type="text" class="form-control" value="Terminado" readonly>
                @endif
                @if(($proyect->proy_status) == 3)
                    <input type="hidden" class="form-control" id="estatus" name="estatus" value="{{ $proyect->proy_status }}">
                    <input type="text" class="form-control" value="Terminado en Proceso de Pago" readonly>
                @endif
        </div>
        <input type="hidden" class="form-control" id="descuento" name="descuento" value="{{ $proyect->desc_proy }}">
        <input type="hidden" class="form-control" id="empresa" name="empresa" value="{{ $proyect->empresa }}">
        <input type="hidden" class="form-control" id="asesor" name="asesor" value="{{ $proyect->asesor }}">
        <div class="form-group col-md-1">
            <label for="inputEmail4"><h6>Nivel</h6></label>
            <input type="hidden" class="form-control" id="nivel" name="nivel" value="{{ $proyect->nivel }}">
            <input type="text" class="form-control" value="{{ $proyect->nivel }}" readonly>
        </div>
        <div class="form-group col-md-1">
            <label for="inputEmail4"><h6>Comite</h6></label>
            <input type="hidden" class="form-control" id="comite" name="comite" value="{{ $proyect->comite }}">
            <input type="text" class="form-control" value="{{ $proyect->comite }}" readonly>                
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
      @endunless
      <div class="row" id="valor">
          <div class="col-md-4"></div>
          <div class=" form-group col-md-3" id="valorvalid">  
            <label for="to" class="col-form-label"><h6 class="p-0 m-0">Valor Corporativo:</h6></label>
            <select type="text" class="form-control" id="valor" name="valor" required>
                <option value="{{ $proyect->valor }}">{{ $proyect->valor }}</option>
                <option value="CALIDAD">CALIDAD</option>
                <option value="COSTOS">COSTOS</option>
                <option value="CUIDADO AL MEDIO AMBIENTE">CUIDADO AL MEDIO AMBIENTE</option>
                <option value="MEDIO AMBIENTE">MEDIO AMBIENTE</option>
                <option value="METODO DE TRABAJO">MÉTODO DE TRABAJO</option>
                <option value="PRODUCTIVIDAD">PRODUCTIVIDAD</option>
                <option value="PRODUCTIVIDAD Y CALIDAD">PRODUCTIVIDAD Y CALIDAD</option>
                <option value="PRODUCTIVIDAD Y COSTOS">PRODUCTIVIDAD Y COSTOS</option>
                <option value="PRODUCTIVIDAD, CALIDAD Y COSTOS">PRODUCTIVIDAD, CALIDAD Y COSTOS</option>
                <option value="SEGURIDAD">SEGURIDAD</option>
              </select>
          </div>
          <div class=" form-group col-md-3" id="desperdiciovalid">  
            <label for="to" class="col-form-label"><h6 class="p-0 m-0">Metodologia del Proyecto:</h6></label>
            <select type="text" class="form-control" id="metodologia" name="metodologia" required>
                <option value="{{ $proyect->metodologia }}">{{ $proyect->metodologia }}</option>
                <option value="DMAIC">DMAIC</option>
                <option value="PDCA">PDCA</option>
                <option value="QC-STORY 1">QC-STORY 1</option>
                <option value="QC-STORY 2">QC-STORY 2</option>
                <option value="DMADV">DMADV</option>
                <option value="LEAN MANUFACTURING">LEAN MANUFACTURING</option>
              </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputEmail4"><h6>Ahorro Anual Proyectado</h6></label>
            <input type="text" class="form-control requeridon1 validar" id="currency-field" name="currency-field" placeholder="$1,000,000.00" maxlength="10" value="{{ $proyect->ahorro_anual_proy   }}" onkeyup="PasarValor();">
            <input type="hidden" class="form-control requeridon1 validar" id="beneficio_eco" name="beneficio_eco">
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>Metrico Primario</h6></label>
            <input type="text" class="form-control tomayus" maxlength="249" id="metricopim" name="metricopim" value="{{ $proyect->metrico_primario }}">
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>Metrico secundario</h6></label>
            <input type="text" class="form-control tomayus" maxlength="249" id="metricosec" name="metricosec" value="{{ $proyect->metrico_secundario }}">
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>¿Porqué consideras que el proyecto es creativo y/o innovador?</h6></label>
            <textarea type="text" class="form-control tomayus" maxlength="499" rows="4" id="creativo" name="creativo">{{ $proyect->creativo }}</textarea>
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>¿Qué áreas deben participar en el desarrollo del proyecto?</h6></label>
            <input type="text" class="form-control tomayus" maxlength="249" id="areas" name="areas" value="{{ $proyect->areas_part }}">
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>¿Qué conocimientos, especialidades y/o habilidades se requieren de los integrantes?</h6></label>
            <input type="text" class="form-control tomayus" maxlength="249" id="skills" name="skills" value="{{ $proyect->skills_integ }}">
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>¿Cuáles son las principales actividades a realizar por el equipo?</h6></label>
            <input type="text" class="form-control tomayus" maxlength="249" id="principales" name="principales" value="{{ $proyect->principales_act }}">
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>¿Cuál es el conocimiento crítico requerido para el desarrollo del proyecto?</h6></label>
            <input type="text" class="form-control tomayus" maxlength="249" id="critico" name="critico" value="{{ $proyect->conocimiento_critico }}">
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>¿Cómo participa el personal sindicalizado?</h6></label>
            <input type="text" class="form-control tomayus" maxlength="249" id="sindicalizados" name="sindicalizados" value="{{ $proyect->sindicalizados }}">
          </div> 
        </div>
        <div class="container-contact100-form-btn">
            <button class="contact100-form-btn" type="submit">
                <span>
                    Guardar
                    <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                </span>
            </button>
        </div>
    </form>
</div>
<br>
<br>
<div class="container-fluid">
    <button type="button" class="btn btn-outline-primary btn-lg float-right fa fa-user-plus" data-toggle="modal" data-target="#adduser"></button>
    <br>
    <div class="table-responsive">
        <table id="grid-basic" class="w3-table-all w3-card-4">
            <thead>
                <tr>
                    <th data-column-id="pin" data-visible="false">pin</th>
                    <th data-column-id="proyect_id" data-visible="false">proyect_id</th>
                    <th data-column-id="id" data-type="numeric">Id</th>
                    <th data-column-id="nombre">Nombre</th>
                    <th data-column-id="departamento">Departamento</th>
                    <th data-column-id="posicion">Posicion</th>
                    <th data-column-id="rol" data-order="des">Rol</th>
                    <th data-column-id="cia">Compañia</th>
                    <th data-column-id="actions" data-formatter="actions" data-sortable="false">Actions</th>
                </tr>
            </thead>
            <tbody>  
                @foreach($proyect->empleados as $integrante) 
                <tr>
                    <td>{{ $integrante->pivot->id }}</td>
                    <td>{{ $integrante->pivot->proyect_id }}</td> 
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
                @endforeach   
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="adduser">
    <div class="modal-dialog" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agreragr integrante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('integrants.store') }}" method = "POST">
                {{ csrf_field() }}
                    <div class="form-group">
                        <input type="hidden" id="proyect_id" name="proyect_id" value="{{ $proyect->id }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Id sap:</label>
                        <input type="text" class="form-control" id="add_id" name="add_id" readonly>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" id="add_nombre" name="add_nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Departamento:</label>
                        <input type="text" class="form-control" id="add_depto" name="add_depto" readonly>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Posicion:</label>
                        <input type="text" class="form-control" id="add_posicion" name="add_posicion" readonly>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Rol:</label>
                        <select class="form-control" id="rol" name="rol" required>
                            <option value="1">Autor</option>
                            <option value="2">Implementador A</option>
                            <option value="3">Implementador B</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Direccion:</label>
                        <input type="select" class="form-control" id="add_direccion" name="add_direccion" readonly>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Compañia:</label>
                        <input type="text" class="form-control" id="add_cia" name="add_cia" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="edit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Integrante</h5>
                <div class="center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
           <div class="modal-body">
                <form class="container" action="{{ route('integrants.save') }}" method = "post">
                {{ csrf_field() }}
                    <input type="hidden" id="pin" name="pin">
                    <input type="hidden" id="proy_id" name="proy_id">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Id sap:</label>
                        <input type="text" class="form-control" id="edit_id" name="edit_id" readonly>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" id="fname" name="fname" readonly>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Departamento:</label>
                        <input type="text" class="form-control" id="lname" name="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Posicion:</label>
                        <input type="text" class="form-control" id="gender" name="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Rol:</label>
                        <select class="form-control" id="country" name="country" required>
                            <option value="1">Autor</option>
                            <option value="2">Implementador A</option>
                            <option value="3">Implementador B</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Direccion:</label>
                        <input type="text" class="form-control" id="salary" name="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Compañia:</label>
                        <input type="text" class="form-control" id="comp" name="comp" readonly>
                    </div>
                    <button class="btn btn-primary small" type="submit">Guardar</button>  
                </form>
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="delete" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar</h5>
                <div class="center">
                    <span onclick="document.getElementById('delete').style.display='none'" class="close" title="Close Modal">&times;</span>
                </div>
            </div>
            <form class="container" action="{{ route('integrants.delete') }}  " method="POST">
            {{ csrf_field() }}
                <input type="hidden" id="pinn" name="pinn">
                <input type="hidden" id="proye_id" name="proye_id">
                <input type="hidden" id="asig" name="asig">
                <div class="modal-body">
                    <input type="hidden" id="del_id" name="del_id">
                    <p>Seguro que deseas borrar al empleado Id <span id ="delete_name"></span> ?</p>
                    <button type="submit" class="btn btn-primary small"> Delete </button>
                </div>
            </form>
            <div class="modal-footer">
                <button onclick="document.getElementById('delete').style.display='none'" type="button" class="btn btn-secundary small">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<script>
    $( document ).ready(function(){
        $("#grid-basic").bootgrid({
          formatters: {
            "actions": function(column, row)
            {
              return "<button onclick=\"document.getElementById('edit').style.display='block'\" data-pin=\"" + row.pin + "\" data-proyect_id=\"" + row.proyect_id + "\" data-id=\"" + row.id + "\" data-nombre=\"" + row.nombre + "\" data-departamento=\"" + row.departamento + "\" data-posicion=\"" + row.posicion + "\" data-rol=\"" + row.rol + "\" data-direccion=\"" + row.direccion + "\" data-cia=\"" + row.cia + "\" class=\"btn btn-outline-primary small edit\" data-toggle=\"modal\" data-target=\"#edit\"><span class=\"fa fa-pencil\"></span></button> " +
                   "<button onclick=\"document.getElementById('delete').style.display='block'\" data-pin=\"" + row.pin + "\" data-proyect_id=\"" + row.proyect_id + "\" data-id=\"" + row.id + "\" data-rol=\"" + row.rol + "\" class=\"btn btn-outline-danger smalll delete\"><span class=\"fa fa-trash\"></span></button>";
            }
          }}).on("loaded.rs.jquery.bootgrid", function (){
            /* Executes after data is loaded and rendered */
            $(this).find(".edit").click(function (e) {
              $($(this).attr("data-target")).modal("show");
              $('#pin').val($(this).data("pin"));
              $('#proy_id').val($(this).data("proyect_id")); 
              $('#edit_id').val($(this).data("id"));
              $('#fname').val($(this).data("nombre"));
              $('#lname').val($(this).data("departamento"));
              $('#gender').val($(this).data("posicion"));
              $('#country').val($(this).data("rol"));
              $('#salary').val($(this).data("direccion"));
              $('#comp').val($(this).data("cia"));
            });
            $(this).find(".delete").click(function (e) {
              $('#pinn').val($(this).data("pin")); 
              $('#proye_id').val($(this).data("proyect_id"));
              $('#del_id').val($(this).data("id"));
              $('#asig').val($(this).data("rol"));
              $('#delete_name').html($(this).data("id"));
            });
          });
        });

    function PasarValor()
    {
        document.getElementById("beneficio_eco").value = document.getElementById("currency-field").value;
    }
    
     // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $(document).ready(function(){

      $( "#add_nombre" ).autocomplete({
        appendTo: "#adduser",
        "position": { my : "right top", at: "right bottom" },
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url:"{{route('propuesta.getEmployees')}}",
            type: 'post',
            dataType: "json",
            data: {
               _token: CSRF_TOKEN,
               search: request.term
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
           // Set selection
           $('#add_nombre').val(ui.item.label); // display the selected text
           $('#add_id').val(ui.item.value); // save selected id to input
           $('#add_depto').val(ui.item.depa);
           $('#add_posicion').val(ui.item.depto);
           $('#add_direccion').val(ui.item.dir);
           $('#add_cia').val(ui.item.cia);
           return false;
        }
      });  

      $( "#fname" ).autocomplete({
        appendTo: "#edit",
        "position": { my : "right top", at: "right bottom" },
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url:"{{route('propuesta.getEmployees')}}",
            type: 'post',
            dataType: "json",
            data: {
               _token: CSRF_TOKEN,
               search: request.term
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
           // Set selection
           $('#fname').val(ui.item.label); // display the selected text
           $('#edit_id').val(ui.item.value); // save selected id to input
           $('#lname').val(ui.item.depa);
           $('#gender').val(ui.item.depto);
           $('#salary').val(ui.item.dir);
           $('#comp').val(ui.item.cia);
           return false;
        }
      });  

    });
</script>
@endsection 