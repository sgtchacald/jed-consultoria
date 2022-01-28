<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Servicos extends Authenticatable{
    use Notifiable;

    protected $primaryKey = 'id';
    protected $table = 'jed_servicos';

    const CREATED_AT = 'dtcadastro';
    const UPDATED_AT = 'dtedicao';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'descricao',
        'urlimagem',
        'idpai',
        'icone',
        'indstatus',
        //Informações Segurança
        'dtcadastro',
        'dtedicao',
        'dtexclusao',
        'usucriou',
        'usueditou',
        'usuexcluiu'
    ];

    public function getServicos($indStatus){
        return DB::table($this->table)
                    ->select('*')
                    ->where('indstatus','=', $indStatus)
                    ->orderBy('id','asc')
                    ->get();
    }

    public function getServicoById($id){
        return DB::table($this->table)
                ->where('id','=', $id)
                ->get();
    }

    public function getServicoByNome($nome, $id){
        if($id == null){
            $consulta = DB::table($this->table)->where('nome','=', $nome)->get()->count();
        }else{
            $consulta = DB::table($this->table)->where('nome','=', $nome)->whereAnd('id', '<>', $id)->get()->count();
        }

        return $consulta;
    }

    public function getServicosOrderBy($colunaOrderBy, $tipoOrderBy, $idIndStatus){
        return DB::table($this->table)
        ->select('*')
        ->where('indstatus','=', $idIndStatus)
        ->orderBy($colunaOrderBy, $tipoOrderBy)
        ->get();
    }

    public static function getServicosAleatorios($qtdItensAbuscar){
        return DB::table('jed_servicos')
        ->select('*')
        ->inRandomOrder()
        ->where('indstatus','=', 'A')
        ->orderBy('nome', 'asc')
        ->take($qtdItensAbuscar)
        ->get();
    }

}
