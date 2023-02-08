@extends('layouts.appm')

@section('content')
<div class="m-1">
	<style>
		p{
			line-height: 1;
		}
		.table-responsive{
			overflow-y: hidden;
		}
		
		@page printcons {
				size: letter landscape;
			  	margin-top: 25px;
			  	margin-left: 15px;
			  	margin-right: 15px;
			  	margin-bottom: 5px;
			}
			
			.printcons{
			 page: printcons;
			}
			
		@media print{
			.printcons{
				width: 97%;
			}
			.printcons table, td, th{
		        font-size: 8px;
		    }
		    .notap{
				font-size: 14px;
			}
		    i{
		    	display: none !important;
		    }
		    a{
		    	font-size: 8px;
		    }
		    h4{
		    	font-size: 14px;
		    }
		    h6{
		    	font-size: 10px;
		    }
		}
	</style>
	<nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
        	<a class="nav-item nav-link active" id="nav-cahmsa-tab" data-toggle="tab" href="#nav-cahmsa" role="tab" aria-controls="nav-cahmsa" aria-selected="true">Concentrado Confianza</a>
        	<a class="nav-item nav-link" id="nav-csid-tab" data-toggle="tab" href="#nav-csid" role="tab" aria-controls="nav-csid" aria-selected="false">Concentrado Sindicalizados</a>
            <a class="nav-item nav-link" id="nav-rahmsa-tab" data-toggle="tab" href="#nav-rahmsa" role="tab" aria-controls="nav-rahmsa" aria-selected="false">Empleados de Confianza</a>
            <a class="nav-item nav-link" id="nav-rsid1-tab" data-toggle="tab" href="#nav-rsid1" role="tab" aria-controls="nav-rsid1" aria-selected="false">Sindicalizados Sid. 1</a>
            <a class="nav-item nav-link" id="nav-rsid2-tab" data-toggle="tab" href="#nav-rsid2" role="tab" aria-controls="nav-rsid2" aria-selected="false">Sindicalizados Sid. 2</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-cahmsa" role="tabpanel" aria-labelledby="nav-home-tab">
    	<br>
    	<section class="printcons">
    	<div class="row col-sm-12 m-0 p-0">
    		<div class="left col-sm-2 ml-3 mb-1">
               	<img src="{!! asset('jpg/logoce.jpg') !!}" class="float-center" alt="Logo de circulos de eficiencia" width="150" height="50">
        	</div>
        	<div class="col-sm-7 ml-5 mr-5 text-center">
        		<h4 class="conmr">RELACIÓN DE PROYECTOS PARA RECONOCIMIENTO</h4>
        		<h4>Círculos de Eficiencia Nivel 3</h4>
        	</div>
        	<div class="col-sm-2">
        		<div class="row float-right m-0 p-0">
                    <div>
                        <h4>Fecha:</h4>
                    </div>
                    <div class="text-center ml-2">
                    	<label><h4 class="conmr"><?php echo date("d/M/Y"); ?></h4></label>
                	</div>
                </div>
        	</div>
    	</div>
	    <div class="table-responsive">
	        <table id="grid-basic" class="table table-sm table-hover table-bordered">
	            <thead>
	                <tr style="background-color: #FFFB00">
	                    <th  style="vertical-align: middle" class="text-center" width="52px">Nombre</th>
	                    <th  style="vertical-align: middle" class="text-center" width="31px">RCR</th>
	                    <th  style="vertical-align: middle" class="text-center" width="83px">Sist. Participativo</th>
	                    <th  style="vertical-align: middle" class="text-center" width="58px">Empresa</th>
	                    <th  style="vertical-align: middle" class="text-center" width="522px">Solución</th>
	                    <th  style="vertical-align: middle" class="text-center" width="66px">Fecha Inicio</th>
	                    <th  style="vertical-align: middle" class="text-center" width="66px">Fecha Final</th>
	                    <th  style="vertical-align: middle" class="text-center" width="61px">Prioridad</th>
	                    <th  style="vertical-align: middle" class="text-center" width="194px">Departamento</th>
	                    <th  style="vertical-align: middle" class="text-center" width="35px">Cant</th>
	                    <th  style="vertical-align: middle" class="text-center" width="58px">Importe</th>
	                    <th  style="vertical-align: middle" class="text-center" width="98px">Total del Reconocimiento</th>
	                </tr>
	            </thead>
	            <tbody>  
	            	<?php $r =0;
	            		  $tpagoc =0;
	            		  $x=0;
	            	?>
	                @foreach($mrpago as $mrpagoo) 
	                <?php $tpago = $mrpagoo->perco*$mrpagoo->ppp;?>
	                @if ($mrpagoo->perco > 0)
	                	<?php $x=$x+1 ?>
	                    <tr>
	                        <td  style="vertical-align: middle" class="text-center">MR-{{ $mrpagoo->id }}</td>
	                        <td  style="vertical-align: middle" class="text-center">{{ $mrpagoo->rcr }}</td> 
	                        <td  style="vertical-align: middle" class="text-center">Mejoras Rápidas</td>
	                        <td  style="vertical-align: middle" class="text-center">C</td>
	                        <td  style="vertical-align: middle">{{ $mrpagoo->solucion }}</td>
	                        <td  style="vertical-align: middle" class="text-center">{{ \carbon\carbon::parse($mrpagoo->inicio)->format('d-M-y') }}</td> 
	                        <td  style="vertical-align: middle" class="text-center">{{ \carbon\carbon::parse($mrpagoo->final)->format('d-M-y') }}</td>
	                        <td  style="vertical-align: middle" class="text-center">1</td>
	                        <td  style="vertical-align: middle">{{ $mrpagoo->departamento }}</td>
	                        <td  style="vertical-align: middle" class="text-center">{{ $mrpagoo->perco }}</td> 
	                        <td  style="vertical-align: middle" class="text-right">{{ sprintf('$ %s', number_format(($mrpagoo->ppp),0, '.', ',')) }}</td>
	                        <td  style="vertical-align: middle" class="text-right">{{ sprintf('$ %s', number_format(($tpago),0, '.', ',')) }}</td>
	                        <?php $r = $tpago; ?>
	                    </tr>
	                    <?php $tpagoc = $tpagoc + $r; ?>
	                 @endif
	                @endforeach
	                @for($x = $x+1; $x < 15; $x++)
	                	<tr>
	                        <td><i></i></td>
	                        <td><i></i></td> 
	                        <td class="text-center"><a style="color: white">Mejoras Rápidas</a></td>
	                        <td><i></i></td>
	                        <td><i></i></td>
	                        <td><i></i></td> 
	                        <td><i></i></td>
	                        <td><i></i></td>
	                        <td><i></i></td>
	                        <td><i></i></td> 
	                        <td><i></i></td>
	                        <td><i></i></td>
	                    </tr>
	                @endfor  
	            </tbody>
	        </table>
	    </div>
	    <div class="row col col-md-12 m-0 p-0">
		    <div class="col col-md-11" style="background-color: #C0C0C0;"> <p>Empresa C= Ahmsa y Forjacero, H=Hércules, M=Mimosa, N=Nasa, S1= Sindicalizados Sid.1, S2= Sindicalizados Sid.2,</p></div>
		    <div class="col col-md-1 row float-right m-0 p-0">
	            <div class="col col-md-6 float-left m-0 p-0">
	                <p class="font-weight-bold float-right totalmr">Total:</p>
	            </div>
	            <div class="col col-md-6 float-left ml-0 p-0">
	                <div class="font-weight-bold float-right mt-1"><p class=" totalmr">{{ sprintf('$ %s', number_format(($tpagoc),0, '.', ',')) }}</p></div>
	            </div>
	        </div>
    	</div>
	    <div class="container-fluid m-0 p-0 ">
	        <div class="row">
	            <div class="col-md-4 m-0 p-0">
	                <h4 class=" lead text-center">Atentamente:</h4>
	                <br>
	                <br>
	                <h4 class=" text-center">
	                Ing. Elena Aracely Flores López<br>
	                Gerente de Capacitación<br>
	                </h4>
	            </div>
	            <div class="col-md-4 m-0 p-0">
	                <h4 class=" lead text-center">Vo.Bo.:</h4>
	                <br>
	                <br>
	                <h4 class=" text-center">
	                Lic. Mónica Elizondo Ortiz<br>
	                Directora Corporativa de Recursos Humanos<br>
	                </h4>
	            </div>
	            <div class="col-md-4 m-0 p-0">
	                <h4 class=" lead text-center">Autorización:</h4>
	                <br>
	                <br>
	                <h4 class=" text-center   ">
	                N/A<br>
	                <br>
	                </h4>
	            </div>
	        </div>  
	    </div>
	    <div class="row">
	    	<div class="col-md-11"></div>
	    	<div class="col-md-1">
	    		<a>RHC-02-F-08b</a>
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
	</section>
	</div>
	<div class="tab-pane fade" id="nav-csid" role="tabpanel" aria-labelledby="nav-csid-tab">
    	<br>
    	<section class="printcons">
    	<div class="row col-sm-12 m-0 p-0">
    		<div class="left col-sm-2 ml-3 mb-1">
               	<img src="{!! asset('jpg/logoce.jpg') !!}" class="float-center" alt="Logo de circulos de eficiencia" width="150" height="50">
        	</div>
        	<div class="col-sm-7 ml-5 mr-5 text-center">
        		<h4 class="conmr">RELACIÓN DE PROYECTOS PARA RECONOCIMIENTO</h4>
        		<h4>Círculos de Eficiencia Nivel 3</h4>
        	</div>
        	<div class="col-sm-2">
        		<div class="row float-right m-0 p-0">
                    <div>
                        <h4>Fecha:</h4>
                    </div>
                    <div class="text-center ml-2">
                    	<label><h4 class="conmr"><?php echo date("d/M/Y"); ?></h4></label>
                	</div>
                </div>
        	</div>
    	</div>
	    <div class="table-responsive">
	        <table id="grid-basic" class="table table-sm table-hover table-bordered">
	            <thead>
	                <tr style="background-color: #FFFB00">
	                    <th  style="vertical-align: middle" class="text-center" width="54px">Nombre</th>
	                    <th  style="vertical-align: middle" class="text-center" width="33px">RCR</th>
	                    <th  style="vertical-align: middle" class="text-center" width="85px">Sist. Participativo</th>
	                    <th  style="vertical-align: middle" class="text-center" width="60px">Empresa</th>
	                    <th  style="vertical-align: middle" class="text-center" width="500px">Solución</th>
	                    <th  style="vertical-align: middle" class="text-center" width="68px">Fecha Inicio</th>
	                    <th  style="vertical-align: middle" class="text-center" width="68px">Fecha Final</th>
	                    <th  style="vertical-align: middle" class="text-center" width="61px">Prioridad</th>
	                    <th  style="vertical-align: middle" class="text-center" width="198px">Departamento</th>
	                    <th  style="vertical-align: middle" class="text-center" width="35px">Cant</th>
	                    <th  style="vertical-align: middle" class="text-center" width="60px">Importe</th>
	                    <th  style="vertical-align: middle" class="text-center" width="100px">Total del Reconocimiento</th>
	                </tr>
	            </thead>
	            <tbody>    
	            	<?php $r =0;
	            		  $tpagoc =0;
	            		  $x1=0;
	            	?>
	                @foreach($mrpago as $mrpagoo) 
	                <?php $tpago1 = $mrpagoo->pers1*$mrpagoo->ppp;?>
	                <?php $tpago2 = $mrpagoo->pers2*$mrpagoo->ppp;?>
	                @if ($mrpagoo->pers1 > 0)
	                	<?php $x1=$x1+1 ?>
	                    <tr>
	                        <td  style="vertical-align: middle" class="text-center">MR-{{ $mrpagoo->id }}</td>
	                        <td  style="vertical-align: middle" class="text-center">{{ $mrpagoo->rcr }}</td> 
	                        <td  style="vertical-align: middle" class="text-center">Mejoras Rápidas</td>
	                        <td  style="vertical-align: middle" class="text-center">S1</td>
	                        <td  style="vertical-align: middle">{{ $mrpagoo->solucion }}</td>
	                        <td  style="vertical-align: middle" class="text-center">{{ \carbon\carbon::parse($mrpagoo->inicio)->format('d-M-y') }}</td> 
	                        <td  style="vertical-align: middle" class="text-center">{{ \carbon\carbon::parse($mrpagoo->final)->format('d-M-y') }}</td>
	                        <td  style="vertical-align: middle" class="text-center">1</td>
	                        <td  style="vertical-align: middle">{{ $mrpagoo->departamento }}</td>
	                        <td  style="vertical-align: middle" class="text-center">{{ $mrpagoo->pers1 }}</td> 
	                        <td  style="vertical-align: middle" class="text-right">{{ sprintf('$ %s', number_format(($mrpagoo->ppp),0, '.', ',')) }}</td>
	                        <td  style="vertical-align: middle" class="text-right">{{ sprintf('$ %s', number_format(($tpago1),0, '.', ',')) }}</td>
	                        <?php $r = $tpago1; ?>
	                    </tr>
	                    <?php $tpagoc = $tpagoc + $r; ?>
	                @else
	                	@if ($mrpagoo->pers2 > 0)
	                	<?php $x1=$x1+1 ?>
	                    <tr>
	                        <td  style="vertical-align: middle" class="text-center">MR-{{ $mrpagoo->id }}</td>
	                        <td  style="vertical-align: middle" class="text-center">{{ $mrpagoo->rcr }}</td> 
	                        <td  style="vertical-align: middle" class="text-center">Mejoras Rápidas</td>
	                        <td  style="vertical-align: middle" class="text-center">S2</td>
	                        <td  style="vertical-align: middle">{{ $mrpagoo->solucion }}</td>
	                        <td  style="vertical-align: middle" class="text-center">{{ \carbon\carbon::parse($mrpagoo->inicio)->format('d-M-y') }}</td> 
	                        <td  style="vertical-align: middle" class="text-center">{{ \carbon\carbon::parse($mrpagoo->final)->format('d-M-y') }}</td>
	                        <td  style="vertical-align: middle" class="text-center">1</td>
	                        <td  style="vertical-align: middle">{{ $mrpagoo->departamento }}</td>
	                        <td  style="vertical-align: middle" class="text-center">{{ $mrpagoo->pers2 }}</td> 
	                        <td  style="vertical-align: middle" class="text-right">{{ sprintf('$ %s', number_format(($mrpagoo->ppp),0, '.', ',')) }}</td>
	                        <td  style="vertical-align: middle" class="text-right">{{ sprintf('$ %s', number_format(($tpago2),0, '.', ',')) }}</td>
	                        <?php $r = $tpago2; ?>
	                    </tr>
	                    <?php $tpagoc = $tpagoc + $r; ?>
	                	@endif
	                @endif
	                @endforeach
	                @for($x1 = $x1+1; $x1 < 15; $x1++)
	                	<tr>
	                        <td><i></i></td>
	                        <td><i></i></td> 
	                        <td class="text-center"><a style="color: white">Mejoras Rápidas</a></td>
	                        <td><i></i></td>
	                        <td><i></i></td>
	                        <td><i></i></td> 
	                        <td><i></i></td>
	                        <td><i></i></td>
	                        <td><i></i></td>
	                        <td><i></i></td> 
	                        <td><i></i></td>
	                        <td><i></i></td>
	                    </tr>
	                @endfor  
	            </tbody>
	        </table>
	    </div>
	    <div class="row col col-md-12 m-0 p-0">
		    <div class="col col-md-11" style="background-color: #C0C0C0;"> <p>Empresa C= Ahmsa y Forjacero, S1= Sindicalizados Sid.1, S2= Sindicalizados Sid.2, N=Nasa, H=Hércules, M=Mimosa</p></div>
		    <div class="col col-md-1 row float-right m-0 p-0">
	            <div class="col col-md-6 float-left m-0 p-0">
	                <p class="font-weight-bold float-right totalmr">Total:</p>
	            </div>
	            <div class="col col-md-6 float-left ml-0 p-0">
	                <div class="font-weight-bold float-right mt-1"><p class=" totalmr">{{ sprintf('$ %s', number_format(($tpagoc),0, '.', ',')) }}</p></div>
	            </div>
	        </div>
    	</div>
	    <div class="container-fluid m-0 p-0">
	        <div class="row">
	            <div class="col-md-3 m-0 p-0">
	                <h4 class="lead text-center">Atentamente:</h4>
	                <br>
	                <br>
	                <h4 class="text-center">
	                Ing. Elena Aracely Flores López<br>
	                Gerente de Capacitación<br>
	                </h4>
	            </div>
	            <div class="col-md-4 m-0 p-0">
	                <h4 class="lead text-center">Vo.Bo.:</h4>
	                <br>
	                <br>
	                <h4 class=" text-center">
	                Lic. Mónica Elizondo Ortiz<br>
	                Directora Corporativa de Recursos Humanos<br>
	                </h4>
	            </div>
	            <div class="col-md-4 m-0 p-0">
	                <h4 class="lead text-center">Autorización:</h4>
	                <br>
	                <br>
	                <h4 class="text-center   ">
	                Lic. Enrique Rivera Gómez<br>
	                Director Corporativo de Relaciones Industriales<br>
	                </h4>
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
	</section>
	</div>
	<div class="tab-pane fade" id="nav-rahmsa" role="tabpanel" aria-labelledby="nav-rahmsa-tab">
    	<div class="container printnotes">
    		<div class="row col-sm-12 m-0 p-0">
	    		<div class="left col-sm-2 ml-3 mb-1 mt-3">
	               	<img src="{!! asset('jpg/logoce.jpg') !!}" class="float-center" alt="Logo de circulos de eficiencia" width="170" height="60">
	        	</div>
	        	<div class="col-sm-6 ml-5 mr-5 text-center"></div>
	        	<div class="col-sm-2">
	        		<div class="row float-right m-0 p-0">
	                    <div>
	                        <h2 class="mt-5">CAPACITACIÓN</h2>
	                    </div>
	                </div>
	        	</div>
    		</div>
    		<hr>
    		<div>
    			<label class="m-0 p-0" style="width: 13%"><p class="m-0 p-0 titulosmr">LUGAR:</p></label>
    			<label class="m-0 p-0" style="width: 75%"><p class="m-0 p-0 notasmr">Monclova, Coah.</p></label>
    			<label class="m-0 p-0" style="width: 13%"><p class="m-0 p-0 titulosmr">NÚMERO:</p></label>
    			<label class="m-0 p-0" style="width: 75%"><p class="m-0 p-0 notasmr">CC-1{{ \carbon\carbon::parse($mrpagoo->mes_terminacion)->format('m') }}-{{ \carbon\carbon::parse($mrpagoo->mes_terminacion)->format('y') }}.</p></label>
    			<label class="m-0 p-0" style="width: 13%"><p class="m-0 p-0 titulosmr">DE:</p></label>
    			<label class="m-0 p-0" style="width: 75%"><p class="m-0 p-0 notasmr">Ing. Elena Aracely Flores López – Gerente de Capacitación.</p></label>
    			<label class="m-0 p-0" style="width: 13%"><p class="m-0 p-0 titulosmr">PARA:</p></label>
    			<label class="m-0 p-0" style="width: 75%"><p class="m-0 p-0 notasmr">Lic. Jose Luis Rios Moreno. - Gerente de Administración de personal de Confianza. </p></label>
    			<label class="m-0 p-0" style="width: 13%"><p class="m-0 p-0 titulosmr">COPIAS:</p></label>
    			<label class="m-0 p-0" style="width: 75%"><p class="m-0 p-0 notasmr">Expte.</p></label>
    			<br>
    			<br>
    			<br>
    			<label class="m-0 p-0" style="width: 13%"><p class="m-0 p-0 titulosmr">ASUNTO:</p></label>
    			<label class="m-0 p-0" style="width: 75%"><u class="m-0 p-0 notasmr">SOLICITUD DE PAGO.</u></label>
    			<br>
    			<br>
    			<br>
    			<p class="notasmr ml-5" style="width: 100%">Solicito a usted el pago por la cantidad de $<input type="text" class="identificador notasmr numaletc" id="notaconf" size="5" readonly> (<span id="textoc"></span> 00/100 MN), que se entregarán a los integrantes de los Equipos de Trabajo que a continuación se describe:</p>
    		</div>
    		<br>
    		<br>	
    		<br>
    		<div class="row">
    		<div style="width: 10%"><i>.</i></div>
			<div class="table-responsive" style="width: 80%">
			    <table class="table table-sm table-striped table-hover table-bordered tabla-pagos">
			        <thead>
			            <tr>
			                <th style="vertical-align: middle" class="text-center notap" width="7px"><p>Cant.</p></th>
			                <th style="vertical-align: middle" class="text-center notap" width="10px"><p>ID</p></th>
			                <th style="vertical-align: middle" class="text-center notap" width="250px"><p>Nombre</p></th>
			                <th style="vertical-align: middle" class="text-center notap" width="20px"><p>Equipo de Trabajo</p></th>
			                <th style="vertical-align: middle" class="text-center notap" width="30px"><p>Reporte de Caso Resuelto</p></th>
			                <th style="vertical-align: middle" class="text-center notap" width="7px"><p>Monto</p></th>
			            </tr>
			        </thead>
			        <tbody>  
			            <?php $x1=0;?>
			            <?php $tpagoconf = 0; ?>
			            @foreach($mrint as $integrante) 
			            @if ((($integrante->cia) <> 1000) && (($integrante->cia) <> 2000))
			            <?php $x1=$x1+1 ?>
			            <tr>
			                <td class="text-center notap"><p>{{ $x1 }}</p></td>
			                <td class="text-center notap"><p>{{ $integrante->empleado_id }}</p></td> 
			                <td class="notap"><p>{{ $integrante->nombre }}</p></td>
			                <td class="text-center notap"><p>MR-{{ $integrante->id }}</p></td>
			                <td class="text-center notap"><p>{{ $integrante->rcr }}</p></td>
			                <td class="text-right notap"><p>{{ sprintf('$ %s', number_format(($integrante->ppp),0, '.', ',')) }}</p></td>
			            </tr>
			            <?php $tpagoconf = $tpagoconf + $integrante->ppp; ?>
			            @endif
			            @endforeach   
			        </tbody>
			    </table>
			    <div class="row justify-content-end mt-2 mr-2">	
				    <div class="float-right mr-2">
			            <h6 class="font-weight-bold float-right"><p class="titulosmr">Total:</p></h6>
			        </div>
				    <div class="float-right">
				    	<input type="hidden" id="tpagor" name="tpagor" value="{{ $tpagoconf }}">
			            <div class="font-weight-bold float-right mt-1"><p class="titulosmr">{{ sprintf('$ %s', number_format(($tpagoconf),0, '.', ',')) }}</p></div>
			        </div>
		    	</div>
			</div>
			<div style="width: 10%"><i>.</i></div>
			</div>
    		<br>
    		<br>
    		<br>
    		<label style="width: 100%"><p class="notasmr">Quedo en espera de su autorización, para iniciar los trámites administrativos correspondientes.
			Centro de Costos 29040-5158200</p></label>
			<br>
			<br>
			<br>
			<footer>
			    <div class="container m-o p-0">
			        <div class="row">
			            <div class="col-md-12 justify-content-center m-0 p-0">
			                <p class="text-muted text-center titulosmr">Atentamente:</p>
			                <br>
			                <br>
			                <br>
			                <br>
			                <p class="text-muted text-center titulosmr">
			                	Ing. Elena Aracely Flores López<br>
			                	Gerente de Capacitación<br>
			                </p>
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
    		</footer>
    	</div>
	</div>
	<div class="tab-pane fade" id="nav-rsid1" role="tabpanel" aria-labelledby="nav-rsid1-tab">
    	<br>
    	<div class="container printnotes">
    		<div class="row col-sm-12 m-0 p-0">
	    		<div class="left col-sm-2 ml-3 mb-1 mt-3">
	               	<img src="{!! asset('jpg/logoce.jpg') !!}" class="float-center" alt="Logo de circulos de eficiencia" width="170" height="60">
	        	</div>
	        	<div class="col-sm-6 ml-5 mr-5 text-center"></div>
	        	<div class="col-sm-2">
	        		<div class="row float-right m-0 p-0">
	                    <div>
	                        <h2 class="mt-5">CAPACITACIÓN</h2>
	                    </div>
	                </div>
	        	</div>
    		</div>
    		<hr>
    		<br>
    		<div>
    			<label class="m-0 p-0" style="width: 13%"><p class="titulosmr">LUGAR:</p></label>
    			<label class="m-0 p-0" style="width: 75%"><p class="notasmr">Monclova, Coah.</p></label>
    			<label class="m-0 p-0" style="width: 13%"><p class="titulosmr">NUMERO:</p></label>
    			<label class="m-0 p-0" style="width: 75%"><p class="m-0 p-0 notasmr">CC-2{{ \carbon\carbon::parse($mrpagoo->mes_terminacion)->format('m') }}-{{ \carbon\carbon::parse($mrpagoo->mes_terminacion)->format('y') }}.</p></label>
    			<label class="m-0 p-0" style="width: 13%"><p class="titulosmr">DE:</p></label>
    			<label class="m-0 p-0" style="width: 75%"><p class="notasmr">Ing. Elena Aracely Flores López – Gerente de Capacitación.</p></label>
    			<label class="m-0 p-0" style="width: 13%"><p class="titulosmr">PARA:</p></label>
    			<label class="m-0 p-0" style="width: 75%"><p class="notasmr">Lic. Joel Enrique Garcia Haro - Gerente de Relaciones Laborales Sid. No.1  </p></label>
    			<label class="m-0 p-0" style="width: 13%"><p class="titulosmr">COPIAS:</p></label>
    			<label class="m-0 p-0" style="width: 75%"><p class="notasmr">Expte.</p></label>
    			<br>
    			<br>
    			<br>
    			<label class="m-0 p-0" style="width: 13%"><p class="titulosmr">ASUNTO:</p></label>
    			<label class="m-0 p-0" style="width: 75%"><u class="notasmr">SOLICITUD DE PAGO.</u></label>
    			<br>
    			<br>
    			<br>
    			<label class="ml-5" style="width: 100%"><p class="notasmr">Solicito a usted el pago por la cantidad de $<input type="text" class="identificadors1 notasmr numalets1" id="notas1" size="5" readonly> (<span id="textos1"></span> 00/100 MN), que se entregarán a los integrantes de los Equipos de Trabajo que a continuación se describe:</p></label>
    		</div>
    		<br>
    		<br>
    		<br>
    		<div class="row">
    		<div style="width: 10%"><i>.</i></div>
			<div class="table-responsive" style="width: 80%">
			    <table class="table table-sm table-striped table-hover table-bordered tabla-pagos">
			        <thead>
			            <tr>
			                <th style="vertical-align: middle" class="text-center notap" width="7px"><p>Cant.</p></th>
			                <th style="vertical-align: middle" class="text-center notap" width="10px"><p>ID</p></th>
			                <th style="vertical-align: middle" class="text-center notap" width="250px"><p>Nombre</p></th>
			                <th style="vertical-align: middle" class="text-center notap" width="20px"><p>Equipo de Trabajo</p></th>
			                <th style="vertical-align: middle" class="text-center notap" width="30px"><p>Reporte de Caso Resuelto</p></th>
			                <th style="vertical-align: middle" class="text-center notap" width="7px"><p>Monto</p></th>
			            </tr>
			        </thead>
			        <tbody>  
			            <?php $x1=0;?>
			            <?php $tpagos1 = 0; ?>
			            @foreach($mrint as $integrante) 
			            @if (($integrante->cia) == 1000)
			            <?php $x1=$x1+1 ?>
			            <tr>
			                <td class="text-center notap"><p>{{ $x1 }}</p></td>
			                <td class="text-center notap"><p>{{ $integrante->empleado_id }}</p></td> 
			                <td class="notap"><p>{{ $integrante->nombre }}</p></td>
			                <td class="text-center notap"><p>MR-{{ $integrante->id }}</p></td>
			                <td class="text-center notap"><p>{{ $integrante->rcr }}</p></td>
			                <td class="text-right notap"><p>{{ sprintf('$ %s', number_format(($integrante->ppp),0, '.', ',')) }}</p></td>
			            </tr>
			            <?php $tpagos1 = $tpagos1 + $integrante->ppp; ?>
			            @endif
			            @endforeach   
			        </tbody>
			    </table>
			    <div class="row justify-content-end mt-2 mr-2">	
				    <div class="float-right mr-2">
			            <h6 class="font-weight-bold float-right"><p class="titulosmr">Total:</p></h6>
			        </div>
				    <div class="float-right">
				    	<input type="hidden" id="tpagos1" name="tpagos1" value="{{ $tpagos1 }}">
			            <div class="font-weight-bold float-right mt-1"><p class="titulosmr">{{ sprintf('$ %s', number_format(($tpagos1),0, '.', ',')) }}</p></div>
			        </div>
		    	</div>
			</div>
			<div style="width: 10%"><i>.</i></div>
			</div>
    		<br>
    		<br>
    		<br>
    		<label style="width: 100%"><p class="notasmr">Quedo en espera de su autorización, para iniciar los trámites administrativos correspondientes.
			Centro de Costos 29040-5158200</p></label>
			<br>
			<br>
			<br>
			<footer>
			    <div class="container m-o p-0">
			        <div class="row">
			            <div class="col-md-12 justify-content-center m-0 p-0">
			                <p class="text-muted text-center titulosmr">Atentamente:</p>
			                <br>
			                <br>
			                <br>
			                <p class="text-muted text-center titulosmr">
			                	Ing. Elena Aracely Flores López<br>
			                	Gerente de Capacitación<br>
			                </p>
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
    		</footer>
    	</div>
	</div>
	<div class="tab-pane fade" id="nav-rsid2" role="tabpanel" aria-labelledby="nav-rsid2-tab">
    	<br>
    	<div class="container printnotes">
    		<div class="row col-sm-12 m-0 p-0">
	    		<div class="left col-sm-2 ml-3 mb-1 mt-3">
	               	<img src="{!! asset('jpg/logoce.jpg') !!}" class="float-center" alt="Logo de circulos de eficiencia" width="170" height="60">
	        	</div>
	        	<div class="col-sm-6 ml-5 mr-5 text-center"></div>
	        	<div class="col-sm-2">
	        		<div class="row float-right m-0 p-0">
	                    <div>
	                        <h2 class="mt-5">CAPACITACIÓN</h2>
	                    </div>
	                </div>
	        	</div>
    		</div>
    		<hr>
    		<br>
    		<div>
    			<label class="m-0 p-0" style="width: 13%"><p class="titulosmr">LUGAR:</p></label>
    			<label class="m-0 p-0" style="width: 75%"><p class="notasmr">Monclova, Coah.</p></label>
    			<label class="m-0 p-0" style="width: 13%"><p class="titulosmr">NUMERO:</p></label>
    			<label class="m-0 p-0" style="width: 75%"><p class="m-0 p-0 notasmr">CC-3{{ \carbon\carbon::parse($mrpagoo->mes_terminacion)->format('m') }}-{{ \carbon\carbon::parse($mrpagoo->mes_terminacion)->format('y') }}.</p></label>
    			<label class="m-0 p-0" style="width: 13%"><p class="titulosmr">DE:</p></label>
    			<label class="m-0 p-0" style="width: 75%"><p class="notasmr">Ing. Elena Aracely Flores López – Gerente de Capacitación.</p></label>
    			<label class="m-0 p-0" style="width: 13%"><p class="titulosmr">PARA:</p></label>
    			<label class="m-0 p-0" style="width: 75%"><p class="notasmr">Lic. José Luis Martinez Falco. - Gerente de Relaciones Laborales Sid. No.2 </p></label>
    			<label class="m-0 p-0" style="width: 13%"><p class="titulosmr">COPIAS:</p></label>
    			<label class="m-0 p-0" style="width: 75%"><p class="notasmr">Expte.</p></label>
    			<br>
    			<br>
    			<br>
    			<label class="m-0 p-0" style="width: 13%"><p class="titulosmr">ASUNTO:</p></label>
    			<label class="m-0 p-0" style="width: 75%"><u class="notasmr">SOLICITUD DE PAGO.</u></label>
    			<br>
    			<br>
    			<br>
    			<label class="ml-5" style="width: 100%"><p class="notasmr">Solicito a usted el pago por la cantidad de $<input type="text" class="identificadors2 notasmr numalets2" id="notas2" size="5" readonly> (<span id="textos2"></span> 00/100 MN), que se entregarán a los integrantes de los Equipos de Trabajo que a continuación se describe:</p></label>
    		</div>
    		<br>
    		<br>
    		<br>
    		<div class="row">
    		<div style="width: 10%"><i>.</i></div>
			<div class="table-responsive" style="width: 80%">
			    <table class="table table-sm table-striped table-hover table-bordered tabla-pagos">
			        <thead>
			            <tr>
			                <th style="vertical-align: middle" class="text-center notap" width="7px"><p>Cant.</p></th>
			                <th style="vertical-align: middle" class="text-center notap" width="10px"><p>ID</p></th>
			                <th style="vertical-align: middle" class="text-center notap" width="250px"><p>Nombre</p></th>
			                <th style="vertical-align: middle" class="text-center notap" width="20px"><p>Equipo de Trabajo</p></th>
			                <th style="vertical-align: middle" class="text-center notap" width="30px"><p>Reporte de Caso Resuelto</p></th>
			                <th style="vertical-align: middle" class="text-center notap" width="7px"><p>Monto</p></th>
			            </tr>
			        </thead>
			        <tbody>  
			            <?php $x1=0;?>
			            <?php $tpagoconf = 0; ?>
			            @foreach($mrint as $integrante) 
			            @if (($integrante->cia) == 2000)
			            <?php $x1=$x1+1 ?>
			            <tr>
			                <td class="text-center notap"><p>{{ $x1 }}</p></td>
			                <td class="text-center notap"><p>{{ $integrante->empleado_id }}</p></td> 
			                <td class="notap"><p>{{ $integrante->nombre }}</p></td>
			                <td class="text-center notap"><p>MR-{{ $integrante->id }}</p></td>
			                <td class="text-center notap"><p>{{ $integrante->rcr }}</p></td>
			                <td class="text-right notap"><p>{{ sprintf('$ %s', number_format(($integrante->ppp),0, '.', ',')) }}</p></td>
			            </tr>
			            <?php $tpagoconf = $tpagoconf + $integrante->ppp; ?>
			            @endif
			            @endforeach   
			        </tbody>
			    </table>
			    <div class="row justify-content-end mt-2 mr-2">	
				    <div class="float-right mr-2">
			            <h6 class="font-weight-bold float-right"><p class="titulosmr">Total:</p></h6>
			        </div>
				    <div class="float-right">
				    	<input type="hidden" id="tpagos2" name="tpagos2" value="{{ $tpagoconf }}">
			            <div class="font-weight-bold float-right mt-1"><p class="titulosmr">{{ sprintf('$ %s', number_format(($tpagoconf),0, '.', ',')) }}</p></div>
			        </div>
		    	</div>
			</div>
			<div style="width: 10%"><i>.</i></div>
			</div>
    		<br>
    		<br>
    		<br>
    		<label style="width: 100%"><p class="notasmr">Quedo en espera de su autorización, para iniciar los trámites administrativos correspondientes.
			Centro de Costos 29040-5158200</p></label>
			<br>
			<br>
			<br>
			<footer>
			    <div class="container m-0 p-0">
			        <div class="row">
			            <div class="col-md-12 justify-content-center m-0 p-0">
			                <p class="text-muted text-center titulosmr">Atentamente:</p>
			                <br>
			                <br>
			                <br>
			                <br>
			                <p class="text-muted text-center titulosmr">
			                	Ing. Elena Aracely Flores López<br>
			                	Gerente de Capacitación<br>
			                </p>
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
    		</footer>
    	</div>
	</div>
	</div>
	<br>
	<br>
<script>
    $('.imprimir').click(function(){
        window.print();
        return false;
    });     
$(document).ready(function(){
	var identificador = $("#tpagor").val();
	$(".identificador").val(identificador);
	var identificadors1 = $("#tpagos1").val();
	$(".identificadors1").val(identificadors1);
	var identificadors2 = $("#tpagos2").val();
	$(".identificadors2").val(identificadors2);
}); 
</script>
@endsection