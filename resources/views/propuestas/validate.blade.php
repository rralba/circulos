@extends('layouts.appm')

@section('content')
<div class="container">
<span class="contact100-form-title">
  <h1 class="text-center">Propuesta de Círculo de Eficiencia</h1>
</span>
<form id="validate" name="validate" action="{{ route('propuesta.accept') }}" method = "POST" enctype="multipart/form-data">
   {{ csrf_field() }}
  
    <input type="hidden" id="id" name="id" value="{{ $propuesta->id }}">
    <input type="hidden" id="identificador" name="identificador" value="{{ $propuesta->identificador }}">
    <input type="hidden" id="registro" name="registro" value="{{ $propuesta->registro }}">
      <div class="row">
        <div class="form-group col-md-4">
          <label for="inputEmail4"><h6>Dirección</h6></label>
          <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $propuesta->direccion }}" readonly>
        </div>
        <div class="form-group col-md-4">
          <label for="inputEmail4"><h6>Subdirección</h6></label>
          <input type="text" class="form-control" id="subdireccion" name="subdireccion" value="{{ $propuesta->subdireccion }}" readonly>
        </div>
        <div class="form-group col-md-4">
          <label for="inputPassword4"><h6>Departamento</h6></label>
          <input type="text" class="form-control" id="depto" name="depto" value="{{ $propuesta->departamento }}" readonly>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-3">
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4"><h6>Contacto</h6></label>
          <input type="text" class="form-control" value="{{ $propuesta->contacto }}" readonly>
        </div>
        <div class="form-group col-md-2">
          <label for="inputEmail4"><h6>Telefono</h6></label>
          <input type="text" class="form-control" value="{{ $propuesta->clave }}" readonly>
        </div>
        <div class="form-group col-md-1">
          <label for="inputPassword4"><h6>Extensión</h6></label>
          <input type="text" class="form-control" value="{{ $propuesta->extension }}" readonly>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-3">
        </div>
        <div class="form-group col-md-1">
          <label for="inputEmail4"><h6>Ficha</h6></label>
          <input type="text" class="form-control" id="employeeid" name="id_jefe" value="{{ $propuesta->id_autoriza }}" readonly>
        </div>
        <div class="form-group col-md-4">
          <label for="inputEmail4"><h6>Nombre</h6></label>
          <input type="text" class="form-control" id="employee_search" value="{{ $propuesta->jefe->nombre }}">
        </div>
        <div class="form-group col-md-4">
          <label for="inputPassword4"><h6>Posición</h6></label>
          <input type="text" class="form-control" id="employeedepto" value="{{ $propuesta->jefe->posicion }}" readonly>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-8">
        </div>
        <div class="form-group col-md-2">
          <label for="inputEmail4"><h6>Fecha Inicio</h6></label>
          <input type="text" class="form-control datepicker" style="width: 100px;" id="inicio" name="inicio" value="{{ $propuesta->inicio }}">
        </div>
        <div class="form-group col-md-2">
          <label for="inputPassword4"><h6>Fecha Final</h6></label>
          <input type="text" class="form-control datepicker" style="width: 100px;" id="final" name="final" value="{{ $propuesta->final }}">
        </div>
      </div>
         <br>
        
         <div class="row">
          <div class="col-md-10"></div>
          <div class=" form-group col-md-2">  
            <label for="to" class="col-form-label"><h4 class="p-0 m-0">Asesor:</h4></label>
            <input type="text" class="form-control" id="asesor" name="asesor" value="{{ $propuesta->asesor }}" readonly>
          </div>
        </div>
        <br>
        <div class="row" id="valor">
          <div class="col-md-5"></div>
          <div class=" form-group col-md-3" id="valorvalid">  
            <label for="to" class="col-form-label"><h4 class="p-0 m-0">Valor Corporativo:</h4></label>
            <select type="text" class="form-control" id="valorprp" name="valorprp">
                <option value=""></option>
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
          <div class=" form-group col-md-4" id="desperdiciovalid">  
            <label for="to" class="col-form-label"><h4 class="p-0 m-0">Desperdicios Lean Manufacturing:</h4></label>
            <select type="text" style="width: 70%;" class="form-control" id="desperdicio" name="desperdicio">
                <option value=""></option>
                <option value="AHORRO DE ENERGIA">AHORRO DE ENERGIA</option>
                <option value="AHORRO DE SUMINISTROS">AHORRO DE SUMINISTROS</option>
                <option value="CONSUMO DE REFACCIONES">CONSUMO DE REFACCIONES</option>
                <option value="COSTOS">COSTOS</option>
                <option value="DEFECTOS">DEFECTOS</option>
                <option value="DEMORAS">DEMORAS</option>
                <option value="DEMORAS Y ACCIDENTES">DEMORAS Y ACCIDENTES</option>
                <option value="DESPERDICIO DE AGUA">DESPERDICIO DE AGUA</option>
                <option value="DISPONIBILIDAD DE EQUIPO">DISPONIBILIDAD DE EQUIPO</option>
                <option value="ESPERA">ESPERA</option>
                <option value="INVENTARIO">INVENTARIO</option>
                <option value="MEDIO AMBIENTE">MEDIO AMBIENTE</option>
                <option value="METODO DE TRABAJO">MÉTODO DE TRABAJO</option>
                <option value="MOVIMIENTO">MOVIMIENTO</option>
                <option value="PRODUCTIVIDAD">PRODUCTIVIDAD</option>
                <option value="SOBREPROCESAMIENTO">SOBREPROCESAMIENTO</option>
                <option value="SOBREPRODUCCION">SOBREPRODUCCION</option>
                <option value="TALENTOS">TALENTOS</option>
                <option value="TRANSPORTACION">TRANSPORTACIÓN</option>
              </select>
          </div>
        </div>
       <br>
      @if (($propuesta->identificador) == (3))
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>Nombre del Proyecto</h6></label>
            <input type="text" class="form-control tomayus" maxlength="249" id="proyecto" name="proyecto" value="{{ $propuesta->proyecto }}" required>
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>¿Porqué consideras que el proyecto es creativo y/o innovador?</h6></label>
            <textarea type="text" class="form-control tomayus" maxlength="499" rows="4" id="creativo" name="creativo">{{ $propuesta->creativo }}</textarea>
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>¿Qué áreas deben participar en el desarrollo del proyecto?</h6></label>
            <input type="text" class="form-control tomayus" maxlength="249" id="areas" name="areas" value="{{ $propuesta->areas_part }}">
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>¿Qué conocimientos, especialidades y/o habilidades se requieren de los integrantes?</h6></label>
            <input type="text" class="form-control tomayus" maxlength="249" id="skills" name="skills" value="{{ $propuesta->skills_integ }}">
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>¿Cuáles son las principales actividades a realizar por el equipo?</h6></label>
            <input type="text" class="form-control tomayus" maxlength="249" id="principales" name="principales" value="{{ $propuesta->principales_act }}">
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>¿Cuál es el conocimiento crítico requerido para el desarrollo del proyecto?</h6></label>
            <input type="text" class="form-control tomayus" maxlength="249" id="critico" name="critico" value="{{ $propuesta->conocimiento_critico }}">
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>¿Cómo participa el personal sindicalizado?</h6></label>
            <input type="text" class="form-control tomayus" maxlength="249" id="sindicalizados" name="sindicalizados" value="{{ $propuesta->sindicalizados }}">
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-10">
          </div>
          <div class="form-group col-md-2 ">
            <label for="inputEmail4"><h6>Beneficio Económico</h6></label>
            <input type="text" class="form-control requeridon1 validar" id="currency-field" name="currency-field" placeholder="$1,000,000.00" maxlength="10" value="{{ $propuesta->beneficio_eco }}">
            <input type="hidden" class="form-control requeridon1 validar" id="beneficio_eco" name="beneficio_eco" value="#currency-field">
          </div> 
        </div>   
      @else 
      @if (($propuesta->identificador) == (4))
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>A Mejorar</h6></label>
            <textarea class="form-control tomayus" maxlength="249" id="mejorar" name="mejorar" rows="4">{{ $propuesta->mejorar }}</textarea>
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>Objetivo</h6></label>
            <textarea type="text" class="form-control tomayus" maxlength="249" id="objetivo" name="objetivo" rows="4">{{ $propuesta->objetivo }}</textarea>
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>Solución</h6></label>
            <textarea type="text" class="form-control tomayus" maxlength="249" id="solucion" name="solucion" rows="4">{{ $propuesta->solucion }}</textarea>
          </div> 
        </div>
         {{--  <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>Archivos Adjuntos:</h6></label>
              <div class="row">
                @foreach($propuesta->attach as $attached)
                  <a><img src="{{ asset('/../storage/app/'.$attached->attach_path) }}"  height="90px" width="90px"></a>
                @endforeach
              </div>  
          </div>  --}}
      @endif
      @endif
      <?php $x=0;?>
      @foreach($propuesta->empleadosol as $integrante)
        <?php $x=$x+1 ?>
        <div class="row">
          <div class="form-group col-md-2">
          </div>
          <div class="form-group col-md-1">
            <label for="inputEmail4"><h6>Ficha</h6></label>
            <input type="text" class="form-control" id="employeeid{{$x}}" name="integ[]" value="{{ $integrante->id }}" readonly>
          </div>
          <div class="form-group col-md-4">
            <label for="inputEmail4"><h6>Nombre</h6></label>
            <input type="text" class="form-control" id="employee_search{{$x}}" value="{{ $integrante->nombre }}">
          </div>
          <div class="form-group col-md-4">
            <label for="inputPassword4"><h6>Posición</h6></label>
            <input type="text" class="form-control" id="employeedepto{{$x}}" value="{{ $integrante->posicion }}" readonly>
          </div>  
          @if($propuesta->identificador == 4)
            @if($x == 1)
            <div class="form-group col-md-1">
              <label for="inputPassword4"><h6>Rol</h6></label>
              <input type="text" class="form-control intmra" id="rol" name="rol" value="autor" readonly>
            </div>
          @else
            <div class="form-group col-md-1">
            <label for="inputPassword4"><h6>Rol</h6></label>
            <input type="text" class="form-control intmri" id="rol" name="rol" value="integrante" readonly>
          </div>
          @endif
          @endif
        {{--   @if($propuesta->identificador == 3)
            @if($x == 1)
            <div class="form-group col-md-1">
              <label for="inputPassword4"><h6>Rol</h6></label>
              <select type="text" class="form-control" id="rol" name="rol[]">
                <option value="0"></option>
                <option value="1">Autor</option>
                <option value="2">Implementador A</option>
                <option value="3">Implementador B</option>
              </select>
            </div>
            @endif
            @if($x == 2)
            <div class="form-group col-md-1">
              <label for="inputPassword4"><h6>Rol</h6></label>
              <select type="text" class="form-control" id="rol" name="rol[]">
                <option value="0"></option>
                <option value="2">Implementador A</option>
                <option value="3">Implementador B</option>
              </select>
            </div>
            @endif
            @if($x == 3)
            <div class="form-group col-md-1">
              <label for="inputPassword4"><h6>Rol</h6></label>
              <select type="text" class="form-control" id="rol" name="rol[]">
                <option value="0"></option>
                <option value="2">Implementador A</option>
                <option value="3">Implementador B</option>
              </select>
            </div>
            @endif
            @if($x > 3)
            <div class="form-group col-md-1">
              <label for="inputPassword4"><h6>Rol</h6></label>
              <select type="text" class="form-control" id="rol" name="rol[]">
                <option value="0"></option>
                <option value="3">Implementador B</option>
              </select>
            </div>
            @endif
          @endif --}}
        </div>
      @endforeach
  <div class="row" id="observalid">
      <div class="form-group col-md-12">
          <label for="inputEmail4"><h6>Observaciones</h6></label>
          <textarea type="text" class="form-control" rows="4" maxlength="299" id="observacioness" name="observaciones"></textarea>
      </div> 
  </div>
