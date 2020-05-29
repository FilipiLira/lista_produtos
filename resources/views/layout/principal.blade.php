<!DOCTYPE html>
<html>
<head>
	<title>Estoque</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<link rel="stylesheet" type="text/css" href="/css/custon.css">
	<script type="text/javascript" src="/js/app.js"></script>
	<script type="text/javascript" src="/js/jquery.js"></script>
	@yield('metatags')
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="/produtos">Estoque Laravel</a>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="/produtos/listagem">Listagem</a></li>
				</ul>
			</div>
		</nav>
	</div>
	<div class="container">
		@yield('conteudo')
	</div>

	<footer class="footer container">
		<p>© Desenvolvido por L. F.</p>
	</footer>
	<script type="text/javascript" src="/js/validarFormulario.js"></script>
</body>
</html>