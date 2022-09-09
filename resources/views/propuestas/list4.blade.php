@extends('layouts.appm')

@section('content')
<span class="contact100-form-title">
    <h1 class="text-center">Propuestas de Círculo de Eficiencia</h1>
    <hr>
</span> 
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light">
      <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="nav navbar-nav m-auto">
                            @can('propuestas.edit')
                            <li class="nav-item">
                                <a class="nav-link mr-2" href="{{ route('propuesta1.index') }}"><h6>Propuestas CE nivel 1 y 2 sin asesor asignado</h6></a>
                            </li>
                            @endcan
                            @can('propuestas.edit')
                            <li class="nav-item">
                                <a class="nav-link mr-2" href="{{ route('propuesta2.index') }}"><h6>Propuestas CE nivel 3 sin asesor asignado</h6></a>
                            </li>
                            @endcan
                            <li class="nav-item">
                                <a class="nav-link mr-2" href="{{ route('propuesta3.index') }}"><h6>Propuestas CE nivel 1 y 2 con asesor asignado</h6></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('propuesta4.index') }}"><h6>Propuestas CE nivel 3 con asesor asignado</h6></a>
                            </li>
                        </ul>
                    </div>
                  </nav>
        <div class="table-responsive mt-3 mb-3">
            <table class="table table-striped table-hover table-bordered">
              <thead>
                <tr>
                    <th>FOLIO</th>
                    <th>REGISTRO</th>
                    <th>DIRECCION</th>
                    <th>DEPARTAMENTO</th>
                    <th>INICIO</th>
                    <th>FINAL</th>
                    <th>CONTACTO</th>
                    <th>ASIGNACION</th>
                    <th style="display:none;">A MEJORAR</th>
                    <th width="22%">OBJETIVO</th>
                    <th style="display:none;">SOLUCION</th>
                    <th>asesor</th>
                    <th colspan="1">&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($propuesta4 as $propuesta)
                    <tr>
                        <td>{{ $propuesta->id }}</td>
                        <td>{{ \carbon\carbon::parse($propuesta->registro)->format('M-Y') }}</td>
                        <td>{{ $propuesta->direccion }}</td>
                        <td>{{ $propuesta->departamento }}</td>
                        <td>{{ \carbon\carbon::parse($propuesta->inicio)->format('M-Y') }}</td>
                        <td>{{ \carbon\carbon::parse($propuesta->final)->format('M-Y') }}</td>
                        <td>{{ $propuesta->contacto }}</td>
                        <td>{{ $propuesta->asignacion }}</td>
                        <td style="display:none;">{{ $propuesta->mejorar }}</td>
                        <td class="ellipsis">{{ $propuesta->objetivo }}</td>
                        <td style="display:none;">{{ $propuesta->solucion }}</td>    
                        <td>{{ $propuesta->asesor }}</td>
                        @can('propuestas.update')
                        <td width="07px">
                            <a href="{{ route('propuesta.validate', $propuesta->id) }}"
                            class="btn btn-sm btn-outline-primary fa fa-pencil-square-o" title="Asignar Asesor">
                            </a>
                        </td>
                        @endcan
                    </tr>
                  @endforeach
              </tbody>
            </table>
        </div>
        {{ $propuesta4->links() }}
  </div>
@endsection