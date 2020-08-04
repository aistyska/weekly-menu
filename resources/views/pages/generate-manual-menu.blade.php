@extends('main')

@section('title', 'Sugeneruotas meniu ir jo koregavimas')

@section('content')

    <h2 class="mb-3">Savaitės meniu</h2>
    <h5>Patiekalai į savaitės meniu yra sudėti atsitiktine tvarka. Jūs galite keisti patiekalus bei jų išdėstymo tvarką.</h5>
    <p class="text-muted">Vienas patiekalas yra skirtas tos dienos vakarienei bei kitos dienos pietums.</p>

    <form method="post" action="/save-menu">
        @csrf
        <button type="submit" class="btn btn-outline-success my-1 d-block">Išsaugoti</button>
        <div class="form-group d-inline-block">
            <label for="date">Pasirinkite savaitės pradžios datą (pirmadienį)</label>
            <input type="date" class="form-control" id="date" name="weekStart" value="{{ old('weekStart') }}">
        </div>
        @error('weekStart')
        <div class="alert alert-danger d-inline-block">{{ $message }}</div>
        @enderror

        <div class="table-responsive mt-3">
            <table class="table table-hover">
                <thead>
                    <tr>
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
                    <tr>
                        @for($day = 1; $day < 8; $day++)
                            <td class="form-group">
                                <select class="custom-select" name="{{ $day }}">
                                    @foreach($recipes as $recipe)
                                        <option value="{{ $recipe->id }}" @if(old($day) == $recipe->id || (old($day) == null && $randomRecIds[$day - 1]->id == $recipe->id)) selected @endif>{{ $recipe->title }}</option>
                                    @endforeach
                                </select>
                            </td>
                        @endfor
                    </tr>
                </tbody>
            </table>
        </div>
    </form>

@endsection
