@extends('main')

@section('title', 'Sugeneruotas savaitės meniu')

@section('content')

    <h2 class="mb-3">Savaitės meniu</h2>
    <h5>Patiekalai į savaitės meniu yra sudėti atsitiktine tvarka.</h5>
    <p class="text-muted">Vienas patiekalas yra skirtas tos dienos vakarienei bei kitos dienos pietums. Patiekalo receptą galite pamatyti paspaudę ant jo pavadinimo.</p>
    <button type="button" class="btn btn-outline-success m-1" data-toggle="modal" data-target="#saveMenuModal">Išsaugoti</button>
    <a href="{{ route('generate') }}" class="btn btn-outline-dark m-1">Generuoti naują</a>

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
                @foreach($menu as $recipe)
                    <td><a href="{{route('oneRecipe', ['recipe' => $recipe->id])}}" class="text-dark" target="_blank">{{ $recipe->title }}</a>
                    @if($recipe->needs_side_dish)
                        ir <a href="{{route('oneRecipe', ['recipe' => $sideDishes[$recipe->id]->id])}}" class="text-dark" target="_blank">{{ $sideDishes[$recipe->id]->title }}</a>
                    @endif</td>
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
                            <label for="date">Pasirinkite savaitės pradžios datą (pirmadienį)</label>
                            <input type="date" class="form-control" id="date" name="weekStart" value="{{ old('weekStart') }}">
                            @error('weekStart')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <ul class="list-group list-group-flush col">
                            <li class="list-group-item text-center"><u>Patiekalai</u></li>
                            @foreach($menu as $index => $recipe)
                            <input type="text" name="{{ $index + 1 }}[recipe]" value="{{ $recipe->id }}" hidden>
                            @if($recipe->needs_side_dish)
                            <input type="text" name="{{ $index + 1 }}[side]" value="{{ $sideDishes[$recipe->id]->id }}" hidden>
                            <li class="list-group-item">{{ $recipe->title }} ir {{ $sideDishes[$recipe->id]->title }}</li>
                            @else
                            <li class="list-group-item">{{ $recipe->title }}</li>
                            @endif
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
