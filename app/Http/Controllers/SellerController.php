<?php

namespace App\Http\Controllers;

use App\Http\Resources\Seller\SellerResource;
use App\Seller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SellerController extends Controller
{

    public function index()
    {
        return SellerResource::collection(Seller::all());
    }

    public function login(Request $request)
    {
        $request->validate([
            'phoneNumber' => 'required|numeric|min:11',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);

        $user = Seller::where('phoneNumber', $request->phoneNumber)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken('xxxx')->plainTextToken;
        return response()->json([
            'success' => true,
            'token' => $token,
            'customer' => $user
        ]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
//        return $request;
        $validator = Validator::make($request->all(),[
            "businessName" => "required",
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
        $seller = Seller::create($input);
        $token = $seller->createToken('aaaaa')->plainTextToken;
        return response()->json([
            'success' => true,
            'token' => $token,
            'customer' => $seller
        ]);
    }

    public function show(Seller $seller)
    {
        return new SellerResource($seller);
    }

    public function edit(Seller $seller)
    {
        //
    }

    public function update(Request $request, Seller $seller)
    {
        //
    }

    public function destroy(Seller $seller)
    {
        //
    }
}
