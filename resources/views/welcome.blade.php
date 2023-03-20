@extends('layouts.main')

@section('title', 'Lista Associados')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Procurar Associados</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{ $search }}</h2>
    @else
    <h2>Associados:</h2>
    @endif
    <div id="cards-container" class="row">
        @foreach($associates as $associate)
        <div class="card col-md-3">
            <img src="/img/associados/{{ $associate->image }}" alt="{{ $associate->nome }}"/>
            <div class="card-body">
                <h5 class="card-title">{{ $associate->nome }}</h5>
                <p class="card-date">Filiado em: {{ $associate->data_filiacao }}</p>      
                <a href="/associados/view/{{ $associate->id }}" class="btn btn-info">Ver anuidades</a>
            </div>
        </div>
        @endforeach
        @if(count($associates) == 0 && $search)
            <p>Não foi possível encontrar nenhum associado com o nome {{ $search }}! <a href="/">Ver todos</a></p>
        @elseif(count($associates) == 0)
            <p>Não há associados cadastrados</p>
        @endif
    </div>
</div>


@endsection