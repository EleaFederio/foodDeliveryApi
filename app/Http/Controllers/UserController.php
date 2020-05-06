<?php

namespace App\Http\Controllers;

use App\Http\Resources\User\UserResource;
use App\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request)
    {

        $request->validate([
            'phoneNumber' => 'required|numeric|min:11',
            'password' => 'required',
        ]);

        $user = User::where('phoneNumber', $request->phoneNumber)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken('xxxx')->plainTextToken;
        return response()->json([
            'success' => true,
            'token' => $token,
            'customer' => new  UserResource($user),
        ]);
    }

    public function index()
    {
        //
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
        $validator = Validator::make($request->all(),[
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNumber' => 'required|numeric|min:11',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], Response::HTTP_UNAUTHORIZED);
        }
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $seller = User::create($input);
        $token = $seller->createToken('aaaaa')->plainTextToken;
        return response()->json([
            'success' => true,
            'token' => $token,
            'customer' => $seller
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
