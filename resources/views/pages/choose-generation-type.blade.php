@extends('main')

@section('title', 'Pasirinkti meniu sudarymo būdą')

@section('content')

    <h2 class="mb-3">Pasirinkite meniu sukūrimo būdą</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
        <div class="col mb-4">
            <div class="card text-center">
                <div class="card-body d-flex flex-column">
                    <h4 class="card-title">Generuoti automatiškai</h4>
                    <p class="card-text">Savaitės meniu bus sugeneruotas automatiškai.</p>
                    <a href="{{ route('generate') }}" class="btn btn-outline-dark mt-auto">Generuoti</a>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card text-center">
                <div class="card-body d-flex flex-column">
                    <h4 class="card-title">Pasidaryti pačiam</h4>
                    <p class="card-text">Galėsite išsirinkti patiekalus ir savaitės meniu susidarysite pats.</p>
                    <a href="{{ route('manual') }}" class="btn btn-outline-dark mt-auto">Išsirinkti patiekalus</a>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card text-center">
                <div class="card-body d-flex flex-column">
                    <h4 class="card-title">Generuoti ir koreguoti</h4>
                    <p class="card-text">Savaitės meniu bus sugeneruotas automatiškai, o jūs galėsite keisti patiekalus ir jų tvarką.</p>
                    <a href="{{ route('genAndManual') }}" class="btn btn-outline-dark mt-auto">Generuoti ir rinktis</a>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card text-center">
                <div class="card-body d-flex flex-column">
                    <h4 class="card-title">Pasirinkti iš ankstesnių</h4>
                    <p class="card-text">Savaitės meniu galėsite pasirinkti iš anksčiau sudarytų meniu sąrašo.</p>
                    <a href="{{ route('previousMenu') }}" class="btn btn-outline-dark mt-auto">Rinktis iš buvusių</a>
                </div>
            </div>
        </div>
    </div>

@endsection
