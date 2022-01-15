<?php
namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Usuarios;

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

    
    
    
   
    
    
}