<?php

namespace App\Http\Controllers\Admin;

use App\Models\LinksUteis;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Utils\UtilsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Config;


class LinksUteisController extends Controller{
    public function __construct(){
        $this->linksUteis = new LinksUteis();
    }

    public function index(){
        $linksUteis =   $this->linksUteis->getLinksUteis('A');
        return view('admin.linksUteis.selecionar')->with(compact('linksUteis'));
    }

    public function show(){
    }

    public function create(){
       return view('admin.linksUteis.cadastrar');
    }

    public function store(Request $request){
        $this->validaCampos($request, 'i');

        $insert = LinksUteis::create([
            'nome'       => $request->input('nome'),
            'descricao'  => $request->input('descricao'),
            'url'        => $request->input('url'),
            'indstatus'  => $request->input('indStatus'),
            'usucriou'   => Auth::user()->getAuthIdentifier(),
            'dtcadastro' => date('Y-m-d H:i:s')
        ]);

        if($insert){
            $request->session()->flash('alert-success', Config::get('msg.cadastro_sucesso'));
            return redirect()->route('linksUteis.selecionar');
        }else{
            $idLinkUtil =  $this->linksUteis->getLinksUteis('A');
            $request->session()->flash('alert-danger', Config::get('msg.cadastro_erro'));
            return view('admin.linksUteis.selecionar')->with(compact('id'));
        }
    }

    public function edit($id){
        $linkUtil = $this->linksUteis->getLinkUtilById($id);
        return view('admin.linksUteis.editar')->with(compact('linkUtil'));
    }

    public function update(Request $request){
        $this->validaCampos($request, 'u');

        $update = LinksUteis::where(['id' => $request->input('id')])->update([
            'nome'       => $request->input('nome'),
            'descricao'  => $request->input('descricao'),
            'url'        => $request->input('url'),
            'indstatus' => $request->input('indStatus'),
            'usueditou' => Auth::user()->getAuthIdentifier(),
            'dtedicao'  => date('Y-m-d H:i:s')
        ]);

        if($update){
            $request->session()->flash('alert-success', Config::get('msg.edicao_sucesso'));
        }else{
            $request->session()->flash('alert-danger', Config::get('msg.edicao_erro'));
        }

        return redirect()->route('linksUteis.selecionar');
    }

    public function destroy(Request $request, $id){

        $delete = LinksUteis::where(['id' => $id])->update([
            'indstatus'=>'I',
            'usuexcluiu' => Auth::user()->getAuthIdentifier(),
            'dtexclusao'=> date('Y-m-d H:i:s')
        ]);

        if($delete){
            $request->session()->flash('alert-success', Config::get('msg.exclusao_sucesso'));
        }else{
            $request->session()->flash('alert-danger', Config::get('msg.exclusao_erro'));
        }

        return redirect()->route('linksUteis.selecionar');
    }

    public function validaCampos(Request $request, $tipoPersistencia){

            $rules = [
                'nome'      => 'required',
                'descricao' => 'required',
                'url'       => 'required|url',
                'indStatus' => 'sometimes|required',
            ];

            $messages = ['required' => ':attribute é obrigatório.'];

            $customAttributes = [
                'nome' => Config::get('label.nome'),
                'descricao' => Config::get('label.descricao'),
                'url' => Config::get('label.url'),
                'indStatus' => Config::get('label.status'),
            ];

            $request->validate($rules, $messages, $customAttributes);
    }

    public function getLinksUteisOrderBy(){
        return $this->linksUteis->getLinksUteisOrderBy('nome', 'asc', 'A')->toJson();
    }

    public function getLinkUtilById($id){
        return $this->linksUteis->getLinkUtilById($id);
    }

    public static function buscaLinksUteisAleatorios($qtdItensABuscar){
        $linksUteis = LinksUteis::getLinksUteisAleatorios($qtdItensABuscar);
        return $linksUteis->sortBy('nome');
    }

}
