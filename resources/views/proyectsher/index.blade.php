@extends('layouts.app')

@section('content')
<div class="container-fluid">
<br>
<h1 align="center">Proyectos Activos, Nivel 1 y 2 Hércules</h1>
<br>
<br>
<button type="button" class="btn btn-outline-primary btn-lg float-right fa fa-user-plus" data-toggle="modal" data-target="#adduser"></button>
<br>
<br>
<div class="table-responsive">
   <table class="table table-striped table-hover table-bordered">
        <thead class="">
            <tr>
                <th data-column-id="id" width="10px">Id</th>
                <th width="50%">Proyecto</th>
                <th>Registro</th>
                <th>Nivel</th>
                <th>Departamento</th>
                <th>Asesor</th>
                <th>Comite</th>
                <th colspan="3">&nbsp;</th> 
            </tr>
        </thead>
        <tbody id="developers">
            @foreach($proyects as $proyect)
                <tr>
                    <td>{{ $proyect->id }}</td>
                    <td>{{ $proyect->proyecto }}</td>
                    <td>{{ \carbon\carbon::parse($proyect->fecha_reg)->format('M-Y') }}</td>
                    <td>{{ $proyect->nivel }}</td>
                    <td>{{ $proyect->depto }}</td>
                    <td>{{ $proyect->asesor }}</td>
                    <td>{{ $proyect->comite }}</td>
                        @can('filial.index')
                        <td width="07px">
                            <a  href="{{ route('hercules.show', $proyect->id) }}"
                            class="btn btn-sm btn-outline-primary fa fa-info-circle" title="Detalles del Proyecto">
                            </a>
                        </td>
                        @endcan
                        @can('filial.index')
                            <td width="07px">
                                <a href="{{ route('hercules.edit', $proyect->id) }}"
                                class="btn btn-sm btn-outline-primary fa fa-pencil-square-o" title="Editar Proyecto">
                                </a>
                            </td>
                        @endcan
                </tr>
            @endforeach
        </tbody>
   </table>
</div>
</div>
<div class="modal fade" id="adduser">
    <div class="modal-dialog" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agreragr Proyecto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('hercules.store') }}" method = "POST">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Registro:</label>
                  <input type="text" class="form-control tomayus" id="fecha_reg" name="fecha_reg" style="width: 100px;" value="{{ date('Y-m-d') }}" readonly>
                </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Proyecto:</label>
                        <textarea type="texta" class="form-control tomayus" id="proyecto" name="proyecto" maxlength="150" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Departamento:</label>
                        <input type="text" class="form-control tomayus" id="depto" name="depto" maxlength="45" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Asesor:</label>
                        <input type="text" class="form-control tomayus" id="asesor" name="asesor" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection