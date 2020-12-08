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
        // mengambil data user yang sedang login
        $user = Auth::user();
        // mengecek data user, karena hanya member/admin yang boleh berkunjung
        if($user==null)
            return view('auth.login');
        // mengecek data user, karena hanya member yang boleh menambah data cart
        if($user->user!=2)
            abort(403);
        // mengirim data user ke halaman cart
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
        // mengambil data user yang sedang login
        $user = Auth::user();
        // mengecek data user, karena hanya member/admin yang boleh berkunjung
        if($user==null)
            return view('auth.login');
        // mengecek data user, karena hanya member yang boleh menambah data cart
        if($user->user!=2)
            abort(403);
        // mengambil data dari table user
        $temp = Cart::where('user_id','=',$user->id)->where('pizza_id','=',$id)->get();
        // mengecek, apakah temp sudah ada atau belum
        //jika belum, akan dibuat data cart yang baru
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
        //jika sudah, akan diupdate dari data cart yang sudah ada
        else{
            $request->validate([
                'quantity' => 'required',
            ]);
            Cart::where('user_id','=',$user->id)->where('pizza_id','=',$id)->update([
                'quantity' => $temp[0]['quantity']+$request->quantity,
            ]);
        }
        // berpindah halaman ke halaman cart
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
        // mengambil data user yang sedang login
        $user = Auth::user();
        // mengecek data user, karena hanya member/admin yang boleh berkunjung
        if($user==null)
            return view('auth.login');
        // mengecek data user, karena hanya member yang boleh menambah data cart
        if($user->user!=2)
            abort(403);
        // mengecek quantity pizza yang dimasukan member
        $request->validate([
            'quantity' => 'required',
        ]);
        // memasukan data ke dalam database
        Cart::where('user_id','=',$user->id)->where('pizza_id','=',$id)->update([
            'quantity' => $request->quantity,
        ]);
        // berpindah halaman ke halaman cart
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
        // mengambil data user yang sedang login
        $user = Auth::user();
        // mengecek data user, karena hanya member/admin yang boleh berkunjung
        if($user==null)
            return view('auth.login');
        // mengecek data user, karena hanya member yang boleh menambah data cart
        if($user->user!=2)
            abort(403);
        // mendelete data pizza dari table cart sesuai id pizza dan sesuai dengan id user
        Cart::where('user_id','=',$user->id)->where('pizza_id','=',$id)->delete();
        // berpindah halaman ke halaman pizza
        return redirect('/cart');
    }
    
}
