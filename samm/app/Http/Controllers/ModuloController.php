<?php

namespace App\Http\Controllers;

use App\Module;
use Request;

class ModuloController extends Controller
{
    //
    public function listar() {
        $modules = Module::all();

        return view('modulos')->with('modules', $modules);
    }

    public function salvar($id) {
        if($id == 0) {
            $modules = new Module();
            $modules->description = Request::input("description");
            $modules->latitude = Request::input("latitude");
            $modules->longitude = Request::input("longitude");

            $modules->save();
        }
        else {
            $modules = Module::find($id);
            $modules->description = Request::input("description");
            $modules->latitude = Request::input("latitude");
            $modules->longitude = Request::input("longitude");

            $modules->save();
        }

        return redirect()->action('ModuloController@listar')->withInput();
    }

    public function editar($id) {
        $module = Module::find($id);

        return view('moduloEditar')->with('modulo', $module);
    }

    public function remover($id) {
        $module = Module::find($id);

        return view('moduloRemover')->with('modulo', $module);
    }

    public function confirmar($id) {
        $module = Module::find($id);
        $module->delete();

        return redirect()->action('ModuloController@listar')->withInput();
    }
}
