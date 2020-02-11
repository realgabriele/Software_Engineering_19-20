<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \App\User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new \App\User();

        $user->username = request( 'username' );
        $user->name = request( 'name' );
        $user->surname = request( 'surname' );
        $user->email = request( 'email' );
        $user->password = request ( 'password' );
        $user->cdl_id = request ( 'cdl_id' );

        $user->save();

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
        return \App\User::find( $id );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $user = \App\User::find($id);

        if(!$user) {
            return response()->json(["Errore", 'code' => 404], 404);
        }

            $username = $request->get('username');
            $name = $request->get('name');
            $surname = $request->get('surname');
            $email = $request->get('email');
            $password = $request->get('password');
            $cdl_id = $request->get('cdl_id');

            $user->username = $username;
            $user->name = $name;
            $user->surname = $surname;
            $user->email = $email;
            $user->password = $password;
            $user->cdl_id = $cdl_id;

        $user->save();

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
        $toDelete = \App\User::find($id);
        if ( $toDelete )
            $toDelete->delete( );

        return response(200);
    }

    /**
     * Retrieves user id if credentials are correct
     * false otherwise
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authentication(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');

        $res = new \stdClass();
        $response = \App\User::where(['username' => $username, 'password' => $password])->get();

        //return $response->all();

        if (empty($response->all())) {
            $res->success = false;
            $res->id = null;
        } else {
            $res->success = true;
            $res->id = $response[0]->id;
        }

        return json_encode($res);
    }
}
