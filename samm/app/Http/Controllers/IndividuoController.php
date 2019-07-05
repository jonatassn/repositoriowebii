<?php

namespace App\Http\Controllers;

use App\Especimen;
use App\Tag;
use Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndividuoController extends Controller
{
    //

    public function listar() {
        $individuos = Especimen::all();
        $tags = DB::table('tags')->
            whereNotIn("id_hex",
                DB::table('especimens')->select('id_tag')
            )->get();

        return view('individuos')->with('especimens', $individuos)->with("tags", $tags);
    }

    public function salvar($id) {
        if($id == 0) {
            $individuo = new Especimen();
            $individuo->nickname = Request::input("nickname");
            $individuo->age = Request::input("age");
            $individuo->gender = Request::input("gender");
            $individuo->id_tag = Request::input("tag");
            $individuo->biometric_info = Request::input("biometric_info");
            $individuo->id_researcher = Auth::user()->id;

            $individuo->save();
        }

        return redirect()->action('IndividuoController@listar')->withInput();
    }

    public function editar($id) {

    }

    public function remover($id) {

    }

    public function confirmar($id) {

    }
}
