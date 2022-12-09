@extends('layouts.app')

@section('content')
    <div class="d-flex" id="wrapper" >
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="list-group list-group-flush">
                <a href="{{ url('/home') }}" class="list-group-item list-group-item-action bg-light">Inicio</a>
                <a href="{{ route('hercules.beneficios', $proyect->id) }}" class="list-group-item list-group-item-action bg-light">Beneficios</a>
            </div>
        </div>
        <div class="container-fluid m-4">
            <span class="contact100-form-title">
                <h1 class="text-center">{{ $proyect->proyecto }}</h1>
            </span>
            <div class="row">
                <div class="form-group col-md-5"></div>
                <div class="form-group col-md-5"></div>
                <div class="form-group row col-md-2 justify-content-end">
                    <label for="inputEmail4"><h6 class="mt-2">Folio</h6></label>
                    <input type="text" class="form-control ml-3" style="width: 25%;"  id="id" name="id" value="{{ $proyect->id }}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-9"></div>
                <div class="form-group col-md-1">
                    <label for="inputEmail4"><h6>Registro</h6></label>
                    <input type="text" class="form-control" value="{{ $proyect->fecha_reg }}" readonly>
                </div>
                <div class="form-group col-md-1">
                    <label for="inputEmail4"><h6>Fecha Inicio</h6></label>
                    <input type="text" class="form-control" value="{{ $proyect->fecha_ini }}" readonly>
                </div>
                <div class="form-group col-md-1">
                    <label for="inputPassword4"><h6>Fecha Fin</h6></label>
                    <input type="text" class="form-control" value="{{ $proyect->fecha_fin }}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2"></div>
                <div class="form-group col-md-4">
                    <label for="inputEmail4"><h6>Departamento</h6></label>
                    <input type="text" class="form-control" value="{{ $proyect->depto }}" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputPassword4"><h6>Asesor</h6></label>
                    <input type="text" class="form-control" value="{{ $proyect->asesor }}" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputEmail4"><h6>Estatus</h6></label>
                    @if(($proyect->proy_status) == 0)
                            <input type="text" class="form-control" value="CANCELADO" readonly>
                        @endif
                        @if(($proyect->proy_status) == 1)
                            <input type="text" class="form-control" value="EN PROCESO" readonly>
                        @endif
                        @if(($proyect->proy_status) == 2)
                           <input type="text" class="form-control" value="TERMINADO" readonly>
                        @endif
                        @if(($proyect->proy_status) == 3)
                           <input type="text" class="form-control" value="TERMINADO EN PROCESO DE PAGO" readonly>
                        @endif
                </div>
                <div class="form-group col-md-1">
                    <label for="inputEmail4"><h6>Nivel</h6></label>
                    <input type="text" class="form-control"value="{{ $proyect->nivel }}" readonly>
                </div>
                <div class="form-group col-md-1">
                    <label for="inputEmail4"><h6>Comite</h6></label>
                    <input type="text" class="form-control" value="{{ $proyect->comite }}" readonly>
                </div>
            </div>
            <div class="row" id="valor">
                <div class="col-md-2"></div>
                <div class=" form-group col-md-3">  
                    <label for="inputEmail4"><h6>Valor Corporativo:</h6></label>
                    <input type="text" class="form-control" value="{{ $proyect->valor }}" readonly>
                </div>
                <div class=" form-group col-md-3">  
                    <label for="inputEmail4"><h6>Metodologia del Proyecto:</h6></label>
                    <input type="text" class="form-control" value="{{ $proyect->metodologia }}" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputEmail4"><h6>Empresa</h6></label>
                    <input type="text" class="form-control" value="{{ $proyect->empresa }}" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputEmail4"><h6>Ahorro Anual Proyectado</h6></label>
                    <input type="text" class="form-control" value="{{ sprintf('$ %s', number_format($proyect->ahorro_anual_proy,0, '.', ',')) }}" readonly>
                </div> 
            </div>
        </div>
    </div>  
@endsection    