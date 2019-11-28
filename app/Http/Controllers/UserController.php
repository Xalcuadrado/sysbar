<?php

namespace sysbar\Http\Controllers;

use Illuminate\Http\Request;
use sysbar\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sysbar\Http\Requests\UserFormRequest;
use Caffeinated\Shinobi\Models\Role;
use DB;

class UserController extends Controller
{
    public function __construct()
    {
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $users=DB::table('users')
            ->where('name','LIKE','%'.$query.'%')
            ->orwhere('n_documento','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(10);
            return view('users.index',["users"=>$users,"searchText"=>$query]);
        }
    }

    public function show(User $user)
    {
    	$roles = Role::get();
        $user_rol = DB::table('role_user')->get();
        return view('users.show', compact('user','roles','user_rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::get();
        $user_rol = DB::table('role_user')->get();
        return view('users.edit', compact('user','roles','user_rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, $id)
    {   

        $user=User::findOrFail($id);
        $user->name=$request->get('name');
        $user->apellido=$request->get('apellido');
        $user->telefono=$request->get('telefono');
        //$user->password=bcrypt($request->get('password'));
        $user->email=$request->get('email');
        if (Input::hasFile('foto'))
            {
            $file=Input::file('foto');
            $file->move(public_path().'/imagenes/users/',$file->getClientOriginalName());
            $user->foto=$file->getClientOriginalName();
            }
        $user->update();

        $user->roles()->sync($request->get('roles'));

        $notificacion = "Los datos del usuario se actualizaron correctamente!";

        return Redirect::to('users')->with(compact('notificacion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();

        $notificacion = "El usuario fue eliminado con éxito!";

        return Redirect::to('users')->with(compact('notificacion'));
    }
}
