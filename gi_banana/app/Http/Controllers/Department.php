<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Department extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \App\Department::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = new \App\Department();

        $department->name = request( 'name' );
        $department->description = request ( 'description' );

        $department->save();

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
        return \App\Department::find( $id );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

        public function edit(Request $request, $id)
    {
        $department = \App\Department::find($id);

        if(!$department) {
            return response()->json(["Errore", 'code' => 404], 404);
        }

            $name = $request->get('name');
            $description = $request->get('description');


            $department->name = $name;
            $department->description = $description;

        $department->save();

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
        $toDelete = \App\Department::find($id);
        if ( $toDelete )
            $toDelete->delete( );

        return response(200);
    }
}
