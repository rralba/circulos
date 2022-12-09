@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <span class="contact100-form-title">
      <h1 class="text-center">Círculo de Eficiencia Nivel 1 y 2 Hércules</h1>
    </span>
    <form id="editpy" name="editpy" action="{{ route('mimosa.update') }} " method = "POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-10"></div>
            <div class="form-group col-md-1">
                <label for="inputEmail4"><h6>Folio</h6></label>
                <input type="text" class="form-control" style="width: 70%;"  id="id" name="id" value="{{ $proyect->id }}" readonly>
            </div>
            <div class="form-group col-md-1">
                <label for="inputEmail4"><h6>Registro</h6></label>
                <input type="text" class="form-control" id="registro" name="registro" value="{{ $proyect->fecha_reg }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="form-group col-md-10">
                <label for="inputEmail4"><h6>Proyecto</h6></label>
                <input type="text" class="form-control tomayus" id="proyecto" name="proyecto" value="{{ $proyect->proyecto }}" maxlength="150">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8"></div>
        <div class="form-group col-md-4">
            <label for="inputEmail4"><h6>Departamento</h6></label>
            <input class="form-control" id="depto" name="depto" value="{{ $proyect->depto }}" maxlength="45">
        </div>
      </div>
     @if (Auth::user()->can('mestro.index'))
      <div class="row">
        <div class="form-group col-md-4"></div>
        <div class="form-group col-md-2">
            <label for="inputEmail4"><h6>Estatus</h6></label>
            <select type="text" class="form-control" id="proy_status" name="proy_status" required>
                @if(($proyect->proy_status) == 0)
                    <option value="{{ $proyect->proy_status }}">Cancelado</option>
                    <option value="1">En Proceso</option>
                    <option value="2">Terminado</option>
                    <option value="3">Terminado en Proceso de Pago</option>
                @endif
                @if(($proyect->proy_status) == 1)
                    <option value="{{ $proyect->proy_status }}">En Proceso</option>
                    <option value="0">Cancelado</option>
                    <option value="2">Terminado</option>
                    <option value="3">Terminado en Proceso de Pago</option>
                @endif
                @if(($proyect->proy_status) == 2)
                    <option value="{{ $proyect->proy_status }}">Terminado</option>
                    <option value="0">Cancelado</option>
                    <option value="1">En Proceso</option>
                    <option value="3">Terminado en Proceso de Pago</option>
                @endif
                @if(($proyect->proy_status) == 3)
                    <option value="{{ $proyect->proy_status }}">Terminado en Proceso de Pago</option>
                    <option value="0">Cancelado</option>
                    <option value="1">En Proceso</option>
                    <option value="2">Terminado</option>
                @endif
            </select>
        </div>
        <div class="form-group col-md-1">
            <label for="inputEmail4"><h6>Nivel</h6></label>
            <select type="text" class="form-control" id="nivel" name="nivel" required>
                <option value="{{ $proyect->nivel }}">{{ $proyect->nivel }}</option>
                <option value="1">1</option>
                <option value="2">2</option>
              </select>
        </div>
        <div class="form-group col-md-1">
            <label for="inputEmail4"><h6>Comite</h6></label>
            <select type="text" class="form-control" id="comite" name="comite" required>
                <option value="{{ $proyect->comite }}">{{ $proyect->comite }}</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
              </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputPassword4"><h6>Asesor</h6></label>
            <input type="text" class="form-control" id="asesor" name="asesor" value="{{ $proyect->asesor }}" readonly>
        </div>
        <div class="form-group col-md-1">
            <label for="inputPassword4"><h6>Inicio:</h6></label>
            <input type="text" class="form-control datepickerreal" id="inicio" name="inicio" value="{{ $proyect->fecha_ini }}">
        </div>
        <div class="form-group col-md-1">
            <label for="inputPassword4"><h6>Final:</h6></label>
            <input type="text" class="form-control datepickerreal" id="final" name="final" value="{{ $proyect->fecha_fin }}">
        </div>
      </div>
      @endif
      <div class="row" id="valor">
          <div class="col-md-4"></div>
          <div class=" form-group col-md-3" id="valorvalid">  
            <label for="to" class="col-form-label"><h6 class="p-0 m-0">Valor Corporativo:</h6></label>
            <select type="text" class="form-control" id="valor" name="valor" required>
                <option value="{{ $proyect->valor }}">{{ $proyect->valor }}</option>
                <option value="CALIDAD">CALIDAD</option>
                <option value="COSTOS">COSTOS</option>
                <option value="CUIDADO AL MEDIO AMBIENTE">CUIDADO AL MEDIO AMBIENTE</option>
                <option value="MEDIO AMBIENTE">MEDIO AMBIENTE</option>
                <option value="METODO DE TRABAJO">MÉTODO DE TRABAJO</option>
                <option value="PRODUCTIVIDAD">PRODUCTIVIDAD</option>
                <option value="PRODUCTIVIDAD Y CALIDAD">PRODUCTIVIDAD Y CALIDAD</option>
                <option value="PRODUCTIVIDAD Y COSTOS">PRODUCTIVIDAD Y COSTOS</option>
                <option value="PRODUCTIVIDAD, CALIDAD Y COSTOS">PRODUCTIVIDAD, CALIDAD Y COSTOS</option>
                <option value="SEGURIDAD">SEGURIDAD</option>
              </select>
          </div>
          <div class=" form-group col-md-3" id="desperdiciovalid">  
            <label for="to" class="col-form-label"><h6 class="p-0 m-0">Metodologia del Proyecto:</h6></label>
            <select type="text" class="form-control" id="metodologia" name="metodologia" required>
                <option value="{{ $proyect->metodologia }}">{{ $proyect->metodologia }}</option>
                <option value="DMAIC">DMAIC</option>
                <option value="PDCA">PDCA</option>
                <option value="QC-STORY 1">QC-STORY 1</option>
                <option value="QC-STORY 2">QC-STORY 2</option>
                <option value="DMADV">DMADV</option>
                <option value="LEAN MANUFACTURING">LEAN MANUFACTURING</option>
              </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputEmail4"><h6>Ahorro Anual Proyectado</h6></label>
            <input type="text" class="form-control requeridon1 validar" id="currency-field" name="currency-field" placeholder="$1,000,000.00" maxlength="10" value="{{ $proyect->ahorro_anual_proy   }}" onkeyup="PasarValor();" maxlength="10">
            <input type="hidden" class="form-control requeridon1 validar" id="beneficio_eco" name="beneficio_eco" maxlength="10">
          </div> 
        </div>
        <div class="container-contact100-form-btn">
            <button class="contact100-form-btn" type="submit">
                <span>
                    Guardar
                    <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                </span>
            </button>
        </div>
    </form>
</div>
<br>
@endsection 