</div>
  <br>
  <br>
  <div class="container-fluid" id="evaluacion">
    <div class="row ml-0 mr-0 col-12">
    <div class="row ml-0 mr-0 col-2 borde mr-4 justify-content-center tituloeval">
      <h3 class="m-1 font-weight-bold">EVALUADOR</h3> 
    </div>
    <div class="row ml-0 mr-0 col-8 ml-5 mr-5 borde justify-content-center tituloeval">
      <h3 class="m-1 font-weight-bold">CRITERIOS DE APROBACIÓN Y/O EVALUACIÓN DE MEJORAS</h3>
    </div>
    <div class="row ml-0 mr-0 col-1 ml-4">
      <div class="borde text-center tituloeval" style="width: 50%;">
        <h3 class="m-1 font-weight-bold">SI</h3>      
      </div>
      <div class="borde text-center tituloeval" style="width: 50%;">
        <h3 class="m-1 font-weight-bold">NO</h3>
      </div>      
    </div>  
  </div>
  <br>
  <div class="row ml-0 mr-0 col-12">
    <div class="row ml-0 mr-0 col-2 borde mr-4 justify-content-center align-content-center">
      <h3>ÁREA OPERATIVA</h3> 
    </div>
    <div class="row ml-0 mr-0 col-8 ml-5 mr-5">
      <div class="borde">
        <div class="col-11 mb-3 mt-3">
          <h3>¿Esta relacionada con incremento de sueldo, compensaciones, contratación de personal, promociones o evaluaciones?</h3>
        </div>
        <div class="col-11 mb-3">
          <h3>¿Cumple con las políticas y directrices de la empresa?</h3>
        </div>
        <div class="col-11 mb-3">
          <h3>¿Requiere una alta inversión inicial para su realización?</h3>
        </div>
        <div class="col-11 mb-3">
          <h3>¿Puede ser implementada en su totalidad por el autor, o en su defecto este puede intervenir en el proceso?</h3>
        </div>
        <div class="col-11 mb-3">
          <h3>¿Su implementación puede ser llevada a cabo con material, equipo recuperado y personal del departamento?</h3>
        </div>
        <div class="col-11 mb-3">
          <h3>¿Puede ser implementada en otras áreas o departamentos con procesos y equipos similares o iguales?</h3>
        </div>
        <div class="col-11 mb-3">
          <h3>¿Esta relacionada o es parte de un trabajo de mantenimiento?</h3>
        </div>
        <div class="col-11 mb-3">
          <h3>¿Es un requerimiento o petición especial solicitada por el autor?</h3>
        </div>
      </div>
    </div>
    <div class="row ml-0 mr-0 col-1 ml-4">
      <div class="input-group col-12">
        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center">
          <input class="form-check-input mr-0" type="radio" name="p1" id="inputeval" value="0">
        </div>
        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center" style="background-color: #C0C0C0">
          <input class="form-check-input mr-0" type="radio" name="p1" id="inputeval" value="1" checked>
        </div>
      </div>
      <div class="input-group col-12">
        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center" style="background-color: #C0C0C0">
          <input class="form-check-input mr-0" type="radio" name="p2" id="inputeval" value="1" checked>
        </div>
        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center">
          <input class="form-check-input mr-0" type="radio" name="p2" id="inputeval" value="0">
        </div>
      </div>
      <div class="input-group col-12">  
        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center">
          <input class="form-check-input mr-0" type="radio" name="p3" id="inputeval" value="0">
        </div>
        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center" style="background-color: #C0C0C0">
          <input class="form-check-input mr-0" type="radio" name="p3" id="inputeval" value="1" checked>
        </div>
      </div>
      <div class="input-group col-12">  
        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center" style="background-color: #C0C0C0">
          <input class="form-check-input mr-0" type="radio" name="p4" id="inputeval" value="1" checked>
        </div>
        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center">
          <input class="form-check-input mr-0" type="radio" name="p4" id="inputeval" value="0">
        </div>
      </div>
      <div class="input-group col-12">  
        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center" style="background-color: #C0C0C0">
          <input class="form-check-input mr-0" type="radio" name="p5" id="inputeval" value="1" checked>
        </div>
        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center">
          <input class="form-check-input mr-0" type="radio" name="p5" id="inputeval" value="0">
        </div>
      </div>
      <div class="input-group col-12">  
        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center" style="background-color: #C0C0C0">
          <input class="form-check-input mr-0" type="radio" name="p6" id="inputeval" value="1" checked>
        </div>
        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center">
          <input class="form-check-input mr-0" type="radio" name="p6" id="inputeval" value="0">
        </div>
      </div>
      <div class="input-group col-12">  
        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center">
          <input class="form-check-input mr-0" type="radio" name="p7" id="inputeval" value="0">
        </div>
        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center" style="background-color: #C0C0C0">
          <input class="form-check-input mr-0" type="radio" name="p7" id="inputeval" value="1" checked>
        </div>
      </div>
      <div class="input-group col-12">  
        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center">
          <input class="form-check-input mr-0" type="radio" name="p8" id="inputeval" value="0">
        </div>
        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center" style="background-color: #C0C0C0">
          <input class="form-check-input mr-0" type="radio" name="p8" id="inputeval" value="1" checked>
        </div>
      </div>      
    </div>  
  </div>
  <br>
  <div class="row ml-0 mr-0 col-12">
    <div class="row ml-0 mr-0 col-2 borde mr-4 justify-content-center align-content-center">
      <h3 class="text-center">ASESOR CÍRCULOS DE EFICIENCIA</h3>  
    </div>
    <div class="row ml-0 mr-0 col-8 ml-5 mr-5">
      <div class="borde">
        <div class="col-11 mb-3 mt-3">
          <h3>¿La idea es similar, comparte parecido o se desprende de otros proyectos del departamento o programas de trabajo?</h3>
        </div>
        <div class="col-11 mb-3">
          <h3>¿Forma parte o se deriva de algún Círculo de Eficiencia registrado con anterioridad?</h3>
        </div>
        <div class="col-11 mb-3">
          <h3>¿La mejora cuenta con avances en su implementación o se encuentra terminada en campo?</h3>
        </div>
        <div class="col-11 mb-3">
          <h3>¿El tiempo de implementación es mayor a 3 meses?</h3>
        </div>
        <div class="col-11 mb-3">
          <h3>¿El grupo esta integrado entre 1 a 5 personas?</h3>
        </div>
      </div>
    </div>
    <div class="row ml-0 mr-0 col-1 ml-4">
      <div class="input-group col-12">
        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center">
          <input class="form-check-input mr-0" type="radio" name="p9" id="inputeval" value="0">
        </div>
        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center" style="background-color: #C0C0C0">
          <input class="form-check-input mr-0" type="radio" name="p9" id="inputeval" value="1" checked>
        </div>
      </div>
      <div class="input-group col-12">
        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center">
          <input class="form-check-input mr-0" type="radio" name="p10" id="inputeval" value="0">
        </div>
        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center" style="background-color: #C0C0C0">
          <input class="form-check-input mr-0" type="radio" name="p10" id="inputeval" value="1" checked>
        </div>
      </div>
      <div class="input-group col-12">  
        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center">
          <input class="form-check-input mr-0" type="radio" name="p11" id="inputeval" value="0">
        </div>
        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center" style="background-color: #C0C0C0">
          <input class="form-check-input mr-0" type="radio" name="p11" id="inputeval" value="1" checked>
        </div>
      </div>
      <div class="input-group col-12">  
        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center">
          <input class="form-check-input mr-0" type="radio" name="p12" id="inputeval" value="0">
        </div>
        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center" style="background-color: #C0C0C0">
          <input class="form-check-input mr-0" type="radio" name="p12" id="inputeval" value="1" checked>
        </div>
      </div>
      <div class="input-group col-12">  
        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center" style="background-color: #C0C0C0">
          <input class="form-check-input mr-0" type="radio" name="p13" id="inputeval" value="1" checked>
        </div>
        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center">
          <input class="form-check-input mr-0" type="radio" name="p13" id="inputeval" value="0"> 
        </div>
      </div>      
    </div>  
  </div>    
  </div>
  <br> 
  <div class="container">
  <div class="row" id="botones">
  <div class="container-contact100-form-btn">
    <button class="contact100-form-btn col-6" type="button" id="aprobada2" name="aprobada2">
      <span>
        Aprobada
        <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
      </span>
    </button>
    <button class="contact100-form-btn col-6" type="submit" id="aprobadavalid1" name="aprobada" value="0">
      <span>
        Aprobar
        <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
      </span>
    </button>
    <button class="contact100-form-btn col-6" type="button" id="aprobada1" name="aprobada1">
      <span>
        Rechazada
        <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
      </span>
    </button>
    <button class="contact100-form-btn col-6" type="submit" id="aprobadavalid" name="aprobada" value="1">
      <span>
        Rechazar
        <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
      </span>
    </button>
  </div> 
