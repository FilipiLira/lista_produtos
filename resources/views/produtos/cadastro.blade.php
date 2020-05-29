@extends('layout.principal')
@section('conteudo')
<div class="container">
	<div class="card">
		<div class="card-header">
			<h2 class="p2">Fromulário</h2>
		</div>
		<div class="card-body">
			<form action="<?php echo action('ProdutoController@cadastrar'); ?>" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-row">
					<div class="col-12">
						<div class="form-group">
							<label>Nomes</label>
							<input class="form-control" type="text" name="produto" placeholder="Nome do produto">
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-6 col-lg-2">
						<div class="form-group">
							<label>Preço</label>
							<input class="form-control" type="number" name="preco" placeholder="Preço">
						</div>
					</div>
					<div class="col-6 col-lg-2">
						<div class="form-group">
							<label>Quantidade</label>
							<input class="form-control" type="number" name="quantidade" placeholder="Quantidade">
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-12">
						<div class="form-group">
							<label>Descrição</label>
							<textarea class="form-control" name="descricao" placeholder="Descrição..."></textarea>
						</div>
					</div>
				</div>
				<div class="form-row justify-content-end">
					<button type="submit" class="btn btn-primary mx-2">Cadastrar</button>
				</div>
			</form>
		</div>
	</div>
</div>
@stop