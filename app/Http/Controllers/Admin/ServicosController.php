<?php

namespace App\Http\Controllers\Admin;

use App\Models\Servicos;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Utils\UtilsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Config;


class ServicosController extends Controller{
    public function __construct(){
        $this->servicos = new Servicos();
    }

    public function index(){
        $servicos =   $this->servicos->getServicos('A');
        return view('admin.servicos.selecionar')->with(compact('servicos'));
    }

    public function show(){
    }

    public function create(){
       $servicos =   $this->servicos->getServicos('A');
       return view('admin.servicos.cadastrar')->with(compact('servicos'));;
    }

    public function store(Request $request){
        //valida os campos
        $this->validaCampos($request, 'i');

         // faz o upload dos arquivos
         if($request->hasFile('urlImagem')){
            // Get filename with the extension
            $filenameWithExt = $request->file('urlImagem')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('urlImagem')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('urlImagem')->storeAs(Config::get('path.uploads'), $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.png';
        }


        $insert = Servicos::create([
            'nome'       => $request->input('nome'),
            'descricao'  => $request->input('descricao'),
            'urlimagem'  => $fileNameToStore,
            'indstatus'  => $request->input('indStatus'),
            'usucriou'   => Auth::user()->getAuthIdentifier(),
            'dtcadastro' => date('Y-m-d H:i:s')
        ]);

        if($insert){
            $request->session()->flash('alert-success', Config::get('msg.cadastro_sucesso'));
            return redirect()->route('servicos.selecionar');
        }else{
            $idServico =  $this->servicos->getServicos('A');
            $request->session()->flash('alert-danger', Config::get('msg.cadastro_erro'));
            return view('admin.servicos.selecionar')->with(compact('id'));
        }
    }

    public function edit($id){
        $servico = $this->servicos->getServicoById($id);
        return view('admin.servicos.editar')->with(compact('servico'));
    }

    public function update(Request $request){
        $this->validaCampos($request, 'u');

        $update = Servicos::where(['id' => $request->input('id')])->update([
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

        return redirect()->route('servicos.selecionar');
    }

    public function destroy(Request $request, $id){

        $delete = Servicos::where(['id' => $id])->update([
            'indstatus'=>'I',
            'usuexcluiu' => Auth::user()->getAuthIdentifier(),
            'dtexclusao'=> date('Y-m-d H:i:s')
        ]);

        if($delete){
            $request->session()->flash('alert-success', Config::get('msg.exclusao_sucesso'));
        }else{
            $request->session()->flash('alert-danger', Config::get('msg.exclusao_erro'));
        }

        return redirect()->route('servicos.selecionar');
    }

    public function validaCampos(Request $request, $tipoPersistencia){

            $rules = [
                'nome'      => 'required|unique:jed_servicos',
                'descricao' => 'required',
                'indStatus' => 'sometimes|required',
            ];

            $messages = ['required' => ':attribute é obrigatório.'];

            $customAttributes = [
                'nome' => Config::get('label.nome'),
                'descricao' => Config::get('label.descricao'),
                'indStatus' => Config::get('label.status'),
            ];

            $request->validate($rules, $messages, $customAttributes);
    }

    public function getServicosOrderBy(){
        return $this->servicos->getServicosOrderBy('nome', 'asc', 'A')->toJson();
    }

    public function getServicoById($id){
        return $this->servicos->getServicoById($id);
    }

    public function validaSeExisteNome($nome){
        return $this->servicos->getServicoByNome($nome)->toJson();
    }


    public static function buscaServicosAleatorios($qtdItensABuscar){
        $servicos = Servicos::getServicosAleatorios($qtdItensABuscar);
        return $servicos->sortBy('nome');
    }

}
