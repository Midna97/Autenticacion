<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request){
        $credential = $request->validate(['email'=>'required|email','password'=>'required']);
        $user = User::with('description')->where('email',$credential['email'])->first();

        if ($user && Hash::check($credential['password'], $user->password)) {
            $user->tokens()->delete();
            $token = $user->createToken('api')->plainTextToken;
            return response()->json(['token'=> $token,'user'=> $user]);
        }
        throw ValidationException::withMessages([
            'email' => 'Las credenciales no existen en nuestros registros',
        ]);

    }


    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
