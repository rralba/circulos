@extends('layouts.app')

@section('content')
<div class="container">
  <h1>{{ $proyect->proyecto }}</h1> <br>
    <button type="button" class="btn btn-outline-primary btn-lg float-right fa fa-user-plus" data-toggle="modal" data-target="#addbenef" title="agregar Beneficio">  Agregar Beneficio</button>
      <div class="table-responsive">
        <br>
        <table id="grid-basic" class="w3-table-all w3-card-4">
          <thead>
            <tr>
              <th data-column-id="proyect_id">Id</th>
              <th data-column-id="id">Beneficio Id</th>
              <th data-column-id="fecha_gen" data-visible="false">Fecha de Gz</th>
              <th data-column-id="beneficio" data-visible="false">Beneficio</th>
              <th data-column-id="fecha_gen1">Fecha de Generacion</th>
              <th data-column-id="beneficio1">Beneficio</th>
              <th data-column-id="status">Status</th>
              <th data-column-id="num_pago">'#' pago</th>
              <th data-column-id="mes_pago">Mes de Pago</th> 
              <th data-column-id="actions" data-formatter="actions" data-sortable="false">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $beneficio)
              <tr>
                <td>{{ $beneficio->proyect_id }}</td>
                <td>{{ $beneficio->id }}</td>
                <td>{{ $beneficio->fecha_gen }}</td>
                <td>{{ $beneficio->beneficio }}</td>
                <td>{{ \carbon\carbon::parse($beneficio->fecha_gen)->format('M-Y') }}</td>
                <td>{{ sprintf('$ %s', number_format($beneficio->beneficio,0, '.', ',')) }}</td>
                <td>{{ $beneficio->status }}</td>
                <td>{{ $beneficio->num_pago }}</td>
                @if(empty($beneficio->mes_pago))
                  <td>{{ $beneficio->mes_pago }}</td>
                @else  
                  <td>{{ \carbon\carbon::parse($beneficio->mes_pago)->format('M-Y') }}</td>
                @endif
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>  
</div>
<div class="modal fade" id="addbenef" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agreragr Beneficio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ route('nasa.storebenef') }}" method = "POST">
           {{ csrf_field() }}
      <div class="modal-body">
          <div class="form-group">
              <input type="hidden" id="proyect_id" name="proyect_id" value="{{ $proyect->id }}">
          </div>
          <div class="form-group">
              <label for="recipient-name" class="col-form-label"> Fecha de Registro:</label>
              <input type="date" class="form-control" id="fecha_gen" name="fecha_gen" required>
          </div>
          <div class="form-group">
              <label for="recipient-name" class="col-form-label">Beneficio:</label>
              <input type="text" class="form-control" id="beneficio" name="beneficio" required maxlength="9">
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
      </div>    
        </form>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger small" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
</div>
<div id="edit" class="modal">
<div class="modal-dialog">
<div class="modal-content">
   <div class="modal-header">
      <h5 class="modal-title">Editar Beneficio</h5>
      <div class="center">
        <span onclick="document.getElementById('edit').style.display='none'" class="close" title="Close Modal">&times;</span>
     </div>
   </div>
   <form class="container" action="{{ route('nasa.updatebenef') }}" method = "post">
     {{ csrf_field() }}
     <input type="hidden" id="proyectid" name="proyect_id">
     <input type="hidden" id="id" name="id">
      <div class="modal-body">
           <div class="form-group">
              <label><b>Fecha de Registro</b></label>
              <input type="date" class="form-control form-control-sm" id="fechagen" placeholder="Fecha de Registro" name="fechagen" required>
            </div>
          <div class="form-group">
            <label><b>Beneficio Economico</b></label>
            <input type="text" class="form-control form-control-sm" id="benef" placeholder="Beneficio Economico" name="benef" required maxlength="9">
          </div>
      </div>
        <button class="btn btn-primary small" type="submit">Save</button>  
</form>
<div class="modal-footer">
    <button onclick="document.getElementById('edit').style.display='none'" type="submit" class="btn btn-danger small">Cancel</button>
 </div>
</div>
</div>
</div>
<div id="delete" class="modal">
<div class="modal-dialog">
  <div class="modal-content">
     <div class="modal-header">
        <h5 class="modal-title">Delete</h5>
        <div class="center">
           <span onclick="document.getElementById('delete').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>
     </div>
     <form class="container" action="{{ route('nasa.destroybenef') }}  " method="POST">
     {{ csrf_field() }}
     <input type="hidden" id="pinn" name="pinn">
     <input type="hidden" id="proye_id" name="proye_id">
        <div class="modal-body">
           <input type="hidden" id="del_id" name="del_id">
           <p>Seguro que deseas borrar el beneficio <span id ="delete_name"></span> ?</p>
           <button type="submit" class="btn btn-primary small"> Delete </button>
        </div>
     </form>
     <div class="modal-footer">
        <button onclick="document.getElementById('delete').style.display='none'" type="submit" class="btn btn-danger small">Cancel</button>
     </div>
  </div>
</div>
</div>
<script>
$( document ).ready(function(){
    $("#grid-basic").bootgrid({
      formatters: {
        "actions": function(column, row)
        {
          return "<button onclick=\"document.getElementById('edit').style.display='block'\" data-pin=\"" + row.pin + "\" data-proyect_id=\"" + row.proyect_id + "\" data-id=\"" + row.id + "\" data-fecha_gen=\"" + row.fecha_gen + "\" data-beneficio=\"" + row.beneficio + "\" data-posicion=\"" + row.posicion + "\" data-nivel=\"" + row.nivel + "\" data-rol=\"" + row.rol + "\" data-direccion=\"" + row.direccion + "\" data-cia=\"" + row.cia + "\" class=\"btn btn-sm btn-outline-primary edit\"><span class=\"fa fa-pencil\"></span></button> " +
          "<button onclick=\"document.getElementById('delete').style.display='block'\" data-id=\"" + row.id + "\" data-proyect_id=\"" + row.proyect_id + "\" data-beneficio1=\"" + row.beneficio1 + "\" class=\"btn btn-sm btn-outline-danger delete\"><span class=\"fa fa-trash\"></span></button>";
        }
      }}).on("loaded.rs.jquery.bootgrid", function (){
        /* Executes after data is loaded and rendered */
        $(this).find(".edit").click(function (e) {
          $('#proyectid').val($(this).data("proyect_id")); 
          $('#id').val($(this).data("id"));
          $('#fechagen').val($(this).data("fecha_gen"));
          $('#benef').val($(this).data("beneficio"));
          $('#gender').val($(this).data("posicion"));
          $('#email').val($(this).data("nivel"));
          $('#country').val($(this).data("rol"));
          $('#salary').val($(this).data("direccion"));
          $('#cia').val($(this).data("cia"));
        });
        $(this).find(".delete").click(function (e) {
          $('#pinn').val($(this).data("id")); 
          $('#proye_id').val($(this).data("proyect_id"));
          $('#benefi').val($(this).data("beneficio"));
          $('#del_id').val($(this).data("id"));
          $('#delete_name').html($(this).data("beneficio1"));
        });
    });
  });  
</script>
@endsection

