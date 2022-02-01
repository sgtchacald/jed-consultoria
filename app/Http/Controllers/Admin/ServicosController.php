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
       $servicos =  $this->servicos->getServicos('A');
       $hierarquia = $this->criaHierarquia($servicos->toArray());

       return view('admin.servicos.cadastrar')->with(compact('hierarquia'));
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

        $insert = Servicos::create([
            'nome'       => $request->input('nome'),
            'descricao'  => $request->input('descricao'),
            'urlimagem'  => $fileNameToStore,
            'idpai'      => $request->input('idPai'),
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
        $servico  = $this->servicos->getServicoById($id);
        $servicos =  $this->servicos->getServicos('A');
        $hierarquia = $this->criaHierarquia($servicos->toArray());
        return view('admin.servicos.editar')->with(compact('servico', 'hierarquia'));
    }

    public function update(Request $request){
        $servico = $this->servicos->getServicoById($request->input('id'));

        //valida os campos
        $this->validaCampos($request, 'u');

        //Faz o upload dos arquivos
        $fileNameToStore = UtilsController::setUploadArquivo(
            $request,
            Config::get('path.uploads'),
            'urlImagem',
            $servico[0]->urlimagem,
        );

        $update = Servicos::where(['id' => $request->input('id')])->update([
            'nome'       => $request->input('nome'),
            'descricao'  => $request->input('descricao'),
            'urlimagem'  => $fileNameToStore,
            'idpai'      => $request->input('idPai'),
            'indstatus'  => $request->input('indStatus'),
            'usueditou'  => Auth::user()->getAuthIdentifier(),
            'dtedicao'   => date('Y-m-d H:i:s')
        ]);

        if($update){
            $request->session()->flash('alert-success', Config::get('msg.edicao_sucesso'));
        }else{
            $request->session()->flash('alert-danger', Config::get('msg.edicao_erro'));
        }

        return redirect()->route('servicos.selecionar');
    }

    public function destroy(Request $request, $id){
        $existeServicoFilho  = $this->servicos->getServicoFilhoById($id);

        if(!$existeServicoFilho){
            $servico = $this->servicos->getServicoById($id);
            $nomeDoArquivo = $servico[0]->urlimagem;

            $delete = Servicos::where(['id' => $id])->delete();

            if($delete){
                //Faz o upload dos arquivos
                $excluirArquivo = UtilsController::excluiArquivo($nomeDoArquivo, Config::get('path.uploads_recuperar'));

                if(!$excluirArquivo){
                    $request->session()->flash('alert-danger', Config::get('msg.exclusao_erro_arquivo'));
                }

                $request->session()->flash('alert-success', Config::get('msg.exclusao_sucesso'));
            }else{
                $request->session()->flash('alert-danger', Config::get('msg.exclusao_erro'));
            }
        }else{
            $request->session()->flash('alert-danger', Config::get('msg.exclusao_servico_vinculado'));
        }


        return redirect()->route('servicos.selecionar');
    }

    public function validaCampos(Request $request, $tipoPersistencia){

            $rules = [
                'nome'      => 'required',
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

    public function validaSeExisteNome($nome,$id){
        $resultado = $this->servicos->getServicoByNome($nome, $id);
        return json_encode(($resultado > 0) ? true : false);
    }


    public static function getImagem($strImagem) {
        $caminhoImagem = storage_path(Config::get('path.uploads_recuperar')).'/'.$strImagem;

        if(file_exists($caminhoImagem)) {
            return \Image::make(file_get_contents($caminhoImagem))->response();
        }
    }

    public function criaHierarquia(array $elements, $parentId = 0, $nivelHierarquico=0) {
        $branch = array();

        $nivelHierarquico++;

        foreach ($elements as $element) {
            if ($element->idpai == $parentId) {

                $children = $this->criaHierarquia($elements, $element->id, $nivelHierarquico);

                if ($children) {
                    $element->children = $children;
                }

                $element->nivel = $nivelHierarquico;

                $branch[] = $element;
            }
        }

        return $branch;
    }

    public static function getServicosAleatorios($qtdABuscar){
        $servicos = new Servicos();
        return $servicos->getServicosAleatorios($qtdABuscar)->sortBy('nome');
    }

    public static function getServicosHierarquia(){
        $servicos = new Servicos();
        $servicosController = new ServicosController();

        $getServicos = $servicos->getServicosOrderBy('nome', 'asc', 'A');

        $hierarquia = $servicosController->criaHierarquia($getServicos->toArray());

        return  $hierarquia;
    }

}
