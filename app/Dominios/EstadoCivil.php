<?php
namespace App\Dominios;

use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{

    public static function getDominio(){
        return array(
            "S" => "Solteiro(a)",
            "C" => "Casado(a)",
            "D" => "Divorciado(a)",
            "V" => "Viúvo(a)",
            "X" => "Separado(a)"
        );
    }
}