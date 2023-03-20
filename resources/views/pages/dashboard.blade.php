@extends('layouts.main')

@section('title', 'Anuidades do associado')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Anuidades disponiveis:</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($annuities) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Ano</th>
                <th scope="col">Valor</th>
                <th scope="col">Mudar status</th>
                <th scope="col">Remover</th>
                <th scope="col">Alterar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($annuities as $annuity)
            
                <tr>
                    <td scropt="row">{{ $loop->index + 1 }}</td>
                    <td>{{ $annuity->nome_annu }}</td>
                    <td>{{ $annuity->ano }}</td>
                    <td>{{ $annuity->valor }}</td>
            @if($annuity->associates()->get()->contains($associd))
            <td><form action="/anuidades/unpay/{{ $annuity->id }},{{ $associd }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <a href="/anuidades/unpay/{{ $annuity->id }},{{ $associd }}"
              class="btn btn-primary" 
              id="event-submit"
              onclick="event.preventDefault();
              this.closest('form').submit();">
              Paga
            </a></form></td>
                    
            @else
            <td><form action="/anuidades/pay/{{ $annuity->id }},{{ $associd }}" method="POST">
                        @csrf
                        <a href="/anuidades/pay/{{ $annuity->id }},{{ $associd }}" 
              class="btn btn-danger" 
              id="event-submit"
              onclick="event.preventDefault();
              this.closest('form').submit();">
              Em aberto
            </a></form></td>
            @endif
                <td><form action="/anuidades/{{ $annuity->id }},{{ $associd }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <a href="/anuidades/{{ $annuity->id }},{{ $associd }}"
              class="btn btn-warning" 
              id="event-submit"
              onclick="event.preventDefault();
              this.closest('form').submit();">
              Deletar
            </a></form></td>
            <td><form action="/anuidades/edit/{{ $annuity->id }}" method="GET">
                        @csrf
                        @method("GET")
                        <a href="/anuidades/edit/{{ $annuity->id }}"
              class="btn btn-info" 
              id="event-submit"
              onclick="event.preventDefault();
              this.closest('form').submit();">
              Editar
            </a></form></td>
                </tr>
            @endforeach    
        </tbody>
    </table>
    @else
    <p>Nao ha anuidades disponiveis para este associado, <a href="/anuidades/create">criar anuidades</a></p>
    @endif
    <table class="table">
    <thead>
            <tr>
                <th scope="col">Valor total devido</th>
            </tr>
        </thead>
    <tbody>
    <tr>
        <td>{{ $owned }}</td>
    </tr>
    </tbody>
</table>
</div>

@endsection
