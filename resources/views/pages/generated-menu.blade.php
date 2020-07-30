@extends('main')

@section('title', 'Sugeneruotas savaitės meniu')

@section('content')

    <h2>Savaitės meniu</h2>
    <h5>Vienas patiekalas yra skirtas vienos dienos vakarienei bei kitos dienos pietums.</h5>
    <p class="text-muted">Patiekalai į savaitės meniu yra sudėti atsitiktine tvarka. Patiekalo receptą galite pamatyti paspaudę ant jo pavadinimo.</p>
    <p>Nepatinka šis meniu? <a href="{{ route('generate') }}" class="btn btn-outline-dark btn-sm">Generuoti naują</a></p>

    <p>Patinka meniu?</p>
    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#saveMenuModal">Išsaugoti</button>

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
            @foreach($menu as $recipe)
                    <td><a href="{{route('oneRecipe', ['recipe' => $recipe->id])}}" class="text-dark" target="_blank">{{ $recipe->title }}</a></td>
            @endforeach
                </tr>
            </tbody>
        </table>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="saveMenuModal" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <form method="post" action="/save-menu">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Išsaugoti meniu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body row">
                        <div class="form-group col">
                            <label for="date">Pasirinkite savaitės menu pradžios datą (pirmadienį)</label>
                            <input type="date" class="form-control" id="date" name="weekStart" value="{{ old('weekStart') }}">
                            @error('weekStart')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <ul class="list-group list-group-flush col">
                            <li class="list-group-item text-center">Patiekalai</li>
                            @foreach($menu as $index => $recipe)
                            <input type="text" name="{{ $index + 1 }}" value="{{ $recipe->id }}" hidden>
                            <li class="list-group-item">{{ $recipe->title }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success">Išsaugoti</button>
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Atšaukti</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@if($errors->any())

    @section('scripts')
        @parent

        <script>
            $('#saveMenuModal').modal('show')
        </script>

    @endsection
@endif
