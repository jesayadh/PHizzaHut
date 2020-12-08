<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Cart;
use App\Models\DetailTransaction;
use Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mengambil data user yang sedang login
        $user = Auth::user();
        if($user==null)
            return view('auth.login');
        if($user->user==1){
            // mengambil semua data dari table Transaction, khusus untuk admin
            $user = Transaction::paginate(5);
            // mengirim data transaction ke halaman historyA
            return view('pizza.historyA',compact('user'));
        }
        else{
            // mengirim data ke halaman history
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
        // mengambil data user yang sedang login
        $user = Auth::user();
        // mengecek data user, karena hanya member/admin yang boleh berkunjung
        if($user==null)
            return view('auth.login');
        // mengecek data user, karena hanya member yang boleh menambah data cart
        if($user->user!=2)
            abort(403);
    	// mengambil data dari table user
        $temp = Cart::where('user_id','=',$user->id)->get();
        // membuat id custom untuk id transaction
        $transactionid = time() . $user->id;
        // memasukan data ke dalam database
        Transaction::create([
            'id' => $transactionid,
            'user_id' => $user->id,
            'totalprice' => $price,
        ]);
        // memasukan data ke dalam database
        foreach ($temp as $dt) {
            DetailTransaction::create([
                'transaction_id' => $transactionid,
                'pizza_id' => $dt->pizza_id,
                'quantity' => $dt->quantity,
            ]);
        }
        // menghapus data yang ada di cart yang sudah masuk ke database transaction
        Cart::where('user_id','=',$user->id)->delete();
        
        // berpindah halaman ke halaman transaction
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
        // mengambil data user yang sedang login
        $user = Auth::user();
        // mengecek data user, karena hanya member/admin yang boleh berkunjung
        if($user==null)
            return view('auth.login');
        // mengecek data user, karena hanya member yang boleh menambah data cart
        if($user->user!=2)
            abort(403);
        // mengambil data dari table transaction sesuai id transaction
        $transaction = Transaction::where('id','=', $id)->first();
    	// mengirim data transaction ke halaman detailT
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
