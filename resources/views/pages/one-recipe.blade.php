@extends('main')

@section('title', $recipe->title)

@section('content')

    @if (session('success'))
        <div class="alert alert-success mt-1">
            {{ session('success') }}
        </div>
    @endif

    <a class="btn btn-outline-dark" href="{{ route('allRecipes') }}">Visi receptai</a>
    <h2 class="my-3">{{$recipe->title}}</h2>
    <div class="row">
        <div class="col-md-5">
            <h4><u>Ingredientai</u></h4>
            <p>{!! nl2br(e($recipe->ingredients)) !!}</p>
        </div>
        <div class="col-md">
            <h4><u>Gaminimo eiga</u></h4>
            <p>{!! nl2br(e($recipe->instructions)) !!}</p>
        </div>
    </div>
    @isset($recipe->comment)
    <h5><u>Komentarai</u></h5>
    <p>{{$recipe->comment}}</p>
    @endisset
    @isset($recipe->url)
    <a href="{{$recipe->url}}" target="_blank" class="btn btn-outline-dark m-1">Šaltinis</a>
    @endisset
    <a href="{{ route('editRecipe', ['recipe' => $recipe->id]) }}" class="btn btn-outline-dark m-1">Redaguoti</a>
    <button type="button" class="btn btn-outline-danger m-1" data-toggle="modal" data-target="#deleteRecipeModal">Ištrinti</button>

    <!-- Modal -->
    <div class="modal fade" id="deleteRecipeModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ištrinti receptą</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Ar tikrai norite ištrinti šį receptą?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('deleteRecipe', ['recipe' => $recipe->id]) }}" class="btn btn-outline-danger">Ištrinti</a>
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Atšaukti</button>
                </div>
            </div>
        </div>
    </div>

@endsection
