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
	<br>
	<br>
	<br>
	<form id="beneficios" class="beneficios" action="{{ route('reportes.beneficiosexcel') }}" method = "POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <br>
	    <div class="card">
	    	<div class="card-header">
    			<h3 class="text-center">Beneficios</h3>
            </div>
		    <div class="card-body">
		    	<div class="row">
		    	<div class="col-md-10"></div>
                <div class="col-md-1 mr-2">
                	<div class="form-check form-check-inline">
                		<label class="form-check-label"><h5 class="p-2">Todos</h5></label>
                  		<input class="form-check-input" type="checkbox" name="todos" id="todos" value="1">
                	</div>
                </div>
                <div class="row col-md-1">  
                  <select class="form-control" id="año" name="año" placeholder="año">
                    <option value="0">año</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
              		<option value="2019">2019</option>
              		<option value="2020">2020</option>
              		<option value="2021">2021</option>
              		<option value="2022">2022</option>
              		<option value="2023">2023</option>
              		<option value="2024">2024</option>
              		<option value="2025">2025</option>
              		<option value="2026">2026</option>
              		<option value="2027">2027</option>
              		<option value="2028">2028</option>
              		<option value="2029">2029</option>
              		<option value="2030">2030</option>
                  </select>
                </div>
              </div>
				<div class="row">
				    <br>
				    <div class="input-group justify-content-center">
				        <div class="form-check form-check-inline mr-4">
				            <input class="form-check-input" type="radio" name="identificador" id="inputevalsb" value="0" required>
				            <label class="form-check-label ml-2" for="inlineRadio1"><h4 class="p-0 m-0">AHMSA</h4></label>
				        </div>
				        <div class="form-check form-check-inline mr-4">
				        	<input class="form-check-input" type="radio" name="identificador" id="inputevalsb" value="1" required>
				            <label class="form-check-label ml-2" for="inlineRadio2"><h4 class="p-0 m-0">NASA</h4></label>
				        </div>
				        <div class="form-check form-check-inline mr-4">
				            <input class="form-check-input" type="radio" name="identificador" id="inputevalsb" value="2" required>
				            <label class="form-check-label ml-2" for="inlineRadio2"><h4 class="p-0 m-0">HERCULES</h4></label>
				        </div>
				        <div class="form-check form-check-inline mr-4">
				            <input class="form-check-input" type="radio" name="identificador" id="inputevalsb" value="3" required>
				            <label class="form-check-label ml-2" for="inlineRadio2"><h4 class="p-0 m-0">MIMOSA</h4></label>
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
	<form id="consejo" class="consejo" action="{{ route('reportes.beneficiosexcel') }}" method = "POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <br>
	    <div class="card">
	    	<div class="card-header">
    			<h3 class="text-center">Consejo</h3>
            </div>
		    <div class="card-body">
		    	<div class="row">
		    	<div class="col-md-11"></div>
                <div class="row col-md-1">  
                  <select class="form-control" id="año" name="año" placeholder="año" required>
                    <option value="0">año</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
              		<option value="2019">2019</option>
              		<option value="2020">2020</option>
              		<option value="2021">2021</option>
              		<option value="2022">2022</option>
              		<option value="2023">2023</option>
              		<option value="2024">2024</option>
              		<option value="2025">2025</option>
              		<option value="2026">2026</option>
              		<option value="2027">2027</option>
              		<option value="2028">2028</option>
              		<option value="2029">2029</option>
              		<option value="2030">2030</option>
                  </select>
                </div>
              </div>
				<div class="row">
				    <br>
				    <div class="input-group justify-content-center">
				        <div class="form-check form-check-inline mr-4">
				            <input class="form-check-input" type="radio" name="identificador" id="inputevalsb" value="4" required>
				            <label class="form-check-label ml-2" for="inlineRadio1"><h4 class="p-0 m-0">AHMSA</h4></label>
				        </div>
				        <div class="form-check form-check-inline mr-4">
				        	<input class="form-check-input" type="radio" name="identificador" id="inputevalsb" value="5" required>
				            <label class="form-check-label ml-2" for="inlineRadio2"><h4 class="p-0 m-0">NASA</h4></label>
				        </div>
				        <div class="form-check form-check-inline mr-4">
				            <input class="form-check-input" type="radio" name="identificador" id="inputevalsb" value="6" required>
				            <label class="form-check-label ml-2" for="inlineRadio2"><h4 class="p-0 m-0">HERCULES</h4></label>
				        </div>
				        <div class="form-check form-check-inline mr-4">
				            <input class="form-check-input" type="radio" name="identificador" id="inputevalsb" value="7" required>
				            <label class="form-check-label ml-2" for="inlineRadio2"><h4 class="p-0 m-0">MIMOSA</h4></label>
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
</div>
@endsection