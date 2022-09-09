@extends('layouts.app')

@section('content')
<style type="text/css">
.table td {
	padding: 0.15rem;
}
.table th {
	padding: 0.35rem;
}
</style>
<div class="container">
	<form action="{{ route('reportes.data') }}" method = "POST">
		{{ csrf_field() }}
		<div class="row justify-content-center mt-4">
	        <div class="form-group col-md-7"></div>
	        <div class="row form-group col-md-2">
	          	<label><h6 class="mr-3 mt-2">Inicio</h6></label>
	          	<input type="text" class="form-control datepickersemanal" style="width: 100px;" id="iniciors" name="iniciors">
	        </div>
	        <div class="row form-group col-md-2">
	          	<label><h6 class="mr-3 mt-2">Final</h6></label>
	          	<input type="text" class="form-control datepickersemanal" style="width: 100px;" id="finalrs" name="finalrs">
	        </div>
	        <div class="form-group col-md-1">
	        	<button type="submit" class="btn btn-primary">Enviar</button>
	        </div>	
      </div>
	</form>
	<hr>
	<div>
		<h3>Círculos de Eficiencia</h3>
		<div class="table-responsive">
   			<table class="table table-striped table-hover table-bordered">
        		<thead class="">
		            <tr>
		                <th class="text-center">Principales KPI´s Círculos de Eficiencia</th>
		                <th class="text-center">2021</th>
		                <th class="text-center">Meta 2022</th>
		                <th class="text-center">Actual</th>
		                <th class="text-center">Avance</th>
		            </tr>
        		</thead>
        		@isset($pnew, $mnew, $sub, $pfin)
        		<tbody class="text-center">
        			<tr>
        				<td><p class="text-left">Proyectos Terminados</p></td>
        				<td><p>12</p></td>
        				<td><p>15</p></td>
        				<td><p>{{$pfin}}</p></td>
        				<td><p></p></td>
        			</tr>
        			<tr>
        				<td><p class="text-left">Nuevos Proyectos</p></td>
        				<td><p>28</p></td>
        				<td><p>33</p></td>
        				<td><p>{{$pnew}}</p></td>
        				<td><p></p></td>
        			</tr>
        			<tr>
        				<td><p class="text-left">Mejoras Rápidas Terminadas</p></td>
        				<td><p>126</p></td>
        				<td><p>145</p></td>
        				<td><p>{{$mnew}}</p></td>
        				<td><p></p></td>
        			</tr>
        			<tr>
        				<td><p class="font-weight-bold text-left">Ahorros Financieros (millones)</p></td>
        				<td><p class="font-weight-bold">540.6</p></td>
        				<td><p class="font-weight-bold">622</p></td>
        				<td class="font-weight-bold">{{ sprintf('$ %s', number_format(($sub),1, '.', ',')) }}</td>
        				<td><p></p></td>
        			</tr>
        		</tbody>
        		@endisset
        	</table>
        </div>
	</div>
	<br>
	<div>
		<h3>Resultados Círculos de eficiencia de la Semana</h3>
		<div class="table-responsive">
   			<table class="table table-striped table-hover table-bordered">
        		<thead class="">
		            <tr>
		                <th width="20%">Círculos de Eficiencia</th>
		                <th width="10%">En Proceso</th>
		                <th width="10%">Terminados</th>
		                <th width="10%">Nuevos</th>
		                <th width="10%">Beneficios Mensual</th>
		                <th width="10%">Beneficios Semanal</th>
		                <th width="30%">Departamentos</th>
		            </tr>
        		</thead>
        		<tbody>
        			<tr>
        				@isset($data, $pyn1, $pycont, $orlandopfs, $checopfs, $isabelapfs, $edithpfs, $adrianapfs)
        				<td>
        					<p>Proyectos - Nivel 1 y 2</p>
        					<p>{{$pyn2}} Nivel 2</p>
        					<p>{{$pyn1}} Nivel 1</p>
        				</td>
        				<td>
        					<p>{{$pycont}} AHMSA</p>
        				</td>
        				<td>
        					@if($orlandopfs > 0)
        						<p>{{$orlandopfs}} Orlando</p>
        					@endif
        					@if($checopfs > 0)
        						<p>{{$checopfs}} Sergio</p>
        					@endif
        					@if($isabelapfs > 0)
        						<p>{{$isabelapfs}} Isabela</p>
        					@endif
        					@if($edithpfs > 0)
        						<p>{{$edithpfs}} Edith</p>
        					@endif
        					@if($adrianapfs > 0)
        						<p>{{$adrianapfs}} Adriana</p>
        					@endif
        				</td>
        				@endisset
        				<td>
        					@isset($orlando, $checo, $isabela, $edith, $adriana, $pydepto, $subm, $bensem, $array)
        					@if($orlando > 0)
        						<p>{{$orlando}} Orlando</p>
        					@endif
        					@if($checo > 0)
        						<p>{{$checo}} Sergio</p>
        					@endif
        					@if($isabela > 0)
        						<p>{{$isabela}} Isabela</p>
        					@endif
        					@if($edith > 0)
        						<p>{{$edith}} Edith</p>
        					@endif
        					@if($adriana > 0)
        						<p>{{$adriana}} Adriana</p>
        					@endif
        					<td class="text-center">{{ sprintf('$ %s', number_format(($subm),1, '.', ',')) }}</td>
        					<td class="text-center">{{ sprintf('$ %s', number_format(($bensem),1, '.', ',')) }}</td>
        					<td>
        						@foreach(json_decode($array) as $depa)
        							{{$depa->depto}},
        						@endforeach
        					</td>
        					@endisset
        				</td>
        			</tr>
        			<tr>
        				@isset($orlandom, $checom, $isabelam, $edithm, $adrianam, $mrproceso,$orlandomt, $checomt, $isabelamt, $edithmt, $adrianamt, $mrs, $mrm)
        				<td>
        					<p>Mejoras Rápidas - Nivel 3</p>
        				</td>
        				<td>{{$mrproceso}}</td>
        				<td>
        					@if($orlandomt > 0)
        						<p>{{$orlandomt}} Orlando</p>
        					@endif
        					@if($checomt > 0)
        						<p>{{$checomt}} Sergio</p>
        					@endif
        					@if($isabelamt > 0)
        						<p>{{$isabelamt}} Isabela</p>
        					@endif
        					@if($edithmt > 0)
        						<p>{{$edithmt}} Edith</p>
        					@endif
        					@if($adrianamt > 0)
        						<p>{{$adrianamt}} Adriana</p>
        					@endif
        				</td>
        				<td>
        					@if($orlandom > 0)
        						<p>{{$orlandom}} Orlando</p>
        					@endif
        					@if($checom > 0)
        						<p>{{$checom}} Sergio</p>
        					@endif
        					@if($isabelam > 0)
        						<p>{{$isabelam}} Isabela</p>
        					@endif
        					@if($edithm > 0)
        						<p>{{$edithm}} Edith</p>
        					@endif
        					@if($adrianam > 0)
        						<p>{{$adrianam}} Adriana</p>
        					@endif
        				</td>
        				<td class="text-center">{{ sprintf('$ %s', number_format(($mrm),1, '.', ',')) }}</td>
        				<td class="text-center">{{ sprintf('$ %s', number_format(($mrs),1, '.', ',')) }}</td>
        				<td>
        					<p>MR Terminadas:</p>
        					@foreach(json_decode($mrt) as $mrt)
        							{{$mrt->id}},
        						@endforeach
        				</td>
        				@endisset
        			</tr>
        		</tbody>
        	</table>
        </div>
    </div>
    <br>
	<div>
		<h3>Ahorros Financieros de la semana avalados por control planta</h3>
		<div class="table-responsive">
   			<table class="table table-striped table-hover table-bordered">
        		<thead class="">
		            <tr>
		                <th>Círculos de Eficiencia</th>
		                <th>Departamentos</th>
		                <th>Beneficios</th> 
		            </tr>
        		</thead>
        		<tbody>
        			<?php $r=0; ?>
        			<?php $pagosuma=0; ?>
        			@isset($data)
                	@foreach($data as $data)
                		<tr>
                        	<td>{{ $data->proyecto }}</td>
                        	<td>{{ $data->depto }}</td>
                        	<td class="text-right">{{ sprintf('$ %s', number_format(($data->beneficio),0, '.', ',')) }}</td>
                        	<?php
                        		$r = $data->beneficio;
                            	$pagosuma = $pagosuma + $r;
                            ?>
                	@endforeach
                	@endisset
        		</tbody>
   			</table>
   			<div class="col col-md-3 row float-right">
	            <div class="col col-md-6 float-left m-0 p-0">
	                <p class="font-weight-bold float-right">Total de Pago:</p>
	            </div>
	            <div class="col col-md-6 float-left m-0 p-0">
	                <p class="font-weight-bold text-center">{{ sprintf('$ %s', number_format(($pagosuma),0, '.', ',')) }}</p>
	            </div>
        	</div>	
		</div>
	</div>	
</div>
@endsection