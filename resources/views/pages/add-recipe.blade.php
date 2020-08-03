@extends('main')

@section('title', 'Naujas receptas')

@section('content')

    <h2 class="mb-3">Naujas receptas</h2>
    <p>Užpildykite formą ir išsaugokite receptą</p>
    <form method="post" action="/save-recipe">
        @csrf
        <div class="form-group">
            <label for="title">Pavadinimas</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-row">
            <div class="form-group col-md">
                <label for="ingredients">Ingredientai</label>
                <textarea class="form-control" name="ingredients" id="ingredients" rows="7">{{old('ingredients')}}</textarea>
                @error('ingredients')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md">
                <label for="instructions">Gaminimo eiga</label>
                <textarea class="form-control" name="instructions" id="instructions" rows="7">{{old('instructions')}}</textarea>
                @error('instructions')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="url">Nuoroda į šaltinį</label>
            <input type="text" class="form-control" name="url" id="url" value="{{ old('url') }}">
            @error('url')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="comment" >Komentarai</label>
            <textarea class="form-control" name="comment" id="comment" rows="3">{{old('comment')}}</textarea>
            @error('comment')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="button" class="btn btn-outline-success m-1" data-toggle="modal" data-target="#saveRecipeModal">Išsaugoti</button>
        <a class="btn btn-outline-danger m-1" href="{{ route('allRecipes') }}" role="button">Atšaukti</a>

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
