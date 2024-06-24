

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit spécifique selon index</title>
    <!-- Vous pouvez ajouter du CSS ou des fichiers JS ici -->
</head>
<body>
    <h1>Liste des Produits</h1>
    <ul>
            <li>{{ $product->name }} </li>
            <li><p> {{ $product -> description }} </p></li>

    </ul>
</body>
</html>
