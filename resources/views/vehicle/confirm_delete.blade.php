@extends('layouts.app')

@section('content')

@include('layouts.logged_as')

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-12">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="text-center" method="POST" action="{{ route('vehicles.destroy', $vehicle) }}">
              @method('DELETE')
              @csrf

  <div class="form-group mx-sm-3 mb-2">
    <label class="text-danger">Är du säker att du vill radera fordonet <strong>{{ $vehicle->licence_plate }}</strong>?</label>
  </div>
  <div class="form-group mx-sm-3 mb-2">
  <button type="submit" class="btn btn-primary mb-2">Ja, jag är säker!</button>
    <a href="{{ route('dashboard.index') }}" class="btn btn-danger mb-2">Tillbaka!</a>
</div>


                <div class="col-lg-6 col-md-10 col-sm-12 mx-auto">
              <img class="img-fluid img-thumbnail" src="/storage/{{ $vehicle->picture_url }}" />
            </div>
        </div>


            </form>
        </div>
    </div>
</div>

@endsection
