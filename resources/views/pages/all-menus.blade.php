@extends('main')

@section('title', 'Visi meniu')

@section('content')

    <h2 class="mb-3">Praėjusių savaičių meniu</h2>

    <div class="table-responsive mt-3">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Savaitė</th>
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
                    <td><a href="{{ route('oneMenu', ['menu' => $menu]) }}" class="text-dark" target="_blank">{{ $menu->week_start . ' - ' . $menu->getWeekEnd() }}</a></td>
                    @foreach($menu->getOrderedRecipesByWeekDay() as $recipe)
                        <td><a href="{{route('oneRecipe', ['recipe' => $recipe->id])}}" class="text-dark" target="_blank">{{ $recipe->title }}</a></td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <button type="button" id="toTopBtn" class="btn btn-outline-dark">Į viršų</button>

@endsection
