@extends('layout.principal')
@section('conteudo')

<div class="container mt-3">
   <div class="row justify-content-center">
     <div class="card bg-dark">
       <div class="card-header">
         <h1 class="text-light">Produto: {{$produto->nome}}</h1>
      </div>
      <div class="card-body">
        <p class="p-2 text-light">Preço: {{$produto->valor}}</p>
        <p class="p-2 text-light">Quantidade: {{$produto->quantidade}}</p>
        <p class="p-2 text-light">Descrição: {{$produto->descricao}}</p>
        <p class="p-2 text-light">Id: {{$produto->id}}</p>
     </div>
     <div class="card-footer">
       <div class="btn-group">
         <button class="btn btn-secondary">
            <a href="/produtos">Voltar</a>
         </button>
         <button class="btn btn-info">
            <a class="text-dark" href="/produtos/editar/{{$produto->id}}">Editar</a>
         </button>
      </div>
   </div>
</div>
</div>
</div>

@stop