<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupportRequest;
use App\Http\Resources\SupportResource;
use App\Models\User;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role_id', 2)->get();

        return SupportResource::collection($users);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupportRequest $request)
    {
        $support = User::create($request->validated());
        return new SupportResource([$support]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
             $support = User::where('id', $id)->first();
             return response()->json($support);
         
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $support)
    {
        $support->delete();
        return response()->noContent();
    }

    public function updateSupport(Request $request)
    {
        // $admin = User::create($request->validated());
        // return new AdminResource(($admin));
        $user = User::find($request->id);
        $user->name = $request->name; 
        $user->email = $request->email; 
        $user->password = $request->password; 
        
        $user = $user->save();
    }
    

    
}
