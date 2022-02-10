<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Contatos extends Authenticatable{
    use Notifiable;

    protected $primaryKey = 'id';
    protected $table = 'jed_contatos';

    const CREATED_AT = 'dtcadastro';
    const UPDATED_AT = 'dtedicao';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'assunto',
        'mensagem',
        'indstatus',
        //Informações Segurança
        'dtcadastro',
        'dtedicao',
        'dtexclusao',
        'usucriou',
        'usueditou',
        'usuexcluiu'
    ];

    public function getContatos($indStatus){
        return DB::table($this->table)
                    ->select('*')
                    ->where('indstatus','=', $indStatus)
                    ->orderBy('id','asc')
                    ->get();
    }

    public function getContatosOrderBy($colunaOrderBy, $tipoOrderBy, $idIndStatus){
        return DB::table($this->table)
        ->select('*')
        ->where('indstatus','=', $idIndStatus)
        ->orderBy($colunaOrderBy, $tipoOrderBy)
        ->get();
    }

    public function getContatoById($id){
        return DB::table($this->table)
                ->where('id','=', $id)
                ->get();
    }
}
