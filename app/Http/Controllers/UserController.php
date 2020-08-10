<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(2)->permissions();
        $usersRolePermissions = User::role()->get();
        dd($users);
            //enviar los roles y permisos asociaados a los usuarios.
        $roles = Role::get();
        $permissions = Permission::get();
        $userstrashed = User::orderBy('id', 'DESC')->onlyTrashed()->get();
        
        return [
            'pagination' => [
                'total'         => $users->total(),
                'current_page'  => $users->currentPage(),
                'per_page'      => $users->perPage(),
                'last_page'     => $users->lastPage(),
                'from'          => $users->firstItem(),
                'to'            => $users->lastItem(),
            ],
            'users' => $users,
            'userstrashed' => $userstrashed,
            'roles' => $roles,
            'permissions' => $permissions,
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if (isset($request)) {

            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required'
            ]);

            // create a new user object
            $user           = new User;
            $user->name     = $request->input('name');
            $user->email    = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->save();

            $user->roles()->sync($request->role);
            $user->roles()->sync($request->permissions);
            
                  
            return true;
       }

       return false; 
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        
        
        return $user ;
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
       if (isset($request)) {
            $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        User::find($id)->update($request->all());

        return true;
       }
      return false;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return true;
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $user = User::findOrFail($id);
        $user->restore();

        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function forcedelete($id)
    {
        $user = User::findOrFail($id);
        $user->forceDelete();

        return true;
    }


}
