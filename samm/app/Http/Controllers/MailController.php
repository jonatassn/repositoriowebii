<?php

namespace App\Http\Controllers;

use Request;
use App\GenioModel;
use App\Mail;
use App\Mail\EnviarEmail;
use App\Socio;

class MailController extends Controller {

    public function cadastrar() {
//        $nome = Request::input('nome');
//        $email = Request::input('email');
//
//        $socio = new Socio();
//        $socio->nome = $nome;
//        $socio->email = $email;
//        $socio->save();
//        $msg = "Usuário $socio->nome cadastrado com sucesso!";
//
//        return view('messagebox')->with('tipo', 'alert alert-success')
//                ->with('titulo', 'Cadastro de Sócio')
//                ->with('msg', $msg)
//                ->with('acao', "/");
    }

    public function listar() {
//        $socios = Socio::all();
//        return view('main')->with('socios', $socios);
    }

    public function enviar() {
//        // Título do E-mail
//        $titulo = "Relatório de Faturamento Mensal";
//
//        // Arquivo Selecionado
//        $arquivo = Request::file('arq_alunos');
//        // Nenhum Arquivo Selecionado
//        if (empty($arquivo)) {
//            $msg = "Selecione o ARQUIVO para Geração do Relatório!";
//
//            return view('messagebox')->with('tipo', 'alert alert-danger')
//                    ->with('titulo', 'ENTRADA DE DADOS INVÁLIDA')
//                    ->with('msg', $msg)
//                    ->with('acao', "/");
//        }
//        // Efetua o Upload do Arquivo
//        $path = $arquivo->store('uploads');
//
//        // Efetua a Leitura do Arquivo
//        $fp = fopen("../storage/app/".$path, "r");
//
//        if ($fp != false) {
//            // Array que receberá os dados do Arquivo
//            $dados = array();
//            $total = 0;
//            $saldo = 0;
//            $despesa = 0;
//            $receita = 0;
//            $saldo_f = 0;
//
//            while(!feof($fp)) {
//
//                $linha = utf8_decode(fgets($fp));
//
//                if(!empty($linha)) {
//                    // Separa os dados
//                    $dados = explode("#", $linha);
//
//                    if($dados[0] == 'S') {
//                        $saldo += $dados[1];
//                    }
//                    else if($dados[0] == 'D') {
//                        $despesa += $dados[1];
//                    }
//                    else if($dados[0] == 'R') {
//                        $receita += $dados[1];
//                    }
//                }
//            }
//
//            $saldo_f = $saldo - $despesa + $receita;
//
//        }
//        $dados = array();
//        foreach(Request::input('cb_enviar') as $check) {
//            $dados = explode('_', $check);
//            $tmp_id = $dados[1];
//            $socio = Socio::find($tmp_id);
//            if(!empty($socio)) {
//                $dados_mail = array();
//                $dados_mail['saldo_inicial'] = 'R$' . number_format($saldo, 2, ',', '.');
//                $dados_mail['receita'] = 'R$' . number_format($receita, 2, ',', '.');
//                $dados_mail['despesa'] = 'R$' . number_format($despesa, 2, ',', '.');
//                $dados_mail['saldo_final'] = 'R$' . number_format($saldo_f, 2, ',', '.');
//                $email = mb_strtolower($socio->email, 'UTF-8');
//                \Mail::to($email)->send( new EnviarEmail("mailImportar", $dados_mail, $titulo) );
//                sleep(2);
//                $total++;
//            }
//        }
//
//        $msg = "O email contendo os dados financeiros foi enviado a ($total) socio(s)!";
//
//        return view('messagebox')->with('tipo', 'alert alert-success')
//                ->with('titulo', 'RELATÓRIO ENVIADO COM SUCESSO')
//                ->with('msg', $msg)
//                ->with('acao', "/");
//
    }

