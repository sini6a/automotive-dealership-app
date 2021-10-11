@extends('layouts.app')

@section('content')

@include('layouts.logged_as')

<div class="container mt-3 mb-3">
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

            <form class="" method="POST" action="{{ route('vehicles.update', $vehicle) }}" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              
              <div class="form-group">
                <label for="make">Märke *</label>
                <input type="text" class="form-control" name="make" value="{{ $vehicle->make }}">
              </div>

              <div class="form-group">
                <label for="model">Modell *</label>
                <input type="text" class="form-control" name="model" value="{{ $vehicle->model }}">
              </div>

              <div class="form-group">
                <label for="licence_plate">Registreringsnummer *</label>
                <input type="text" class="form-control" name="licence_plate" value="{{ $vehicle->licence_plate }}">
              </div>

              <div class="form-group">
                <label for="link_url">Blocket URL *</label>
                <input type="text" class="form-control" name="link_url" value="{{ $vehicle->link_url }}">
              </div>

              <div class="form-group">
                <label for="picture_url">Bild *</label>
                <input type="file" class="form-control-file" name="picture_url">
              </div>

              <button type="submit" class="btn btn-primary">Skicka</button>

            </form>
        </div>
    </div>
</div>

@endsection
