<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Poi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \App\Poi::all();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $poi = new \App\Poi();

        $poi->name = request( 'name' );
        $poi->description = request ( 'description' );
        $poi->x = request ( 'x' );
        $poi->y = request ( 'y' );
        $poi->service_id = request ( 'service_id' );

        $poi->save();

        return response(200);
    }

    public function edit(Request $request, $id)
    {
        $poi = \App\Poi::find($id);

        if(!$poi) {
            return response()->json(["Errore", 'code' => 404], 404);
        }

        $name = $request->get('name');
        $description = $request->get('description');
        $x = $request->get('x');
        $y = $request->get('y');
        $service_id = $request->get('service_id');

        $poi->name = $name;
        $poi->description = $description;
        $poi->x = $x;
        $poi->y = $y;
        $poi->service_id = $service_id;

        $poi->save();

        return response(200);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return \App\Poi::find( $id );
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $toDelete = \App\Poi::find($id);
        if ( $toDelete )
            $toDelete->delete( );

        return response(200);
    }

     /**
     * Search for the specified query.
     *
     * @param  int  $query
     * @return \Illuminate\Http\Response
     */
    public function search($query)
    {
        $all = \App\Poi::all();
     
        $result = [];

        for ($i = 0; $i < sizeof($all); $i++){
            $poi = $all[$i];
            if (stripos($poi->name, $query) !== false || 
                stripos($poi->description, $query) !== false){
                array_push($result, $poi);
            }
        }

        return $result;
        
    }
}
