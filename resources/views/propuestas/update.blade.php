@extends('layouts.appm')

@section('content')
<span class="contact100-form-title">
  <h1 class="text-center">Propuesta de Círculo de Eficiencia</h1>
</span>
<form id="update" name="update" action="{{ route('propuesta.edit') }}" method = "POST" enctype="multipart/form-data">
   {{ csrf_field() }}
    <input type="hidden" id="id" name="id" value="{{ $propuesta->id }}">
    <input type="hidden" id="identificador" name="identificador" value="{{ $propuesta->identificador }}">
    <input type="hidden" id="asignacion" name="asignacion" value="{{ date("Y-m-d") }}">
    <fieldset disabled>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="inputEmail4"><h6>Dirección</h6></label>
          <input type="text" class="form-control" value="{{ $propuesta->direccion }}">
        </div>
        <div class="form-group col-md-4">
          <label for="inputEmail4"><h6>Subdirección</h6></label>
          <input type="text" class="form-control" value="{{ $propuesta->subdireccion }}">
        </div>
        <div class="form-group col-md-4">
          <label for="inputPassword4"><h6>Departamento</h6></label>
          <input type="text" class="form-control" value="{{ $propuesta->departamento }}">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-3">
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4"><h6>Contacto</h6></label>
          <input type="text" class="form-control" value="{{ $propuesta->contacto }}">
        </div>
        <div class="form-group col-md-2">
          <label for="inputEmail4"><h6>Telefono</h6></label>
          <input type="text" class="form-control" value="{{ $propuesta->clave }}">
        </div>
        <div class="form-group col-md-1">
          <label for="inputPassword4"><h6>Extensión</h6></label>
          <input type="text" class="form-control" value="{{ $propuesta->extension }}">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-3">
        </div>
        <div class="form-group col-md-1">
          <label for="inputEmail4"><h6>Ficha</h6></label>
          <input type="text" class="form-control" value="{{ $propuesta->id_autoriza }}">
        </div>
        <div class="form-group col-md-4">
          <label for="inputEmail4"><h6>Nombre</h6></label>
          <input type="text" class="form-control" value="{{ $propuesta->jefe->nombre }}">
        </div>
        <div class="form-group col-md-4">
          <label for="inputPassword4"><h6>Posición</h6></label>
          <input type="text" class="form-control" value="{{ $propuesta->jefe->posicion }}">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-8">
        </div>
        <div class="form-group col-md-2">
          <label for="inputEmail4"><h6>Fecha Inicio</h6></label>
          <input type="text" class="form-control" style="width: 100px;" value="{{ $propuesta->inicio }}">
        </div>
        <div class="form-group col-md-2">
          <label for="inputPassword4"><h6>Fecha Final</h6></label>
          <input type="text" class="form-control" style="width: 100px;" value="{{ $propuesta->final }}">
        </div>
      </div>
         <br>
        </fieldset>
         <div class="row">
          <div class="col-md-10"></div>
          <div class=" form-group col-md-2">  
            <label for="to" class="col-form-label"><h4 class="p-0 m-0">Asesor:</h4></label>
            <select type="text" class="form-control" id="asesor" name="asesor" required>
                    <option value=""></option>
                    <option value="ING. ADRIANA REYES">ING. ADRIANA REYES</option>
                    <option value="ING. ISABELA SAN MIGUEL">ING. ISABELA SAN MIGUEL</option>
                    <option value="ING. EDITH RAMOS">ING. EDITH RAMOS</option>
                    <option value="ING. ORLANDO GUERRA">ING. ORLANDO GUERRA</option>
                    <option value="ING. SERGIO CAMACHO">ING. SERGIO CAMACHO</option>
                    <option value="ING. GERARDO RODRIGUEZ">ING. GERARDO RODRIGUEZ</option>
                    <option value="ING. PATRICIA ALVAREZ">ING. PATRICIA ALVAREZ</option>
                    <option value="ING. OSCAR RIOS">ING. OSCAR RIOS</option>
                  </select>
          </div>
        </div>
        <br>
        <fieldset disabled>
      @if (($propuesta->identificador) == (1))
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>Nombre del Proyecto</h6></label>
            <input type="text" class="form-control" value="{{ $propuesta->proyecto }}">
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>¿Porqué consideras que el proyecto es creativo y/o innovador?</h6></label>
            <textarea type="text" class="form-control" rows="4">{{ $propuesta->creativo }}</textarea>
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>¿Qué áreas deben participar en el desarrollo del proyecto?</h6></label>
            <input type="text" class="form-control" value="{{ $propuesta->areas_part }}">
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>¿Qué conocimientos, especialidades y/o habilidades se requieren de los integrantes?</h6></label>
            <input type="text" class="form-control" value="{{ $propuesta->skills_integ }}">
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>¿Cuáles son las principales actividades a realizar por el equipo?</h6></label>
            <input type="text" class="form-control" value="{{ $propuesta->principales_act }}">
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>¿Cuál es el conocimiento crítico requerido para el desarrollo del proyecto?</h6></label>
            <input type="text" class="form-control" value="{{ $propuesta->conocimiento_critico }}">
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>¿Cómo participa el personal sindicalizado?</h6></label>
            <input type="text" class="form-control" value="{{ $propuesta->sindicalizados }}">
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-10">
          </div>
          <div class="form-group col-md-2 ">
            <label for="inputEmail4"><h6>Beneficio Económico</h6></label>
            <input type="text" class="form-control" value="{{ $propuesta->beneficio_eco }}">
          </div> 
        </div>    
      @else
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>A Mejorar</h6></label>
            <textarea class="form-control" rows="3">{{ $propuesta->mejorar }}</textarea>
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>Objetivo</h6></label>
            <textarea type="text" class="form-control">{{ $propuesta->objetivo }}</textarea>
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>Solución</h6></label>
            <textarea type="text" class="form-control">{{ $propuesta->solucion }}</textarea>
          </div> 
        </div>
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>Archivos Adjuntos:</h6></label>
              <div class="row">
                @foreach($propuesta->attach as $attached)
                  <label class="ml-3 mr-3" for="inputattach">{{ $attached->attach_path }}</label>
                @endforeach
              </div>  
          </div> 
      @endif  
      @foreach($propuesta->empleadosol as $integrante)
        <div class="row">
          <div class="form-group col-md-3">
          </div>
          <div class="form-group col-md-1">
            <label for="inputEmail4"><h6>Ficha</h6></label>
            <input type="text" class="form-control" value="{{ $integrante->id }}">
          </div>
          <div class="form-group col-md-4">
            <label for="inputEmail4"><h6>Nombre</h6></label>
            <input type="text" class="form-control" value="{{ $integrante->nombre }}">
          </div>
          <div class="form-group col-md-4">
            <label for="inputPassword4"><h6>Posición</h6></label>
            <input type="text" class="form-control" value="{{ $integrante->posicion }}">
          </div>
        </div>
      @endforeach
  </fieldset>
  <br> 
  <div class="row" id="botones">
  <div class="container-contact100-form-btn">
    <button class="contact100-form-btn" type="submit">
      <span>
        Asignar
        <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
      </span>
    </button>
  </div> 
</div>
</form>    
@endsection