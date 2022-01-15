<?php
namespace App\Dominios;

use Illuminate\Database\Eloquent\Model;

class PermissoesUsuario extends Model
{

    public static function getDominio()
    {
        return array(
            "A" => "Administrador",
            "R" => "Reservista",
            "E" => "Representante de Empresa"
        );
    }
    
    public static function getValueAdmin(){
        return 'A';
    }
    
    public static function getValueReservista(){
        return 'R';
    }
    
    public static function getValueRepresentanteEmpresa(){
        return 'E';
    }
}