@extends('layouts.app')

@section('page', '- Sälj Bil')

@section('content')

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<style>
  
.bg-img {
background-image: url('/sell.jpg');
}

</style>

@include('layouts.header')


<div class="container mt-5 mb-5">
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

            <form class="" method="POST" action="{{ route('customer-sale.store') }}" enctype="multipart/form-data">
              @csrf
              
              <h3>Kontaktuppgifter</h3>
              <hr>

              <div class="form-group">
                <label for="name">Namn</label><label class="text-danger">*</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
              </div>

              <div class="form-group">
                <label for="telephone_number">Telefonnummer</label><label class="text-danger">*</label>
                <input type="text" class="form-control" name="telephone_number" value="{{ old('telephone_number') }}">
              </div>

              <div class="form-group">
                <label for="e_mail">E-post</label><label class="text-danger">*</label>
                <input type="email" class="form-control" name="e_mail" value="{{ old('e_mail') }}">
              </div>

              <h3>Biluppgifter</h3>
              <hr>

              <div class="form-group">
                <label for="licence_plate">Registreringsnummer</label><label class="text-danger">*</label>
                <input type="text" class="form-control" name="licence_plate" value="{{ old('licence_plate') }}">
              </div>

              <div class="form-group">
                <label for="mileage">Miltal</label><label class="text-danger">*</label>
                <input type="number" class="form-control" name="mileage" value="{{ old('mileage') }}">
              </div>

               <div class="form-group">
              <label for="equipment_and_accessories">information kring bilens utrustningsnivå och tillbehör</label>
              <textarea class="form-control" rows="5" name="equipment_and_accessories">{{ old('equipment_and_accessories') }}</textarea>
            </div> 

               <div class="form-group">
              <label for="condition">Information kring bilens skick så som skador, fel eller övriga defekter</label>
              <textarea class="form-control" rows="5" name="condition">{{ old('condition') }}</textarea>
            </div> 

            <h3>Bilder</h3>

            <p>Ju fler bilder du laddar upp desto bättre kan vi värdera din bil.</p>
            <hr>

            <div class="form-group">
              <label for="exterior_1_url">Utvändigt #1</label><label class="text-danger">*</label>
              <input type="file" class="form-control-file" name="exterior_1_url">
            </div>

            <div class="form-group">
              <label for="exterior_2_url">Utvändigt #2</label>
              <input type="file" class="form-control-file" name="exterior_2_url">
            </div>

            <div class="form-group">
              <label for="interior_1_url">Invändigt #1 </label><label class="text-danger">*</label>
              <input type="file" class="form-control-file" name="interior_1_url">
            </div>

            <div class="form-group">
              <label for="interior_2_url">Invändigt #2</label>
              <input type="file" class="form-control-file" name="interior_2_url">
            </div>

            <div class="form-group">
              <label for="service_book_url">Servicebok</label>
              <input type="file" class="form-control-file" name="service_book_url">
            </div>

            <div class="form-group">
              <label for="summer_wheels_url">Sommarhjul</label>
              <input type="file" class="form-control-file" name="summer_wheels_url">
            </div>

            <div class="form-group">
              <label for="winter_wheels_url">Vinterhjul</label>
              <input type="file" class="form-control-file" name="winter_wheels_url">
            </div>

              <div class="form-group">
                {!! htmlFormSnippet() !!}
              </div>              

              <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>
</div>


@endsection
