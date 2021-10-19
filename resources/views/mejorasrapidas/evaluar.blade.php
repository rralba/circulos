@extends('layouts.appm')

@section('content')

<div class="container-fluid">
	<div class="conta">
        <div class="left col-sm-4 m-0 p-0">
            <img src="{!! asset('jpg/logoce.jpg') !!}" class="float-center imagen1" alt="Logo de circulos de eficiencia" width="320" height="90">
        </div>
        <div class="center col-sm-8 m-0 p-0">
            <h1 id="titulo" class="text-center mt-5">EVALUACIÓN CIRCULOS DE EFICIENCIA NIVEL 3</h1>
        </div>   
    </div>
    <br>
    <div class="row ml-0 mr-0">
	    <div class="row ml-0 mr-0 col-md-12 justify-content-end">
			<label class="mr-2"><h3>Folio</h3></label>
			<label class="etiqueta" style="width: 55px;"><h3>{{ $mejora->id }}</h3></label>
		</div>
	</div>
	<div class="borde">
		<div class="row ml-0 mr-0">
			<div class="form-group col-md-12">
	         	<label><h6>Idea (solución):</h6></label>
	          	<label><h3>{{ $mejora->solucion }}</h3></label>
	        </div>
		</div>
		<div class="row ml-0 mr-0">
	        <div class="form-group col-md-6">
	         	<label><h6>Departamento:</h6></label>
	          	<label><h3>{{ $mejora->departamento }}</h3></label>
	        </div>
	        <div class="form-group col-md-6">
	          	<label><h6>Seccion:</h6></label>
	          	<label><h3>{{ $mejora->seccion }}</h3></label>
	        </div>
      </div>
      <div class="row ml-0 mr-0">
	        <div class="form-group col-md-6">
	         	<label><h6>Asesor:</h6></label>
	          	<label><h3>{{ $mejora->asesor }}</h3></label>
	        </div>
	        <div class="form-group col-md-6">
	          	<label><h6>Fecha de Registro:</h6></label>
	          	<label><h3>{{\carbon\carbon::parse($mejora->registro)->format('d-M-Y')}}</h3></label>
	        </div>
      </div>
      <br>
       <?php 
       	$x=0;
        $c=0;
        $s1=0;
        $s2=0;
        ?>
      @foreach($mejora->empleadoss as $integrante)
      	<?php $x=$x+1; ?>
      	@if((($integrante->id)==0))
      	@if($x == 1)
      <div class="row ml-0 mr-0">
	        <div class="form-group row ml-0 mr-0 col-sm-2 justify-content-end">
	        	<label for="inputEmail4"><h3>Autor</h3></label>
	        </div>
	        <div class="form-group row ml-0 mr-0 col-sm-4">
	        	<input type="text" class="form-control  mr-2" style="width: 90%" id="direccion" name="direccion" readonly>	
	        </div>
	        <div class="form-group row ml-0 mr-0 col-sm-2">
	         	<input type="text" class="form-control ml-3" style="width: 50%" id="direccion" name="direccion" readonly>
	        </div>
	        <div class="form-group row ml-0 mr-0 col-sm-1">
	        	@if((($integrante->cia)==1000 or ($integrante->cia)==2000))
	         		<label for="inputEmail4"><h3 style="background: gray">S</h3></label>
	         		<label for="inputEmail4" class="ml-2"><h3>NS</h3></label>
	         	@else
	         		<label for="inputEmail4"><h3>S</h3></label>
	         		<label for="inputEmail4" class="ml-2"><h3 style="background: gray">NS</h3></label>
	         	@endif
	        </div>
	        <div class="form-group row ml-0 mr-0 col-sm-3">
	         	@if((($integrante->cia)==1000))
	         		<input type="text" class="form-control mr-2" style="width: 90%" id="direccion" name="direccion" readonly>
	         	@endif
	         	@if((($integrante->cia)==2000))
	         		<input type="text" class="form-control mr-2" style="width: 90%" id="direccion" name="direccion" readonly>
	         	@endif
	         	@if((($integrante->cia)>2000))
	         		<input type="text" class="form-control mr-2" style="width: 90%" id="direccion" name="direccion" readonly>
	         	@endif
	         	@if((($integrante->cia)<1000))
	         		<input type="text" class="form-control mr-2" style="width: 90%" id="direccion" name="direccion" readonly>
	         	@endif
	        </div>
      </div>
      @else
      <div class="row ml-0 mr-0">
	        <div class="form-group row ml-0 mr-0 col-sm-2 justify-content-end">
	        	<label for="inputEmail4"><h3>Integrante</h3></label>
	        </div>
	        <div class="form-group row ml-0 mr-0 col-sm-4">
	        	<input type="text" class="form-control  mr-2" style="width: 90%" id="direccion" name="direccion" readonly>	
	        </div>
	        <div class="form-group row ml-0 mr-0 col-sm-2">
	         	<input type="text" class="form-control ml-3" style="width: 50%" id="direccion" name="direccion" readonly>
	        </div>
	        <div class="form-group row ml-0 mr-0 col-sm-1">
	         	@if((($integrante->cia)==1000 or ($integrante->cia)==2000))
	         		<label for="inputEmail4"><h3 style="background: gray">S</h3></label>
	         		<label for="inputEmail4" class="ml-2"><h3>NS</h3></label>
	         	@else
	         		<label for="inputEmail4"><h3>S</h3></label>
	         		<label for="inputEmail4" class="ml-2"><h3 style="background: gray">NS</h3></label>
	         	@endif
	        </div>
	        <div class="form-group row ml-0 mr-0 col-sm-3">
	         	@if((($integrante->cia)==1000))
	         		<input type="text" class="form-control mr-2" style="width: 90%" id="direccion" name="direccion" readonly>
	         	@endif
	         	@if((($integrante->cia)==2000))
	         		<input type="text" class="form-control mr-2" style="width: 90%" id="direccion" name="direccion" readonly>
	         	@endif
	         	@if((($integrante->cia)>2000))
	         		<input type="text" class="form-control mr-2" style="width: 90%" id="direccion" name="direccion" readonly>
	         	@endif
	         	@if((($integrante->cia)<1000))
	         		<input type="text" class="form-control mr-2" style="width: 90%" id="direccion" name="direccion" readonly>
	         	@endif
	        </div>
	        <div class="col-sm-1"></div>
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
      <div class="row ml-0 mr-0">
	        <div class="form-group row ml-0 mr-0 col-sm-2 justify-content-end">
	        	<label for="inputEmail4"><h3>Autor</h3></label>
	        </div>
	        <div class="form-group row ml-0 mr-0 col-sm-4">
	        	<input type="text" class="form-control  mr-2" style="width: 90%" id="direccion" name="direccion" value="{{ $integrante->nombre }}" readonly>	
	        </div>
	        <div class="form-group row ml-0 mr-0 col-sm-2">
	         	<input type="text" class="form-control ml-3" style="width: 50%" id="direccion" name="direccion" value="{{ $integrante->pivot->empleado_id }}" readonly>
	        </div>
	        <div class="form-group row ml-0 mr-0 col-sm-1">
	        	@if((($integrante->cia)==1000 or ($integrante->cia)==2000))
	         		<label for="inputEmail4"><h3 style="background: gray">S</h3></label>
	         		<label for="inputEmail4" class="ml-2"><h3>NS</h3></label>
	         	@else
	         		<label for="inputEmail4"><h3>S</h3></label>
	         		<label for="inputEmail4" class="ml-2"><h3 style="background: gray">NS</h3></label>
	         	@endif
	        </div>
	        <div class="form-group row ml-0 mr-0 col-sm-3">
	         	<input type="text" class="form-control  mr-2" style="width: 90%" id="direccion" name="direccion" value="{{ $integrante->posicion }}" readonly>
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
      <div class="row ml-0 mr-0">
	        <div class="form-group row ml-0 mr-0 col-sm-2 justify-content-end">
	        	<label for="inputEmail4"><h3>Integrante</h3></label>
	        </div>
	        <div class="form-group row ml-0 mr-0 col-sm-4">
	        	<input type="text" class="form-control  mr-2" style="width: 90%" id="direccion" name="direccion" value="{{ $integrante->nombre }}" readonly>	
	        </div>
	        <div class="form-group row ml-0 mr-0 col-sm-2">
	         	<input type="text" class="form-control ml-3" style="width: 50%" id="direccion" name="direccion" value="{{ $integrante->pivot->empleado_id }}" readonly>
	        </div>
	        <div class="form-group row ml-0 mr-0 col-sm-1">
	         	@if((($integrante->cia)==1000 or ($integrante->cia)==2000))
	         		<label for="inputEmail4"><h3 style="background: gray">S</h3></label>
	         		<label for="inputEmail4" class="ml-2"><h3>NS</h3></label>
	         	@else
	         		<label for="inputEmail4"><h3>S</h3></label>
	         		<label for="inputEmail4" class="ml-2"><h3 style="background: gray">NS</h3></label>
	         	@endif
	        </div>
	        <div class="form-group row ml-0 mr-0 col-sm-3">
	         	<input type="text" class="form-control  mr-2" style="width: 90%" id="direccion" name="direccion" value="{{ $integrante->posicion }}" readonly>
	        </div>
	        <div class="col-sm-1"></div>
      </div>
      @endif
      @endif
      @endforeach
      @for($x = $x+1; $x < 6; $x++)
        <div class="row ml-0 mr-0">
	        <div class="form-group row ml-0 mr-0 col-sm-2 justify-content-end">
	        	<label for="inputEmail4"><h3>Integrante</h3></label>
	        </div>
	        <div class="form-group row ml-0 mr-0 col-sm-4">
	        	<input type="text" class="form-control  mr-2" style="width: 90%" id="" name="" value=" " readonly>	
	        </div>
	        <div class="form-group row ml-0 mr-0 col-sm-2">
	         	<input type="text" class="form-control ml-3" style="width: 50%" id="" name="" value=" " readonly>
	        </div>
	        <div class="form-group row ml-0 mr-0 col-sm-1">
	         		<label for="inputEmail4"><h3>S</h3></label>
	         		<label for="inputEmail4" class="ml-2"><h3>NS</h3></label>
	        </div>
	        <div class="form-group row ml-0 mr-0 col-sm-3">
	         	<input type="text" class="form-control mr-2" style="width: 90%" id="" name="" value="." readonly>
	        </div>
	        <div class="col-sm-1"></div>
      </div>
      @endfor
	</div>
	<br>
	<br>
	<form id="evaluar" class="evaluar" action="{{ route('mr.evaluar') }}" method = "POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="mrid" id="mrid" value="{{ $mejora->id }}">
    <input type="hidden" name="fecha" id="fecha" value="<?php echo date("Y-m-d"); ?>">
    <input type="hidden" name="mes" id="mes" value="<?php echo date("Y-m-01"); ?>">
    <input type="hidden" name="pers1" id="pers1" value="{{ $s1 }}">
    <input type="hidden" name="pers2" id="pers2" value="{{ $s2 }}">
    <input type="hidden" name="perc" id="perc" value="{{ $c }}">
	<hr>
	<div class="row ml-0 mr-0 input-group col-md-12">
        <div class="form-check form-check-inline align-content-center">
            <input class="form-check-input m-3" type="radio" name="beneficiomr" id="inputevalsb" value="0" required>
            <label class="form-check-label" for="inlineRadio1"><h3 class="p-0 m-0">Mejora Rápida sin beneficio economico</h3></label>
        </div>
        <div class="form-check form-check-inline align-content-center">
            <input class="form-check-input m-3" type="radio" name="beneficiomr" id="inputevalcb" value="1" required>
            <label class="form-check-label" for="inlineRadio2"><h3 class="p-0 m-0">Mejora Rápida con beneficio economico</h3></label>
        </div>
    </div>
    <br>
    <div id="sinbenef" class="table-responsive">
    	<table class="table table-bordered">
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
			      	<td class="borde p-0" style="background-color: #538ED4;"><br></td>
			      	<td class="borde p-0" style="background-color: #538ED4;"><br></td>
			      	<td class="borde p-0" style="background-color: #538ED4;"><br></td>
			      	<td class="borde p-0" style="background-color: #538ED4;"><br></td>
			      	<td class="borde p-0" style="background-color: #538ED4;"><br></td>
			      	<td class="borde p-0" style="background-color: #538ED4;"><br></td>
			      	<td class="borde p-0" style="background-color: #538ED4;"><br></td>
			    </tr>
			    <tr>
			    	<div class="input-group">
			      	<td class="text-center"><input class="beneficioeval" type="radio" name="evala" id="evala30" value="30"></td>
			      	<td class="text-center"><input class="beneficioeval" type="radio" name="evala" id="evala40" value="40"></td>
			      	<td class="text-center"><input class="beneficioeval" type="radio" name="evala" id="evala50" value="50"></td>
			      	<td class="text-center"><input class="beneficioeval" type="radio" name="evala" id="evala70" value="70"></td>
			      	<td class="text-center"><input class="beneficioeval" type="radio" name="evala" id="evala90" value="90"></td>
			      	<td class="text-center"><input class="beneficioeval" type="radio" name="evala" id="evala100" value="100"></td>
			      	<td><h6 id="totalap"></h6></td>
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
			      	<td class="borde p-0" style="background-color: #538ED4;"><br></td>
			      	<td class="borde p-0" style="background-color: #538ED4;"><br></td>
			      	<td class="borde p-0" style="background-color: #538ED4;"><br></td>
			      	<td class="borde p-0" style="background-color: #538ED4;"><br></td>
			      	<td class="borde p-0" style="background-color: #538ED4;"><br></td>
			      	<td class="borde p-0" style="background-color: #538ED4;"><br></td>
			      	<td class="borde p-0" style="background-color: #538ED4;"><br></td>
			    </tr>
			    <tr>
			    	<div class="input-group">
			      	<td class="text-center"><input class="beneficioeval" type="radio" name="evalo" id="evalo30" value="30"></td>
			      	<td class="text-center"><input class="beneficioeval" type="radio" name="evalo" id="evalo40" value="40"></td>
			      	<td class="text-center"><input class="beneficioeval" type="radio" name="evalo" id="evalo50" value="50"></td>
			      	<td class="text-center"><input class="beneficioeval" type="radio" name="evalo" id="evalo70" value="70"></td>
			      	<td class="text-center"><input class="beneficioeval" type="radio" name="evalo" id="evalo90" value="90"></td>
			      	<td class="text-center"><input class="beneficioeval" type="radio" name="evalo" id="evalo100" value="100"></td>
			      	<td><h6 id="totalap"></h6></td>
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
			      	<td class="borde p-0" style="background-color: #538ED4;"><br></td>
			      	<td class="borde p-0" style="background-color: #538ED4;"><br></td>
			      	<td class="borde p-0" style="background-color: #538ED4;"><br></td>
			      	<td class="borde p-0" style="background-color: #538ED4;"><br></td>
			      	<td class="borde p-0" style="background-color: #538ED4;"><br></td>
			      	<td class="borde p-0" style="background-color: #538ED4;"><br></td>
			      	<td class="borde p-0" style="background-color: #538ED4;"><br></td>
			    </tr>
			    <tr>
			    	<div class="input-group">
			      	<td class="text-center"><input class="beneficioeval" type="radio" name="evale" id="evale30" value="30"></td>
			      	<td class="text-center"><input class="beneficioeval" type="radio" name="evale" id="evale40" value="40"></td>
			      	<td class="text-center"><input class="beneficioeval" type="radio" name="evale" id="evale50" value="50"></td>
			      	<td class="text-center"><input class="beneficioeval" type="radio" name="evale" id="evale70" value="70"></td>
			      	<td class="text-center"><input class="beneficioeval" type="radio" name="evale" id="evale90" value="90"></td>
			      	<td class="text-center"><input class="beneficioeval" type="radio" name="evale" id="evale100" value="100"></td>
			      	<td><h6 id="totalap"></h6></td>
			      	</div>
			    </tr>
		  	</tbody>
		</table>
    </div>
    <div id="conbenef">
    	<div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <label for="recipient-name" class="col-form-label"><h5 class="p-0 m-0">Beneficio Económico</h5></label>
                <input type="text" class="form-control requeridon1 validar" id="currency-field" name="currency-field" placeholder="$1,000,000.00" maxlength="10">
                <input type="hidden" class="form-control requeridon1 validar" id="beneficio_eco" name="beneficio_eco" value="#currency-field">
            </div>  
        </div>
    </div>
    <div class="container-contact100-form-btn" id="evalsave">
        <button class="contact100-form-btn" type="submit">
            <span>
                 Guardar
                <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
            </span>
        </button>
    </div>
    </form>
</div>
@endsection