@extends('layouts.appm')

@section('content')
<div class="container">
<span class="contact100-form-title">
  <h1 class="text-center">Círculo de Eficiencia Nivel 3</h1>
</span>
<form id="editmr" name="editmr" action="{{ route('mejoras.update') }}">
  <input type="hidden" id="check" name="check" value="{{ $mejora->status }}" readonly>
   {{ csrf_field() }}
    <div class="row">
          <div class="form-group col-md-4"></div>
          <div class="form-group col-md-4"></div>
          <div class="form-group row col-md-4 justify-content-end">
            <label for="inputEmail4"><h6 class="mt-2">Folio</h6></label>
            <input type="text" class="form-control ml-3" style="width: 15%;"  id="id" name="id" value="{{ $mejora->id }}" readonly>
          </div>
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="inputEmail4"><h6>Dirección</h6></label>
          <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $mejora->direccion }}" readonly>
        </div>
        <div class="form-group col-md-4">
          <label for="inputEmail4"><h6>Subdirección</h6></label>
          <input type="text" class="form-control" id="subdireccion" name="subdireccion" value="{{ $mejora->subdireccion }}" readonly>
        </div>
        <div class="form-group col-md-4">
          <label for="inputPassword4"><h6>Departamento</h6></label>
          <input type="text" class="form-control" id="depto" name="depto" value="{{ $mejora->departamento }}" readonly>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-3">
        </div>
        <div class="form-group col-md-1">
          <label for="inputEmail4"><h6></h6></label>
          <input type="hidden" class="form-control" id="employeeid" name="id_jefe" value="{{ $mejora->id_autoriza }}" readonly>
        </div>
        <div class="form-group col-md-4">
          <label for="inputEmail4"><h6>Autoriza</h6></label>
          <input type="text" class="form-control cancelado" id="employee_search" value="{{ $mejora->jefes->nombre }}">
        </div>
        <div class="form-group col-md-4">
          <label for="inputPassword4"><h6>Posición</h6></label>
          <input type="text" class="form-control" id="employeedepto" value="{{ $mejora->jefes->posicion }}" readonly>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-10">
        </div>
        <div class="form-group col-md-1">
          <label for="inputEmail4"><h6>Fecha Inicio</h6></label>
          <input type="text" class="form-control datepicker" id="inicio" name="inicio" value="{{ $mejora->inicio }}" readonly>
        </div>
        <div class="form-group col-md-1">
          <label for="inputPassword4"><h6>Fecha Final</h6></label>
          <input type="text" class="form-control datepicker" id="final" name="final" value="{{ $mejora->final }}" readonly>
        </div>
      </div>
         <div class="row">
          <div class="col-md-10"></div>
          <div class=" form-group col-md-2">  
            <label for="to" class="col-form-label"><h4 class="p-0 m-0">Asesor:</h4></label>
            <input type="text" class="form-control" id="asesor" name="asesor" value="{{ $mejora->asesor }}" readonly>
          </div>
        </div>
        <div class="row">
          <div class="col-md-10"></div>
          @if (($mejora->status) == 0)
            <div class=" form-group col-md-2">  
            <label for="to" class="col-form-label"><h4 class="p-0 m-0">Status:</h4></label>
            <select type="text" class="form-control" id="status" name="status">
              @if (($mejora->status)== 0)
                <option value="{{ $mejora->status }}" selected>Cancelada</option>
              @endif
              @if (($mejora->status)== 1)
                <option value="{{ $mejora->status }}" selected>En Proceso</option>
              @endif
              @if (($mejora->status)== 2)
                <option value="{{ $mejora->status }}" selected>Terminada</option>
              @endif
                <option value="1">En Proceso</option>
              </select>
          </div>
          @else
          <div class=" form-group col-md-2">  
            <label for="to" class="col-form-label"><h4 class="p-0 m-0">Status:</h4></label>
            <select type="text" class="form-control" id="status" name="status">
              @if (($mejora->status)== 0)
                <option value="{{ $mejora->status }}" selected>Cancelada</option>
              @endif
              @if (($mejora->status)== 1)
                <option value="{{ $mejora->status }}" selected>En Proceso</option>
              @endif
              @if (($mejora->status)== 2)
                <option value="{{ $mejora->status }}" selected>Terminada</option>
              @endif
                <option value="0">Cancelada</option>
                <option value="1">En Proceso</option>
                <option value="2">Terminada</option>
              </select>
          </div>
          @endif
        </div>
        <div class="row" id="valor">
          <div class="col-md-7"></div>
          <div class=" form-group col-md-3 justify-content-end" id="valorvalid">  
            <label for="to" class="col-form-label"><h4 class="p-0 m-0">Valor Corporativo:</h4></label>
            <select type="text" class="form-control float-left cancelado" style="width: 80%;" id="valor" name="valor">
                <option value="{{ $mejora->valor }}" selected>{{ $mejora->valor }}</option>
                <option value="Calidad">Calidad</option>
                <option value="Costos">Costos</option>
                <option value="Cuidado al Medio Ambiente">Cuidado al Medio Ambiente</option>
                <option value="Medio Ambiente">Medio Ambiente</option>
                <option value="Método de Trabajo">Método de Trabajo</option>
                <option value="Productividad">Productividad</option>
                <option value="productividad y Calidad">productividad y Calidad</option>
                <option value="Productividad y Costos">Productividad y Costos</option>
                <option value="Productividad, Calidad y Costos">Productividad, Calidad y Costos</option>
                <option value="Seguridad">Seguridad</option>
              </select>
          </div>
          <div class="form-group col-md-2 justify-content-end" id="desperdiciovalid">  
            <label for="to" class="col-form-label"><h4 class="p-0 m-0">Lean Manufacturing:</h4></label>
            <select type="text" class="form-control float-right cancelado" id="desperdicio" name="desperdicio">
                <option value="{{ $mejora->desperdicio }}" selected>{{ $mejora->desperdicio }}</option>
                <option value="Ahorro de Energia">Ahorro de Energia</option>
                <option value="Ahorro de Suministros">Ahorro de Suministros</option>
                <option value="Consumo de Refacciones">Consumo de Refacciones</option>
                <option value="Costos">Costos</option>
                <option value="Defectos">Defectos</option>
                <option value="Demoras">Demoras</option>
                <option value="Demoras y Accidentes">Demoras y Accidentes</option>
                <option value="Desperdicio de Agua">Desperdicio de Agua</option>
                <option value="Disponibilidad de Equipos">Disponibilidad de Equipos</option>
                <option value="Espera">Espera</option>
                <option value="Inventario">Inventario</option>
                <option value="Medio Ambiente">Medio Ambiente</option>
                <option value="Metodo de Trabajo">Método de Trabajo</option>
                <option value="Movimiento">Movimiento</option>
                <option value="Productividad">Productividad</option>
                <option value="Sobreprocesamiento">Sobreprocesamiento</option>
                <option value="Sobreproduccion">Sobreproduccion</option>
                <option value="Talentos">Talentos</option>
                <option value="Transporacion">Transporación</option>
              </select>
          </div>
        </div>
       <br>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>A Mejorar</h6></label>
            <textarea class="form-control tomayus cancelado" maxlength="249" id="mejorar" name="mejorar" rows="4">{{ $mejora->amejorar }}</textarea>
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>Objetivo</h6></label>
            <textarea type="text" class="form-control tomayus cancelado" maxlength="249" id="objetivo" name="objetivo" rows="4">{{ $mejora->objetivo }}</textarea>
          </div> 
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <label for="inputEmail4"><h6>Solución</h6></label>
            <textarea type="text" class="form-control tomayus cancelado" maxlength="249" id="solucion" name="solucion" rows="4">{{ $mejora->solucion }}</textarea>
          </div> 
        </div>
      <?php $x=0;?>
      @foreach($mejora->empleadoss as $integrante)
        <?php $x=$x+1 ?>
        <div class="row">
          <div class="form-group col-md-2">
          </div>
          <div class="form-group col-md-1">
            <label for="inputEmail4"><h6>Ficha</h6></label>
            <input type="hidden" class="form-control" id="hidid{{$x}}" name="intego[]" value="{{ $integrante->id }}" readonly>
            <input type="hidden" class="form-control" id="hidid{{$x}}" name="integh[]" value="{{ $integrante->pivot->id }}" readonly>
            <input type="text" class="form-control ficha{{$x}}" id="employeeid{{$x}}" name="integ[]" value="{{ $integrante->id }}" readonly>
          </div>
          <div class="form-group col-md-4">
            <label for="inputEmail4"><h6>Nombre</h6></label>
            <input type="text" class="form-control nombre{{$x}} cancelado" id="employee_search{{$x}}" value="{{ $integrante->nombre }}">
          </div>
          <div class="form-group col-md-4">
            <label for="inputPassword4"><h6>Posición</h6></label>
            <input type="text" class="form-control posicion{{$x}}" id="employeedepto{{$x}}" value="{{ $integrante->posicion }}" readonly>
          </div>
          <div class="form-group col-md-1 d-flex align-items-end">
            <a class="btn btn-lg btn-outline-danger fa fa-trash" id="limpiar{{$x}}"></a>
          </div>  
        </div>
      @endforeach
      @for($x = $x+1; $x < 6; $x++)
        <div class="row">
          <div class="form-group col-md-2">
          </div>
          <div class="form-group col-md-1">
            <label for="inputEmail4"><h6>Ficha</h6></label>
            <input type="hidden" class="form-control" id="hidid{{$x}}" name="intego[]" value="0" readonly>
            <input type="hidden" class="form-control" id="hidid{{$x}}" name="integh[]" value="0" readonly>
            <input type="text" class="form-control ficha{{$x}}" id="employeeid{{$x}}" name="integ[]" value="0" readonly>
          </div>
          <div class="form-group col-md-4">
            <label for="inputEmail4"><h6>Nombre</h6></label>
            <input type="text" class="form-control nombre{{$x}} cancelado" id="employee_search{{$x}}">
          </div>
          <div class="form-group col-md-4">
            <label for="inputPassword4"><h6>Posición</h6></label>
            <input type="text" class="form-control posicion{{$x}}" id="employeedepto{{$x}}" readonly>
          </div>
           <div class="form-group col-md-1 d-flex align-items-end">
            <a class="btn btn-lg btn-outline-danger fa fa-trash" id="limpiar{{$x}}"></a>
          </div>
        </div>
      @endfor
  <br> 
  <div class="row" id="botones">
  <div class="container-contact100-form-btn">
    <button class="contact100-form-btn col-12" type="submit">
      <span>
        Guardar
        <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
      </span>
    </button>
  </div> 
</div>
</form> 
</div>
<script type="text/javascript">

    window.addEventListener("keypress", function(event){
    if (event.keyCode == 13){
        event.preventDefault();
    }
}, false);

    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){

      var c = $('#check').val();
      if (c == 0){
        $('.cancelado').prop("disabled", true);
      };

      $('#limpiar1').click(function() {
                $('.ficha1').val('0');
                $('.nombre1').val('');
                $('.posicion1').val('');
            });
      $('#limpiar2').click(function() {
                $('.ficha2').val('0');
                $('.nombre2').val('');
                $('.posicion2').val('');
            });
      $('#limpiar3').click(function() {
                $('.ficha3').val('0');
                $('.nombre3').val('');
                $('.posicion3').val('');
            });
      $('#limpiar4').click(function() {
                $('.ficha4').val('0');
                $('.nombre4').val('');
                $('.posicion4').val('');
            });
      $('#limpiar5').click(function() {
                $('.ficha5').val('0');
                $('.nombre5').val('');
                $('.posicion5').val('');
            });

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
    });
    </script>
@endsection