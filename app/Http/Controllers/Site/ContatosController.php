<?php

namespace App\Http\Controllers\Site;

use App\Models\Contatos;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Utils\UtilsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Config;


class ContatosController extends Controller
{
    public function __construct()
    {
        $this->contato = new Contatos();
    }

    public function index($indStatus)
    {
        $indStatus = ($indStatus == 'A') ? "A" : "I";
        $contatos =   $this->contato->getContatosOrderBy('dtcadastro', 'desc', $indStatus);
        return view('admin.contato.caixaDeEntrada')->with(compact('contatos', 'indStatus'));
    }


    public function show()
    {
    }

    public function create()
    {
        return view('admin.contato.cadastrar');
    }

    public function store(Request $request)
    {
        
        $this->validaCampos($request, 'i');

        //Faz Validação de segurança recaptcha
        $ip = $_SERVER['REMOTE_ADDR'];
        $captcha =  $request->input('g-recaptcha-response');
        $secretKey = env("RECAPTCHA_SECRET_KEY");
        $resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify" . "?secret=" .$secretKey . "&response=" . $captcha . "&remoteip=" . $ip);

        $atributos = json_decode($resposta, TRUE);

        if(!$atributos['success']){
            $request->session()->flash('alert-danger', Config::get('msg.contato_msg_recaptcha'));
            return redirect()->route('site.contato')->withInput();
        }

        $insert = Contatos::create([
            'nome'        => $request->input('nome'),
            'email'       => $request->input('email'),
            'telefone'    => $request->input('telefone'),
            'assunto'     => $request->input('assunto'),
            'mensagem'    => $request->input('mensagem'),
            'indstatus'   => "A",
            'usucriou'    => 0,
            'dtcadastro'  => date('Y-m-d H:i:s'),
            'dtedicao'    => null
        ]);

        if ($insert) {
            $this->enviarEmail($request);

            $request->session()->flash('alert-success', Config::get('msg.contato_sucesso'));
            return redirect()->route('site.contato');
        } else {
            $request->session()->flash('alert-danger', Config::get('msg.contato_erro'));
            return redirect()->route('site.contato');
        }
    }

    public function destroy(Request $request, $id)
    {
        $indStatus = "A";

        $delete = Contatos::where(['id' => $id])->update([
            'indstatus' => 'I',
            'usuexcluiu' => Auth::user()->getAuthIdentifier(),
            'dtexclusao' => date('Y-m-d H:i:s')
        ]);

        if ($delete) {
            $request->session()->flash('alert-success', Config::get('msg.contato_msg_lida_sucesso'));
        } else {
            $request->session()->flash('alert-danger', Config::get('msg.contato_msg_lida_erro'));
        }

        return redirect()->route('contato.caixaDeEntrada', $indStatus);
    }

    public function validaCampos(Request $request, $tipoPersistencia)
    {

        $rules = [
            'nome'      => 'required|min:3',
            'email'     => 'required|email',
            'telefone'  => 'required',
            'assunto'   => 'required',
            'mensagem'  => 'required|min:5',
            'indStatus' => 'sometimes|required',
        ];

        $messages = ['required' => 'Campo :attribute é obrigatório.'];

        $customAttributes = [
            'nome' => Config::get('label.nome'),
            'email' => Config::get('label.email'),
            'telefone' => Config::get('label.telefone'),
            'assunto' => Config::get('label.contato_assunto'),
            'mensagem' => Config::get('label.contato_mensagem'),
            'indStatus' => Config::get('label.status'),
        ];

        $request->validate($rules, $messages, $customAttributes);
    }

    public function getContatosOrderBy()
    {
        return $this->contato->getContatosOrderBy('dtcadastro', 'desc', 'A')->toJson();
    }

    public function getContatoById($id)
    {
        return $this->contato->getContatoById($id);
    }

    public function enviarEmail(Request $request){
        \Mail::send(
            'site.contatoEmail',
                array(
                    'nome'     => $request->input('nome'),
                    'email'    => $request->input('email'),
                    'telefone' => $request->input('telefone'),
                    'assunto'  => $request->input('assunto'),
                    'mensagem' => $request->input('mensagem')
                ), function($message) use ($request){
                    $message->from($request->email);
                    $message->to(env("MAIL_FROM_ADDRESS"))->subject("E-Mail Recebido [SITE]: ".$request->input('strAssunto'));
                });
    }

    public function getModal($indStatus){
        return view('admin.contato.caixaDeEntradaModal')->with(compact('indStatus'));
    }
}
