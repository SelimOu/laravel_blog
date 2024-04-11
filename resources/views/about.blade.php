<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @include ('layouts.header')
    <section>
        <h1>
            about

            @if(count($table)>0)

            @foreach($table as $tables)
                {{$tables}}
            @endforeach
            @else 

            pas de tables
            @endif

        </h1>
    </section>
</body>
</html>