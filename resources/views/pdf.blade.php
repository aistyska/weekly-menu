<!doctype html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title></title>
        <style>
            body {
                font-family: DejaVu Sans, sans-serif;
            }

            h2, h4 {
                text-align: center;
            }

            table, p {
                font-size: 12px;
            }

            .table {
                border-collapse: collapse;
            }

            .table-bordered th,
            .table-bordered td {
                border: 1px solid #000;
            }

            td {
                padding: 5px;
            }

            a {
                text-decoration: none;
            }

            .page-break {
                page-break-after: always;
            }

        </style>
    </head>
    <body>

        <h2>Savaitės meniu</h2>
        <h4><u>{{ $date }}</u></h4>
        <table class="table table-bordered">
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
                    @foreach($recipes as $recipe)
                    <td><a href="#{{ $recipe->id }}">{{ $recipe->title }}</a></td>
                    @endforeach
                </tr>
            </tbody>
        </table>

    @foreach($recipes as $recipe)
        <div class="page-break"></div>
        <h4 id="{{ $recipe->id }}">{{ $recipe->title }}</h4>
    @isset($recipe->comment)
        <p>{{ $recipe->comment }}</p>
    @endisset
        <h5><u>Ingredientai</u></h5>
        <p>{!! nl2br(e($recipe->ingredients)) !!}</p>
        <h5><u>Gaminimo eiga</u></h5>
        <p>{!! nl2br(e($recipe->instructions)) !!}</p>
    @endforeach

    </body>
</html>
