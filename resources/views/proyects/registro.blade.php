@extends('layouts.appm')

@section('content')
<style>
	@page registro {
		size: letter landscape;
		margin-top: 25px;
		margin-left: 15px;
		margin-right: 15px;
		margin-bottom: 5px;
	}
	.registro{
		page: registro;
	}
	@media print{
		.registro{
			width: 100%;
		}
		.titulos{
			font-size: 13px;
		}
		.mudas{
			font-size: 13px;
		}
		.titulosprint{
			font-size: 13px;
		}
		.lineatexto{
			font-size: 13px;
		}
		.titulore{
			font-size: 22px;
		}
		.imagenre{
			width: 300px;
      		height: 75px;
		}
	}
</style>
<div class="container-fluid registro">
	<br>
	<div class="conta">
        <div class="left col-sm-4">
            <img src="{!! asset('jpg/logoce.jpg') !!}" class="float-left imagenre" alt="Logo de circulos de eficiencia" width="320" height="90">
        </div>
        <div class="center col-sm-7">
            <p class="titulore" class="text-right mt-5">REGISTRO DE CIRCULO DE EFICIENCIA NIVEL 1 Y 2</p>
        </div>   
    </div>
    <br>
    <br>
    <div class="row">
	    <div class="row col-sm-12 mlp justify-content-center">
	        <label style="width: 6%"><p class="titulosprint">Fecha</p></label>
	        <?php $registro = \carbon\carbon::parse($proyect->fecha_reg)->formatLocalized('%d   %B   %Y '); ?>
	        <label style="width: 19%" class="bordeline"><p class="lineatexto">{{ strtoupper($registro) }}</p></label>
	        <label style="width: 7%"><p class="titulosprint"></p></label>
	        <label style="width: 8%"><p class="titulosprint">Folio</p></label>
	        <label style="width: 8%" class="bordeline tituloreg"><p class="lineatexto">{{ $proyect->id }}</p></label>
	        <label style="width: 7%"><p class="titulosprint"></p></label>
	        <label style="width: 10%"><p class="titulosprint">Asesor</p></label>
	        <label style="width: 35%" class="bordeline tituloreg"><p class="lineatexto">{{ $proyect->asesor }}</p></label>
	    </div>
    </div>
    <div class="row">
	    <div class="row col-sm-12 mlp justify-content-center">
	        <label style="width: 15%"><p class="titulosprint">Nombre del Proyecto</p></label>	
	        <label style="width: 85%" class="bordeline"><p class="lineatexto">{{ $proyect->proyecto }}</p></label>
	    </div>
    </div>
    <div class="row">
	    <div class="row col-sm-12 mlp justify-content-center">
	        <label style="width: 10%"><p class="titulosprint">Departamento</p></label>	
	        <label style="width: 35%" class="bordeline"><p class="lineatexto">{{ $proyect->depto }}</p></label>
	        <label style="width: 10%"><p class="titulosprint"></p></label>
	        <label style="width: 10%"><p class="titulosprint">Dirección</p></label>	
	        <label style="width: 35%" class="bordeline"><p class="lineatexto">{{ $proyect->direccion }}</p></label>
	    </div>
    </div>
    <br>
    <br>
    <div class="row col-sm-12 mb-3">
		<div class="col-sm-1 borde tituloeval justify-content-center">
		    <p class="titulos text-center">No.</p> 
		</div>
		<div class="col-sm-11 borde tituloeval justify-content-center">
		    <p class="titulos text-center">PREGUNTAS DE INICIO DE PROYECTO</p>
		</div>
	</div>
	<div class="row col-sm-12">
		<div class="col-sm-1 justify-content-center">
		    <p class="text-center mudas">1</p> 
		</div>
		<div class="col-sm-11 justify-content-center">
		    <p class="titulos ml-3">¿QUE ÁREAS DEBEN PARTICIPAR EN EL DESARROLLO DE ESTE PROYECTO?</p>
		    <p class="mudas ml-3">{{ $proyect->areas_part }}</p>
		</div>
	</div>
	<br>
	<div class="row col-sm-12">
		<div class="col-sm-1 justify-content-center">
		    <p class="text-center mudas">2</p> 
		</div>
		<div class="col-sm-11 justify-content-center">
		    <p class="titulos ml-3">¿QUE CONOCIMIENTOS, ESPECIALIDADES Y/O HABILIDADES SE REQUIERE DE LOS INTEGRANTES?</p>
		    <p class="mudas ml-3">{{ $proyect->skills_integ }}</p>
		</div>
	</div>
	<br>
	<div class="row col-sm-12">
		<div class="col-sm-1 justify-content-center">
		    <p class="text-center mudas">3</p> 
		</div>
		<div class="col-sm-11 justify-content-center">
		    <p class="titulos ml-3">¿CUÁL ES EL CONOCIMIENTO CRÍTICO REQUERIDO PARA DESARROLLAR LA INNOVACIÓN?</p>
		    <p class="mudas ml-3">{{ $proyect->conocimiento_critico }}</p>
		</div>
	</div>
	<br>
	<div class="row col-sm-12">
		<div class="col-sm-1 justify-content-center">
		    <p class="text-center mudas">4</p> 
		</div>
		<div class="col-sm-11 justify-content-center">
		    <p class="titulos ml-3">¿CÓMO PARTICIPA EL PERSONAL SINDICALIZADO?</p>
		    <p class="mudas ml-3">{{ $proyect->sindicalizados }}</p>
		</div>
	</div>
	<br>
	<div class="row col-sm-12">
		<div class="col-sm-1 justify-content-center">
		    <p class="text-center mudas">5</p> 
		</div>
		<div class="col-sm-11 justify-content-center">
		    <p class="titulos ml-3">¿CUÁLES SON LAS PRINCIPALES ACTIVIDADES A REALIZAR?</p>
		    <p class="mudas ml-3">{{ $proyect->principales_act }}</p>
		</div>
	</div>
	<br>
	<div>
      	<div class="row mt-5">
      	    <div class="col-sm-3"></div>
      	    <div class="col-sm-6 text-center">
      	    	<hr class="m-1 p-1">
      	    	<label class="m-0 p-0" id="idjefe"><i></i></label>
      	    	<label class="m-0 p-0"><p class="titulos">Nombre y Firma</p></label> <br>
      	    	<label class="m-0 p-0"><p class="titulos">Supte. General / Subdirector / Director</p></label>
      	    </div>
      	    <div class="col-sm-3"></div>
      	</div>
      	<br>
      	<div class="row">
      	    <div class="col-sm-6 text-center">
      	    	<label><p class="titulos">* Los campos sombreados serán llenados por el área de Círculos de Eficiencia</p></label>
      	    </div>
      	    <div class="col-sm-4"></div>
      	    <div class="col-sm-2 text-center">
      	    	<label><p class="titulos">RHC-02-F-01</p></label>
      	    </div>
      	</div>
    </div>
	<br>
	<div class="row" id="botones">
		<div class="container-contact100-form-btn col-sm-12">
	    	<button class="contact100-form-btn imprimir">
	      		<span>
	        		Imprimir
	        		<i class="imprimir fa fa-print" aria-hidden="true"></i>
	      		</span>
	    	</button>
	   	</div>
	</div>
</div>
<script>
$('.imprimir').click(function(){
    window.print();
    return false;
});       
</script>
@endsection