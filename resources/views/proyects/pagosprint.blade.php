@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <br>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-ahmsa-tab" data-toggle="tab" href="#nav-ahmsa" role="tab" aria-controls="nav-ahmsa" aria-selected="true">Empleados de Confianza</a>
            <a class="nav-item nav-link" id="nav-sid1-tab" data-toggle="tab" href="#nav-sid1" role="tab" aria-controls="nav-sid1" aria-selected="false">Sindicalizados Sid. 1</a>
            <a class="nav-item nav-link" id="nav-sid2-tab" data-toggle="tab" href="#nav-sid2" role="tab" aria-controls="nav-sid2" aria-selected="false">Sindicalizados Sid. 2</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-ahmsa" role="tabpanel" aria-labelledby="nav-home-tab">
            <br>
    <div class="imprimible">
        <div id="wrapper">
        <div class="conta">
            <div class="left col-md-2 m-0 p-0">
                <img src="{!! asset('jpg/logoce.jpg') !!}" class="float-center" alt="Logo de circulos de eficiencia" width="170" height="60">
            </div>
            <div class="center col-md-8 m-0 p-0">
                <h4 id="titulo" class="text-center">RECONOCIMENTO CIRCULOS DE EFICIENCIA NIVEL 1 y 2</h4>
                <h4 id="titulo" class="text-center">EMPLEADOS AHMSA Y CORPORATIVO</h4>
            </div>
            <div class="right col-md-2 m-0 p-0">
                <div class="row float-right m-0 p-0">
                    <div class="input-group input-group-sm mb-0">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Fecha</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="fecha" type="text"  value="<?php echo date("d/M/Y"); ?>" / readonly>
                    </div>
                </div>
                <div class="row float-right m-0 p-0"> 
                <div class="input-group input-group-sm mb-0">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Mes Pago</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="mes" type="month" value="" maxlength="10" readonly>
                </div>
                </div>    
                <div class="row float-right m-0 p-0">
                <div class="input-group input-group-sm mb-0">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Folio</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="folio" type="text"  maxlength="10" value="{{ $fol }}" readonly>
                </div>
                </div>   
            </div>    
        </div>
        <section>
        <div class="table-responsive">
        <table class="table table-sm table-striped table-hover table-bordered tabla-pagos">
            <thead>
                <tr>
                    <th width="5%" class="text-center">FICHA</th>
                    <th width="20%" class="text-center">NOMBRE</th>
                    <th width="20%" class="text-center">POSICION</th>
                    <th width="20%" class="text-center">DEPARTAMENTO</th>
                    <th width="22.5%" class="text-center">PROYECTO</th>
                    <th width="5%" class="text-center">BENEFICIO</th>
                    <th width="3%" class="text-center">PAGO</th>
                    <th width="4.5%" class="text-center">PAGO</th>
                </tr>
            </thead>
            <tbody>
                <?php $pagos=0; ?>
                <?php $r=0; ?>
                @foreach($jsonp as $proyect)
                    @if ((($proyect->cia) <> 1000)&&(($proyect->cia)<> 2000))
                    <tr>
                        <td>{{ $proyect->empleado }}</td>
                        <td>{{ $proyect->nombre }}</td>
                        <td>{{ $proyect->posicion }}</td>
                        <td>{{ $proyect->depto }}</td>
                        <td class="ellipsis">{{ $proyect->proyecto }}</td>
                        <td class="text-right">{{ sprintf('$ %s', number_format(($proyect->previo),0, '.', ',')) }}</td>
                        <td class="text-center">{{ $proyect->num_pago }}</td>
                        <td class="text-right">{{ sprintf('$ %s', number_format(($proyect->pago),0, '.', ',')) }}</td>
                    </tr>   
                    <?php $r = $proyect->pago;
                    $pagos = $pagos + $r; ?>
                    @endif
                @endforeach
            </tbody>
       </table>
   </div>
        <div class="col col-md-2 row float-right">
            <div class="col col-md-6 float-left m-0 p-0">
                <p class="font-weight-bold float-right">Total de Pago:</p>
            </div>
            <div class="col col-md-6 float-left ml-0 p-3">
                <div class="font-weight-bold float-right">{{ sprintf('$ %s', number_format(($pagos),0, '.', ',')) }}</div>
            </div>
        </div>
        </section>
    <br>
    <br>
    <br>
    </div>
<footer>
    <div class="container-fluid m-o p-0 piepag">
        <div class="row">
            <div class="col-xs-12 col-md-4 m-0 p-0">
                <h4 class="text-muted lead text-center">Atentamente:</h4>
                <br>
                <h4 class="text-muted text-center">
                Ing. Elena Aracely Flores López<br>
                Gerente de Capacitación<br>
                </h4>
            </div>
            <div class="col-xs-12 col-md-4 m-0 p-0">
                    <h4 class="text-muted lead text-center">Vo.Bo.:</h4>
                    <br>
                    <h4 class="text-muted text-center">
	                Lic. Mónica Elizondo Ortiz<br>
	                Directora Corporativa de Recursos Humanos<br>
	                </h4>
                </div>
                <div class="col-xs-12 col-md-4 m-0 p-0">
                        <h4 class="text-muted lead text-center">Autorización:</h4>
                        <br>
                        <h4 class="text-muted text-center   ">
                        N/A<br>
                        <br>
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
    </footer>
