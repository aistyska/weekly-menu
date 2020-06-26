@extends('main')

@section('title', $recipe->title)

@section('content')

    <h2>{{$recipe->title}}</h2>
    <h4>Ingredientai</h4>
    <p>{{$recipe->ingredients}}</p>
    <h4>Gaminimo eiga</h4>
    <p>{{$recipe->instructions}}</p>
    @isset($recipe->comment)
    <h5>Komentarai</h5>
    <p>{{$recipe->comment}}</p>
    @endisset
    <a href="{{$recipe->url}}" target="_blank" class="btn btn-outline-dark">Šaltinis</a>
@endsection
