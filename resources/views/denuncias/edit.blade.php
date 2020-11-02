<!DOCTYPE html>
<html lang="en">
<head>
  <title>Denuncias de Aglomeração</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Diga Sua Denuncia</h2>
  <form method="POST" action="{{ route('denuncia.update', ['denuncia'=>$denuncia->den_id]) }}">
    @csrf
    @method('Put')
    <div class="row">
      <div class="col-sm-7">
        <div class="form-group">
          <label for="email">Onde Ocorreu</label>
          <input type="text" class="form-control" id="email" placeholder="Localização" name="den_localizacao" value="{{ $denuncia->den_localizacao }}">
          {!! $errors->first('den_localizacao','<span style="color:red" class="help-block">:message</span>') !!}
        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group">
          <label for="email">Observação</label>
          <input type="text" class="form-control" id="email" placeholder="Observação" name="den_observacao" value="{{ $denuncia->den_observacao }}">
          {!! $errors->first('den_observacao','<span style="color:red" class="help-block">:message</span>') !!}
      </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label for="pwd">Estimativa de Pessoas:</label>
          <input type="number" class="form-control" name="den_quantidade_pessoas" id="" value="{{ $denuncia->den_quantidade_pessoas }}">
          {!! $errors->first('den_quantidade_pessoas','<span style="color:red" class="help-block">:message</span>') !!}
        </div>
      </div>
    </div>

    <button type="submit" class="btn btn-success">Submit</button>
  </form>
</div>

</body>
</html>
