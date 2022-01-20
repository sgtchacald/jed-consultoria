<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ParametrosGlobais extends Authenticatable{
    use Notifiable;

    protected $primaryKey = 'id';
    protected $table = 'jed_parametros_globais';

    const CREATED_AT = 'dtcadastro';
    const UPDATED_AT = 'dtedicao';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'modulopai_id',
        'modulo_id',
        'unidade',
        'codigo',
        'nome',
        'descricao',
        'valor',
        'indstatus',
        //Informações Segurança
        'dtcadastro',
        'dtedicao',
        'dtexclusao',
        'usucriou',
        'usueditou',
        'usuexcluiu'
    ];

    public function getParametrosGlobais($indStatus){
        return DB::table($this->table)
                    ->select('*')
                    ->where('indstatus','=', $indStatus)
                    ->orderBy('id','asc')
                    ->get();
    }

    public function getParametroGlobalById($id){
        return DB::table($this->table)
                ->where('id','=', $id)
                ->get();
    }

    public function getParametrosGlobaisOrderBy($colunaOrderBy, $tipoOrderBy, $idIndStatus){
        return DB::table($this->table)
        ->select('*')
        ->where('indstatus','=', $idIndStatus)
        ->orderBy($colunaOrderBy, $tipoOrderBy)
        ->get();
    }

    public static function get($codigo){
        if($codigo == "" || $codigo == null){
            return "";
        }

        $tabela = "jed_parametros_globais";

        $resultado = DB::table($tabela)->select('valor')->where('codigo','=', $codigo)->get();

        if($resultado->first() == null){
            return "";
        }

        return $resultado->first()->valor;
    }

    public static function verificaSeExisteCodigo($codigo){
        $tabela = "jed_parametros_globais";
        $query = DB::table($tabela)
                ->where('codigo','=', $codigo)
                ->count();
        return  $query > 0 ? false : true;
    }

    public function existeCodigo($codigo){
        $tabela = "jed_parametros_globais";
        $query = DB::table($tabela)
                ->where('codigo','=', $codigo)
                ->count();
        return  $query > 0 ? false : true;
    }


}