    public function concluir() {
//
//        // Título do E-mail
//        $titulo = Request::input('titulo');
//        // Conteúdo do E-mail
//        $conteudo = Request::input('conteudo');
//
//        // Arquivo Selecionado
//        $arquivo = Request::file('arq_alunos');
//        // Nenhum Arquivo Selecionado
//        if (empty($arquivo)) {
//            $msg = "Selecione o ARQUIVO para Importação dos E-mails!";
//
//            return view('messagebox')->with('tipo', 'alert alert-danger')
//                    ->with('titulo', 'ENTRADA DE DADOS INVÁLIDA')
//                    ->with('msg', $msg)
//                    ->with('acao', "/");
//        }
//        // Efetua o Upload do Arquivo
//        $path = $arquivo->store('uploads');
//
//        // Efetua a Leitura do Arquivo
//        $fp = fopen("../storage/app/".$path, "r");
//
//        if ($fp != false) {
//            // Array que receberá os dados do Arquivo
//            $dados = array();
//            $total = 0;
//
//            while(!feof($fp)) {
//
//                $linha = utf8_decode(fgets($fp));
//
//                // Gera uma Senha Aleatória - 8 dígitos
//                $senha = "";
//                for($a=0; $a<8; $a++) {
//                    $senha = $senha.rand(0, 9);
//                }
//
//                if(!empty($linha)) {
//                    // Separa os dados
//                    $dados = explode("#", $linha);
//                    // Nova instância Genio - Configura dados
//                    $objGenio = new GenioModel();
//                    $objGenio->nome = mb_strtoupper($dados[0], 'UTF-8');
//                    $objGenio->nascimento = self::getDataBD($dados[1]);
//                    $objGenio->save();
//
//                    // Envia e-mail com a senha para os gênios importados do .txt
//                    $dados_mail = array();
//                    $dados_mail['nome'] = mb_strtoupper($dados[0], 'UTF-8');
//                    $dados_mail['senha'] = $senha;
//                    $dados_mail['conteudo'] = $conteudo;
//                    $email = mb_strtolower($dados[2], 'UTF-8');
//                    \Mail::to($email)->send( new EnviarEmail("mailImportar", $dados_mail, $titulo) );
//                    sleep(1);
//                    $total++;
//                }
//            }
//        }
//
//        // Importação Finalizada com Sucesso
//        $msg = "Um total de '$total' gênios(s) foi importado com sucesso!";
//
//        return view('messagebox')->with('tipo', 'alert alert-success')
//                ->with('titulo', 'IMPORTAÇÃO DE DADOS')
//                ->with('msg', $msg)
//                ->with('acao', "/");
    }   

}

/*
    public function concluir() {

        // Título do E-mail
        $titulo = Request::input('titulo');
        // Conteúdo do E-mail
        $conteudo = Request::input('conteudo');

        // Arquivo Selecionado
        $arquivo = Request::file('arq_alunos');
        // Nenhum Arquivo Selecionado
        if (empty($arquivo)) {
            $msg = "Selecione o ARQUIVO para Importação dos E-mails!";

            return view('messagebox')->with('tipo', 'alert alert-danger')
                    ->with('titulo', 'ENTRADA DE DADOS INVÁLIDA')
                    ->with('msg', $msg)
                    ->with('acao', "/");
        }
        // Efetua o Upload do Arquivo
        $path = $arquivo->store('uploads');

        // Efetua a Leitura do Arquivo
        $fp = fopen("../storage/app/".$path, "r");

        if ($fp != false) {
            // Array que receberá os dados do Arquivo
            $dados = array();
            $total = 0;

            while(!feof($fp)) {

                $linha = utf8_decode(fgets($fp));

                // Gera uma Senha Aleatória - 8 dígitos
                $senha = "";
                for($a=0; $a<8; $a++) {
                    $senha = $senha.rand(0, 9);
                }

                if(!empty($linha)) {
                    // Separa os dados
                    $dados = explode("#", $linha);
                    // Nova instância Genio - Configura dados
                    $objGenio = new GenioModel();
                    $objGenio->nome = mb_strtoupper($dados[0], 'UTF-8');
                    $objGenio->nascimento = self::getDataBD($dados[1]);
                    $objGenio->save();

                    // Envia e-mail com a senha para os gênios importados do .txt
                    $dados_mail = array();
                    $dados_mail['nome'] = mb_strtoupper($dados[0], 'UTF-8');
                    $dados_mail['senha'] = $senha;
                    $dados_mail['conteudo'] = $conteudo;
                    $email = mb_strtolower($dados[2], 'UTF-8');
                    \Mail::to($email)->send( new EnviarEmail("mailImportar", $dados_mail, $titulo) );
                    sleep(1);
                    $total++;
                }
            }
        }

        // Importação Finalizada com Sucesso
        $msg = "Um total de '$total' gênios(s) foi importado com sucesso!";

        return view('messagebox')->with('tipo', 'alert alert-success')
                ->with('titulo', 'IMPORTAÇÃO DE DADOS')
                ->with('msg', $msg)
                ->with('acao', "/");
    }

    private static function getDataBD($data) {
        return substr($data, 6, 4)."-".substr($data, 3, 2)."-".substr($data, 0, 2);
    }

    */
