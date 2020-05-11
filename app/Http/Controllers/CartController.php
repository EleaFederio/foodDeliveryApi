<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Resources\User\UserViewCart;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return UserViewCart::collection(User::find($id)->carts);
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
    public function store(Request $request, $id)
    {

        $validator = Validator::make($request->all(),[
            'food_id' => 'required|numeric',
            'user_id' => 'required|numeric',
            'quantity' => 'required|numeric'
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], Response::HTTP_UNAUTHORIZED);
        }

        $bbb = User::find($id)->carts->where('food_id', $request->food_id)->where('user_id', $request->user_id)->first();
        if($bbb){
            $foodQuantityCount = $bbb->quantity;
            $bbb->quantity = $foodQuantityCount + 1;
            $bbb->save();
            print_r($bbb);
        }else{
//            $request->quantity = 1;
            if(Cart::create($request->all())){
                return response()->json([
                    'success' => true,
                ]);
            }
        }


//


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
