<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Modulos extends Authenticatable{
    use Notifiable;

    protected $primaryKey = 'id';
    protected $table = 'jed_links_uteis';

    const CREATED_AT = 'dtcadastro';
    const UPDATED_AT = 'dtedicao';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo',
        'nome',
        'indstatus',
        //Informações Segurança
        'dtcadastro',
        'dtedicao',
        'dtexclusao',
        'usucriou',
        'usueditou',
        'usuexcluiu'
    ];

    public function getModulos($indStatus){
        return DB::table($this->table)
                    ->select('*')
                    ->where('indstatus','=', $indStatus)
                    ->orderBy('id','asc')
                    ->get();
    }

    public function getModuloById($id){
        return DB::table($this->table)
                ->where('id','=', $id)
                ->get();
    }

    public function getModulosOrderBy($colunaOrderBy, $tipoOrderBy, $idIndStatus){
        return DB::table($this->table)
        ->select('*')
        ->where('indstatus','=', $idIndStatus)
        ->orderBy($colunaOrderBy, $tipoOrderBy)
        ->get();
    }
}
