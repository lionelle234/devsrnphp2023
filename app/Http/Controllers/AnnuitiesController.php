<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Annuities;
use App\Models\User;

class AnnuitiesController extends Controller
{
    public function createannu() {
        return view('pages.createannu');
    }

    public function storeannu(Request $request) {

        $annuities = new Annuities;

        $annuities->nome_annu = $request->nome_annu;
        $annuities->ano = $request->ano;
        $annuities->valor = $request->valor;
        
        
        
        $annuities->save();

        return redirect('/anuidades/create')->with('msg', 'Anuidade cadastrada com sucesso!');

    }
}
