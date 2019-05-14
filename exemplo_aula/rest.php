<?php

	require 'Slim/Slim.php';
	require 'Client/ValidadorCpf.php';
	\Slim\Slim::registerAutoloader();

	$app = new \Slim\Slim();

	// CONEXÃO COM O BD
	function getConn() {

		return new PDO('mysql:host=localhost;dbname=aula10', 'root', 'root',
				array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	}

	// TESTAR WEBSERVICE
	$app->get('/', function() {
		echo "<h1>Web Service: GET / POST / PUT / DELETE!</h1>";
	});

	// POST - Cadastrar
	$app->post('/', function() use ($app) {
		$usuario = json_decode( $app->request()->getBody() );
		
		$sql = "INSERT into usuarios(nome, usuario, senha) values(:nome, :usuario, :senha)";
		$conn = getConn();
		$stmt = $conn->prepare($sql);
		$stmt->bindParam("nome", $usuario->nome);
		$stmt->bindParam("usuario", $usuario->usuario);
		$stmt->bindParam("senha", $usuario->senha);
		$stmt->execute();

		echo json_encode( array('msg' => "[OK] Usuário ($usuario->nome) Cadastro com Sucesso!") );
	});

	// GET - Autenticar
	$app->get('/:dados', function($dados) {
		
		$usuario = json_decode($dados);
		$username = $usuario->usuario;
		$password = $usuario->senha;

		$conn = getConn();
		$sql = "SELECT * FROM usuarios where usuario = :usuario and senha = :senha LIMIT 1";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam("usuario", $username);
		$stmt->bindParam("senha", $password);
		$stmt->execute();

		$usuario = $stmt->fetchAll();
		if(empty($usuario))
			echo json_encode(array('msg' => "[ERRO] Usuário ou senha incorretos!"));
		else 
			echo json_encode(array('msg' => "[OK] Usuário ($username) Logado com sucesso!"));
	});

	// PUT - Validar CPF
	$app->put('/', function() use ($app) {

		$dadoJson = json_decode( $app->request()->getBody() );

		if(validaCpf($dadoJson->cpf)) {
			echo json_encode( array('msg' => "[OK] ($dadoJson->cpf) CPF Válido!") );
		}
		else {
			echo json_encode( array('msg' => "[ERRO] ($dadoJson->cpf) CPF Inválido!") );
		}
	});

	$app->run();
?>
