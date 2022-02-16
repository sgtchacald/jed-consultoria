<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function __construct(){}

    public function index(){
        return view('site.index');
    }

    public function abrirPaginaSobre(){
        return view('site.sobre');
    }

    public function abrirPaginaServicos(){
        return view('site.servicos');
    }

    public function abrirPaginaContato(){
        return view('site.contato');
    }

    public function enviarDadosContato(){

        return view('site.contato');
    }


}
