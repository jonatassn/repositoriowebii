<?php

	function getConn() {

		return new PDO('mysql:host=localhost;dbname=aula10', 'root', 'root',
					array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	}

	function GET() {
		// DADO DE ENTRADA VAZIO - ERRO
		if($_POST['usuario_get'] == "" || $_POST['senha_get'] == "" ) {
		 	return json_encode( array('msg' => '[ERRO] Preencha os Campos de Entrada!') );
		}

		// MONTA ARRAY DE DADOS
		$dados = array('usuario' => $_POST['usuario_get'], 'senha' => $_POST['senha_get']);
		// INICIALIZA/CONFIGURA CURL
		$curl = curl_init("http://localhost/exemplo_aula/rest.php/".json_encode($dados));
		// CONFIGURA AS OPÇÕES (parâmetros)
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		// INVOCA A URL DO WEBSERVICE
		$curl_resposta = curl_exec($curl);
		curl_close($curl);
		return $curl_resposta;
	}


	function POST() {

		// DADO DE ENTRADA VAZIO - ERRO
		if($_POST['nome_post'] == "" || $_POST['usuario_post'] == "" || $_POST['senha_post'] == "") {
			return json_encode( array('msg' => '[ERRO] Preencha os Campos de Entrada!') );
		}


		// MONTA ARRAY DE DADOS
		$dados = array('nome' => mb_strtoupper($_POST['nome_post'], 'UTF-8'),'usuario' => $_POST['usuario_post'], 'senha' => $_POST['senha_post']);
		
		// INICIALIZA/CONFIGURA CURL
		$curl = curl_init("http://localhost/exemplo_aula/rest.php");
		// CONFIGURA AS OPÇÕES (parâmetros)
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, 'POST');
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($dados));
		// INVOCA A URL DO WEBSERVICE
		$curl_resposta = curl_exec($curl);
		curl_close($curl);
		
		return $curl_resposta;
	}

	function PUT() {

		// DADO DE ENTRADA VAZIO - ERRO
		if($_POST['cpf_put'] == "" ) {
			return json_encode( array('msg' => '[ERRO] Preencha o Campo de Entrada!') );
		}

		// MONTA ARRAY DE DADOS
		$dados = array('cpf' => $_POST['cpf_put']);
		

		// INICIALIZA/CONFIGURA CURL
		$curl = curl_init("http://localhost/exemplo_aula/rest.php");
		// CONFIGURA AS OPÇÕES (parâmetros)
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($dados));
		// INVOCA A URL DO WEBSERVICE
		
		$curl_resposta = curl_exec($curl);
		curl_close($curl);

		return $curl_resposta;

	}

	function DELETE() {

		// DADO DE ENTRADA VAZIO - ERRO
		if($_POST['id_delete'] == "") {
			return json_encode( array('msg' => '[ERRO] Preencha o Campo de Entrada!') );
		}

		// MONTA ARRAY DE DADOS
		$dados = array('id' => $_POST['id_delete']);

		// INICIALIZA/CONFIGURA CURL
		$curl = curl_init("http://localhost/slim/exemplo_aula/rest.php");
		// CONFIGURA AS OPÇÕES (parâmetros)
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($dados));
		// INVOCA A URL DO WEBSERVICE
		$curl_resposta = curl_exec($curl);
		curl_close($curl);

		return $curl_resposta;
	}



	function mask($val, $mask) {
		$maskared = '';
		$k = 0;
		for($i = 0; $i<=strlen($mask)-1; $i++) {
			if($mask[$i] == '#') {
				if(isset($val[$k]))
				$maskared .= $val[$k++];
			}
			else {
				if(isset($mask[$i]))
				$maskared .= $mask[$i];
			}
		}
		return $maskared;
	}


?>
