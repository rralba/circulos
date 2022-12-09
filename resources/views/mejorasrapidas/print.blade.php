@extends('layouts.appm')

@section('content')
<style>
	.row{
		margin-left: 0px;
		margin-right: 0px;
	}
</style>
	<div class="imprime">
		<br>
		<div class="conta">
            <div class="left col-sm-4 m-0 p-0 ml-3">
                <img src="{!! asset('jpg/logoce.jpg') !!}" class="float-left imagen1" alt="Logo de circulos de eficiencia" width="320" height="90">
            </div>
            <div class="center col-sm-7 m-0 p-0">
                <h1 id="titulo" class="text-right mt-5">REGISTRO CIRCULOS DE EFICIENCIA NIVEL 3</h1>
            </div>   
        </div>
        <br>
        <hr>
        <div class="row">
	        <div class="row col-sm-12 mlp justify-content-center">
	        	<label style="width: 80%"><p></p></label>
	        	<label style="width: 10%"><p class="titulosprint">FOLIO</p></label>
	          	<label style="width: 10%" class="bordeline"><p class="folio">{{ $mejora->id }}</p></label>
	        </div>
      	</div>
      	<div class="row">
	        <div class="row col-sm-12 mlp justify-content-center">
	        	<label style="width: 13%"><p class="titulosprint">ASESOR</p></label>	
	        	<label style="width: 34%" class="bordeline"><p class="lineatexto">{{ $mejora->asesor }}</p></label>	
	         	<label style="width: 20%"><p class="titulosprint">FECHA DE REGISTRO</p></label>
	         	<?php $registro = \carbon\carbon::parse($mejora->registro)->formatLocalized('%d   %B   %Y '); ?>
	         	<label style="width: 33%" class="bordeline"><p class="lineatexto">{{ strtoupper($registro) }}</p></label>
	        </div>
      	</div>
      	<div class="row">
	        <div class="row col-sm-12 mlp justify-content-center">
	        	<label style="width: 13%"><p class="titulosprint">DIRECCIÓN</p></label>
	        	<label style="width: 34%" class="bordeline"><p class="lineatexto">{{ $mejora->direccion }}</p></label>	
	         	<label style="width: 20%"><p class="titulosprint">DEPARTAMENTO</p></label>
	         	<label style="width: 33%" class="bordeline"><p class="lineatexto">{{ $mejora->departamento }}</p></label>
	        </div>
      	</div>
      	<div class="row">
	        <div class="row col-sm-12 mlp justify-content-center">
	        	<label style="width: 13%"><p class="titulosprint">SUBDIRECCIÓN</p></label>
	        	<label style="width: 34%" class="bordeline"><p class="lineatexto">{{ $mejora->subdireccion }}</p></label>	
	         	<label style="width: 20%"><p class="titulosprint">VALOR CORPORATIVO</p></label>
	         	<label style="width: 33%" class="bordeline"><p class="lineatexto">{{ strtoupper($mejora->valor) }}</p></label>
	        </div>
      	</div>
      	<div class="row">
	        <div class="row col-sm-12 mlp justify-content-center">
	        	<label style="width: 47%"><p></p></label>
	         	<label style="width: 20%"><p class="titulosprint">FECHA INICIO ESTIMADA</p></label>
	         	<?php $inicio = \carbon\carbon::parse($mejora->inicio)->formatLocalized('%d   %B   %Y '); ?>
	         	<label style="width: 33%" class="bordeline"><p class="lineatexto">{{ strtoupper($inicio) }}</p></label>
	        </div>
      	</div>
      	<div class="row">
      		<div class="row col-sm-12 mlp justify-content-center">
	         	<label style="width: 47%"><p class="titulos ml-5">DESPERDICIOS LEAN MANUFACTURING (MUDAS):</p></label>
	         	<label style="width: 20%"><p class="titulosprint">FECHA FINAL ESTIMADA</p></label>
	         	<?php $final = \carbon\carbon::parse($mejora->final)->formatLocalized('%d   %B   %Y '); ?>
	         	<label style="width: 33%" class="bordeline"><p class="lineatexto">{{ strtoupper($final) }}</p></label>
	    	</div>
      	</div>  
	  	<br> 
		<input type="hidden" id="var" name="var" value="{{ $mejora->desperdicio }}">	
		<div class="container-fluid m-2 p-2">  
      		<div class="row">
      			<div class="form-group row col-sm-1"></div>
	         	<div class="custom-control custom-checkbox checkbox-xl col-sm-3">
					<input class="custom-control-input" type="checkbox" id="Transportacion" value="Transporacion" disabled>
					<label class="custom-control-label  p-3" for="Transportacion"><p class="lineatexto">TRANSPORTACIÓN</p></label>
				</div>
				<div class="custom-control custom-checkbox checkbox-xl col-sm-3">
					<input class="custom-control-input" type="checkbox" id="Sobreprocesamiento" value="Sobreprocesamiento" disabled>
					<label class="custom-control-label  p-3" for="Sobreprocesamiento"><p class="lineatexto">SOBREPROCESAMIENTO</p></label>
				</div>
				<div class="custom-control custom-checkbox checkbox-xl col-sm-2">
					<input class="custom-control-input" type="checkbox" id="Movimiento" value="Movimiento" disabled>
					<label class="custom-control-label  p-3" for="Movimiento"><p class="lineatexto">MOVIMIENTO</p></label>
				</div>
				<div class="custom-control custom-checkbox checkbox-xl col-sm-2">
					<input class="custom-control-input" type="checkbox" id="Espera" value="Espera" disabled>
					<label class="custom-control-label  p-3" for="Espera"><p class="lineatexto">ESPERA</p></label>
				</div>
				<div class="form-group row col-sm-1"></div>
      		</div>
	      	<div class="row">
	      			<div class="form-group row col-sm-1"></div>
		         	<div class="custom-control custom-checkbox checkbox-xl col-sm-3">
						<input class="custom-control-input" type="checkbox" id="Inventario" value="Inventario" disabled>
						<label class="custom-control-label  p-3" for="Inventario"><p class="lineatexto">INVENTARIO</p></label>
					</div>
					<div class="custom-control custom-checkbox checkbox-xl col-sm-3">
						<input class="custom-control-input" type="checkbox" id="Sobreproduccion" value="Sobreproduccion" disabled>
						<label class="custom-control-label  p-3" for="Sobreproduccion"><p class="lineatexto">SOBREPRODUCCIÓN</p></label>
					</div>
					<div class="custom-control custom-checkbox checkbox-xl col-sm-2">
						<input class="custom-control-input" type="checkbox" id="Defectos" value="Defectos" disabled>
						<label class="custom-control-label  p-3" for="Defectos"><p class="lineatexto">DEFECTOS</p></label>
					</div>
					<div class="custom-control custom-checkbox checkbox-xl col-sm-2">
						<input class="custom-control-input" type="checkbox" id="Talentos" value="Talentos" disabled>
						<label class="custom-control-label  p-3" for="Talentos"><p class="lineatexto">TALENTOS</p></label>
					</div>
					<div class="form-group row col-sm-1"></div>
	      	</div>
      		<div class="row"><div class="form-group row col-sm-1"></div>
	         	<div class="custom-control custom-checkbox checkbox-xl col-sm-3">
					<input class="custom-control-input" type="checkbox" id="Metodo de Trabajo" value="Metodo de Trabajo" disabled>
					<label class="custom-control-label  p-3" for="Metodo de Trabajo"><p class="lineatexto">MÉTODO DE TRABAJO</p></label>
				</div>
				<div class="form-group row col-sm-8">
					<label for="inputEmail4" class=" p-3"><p class="lineatexto">OTROS CONCEPTOS:</p></label>
					<label for="inputEmail4" class=" m-0 pl-0 pt-3"><p class="lineatexto">{{ $mejora->desperdicio }}</p></label>
				</div>
      		</div>
      	</div>
      	<br>
      	<?php $x=0;?>
      	@foreach($mejora->empleadoss as $integrante)
      	@if($integrante->nivel == 1)
      	<?php $x=$x+1 ?>
      	@if((($integrante->pivot->empleado_id)==0))
      	@if($x == 1)
      	<div class="row">
	        <div class="row col-sm-12 mlp justify-content-center">
	        	<label style="width: 13%"><p class="titulosprint">AUTOR</p></label>
	        	<label style="width: 36%" class="bordeline mr-5"><p class="lineatexto"></p></label>
	         	<label style="width: 5%"><p class="titulos">FICHA</p></label>
	         	<label style="width: 8%" class="bordeline"><p class="lineatexto"></p></label>
	        	@if((($integrante->cia)==1000 or ($integrante->cia)==2000))
	         		<label class="ml-2" style="width: 2%"><p class="titulos text-center" style="background-color: gray">S</p></label>
	         		<label class="mr-2" style="width: 2%"><p class="titulos text-center">NS</p></label>
	         	@else
	         		<label class="ml-2" style="width: 2%"><p class="titulos text-center">S</p></label>
	         		<label class="mr-2" style="width: 2%"><p class="titulos text-center" style="background-color: gray">NS</p></label>
	         	@endif
	         	<label style="width: 5%"><p class="titulos">CIA.</p></label>
	         	@if((($integrante->cia)==1000))
	         		<label style="width: 20%" class="bordeline mr-5"><p class="lineatexto"></p></label>
	         	@endif
	         	@if((($integrante->cia)==2000))
	         		<label style="width: 20%" class="bordeline mr-5"><p class="lineatexto"></p></label>
	         	@endif
	         	@if((($integrante->cia)>2000))
	         		<label style="width: 20%" class="bordeline mr-5"><p class="lineatexto"></p></label>
	         	@endif
	         	@if((($integrante->cia)<1000))
	         		<label style="width: 20%" class="bordeline mr-5"><p class="lineatexto"></p></label>
	         	@endif
	        </div>
      	</div>
      	@else
      	<div class="row">
	        <div class="row col-sm-12 mlp justify-content-center">
	        	<label  style="width:13%"><p class="titulosprint">INTEGRANTE</p></label>
	        	<label style="width: 36%" class="bordeline mr-5"><p class="lineatexto"></p></label>
	         	<label style="width: 5%"><p class="titulos">FICHA</p></label>
	         	<label style="width: 8%" class="bordeline"><p class="lineatexto"></p></label>
	        	@if((($integrante->cia)==1000 or ($integrante->cia)==2000))
	         		<label class="ml-2" style="width: 2%"><p class="titulos text-center" style="background-color: gray">S</p></label>
	         		<label class="mr-2" style="width: 2%"><p class="titulos text-center">NS</p></label>
	         	@else
	         		<label class="ml-2" style="width: 2%"><p class="titulos text-center">S</p></label>
	         		<label class="mr-2" style="width: 2%"><p class="titulos text-center" style="background-color: gray">NS</p></label>
	         	@endif
	         	<label style="width: 5%"><p class="titulos">CIA.</p></label>
	         	@if((($integrante->cia)==1000))
	         		<label style="width: 20%" class="bordeline mr-5"><p class="lineatexto"></p></label>
	         	@endif
	         	@if((($integrante->cia)==2000))
	         		<label style="width: 20%" class="bordeline mr-5"><p class="lineatexto"></p></label>
	         	@endif
	         	@if((($integrante->cia)>2000))
	         		<label style="width: 20%" class="bordeline mr-5"><p class="lineatexto"></p></label>
	         	@endif
	         	@if((($integrante->cia)<1000))
	         		<label style="width: 20%" class="bordeline mr-5"><p class="lineatexto"></p></label>
	         	@endif
	        </div>
      	</div>
      	@endif
      	@else
      	@if($x == 1)
      	<div class="row">
	        <div class="row col-sm-12 mlp justify-content-center">
	        	<label style="width: 13%"><p class="titulosprint">AUTOR</p></label>
	        	<label style="width: 36%" class="bordeline mr-5"><p class="lineatexto">{{ $integrante->nombre }}</p></label>	
	         	<label style="width: 5%"><p class="titulos">FICHA</p></label>
	         	<label style="width: 8%" class="bordeline"><p class="lineatexto">{{ $integrante->pivot->empleado_id }}</p></label>
	        	@if((($integrante->cia)==1000 or ($integrante->cia)==2000))
	         		<label class="ml-2" style="width: 2%"><p class="titulos text-center" style="background-color: gray">S</p></label>
	         		<label class="mr-2" style="width: 2%"><p class="titulos text-center">NS</p></label>
	         	@else
	         		<label class="ml-2" style="width: 2%"><p class="titulos text-center">S</p></label>
	         		<label class="mr-2" style="width: 2%"><p class="titulos text-center" style="background-color: gray">NS</p></label>
	         	@endif
	         	<label style="width: 5%"><p class="titulos">CIA.</p></label>
	         	@if((($integrante->cia)==1000))
	         		<label style="width: 20%" class="bordeline mr-5"><p class="lineatexto">AHMSA SIDERURGICA 1</p></label>
	         	@endif
	         	@if((($integrante->cia)==2000))
	         		<label style="width: 20%" class="bordeline mr-5"><p class="lineatexto">AHMSA SIDERURGICA 2</p></label>
	         	@endif
	         	@if((($integrante->cia)>2000) and ($integrante->cia)<8000)
	         		<label style="width: 20%" class="bordeline mr-5"><p class="lineatexto">FORJACERO</p></label>
	         	@endif
	         	@if((($integrante->cia)>=8000))
	         		<label style="width: 20%" class="bordeline mr-5"><p class="lineatexto">EMPLEADOS AHMSA</p></label>
	         	@endif
	         	@if((($integrante->cia)<1000))
	         		<label style="width: 20%" class="bordeline mr-5"><p class="lineatexto">SERVICIOS MONCLOVA</p></label>
	         	@endif
	        </div>
      	</div>
      	@else
      	<div class="row">
	        <div class="row col-sm-12 mlp justify-content-center">
	        	<label style="width: 13%"><p class="titulosprint">INTEGRANTE</p></label>
	        	<label style="width: 36%" class="bordeline mr-5"><p class="lineatexto">{{ $integrante->nombre }}</p></label>	
	         	<label style="width: 5%"><p class="titulos">FICHA</p></label>
	         	<label style="width: 8%" class="bordeline"><p class="lineatexto">{{ $integrante->pivot->empleado_id }}</p></label>
	        	@if((($integrante->cia)==1000 or ($integrante->cia)==2000))
	         		<label class="ml-2" style="width: 2%"><p class="titulos text-center" style="background-color: gray">S</p></label>
	         		<label class="mr-2" style="width: 2%"><p class="titulos text-center">NS</p></label>
	         	@else
	         		<label class="ml-2" style="width: 2%"><p class="titulos text-center">S</p></label>
	         		<label class="mr-2" style="width: 2%"><p class="titulos text-center" style="background-color: gray">NS</p></label>
	         	@endif
	         	<label style="width: 5%"><p class="titulos">CIA.</p></label>
	         	@if((($integrante->cia)==1000))
	         		<label style="width: 20%" class="bordeline mr-5"><p class="lineatexto">AHMSA SIDERURGICA 1</p></label>
	         	@endif
	         	@if((($integrante->cia)==2000))
	         		<label style="width: 20%" class="bordeline mr-5"><p class="lineatexto">AHMSA SIDERURGICA 2</p></label>
	         	@endif
	         	@if((($integrante->cia)>2000) and ($integrante->cia)<8000)
	         		<label style="width: 20%" class="bordeline mr-5"><p class="lineatexto">FORJACERO</p></label>
	         	@endif
	         	@if((($integrante->cia)>=8000))
	         		<label style="width: 20%" class="bordeline mr-5"><p class="lineatexto">EMPLEADOS AHMSA</p></label>
	         	@endif
	         	@if((($integrante->cia)<1000))
	         		<label style="width: 20%" class="bordeline mr-5"><p class="lineatexto">SERVICIOS MONCLOVA</p></label>
	         	@endif
	        </div>
      	</div>
      	@endif
      	@endif
      	@endif
      	@endforeach
      	@for($x = $x+1; $x < 6; $x++)
        <div class="row">
	        <div class="row col-sm-12 mlp justify-content-center">
	        	<label style="width: 13%"><p class="titulosprint">INTEGRANTE</p></label>
	        	<label style="width: 36%" class="bordeline mr-5"><p class="lineatexto"></p></label>	
	         	<label style="width: 5%"><p class="titulos">FICHA</p></label>
	         	<label style="width: 8%" class="bordeline"><p class="lineatexto"></p></label>
	         	<label class="ml-2" style="width: 2%"><p class="titulos text-center">S</p></label>
	         	<label class="mr-2" style="width: 2%"><p class="titulos text-center">NS</p></label>
	         	<label style="width: 5%"><p class="titulos">CIA.</p></label>
	         	<label style="width: 20%" class="bordeline mr-5"><p class="lineatexto"></p></label>
	        </div>
      	</div>
      	@endfor
      	<br>
      	<br>
      	<br>
      	<div class="row">
	        <div class="row col-sm-12 mlp justify-content-center">
	        	<label style="width: 14%"><p class="titulos">QUÉ DEBE MEJORARSE?</p></label>
	        	<label style="width: 80%"><p class="lineadesc">{{ $mejora->amejorar }}</p></label>
	        </div>
      	</div>
      	<br>
      	<div class="row">
	        <div class="row col-sm-12 mlp justify-content-center">
	        	<label style="width: 14%"><p class="titulos">OBJETIVO</p></label>
	        	<label style="width: 80%"><p class="lineadesc">{{ $mejora->objetivo }}</p></label>
	        </div>
      	</div>
      	<br>
      	<div class="row">
	        <div class="row col-sm-12 mlp justify-content-center">
	        	<label style="width: 14%"><p class="titulos">SOLUCIÓN</p></label>
	        	<label style="width: 80%"><p class="lineadesc">{{ $mejora->solucion }}</p></label>
	        </div>
      	</div>
      	<br>
      	<div class="piepag">
      		<div class="row mt-5">
      	    	<div class="col-sm-3"></div>
      	    	<div class="col-sm-6 text-center">
      	    		<hr class="m-1 p-1">
      	    		<label class="m-0 p-0" id="idjefe"><i>{{ $mejora->id_autoriza }}</i></label>
      	    		<label class="m-0 p-0"><p class="titulos">{{ $mejora->jefes->nombre }}</p></label> <br>
      	    		<label class="m-0 p-0"><p class="titulos">{{ $mejora->jefes->posicion }}</p></label>
      	    	</div>
      	    	<div class="col-sm-3"></div>
      		</div>
      		<div class="row">
      	    	<div class="col-sm-10"></div>
      	    	<div class="col-sm-2 text-center">
      	    		<label><p class="titulos">RHC-02-F-03</p></label>
      	    	</div>
      		</div>
      	</div> 
    </div> 
