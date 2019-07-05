<?php

namespace App\Http\Controllers;

use App\Entry;
use Request;

class RegistroController extends Controller
{
    //
    public function listar() {
        $registros = Entry::all();

        return view('registros')->with("registros", $registros);
    }

    public function carregarArquivo() {

        // Arquivo Selecionado
        $arquivo = Request::file('arq_alunos');
        // Nenhum Arquivo Selecionado
        if (empty($arquivo)) {
            $msg = "Selecione o ARQUIVO para Importação dos Registros!";

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

            while (!feof($fp)) {
                $linha = utf8_decode(fgets($fp));
                if (!empty($linha)) {
                    // Separa os dados
                    $dados = explode(",", $linha);
                    $entry = new Entry();
                    $entry->date_time_entry = $dados[2].' '. $dados[3];
                    $entry->id_module = $dados[0];
                    $entry->id_tag = $dados[1];

                    $entry->save();
                }
            }

        }
        return $this->listar();
    }

}
