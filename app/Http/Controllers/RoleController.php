<?php

namespace sysbar\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Support\Facades\Redirect;
use DB;

class RoleController extends Controller
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
            $roles=DB::table('roles')
            ->where('name','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(10);
            return view('roles.index',["roles"=>$roles,"searchText"=>$query]);
        }
    }

        public function create()
    {
        $permissions = permission::get();

        return view("roles.create", compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $role = Role::create($request->all());

        $role->permissions()->sync($request->get('permissions'));

        $notificacion = "El nuevo registro de rol se realizó con éxito!";

        return redirect()->route('roles.index')->with(compact('notificacion'));
    }

    public function show(Role $role)
    {
        $permissions = Permission::get();

        return view('roles.show', compact('role','permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::get();

        return view('roles.edit', compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {   
        $role->update($request->all());

        $role->permissions()->sync($request->get('permissions'));

        $notificacion = "Los datos del rol se actualizaron correctamente!";

        return Redirect::to('roles')->with(compact('notificacion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();

        $notificacion = "El rol fue eliminado con éxito!";

        return Redirect::to('roles')->with(compact('notificacion'));
    }
}
