<?php

namespace App\Http\Controllers;

use App\Models\Assurance;
use App\Models\Categorie;
use App\Models\Type;
use Illuminate\Http\Request;

class AssuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $assurances = Assurance::paginate(5); //model
            return view('assurance.assurance',['assurances'=>$assurances]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assurance = new Assurance();
        $types = Type::all();
        return view('assurance.add',['assurance'=>$assurance, 'types'=>$types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle'=>'required|max:10',
            'montant'=>'required',
            'type_id'=>'required',
        ]);
        $assurance = new Assurance();
        $assurance->libelle = $request['libelle'];
        $assurance->montant = $request['montant'];
        $assurance->type_id = $request['type_id'];
        $assurance->save();
        return to_route('assurance');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return  Assurance::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = Type::all();
        $assurance = $this->show($id);
        return view('assurance.add',['assurance'=>$assurance, 'types'=>$types]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $assurance =  $this->show($request['id']);
        $assurance->libelle = $request['libelle'];
        $assurance->montant = $request['montant'];
        $assurance->type_id = $request['type_id'];
        $assurance->save();
        return to_route('assurance');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assurance = Assurance::find($id);
        $assurance->delete();
        return to_route('assurance');
    }
}
