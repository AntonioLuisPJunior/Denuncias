<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Denuncias de Aglomeração</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div id="app">
    <div class="container">
      <a href="{{ route('denuncia.index') }}">Ver Todas Denuncias</a><br>
      <a href="{{ route('denuncia.create') }}">Criar nova Denuncia</a>
      <div class="card card-primary">
        <div class="card-body table-responsive no-padding">
            <table class="table table-hover">
                <thead>
                  <th style="width: 400">Id*</th>
                  <th scope="col">Quantidade de pessoas*</th>
                  <th scope="col">Localização</th>
                  <th scope="col">Observações</th>
                  <th scope="col">Ações</th>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$denuncia->den_id}}</td>
                    <td>Estima-se {{$denuncia->den_quantidade_pessoas}} pessoas</td>
                    <td>{{$denuncia->den_localizacao}}</td>
                    <td>{{$denuncia->den_observacao}}</td>
                    <td>
                      <a class="btn btn-warning" href="{{ route('denuncia.edit',['denuncia'=>$denuncia->den_id]) }}">Editar</a>
                      <form method="POST" action="{{ route('denuncia.delete',['denuncia'=>$denuncia->den_id]) }}">
                        @csrf 
                        @method('Delete')
                        <input type="submit" class="btn btn-danger" value="Apagar">
                      </form>
                      </td>
                  </tr>
                </tbody>
            </table>
        </div>
      </div>

    </div>
  </div>
</body>
</html>