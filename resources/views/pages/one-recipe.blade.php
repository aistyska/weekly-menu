@extends('main')

@section('title', $recipe->title)

@section('content')

    @if (session('success'))
        <div class="alert alert-success mt-1">
            {{ session('success') }}
        </div>
    @endif

    <a class="btn btn-outline-dark" href="{{url()->previous()}}">Grįžti atgal</a>
    <h2>{{$recipe->title}}</h2>
    <h4>Ingredientai</h4>
    <p>{!! nl2br(e($recipe->ingredients)) !!}</p>
    <h4>Gaminimo eiga</h4>
    <p>{!! nl2br(e($recipe->instructions)) !!}</p>
    @isset($recipe->comment)
    <h5>Komentarai</h5>
    <p>{{$recipe->comment}}</p>
    @endisset
    <a href="{{$recipe->url}}" target="_blank" class="btn btn-outline-dark">Šaltinis</a>
    <a href="{{ route('editRecipe', ['recipe' => $recipe->id]) }}" class="btn btn-outline-dark">Redaguoti</a>
@endsection
