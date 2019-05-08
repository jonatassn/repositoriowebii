<?php

	require 'Slim/Slim.php';
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







	// GET - Selecionar
	$app->get('/:dados', function($dados) {

		print_r($dados);
		$usuario = json_decode( $dados );


		$conn = getConn();
		$sql = "SELECT * FROM usuarios where usuario = :usuario and senha = :senha LIMIT 1";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam("usuario", $usuario->usuario);
		$stmt->bindParam("senha", $usuario->senha);
		$stmt->execute();

		$usuario = $stmt->fetchAll();
		if(empty($usuario))
			echo json_encode(array('msg' => "[ERRO] Usuário ou senha incorretos!"));
		else
			echo json_encode(array('msg' => "[OK] Logado com sucesso!", 'nome' => $usuario->nome );
	});

	// POST - Inserir
	$app->post('/', function() use ($app) {

		$dadoJson = json_decode( $app->request()->getBody() );

		$sql = "INSERT INTO tb_produto (nome) values(:nome)";
		$conn = getConn();
		$stmt = $conn->prepare($sql);
		$stmt->bindParam("nome", $dadoJson->nome);
		$stmt->execute();
		$id = $conn->lastInsertId();

		echo json_encode( array('msg' => "[OK] Produto ($id) Cadastro com Sucesso!") );
	});

	// PUT - Alterar
	$app->put('/', function() use ($app) {

		$dadoJson = json_decode( $app->request()->getBody() );

		$sql = "UPDATE tb_produto SET nome=:nome WHERE id=:id";
		$conn = getConn();
		$stmt = $conn->prepare($sql);
		$stmt->bindParam("nome", $dadoJson->nome);
		$stmt->bindParam("id", $dadoJson->id);

		if($stmt->execute()) {
			echo json_encode( array('msg' => "[OK] Produto ($dadoJson->id) Alterado com Sucesso!") );
		}
		else {
			echo json_encode( array('msg' => "[ERRO] Não foi possível Alterar o Produto ($dadoJson->id)!") );
		}
	});

	// DELETE - Remover
	$app->delete('/', function() use ($app) {

		$dadoJson = json_decode( $app->request()->getBody() );

		$sql = "DELETE FROM tb_produto WHERE id=:id";
		$conn = getConn();
		$stmt = $conn->prepare($sql);
		$stmt->bindParam("id", $dadoJson->id);

		if($stmt->execute()) {
			echo json_encode( array('msg' => "[OK] Produto ($dadoJson->id) Removido com Sucesso!") );
		}
		else {
			echo json_encode( array('msg' => "[ERRO] Não foi possível Remover o Produto ($dadoJson->id)!") );
		}
	});

	$app->run();
?>
