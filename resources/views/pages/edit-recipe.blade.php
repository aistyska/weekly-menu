@extends('main')

@section('title', 'Recepto atnaujinimas')

@section('content')

    <h2 class="mb-3">Recepto redagavimas</h2>
    <p>Atnaujinkite receptą ar pridėkte komentarą</p>
    <form method="post" action="/save-updated-recipe/{{ $recipe->id }}">
        @csrf
        <div class="form-group">
            <label for="title">Pavadinimas</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $recipe->title }}">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-row">
            <div class="form-group col-md">
                <label for="ingredients">Ingredientai</label>
                <textarea class="form-control" name="ingredients" id="ingredients" rows="7">{{ $recipe->ingredients }}</textarea>
                @error('ingredients')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md">
                <label for="instructions">Gaminimo eiga</label>
                <textarea class="form-control" name="instructions" id="instructions" rows="7">{{ $recipe->instructions }}</textarea>
                @error('instructions')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="url">Nuoroda į šaltinį</label>
            <input type="text" class="form-control" name="url" id="url" value="{{ $recipe->url }}">
            @error('url')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="comment">Komentarai</label>
            <textarea class="form-control" name="comment" id="comment" rows="3">{{ $recipe->comment }}</textarea>
            @error('comment')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="custom-control custom-checkbox mb-2">
            <input type="checkbox" class="custom-control-input" id="useInMenu" name="use_in_menu" @if($recipe->use_in_menu == 1) checked @endif>
            <label class="custom-control-label" for="useInMenu">Receptas gali būti naudojamas sudarinėjant savaitės meniu</label>
        </div>
        <button type="button" class="btn btn-outline-success m-1" data-toggle="modal" data-target="#saveRecipeModal">Išsaugoti</button>
        <a class="btn btn-outline-danger m-1" href="{{ route('oneRecipe', ['recipe' => $recipe->id]) }}" role="button">Atšaukti</a>

        <!-- Modal -->
        <div class="modal fade" id="saveRecipeModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Atnaujinti receptą</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Ar tikrai norite išsaugoti atnaujintą receptą?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success">Išsaugoti</button>
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Atšaukti</button>
                    </div>
                </div>
            </div>
        </div>

    </form>

@endsection
