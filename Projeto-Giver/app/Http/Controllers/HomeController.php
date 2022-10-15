<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arquivo;
use Symfony\Component\Console\Input\Input;

class HomeController extends Controller
{
    public function index(){
        $index = Arquivo::all();

        return view('home', ['arquivos' => $index]);
    }

    public function salvaArquivo(Request $request){
       $arquivo = new Arquivo();

    //    $arquivo = $request->all();
    
        if ($request->hasFile('caminho')) {
            $caminho_destino = "public/arquivos";
            $arq = $request->file('caminho');
            $arq_name = $arq->getClientOriginalName();
            $path = $request->file('caminho')->storeAs($caminho_destino, $arq_name);
            $arquivo->caminho = $arq_name;
        }

       $arquivo->save();

       return redirect('/');
    }
}
