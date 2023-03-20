<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Associates;
use App\Models\Annuities;
use App\Models\User;

class AssociatesController extends Controller
{
    
    public function index() {

        $search = request('search');

        if($search) {

            $associates = Associates::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();

        } else {
            $associates = Associates::all();
        }        
    
        return view('welcome',['associates' => $associates, 'search' => $search]);

    }

    public function create() {
          

        return view('pages.create');
    }

    public function store(Request $request) {
        $associates = new Associates;

        $associates->nome = $request->nome;
        $associates->email = $request->email;
        $associates->cpf = $request->cpf;
        $associates->data_filiacao = $request->data_filiacao;
        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/associados'), $imageName);

            $associates->image = $imageName;

        }


        $associates->save();

        return redirect('/associados/create')->with('msg', 'Associado cadastrado com sucesso!');

    }

    public function show($id) {

        $associate = Associates::findOrFail($id);



        return view('pages.show', ['associate' => $associate]);
        
    }


    public function destroy($id, $associd) {

        Annuities::findOrFail($id)->delete();
        $associate = Associates::findOrFail($associd);
        

        return redirect('/associados/view/'.$associd.'');

    }

    public function edit($id) {

        

        $annuity = Annuities::findOrFail($id);


        return view('pages.editannu', ['annuity' => $annuity]);

    }

    public function update(Request $request) {

        $data = $request->all();


        Annuities::findOrFail($request->id)->update($data);

        return redirect('/');

    }

    public function payAnnuity($id, $associd) {
        
        
        $associate = Associates::findOrFail($associd);
        

        $associate->annuities()->attach($id);    

        return redirect('/associados/view/'.$associd.'');

    }

    public function unpayAnnuity($id, $associd) {

        $associate = Associates::findOrFail($associd);
        

        $associate->annuities()->detach($id);    


        return redirect('/associados/view/'.$associd.'');

    }

    public function viewAssociate($id) {
        

        $associate = Associates::findOrFail($id);
        $associd = $associate->id;
        $annuities = Annuities::where([
            ['ano', '>=', $associate->data_filiacao]
        ])->get();


        $golly = Annuities::with('associates')->whereHas('associates', function ($query)  use ($id) {
            $query->where('id', $id);
        })->get();
        $sum = $golly->sum('valor');
        $sum2 = $annuities->sum('valor');
        $owned = $sum2 - $sum;
        


        
        return view('pages.dashboard', 
            ['annuities' => $annuities, 'associate' => $associate, 'associd' => $associd, 'owned' => $owned]
        );
    }

    

}