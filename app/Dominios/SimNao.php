<?php
namespace App\Dominios;

use Illuminate\Database\Eloquent\Model;

class SimNao extends Model
{

    public static function getDominio()
    {
        return array(
            "S" => "Sim",
            "N" => "Não",
        );
    }
    
    public static function retornaSimNaoSeVazio($str){
        return empty($str) ? 'N' : 'S';
    }
}