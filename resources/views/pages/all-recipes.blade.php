@extends('main')

@section('title', 'Visi receptai')

@section('content')

    @if (session('success'))
        <div class="alert alert-success mt-1">
            {{ session('success') }}
        </div>
    @endif

    <h2>Visi receptai</h2>
    <div class="row row-cols-1 row-cols-md-2">
        @foreach($recipes as $recipe)
        <div class="col mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$recipe->title}}</h5>
                    <h6 class="card-subtitle text-muted mb-2">{{$recipe->comment}}</h6>
                    <p class="card-text text-truncate">Reikės: {{$recipe->ingredients}}</p>
                    <a href="{{route('oneRecipe', ['recipe' => $recipe->id])}}" class="btn btn-outline-dark">Plačiau</a>
{{--                    @isset($recipe->url)--}}
{{--                    <a href="{{$recipe->url}}" target="_blank" class="btn btn-outline-dark">Šaltinis</a>--}}
{{--                    @endisset--}}
                </div>
            </div>
        </div>
        @endforeach
    </div>


@endsection
