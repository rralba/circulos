@extends('layouts.appm')

@section('content')
<div class="container-fluid">
<br>
<h1 class="text-center">Circulos de Eficiencia Nivel 3 Terminados</h1>
<hr>
<br>   
    <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>REGISTRO</th>
                        <th>DIRECCION</th>
                        <th>DEPARTAMENTO</th>
                        <th>INICIO</th>
                        <th>FINAL</th>
                        <th>ASESOR</th>
                        <th width="40%">OBJETIVO</th>
                        <th colspan="3">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>  
                        @foreach($mejoras as $mejora) 
                            <tr>
                                <td>{{ $mejora->id }}</td>
                                <td>{{ $mejora->registro }}</td> 
                                <td>{{ $mejora->direccion }}</td>
                                <td>{{ $mejora->departamento }}</td>
                                <td>{{ $mejora->inicio }}</td>
                                <td>{{ $mejora->final }}</td>
                                <td>{{ $mejora->asesor }}</td>
                                <td>{{ $mejora->objetivo }}</td>
                                <td width="07px">
                                    <a  href="{{ route('mejoras.print', $mejora->id) }}"
                                        class="btn btn-sm btn-outline-primary fa fa-print" title="Imprimir Mejora Rapida">
                                    </a>
                                </td>
                                <td width="07px">
                                    <a  href="{{ route('mejoras.printreco', $mejora->id) }}"
                                        class="btn btn-sm btn-outline-primary fa fa-money" title="Imprimir Reconocimiento">
                                    </a>
                                </td>
                                @can('mrprocesos.create')
                                <td width="07px">
                                    <a href="{{ route('mejoras.validar', $mejora->id) }}"
                                        class="btn btn-sm btn-outline-primary fa fa-check-square-o" title="Editar Mejora Rapida">
                                    </a>
                                </td>
                                @endcan
                            </tr>
                        @endforeach   
                </tbody>
            </table>
    </div>
    <br>
    {{ $mejoras->links() }}
</div>
@endsection