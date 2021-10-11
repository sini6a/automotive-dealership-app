@extends('layouts.app')

@section('content')
<style>
.table > tbody > tr > td {
     vertical-align: middle;
}
</style>

@if (session()->has('success'))
<div class="container-fluid">
  <div class="alert alert-success text-center">
      {!! session()->get('success')!!}        
  </div>
</div>
@endif

@include('layouts.logged_as')

<div class="container mt-3">
  <div class="row justify-content-center">
    <div class="col-12">
      <form action="{{ route('vehicles.index') }}" method="get">
        <div class="form-group">
          <label for="filter">Filter fordon:</label>
          <select class="form-control" id="filter" name="filter" onchange="this.form.submit()">
            <option value="all">Visa alla fordon</option>
            <option value="available" {{'available' == $filter ? 'selected' : ''}} >Visa tillgängliga fordon</option>
            <option value="sold" {{'sold' == $filter ? 'selected' : ''}} >Visa bara sålda fordon</option>
          </select>
        </div>
      </form>
    </div>
  </div>
  <hr>
</div>

<div class="container mt-3">
  <div class="row justify-content-center">
    <div class="col-12">
      <form action="{{ route('vehicles.index') }}" method="get" class="">
        <div class="form-group">
          <label for="search">Sök registreringsnummer:</label>
          <input type="text" class="form-control" name="search" value="{{ $search }}">
        </div>
      </form>
    </div>
  </div>
  <hr>
</div>

<div class="container mt-3 mb-3">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Alla bilar</div>

                <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-borderless">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col" class="w-25">Datum</th>
                          <th scope="col">Bil</th>
                          <th scope="col">Registreringsnummer</th>
                          <th scope="col">Tillgängligt</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @forelse ($vehicles as $vehicle)
                        <tr>
                          <td>{{ $vehicle->id }}</td>
                          <td>{{ $vehicle->created_at }}</td>
                          <td>{{ $vehicle->make }} {{ $vehicle->model }}</td>
                          <td>{{ $vehicle->licence_plate }}</td>
                          @if($vehicle->sold)
                          <td class="text-danger">Nej</td>
                          @else
                          <td class="text-success">Ja</td>
                          @endif
                          <td class="float-right text-nowrap">
                            @if($vehicle->sold)
                            <a href="{{ route('vehicles.mark_as_unsold', $vehicle) }}" class="btn btn-sm btn-info"><span class="fas fa-fw fa-arrow-up"></span></a>
                            @else
                            <a href="{{ route('vehicles.mark_as_sold', $vehicle) }}" class="btn btn-sm btn-success"><span class="fas fa-fw fa-check"></span></a>
                            @endif
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
                    {{ $vehicles->appends(request()->input())->links() }}
                </div>

                </div>
            </div>
        </div>
    </div>
    <hr>
</div>

@endsection
