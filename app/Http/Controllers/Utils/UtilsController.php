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

    public static function setUploadArquivo($request, $caminhoDoUpload, $nomeDoCampo, $valorCampoBancoDeDados){
        $fileNameToStore = '';

        $alteraImagem = $request->input('alteraImagem');

        if($alteraImagem == "true"){

            //Se o campo que vem do banco de dados não estiver vazio, faz a exclusão do arquivo antigo para não sobrecarregar o servidor de arquivos
            if($valorCampoBancoDeDados != ""){
                $caminhoArquivo = storage_path('app/'.$caminhoDoUpload).'/'.$valorCampoBancoDeDados;

                if(file_exists($caminhoArquivo)) {
                    unlink($caminhoArquivo);
                }
            }

            //Faz o upload dos arquivos
            if($request->hasFile($nomeDoCampo)){
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
        }else{
            $fileNameToStore = $valorCampoBancoDeDados;
        }

        return $fileNameToStore;

    }

    public static function excluiArquivo($nomeDoArquivo, $caminhoDoUpload){
        //Se o campo que vem do banco de dados não estiver vazio, faz a exclusão do arquivo antigo para não sobrecarregar o servidor de arquivos
        if($nomeDoArquivo != "" && $caminhoDoUpload != ""){
            $caminhoArquivo = storage_path($caminhoDoUpload).'/'.$nomeDoArquivo;

            if(file_exists($caminhoArquivo)) {
                unlink($caminhoArquivo);
                if(file_exists($caminhoArquivo)){
                    return false;
                }
            }
        }

        return true;
    }

    public static function gePrimeiroNomeUltimoSobrenome($nomeCompleto){
        $nd = explode(" ", $nomeCompleto);
        return $nd[0] . " " . $nd[count($nd)-1];
    }







}
