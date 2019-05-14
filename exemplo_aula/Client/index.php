<?php

	include_once('rotinas.php');

	if( !empty($_POST['form_submit']) ) {

		if($_POST['botao'] == "get") {
			// GET
			$get = GET();
			$post = "";
			$put = "";
		}
		else if($_POST['botao'] == "post") {
			// POST
			$post = POST();
			$get = "";
			$put = "";
		}
		else if($_POST['botao'] == "put") {
			// PUT
			$put = PUT();
			$post = "";
			$get = "";
		}
	}	
   	else {
		$get = "";
		$post = "";
		$put = "";
		$delete = "";
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/umidae_icon.ico">

    <title>Framework Slim</title>

    <!-- Bootstrap core CSS -->
    <link href="bs/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="bs/themes/signin.css" rel="stylesheet">

   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript">
		function fMasc(objeto,mascara) {
			obj=objeto
			masc=mascara
			setTimeout("fMascEx()",1)
		}
		function fMascEx() {
			obj.value=masc(obj.value)
		}
		function mCPF(cpf){
			cpf=cpf.replace(/\D/g,"")
			cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
			cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
			cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
			return cpf
		}
	</script>

  </head>

  <body role="document">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">Autenticação de Usuário / Validação CPF</a>
        </div>
	<div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container theme-showcase" role="main">

		<form class="form" method="post" action="index.php">
	    	<input TYPE="hidden" NAME="form_submit" VALUE="OK">

			<div class="page-header">
				<h1 class="form-signin-heading">
					<div id="m_texto">Cliente Web Service (Slim)</div>
				</h1>
			</div>

			<!-- GET -->
			<div class='row'>
				<?php /*<div class='col-sm-3'>
					<button type="submit" name="botao" value="get" class="btn btn-success btn-block">
						<b>GET (Selecionar)</b>
					</button>
					<br>
					<!-- Número de Registros -->
					<label>Total de Registros</label>
					<input type="number" class="form-control" name="numero" value='1' maxlength="1">
					<br>
					<?php
						if($get != "") {
							echo "<h4><b>Lista de Produtos</b></h4>";
							echo "<div class='alert alert-success' role='alert'>";
								$dadoJson = json_decode($get);

								echo "<strong>Retorno do Web Service!</strong>";

								if($dadoJson->msg != null) {
									echo "<br>$dadoJson->msg";
								}
								else {
									foreach ($dadoJson as $dado) {
				   						echo "<br>($dado->id) $dado->nome";
									}
								}

			 				echo "</div>";
						}
					?>
				</div> */?>

				<!-- POST -->
				<div class='col-sm-3'>
					<h1 style="font-weight: bold;font-size: 18px;text-align: center;" >Cadastrar Usuário</h1>
					<br>
					<button type="submit" name="botao" value="post" class="btn btn-success btn-block">
						<b>Confirmar / Cadastrar</b>
					</button>
					<br>
					<!-- Nome -->
					<label>Nome</label>
					<input type="text" class="form-control" name="nome_post" maxlength="40" >
					<br>
					<label>Usuário</label>
					<input type="text" class="form-control" name="usuario_post" maxlength="40" >
					<br>
					<label>Senha</label>
					<input type="password" class="form-control" name="senha_post" maxlength="40" > 
					<br>
					<?php
						if($post != "") {
							echo "<div class='alert alert-success' role='alert'>";
								$dadoJson = json_decode($post);
								$msg = $dadoJson->{'msg'};
			   					echo "$msg";
			 				echo "</div>";
						}
					?>
				</div>

				<!-- GET -->
				<div class='col-sm-3'>
					<h1 style="font-weight: bold;font-size: 18px;text-align: center;" >Autenticar Usuário</h1>
					<br>
					<button type="submit" name="botao" value="get" class="btn btn-primary btn-block">
						<b>Confirmar / Autenticar</b>
					</button>
					<br>
					<!-- ID -->
					<label>Usuário</label>
					<input type="text" class="form-control" name="usuario_get" maxlength="40">
					<br>
					<!-- Nome -->
					<label>Senha</label>
					<input type="password" class="form-control" name="senha_get" maxlength="40">
					<br>
					<?php
						if($get != "") {
							echo "<div class='alert alert-success' role='alert'>";

								$dadoJson = json_decode($get);
								$msg = $dadoJson->{'msg'};
			   					echo "<strong>Retorno do Web Service!</strong><br>$msg";
			 				echo "</div>";
						}
					?>
				</div>

				<!-- PUT -->
				<div class='col-sm-3'>
					<h1 style="font-weight: bold;font-size: 18px;text-align: center;" >Validar CPF</h1>
					<br>
					<button type="submit" name="botao" value="put" class="btn btn-warning btn-block">
						<b>Confirmar / Validar</b>
					</button>
					<br>
					<!-- ID -->
					<label>CPF</label>
					<input type="text" class="form-control" name="cpf_put" minlength="14" maxlength="14" onkeydown="javascript: fMasc( this, mCPF );">
					<br>
					<?php
						if($put != "") {
							echo "<div class='alert alert-success' role='alert'>";
							
								$dadoJson = json_decode($put);
								$msg = $dadoJson->{'msg'};
			   					echo "<strong>Retorno do Web Service!</strong><br>$msg";
			 				echo "</div>";
						}
					?>
				</div>
			</div>
		</form>

		<div class="page-header">
			<b>&copy;2019&nbsp;&nbsp;&raquo;&nbsp;&nbsp; Jonatas Silveira</b>
		</div>
    </div> <!-- /container -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
