@extends('layouts.app')

@section('content')
<style>
.card-img-top {
  height: 20em;
  object-fit: cover;
}

.align-items-center {
  display: flex; 
  align-items: baseline;  /*Aligns vertically center */
}

</style>

@include('layouts.header')

@if (session()->has('success'))
<div class="container-fluid">
  <div class="alert alert-success text-center">
      {!! session()->get('success')!!}        
  </div>
</div>
@endif

<div class="container mt-5 mb-5">
    <h3>Bilar</h3>
    <hr>
    <div class="row">

          @forelse ($vehicles as $vehicle)
          <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
          <div class="card" style="">
            <img class="card-img-top" src="/storage/{{ $vehicle->picture_url }}" alt="Image not available">
            <div class="card-body">
              <div class="row align-items-center">
                <h6 class="card-title col-6 text-left" style="white-space:nowrap; width:75%;">{{ $vehicle->make }} {{ $vehicle->model }}</h6>
                <h5 class="card-title col-6 text-right">{{ $vehicle->licence_plate }}</h5>
              </div>
              <a href="{{ $vehicle->link_url }}" target="_blank" class="btn btn-outline-primary btn-block">Visa på Blocket</a>
            </div>
          </div>
        </div>
          @empty
	<div class="container-fluid">
		<div class="alert alert-info text-center">  
			<p class="text-center">Inga fordon än.</p>
		</div>
	</div>
          @endforelse

          <div class="col-12 text-xs-center">
          {{ $vehicles->links() }}
          </div>
    </div>
</div>

@endsection
