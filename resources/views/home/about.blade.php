@extends('layouts.app')

@section('page', '- Om oss')

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
      <h3>Om Oss</h3>
      <hr>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin porta diam quis urna congue, at porta eros volutpat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas in ultrices nisl. Praesent pretium efficitur nisi, et consequat tortor ultricies et. Etiam sed bibendum lectus. Nulla massa augue, hendrerit sed vehicula euismod, accumsan quis felis. Nunc ante lorem, sodales quis cursus eget, tristique at metus. Donec non turpis risus. Donec pellentesque elit in velit pulvinar tincidunt. </p>
    </div>
    </div>
</div>

@endsection
