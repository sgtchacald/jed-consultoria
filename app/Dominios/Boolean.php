<?php
namespace App\Dominios;

use Illuminate\Database\Eloquent\Model;

class Boolean extends Model
{

    public static function getDominio()
    {
        return array(
            true => "Verdadeiro",
            false => "Falso"
        );
    }
}