<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{route('home')}}">Weekly Menu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="recipesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Receptai
                    </a>
                    <div class="dropdown-menu" aria-labelledby="recipesDropdown">
                        <a class="dropdown-item" href="{{route('newRecipe')}}">Pridėti naują receptą</a>
                        <a class="dropdown-item" href="{{route('allRecipes')}}">Visi receptai</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="menusDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Meniu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="menusDropdown">
                        <a class="dropdown-item" href="{{ route('genType') }}">Naujas savaitės meniu</a>
                        <a class="dropdown-item" href="#">Ankstesni meniu</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
