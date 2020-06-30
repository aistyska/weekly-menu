@extends('main')

@section('title', 'Savaitės meniu')

@section('content')

    <h2>Savaitės meniu</h2>
    <h5>Vienas patiekalas yra skirtas vienos dienos vakarienei bei kitos dienos pietums.</h5>
    <p class="text-muted">Patiekalo receptą galite pamatyti paspaudę ant jo pavadinimo.</p>
    <p>Nepatinka šis meniu? <a href="{{ route('generate') }}" class="btn btn-outline-dark btn-sm">Generuoti naują</a>
    </p>


    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Pirmadienis</th>
                    <th scope="col">Antradienis</th>
                    <th scope="col">Trečiadienis</th>
                    <th scope="col">Ketvirtadienis</th>
                    <th scope="col">Penktadienis</th>
                    <th scope="col">Šeštadienis</th>
                    <th scope="col">Sekmadienis</th>
                </tr>
            </thead>
            <tbody>
                <tr>
            @foreach($menu as $recipe)
                    <td><a href="{{route('oneRecipe', ['recipe' => $recipe->id])}}" class="text-dark" target="_blank">{{ $recipe->title }}</a></td>
            @endforeach
                </tr>
            </tbody>
        </table>
    </div>

@endsection
