<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gotham City Web</title>
    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script type="text/javascript" src="assets/js/functions.js"></script>
  <script type="text/javascript" src="assets/js/actions.js"></script>
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
    <!-- Custom styles for this template -->
  <link href="assets/css/cover.css" rel="stylesheet">
</head>
<body class="text-center">
	<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
		<header class="masthead mb-auto">
			<div class="inner">
  				<h3 class="masthead-brand">Gotham System</h3>
  				<nav class="nav nav-masthead justify-content-center">
    				<a class="nav-link topMenu" id="home" href="#">Cadastro</a>
    				<a class="nav-link topMenu" id="listar" href="#">Listar</a>
            <a class="nav-link topMenu" id="deslogar" href="#">Deslogar</a>
  				</nav>
			</div>
		</header>
		<main role="main" class="inner cover">
			<div class="login-form">
				<h4 class="cover-heading" id="msg"></h4>
				<form class="mx-auto" style="width: 50%;">
	  				<div class="form-group">
	    				<label for="usuario">Usuario</label>
	    				<input type="text" class="form-control" id="usuario" autocomplete="off" required>
	  				</div>
	  				<div class="form-group">
	    				<label for="senha">Senha</label>
	    				<input type="password" class="form-control" id="senha" required>
	  				</div>
	  				<button type="submit" id="loginUsuario" class="btn btn-primary">Login</button>
				</form>
			</div>

      <div class="cep-form">
        <h1 class="cover-heading">Cadastra CEP.</h1>
        <h4 class="cover-heading" id="msgCep"></h4>
        <form class="mx-auto" style="width: 50%;">
            <div class="form-group">
              <label for="cidade">Cidade</label>
              <input type="text" class="form-control" id="cidade" autocomplete="off" required>
            </div>
            <div class="form-group">
              <label for="cep">CEP</label>
              <input type="number" class="form-control" id="cep" autocomplete="off" min="100000" max="999999" required>
            </div>
            <button type="submit" id="cadastra" class="btn btn-primary">Cadastrar</button>
        </form>
      </div>

      <div class="lista-cep"></div>

		</main>

		<footer class="mastfoot mt-auto">
			<div class="inner">
				<p>Developed by <a href="#">@oFabio</a>.</p>
			</div>
		</footer>
	</div>
  
</body>
</html>
