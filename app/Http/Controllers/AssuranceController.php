<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssuranceRequest;
use App\Http\services\AssuranceService;
use App\Models\Assurance;
use App\Models\Categorie;
use App\Models\Type;
use Illuminate\Http\Request;

class AssuranceController extends Controller
{

    protected $service;

    public function __construct(AssuranceService $service){
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $assurances = $this->service->getAllAssurances();

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
    public function store(AssuranceRequest $request)
    {
        $this->service->store($request->validated());

        return to_route('assurance')->with('success','Assurance créée avec succes');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->service->getAssuranceById($id);
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
        $assurance = $this->service->getAssuranceById($id);
        return view('assurance.add',['assurance'=>$assurance, 'types'=>$types]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AssuranceRequest $request)
    {

        $assurance =  $this->service->getAssuranceById($request->id);
        $this->service->update($assurance,$request->validated());

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
        $this->service->delete($assurance);

        return to_route('assurance')->with('delete','Assurance delete avec succes');;
    }
}
