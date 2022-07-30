<?php

namespace App\Http\Controllers;

use App\Http\Resources\Seller\SellerResource;
use App\Seller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

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
            'password' => 'required'
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

    public function update(Request $request, $id)
    {
//        $seller = Seller::find($id);
        $validator = Validator::make($request->all(),[
            "businessName" => "required|nullable",
            'firstName' => 'required',
            'lastName' => 'required',
            'middleName' => "string|max:255|nullable",
            'businessLogo' => "string|max:255|nullable",
            'profilePicture' => "string|nullable",
            'email' => "email:rfc,dns|nul lable",
            'address' => "string|max:255|nullable",
            'phoneNumber' => 'required|numeric|min:11',
            'long' => "numeric|between:-180,180|nullable",
            'lat' => "numeric|between:-90,90|nullable"
        ]);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], Response::HTTP_BAD_REQUEST);
        }
        $affected = DB::table('sellers')
            ->where('id', $id)
            ->update([
                'businessName' => $request->businessName,
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'middleName' => $request->middleName,
                'businessLogo' => $request->businessLogo,
                'profilePicture' => $request->profilePicture,
                'email' => $request->email,
                'address' => $request->address,
                'phoneNumber' => $request->phoneNumber,
                'long' => $request->long,
                'lat' => $request->lat
            ]);
        if($affected){
            return response()->json([
                'message' => 'Profile successfully updated!'
            ]);
        }
    }

    public function destroy(Seller $seller)
    {
        if(DB::table('sellers')->where('id', $seller->id)->delete()){
            return response()->json([
                'message' => 'Seller\'s account successfully deleted!'
            ]);
        }
//        return response()->json([
//            'message' => DB::table('sellers')->where('id', $seller->id)->delete();
//        ]);
    }
}
