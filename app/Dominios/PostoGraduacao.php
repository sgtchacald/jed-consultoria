<?php
namespace App\Dominios;

use Illuminate\Database\Eloquent\Model;

class PostoGraduacao extends Model
{

    public static function getDominio()
    {
        return array(
            "1TEN" => "1º Tenente",
            "2TEN" => "2º Tenente",
            "3SGT" => "3º Sargento",
            "CB" => "Cabo",
            "SD" => "Soldado"
        );
    }
}