<div class="salto"></div>
<hr class="lineadiv">
<br>
<div class="evaluacion">
    <div class="conta">
        <div class="left col-sm-4 m-0 p-0">
            <img src="{!! asset('jpg/logoce.jpg') !!}" class="float-left imagen1 ml-4" alt="Logo de circulos de eficiencia" width="320" height="90">
        </div>
        <div class="center col-sm-8 m-0 p-0">
            <h1 id="titulo" class="text-right mt-3 mr-4">EVALUACIÓN CIRCULOS DE EFICIENCIA NIVEL 3</h1>
        </div>   
    </div>
    <br>
    <div class="row ml-0 mr-0">
	    <div class="row ml-0 mr-0 col-md-12 justify-content-end">
			<label class="mr-2"><p class="titulos">Folio</p></label>
			<label class="etiqueta" style="width: 55px;"><p class="folio">{{ $mejora->id }}</p></label>
		</div>
	</div>
	<div class="borde bs p-3">
		<div class="row ml-0 mr-0 col-sm-12">
			<div class="row col-sm-12 ">
	         	<label style="width: 12%"><p class="titulos">Idea(solución):</p></label>
	          	<label class="bordeline" style="width: 83%"><p class="lineatexto limitado">{{ $mejora->solucion }}</p></label>
	        </div>
		</div>
		<div class="row ml-0 mr-0 col-sm-12">
	        <div class="row col-sm-6">
	         	<div class="col-sm-3"><p class="titulos">Departamento:</p></div>
	          	<div class="bordeline col-sm-8"><p class="lineatexto">{{ $mejora->departamento }}</p></div>
	        </div>
	        <div class="row col-sm-6">
	          	<div class="col-sm-4"><p class="titulos">Seccion:</p></div>
	          	<div class="bordeline col-sm-7"><p class="lineatexto">{{ $mejora->seccion }}</p></div>
	        </div>
        </div>
        <div class="row ml-0 mr-0 col-sm-12">
	        <div class="row col-sm-6">
	         	<div class="col-sm-3"><p class="titulos">Asesor:</p></div>
	          	<div class="bordeline col-sm-8"><p class="lineatexto">{{ $mejora->asesor }}</p></div>
	        </div>
	        <div class="row col-sm-6">
	          	<div class="col-sm-4"><p class="titulos">Fecha de Registro:</p></div>
	          	<div class="bordeline col-sm-7"><p class="lineatexto">{{\carbon\carbon::parse($mejora->registro)->formatLocalized('%d   %B   %Y ')}}</p></div>
	        </div>
        </div>
        <div class="row ml-0 mr-0 col-sm-12">
	        <div class="col-sm-6"></div>
	        <div class="row col-sm-6">
	          	<div class="col-sm-6"><p class="titulos">Ficha</p></div>
	          	<div class="col-sm-6"><p class="titulos text-center">Puesto</p></div>
	        </div>
        </div>
	        <?php $x=0;?>
	        <?php $c=0;?>
	        <?php $s=0;?>
	      	@foreach($mejora->empleadoss as $integrante)
	      	@if($integrante->nivel == 1)
	      	<?php $x=$x+1 ?>
	      	@if((($integrante->pivot->empleado_id)==0))
	      	@if($x == 1)
        <div class="row ml-0 mr-0">
	        <div class="row mlp col-sm-1 justify-content-end">
	        	<div><p class="titulos">Autor</p></div>
	        </div>
	        <div class="row mlp col-sm-4">
	        	<div class="bordeline col-sm-12"><p class="lineatexto"></p></div>	
	        </div>
	        <div class="row mlp col-sm-2">
	         	<div class="bordeline col-sm-12"><p class="lineatexto"></p></div>
	        </div>
	        <div class="row mlp col-sm-1 justify-content-center">
	        	@if((($integrante->cia)==1000 or ($integrante->cia)==2000))
	         		<div><p class="titulos text-center" style="background: gray">S</p></div>
	         		<div class="ml-2"><p class="titulos text-center">NS</p></div>
	         	@else
	         		<div><p>S</p></div>
	         		<div class="ml-2"><p class="titulos text-center" style="background: gray">NS</p></div>
	         	@endif
	        </div>
	        <div class="row mlp col-sm-4">
	         	@if((($integrante->cia)==1000))
	         		<div class="bordeline col-sm-12"><p class="lineatexto"></p></div>
	         	@endif
	         	@if((($integrante->cia)==2000))
	         		<div class="bordeline col-sm-12"><p class="lineatexto"></p></div>
	         	@endif
	         	@if((($integrante->cia)>2000))
	         		<div class="bordeline col-sm-12"><p class="lineatexto"></p></div>
	         	@endif
	         	@if((($integrante->cia)<1000))
	         		<div class="bordeline col-sm-12"><p class="lineatexto"></p></div>
	         	@endif
	        </div>
      	</div>
      	@else
      	<div class="row ml-0 mr-0">
	        <div class="row mlp col-sm-1 justify-content-end">
	        	<div><p class="titulos">Integrante</p></div>
	        </div>
	        <div class="row mlp col-sm-4">
	        	<div class="bordeline col-sm-12"><p class="lineatexto"></p></div>	
	        </div>
	        <div class="row mlp col-sm-2">
	         	<div class="bordeline col-sm-12"><p class="lineatexto"></p></div>
	        </div>
	        <div class="row mlp col-sm-1 justify-content-center">
	         	@if((($integrante->cia)==1000 or ($integrante->cia)==2000))
	         		<div><p class="titulos text-center" style="background: gray">S</p></div>
	         		<div class="ml-2"><p class="titulos text-center">NS</p></div>
	         	@else
	         		<div><p class="titulos text-center">S</p></div>
	         		<div class="ml-2"><p class="titulos text-center" style="background: gray">NS</p></div>
	         	@endif
	        </div>
	        <div class="row mlp col-sm-4">
	         	@if((($integrante->cia)==1000))
	         		<div class="bordeline col-sm-12"><p class="lineatexto"></p></div>
	         	@endif
	         	@if((($integrante->cia)==2000))
	         		<div class="bordeline col-sm-12"><p class="lineatexto"></p></div>
	         	@endif
	         	@if((($integrante->cia)>2000))
	         		<div class="bordeline col-sm-12"><p class="lineatexto"></p></div>
	         	@endif
	         	@if((($integrante->cia)<1000))
	         		<div class="bordeline col-sm-12"><p class="lineatexto"></p></div>
	         	@endif
	        </div>
	        <div class="col-sm-1"></div>
      	</div>
      	@endif
      	@else
      	@if($x == 1)
      	@if((($integrante->cia)==1000 or ($integrante->cia)==2000))
      	<?php $s=$s+1 ?>
      	@else
      	<?php $c=$c+1 ?>
      	@endif
      	<div class="row ml-0 mr-0">
	        <div class="row mlp col-sm-1 justify-content-end">
	        	<div><p class="titulos">Autor</p></div>
	        </div>
	        <div class="row mlp col-sm-4">
	        	<div class="bordeline col-sm-12"><p class="lineatexto">{{ $integrante->nombre }}</p></div>
	        </div>
	        <div class="row mlp col-sm-2">
	         	<div class="bordeline col-sm-12"><p class="lineatexto">{{ $integrante->pivot->empleado_id }}</p></div>
	        </div>
	        <div class="row mlp col-sm-1 justify-content-center">
	        	@if((($integrante->cia)==1000 or ($integrante->cia)==2000))
	         		<div><p class="titulos text-center" style="background: gray">S</p></div>
	         		<div class="ml-2"><p class="titulos text-center">NS</p></div>
	         	@else
	         		<div><p class="titulos text-center">S</p></div>
	         		<div class="ml-2"><p class="titulos text-center" style="background: gray">NS</p></div>
	         	@endif
	        </div>
	        <div class="row mlp col-sm-4">
	         	<div class="bordeline col-sm-12"><p class="lineatexto">{{ $integrante->posicion }}</p></div>
	        </div>
      	</div>
      	@else
      	@if((($integrante->cia)==1000 or ($integrante->cia)==2000))
      	<?php $s=$s+1 ?>
      	@else
      	<?php $c=$c+1 ?>
      	@endif
      	<div class="row ml-0 mr-0">
	        <div class="row mlp col-sm-1 justify-content-end">
	        	<div><p class="titulos">Integrante</p></div>
	        </div>
	        <div class="row mlp col-sm-4">
	        	<div class="bordeline col-sm-12"><p class="lineatexto">{{ $integrante->nombre }}</p></div>	
	        </div>
	        <div class="row mlp col-sm-2">
	         	<div class="bordeline col-sm-12"><p class="lineatexto">{{ $integrante->pivot->empleado_id }}</p></div>
	        </div>
	        <div class="row mlp col-sm-1 justify-content-center">
	         	@if((($integrante->cia)==1000 or ($integrante->cia)==2000))
	         		<div><p class="titulos text-center" style="background: gray">S</p></div>
	         		<div class="ml-2"><p class="titulos text-center">NS</p></div>
	         	@else
	         		<div><p class="titulos text-center">S</p></div>
	         		<div class="ml-2"><p class="titulos text-center" style="background: gray">NS</p></div>
	         	@endif
	        </div>
	        <div class="row mlp col-sm-4">
	         	<div class="bordeline col-sm-12"><p class="lineatexto">{{ $integrante->posicion }}</p></div>
	        </div>
	        <div class="col-sm-1"></div>
      	</div>
      	@endif
      	@endif
      	@endif
      	@endforeach
      	@for($x = $x+1; $x < 6; $x++)
        <div class="row ml-0 mr-0">
	        <div class="row mlp col-sm-1 justify-content-end">
	        	<div><p class="titulos">Integrante</p></div>
	        </div>
	        <div class="row mlp col-sm-4">
	        	<div class="bordeline col-sm-12"><p class="lineatexto"></p></div>	
	        </div>
	        <div class="row mlp col-sm-2">
	         	<div class="bordeline col-sm-12"><p class="lineatexto"></p></div>
	        </div>
	        <div class="row mlp col-sm-1 justify-content-center">
	         		<div><p class="titulos text-center">S</p></div>
	         		<div class="ml-2"><p class="titulos text-center">NS</p></div>
	        </div>
	        <div class="row mlp col-sm-4">
	         	<div class="bordeline col-sm-12"><p cclass="lineatexto"></p></div>
	        </div>
	        <div class="col-sm-1"></div>
      	</div>
      	@endfor
	</div>
	<br>
	<br>
	<div class="evopt">
	    <div class="row ml-0 mr-0 col-12">
		    <div class="row ml-0 mr-0 col-2 borde mr-4 tituloeval justify-content-center">
		     	<p class="titulos text-center">EVALUADOR</p> 
		    </div>
		    <div class="row ml-0 mr-0 col-8 ml-5 mr-5 borde tituloeval medio justify-content-center">
		    	<p class="titulos text-center">CRITERIOS DE APROBACIÓN Y/O EVALUACIÓN DE MEJORAS</p>
		    </div>
		    <div class="row ml-0 mr-0 col-1 ml-4">
		      	<div class="borde justify-content-center tituloeval" style="width: 50%;">
		        	<p class="titulos text-center">SI</p>      
		      	</div>
		      	<div class="borde justify-content-center tituloeval" style="width: 50%;">
		        	<p class="titulos text-center">NO</p>
		      	</div>      
		    </div>
		    <div class="col-1 invisible">
		    </div>  
	  	</div>
  		<br>
  		<br>
		<div class="row ml-0 mr-0 col-12">
		    <div class="row ml-0 mr-0 col-2 borde mr-4 justify-content-center align-content-center">
		    	<p class="mudas">ÁREA OPERATIVA</p> 
		    </div>
		    <div class="row ml-0 mr-0 col-8 ml-5 mr-5 medio">
		      	<div class="borde">
			        <div class="m-1 mt-2">
			          	<p class="mudas">¿Esta relacionada con incremento de sueldo, compensaciones, contratación de personal, promociones o evaluaciones?</p>
			        </div>
			        <div class="m-1">
			          	<p class="mudas">¿Cumple con las políticas y directrices de la empresa?</p>
			        </div>
			        <div class="m-1">
			          	<p class="mudas">¿Requiere una alta inversión inicial para su realización?</p>
			        </div>
			        <div class="m-1">
			          	<p class="mudas">¿Puede ser implementada en su totalidad por el autor, o en su defecto este puede intervenir en el proceso?</p>
			        </div>
			        <div class="m-1">
			          	<p class="mudas">¿Su implementación puede ser llevada a cabo con material, equipo recuperado y personal del departamento?</p>
			        </div>
			        <div class="m-1">
			          	<p class="mudas">¿Puede ser implementada en otras áreas o departamentos con procesos y equipos similares o iguales?</p>
			        </div>
			        <div class="m-1">
			          	<p class="mudas">¿Esta relacionada o es parte de un trabajo de mantenimiento?</p>
			        </div>
			        <div class="m-1">
			          	<p class="mudas">¿Es un requerimiento o petición especial solicitada por el autor?</p>
			        </div>
		    	</div>
		    </div>
		    <div class="row ml-0 mr-0 col-1 ml-4">
		      	<div class="input-group col-12">
			        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center">
			          	<input class="form-check-input mr-0" type="radio" name="p1" id="inputeval" disabled value="0">
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
			          <input class="form-check-input mr-0" type="radio" name="p2" id="inputeval" disabled value="0">
			        </div>
		      	</div>
		      	<div class="input-group col-12">  
			        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center">
			          <input class="form-check-input mr-0" type="radio" name="p3" id="inputeval" disabled value="0">
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
			          	<input class="form-check-input mr-0" type="radio" name="p4" id="inputeval" disabled value="0">
			        </div>
		      	</div>
		      	<div class="input-group col-12">  
			        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center" style="background-color: #C0C0C0">
			          	<input class="form-check-input mr-0" type="radio" name="p5" id="inputeval" value="1" checked>
			        </div>
			        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center">
			          	<input class="form-check-input mr-0" type="radio" name="p5" id="inputeval" disabled value="0">
			        </div>
		      	</div>
		      	<div class="input-group col-12">  
			        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center" style="background-color: #C0C0C0">
			          	<input class="form-check-input mr-0" type="radio" name="p6" id="inputeval" value="1" checked>
			        </div>
			        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center">
			          	<input class="form-check-input mr-0" type="radio" name="p6" id="inputeval" disabled value="0">
			        </div>
		      	</div>
		      	<div class="input-group col-12">  
			        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center">
			          	<input class="form-check-input mr-0" type="radio" name="p7" id="inputeval" disabled value="0">
			        </div>
			        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center" style="background-color: #C0C0C0">
			          	<input class="form-check-input mr-0" type="radio" name="p7" id="inputeval" value="1" checked>
			        </div>
		      	</div>
		      	<div class="input-group col-12">  
			        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center">
			          	<input class="form-check-input mr-0" type="radio" name="p8" id="inputeval" disabled value="0">
			        </div>
			        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center" style="background-color: #C0C0C0">
			          	<input class="form-check-input mr-0" type="radio" name="p8" id="inputeval" value="1" checked>
			        </div>
		      	</div>      
		    </div> 
		    <div class="col-1 invisible"></div> 
		</div>
  		<br>
  		<br>
	  	<div class="row ml-0 mr-0 col-12">
		    <div class="row ml-0 mr-0 col-2 borde mr-4 justify-content-center align-content-center">
		      	<p class="mudas text-center">ASESOR CÍRCULOS DE EFICIENCIA</p>  
		    </div>
		    <div class="row ml-0 mr-0 col-8 ml-5 mr-5 medio">
		      	<div class="borde">
			        <div class="m-1 mt-2">
			          	<p class="mudas">¿La idea es similar, comparte parecido o se desprende de otros proyectos del departamento o programas de trabajo?</p>
			        </div>
			        <div class="m-1">
			          	<p class="mudas">¿Forma parte o se deriva de algún Círculo de Eficiencia registrado con anterioridad?</p>
			        </div>
			        <div class="m-1">
			          	<p class="mudas">¿La mejora cuenta con avances en su implementación o se encuentra terminada en campo?</p>
			        </div>
			        <div class="m-1">
			          	<p class="mudas">¿El tiempo de implementación es mayor a 3 meses?</p>
			        </div>
			        <div class="m-1">
			          	<p class="mudas">¿El grupo esta integrado entre 1 a 5 personas?</p>
			        </div>
		      	</div>
		    </div>
		    <div class="row ml-0 mr-0 col-1 ml-4">
			    <div class="input-group col-12">
			        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center">
			          	<input class="form-check-input mr-0" type="radio" name="p9" id="inputeval" disabled value="0">
			        </div>
			        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center" style="background-color: #C0C0C0">
			          	<input class="form-check-input mr-0" type="radio" name="p9" id="inputeval" value="1" checked>
			        </div>
			    </div>
			    <div class="input-group col-12">
			        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center">
			          	<input class="form-check-input mr-0" type="radio" name="p10" id="inputeval" disabled value="0">
			        </div>
			        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center" style="background-color: #C0C0C0">
			          	<input class="form-check-input mr-0" type="radio" name="p10" id="inputeval" value="1" checked>
			        </div>
			    </div>
			    <div class="input-group col-12">  
			        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center">
			          	<input class="form-check-input mr-0" type="radio" name="p11" id="inputeval" disabled value="0">
			        </div>
			        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center" style="background-color: #C0C0C0">
			          	<input class="form-check-input mr-0" type="radio" name="p11" id="inputeval" value="1" checked>
			        </div>
			    </div>
			    <div class="input-group col-12">  
			        <div class="col-6 form-check form-check-inline borde mr-0 justify-content-center">
			          	<input class="form-check-input mr-0" type="radio" name="p12" id="inputeval" disabled value="0">
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
			          	<input class="form-check-input mr-0" type="radio" name="p13" id="inputeval" disabled value="0"> 
			        </div>
			    </div>      
		    </div>
		    <div class="col-1 invisible"></div> 
	  	</div> 
  		<br> 
  		<br>
  		<br>
  		<div class="col-12">
  			<p class="notas text-left">* Cuando las respuestas a los criterios estén sombreados en su totalidad se considera aprobada la Mejora Rápida.</p>  
  			<p class="notas text-right">RHC-02-F-04a</p>	
  		</div>  
  	</div>
</div>
	<div class="row" id="botones">
		<div class="container-contact100-form-btn col-sm-12">
    		<button class="contact100-form-btn imprimir">
      			<span>
        			Imprimir
        			<i class="imprimir fa fa-print m-l-7" aria-hidden="true"></i>
      			</span>
    		</button>
    	</div>
    </div>
<script>
    $('.imprimir').click(function(){
        window.print();
        return false;
    });  
    $(function()
	{
		ellipsis_box(".limitado", 95);
	});     
</script>
@endsection