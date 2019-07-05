<?php

namespace App\Http\Controllers;

use App\Mail\EnviarEmail;
use App\Researcher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Request;
use Illuminate\Support\Facades\DB;

class RelatorioController extends Controller
{
    //

    public function listar() {
        $entries = DB::table('registro_completo')->get();

        return view('relatorios')->with('entries', $entries);
    }

    public function enviarEmail() {
        $title = 'relatorio_registros_' . Date::now()->toDateTimeString() . '.pdf';
        $entries = DB::table('registro_completo')->get();

        $pdf = \PDF::loadView('relatorioPDF', compact('entries'))
            ->setPaper('A4', 'portrait')
            ->stream($title);

        $user = DB::table('researchers')->select('first_name')->where('id_user',Auth::user()->id);

        $email = mb_strtolower(Request::input("email"), 'UTF-8');
        \Mail::to($email)->send( new EnviarEmail("mailRelatorio", $user, 'Relatorio de Registros', $pdf) );
        sleep(2);

        return redirect()->action('RelatorioController@listar')->withInput();
    }

    public function gerarRelatorio() {
        $entries = DB::table('registro_completo')->get();
        $title = 'relatorio_registros_' . Date::now()->toDateTimeString() . '.pdf';

        return \PDF::loadView('relatorioPDF', compact('entries'))
                            ->setPaper('A4', 'portrait')
                            ->stream($title);
    }
}
