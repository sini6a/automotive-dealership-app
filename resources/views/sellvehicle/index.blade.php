@extends('layouts.app')

@section('content')
<style>
.table > tbody > tr > td {
     vertical-align: middle;
}
</style>

@include('layouts.logged_as')

<div class="container mt-3 mb-3">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Fordonet skickas in för dig</div>

                <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-borderless">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col" class="w-25">Datum</th>
                          <th scope="col">Namn</th>
                          <th scope="col">Registreringsnummer</th>
                          <th scope="col">Telefonnummer</th>     
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @forelse ($sell_vehicles as $vehicle)
                        <tr class="{{$vehicle->opened ? '' : 'text-danger'}}">
                          <td>{{ $vehicle->id }}</td>
                          <td>{{ $vehicle->created_at }}</td>
                          <td>{{ $vehicle->name }}</td>
                          <td>{{ $vehicle->licence_plate }}</td>
                          <td>{{ $vehicle->telephone_number }}</td>
                          <td class="float-right">
                            <a href="{{ route('customer-sale.show', $vehicle) }}" class="btn btn-sm btn-primary"><span class="fas fa-bars"></span></a>
                          </td>
                        </tr>
                        @empty
                        <tr>
                            <th colspan="4">No data!</th>     
                        </tr>
                        @endforelse
                        
                      </tbody>
                    </table>
                    {{ $sell_vehicles->links() }}
                </div>

                </div>
            </div>
        </div>
    </div>
    <hr>
</div>

@endsection
