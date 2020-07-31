@extends('main')

@section('title', 'Visi receptai')

@section('content')

    @if (session('success'))
        <div class="alert alert-success mt-1">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="mb-3">Visi receptai</h2>
    <div class="row row-cols-1 row-cols-md-3">
        @foreach($recipes as $recipe)
        <div class="col mb-4 card-grow">
            <div class="card text-center">
                <div class="card-body d-flex flex-column">
                    <h4 class="card-title">{{$recipe->title}}</h4>
                    <h6 class="card-subtitle text-muted mb-2">{{$recipe->comment}}</h6>
                    <p class="card-text text-truncate">Reikės: {{str_replace("\r", "", str_replace("\n", ", ", $recipe->ingredients))}}</p>
                    <a href="{{route('oneRecipe', ['recipe' => $recipe->id])}}" class="btn btn-outline-dark stretched-link mt-auto">Plačiau</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

@endsection
