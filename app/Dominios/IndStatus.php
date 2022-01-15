<?php
namespace App\Dominios;

use Illuminate\Database\Eloquent\Model;

class IndStatus extends Model
{
    public static function getDominio(){
        return array(
            "A" => "Ativo",
            "I" => "Inativo"
        );   
    }
}