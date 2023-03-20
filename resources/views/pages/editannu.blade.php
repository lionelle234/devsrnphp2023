@extends('layouts.main')

@section('title', 'Editar Anuidade')



@section('content')


<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Insira os dados para alterar:</h1>
  <form action="/anuidades/update/{{ $annuity->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="nome_annu">Nome:</label>
      <input type="text" class="form-control" id="nome_annu" name="nome_annu" value="{{ $annuity->nome_annu }}"required>
    </div>
    <div class="form-group">
      <label for="ano">Ano:</label>
      <input type="number" min="2000" max="2023" class="form-control" id="ano" name="ano" value="{{ $annuity->ano }}" required>
    </div>
    <div class="form-group">
      <label for="valor">Valor:</label>
      <input type="number" min="200" max="5000" class="form-control" id="valor" name="valor" value="{{ $annuity->valor }}" required>
    </div>
    <input type="submit" class="btn btn-primary" value="Atualizar cadastro">
  </form>
</div>

@endsection