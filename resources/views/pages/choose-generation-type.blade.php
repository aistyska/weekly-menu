@extends('main')

@section('title', 'Pasirinkti meniu sudarymo būdą')

@section('content')

    <h2>Pasirinkite meniu sukūrimo būdą</h2>
    <div class="row row-cols-1 row-cols-md-3">
        <div class="col mb-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Generuoti automatiškai</h4>
                    <p class="card-text">Savaitės meniu bus sugeneruotas automatiškai.</p>
                    <a href="{{ route('generate') }}" class="btn btn-outline-dark">Generuoti</a>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pasidaryti pačiam</h4>
                    <p class="card-text">Galėsite išsirinkti patiekalus ir savaitės meniu susidarysite pats.</p>
                    <a href="{{ route('manual') }}" class="btn btn-outline-dark">Išsirinkti patiekalus</a>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pasirinkti iš ankstesnių</h4>
                    <p class="card-text">Savaitės meniu galėsite pasirinkti iš anksčiau sudarytų meniu sąrašo.</p>
                    <a href="#" class="btn btn-outline-dark">Rinktis iš buvusių</a>
                </div>
            </div>
        </div>
    </div>

@endsection
