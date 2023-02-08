@extends('layouts.app')

@section('content')
<style>
	.table th, .table td {
    	padding: 0rem;
    }
	@media only screen and (max-width: 1400px){   
		h6{
			font-size: 14px;
		}
		h2{
			font-size: 26px;
		}
		.imprimer img{
      		width: 280px;
      		height: 70px;
		} 
	</style>
<div class="container-fluid">
	<section class="imprimer">
		<br>
		<div class="borde1 fila">
			<div class="left col-sm-3 m-0 p-0">
	            <img src="{!! asset('jpg/logoce.jpg') !!}" class="float-center imagen1" alt="Logo de circulos de eficiencia" width="320" height="90">
	        </div>
	        <div class="center col-sm-9">
	            <h2 id="titulo" class="text-center mt-4 borde">REPORTE DE CASO RESUELTO</h2>
	        </div> 
		</div>
		<br>
		<div class="contenido borde1">
			<div class="fila">
				<div class="col-md-6"></div>
				<div class="col-md-6 fila1 justify-content-end">
					<h6 class="col-md-5 text-right">Reporte de Caso Resuelto:</h6><input type="text" name="rcr" class="col-md-3 bordeline">
				</div>	
			</div>
			<div class="fila">
				<div class="col-md-8 fila1">
					<h6 class="col-md-2 text-left">Nombre del Equipo:</h6><input type="text" name="rcr" class="col-md-7 bordeline">
				</div>
				<div class="col-md-4 fila1 justify-content-end">
					<h6 class="col-md-2 text-right">CE - N1:</h6><input type="text" name="rcr" class="col-md-1 borde">
					<h6 class="col-md-2 text-right">CE - N2:</h6><input type="text" name="rcr" class="col-md-1 borde">
				</div>
			</div>
			<div class="col-md-12 fila1">
				<h6 class="col-md-1 text-left">Proyecto:</h6><input type="text" name="rcr" class="col-md-11 bordeline">
			</div>
			<div class="col-md-12 fila1">
				<div class="col-md-6 fila1">
					<h6 class="col-md-2 text-left">Departamento:</h6><input type="text" name="depto" class="col-md-10 bordeline">
				</div>
				<div class="col-md-6 fila1">
					<h6 class="col-md-2 text-left">Asesor de Área:</h6><input type="text" name="asesor" class="col-md-10 bordeline">
				</div>
			</div>
			<div class="col-md-12 fila1">
				<div class="col-md-10 fila1">
					<h6 class="col-md-2 text-left">Valor Corporativo:</h6><input type="text" name="valor" class="col-md-10 bordeline">
				</div>
				<div class="col-md-2 fila1">
					<h6 class="col-md-2 text-left">Nivel:</h6><input type="text" name="nivel" class="col-md-10 bordeline">
				</div>
			</div>
			<div class="col-md-12 fila1">
				<div class="col-md-5 fila1">
					<h6 class="col-md-2 text-left">Metodología:</h6><input type="text" name="depto" class="col-md-10 bordeline">
				</div>
				<div class="col-md-5 fila1">
					<h6 class="col-md-3 text-left">Tipo de Innovación:</h6><input type="text" name="asesor" class="col-md-9 bordeline">
				</div>
				<div class="col-md-2 fila1">
					<h6 class="col-md-4 text-left">Patente:</h6><h6 class="col-md-2">SI</h6><input type="text" name="rcr" class="col-md-2 borde"><h6 class="col-md-2">NO</h6><input type="text" name="rcr" class="col-md-2 borde">
				</div>
			</div>
			<div class="col-md-12 fila1">
				<div class="col-md-6 fila1">
					<h6 class="col-md-4 text-left">Fecha Selección del Proyecto:</h6><input type="text" name="depto" class="col-md-8 bordeline">
				</div>
				<div class="col-md-6 fila1">
					<h6 class="col-md-3 text-left">Fecha de Terminación:</h6><input type="text" name="asesor" class="col-md-9 bordeline">
				</div>
			</div>
			<div class="subtitulo fila">
				<h6 class="col-md-4 text-left">Integrantes (Nombre completo)</h6><h6 class="col-md-2 text-left">Ficha (S-NS)</h6><h6 class="col-md-4 text-left"></h6><h6 class="col-md-2 text-left">Ficha (S-NS)</h6>
			</div>
			<?php 
	       		$x=0;
        	?>
        	<div class="col-md-12 row">
        	@foreach($proyect->empleados as $integrantes)
        		<?php $x=$x+1;
        			  $rol ="";
        			  $cia ="";
        		?>
        		@switch(true)
	        		@case($integrantes->pivot->rol == 1)
	        			<?php $rol = "*"?>
	        			@break
	        		@case($integrantes->pivot->rol == 2)
	        			<?php $rol = "A"?>
	        			@break
	        		@case($integrantes->pivot->rol == 3)
	        			<?php $rol = "B"?>
	        			@break
        		@endswitch
        		@switch(true)
	        		@case($integrantes->cia == 1000)
	        			<?php $cia = "S"?>
	        			@break
	        		@case($integrantes->cia == 2000)
	        			<?php $cia = "S"?>
	        			@break
	        		@case($integrantes->cia > 3000)
	        			<?php $cia = "NS"?>
	        			@break
        		@endswitch
        		@if($x<=5)
	        		<div class="col-md-6 pl-4 justify-content-start fila1">
	        			<h6>{{$x}}.-</h6><h6 class="col-md-7 bordeline">{{ $integrantes->nombre }} ({{ $rol }}) </h6><h6 class="col-md-1"></h6><h6 class="col-md-2 bordeline">{{ $integrantes->id}} - {{ $cia }}</h6>
	        		</div>
        		@else
        			<div class="col-md-6 pl-4 justify-content-start fila1">
	        			<h6>{{$x}}.-</h6><h6 class="col-md-7 bordeline">{{ $integrantes->nombre }} ({{ $rol }}) </h6><h6 class="col-md-1"></h6><h6 class="col-md-2 bordeline">{{ $integrantes->id}} - {{ $cia }}</h6>
	        		</div>
        		@endif
 			@endforeach
 			@for($i=$x+1; $i<11; $i++)
 				<div class="col-md-6 pl-4 justify-content-start fila1">
	        		<h6>{{$i}}.-</h6><h6 class="col-md-7 bordeline"></h6>
	        	</div>
 			@endfor
 			</div>
 			<p>* Autor, Implementador (A/B)</p>
 			<br>
 			<div class="col-md-12 fila1">
				<h6 class="col-md-1 text-left">Meta:</h6><input name="meta" class="col-md-11 bordeline">
			</div>
			<br>
 			<div class="col-md-12 fila1">
				<h6 class="col-md-2 text-left">Solucion(es) Final(es):</h6><input name="meta" class="col-md-10 bordeline">
				<input name="meta" class="col-md-12 bordeline">
				<input name="meta" class="col-md-12 bordeline">
				<input name="meta" class="col-md-12 bordeline">
				<input name="meta" class="col-md-12 bordeline">
			</div>
			<br>
			<div class="col-md-12 fila1">
				<h6 class="col-md-8 text-left">Beneficios Obtenidos:(Tangibles e Intangibles y efectos secundarios)</h6>
				<input name="meta" class="col-md-12 bordeline">
				<input name="meta" class="col-md-12 bordeline">
				<input name="meta" class="col-md-12 bordeline">
				<input name="meta" class="col-md-12 bordeline">
				<input name="meta" class="col-md-12 bordeline">
				<input name="meta" class="col-md-12 bordeline">
			</div>
			<div class="subtitulo fila">
				<h6 class="col-md-12 text-center">(* Se deberán de anexar los soportes correspondientes a este caso resuelto)</h6>
			</div>
			<br>
			<h6>Beneficios en Términos Económicos</h6>
			<div class="subtitulo fila">
				<h6 class="col-md-2 text-right">Beneficio Económico Directo $</h6><input name="meta" class="col-md-1 inpbenef"><h6 class="col-md-4"></h6><h6 class="col-md-3 text-right">Beneficio Económico Potencial $</h6><input name="meta" class="col-md-1 inpbenef">
			</div>
			<br>
			<div class="table-responsive">
				<table class="table table-hover table-bordered text-center">
					<thead>
						<tr>
							<th width="20%">Firma</th>
							<th width="20%">Firma</th>
							<th width="20%">Firma</th>
							<th width="20%">Firma</th>
							<th width="20%">Firma</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								Ing. Elena Aracely Flores López
							</td>
							<td>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<input type="text" class="col-md-12 text-center" id="cenom" name="cenom" placeholder="Escribe el nombre del empleado">
							</td>
							<td>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<input type="text" class="col-md-12 text-center" id="sanom" name="sanom" placeholder="Escribe el nombre del empleado">
							</td>
							<td>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<input type="text" class="col-md-12 text-center" id="avnom" name="avnom" placeholder="Escribe el nombre del empleado">
							</td>
							<td>
								<br>
								<br>
								<br>
								<br>
								<input type="text" class="col-md-12 text-center" id="ganom" name="ganom" placeholder="Escribe el nombre del empleado"><br>
								DOY FE<br>
								Subdirector y/o
							</td>
						</tr>
						<tr>
							<td>Gerencia de Capacitación</td>
							<td>Jefe Círculos de Eficiencia</td>
							<td>Superintendente de Área</td>
							<td>Área de Validación</td>
							<td>Gerenre de Área</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<p class="text-right">RHC-02-F-06a</p>
		<br>
		<div id="botones">
	        <div class="row">
	            <div class="col-xs-12 col-md-6">
	                <a class="imprimir btn btn-outline-primary btn-lg float-right fa fa-print" href="#">Imprimir</a>
	            </div>
	            <div class="col-md-6"></div>
	        </div>        
    	</div>
	</section>
</div>
<script>
    $('.imprimir').click(function(){
        window.print();
        return false;
    });   

    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){

      $( "#cenom" ).autocomplete({
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
           $('#cenom').val(ui.item.label); // display the selected text
           return false;
        }
      });
    $( "#sanom" ).autocomplete({
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
           $('#sanom').val(ui.item.label); // display the selected text
           return false;
        }
      });
    $( "#avnom" ).autocomplete({
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
           $('#avnom').val(ui.item.label); // display the selected text
           return false;
        }
      });
    $( "#ganom" ).autocomplete({
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
           $('#ganom').val(ui.item.label); // display the selected text
           return false;
        }
      });

     });    
</script>
@endsection