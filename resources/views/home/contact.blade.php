@extends('layouts.app')

@section('page', '- Kontakt')

@section('content')

<style>
  
.bg-img {
background-image: url('/loading.gif');
}

</style>

  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2130.3869883123875!2d11.888645516118286!3d57.72686994549146!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x464f8b60d871396d%3A0x2a4dfd144556f537!2sDimv%C3%A4dersgatan%2049%2C%20418%2037%20G%C3%B6teborg!5e0!3m2!1ssv!2sse!4v1633971171473!5m2!1ssv!2sse" class="bg-img" style="width: 100%;" frameborder="0" style="border:0;" allowfullscreen=""></iframe>



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

            <form class="" method="POST" action="{{ route('sendMail') }}" enctype="multipart/form-data">
              @csrf

              <h3>Kontaktformulär</h3>
              <hr>

              <div class="form-group">
                <label for="name">Ditt Namn</label><label class="text-danger">*</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
              </div>

              <div class="form-group">
                <label for="telephone_number">Telefonnummer</label><label class="text-danger">*</label>
                <input type="text" class="form-control" name="telephone_number" value="{{ old('telephone_number') }}">
              </div>

              <div class="form-group">
                <label for="e_mail">Din e-post</label><label class="text-danger">*</label>
                <input type="email" class="form-control" name="e_mail" value="{{ old('e_mail') }}">
              </div>

               <div class="form-group">
              <label for="message">Ditt meddelande</label><label class="text-danger">*</label>
              <textarea class="form-control" rows="5" name="message">{{ old('message') }}</textarea>
            </div>

              <div class="form-group">
                {!! htmlFormSnippet() !!}
              </div>              


              <button type="submit" class="btn btn-primary">Skicka</button>

            </form>
        </div>
    </div>
</div>


@endsection
