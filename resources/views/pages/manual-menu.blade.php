@extends('main')

@section('title', 'Patiekaų pasirinkimas')

@section('content')

    <h2>Savaitės meniu</h2>
    <h5>Vienas patiekalas yra skirtas vienos dienos vakarienei bei kitos dienos pietums.</h5>
    <p>Pasirinkite patinkančius patiekalus ir pats susikurkite savo savaitės meniu.</p>


    <form method="post" action="/save-menu">
        @csrf
        <button type="submit" class="btn btn-outline-success">Išsaugoti</button>
        <div class="form-group">
            <label for="date">Pasirinkite savaitės menu pradžios datą (pirmadienį)</label>
            <input type="date" class="form-control" id="date" name="weekStart" value="{{ old('weekStart') }}">
        </div>
        @error('weekStart')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="table-responsive">
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
                                <option value="{{ $recipe->id }}" @if(old($day) == $recipe->id) selected @endif>{{ $recipe->title }}</option>
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
