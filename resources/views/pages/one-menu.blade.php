@extends('main')

@section('title', 'Savaitės menu')

@section('content')
{{--    {{$menu->recipes()->orderBy('menu_recipe.week_day', 'asc')->toSql()}}--}}
{{--    {{$menu->week_start}}--}}

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
            @foreach($menu->recipes()->orderBy('menu_recipe.week_day', 'asc')->get() as $recipe)
                <td><a href="{{route('oneRecipe', ['recipe' => $recipe->id])}}" class="text-dark" target="_blank">{{ $recipe->title }}</a></td>
            @endforeach
            </tr>
            </tbody>
        </table>
    </div>

@endsection
