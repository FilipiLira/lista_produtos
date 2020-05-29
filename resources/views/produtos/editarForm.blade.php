@extends('layout.principal')
@section('conteudo')
<div class="container">
	<div class="card">
		<div class="card-header">
			<p class="display-4">Editar Produto</p>
		</div>
		<div class="card-body">
			<form class="p-2" action="/produtos/editar" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="id" value="{{$produto->id}}">
				<div class="d-flex flex-row">
					<div class="form-group col-12">
						<label for="nome">Nome</label>
						<input type="text" name="produto" value="" class="form-control valor" placeholder="{{$produto->nome}}">
					</div>
				</div>
				<div class="d-flex flex-row">
					<di class="form-group col-12 col-lg-3">
						<label for="preco">Preço</label>
						<input type="numeric" class="form-control valor" value="" name="preco" placeholder="{{$produto->valor}}">
					</di>
					<div class="form-group col-12 col-lg-3">
						<label for="quantidade">Quantidade</label>
						<input type="numeric" class="form-control valor" value="" name="quantidade" placeholder="{{$produto->quantidade}}">
					</div>
				</div>
				<div class="d-flex flex-row">
					<div class="form-group col-12">
						<label for="descricao">Descrição</label>
						<textarea class="form-control" name="descricao">{{$produto->descricao}}</textarea>
					</div>
				</div>
				<div class="d-flex flex-row">
					<div class="btn-group pt-0 p-3">
						<button type="reset" class="btn btn-secondary">Cancelar</button>
						<button id="subform" class="btn btn-primary" type="submit">Confirmar</button>
					</div>
				</div>
				<div id="alert-a" class="alert alert-secondary" style="display: none">
					<p class="alert-text">Nenhum dado alterado.</p>
				</div>
				<div id="alert-b" class="alert alert-success" style="display: none">
					<p class="alert-text">Registro alterado com sucesso.</p>
				</div>
			</form>
		</div>
	</div>
</div>
@stop