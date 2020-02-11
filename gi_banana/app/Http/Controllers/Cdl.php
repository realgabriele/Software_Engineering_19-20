<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Cdl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \App\Cdl::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cdl = new \App\Cdl();

        $cdl->name = request( 'name' );
        $cdl->description = request ( 'description' );

        $cdl->save();

        return response(200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return \App\Cdl::find( $id );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $cdl = \App\Cdl::find($id);

        if(!$cdl) {
            return response()->json(["Errore", 'code' => 404], 404);
        }

            $name = $request->get('name');
            $description = $request->get('description');


            $cdl->name = $name;
            $cdl->description = $description;

        $cdl->save();

        return response(200);
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
        $toDelete = \App\Cdl::find($id);
        if ( $toDelete )
            $toDelete->delete( );

        return response(200);
    }

    /**
     * Show all the POI associated to a CdL
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getpoi(Request $request, $id)
    {
        $lista_cdlpoi = \App\CdlPoi::where(['cdl_id' => $id])->get();
        $lista_poi = [];
        foreach ($lista_cdlpoi as $cdlpoi){
            $poi_id = $cdlpoi->poi_id;
            $poi = \App\Poi::find($poi_id);
            array_push($lista_poi, $poi);
        }

        return $lista_poi;
    }

    public function searchpoi(Request $request, $id, $query)
    {
        $lista_cdlpoi = \App\CdlPoi::where(['cdl_id' => $id])->get();
        $lista_poi = [];
        foreach ($lista_cdlpoi as $cdlpoi){
            $poi_id = $cdlpoi->poi_id;
            $poi = \App\Poi::find($poi_id);
            if ( stripos($poi->name, $query) !== false ||
                stripos($poi->description, $query) !== false)
                array_push($lista_poi, $poi);
        }

        return $lista_poi;
    }

}
