<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relátorio Produtos</title>
</head>
<body>
    <h1>Listas de Produtos </h1>

    @foreach($products as $product)
        <h2>{{ $product->name }}</h2>
    @endforeach
    
</body>
</html>