<?php

namespace App\Http\Controllers;
use App\Http\Requests\DenunciaRequest;
use App\Models\Denuncia;
use Illuminate\Http\Request;

class DenunciaController extends Controller
{    
    public function index()
    {
        $denuncias = Denuncia::all(); 
        return view('denuncias.index',compact('denuncias'));
    }
    
    public function create()
    {
        return view('denuncias.create');
    }

    public function store(DenunciaRequest $request) 
    {  
        $denuncia = Denuncia::create($request->all()); 
        return redirect()->route('denuncia.show', ['denuncia' => $denuncia]);
    }

    public function show(Denuncia $denuncia) 
    {
        return view('denuncias.show',compact('denuncia'));
    }

    public function edit(Denuncia $denuncia) 
    {
        return view('denuncias.edit',compact('denuncia'));
    }

    public function update(DenunciaRequest $request, Denuncia $denuncia) 
    {
        $denuncia->den_localizacao = $request->den_localizacao;
        $denuncia->den_observacao = $request->den_observacao;
        $denuncia->den_quantidade_pessoas = $request->den_quantidade_pessoas;
        $denuncia->save();
        return view('denuncias.show',compact('denuncia'));
    }

    public function delete(Request $request, Denuncia $denuncia) {
        $denuncia->delete();
        return redirect()->route('denuncia.index');
    }

}