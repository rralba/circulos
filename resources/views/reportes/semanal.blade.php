@extends('layouts.app')

@section('content')
<style type="text/css">
.textrs{
	font-weight: bold;
	text-align: center;
}
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
		                <th class="text-center">2022</th>
		                <th class="text-center">Meta 2023</th>
		                <th class="text-center">Actual</th>
		                <th class="text-center">Avance</th>
		            </tr>
        		</thead>
        		@isset($pnew, $mnew, $sub, $pfin)
        		<tbody class="text-center">
        			<tr>
        				<td><p class="text-left">Proyectos Terminados</p></td>
        				<td><p>10</p></td>
        				<td><p>15</p></td>
        				<td><p>{{$pfin}}</p></td>
        				<td><p></p></td>
        			</tr>
        			<tr>
        				<td><p class="text-left">Nuevos Proyectos</p></td>
        				<td><p>29</p></td>
        				<td><p>34</p></td>
        				<td><p>{{$pnew}}</p></td>
        				<td><p></p></td>
        			</tr>
        			<tr>
        				<td><p class="text-left">Mejoras Rápidas Terminadas</p></td>
        				<td><p>164</p></td>
        				<td><p>183</p></td>
        				<td><p>{{$mnew}}</p></td>
        				<td><p></p></td>
        			</tr>
        			<tr>
        				<td><p class="font-weight-bold text-left">Ahorros Financieros (millones)</p></td>
        				<td><p class="font-weight-bold">691</p></td>
        				<td><p class="font-weight-bold">795</p></td>
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
        				@isset($data, $pyn1, $pyn1, $pycont, $orlandopfs, $checopfs, $isabelapfs, $edithpfs, $adrianapfs, $pyprocesoh, $pyproceson, $pyprocesom, $pycontf, $finsemh, $finsemn, $finsemm)
        				<td>
        					<p>Proyectos - Nivel 1 y 2</p>
        					<p>{{$pyn2}} Nivel 2</p>
        					<p>{{$pyn1}} Nivel 1</p>
        					<br>
        					<p>{{$pyprocesoh}} - Hércules</p>
        					<p>{{$pyproceson}} - NASA</p>
        					<p>{{$pyprocesom}} - MIMOSA</p>
        				</td>
        				<td>
        					<p>{{$pycont}} AHMSA</p>
        					<br>
        					<br>
        					<br>
        					<br>
        					<p>{{$pycontf}} Filiales</p>
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
        					<br>
        					<br>
        					<br>
        					<br>
        					@if($finsemh > 0)
        						<p>{{$finsemh}} Hércules</p>
        					@endif
        					@if($finsemm > 0)
        						<p>{{$finsemm}} MIMOSA</p>
        					@endif
        					@if($finsemn > 0)
        						<p>{{$finsemn}} NASA</p>
        					@endif
        				</td>
        				@endisset
        				<td>
        					@isset($orlando, $checo, $isabela, $edith, $adriana, $pydepto, $subm, $submh, $submn, $submm, $bensem, $bensemh, $bensemn, $bensemm, $array, $pynuevosh, $pynuevosm, $pynuevosn)
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
        					<br>
        					<br>
        					<br>
        					<br>
        					@if($pynuevosh > 0)
        						<p>{{$pynuevosh}} Hércules</p>
        					@endif
        					@if($pynuevosm > 0)
        						<p>{{$pynuevosm}} MIMOSA</p>
        					@endif
        					@if($pynuevosn > 0)
        						<p>{{$pynuevosn}} NASA</p>
        					@endif
        					<td class="text-center">
        						<p>{{ sprintf('$ %s', number_format(($subm),1, '.', ',')) }} AHMSA</p>
        						<br>
        						<br>
        						<br>
        						<p>{{ sprintf('$ %s', number_format(($submh),1, '.', ',')) }} Hércules</p>
        						<p>{{ sprintf('$ %s', number_format(($submn),1, '.', ',')) }} NASA</p>
        						<p>{{ sprintf('$ %s', number_format(($submm),1, '.', ',')) }} MIMOSA</p>
        					</td>
        					<td class="text-center">
        						<p>{{ sprintf('$ %s', number_format(($bensem),1, '.', ',')) }} AHMSA</p>
        						<br>
        						<br>
        						<br>
        						<p>{{ sprintf('$ %s', number_format(($bensemh),1, '.', ',')) }} Hércules</p>
        						<p>{{ sprintf('$ %s', number_format(($bensemn),1, '.', ',')) }} NASA</p>
        						<p>{{ sprintf('$ %s', number_format(($bensemm),1, '.', ',')) }} MIMOSA</p>
        					</td>
        					<td>
        						@foreach(json_decode($array) as $depa)
        							{{$depa->depto}},
        						@endforeach
        					</td>
        					@endisset
        				</td>
        			</tr>
        			<tr>
        				@isset($orlandom, $checom, $isabelam, $edithm, $adrianam, $mrproceso,$orlandomt, $checomt, $isabelamt, $edithmt, $adrianamt, $mrs, $mrm, $mrt, $mrn)
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
        					<p>MR Nuevas:</p>
        					@foreach(json_decode($mrn) as $mrn)
        							{{$mrn->id}},
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
        			<?php $rh=0; ?>
        			<?php $pagosumah=0; ?>
        			<?php $rn=0; ?>
        			<?php $pagosuman=0; ?>
        			<?php $rm=0; ?>
        			<?php $pagosumam=0; ?>
        			@isset($data, $datah, $datan, $datam)
        				<tr>
                			<td><p class="textrs">AHMSA</p></td>
                			<td></td>
                			<td></td>
                		</tr>
                	@foreach($data as $data)
                		<tr>
                        	<td>{{ $data->proyecto }}</td>
                        	<td>{{ $data->depto }}</td>
                        	<td class="text-right">{{ sprintf('$ %s', number_format(($data->beneficio),0, '.', ',')) }}</td>
                        	<?php
                        		$r = $data->beneficio;
                            	$pagosuma = $pagosuma + $r;
                            ?>
                        </tr>
                	@endforeach
                		<tr>
                			<td></td>
                			<td><p class="textrs">Total AHMSA</p></td>
                			<td><p class="textrs">{{ sprintf('$ %s', number_format(($pagosuma),0, '.', ',')) }}</p></td>
                		</tr>
                		<tr>
                			<td><p class="textrs">Hércules</p></td>
                			<td></td>
                			<td></td>
                		</tr>
                	@foreach($datah as $datah)
                		<tr>
                        	<td>{{ $datah->proyecto }}</td>
                        	<td>{{ $datah->depto }}</td>
                        	<td class="text-right">{{ sprintf('$ %s', number_format(($datah->beneficio),0, '.', ',')) }}</td>
                        	<?php
                        		$rh = $datah->beneficio;
                            	$pagosumah = $pagosumah + $rh;
                            ?>
                        </tr>
                	@endforeach
                		<tr>
                			<td></td>
                			<td><p class="textrs">Total Hércules</p></td>
                			<td><p class="textrs">{{ sprintf('$ %s', number_format(($pagosumah),0, '.', ',')) }}</p></td>
                		</tr>
                		<tr>
                			<td><p class="textrs">NASA</p></td>
                			<td></td>
                			<td></td>
                		</tr>
                	@foreach($datan as $datan)
                		<tr>
                        	<td>{{ $datan->proyecto }}</td>
                        	<td>{{ $datan->depto }}</td>
                        	<td class="text-right">{{ sprintf('$ %s', number_format(($datan->beneficio),0, '.', ',')) }}</td>
                        	<?php
                        		$rn = $datan->beneficio;
                            	$pagosuman = $pagosuman + $rn;
                            ?>
                        </tr>
                	@endforeach
                		<tr>
                			<td></td>
                			<td><p class="textrs">Total NASA</p></td>
                			<td><p class="textrs">{{ sprintf('$ %s', number_format(($pagosuman),0, '.', ',')) }}</p></td>
                		</tr>
                		<tr>
                			<td><p class="textrs">MIMOSA</p></td>
                			<td></td>
                			<td></td>
                		</tr>
                	@foreach($datam as $datam)
                		<tr>
                        	<td>{{ $datam->proyecto }}</td>
                        	<td>{{ $datam->depto }}</td>
                        	<td class="text-right">{{ sprintf('$ %s', number_format(($datam->beneficio),0, '.', ',')) }}</td>
                        	<?php
                        		$rm = $datam->beneficio;
                            	$pagosumam = $pagosumam + $rm;
                            ?>
                        </tr>
                	@endforeach
                		<tr>
                			<td></td>
                			<td><p class="textrs">Total MIMOSA</p></td>
                			<td><p class="textrs">{{ sprintf('$ %s', number_format(($pagosumam),0, '.', ',')) }}</p></td>
                		</tr>
                	@endisset
        		</tbody>
   			</table>
   			<div class="col col-md-3 row float-right">
	            <div class="col col-md-6 float-left m-0 p-0">
	                <p class="font-weight-bold float-right">Total de Pago:</p>
	            </div>
	            <div class="col col-md-6 float-left m-0 p-0">
	                <p class="font-weight-bold text-center">{{ sprintf('$ %s', number_format(($pagosuma+$pagosumah+$pagosuman+$pagosumam),0, '.', ',')) }}</p>
	            </div>
        	</div>	
		</div>
	</div>
	@isset($proppy, $propmr)
		<p>*Actualmente se cuenta con {{$proppy}} propuestas de Proyectos nivel 1 y 2 y con {{$propmr}} propuestas de Mejoras Rapidas</p>
	@endisset
</div>
@endsection