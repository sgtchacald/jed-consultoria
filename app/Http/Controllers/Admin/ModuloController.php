<?php

namespace App\Http\Controllers\Admin;

use App\Models\Modulos;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Utils\UtilsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Config;


class ModuloController extends Controller{
    public function __construct(){
        $this->modulo = new Modulos();
    }

    public function index(){
        $modulos =   $this->modulo->getModulos('A');
        return view('admin.modulo.selecionar')->with(compact('modulos'));
    }


    public function show(){
    }

    public function create(){
       return view('admin.modulo.cadastrar');
    }

    public function store(Request $request){
        $this->validaCampos($request, 'i');

        $insert = Modulos::create([
            'nome'        => $request->input('nome'),
            'indstatus'   => $request->input('indStatus'),
            'usucriou'            => Auth::user()->getAuthIdentifier(),
            'dtcadastro'          => date('Y-m-d H:i:s')
        ]);

        if($insert){
            $request->session()->flash('alert-success', Config::get('msg.cadastro_sucesso'));
            return redirect()->route('modulo.selecionar');
        }else{
            $idModulo =  $this->modulo->getModulos('A');
            $request->session()->flash('alert-danger', Config::get('msg.cadastro_erro'));
            return view('admin.modulo.selecionar')->with(compact('id'));
        }
    }

    public function edit($id){
        $modulo = $this->modulo->getModuloById($id);
        return view('admin.modulo.editar')->with(compact('modulo'));
    }

    public function update(Request $request){
        $this->validaCampos($request, 'u');

        $update = Modulos::where(['id' => $request->input('id')])->update([
            'nome'      => $request->input('nome'),
            'indstatus' => $request->input('indStatus'),
            'usueditou'    => Auth::user()->getAuthIdentifier(),
            'dtedicao'     => date('Y-m-d H:i:s')
        ]);

        if($update){
            $request->session()->flash('alert-success', Config::get('msg.edicao_sucesso'));
        }else{
            $request->session()->flash('alert-danger', Config::get('msg.edicao_erro'));
        }

        return redirect()->route('modulo.selecionar');
    }

    public function destroy(Request $request, $id){

        $delete = Modulos::where(['id' => $id])->update([
            'indstatus'=>'I',
            'usuexcluiu' => Auth::user()->getAuthIdentifier(),
            'dtexclusao'=> date('Y-m-d H:i:s')
        ]);

        if($delete){
            $request->session()->flash('alert-success', Config::get('msg.exclusao_sucesso'));
        }else{
            $request->session()->flash('alert-danger', Config::get('msg.exclusao_erro'));
        }

        return redirect()->route('modulo.selecionar');
    }

    public function validaCampos(Request $request, $tipoPersistencia){

            $rules = [
                'nome'       => 'required',
                'indStatus'  => 'sometimes|required',
            ];

            $messages = ['required' => ':attribute é obrigatório.'];

            $customAttributes = [
                'nome' => Config::get('label.nome'),
                'indStatus' => Config::get('label.status'),
            ];

            $request->validate($rules, $messages, $customAttributes);
    }

    public function getModulosOrderBy(){
        return $this->modulo->getModulosOrderBy('nome', 'asc', 'A')->toJson();
    }

    public function getModuloById($id){
        return $this->modulo->getModuloById($id);
    }
}
