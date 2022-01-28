<?php
namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Usuarios;
use Illuminate\Support\Facades\Log;

class UtilsController extends Controller{

    public static function apenasNumeros($str){
        return preg_replace("/[^0-9]/","", $str);
    }

    public static function geraSenhaAleatoria(){
        return '$' . Str::random(10) . '!';
    }

    public static function getValueArray($itens, $key){
        foreach($itens as $item => $value){
            if($key == $item){
                return $value;
            }else{
                return 'Valor não encontrado';
            }
        }
    }

    public static function getNomeUsuarioById($idUsuario){
        return !empty($idUsuario)?Usuarios::getNomeUsuario($idUsuario):'';
    }

    public static function setUploadArquivo($request, $caminhoDoUpload, $nomeDoCampo, $valorCampoBancoDeDados){
        $alteraImagem = $request->input('alteraImagem');

        if($alteraImagem == "S"){
            Log::debug($alteraImagem);

            Log::debug($valorCampoBancoDeDados);

            //Se o campo que vem do banco de dados não estiver vazio, faz a exclusão do arquivo antigo para não sobrecarregar o servidor de arquivos
            if($valorCampoBancoDeDados != null || $valorCampoBancoDeDados != ""){
                $caminhoArquivo = storage_path($caminhoDoUpload).'/'.$valorCampoBancoDeDados;

                if(file_exists($caminhoArquivo)) {
                    unlink($caminhoArquivo);
                }
            }

            //Faz o upload dos arquivos
            if($request->hasFile($nomeDoCampo)){
                Log::debug($alteraImagem);
                // Get filename with the extension
                $filenameWithExt = $request->file($nomeDoCampo)->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file($nomeDoCampo)->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore= $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $request->file($nomeDoCampo)->storeAs($caminhoDoUpload, $fileNameToStore);
            }else{
                $fileNameToStore = '';
            }
        }

        return $fileNameToStore;

    }







}
