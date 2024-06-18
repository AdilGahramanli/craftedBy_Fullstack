

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Shops</title>
    <!-- Vous pouvez ajouter du CSS ou des fichiers JS ici -->
</head>
<body>

    <h1>Liste des shops</h1>
    <ul>
        @foreach ($shops as $shop)
            <li><h3>{{ $shop->name }}</h3></li>
            <li><p>{{$shop->description}}</p></li>
        @endforeach
    </ul>
</body>
</html>