</div>
    <br>
        </div>
        <div class="tab-pane fade" id="nav-sid1" role="tabpanel" aria-labelledby="nav-sid1-tab">
              <br>
    <div id="imprimible">
        <div id="wrapper">
        <div class="conta">
            <div class="left col-md-2 m-0 p-0">
                <img src="{!! asset('jpg/logoce.jpg') !!}" class="float-center" alt="Logo de circulos de eficiencia" width="170" height="60">
            </div>
            <div class="center col-md-8 m-0 p-0">
                <h4 id="titulo" class="text-center">RECONOCIMENTO CIRCULOS DE EFICIENCIA NIVEL 1 y 2</h4>
                <h4 id="titulo" class="text-center">PERSONAL SINDICALIZADOS SIDERURGICA 1</h4>
            </div>
            <div class="right col-md-2 m-0 p-0">
                <div class="row float-right m-0 p-0">
                    <div class="input-group input-group-sm mb-0">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Fecha</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="fecha" type="text" value="<?php echo date("d/M/Y"); ?>" / readonly>
                    </div>
                </div>
                <div class="row float-right m-0 p-0"> 
                <div class="input-group input-group-sm mb-0">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Mes Pago</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="mes" type="month" value="" maxlength="10" readonly>
                </div>
                </div>    
                <div class="row float-right m-0 p-0">
                <div class="input-group input-group-sm mb-0">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Folio</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="folio" type="text" maxlength="10" value="{{ $fol }}" required>
                </div>
                </div>   
            </div>    
        </div>
        <section>
        <div class="table-responsive">
        <table class="table table-sm table-striped table-hover table-bordered tabla-pagos">
            <thead>
                <tr>
                    <th width="5%" class="text-center">FICHA</th>
                    <th width="20%" class="text-center">NOMBRE</th>
                    <th width="20%" class="text-center">POSICION</th>
                    <th width="20%" class="text-center">DEPARTAMENTO</th>
                    <th width="22.5%" class="text-center">PROYECTO</th>
                    <th width="5%" class="text-center">BENEFICIO</th>
                    <th width="3%" class="text-center">PAGO</th>
                    <th width="4.5%" class="text-center">PAGO</th>
                </tr>
            </thead>
            <tbody>
                <?php $pagosuma1=0; ?>
                @foreach($jsonp as $proyectt)
                    @if (($proyectt->cia) == 1000)
                     
                    <tr>
                        <td>{{ $proyectt->empleado }}</td>
                        <td>{{ $proyectt->nombre }}</td>
                        <td>{{ $proyectt->posicion }}</td>
                        <td>{{ $proyectt->depto }}</td>
                        <td class="ellipsis">{{ $proyectt->proyecto }}</td>
                        <td class="text-right">{{ sprintf('$ %s', number_format(($proyectt->previo),0, '.', ',')) }}</td>
                        <td class="text-center">{{ $proyectt->num_pago }}</td>
                        <td class="text-right">{{ sprintf('$ %s', number_format(($proyectt->pago),0, '.', ',')) }}</td>
                    </tr>
                    <?php $pagosuma1 = $pagosuma1 + $proyectt->pago; ?>
                    @endif
                @endforeach
            </tbody>
       </table>
   </div>
        <div class="col col-md-2 row float-right">
            <div class="col col-md-6 float-left m-0 p-0">
                <p class="font-weight-bold float-right">Total de Pago:</p>
            </div>
            <div class="col col-md-6 float-left ml-0 p-0">
                <div class="font-weight-bold float-right">{{ sprintf('$ %s', number_format(($pagosuma1),0, '.', ',')) }}</div>
            </div>
        </div>
        </section>
    <br>
    <br>
    <br>
    </div>
<footer>
    <div class="container-fluid m-o p-0 piepag">
        <div class="row">
            <div class="col-xs-12 col-md-4 m-0 p-0">
                <h4 class="text-muted lead text-center">Atentamente:</h4>
                <br>
                <h4 class="text-muted text-center">
                Ing. Elena Aracely Flores López<br>
                Gerente de Capacitación<br>
                </h4>
            </div>
            <div class="col-xs-12 col-md-4 m-0 p-0">
                    <h4 class="text-muted lead text-center">Vo.Bo.:</h4>
                    <br>
                    <h4 class="text-muted text-center">
	                Lic. Mónica Elizondo Ortiz<br>
	                Directora Corporativa de Recursos Humanos<br>
	                </h4>
                </div>
                <div class="col-xs-12 col-md-4 m-0 p-0">
                            <h4 class="text-muted lead text-center">Autorización:</h4>
                            <br>
                            <h4 class="text-muted text-center">
                            Lic. Enrique Rivera Gómez <br>
                            Director Relaciones Industriales <br>
                            </h4>
                    </div>
        </div>  
    </div>
    <br>
    </footer>
