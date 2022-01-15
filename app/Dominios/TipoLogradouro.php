<?php
namespace App\Dominios;

use Illuminate\Database\Eloquent\Model;

class TipoLogradouro extends Model
{

    public static function getDominio(){
        return array(
            "Aeroporto"     => "Aeroporto",
            "Alameda"       => "Alameda",
            "Área"          => "Área",
            "Avenida"       => "Avenida",
            "Campo"         => "Campo",
            "Chácara"       => "Chácara",
            "Colônia"       => "Colônia",
            "Condomínio"    => "Condomínio",
            "Conjunto"      => "Conjunto",
            "Distrito"      => "Distrito",
            "Esplanada"     => "Esplanada",
            "Estação"       => "Estação",
            "Estrada"       => "Estrada",
            "Favela"        => "Favela",
            "Feira"         => "Feira",
            "Jardim"        => "Jardim",
            "Ladeira"       => "Ladeira",
            "Lago"          => "Lago",
            "Lagoa"         => "Lagoa",
            "Largo"         => "Largo",
            "Loteamento"    => "Loteamento",
            "Morro"         => "Morro",
            "Núcleo"        => "Núcleo",
            "Parque"        => "Parque",
            "Passarela"     => "Passarela",
            "Pátio"         => "Pátio",
            "Praça"         => "Praça",
            "Quadra"        => "Quadra",
            "Recanto"       => "Recanto",
            "Residencial"   => "Residencial",
            "Rodovia"       => "Rodovia",
            "Rua"           => "Rua",
            "Setor"         => "Setor",
            "Sítio"         => "Sítio",
            "Travessa"      => "Travessa",
            "Trecho"        => "Trecho",
            "Trevo"         => "Trevo",
            "Vale"          => "Vale",
            "Vereda"        => "Vereda",
            "Via"           => "Via",
            "Viaduto"       => "Viaduto",
            "Viela"         => "Viela",
            "Vila"          => "Vila"
        );
    }
}