@extends('layouts.app')

@section('content')
<style>
  
.bg-img {
background-image: url('/about.jpg');
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
    <div class="row">
      <div class="col-12">
      <h3>Error 404</h3>
      <hr>
      <p>The URL you are trying to access does not exist. Please go back.</p>
    </div>
    </div>
</div>

@endsection
