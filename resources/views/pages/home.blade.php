@extends('main')

@section('title', 'Pagrindinis')

@section('content')

    <div class="jumbotron text-center">
        <h1 class="display-4">Sveiki atvykę į Weekly Menu!</h1>
        <p class="lead">Aš žinau daug receptų ir galiu sukurti savaitės meniu.</p>
        <hr class="my-4">
        <a class="btn btn-outline-dark btn-lg mb-2 mb-sm-0" href="{{route('newRecipe')}}" role="button">Pridėti naują receptą</a>
        <a class="btn btn-outline-dark btn-lg ml-sm-2 mb-2 mb-sm-0" href="{{ route('genType') }}" role="button">Sukurti savaitės meniu</a>
    </div>
@endsection
