@extends('layouts.main')

@section('title', 'Cadastro Associado')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Insira os dados para cadastro:</h1>
  <form action="/associados" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="image">Foto:</label>
      <input type="file" id="image" name="image" class="from-control-file" required>
    </div>
    <div class="form-group">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" id="nome" name="nome" required>
    </div>
    <div class="form-group">
      <label for="email">E-mail:</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
      <label for="cpf">CPF:</label>
      <input type="number" class="form-control" min="10000000000" max="99999999999" id="cpf" name="cpf" placeholder="000.000.000-00" required>
    </div>
    <div class="form-group">
      <label for="data_filiacao">Data de filiacao:</label>
      <input type="number" min="2000" max="2099" class="form-control" id="data_filiacao" name="data_filiacao" required>
    </div>
    <input type="submit" class="btn btn-primary" value="Realizar cadastro">
  </form>
</div>

@endsection