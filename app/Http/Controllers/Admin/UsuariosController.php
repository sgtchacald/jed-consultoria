<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Utils\UtilsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Config;


class UsuariosController extends Controller{
    public function __construct(){
        $this->usuarios = new User();
    }

    public function index(){
        $usuarios =   $this->usuarios->getUsuarios('A');
        return view('admin.usuarios.selecionar')->with(compact('usuarios'));
    }

    public function show(){
    }

    public function create(){
       $usuarios =  $this->usuarios->getUsuarios('A');

       return view('admin.usuarios.cadastrar');
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

        $insert = User::create([
            'name'           => $request->input('nome'),
            'email'           => $request->input('email'),
            'cargo'          => $request->input('cargo'),
            'descricaocargo' => $request->input('descricaoCargo'),
            'urllinkedin'    => $request->input('urlLinkedin'),
            'urltwitter'     => $request->input('urlTwitter'),
            'urlfacebook'    => $request->input('urlFacebook'),
            'urlinstagram'   => $request->input('urlInstagram'),
            'urlimagem'      => $fileNameToStore,
            'password'       => bcrypt($request->input('senha')),
            'indcolaborador' => $request->input('indColaborador'),
            'indstatus'      => $request->input('indStatus'),
            'usucriou'       => Auth::user()->getAuthIdentifier(),
            'dtcadastro'     => date('Y-m-d H:i:s')
        ]);

        if($insert){
            $request->session()->flash('alert-success', Config::get('msg.cadastro_sucesso'));
            return redirect()->route('usuarios.selecionar');
        }else{
            $idUsuario =  $this->usuarios->getUsuarios('A');
            $request->session()->flash('alert-danger', Config::get('msg.cadastro_erro'));
            return view('admin.usuarios.selecionar')->with(compact('id'));
        }
    }

    public function edit($id){
        $usuario  = $this->usuarios->getUsuarioById($id);
        return view('admin.usuarios.editar')->with(compact('usuario'));
    }

    public function update(Request $request){
        $usuario = $this->usuarios->getUsuarioById($request->input('id'));

        //valida os campos
        $this->validaCampos($request, 'u');

        //Faz o upload dos arquivos
        $fileNameToStore = UtilsController::setUploadArquivo(
            $request,
            Config::get('path.uploads'),
            'urlImagem',
            $usuario[0]->urlimagem,
        );

        $update = User::where(['id' => $request->input('id')])->update([
            'name'           => $request->input('nome'),
            'email'          => $request->input('email'),
            'cargo'          => $request->input('cargo'),
            'descricaocargo' => $request->input('descricaoCargo'),
            'urllinkedin'    => $request->input('urlLinkedin'),
            'urltwitter'     => $request->input('urlTwitter'),
            'urlfacebook'    => $request->input('urlFacebook'),
            'urlinstagram'   => $request->input('urlInstagram'),
            'urlimagem'      => $fileNameToStore,
            'password'       => ($request->input('senha') != "" || $request->input('senha') != null) ? bcrypt($request->input('senha')) : $usuario[0]->password,
            'indcolaborador' => $request->input('indColaborador'),
            'indstatus'      => $request->input('indStatus'),
            'usueditou'      => Auth::user()->getAuthIdentifier(),
            'dtedicao'       => date('Y-m-d H:i:s')
        ]);

        if($update){
            $request->session()->flash('alert-success', Config::get('msg.edicao_sucesso'));
        }else{
            $request->session()->flash('alert-danger', Config::get('msg.edicao_erro'));
        }

        return redirect()->route('usuarios.selecionar');
    }

    public function destroy(Request $request, $id){
        //$existeRedeSocialDoUsuario  = $this->usuarios->getRedeSocialByIdUsuario($id);

        //if(!$existeUsuarioFilho){
            $usuario = $this->usuarios->getUsuarioById($id);
            $nomeDoArquivo = $usuario[0]->urlimagem;

            $delete = User::where(['id' => $id])->delete();

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
        //}


        return redirect()->route('usuarios.selecionar');
    }

    public function validaCampos(Request $request, $tipoPersistencia){

            $rules = [
                'nome'           => 'required',
                'descricaoCargo' => 'required',
                'indStatus' => 'sometimes|required',
            ];

            $messages = ['required' => ':attribute é obrigatório.'];

            $customAttributes = [
                'nome'           => Config::get('label.nome'),
                'descricaoCargo' => Config::get('label.descricaoCargo'),
                'indStatus'      => Config::get('label.status'),
            ];

            $request->validate($rules, $messages, $customAttributes);
    }

    public function getUsuariosOrderBy(){
        return $this->usuarios->getUsuariosOrderBy('nome', 'asc', 'A')->toJson();
    }

    public static function getUsuarios(){
        $usuarios = new User();
        return  $usuarios->getUsuarios('A');
    }

    public function getUsuarioById($id){
        return $this->usuarios->getUsuarioById($id);
    }

    public function validaSeExisteNome($nome,$id){
        $resultado = $this->usuarios->getUsuarioByNome($nome, $id);
        return json_encode(($resultado > 0) ? true : false);
    }

    public static function getImagem($strImagem) {
        $caminhoImagem = storage_path(Config::get('path.uploads_recuperar')).'/'.$strImagem;

        if(file_exists($caminhoImagem)) {
            return \Image::make(file_get_contents($caminhoImagem))->response();
        }
    }

}
