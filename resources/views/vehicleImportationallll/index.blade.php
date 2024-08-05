@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Vehicle Importations</h1>
    <a href="{{ route('vehicleImportation.create') }}" class="btn btn-primary">Add New Importation</a>
    @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Year</th>
                <th>Category</th>
                <th>New Vehicles</th>
                <th>Used Vehicles</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vehicleImportation as $vehicleImportation)
                <tr>
                    <td>{{ $vehicleImportation->id }}</td>
                    <td>{{ $vehicleImportation->year }}</td>
                    <td>{{ $vehicleImportation->vehicle_category }}</td>
                    <td>{{ $vehicleImportation->new_vehicle_count }}</td>
                    <td>{{ $vehicleImportation->used_vehicle_count }}</td>
                    <td>
                        <a href="{{ route('vehicleImportation.show', $vehicleImportation->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('vehicleImportation.edit', $vehicleImportation->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('vehicleImportation.destroy', $vehicleImportation->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
