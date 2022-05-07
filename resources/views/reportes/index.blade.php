@extends('layouts.app')

@section('content')
<div class="container">
	<br>
	<div>
		<h1 class="text-center">Reportes Círculos de Eficiencia</h1>
	</div>
	<br>
	<br>
	<form id="proyectstatus" class="proyectstatus" action="{{ route('reportes.proyectexcel') }}" method = "POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <br>
	    <div class="card">
	    	<div class="card-header">
    			<h3 class="text-center">Círculos de Eficiencia Nivel 1 y 2</h3>
  			</div>
		    <div class="card-body">
				<div class="row">
				    <br>
				    <div class="input-group justify-content-center">
				        <div class="form-check form-check-inline mr-4">
				            <input class="form-check-input" type="radio" name="identificador" id="inputevalsb" value="0" required>
				            <label class="form-check-label ml-2" for="inlineRadio1"><h4 class="p-0 m-0">Proyectos Cancelados</h4></label>
				        </div>
				        <div class="form-check form-check-inline mr-4">
				        	<input class="form-check-input" type="radio" name="identificador" id="inputevalsb" value="1" required>
				            <label class="form-check-label ml-2" for="inlineRadio2"><h4 class="p-0 m-0">Proyectos en Proceso</h4></label>
				        </div>
				        <div class="form-check form-check-inline mr-4">
				            <input class="form-check-input" type="radio" name="identificador" id="inputevalsb" value="2" required>
				            <label class="form-check-label ml-2" for="inlineRadio2"><h4 class="p-0 m-0">Proyectos Terminados</h4></label>
				        </div>
				        <div class="form-check form-check-inline mr-4">
				            <input class="form-check-input" type="radio" name="identificador" id="inputevalsb" value="3" required>
				            <label class="form-check-label ml-2" for="inlineRadio2"><h4 class="p-0 m-0">Proyectos en Proceso de Pago</h4></label>
				        </div>
				        <div class="form-check form-check-inline mr-4">
				            <input class="form-check-input" type="radio" name="identificador" id="inputevalsb" value="4" required>
				            <label class="form-check-label ml-2" for="inlineRadio2"><h4 class="p-0 m-0">Todos</h4></label>
				        </div>
				    </div>
				</div>
				<div class="row justify-content-center mt-4">
					<button class="btn btn-primary" type="submit">Descargar</button>
				</div>
	    	</div>
    	</div>
	</form>
	<br>
	<br>
	<br>
	<form id="proyectstatus" class="proyectstatus" action="{{ route('reportes.mejorasexcel') }}" method = "POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <br>
	    <div class="card">
	    	<div class="card-header">
    			<h3 class="text-center">Círculos de Eficiencia Nivel 3</h3>
  			</div>
		    <div class="card-body">
				<div class="row">
				    <br>
				    <div class="input-group justify-content-center">
				        <div class="form-check form-check-inline mr-4">
				            <input class="form-check-input" type="radio" name="identificador" id="inputevalsb" value="0" required>
				            <label class="form-check-label ml-2" for="inlineRadio1"><h4 class="p-0 m-0">Mejoras Rápidas Cancelados</h4></label>
				        </div>
				        <div class="form-check form-check-inline mr-4">
				        	<input class="form-check-input" type="radio" name="identificador" id="inputevalsb" value="1" required>
				            <label class="form-check-label ml-2" for="inlineRadio2"><h4 class="p-0 m-0">Mejoras Rápidas en Proceso</h4></label>
				        </div>
				        <div class="form-check form-check-inline mr-4">
				            <input class="form-check-input" type="radio" name="identificador" id="inputevalsb" value="3" required>
				            <label class="form-check-label ml-2" for="inlineRadio2"><h4 class="p-0 m-0">Mejoras Rápidas Terminados</h4></label>
				        </div>
				        <div class="form-check form-check-inline mr-4">
				            <input class="form-check-input" type="radio" name="identificador" id="inputevalsb" value="4" required>
				            <label class="form-check-label ml-2" for="inlineRadio2"><h4 class="p-0 m-0">Todos</h4></label>
				        </div>
				    </div>
				</div>
				<div class="row justify-content-center mt-4">
					<button class="btn btn-primary" type="submit">Descargar</button>
				</div>
	    	</div>
    	</div>
	</form>
</div>
@endsection