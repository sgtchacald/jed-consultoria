<?php

namespace App\Http\Controllers\Admin;

use App\Models\ParametrosGlobais;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Utils\UtilsController;
use App\Http\Controllers\Admin\ModuloController;
use App\Models\Modulos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Config;

//Rules personalizadas
use App\Rules\ValidaParametroGlobalUnico;



class ParametroGlobalController extends Controller{
    public function __construct(){
        $this->parametroGlobal = new ParametrosGlobais();
        $this->modulo = new Modulos();
    }

    public function index(){
        $modulos = $this->modulo->getModulos('A');
        $parametrosGlobais =   $this->parametroGlobal->getParametrosGlobais('A');
        return view('admin.parametroGlobal.selecionar')->with(compact('parametrosGlobais', 'modulos'));
    }

    public function show(){
    }

    public function create(){
        $modulos = $this->modulo->getModulos('A');
        return view('admin.parametroGlobal.cadastrar')->with(compact('modulos'));
    }

    public function store(Request $request){
        //atribui os dados ao campo valor se houver
        if($request->input('valorTexto') != ""){
            $request->merge([
                'valor' => $request->input('valorTexto'),
            ]);
        }

        if($request->input('valorNumero') != ""){
            $request->merge([
                'valor' => $request->input('valorNumero'),
            ]);
        }

        $this->validaCampos($request, 'i');

        $insert = ParametrosGlobais::create([
            'unidade'      => $request->input('unidade'),
            'codigo'       => $request->input('codigo'),
            'nome'         => $request->input('nome'),
            'descricao'    => $request->input('descricao'),
            'valor'        => $request->input('valor'),
            'modulopai_id' => $request->input('modulopai_id'),
            'modulo_id'    => $request->input('modulo_id'),
            'indstatus'    => $request->input('indStatus'),
            'usucriou'     => Auth::user()->getAuthIdentifier(),
            'dtcadastro'   => date('Y-m-d H:i:s')
        ]);

        if($insert){
            $request->session()->flash('alert-success', Config::get('msg.cadastro_sucesso'));
            return redirect()->route('parametro.selecionar');
        }else{
            $idParametro =  $this->parametroGlobal->getParametrosGlobais('A');
            $request->session()->flash('alert-danger', Config::get('msg.cadastro_erro'));
            return view('admin.parametroGlobal.selecionar')->with(compact('id'));
        }
    }

    public function edit($id){
        $modulos = $this->modulo->getModulos('A');
        $parametroGlobal = $this->parametroGlobal->getParametroGlobalById($id);
        return view('admin.parametroGlobal.editar')->with(compact('parametroGlobal','modulos'));
    }

    public function update(Request $request){
        //atribui os dados ao campo valor se houver
        if($request->input('valorTexto') != ""){
            $request->merge([
                'valor' => $request->input('valorTexto'),
            ]);
        }

        if($request->input('valorNumero') != ""){
            $request->merge([
                'valor' => $request->input('valorNumero'),
            ]);
        }

        $this->validaCampos($request, 'u');

        $update = ParametrosGlobais::where(['id' => $request->input('id')])->update([
            'unidade'      => $request->input('unidade'),
            'codigo'       => $request->input('codigo'),
            'nome'         => $request->input('nome'),
            'descricao'    => $request->input('descricao'),
            'valor'        => $request->input('valor'),
            'modulopai_id' => $request->input('modulopai_id'),
            'modulo_id'    => $request->input('modulo_id'),
            'indstatus'    => $request->input('indStatus'),
            'usueditou'    => Auth::user()->getAuthIdentifier(),
            'dtedicao'     => date('Y-m-d H:i:s')
        ]);

        if($update){
            $request->session()->flash('alert-success', Config::get('msg.edicao_sucesso'));
        }else{
            $request->session()->flash('alert-danger', Config::get('msg.edicao_erro'));
        }

        return redirect()->route('parametro.selecionar');
    }

    public function destroy(Request $request, $id){

        $delete = ParametrosGlobais::where(['id' => $id])->delete();

        if($delete){
            $request->session()->flash('alert-success', Config::get('msg.exclusao_sucesso'));
        }else{
            $request->session()->flash('alert-danger', Config::get('msg.exclusao_erro'));
        }

        return redirect()->route('parametro.selecionar');
    }

    public function validaCampos(Request $request, $tipoPersistencia){

            $rules = [
                'unidade'      => 'required',
                'codigo'       =>  $tipoPersistencia == 'i' ? ['required', new ValidaParametroGlobalUnico()] : '',
                'nome'         => 'required',
                'descricao'    => 'required',
                'modulopai_id' => 'required',
                'valor'        => 'required',
                'indStatus'    => 'sometimes|required',
            ];

            $messages = ['required' => ':attribute é obrigatório.'];

            $customAttributes = [
                'unidade' => Config::get('label.unidade'),
                'codigo' => Config::get('label.codigo'),
                'nome' => Config::get('label.nome'),
                'descricao' => Config::get('label.descricao'),
                'valor' => Config::get('label.valor'),
                'modulopai_id' => "Selecionar se é do [SITE] ou do [SISTEMA]",
                'indStatus' => Config::get('label.status'),
            ];

            $request->validate($rules, $messages, $customAttributes);
    }

    public function getParametrosGlobaisOrderBy(){
        return $this->parametroGlobal->getParametrosGlobaisOrderBy('nome', 'asc', 'A')->toJson();
    }

    public function getParametroGlobalById($id){
        return $this->parametroGlobal->getParametroGlobalById($id);
    }
}
