@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')

 <link href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css" rel="stylesheet">

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<br/>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Vehicle Importation</h3>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#vehicle-modal" onclick="addVehicle()">
            Add
        </button>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card-body">
        <table id="ajax-crud-datatable" class="table table-bordered yajra-datatable data-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Year</th>
                <th>Vehicle Category</th>
                <th>New Vehicle</th>
                <th>Used Vehicle</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>  
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Year</th>
                <th>Vehicle Category</th>
                <th>New Vehicle</th>
                <th>Used Vehicle</th>
                <th>Action</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>

<div class="modal fade" id="vehicle-modal" tabindex="-1" aria-labelledby="vehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="vehicleModalLabel">Vehicle Importation</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('store') }}" id="vehicleForm" name="vehicleForm" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="number" class="form-control" id="year" name="year" placeholder="Enter year">
                    </div>
                    <div class="form-group">
                        <label for="vehicleCategory">Vehicle Category</label>
                        <input type="text" class="form-control" id="vehicle_category" name="vehicle_category" placeholder="Enter vehicle category">
                    </div>
                    <div class="form-group">
                        <label for="newVehicle">New Vehicle</label>
                        <input type="number" class="form-control" id="new_vehicle_count" name="new_vehicle_count" placeholder="Enter new vehicle">
                    </div>
                    <div class="form-group">
                        <label for="usedVehicle">Used Vehicle</label>
                        <input type="number" class="form-control" id="used_vehicle_count" name="used_vehicle_count" placeholder="Enter used vehicle">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="vehicleForm">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>



<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


<script type="text/javascript">
  var table = $(".data-table").DataTables({
    serverSide:true,
    processing:true,
    ajax:"{{route('vehicleImportation.index')}}",
    columns:[
      {data:'DT_RowIndex', name:'DT_RowIndex'},
      {data:'year', name:'year'},
      {data:'vehicle_category', name:'vehicle_category'},
      {data:'new_vehicle_count', name:'new_vehicle_count'},
      {data:'used_vehicle_count', name:'used_vehicle_count'},
    ]
  });



</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
