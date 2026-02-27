<?php

namespace App\Http\Controllers;

use App\Models\Assurance;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all(); //MODEL
        return view('typeAssurance.type',['types'=>$types]); //VIEW
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = new Type();
        return view('typeAssurance.add',['type'=>$type]);
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
            'libelle'=> 'required|unique:types',
            'photo' => 'mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('images', 'public');
        }


        $type = new Type();
        $type->libelle = $request->input('libelle');
        $type->photo = $imagePath;
        $type->save();
        return to_route('typeAssurance.index')->with('success','Type ajoute avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Type::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assurance = $this->show($id);
        $assurance->delete();
        return to_route('typeAssurance.index')->with('delete','Type supprime avec succes');
    }
}
