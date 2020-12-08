<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Cart;
use App\Models\DetailTransaction;
use Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->user==1){
            $user = Transaction::all();
            return view('pizza.historyA',compact('user'));
        }
        else{
            return view('pizza.history', compact('user'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$price)
    {
        $user = Auth::user();
        $temp = Cart::where('user_id','=',$user->id)->get();
        // dd($temp);
        $transactionid = time() . $user->id;
        Transaction::create([
            'id' => $transactionid,
            'user_id' => $user->id,
            'totalprice' => $price,
        ]);
        foreach ($temp as $dt) {
            DetailTransaction::create([
                'transaction_id' => $transactionid,
                'pizza_id' => $dt->pizza_id,
                'quantity' => $dt->quantity,
            ]);
        }
        Cart::where('user_id','=',$user->id)->delete();
        return redirect('/transaction');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::where('id','=', $id)->first();
        // dd($transaction);
        return view('pizza.detailT', compact('transaction'));
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
