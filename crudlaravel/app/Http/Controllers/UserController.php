<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        //dd($users);
        //var_dump($users);
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //dd($request);
        if($request->hasFile('photo')) {
            $file = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('photos'), $file);
        }
      
        $usr = new User;
        $usr->name     = $request->get('name');
        $usr->email    = $request->get('email');
        $usr->password = bcrypt($request->get('password'));
        $usr->role     = $request->get('role');
        $usr->photo    = 'photos/'.$file;
        if($usr->save()) {
            return redirect('user')->with('status', 'Usuario <strong>'.$usr->name.'</strong> Adicionado con Exito!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usr = User::find($id);
        return view('users.show')->with('usr', $usr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usr = User::find($id);
        return view('users.edit')->with('usr', $usr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $usr = User::find($id);
        $usr->name     = $request->get('name');
        $usr->email    = $request->get('email');
        $usr->role     = $request->get('role');
        if($request->hasFile('photo')) {
            $file = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('photos'), $file);
            $usr->photo = 'photos/'.$file;
        }
        if($usr->save()) {
            return redirect('user')->with('status', 'Usuario <strong>'.$usr->name.'</strong> Modificado con Exito!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usr = User::find($id);
        if($usr->delete()) {
            return redirect('user')->with('status', 'Usuario <strong>'.$usr->name.'</strong> Eliminado con Exito!');
        }
    }


    public function checkmail(Request $request) {
        $check = User::where('email', '=', $request->get('email'))->count();
        if($check > 0) {
            echo 'notok';
        } else {
            echo 'ok';
        }
    }
}
