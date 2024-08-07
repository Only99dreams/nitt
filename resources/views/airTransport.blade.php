@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')







<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




<div class="container mt-2">
    
    <button id="add-record" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addModal">Add</button>
    <table id="transport-table" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>ID</th>
        <th>Year</th>
        <th>Domestic Registered</th>
        <th>International Registered</th>
        <th>Domestic Deregistered</th>
        <th>International Deregistered</th>
        <th>No of Near Accident</th>
        <th>No of Accident</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transports as $transport)
            <tr>
                <td>{{ $transport->id }}</td>
                <td>{{ $transport->year }}</td>
                <td>{{ $transport->number_of_domestic_registered_airlines }}</td>
                <td>{{ $transport->number_of_international_registered_airlines}}</td>
                <td>{{ $transport->number_of_domestic_deregistered_airlines }}</td>
                <td>{{ $transport->number_of_international_deregistered_airlines }}</td>
                <td>{{ $transport->number_of_near_accidents }}</td>
                <td>{{ $transport->number_of_accidents }}</td>
                <td>
                    <button class="btn btn-warning btn-sm edit-record" data-id="{{ $transport->id }}" data-toggle="modal" data-target="#editModal" data-record="{{ $transport }}">Edit</button>
                    <button class="btn btn-danger btn-sm delete-record" data-id="{{ $transport->id }}" data-toggle="modal" data-target="#deleteModal" data-record="{{ $transport}}">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="addForm" action="{{ route('airTransport.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="addYear">Year</label>
                        <input type="text" class="form-control" id="addYear" name="year" required>
                    </div>
                    <div class="form-group">
                        <label for="addNumberOfPassengers">Number Of
                          Passengers</label>
                        <input type="number" class="form-control" id="addNumberOfPassengers" name="number_of_passenger_carried" required>
                    </div>
                    <div class="form-group">
                        <label for="addNumberOfVehicles">Number Of Vehicles</label>
                        <input type="number" class="form-control" id="addNumberOfVehicles" name="number_vehicle_in_fleet" required>
                    </div>
                    <div class="form-group">
                        <label for="addRevenue">Revenue</label>
                        <input type="number" class="form-control" id="addRevenue" name="revenue_from_operation" required>
                    </div>
                    <div class="form-group">
                      <label for="addEmployees">Employees</label>
                      <input type="number" class="form-control" id="addEmployees" name="number_of_employees" required>
                  </div>
                  <div class="form-group">
                    <label for="addCost">Annual Cost</label>
                    <input type="number" class="form-control" id="addCost" name="annual_cost_of_vehicle_maintenance" required>
                </div>
                <div class="form-group">
                  <label for="addAccident">Accidents</label>
                  <input type="number" class="form-control" id="addAccident" name="number_of_accidents" required>
              </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="editForm" action="{{ route('airTransport.update', '') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editId" name="id">
                    <div class="form-group">
                        <label for="editYear">Year</label>
                        <input type="text" class="form-control" id="editYear" name="year" required>
                    </div>
                    <div class="form-group">
                        <label for="editNumberOfPassengers">Passengers</label>
                        <input type="text" class="form-control" id="editNumberOfPassengers" name="number_of_passenger_carried" required>
                    </div>
                    <div class="form-group">
                        <label for="editVehicles">Vehicles</label>
                        <input type="number" class="form-control" id="editVehicles" name="number_of_vehicle_in_fleet" required>
                    </div>
                    <div class="form-group">
                        <label for="editRevenue">Revenue</label>
                        <input type="number" class="form-control" id="editRevenue" name="revenue_from_operation" required>
                    </div>
                    <div class="form-group">
                      <label for="editEmployees">Employees</label>
                      <input type="number" class="form-control" id="editEmployees" name="number_of_employees" required>
                  </div>
                  <div class="form-group">
                    <label for="editCost">Cost</label>
                    <input type="number" class="form-control" id="editCost" name="annual_cost_of_vehicle_maintenance" required>
                </div>
                <div class="form-group">
                  <label for="editAccidents">Accidents</label>
                  <input type="number" class="form-control" id="editAccidents" name="number_accidents" required>
              </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="deleteForm" action="{{ route('airTransport.destroy', '') }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this record?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#transport-table').DataTable();

        // Handle Add button click
        $('#add-transport').on('click', function() {
            $('#addModal').modal('show');
        });

        // Handle Edit button click
        $('.edit-transport').on('click', function() {
            var passenger = $(this).data('transport');
            $('#editId').val(transport.id);
            $('#editYear').val(transport.year);
            $('#editNumberOfPassengers').val(transport.number_of_passenger_carried);
            $('#editVehicles').val(transport.number_of_vehicle_in_fleet);
            $('#editRevenue').val(transport.revenue_from_operation);
            $('#editEmployees').val(transport.number_of_employees);
            $('#editCost').val(transport.annual_cost_of_vehicle_maintenance);
            $('#editAccidents').val(transport.number_of_accidents);
            $('#editForm').attr('action', '/airTransport/' + transport.id);
            $('#editModal').modal('show');
        });

        // Handle Delete button click
        $('.delete-transport').on('click', function() {
            var transport = $(this).data('transport');
            $('#deleteForm').attr('action', '/airTransport/' + passenger.id);
            $('#deleteModal').modal('show');
        });
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