</div>
    <br>
        </div>    
        <div class="tab-pane fade" id="nav-sid2" role="tabpanel" aria-labelledby="nav-sid2-tab">
            <br>
    <div id="imprimible">
        <div id="wrapper">
        <div class="conta">
            <div class="left col-md-2 m-0 p-0">
                <img src="{!! asset('jpg/logoce.jpg') !!}" class="float-center" alt="Logo de circulos de eficiencia" width="170" height="60">
            </div>
            <div class="center col-md-8 m-0 p-0">
                <h4 id="titulo" class="text-center">RECONOCIMENTO CIRCULOS DE EFICIENCIA NIVEL 1 y 2</h4>
                <h4 id="titulo" class="text-center">PERSONAL SINDICALIZADOS SIDERURGICA 2</h4>
            </div>
            <div class="right col-md-2 m-0 p-0">
                <div class="row float-right m-0 p-0">
                    <div class="input-group input-group-sm mb-0">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Fecha</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="fecha" type="text" value="<?php echo date("d/M/Y"); ?>" / readonly>
                    </div>
                </div>
                <div class="row float-right m-0 p-0"> 
                <div class="input-group input-group-sm mb-0">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Mes Pago</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="mes" type="month" value="" maxlength="10" readonly>
                </div>
                </div>    
                <div class="row float-right m-0 p-0">
                <div class="input-group input-group-sm mb-0">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Folio</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="folio" type="text" maxlength="10" value="{{ $fol }}" required>
                </div>
                </div>   
            </div>    
        </div>
        <section>
        <div class="table-responsive">
        <table class="table table-sm table-striped table-hover table-bordered tabla-pagos">
            <thead>
                <tr>
                    <th width="5%" class="text-center">FICHA</th>
                    <th width="20%" class="text-center">NOMBRE</th>
                    <th width="20%" class="text-center">POSICION</th>
                    <th width="20%" class="text-center">DEPARTAMENTO</th>
                    <th width="22.5%" class="text-center">PROYECTO</th>
                    <th width="5%" class="text-center">BENEFICIO</th>
                    <th width="3%" class="text-center">PAGO</th>
                    <th width="4.5%" class="text-center">PAGO</th>
                </tr>
            </thead>
            <tbody>
              <?php $pagosuma2=0; ?>
                @foreach($jsonp as $proyecttt)
                    @if (($proyecttt->cia) == 2000)
                        
                    <tr>
                        <td>{{ $proyecttt->empleado }}</td>
                        <td>{{ $proyecttt->nombre }}</td>
                        <td>{{ $proyecttt->posicion }}</td>
                        <td>{{ $proyecttt->depto }}</td>
                        <td class="ellipsis">{{ $proyecttt->proyecto }}</td>
                        <td class="text-right">{{ sprintf('$ %s', number_format(($proyecttt->previo),0, '.', ',')) }}</td>
                        <td class="text-center">{{ $proyecttt->num_pago }}</td>
                        <td class="text-right">{{ sprintf('$ %s', number_format(($proyecttt->pago),0, '.', ',')) }}</td>
                    </tr>
                    <?php $pagosuma2 = $pagosuma2 + $proyecttt->pago; ?>
                    @endif
                @endforeach
            </tbody>
       </table>
   </div>
        <div class="col col-md-2 row float-right">
            <div class="col col-md-6 float-left m-0 p-0">
                <p class="font-weight-bold float-right">Total de Pago:</p>
            </div>
            <div class="col col-md-6 float-left ml-0 p-0">
                <div class="font-weight-bold float-right">{{ sprintf('$ %s', number_format(($pagosuma2),0, '.', ',')) }}</div>
            </div>
        </div>
        </section>
    <br>
    <br>
    <br>
    </div>
<footer>
    <div class="firmas container-fluid m-o p-0 piepag">
        <div class="row">
            <div class="col-xs-12 col-md-4 m-0 p-0">
                <h4 class="text-muted lead text-center">Atentamente:</h4>
                <br>
                <h4 class="text-muted text-center">
                Ing. Elena Aracely Flores López<br>
                Gerente de Capacitación<br>
                </h4>
            </div>
            <div class="col-xs-12 col-md-4 m-0 p-0">
                <h4 class="text-muted lead text-center">Vo.Bo.:</h4>
                <br>
                <h4 class="text-muted text-center">
	                Lic. Mónica Elizondo Ortiz<br>
	                Directora Corporativa de Recursos Humanos<br>
	                </h4>
            </div>
            <div class="col-xs-12 col-md-4 m-0 p-0">
                <h4 class="text-muted lead text-center">Autorización:</h4>
                <br>
                <h4 class="text-muted text-center">
                Lic. Enrique Rivera Gómez <br>
                Director Relaciones Industriales <br>
                </h4>
            </div>
        </div>  
    </div>
    <br>
</footer>
</div>
    <br>   
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