@extends('main')

@section('title', 'Recepto atnaujinimas')

@section('content')

    <h2>Recepto redagavimas</h2>
    <p>Atnaujinkite receptą ar pridėkte komentarą</p>
    <form method="post" action="/save-updated-recipe/{{ $recipe->id }}">
        @csrf
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Pavadinimas</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title" id="title" value="{{ $recipe->title }}">
            </div>
        </div>
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group row">
            <label for="ingredients" class="col-sm-2 col-form-label">Ingredientai</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="ingredients" id="ingredients" rows="5">{{ $recipe->ingredients }}</textarea>
            </div>
        </div>
        @error('ingredients')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group row">
            <label for="instructions" class="col-sm-2 col-form-label">Gaminimo eiga</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="instructions" id="instructions" rows="5">{{ $recipe->instructions }}</textarea>
            </div>
        </div>
        @error('instructions')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group row">
            <label for="url" class="col-sm-2 col-form-label">Nuoroda į šaltinį</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="url" id="url" value="{{ $recipe->url }}">
            </div>
        </div>
        @error('url')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group row">
            <label for="comment" class="col-sm-2 col-form-label">Komentarai</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="comment" id="comment" rows="3">{{ $recipe->comment }}</textarea>
            </div>
        </div>
        @error('comment')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#saveRecipeModal">Išsaugoti</button>
        <a class="btn btn-outline-danger" href="{{ route('oneRecipe', ['recipe' => $recipe->id]) }}" role="button">Atšaukti</a>

        <!-- Modal -->
        <div class="modal fade" id="saveRecipeModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Išsaugoti receptą</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Ar tikrai norite išsaugoti naują receptą?</p>
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
