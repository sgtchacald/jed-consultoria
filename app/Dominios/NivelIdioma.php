<?php
namespace App\Dominios;

use Illuminate\Database\Eloquent\Model;

class NivelIdioma extends Model
{

    public static function getDominio(){
        return array(
            "B" => "Básico",
            "I" => "Intermediário",
            "A" => "Avançado"
        );
    }
}