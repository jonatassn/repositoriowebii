<?php

namespace App\Http\Controllers;

use App\Tag;
use Request;

class TagController extends Controller
{
    //

    public function listar() {
        $tags = Tag::all();
        return view('tags')->with("tags", $tags);
    }

    public function salvar($id_tag) {
        if($id_tag == 0) {
            $tag = new Tag();
            $tag->frequency = Request::input('frequency');
            $tag->id_hex = Request::input('id');

            $tag->save();
        }
        else {
            $tag = Tag::find($id_tag);
            if(!empty($tag)){
                $tag->frequency = Request::input('frequency');
                $tag->id_hex = Request::input('id');

                $tag->save();
            }
        }

        return redirect()->action('TagController@listar')->withInput();
    }

    public function editar($id_tag) {
        $tag = Tag::find($id_tag);

        return view('tagEditar')->with("tag", $tag);
    }

    public function confirmar($id) {
        $tag = Tag::find($id);

        $tag->delete();
        return redirect()->action('TagController@listar');
    }

    public function remover($id) {
        $tag = Tag::find($id);

        if(empty($tag))
            return redirect()->action('TagController@listar');
        else
            return view('tagRemover')->with("tag", $tag);
    }
}
