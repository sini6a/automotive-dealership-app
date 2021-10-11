
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Instrumentpanel</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Du är inloggad som <label class="text-success">{{ Auth::user()->name }}</label>!<br>
                    @if(request()->route()->getName() == 'dashboard.index')
                    (Instrumentpanel)
                    @else
                    (<a href="{{ route('dashboard.index') }}">Instrumentpanel</a>)
                    @endif

                    @if(request()->route()->getName() == 'vehicles.create')
                    (Lägg till nytt fordon)
                    @else
                    (<a href="{{ route('vehicles.create') }}">Lägg till nytt fordon</a>) 
                    @endif
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>
