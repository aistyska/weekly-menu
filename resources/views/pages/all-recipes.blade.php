@extends('main')

@section('title', 'Visi receptai')

@section('content')

    @if (session('success'))
        <div class="alert alert-success mt-1">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="mb-3">Visi receptai</h2>

    <form class="d-flex mb-4" method="get">
        <input type="search" class="form-control mr-2" id="search" name="title" placeholder="Recepto pavadinimas" value="{{ $input }}">
        <button type="submit" class="btn btn-outline-success">Ieškoti</button>
    </form>
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @if($count == 0)
        <div class="alert alert-warning mt-1">
            Rezultatų, atitinkančių paiešką "{{ $input }}" nėra.
        </div>
    @endif

    <div class="row row-cols-1 row-cols-md-3">
        <div class="col mb-4 card-grow">
            <div class="card text-center">
                <div class="card-body d-flex flex-column">
                    <h4 class="card-title mt-auto">Naujas receptas</h4>
                    <h6 class="card-subtitle text-muted mb-2">Užpildykite formą ir išsaugokite naują receptą</h6>
                    <a href="{{route('newRecipe')}}" class="btn btn-dark stretched-link mt-auto">Sukurti receptą</a>
                </div>
            </div>
        </div>
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
    <button type="button" id="toTopBtn" class="btn btn-outline-dark">Į viršų</button>

@endsection
