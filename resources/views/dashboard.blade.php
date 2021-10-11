@extends('layouts.app')

@section('content')
<style>
.table > tbody > tr > td {
     vertical-align: middle;
}
</style>

@include('layouts.logged_as')

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Fordonen skickas in för dig -
                  @if($sell_vehicle)
                  {{ count($sell_vehicle) }}
                  @endif
                </div>

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
                        
                        @forelse ($sell_vehicle as $vehicle)
                        <tr class="{{$vehicle->opened ? '' : 'text-danger'}} ">
                          <td>{{ $vehicle->id }}</td>
                          <td>{{ $vehicle->created_at }}</td>
                          <td>{{ $vehicle->name }}</td>
                          <td>{{ $vehicle->licence_plate }}</td>
                          <td>{{ $vehicle->telephone_number }}</td>
                          <td class="float-right">
                            <a href="{{ route('customer-sale.show', $vehicle) }}" class="btn btn-sm btn-primary"><span class="fas fa-fw fa-bars"></span></a>
                          </td>
                        </tr>
                        @empty
                        <tr>
                            <th colspan="4">Inga data!</th>     
                        </tr>
                        @endforelse
                        
                      </tbody>
                    </table>
                </div>

                <a href="{{ route('customer-sale.index') }}"><p class="text-center">Visa all data</p></a>

                </div>
            </div>
        </div>
    </div>
    <hr>
</div>

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Tillgängliga fordon
                  @if(count($vehicles_for_sale) > 0)
                  - {{ count($vehicles_for_sale) }}
                  @endif
                </div>

                <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-borderless">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col" class="w-25">Datum</th>
                          <th scope="col">Bil</th>
                          <th scope="col">Registreringsnummer</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @forelse ($vehicles_for_sale as $vehicle)
                        <tr>
                          <td>{{ $vehicle->id }}</td>
                          <td>{{ $vehicle->created_at }}</td>
                          <td>{{ $vehicle->make }} {{ $vehicle->model }}</td>
                          <td>{{ $vehicle->licence_plate }}</td>
                          <td class="float-right text-nowrap">
                            <a href="{{ route('vehicles.mark_as_sold', $vehicle) }}" class="btn btn-sm btn-success"><span class="fas fa-fw fa-check"></span></a>
                            <a href="{{ route('vehicles.edit', $vehicle) }}" class="btn btn-sm btn-primary"><span class="fas fa-fw fa-pen"></span></a>
                            <a href="{{ route('vehicles.confirm_deletion', $vehicle) }}" class="btn btn-sm btn-danger"><span class="fas fa-fw fa-times"></span></a>
                          </td>
                        </tr>
                        @empty
                        <tr>
                            <th colspan="4">Inga data!</th>     
                        </tr>
                        @endforelse
                        
                      </tbody>
                    </table>
                </div>

                <a href="{{ route('vehicles.index') }}"><p class="text-center">Visa all data</p></a>


                </div>
            </div>
        </div>
    </div>
    <hr>
</div>

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Sålda fordon
                  @if(count($sold_vehicles) > 0)
                  - {{ count($sold_vehicles) }}
                  @endif
                </div>

                <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-borderless">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col" class="w-25">Datum</th>
                          <th scope="col">Bil</th>
                          <th scope="col">Registreringsnummer</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @forelse ($sold_vehicles as $vehicle)
                        <tr>
                          <td>{{ $vehicle->id }}</td>
                          <td>{{ $vehicle->created_at }}</td>
                          <td>{{ $vehicle->make }} {{ $vehicle->model }}</td>
                          <td>{{ $vehicle->licence_plate }}</td>
                          <td class="float-right">
                            <a href="{{ route('vehicles.mark_as_unsold', $vehicle) }}" class="btn btn-sm btn-info"><span class="fas fa-fw fa-arrow-up"></span></a>
                            <a href="{{ route('vehicles.edit', $vehicle) }}" class="btn btn-sm btn-primary"><span class="fas fa-fw fa-pen"></span></a>
                            <a href="{{ route('vehicles.confirm_deletion', $vehicle) }}" class="btn btn-sm btn-danger"><span class="fas fa-fw fa-times"></span></a>
                          </td>
                        </tr>
                        @empty
                        <tr>
                            <th colspan="4">Inga data!</th>     
                        </tr>
                        @endforelse
                        
                      </tbody>
                    </table>
                </div>

                <a href="{{ route('vehicles.index') }}"><p class="text-center">Visa all data</p></a>


                </div>
            </div>
        </div>
    </div>
    <hr>
</div>
@endsection
