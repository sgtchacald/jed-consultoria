<?php
namespace App\Dominios;

use Illuminate\Database\Eloquent\Model;

class TipoUnidade extends Model
{

    public static function getDominio(){
        return array(
            "T" => "Texto",
            "N" => "Número",
        );
    }
}
