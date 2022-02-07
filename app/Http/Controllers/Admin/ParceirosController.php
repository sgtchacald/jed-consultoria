<?php

namespace App\Http\Controllers\Admin;

use App\Models\Parceiros;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Utils\UtilsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Config;


class ParceirosController extends Controller{
    public function __construct(){
        $this->parceiros = new Parceiros();
    }

    public function index(){
        $parceiros = $this->parceiros->getParceiros('A');
        return view('admin.parceiros.selecionar')->with(compact('parceiros'));
    }

    public function show(){
    }

    public function create(){
       $parceiros =  $this->parceiros->getParceiros('A');
       return view('admin.parceiros.cadastrar');
    }

    public function store(Request $request){
        //valida os campos
        $this->validaCampos($request, 'i');

        //Faz o upload dos arquivos
        $fileNameToStore = UtilsController::setUploadArquivo(
            $request,
            Config::get('path.uploads'),
            'urlImagem',
            ''
        );

        $insert = Parceiros::create([
            'nome'              => $request->input('nome'),
            'urlimagem'         => $fileNameToStore,
            'indexibirparceiro' => $request->input('indExibirParceiro'),
            'indstatus'         => $request->input('indStatus'),
            'usucriou'          => Auth::user()->getAuthIdentifier(),
            'dtcadastro'        => date('Y-m-d H:i:s')
        ]);

        if($insert){
            $request->session()->flash('alert-success', Config::get('msg.cadastro_sucesso'));
            return redirect()->route('parceiros.selecionar');
        }else{
            $idParceiro =  $this->parceiros->getParceiros('A');
            $request->session()->flash('alert-danger', Config::get('msg.cadastro_erro'));
            return view('admin.parceiros.selecionar')->with(compact('id'));
        }
    }

    public function edit($id){
        $parceiro  = $this->parceiros->getParceiroById($id);
        return view('admin.parceiros.editar')->with(compact('parceiro'));
    }

    public function update(Request $request){
        $parceiro = $this->parceiros->getParceiroById($request->input('id'));

        //valida os campos
        $this->validaCampos($request, 'u');

        //Faz o upload dos arquivos
        $fileNameToStore = UtilsController::setUploadArquivo(
            $request,
            Config::get('path.uploads'),
            'urlImagem',
            $parceiro[0]->urlimagem,
        );

        $update = Parceiros::where(['id' => $request->input('id')])->update([
            'nome'              => $request->input('nome'),
            'urlimagem'         => $fileNameToStore,
            'indexibirparceiro' => $request->input('indExibirParceiro'),
            'indstatus'         => $request->input('indStatus'),
            'usueditou'         => Auth::user()->getAuthIdentifier(),
            'dtedicao'          => date('Y-m-d H:i:s')
        ]);

        if($update){
            $request->session()->flash('alert-success', Config::get('msg.edicao_sucesso'));
        }else{
            $request->session()->flash('alert-danger', Config::get('msg.edicao_erro'));
        }

        return redirect()->route('parceiros.selecionar');
    }

    public function destroy(Request $request, $id){

        $parceiro = $this->parceiros->getParceiroById($id);
        $nomeDoArquivo = $parceiro[0]->urlimagem;

        $delete = Parceiros::where(['id' => $id])->delete();

        if($delete){
            //Faz o exclusão do arquivo
            $excluirArquivo = UtilsController::excluiArquivo($nomeDoArquivo, Config::get('path.uploads_recuperar'));

            if(!$excluirArquivo){
                $request->session()->flash('alert-danger', Config::get('msg.exclusao_erro_arquivo'));
            }

            $request->session()->flash('alert-success', Config::get('msg.exclusao_sucesso'));
        }else{
            $request->session()->flash('alert-danger', Config::get('msg.exclusao_erro'));
        }

        return redirect()->route('parceiros.selecionar');
    }

    public function validaCampos(Request $request, $tipoPersistencia){

        $rules = [
            'nome'           => 'required',
            'indStatus'      => 'sometimes|required',
        ];

        $messages = ['required' => ':attribute é obrigatório.'];

        $customAttributes = [
            'nome'           => Config::get('label.nome'),
            'indStatus'      => Config::get('label.status'),
        ];

        $request->validate($rules, $messages, $customAttributes);
    }

    public function getParceirosOrderBy(){
        return $this->parceiros->getParceirosOrderBy('nome', 'asc', 'A')->toJson();
    }

    public static function getParceiros(){
        $parceiros = new Parceiros();
        return  $parceiros->getParceiros('A');
    }

    public function getParceiroById($id){
        return $this->parceiros->getParceiroById($id);
    }

    public function validaSeExisteNome($nome,$id){
        $resultado = $this->parceiros->getParceiroByNome($nome, $id);
        return json_encode(($resultado > 0) ? true : false);
    }

    public static function getImagem($strImagem) {
        $caminhoImagem = storage_path(Config::get('path.uploads_recuperar')).'/'.$strImagem;

        if(file_exists($caminhoImagem)) {
            return \Image::make(file_get_contents($caminhoImagem))->response();
        }
    }

}
