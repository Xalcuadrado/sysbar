<?php

namespace sysbar\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sysbar\Http\Requests\UserFormRequest;
use Caffeinated\Shinobi\Models\Role;
use DB;
use sysbar\User;

class PerfilController extends Controller
{
    public function show(User $user)
    {
        $roles = Role::get();
        $user_rol = DB::table('role_user')->get();
        return view('perfil.show', compact('user','roles','user_rol'));
    }

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

        return back();
    }

    public function cambiarpassword(Request $request, $id)
    {
    	
    }
}
