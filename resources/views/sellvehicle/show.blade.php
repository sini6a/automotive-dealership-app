@extends('layouts.app')

@section('content')
<style>
.table > tbody > tr > td {
     vertical-align: middle;
}
.carousel {
  width:100%;
  height: 35em;
}

.carousel-inner {
  height: 35em;
}

.carousel-item {
  height: 100%;
}

.carousel-item img {
  object-fit: contain;
  height: 100%;
}



.col-lg-6 #vehicle_info {
  height: 100%;
}

.col-lg-6 #vehicle_info .table {
  overflow-y: scroll;
}

</style>

@include('layouts.logged_as')

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-12 mb-3">
            <div class="card">
                <div class="card-header">{{ $customer_sale->licence_plate }}</div>

                <div class="card-body" style="padding: 0;">

                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img class="d-block w-100" src="/storage/{{ $customer_sale->exterior_1_url }}" alt="Image not available">
                        </div>
                        @if($customer_sale->exterior_2_url)
                        <div class="carousel-item">
                          <img class="d-block w-100" src="/storage/{{ $customer_sale->exterior_2_url }}" alt="Image not available">
                        </div>
                        @endif
                        <div class="carousel-item">
                          <img class="d-block w-100" src="/storage/{{ $customer_sale->interior_1_url }}" alt="Image not available">
                        </div>
                        @if($customer_sale->interior_2_url)
                        <div class="carousel-item">
                          <img class="d-block w-100" src="/storage/{{ $customer_sale->interior_2_url }}" alt="Image not available">
                        </div>
                        @endif
                        @if($customer_sale->service_book_url)
                        <div class="carousel-item">
                          <img class="d-block w-100" src="/storage/{{ $customer_sale->service_book_url }}" alt="Image not available">
                        </div>
                        @endif
                        @if($customer_sale->summer_wheels_url)
                        <div class="carousel-item">
                          <img class="d-block w-100" src="/storage/{{ $customer_sale->summer_wheels_url }}" alt="Image not available">
                        </div>
                        @endif
                        @if($customer_sale->winter_wheels_url)
                        <div class="carousel-item">
                          <img class="d-block w-100" src="/storage/{{ $customer_sale->winter_wheels_url }}" alt="Image not available">
                        </div>
                        @endif
                      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Föregående</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Nästa</span>
                      </a>
                    </div>
                  </div>

              </div>
          </div>
      </div>

      <div class="col-lg-6 col-md-12 mb-3" id="vehicle">
          <div id="vehicle_info" class="card">
              <div class="card-header">{{ $customer_sale->licence_plate }}</div>

              <div class="card-body">

                <div class="table-responsive">

                  <table class="table table-borderless">
                    <tr>
                      <td class="w-50">Registreringsnummer</td>
                      <td class="w-50"><strong>{{ $customer_sale->licence_plate }}</strong></td>
                    </tr>
                    <tr>
                      <td>Miltal</td>
                      <td><strong>{{ $customer_sale->mileage }}</strong></td>
                    </tr>
                    @if($customer_sale->equipment_and_accessories)
                    <tr>
                      <td colspan="2"><strong>{{ $customer_sale->equipment_and_accessories }}</strong></td>
                    </tr>
                    @endif
                    @if($customer_sale->condition)
                    <tr>
                      <td colspan="2"><strong>{{ $customer_sale->condition }}</strong></td>
                    </tr>
                    @endif
                  </table>

                </div>
            </div>
        </div>
    </div>


  </div>
  <hr>
</div>

<div class="container mt-3 mb-3">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Kunddetaljer</div>

                <div class="card-body">

                  <div class="table-responsive">

                    <table class="table table-borderless">
                      <tr>
                        <td class="w-50">Namn</td>
                        <td class="w-50"><strong>{{ $customer_sale->name }}</strong></td>
                      </tr>
                      <tr>
                        <td>Telefonnummer</td>
                        <td><strong>{{ $customer_sale->telephone_number }}</strong></td>
                      </tr>
                      <tr>
                        <td>E-Post</td>
                        <td><strong>{{ $customer_sale->e_mail }}</strong></td>
                      </tr>
                    </table>

                  </div>


                </div>
            </div>
        </div>
    </div>
    <hr>
</div>

@endsection
