<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // dd($user);
        return view('pizza.cart', compact('user'));
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
        $user = Auth::user();
        $temp = Cart::where('user_id','=',$user->id)->where('pizza_id','=',$id)->get();
        if($temp->isEmpty()){
            $request->validate([
                'quantity' => 'required',
            ]);
            Cart::create([
                'user_id' => $user->id,
                'pizza_id' => $id,
                'quantity' => $request->quantity,
            ]);
        }
        else{
            $request->validate([
                'quantity' => 'required',
            ]);
            Cart::where('user_id','=',$user->id)->where('pizza_id','=',$id)->update([
                'quantity' => $temp[0]['quantity']+$request->quantity,
            ]);
        }
        return redirect('/cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $request->validate([
            'quantity' => 'required',
        ]);
        $user = Auth::user();
        Cart::where('user_id','=',$user->id)->where('pizza_id','=',$id)->update([
            'quantity' => $request->quantity,
        ]);

        return redirect('/cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        Cart::where('user_id','=',$user->id)->where('pizza_id','=',$id)->delete();
        return redirect('/cart');
    }
}
