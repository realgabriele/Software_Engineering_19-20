<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CdlPoi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \App\CdlPoi::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cdlpoi = new \App\CdlPoi();

        $cdlpoi->cdl_id = request( 'cdl_id' );
        $cdlpoi->poi_id = request( 'poi_id' );

        $cdlpoi->save();

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
        return \App\CdlPoi::find( $id );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $cdlpoi = \App\CdlPoi::find($id);

        if(!$cdlpoi) {
            return response()->json(["Errore", 'code' => 404], 404);
        }

            $cdl_id = $request->get( 'cdl_id' );
            $poi_id = $request->get( 'poi_id' );

            $cdlpoi->cdl_id = $cdl_id;
            $cdlpoi->poi_id = $poi_id;

        $cdlpoi->save();

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
        $toDelete = \App\CdlPoi::find($id);
        if ( $toDelete )
            $toDelete->delete( );

        return response(200);
    }
}
