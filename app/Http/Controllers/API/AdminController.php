<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdminResource;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role_id', 1)->get();

        return AdminResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
         $admin = User::create($request->validated());
         return new AdminResource([$admin]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return new AdminResource(($admin));
        $admin = User::where('id', $id)->first();
        return response()->json($admin);
        // dd ($data);
   

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
       
       
        $admin = User::create($request->validated());
        return new AdminResource(($admin));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        $admin->delete();
        return response()->noContent();
    }

    public function updateAdmin(Request $request)
    {
        // $admin = User::create($request->validated());
        // return new AdminResource(($admin));
        $admin = User::find($request->id);
        $admin->name = $request->name; 
        $admin->email = $request->email; 
        $admin->password = $request->password; 
        
        $admin = $admin->save();
    }
}
