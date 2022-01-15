<?php
namespace App\Dominios;

use Illuminate\Database\Eloquent\Model;

class IndStatusFormAcademica extends Model
{

    public static function getDominio(){
        return array(
            "CONC" => "Concluido",
            "ANDA" => "Em Andamento",
            "TRAN" => "Trancado"
        );
    }
    
}