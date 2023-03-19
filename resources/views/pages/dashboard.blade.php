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
                <th scope="col">Pagamentos</th>
                <th scope="col">Acoes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($annuities as $annuity)
                <tr>
                    <td scropt="row">{{ $loop->index + 1 }}</td>
                    <td>{{ $annuity->nome_annu }}</td>
                    <td>{{ $annuity->ano }}</td>
                    <td>{{ $annuity->valor }}</td>
                    <td><form action="/annuities/pay/{{ $annuity->id }},{{ $associd }}" method="POST">
                        @csrf
                        <a href="/annuities/pay/{{ $annuity->id }},{{ $associd }}" 
              class="btn btn-primary" 
              id="event-submit"
              onclick="event.preventDefault();
              this.closest('form').submit();">
              Paga
            </a></form></td>
                </tr>
            @endforeach    
        </tbody>
    </table>
    @else
    <p>Nao ha anuidades disponiveis para este associado, <a href="/associados/create">criar anuidades</a></p>
    @endif
</div>
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Anuidades pagas:</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
<h1>boi</h1>
</div>

@endsection
