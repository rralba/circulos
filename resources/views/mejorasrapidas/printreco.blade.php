@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<style>
		p{
			font-family: "Segoe UI",Arial,sans-serif;
			font-size: 13px;
		}
		.fondo{
			background-color: #538ED4;
		}
		.table thead th{
    		text-align: center;
    		vertical-align: middle;
		}
		.tsb{
			overflow: hidden;
		}
	@media print{
		.imprimer table, td, th{
		    font-size: 8px;
		}
		h6{
		    font-size: 10px;
		}
		p{
			font-size: 8px;
		}
		h3{
		    font-size: 17px;
		}
		h4{
		    font-size: 11px;
		}
		h5{
		    font-size: 11px;
		}
		.fondo{
			background-color: #ffff;
		}
	}
	</style>
	<section class="imprimer">
		<br>
		<div class="conta fila mt-3">
	        <div class="col-sm-2">
	            <img src="{!! asset('jpg/logoce.jpg') !!}" class="float-center" alt="Logo de circulos de eficiencia" width="320" height="90">
	        </div>
	        <div class="center col-sm-8">
	            <h3 class="text-center mt-5">RECONOCIMIENTO DE CIRCULOS DE EFICIENCIA NIVEL 3</h3>
	            @if(($mejora->beneficiomr)==1)
	            <h3 class="text-center">CON BENEFICIO ECONOMICO</h3>
	            @endif
	        </div>
	        <div class="col-sm-2 mt-3">
	        	<div class="fila">
	            	<h6 class="col-md-3">Folio:</h6><h6 class="borde col-md-6">{{$mejora->id}}</h6>
	            </div>
	            <div class="fila">
	            	<h6 class="col-md-3">RMR:</h6><h6 class="borde col-md-6">{{$mejora->rcr}}</h6>
	        	</div>
	        	<div class="fila mt-1">
	            	<h6 class="col-md-3">Fecha:</h6><h6 class="col-md-6">{{\carbon\carbon::parse($mejora->fecha_terminacion)->format('d-M-Y')}}</h6>
	        	</div>
	        </div>   
    	</div>
    	<br>
    	<div class="col-md-12 fila">
	    	<div class="col-md-6">
	    		<div class="fila">
	    			<h6 class="col-md-2 m-2">Direccion:</h6><h6 class="bordeline col-md-8 m-2">{{$mejora->direccion}}</h6>
	    		</div>
	    		<div class="fila">
	    			<h6 class="col-md-2 m-2">Departamento:</h6><h6 class="bordeline col-md-8 m-2">{{$mejora->departamento}}</h6>
	    		</div>
	    	</div>
	    	<div class="col-md-6">
	    		<div class="fila">
	    			<h6 class="col-md-2 m-2">Subdireccion:</h6><h6 class="bordeline col-md-8 m-2">{{$mejora->subdireccion}}</h6>
	    		</div>
	    		<div class="fila">
	    			<h6 class="col-md-2 m-2">Seccion:</h6><h6 class="bordeline col-md-8 m-2">{{$mejora->seccion}}</h6>
	    		</div>
	    	</div>
    	</div>
    	<div class="col-md-12 fila">
    		<div class="col-md-12 fila">
	    		<h6 class="col-md-1 m-2">Solucion:</h6><h6 class="bordeline col-md-10 m-2">{{$mejora->solucion}}</h6>
	    	</div>
	    </div>
	    <div class="col-md-12 fila">
	    	<div class="col-md-6">
	    		<div class="fila">
	    			<h6 class="col-md-2 m-2">Asesor:</h6><h6 class="bordeline col-md-8 m-2">{{$mejora->asesor}}</h6>
	    		</div>
	    		<div class="fila">
	    			<h6 class="col-md-2 m-2">Valor Corp.:</h6><h6 class="bordeline col-md-8 m-2">{{$mejora->valor}}</h6>
	    		</div>
	    	</div>
	    </div>
	    <br>
	    <div class="col-md-12 fila">
	    	<div class="col-md-7 justify-content-end fila">
	    		@if(($mejora->beneficiomr)==1)
	            	<h6 class="col-md-4 text-right m-2">Beneficio Económico:</h6><h6 class="bordeline text-center col-md-2 m-2">${{number_format($mejora->beneficio)}}</h6>
	            @endif
	    	</div>
	    	<div class="col-md-5">
	    		<div class="justify-content-end fila">
	    			<h6 class="col-md-4 m-2 text-right">Fecha de Inicio:</h6><h6 class="bordeline text-center col-md-3 m-2">{{\carbon\carbon::parse($mejora->inicior)->format('d-M-Y')}}</h6><p class="col-md-1"></p>
	    		</div>
	    	</div>
	    </div>
	    <div class="col-md-12 fila">
	    	<div class="col-md-7 fila">
	    	</div>
	    	<div class="col-md-5">
	    		<div class="justify-content-end fila">
	    			<h6 class="col-md-4 m-2 text-right">Fecha de Terminacion:</h6><h6 class="bordeline text-center col-md-3 m-2">{{\carbon\carbon::parse($mejora->finr)->format('d-M-Y')}}</h6><p class="col-md-1"></p>
	    		</div>
	    	</div>
	    </div>
	    <?php {{$nper = $mejora->pers1+$mejora->pers2+$mejora->perco;}} ?>
	    <div class="col-md-12 fila">
	    	<div class="col-md-6">
	    		<div class="justify-content-start fila">
	    			<h6 class="col-md-2 m-2">No. Personas:</h6><h6 class="bordeline text-center col-md-1 m-2">{{$nper}}</h6>
	    		</div>
	    	</div>
	    </div>
	    <br>
	    <div id="cambia">
	    @if(($mejora->beneficiomr)==0)
       	<?php 
	       	$x=0;
	        $c=0;
	        $s1=0;
	        $s2=0;
        ?>
      	@foreach($mejora->empleadoss as $integrante)
      	@if($integrante->nivel == 1)
      	<?php $x=$x+1; ?>
      	@if((($integrante->id)==0))
      	@if($x == 1)
      	<div class="col-md-12 fila">
	    	<div class="col-md-3">
	    		<div class="fila">
	    			<h6 class="col-md-6">Autor:</h6><h6 class="bordeline col-md-4"></h6>
	    		</div>
	    	</div>
	    	<div class="col-md-5">
	    		<div class="fila mt-2">
	    			<h6 class="col-md-2">Nombre:</h6><h6 class="bordeline col-md-9"></h6>
	    		</div>
	    	</div>
	    	<div class="col-md-4">
	    		<div class="fila mt-2">
	    			<h6 class="col-md-2">puesto:</h6><h6 class="bordeline col-md-9"></h6>
	    		</div>
	    	</div>
    	</div>
      	@else
      	<div class="col-md-12 fila">
	    	<div class="col-md-3">
	    		<div class="fila">
	    			<h6 class="col-md-6">Integrante:</h6><h6 class="bordeline col-md-4"></h6>
	    		</div>
	    	</div>
	    	<div class="col-md-5">
	    		<div class="fila">
	    			<h6 class="col-md-2 mt-2">Nombre:</h6><h6 class="bordeline col-md-9"></h6>
	    		</div>
	    	</div>
	    	<div class="col-md-4">
	    		<div class="fila">
	    			<h6 class="col-md-2 mt-2">puesto:</h6><h6 class="bordeline col-md-9"></h6>
	    		</div>
	    	</div>
    	</div>
      	@endif
      	@else
      	@if($x == 1)
      	@if((($integrante->cia)==1000))
      		<?php $s1=$s1+1; ?>
      	@else
      	@if((($integrante->cia)==2000))
      		<?php $s2=$s2+1; ?>
      	@else
      		<?php $c=$c+1; ?>
      	@endif
      	@endif
      	<div class="col-md-12 fila">
	    	<div class="col-md-3">
	    		<div class="fila">
	    			<h6 class="col-md-6">Ficha Autor:</h6><h6 class="bordeline col-md-4 text-center">{{ $integrante->pivot->empleado_id }}</h6>
	    		</div>
	    	</div>
	    	<div class="col-md-5">
	    		<div class="fila mt-2">
	    			<h6 class="col-md-2 mr-2">Nombre:</h6><h6 class="bordeline col-md-9 ml-2">{{ $integrante->nombre }}</h6>
	    		</div>
	    	</div>
	    	<div class="col-md-4">
	    		<div class="fila mt-2">
	    			<h6 class="col-md-2 mr-2">puesto:</h6><h6 class="bordeline col-md-9 ml-2">{{ $integrante->posicion }}</h6>
	    		</div>
	    	</div>
    	</div>
      	@else
      	@if((($integrante->cia)==1000))
      		<?php $s1=$s1+1; ?>
      	@else
      	@if((($integrante->cia)==2000))
      		<?php $s2=$s2+1; ?>
      	@else
      		<?php $c=$c+1; ?>
      	@endif
      	@endif
      	<div class="col-md-12 fila">
	    	<div class="col-md-3">
	    		<div class="fila">
	    			<h6 class="col-md-6">Ficha Integrante:</h6><h6 class="bordeline col-md-4 text-center">{{ $integrante->pivot->empleado_id }}</h6>
	    		</div>
	    	</div>
	    	<div class="col-md-5">
	    		<div class="fila mt-2">
	    			<h6 class="col-md-2 mr-2">Nombre:</h6><h6 class="bordeline col-md-9 ml-2">{{ $integrante->nombre }}</h6>
	    		</div>
	    	</div>
	    	<div class="col-md-4">
	    		<div class="fila mt-2">
	    			<h6 class="col-md-2 mr-2">puesto:</h6><h6 class="bordeline col-md-9 ml-2">{{ $integrante->posicion }}</h6>
	    		</div>
	    	</div>
    	</div>
      	@endif
      	@endif
      	@endif
      	@endforeach
      	@for($x = $x+1; $x < 6; $x++)
       <div class="col-md-12 fila">
	    	<div class="col-md-3">
	    		<div class="fila">
	    			<h6 class="col-md-6">Ficha Integrante:</h6><h6 class="bordeline col-md-4 text-center"></h6>
	    		</div>
	    	</div>
	    	<div class="col-md-5">
	    		<div class="fila mt-2">
	    			<h6 class="col-md-2 mr-2">Nombre:</h6><h6 class="bordeline col-md-9 ml-2"></h6>
	    		</div>
	    	</div>
	    	<div class="col-md-4">
	    		<div class="fila mt-2">
	    			<h6 class="col-md-2 mr-2">puesto:</h6><h6 class="bordeline col-md-9 ml-2"></h6>
	    		</div>
	    	</div>
    	</div>
      	@endfor
      	<br>
      	<div id="sinb" class="table-responsive tsb">
    	<table class="table table-bordered mb-0 tsb">
		  	<thead>
			    <tr>
			      	<th width="13%" class="text-center" scope="col"><h4>PORCENTAJE</h4></th>
			      	<th width="13%" class="text-center" scope="col"><h4>30%</h4></th>
			      	<th width="13%" class="text-center" scope="col"><h4>40%</h4></th>
			      	<th width="13%" class="text-center" scope="col"><h4>50%</h4></th>
			      	<th width="13%" class="text-center" scope="col"><h4>70%</h4></th>
			      	<th width="13%" class="text-center" scope="col"><h4>90%</h4></th>
			      	<th width="13%" class="text-center" scope="col"><h4>100%</h4></th>
			      	<th width="8%" class="text-center" scope="col"><h4>TOTAL</h4></th>
			    </tr>
			</thead>
			<tbody>
			    <tr>
			      	<th class="text-center" scope="row" rowspan="3"><h4>APLICABILIDAD</h4></th>
			      	<td class="text-center p-0"><h6>Aplica únicamente en un equipo especifico.</h6></td>
			      	<td class="text-center p-0"><h6>Aplica específicamente en su área de trabajo.</h6></td>
			      	<td class="text-center p-0"><h6>Aplica en su propia sección operativa.</h6></td>
			      	<td class="text-center p-0"><h6>Aplica en otra sección dentro del mismo departamento.</h6></td>
			      	<td class="text-center p-0"><h6>Aplica en otro departamento.</h6></td>
			      	<td class="text-center p-0"><h6>Aplicación general en otros departamentos.</h6></td>
			      	<td> </td>
			    </tr>
			    <tr>
			      	<td class="borde fondo p-0"><br></td>
			      	<td class="borde fondo p-0"><br></td>
			      	<td class="borde fondo p-0"><br></td>
			      	<td class="borde fondo p-0"><br></td>
			      	<td class="borde fondo p-0"><br></td>
			      	<td class="borde fondo p-0"><br></td>
			      	<td class="borde fondo p-0"><br></td>
			    </tr>
			    <tr>
			    	<div class="input-group">
			      	<td class="text-center"><h6>0%</h6></td>
			      	<td class="text-center"><h6>0%</h6></td>
			      	<td class="text-center"><h6>0%</h6></td>
			      	<td class="text-center"><h6>0%</h6></td>
			      	<td class="text-center"><h6>0%</h6></td>
			      	<td class="text-center"><h6>0%</h6></td>
			      	<td><h6 class="text-center">{{$mejora->evala}}%</h6></td>
			      	</div>
			    </tr>
			    <tr>
			      	<th class="text-center" scope="row" rowspan="3"><h4>ORIGINALIDAD</h4></th>
			      	<td class="text-center p-0"><h6>Idea con alto grado de sencillez.</h6></td>
			      	<td class="text-center p-0"><h6>Idea basada en procesos similares.</h6></td>
			      	<td class="text-center p-0"><h6>Idea muy buena.</h6></td>
			      	<td class="text-center p-0"><h6>Idea de alta creatividad.</h6></td>
			      	<td class="text-center p-0"><h6>Idea innovadora.</h6></td>
			      	<td class="text-center p-0"><h6>Idea medible.</h6></td>
			      	<td> </td>
			    </tr>
			    <tr>
			      	<td class="borde fondo p-0"><br></td>
			      	<td class="borde fondo p-0"><br></td>
			      	<td class="borde fondo p-0"><br></td>
			      	<td class="borde fondo p-0"><br></td>
			      	<td class="borde fondo p-0"><br></td>
			      	<td class="borde fondo p-0"><br></td>
			      	<td class="borde fondo p-0"><br></td>
			    </tr>
			    <tr>
			    	<div class="input-group">
			      	<td class="text-center"><h6>0%</h6></td>
			      	<td class="text-center"><h6>0%</h6></td>
			      	<td class="text-center"><h6>0%</h6></td>
			      	<td class="text-center"><h6>0%</h6></td>
			      	<td class="text-center"><h6>0%</h6></td>
			      	<td class="text-center"><h6>0%</h6></td>
			      	<td><h6 class="text-center">{{$mejora->evalo}}%</h6></td>
			      	</div>
			    </tr>
			    <tr>
			      	<th class="text-center" scope="row" rowspan="3"><h4>ESFUERZO</h4></th>
			      	<td class="text-center p-0"><h6>La mejora requirió en su mayoría de inversión, por lo que la participación en la implementación fue mínima.</h6></td>
			      	<td class="text-center p-0"><h6>Recibió ayuda de expertos en el tema para llevar a cabo su mejora.</h6></td>
			      	<td class="text-center p-0"><h6>Solo sugirió la mejora y/o el supervisor o Mandos Medios apoyo (apoyaron) en gran parte.</h6></td>
			      	<td class="text-center p-0"><h6>Requirió poca ayuda de Supervisor y/o Mandos Medios para implementar la mejora.</h6></td>
			      	<td class="text-center p-0"><h6>Implemento la mejora por si mismo (ellos mismos).</h6></td>
			      	<td class="text-center p-0"><h6>Implemento la mejora en varios lugares de trabajo.</h6></td>
			      	<td> </td>
			    </tr>
			    <tr>
			      	<td class="borde fondo p-0"><br></td>
			      	<td class="borde fondo p-0"><br></td>
			      	<td class="borde fondo p-0"><br></td>
			      	<td class="borde fondo p-0"><br></td>
			      	<td class="borde fondo p-0"><br></td>
			      	<td class="borde fondo p-0"><br></td>
			      	<td class="borde fondo p-0"><br></td>
			    </tr>
			    <tr>
			    	<div class="input-group">
			      	<td class="text-center"><h6>0%</h6></td>
			      	<td class="text-center"><h6>0%</h6></td>
			      	<td class="text-center"><h6>0%</h6></td>
			      	<td class="text-center"><h6>0%</h6></td>
			      	<td class="text-center"><h6>0%</h6></td>
			      	<td class="text-center"><h6>0%</h6></td>
			      	<td><h6 class="text-center">{{$mejora->evale}}%</h6></td>
			      	</div>
			    </tr>
		  	</tbody>
		</table>
		<div class="row">
			<div class="col-md-9"></div>
			<div class="row col-md-3">
				<div class="col-md-2"></div>
				<div class="col-md-6 borde">
					<p>PROMEDIO PORCENTUAL</p>
				</div>
				<div class="col-md-4 borde">
					<td><h6 class="text-center">{{number_format(($mejora->evala+$mejora->evalo+$mejora->evale)/3),2}}%</h6></td>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9"></div>
			<div class="row col-md-3">
				<div class="col-md-2"></div>
				<div class="col-md-6 borde">
					<p>MONTO TOTAL MAXIMO</p>
				</div>
				<div class="col-md-4 borde text-center">
					<h6>$5,000</h6>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9"></div>
			<div class="row col-md-3">
				<div class="col-md-2"></div>
				<div class="col-md-6 borde">
					<p>PAGO POR EQUIPO</p>
				</div>
				<div class="col-md-4 borde">
					<td><h6 class="text-center">${{number_format(($mejora->ppp)*$nper)}}</h6></td>
				</div>
			</div>
		</div>
		<br>
		<div class="fila">
			<div class="col-md-9 fila">
				<div class="col-md-4"></div>
				<div class="col-md-3">
					<h6 class="text-center">{{$jefe}}</h6>
					<h6 class="text-center">Jefe de Circulos de Eficiencia</h6>
				</div>
				<div class="col-md-3">
					<h6 class="text-center">Ing. Elena Aracely Flores López</h6>
					<h6 class="text-center">Gerente de Capacitacion</h6>
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="fila col-md-3">
				<div class="col-md-2 m-0"></div>
				<div class="col-md-6 borde">
					<p>PAGO POR PERSONA</p>
				</div>
				<div class="col-md-4 borde">
					<td><h6 class="text-center">${{number_format($mejora->ppp)}}</h6></td>
				</div>
			</div>
		</div>
		@else
		<?php 
			{{$cp = (($mejora->beneficio*.05)/$nper);}}
		 ?>
		<div id="conb" class="table-responsive tsb">
	    	<table class="table table-hover table-bordered tsb">
			  	<thead>
				    <tr>
				      	<th class="text-center" scope="col" style="background-color: #B6DEE9"><h5>ROL</h5></th>
				      	<th class="text-center" scope="col" style="background-color: #B6DEE9"><h5>FICHA</h5></th>
				      	<th class="text-center" scope="col" style="background-color: #B6DEE9"><h5>NOMBRE</h5></th>
				      	<th class="text-center" scope="col" style="background-color: #B6DEE9"><h5>PUESTO</h5></th>
				      	<th class="text-center" scope="col" style="background-color: #B6DEE9"><h5>BONIFICACIÓN</h5></th>
				      	<th width="18%" class="text-center" scope="col" style="background-color: #B6DEE9"><h5>PROPORCIONAL 5% BENEFICIO ECONÓMICO</h5></th>
				      	<th class="text-center" scope="col" style="background-color: #B6DEE9"><h5>TOTAL</h5></th>
				    </tr>
				</thead>
				<tbody>
				<?php 
			       	$x=0;
        		?>
		      	@foreach($mejora->empleadoss as $integrante)
		      	@if($integrante->nivel == 1)
		      	<?php $x=$x+1; ?>
		      	@if($x == 1)
		      	<tr>
		      		<td class="text-center"><h6>Autor</h6></td>
		      		<td class="text-center"><h6>{{ $integrante->pivot->empleado_id }}</h6></td>
		      		<td class="text-left"><h6>{{ $integrante->nombre }}</h6></td>
		      		<td class="text-left"><h6>{{ $integrante->posicion }}</h6></td>
		      		<td class="text-center"><h6>$700</h6></td>
		      		<td class="text-center"><h6>${{number_format(($cp))}}</h6></td>
		      		<td class="text-center"><h6>${{number_format(($cp)+700)}}</h6></td>
		      	</tr>
		      	@else
		      	<tr>
		      		<td class="text-center"><h6>Integrante</h6></td>
		      		<td class="text-center"><h6>{{ $integrante->pivot->empleado_id }}</h6></td>
		      		<td class="text-left"><h6>{{ $integrante->nombre }}</h6></td>
		      		<td class="text-left"><h6>{{ $integrante->posicion }}</h6></td>
		      		<td class="text-center"><h6>$700</h6></td>
		      		<td class="text-center"><h6>${{number_format(($cp))}}</h6></td>
		      		<td class="text-center"><h6>${{number_format(($cp)+700)}}</h6></td>
		      	</tr>
		      	@endif
		      	@endif
		      	@endforeach
		      	@for($x = $x+1; $x < 6; $x++)
		       		<td class="text-center"><h6></h6></td>
		      	@endfor
				</tbody>
			</table>
		</div>
		<br>
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-9"></div>
			<div class="row col-md-3">
				<div class="col-md-2"></div>
				<div class="col-md-6 borde">
					<p>BONIFICACIÓN</p>
				</div>
				<div class="col-md-4 borde">
					<td><h6 class="text-center">${{number_format(700*$nper)}}</h6></td>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9"></div>
			<div class="row col-md-3">
				<div class="col-md-2"></div>
				<div class="col-md-6 borde">
					<p>5% BENEFICIO ECONÓMICO</p>
				</div>
				<div class="col-md-4 borde text-center">
					<td><h6 class="text-center">${{number_format($mejora->beneficio*.05)}}</h6></td>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9"></div>
			<div class="row col-md-3">
				<div class="col-md-2"></div>
				<div class="col-md-6 borde">
					<p>PAGO POR EQUIPO</p>
				</div>
				<div class="col-md-4 borde">
					<td><h6 class="text-center">${{number_format(($mejora->ppp)*$nper)}}</h6></td>
				</div>
			</div>
		</div>
		<br>
		<div class="fila">
			<div class="col-md-9 fila">
				<div class="col-md-4"></div>
				<div class="col-md-3">
					<h6 class="text-center">{{$jefe}}</h6>
					<h6 class="text-center">Jefe de Circulos de Eficiencia</h6>
				</div>
				<div class="col-md-3">
					<h6 class="text-center">Ing. Elena Aracely Flores López</h6>
					<h6 class="text-center">Gerente de Capacitacion</h6>
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="fila col-md-3">
				<div class="col-md-2 m-0"></div>
				<div class="col-md-6 borde">
					<p>PAGO POR PERSONA</p>
				</div>
				<div class="col-md-4 borde">
					<td><h6 class="text-center">${{number_format($mejora->ppp)}}</h6></td>
				</div>
			</div>
		</div>
		@endif
		<br>
			<div class="row">
				<div class="col-md-11"></div>
				<div class="col-md-1">
					<h6>RHC-02-F-10</h6>
				</div>
			</div>
    	</div>
	    </div>
	    <br>
	    <div id="botones">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <a class="imprimir btn btn-outline-primary btn-lg float-right fa fa-print" href="#">Imprimir</a>
            </div>
            <div class="col-md-6"></div>
        </div>        
    </div>
	    <br>
	</section>
</div>
<script>
    $('.imprimir').click(function(){
        window.print();
        return false;
    });       
</script>
@endsection