</div>
</div>
</form> 
<script type="text/javascript">

  window.addEventListener("keypress", function(event){
    if (event.keyCode == 13){
        event.preventDefault();
    }
}, false);

    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){

      $( "#employee_search" ).autocomplete({
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
           $('#employee_search').val(ui.item.label); // display the selected text
           $('#employeeid').val(ui.item.value); // save selected id to input
           $('#employeedepto').val(ui.item.depto);
           return false;
        }
      });

      $( "#employee_search1" ).autocomplete({
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
           $('#employee_search1').val(ui.item.label); // display the selected text
           $('#employeeid1').val(ui.item.value); // save selected id to input
           $('#employeedepto1').val(ui.item.depto);
           return false;
        }
      });

      $( "#employee_search2" ).autocomplete({
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
           $('#employee_search2').val(ui.item.label); // display the selected text
           $('#employeeid2').val(ui.item.value); // save selected id to input
           $('#employeedepto2').val(ui.item.depto);
           return false;
        }
      });
      $( "#employee_search3" ).autocomplete({
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
           $('#employee_search3').val(ui.item.label); // display the selected text
           $('#employeeid3').val(ui.item.value); // save selected id to input
           $('#employeedepto3').val(ui.item.depto);
           return false;
        }
      });
      $( "#employee_search4" ).autocomplete({
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
           $('#employee_search4').val(ui.item.label); // display the selected text
           $('#employeeid4').val(ui.item.value); // save selected id to input
           $('#employeedepto4').val(ui.item.depto);
           return false;
        }
      });
      $( "#employee_search5" ).autocomplete({
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
           $('#employee_search5').val(ui.item.label); // display the selected text
           $('#employeeid5').val(ui.item.value); // save selected id to input
           $('#employeedepto5').val(ui.item.depto);
           return false;
        }
      });
      $( "#employee_search6" ).autocomplete({
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
           $('#employee_search6').val(ui.item.label); // display the selected text
           $('#employeeid6').val(ui.item.value); // save selected id to input
           $('#employeedepto6').val(ui.item.depto);
           return false;
        }
      });
      $( "#employee_search7" ).autocomplete({
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
           $('#employee_search7').val(ui.item.label); // display the selected text
           $('#employeeid7').val(ui.item.value); // save selected id to input
           $('#employeedepto7').val(ui.item.depto);
           return false;
        }
      });
      $( "#employee_search8" ).autocomplete({
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
           $('#employee_search8').val(ui.item.label); // display the selected text
           $('#employeeid8').val(ui.item.value); // save selected id to input
           $('#employeedepto8').val(ui.item.depto);
           return false;
        }
      });
      $( "#employee_search9" ).autocomplete({
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
           $('#employee_search9').val(ui.item.label); // display the selected text
           $('#employeeid9').val(ui.item.value); // save selected id to input
           $('#employeedepto9').val(ui.item.depto);
           return false;
        }
      });
      $( "#employee_search10" ).autocomplete({
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
           $('#employee_search10').val(ui.item.label); // display the selected text
           $('#employeeid10').val(ui.item.value); // save selected id to input
           $('#employeedepto10').val(ui.item.depto);
           return false;
        }
      });
    });
    </script>
@endsection