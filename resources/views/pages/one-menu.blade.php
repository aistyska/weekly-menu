@extends('main')

@section('title', 'Savaitės menu')

@section('content')

    @if (session('success'))
        <div class="alert alert-success mt-1">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="my-3">Savaitės meniu</h2>
    <p class="d-sm-inline-block m-sm-0"><u>{{ $menu->week_start . ' - ' . $date }}</u></p>
    <a href="{{ route('downloadPDF', ['menu' => $menu]) }}" class="btn btn-outline-dark my-1 mb-sm-3 float-sm-right" role="button">Atsisiųsti PDF</a>

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
                    @foreach($menu->getOrderedRecipesByWeekDay() as $recipe)
                    <td><a href="{{route('oneRecipe', ['recipe' => $recipe->id])}}" class="text-dark" target="_blank">{{ $recipe->title }}</a></td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>

@endsection
