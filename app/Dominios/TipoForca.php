<?php
namespace App\Dominios;

use Illuminate\Database\Eloquent\Model;

class TipoForca extends Model
{

    public static function getDominio(){
        return array(
            "E" => "Exército",
            "M" => "Marinha",
            "A" => "Aeronáutica"
        );
    }
}