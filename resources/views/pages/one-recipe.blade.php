@extends('main')

@section('title', $recipe->title)

@section('content')

    @if (session('success'))
        <div class="alert alert-success mt-1">
            {{ session('success') }}
        </div>
    @endif

    <a class="btn btn-outline-dark" href="{{ route('allRecipes') }}">Visi receptai</a>
    <h2>{{$recipe->title}}</h2>
    <h4>Ingredientai</h4>
    <p>{!! nl2br(e($recipe->ingredients)) !!}</p>
    <h4>Gaminimo eiga</h4>
    <p>{!! nl2br(e($recipe->instructions)) !!}</p>
    @isset($recipe->comment)
    <h5>Komentarai</h5>
    <p>{{$recipe->comment}}</p>
    @endisset
    @isset($recipe->url)
    <a href="{{$recipe->url}}" target="_blank" class="btn btn-outline-dark">Šaltinis</a>
    @endisset
    <a href="{{ route('editRecipe', ['recipe' => $recipe->id]) }}" class="btn btn-outline-dark">Redaguoti</a>
    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteRecipeModal">Ištrinti</button>

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
