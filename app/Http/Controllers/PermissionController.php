<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::orderBy('id', 'DESC')->paginate(2);
        $permissionstrashed = Permission::orderBy('id', 'DESC')->onlyTrashed()->get();

        return [
            'pagination' => [
                'total'         => $permissions->total(),
                'current_page'  => $permissions->currentPage(),
                'per_page'      => $permissions->perPage(),
                'last_page'     => $permissions->lastPage(),
                'from'          => $permissions->firstItem(),
                'to'            => $permissions->lastItem(),
            ],
            'permissions' => $permissions,
            'permissionstrashed' => $permissionstrashed
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
                'slug' => 'required',
                'description' => 'required'
            ]);

            // create a new Permission object
            $permission           = new Permission;
            $permission->name     = $request->input('name');
            $permission->slug    = $request->input('slug');
            $permission->description = bcrypt($request->input('description'));
            $permission->save();

            $role->roles()->sync($request->users);
            $role->roles()->sync($request->roles);
            
                  
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
        $permission = Permission::find($id);
        return $permission;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::find($id);
        return $permission ;
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
            'slug' => 'required',
            'description' => 'required'
        ]);

        Permission::find($id)->update($request->all());

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
        $permission = Permission::findOrFail($id);
        $permission->delete();

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
        $permission = Permission::findOrFail($id);
        $permission->restore();

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
        $permission = Permission::findOrFail($id);
        $permission->forceDelete();
        
        return true;
    }
}
