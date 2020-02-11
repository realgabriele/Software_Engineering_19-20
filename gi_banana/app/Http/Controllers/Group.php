<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Group extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \App\Group::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Group = new \App\Group();

        $Group->name = request( 'name' );
        $Group->description = request( 'description' );
        $Group->level = request( 'level' );

        $Group->save();

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
        return \App\Group::find( $id );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $group = \App\Group::find($id);

        if(!$group) {
            return response()->json(["Errore", 'code' => 404], 404);
        }

            $name = $request->get('name');
            $description = $request->get('description');
            $level = $request->get('level');

            $group->name = $name;
            $group->description = $description;
            $group->level = $level;

        $group->save();

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
        $toDelete = \App\Group::find($id);
        if ( $toDelete )
            $toDelete->delete( );

        return response(200);
    }
}
