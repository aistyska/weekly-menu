@extends('main')

@section('title', 'Buvusių meniu pasirinkimas')

@section('content')

    <h2 class="mb-3">Praėjusių savaičių meniu</h2>
    <h5>Pasirinkite vieną labiausiai patinkantį meniu.</h5>
    <p class="text-muted">Vienas patiekalas yra skirtas tos dienos vakarienei bei kitos dienos pietums. Patiekalo receptą galite pamatyti paspaudę ant jo pavadinimo.</p>

    <form method="post" action="/save-menu-as-new">
        @csrf
        <button type="submit" class="btn btn-outline-success my-1 d-block">Išsaugoti</button>
        <div class="form-group d-inline-block">
            <label for="date">Pasirinkite savaitės pradžios datą (pirmadienį)</label>
            <input type="date" class="form-control" id="date" name="weekStart" value="{{ old('weekStart') }}">
        </div>
        @error('weekStart')
        <div class="alert alert-danger d-inline-block">{{ $message }}</div>
        @enderror
        @error('selectedMenu')
        <div class="alert alert-danger d-inline-block">{{ $message }}</div>
        @enderror

        <div class="table-responsive mt-3">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Pasirinkti</th>
                        <th scope="col">Pirmadienis</th>
                        <th scope="col">Antradienis</th>
                        <th scope="col">Trečiadienis</th>
                        <th scope="col">Ketvirtadienis</th>
                        <th scope="col">Penktadienis</th>
                        <th scope="col">Šeštadienis</th>
                        <th scope="col">Sekmadienis</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($menus as $menu)
                    <tr>
                        <td class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="menu{{ $menu->id }}" name="selectedMenu" value="{{ $menu->id }}" class="custom-control-input position-static" @if(old('selectedMenu') == $menu->id) checked @endif>
                                <label class="custom-control-label" for="menu{{ $menu->id }}"></label>
                            </div>
                        </td>
                        @foreach($menu->getOrderedRecipesByWeekDay() as $recipe)
                        <td class="form-group">
                            <a href="{{route('oneRecipe', ['recipe' => $recipe->id])}}" class="text-dark" target="_blank">{{ $recipe->title }}</a>
                        </td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <button type="button" id="toTopBtn" class="btn btn-outline-dark">Į viršų</button>
    </form>


@endsection
