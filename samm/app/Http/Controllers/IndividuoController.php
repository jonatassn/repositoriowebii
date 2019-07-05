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
        else {
            $individuo = Especimen::find($id);
            $individuo->nickname = Request::input("nickname");
            $individuo->age = Request::input("age");
            $individuo->gender = Request::input("gender");
            $individuo->id_tag = Request::input("tag");
            $individuo->biometric_info = Request::input("biometric_info");

            $individuo->save();
        }

        return redirect()->action('IndividuoController@listar')->withInput();
    }

    public function editar($id) {
        $individuos = Especimen::find($id);
        $tags = DB::table('tags')->
        whereNotIn("id_hex",
            DB::table('especimens')->select('id_tag')
        )->get();

        return view('individuoEditar')->with('individuo', $individuos)->with("tags", $tags);
    }

    public function remover($id) {
        $individuo = Especimen::find($id);

        return view('individuoRemover')->with("individuo", $individuo);
    }

    public function confirmar($id) {
        $individuo = Especimen::find($id);
        $individuo->delete();

        return redirect()->action('IndividuoController@listar');
    }
}
