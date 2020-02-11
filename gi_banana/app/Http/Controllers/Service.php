<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Service extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \App\Service::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = new \App\Service();

        $service->name = request( 'name' );
        $service->description = request ( 'description' );
        $service->color = request ( 'color' );

        $service->save();

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
        return \App\Service::find( $id );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

        public function edit(Request $request, $id)
    {
        $service = \App\Service::find($id);

        if(!$service) {
            return response()->json(["Errore", 'code' => 404], 404);
        }

            $name = $request->get('name');
            $description = $request->get('description');
            $color = $request->get('color');


            $service->name = $name;
            $service->description = $description;
            $service->color = $color;


        $service->save();

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
        $toDelete = \App\Service::find($id);
        if ( $toDelete )
            $toDelete->delete( );

        return response(200);
    }
}
