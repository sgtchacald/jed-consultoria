<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        'idpai',
        'nome',
        'descricao',
        'urlimagem',
        'urlservicoexterno',
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
        if($id == null || $id == ""){
            $consulta = DB::table($this->table)->where('nome','=', $nome)->get()->count();
        }else{
            $consulta = DB::table($this->table)->where('nome','=', $nome)->where('id', '<>', $id)->get()->count();
            Log::alert("consulta:" . $consulta);
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

    public function getServicosPaiAleatorios($qtdItensAbuscar){
        return DB::table($this->table)
        ->select('*')
        ->inRandomOrder()
        ->where('indstatus','=', 'A')
        ->where('idpai', null)
        ->take($qtdItensAbuscar)
        ->get();
    }

    public function getServicosPai(){
        return DB::table($this->table)
        ->select('*')
        ->where('indstatus','=', 'A')
        ->where('idpai', null)
        ->get();
    }

    public function existeServicoFilho($id){
        return (DB::table($this->table)
        ->select('*')
        ->where('indstatus','=', 'A')
        ->where('idpai', $id)
        ->get()
        ->count()) > 0 ? true : false;
    }


}
