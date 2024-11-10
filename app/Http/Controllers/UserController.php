<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userPaginate = User::with('description')->paginate(10);
        return response()->json($userPaginate);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create(['name'=>$request->name,'email'=>$request->email,'password'=>$request->password]);
       return response()->json(['name'=> $user]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $userWhere = User::with('description')->where('id',$id)->get();
        return response()->json(['user' => $userWhere]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
