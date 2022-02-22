<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relátorio Produtos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <h1>Listas de Produtos </h1>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>     
      <th scope="col">Produtos</th>     
    </tr>
  </thead>
  <tbody>
      @foreach($tags as $tag)
    <tr>
      <th scope="row">{{ $tag->id }}</th>
      <td>{{ $tag->name }}</td>
      <td>@foreach($tag->productsAsTag as $product) {{ $product->name.';' }} @endforeach</td>
    
    </tr>
   @endforeach
  </tbody>
  <tfoot>
      <tr>
        <td colspan="5">
            <h6>Quantidade de produtos: {{ count($tags) }}</h6>
        </td>
      </tr>
  </tfoot>
</table>
</body>
</html>