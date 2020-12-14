<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PizzaController extends Controller
{
    
    public function search(Request $request)
    {
		// menyimpan data pencarian
		$search = $request->search;
 
    	// mengambil data dari table pizza sesuai pencarian data
		$pizzas = Pizza::
		where('name','like',"%".$search."%")
		->paginate(5);
 
    	// mengirim data pizza ke view index
		return view('pizza.index',compact('pizzas'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// mengambil data dari table pizza
        $pizzas = Pizza::paginate(5);
        
    	// mengirim data pizza ke view index
        return view('pizza.index', compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	// mengecek data user, karena hanya admin yang boleh menambah data pizza baru
        if(Auth::user()->user!=1)
            abort(403);
        return view('pizza.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // mengecek data user, karena hanya admin yang boleh menambah data pizza baru
        if(Auth::user()->user!=1)
            abort(403);
        // mengecek data baru pizza yang dimasukan admin
        $request->validate([
            'name' => 'required|max:255|min:3',
            'description' => 'required|min:10',
            'price' => 'required|numeric|digits_between:5,6',
            'image' => 'required|mimes:jpeg,png,jpg',
        ]);
        // membuat nama custom image
        $imageName = Str::slug($request->name,'-') . '-' . time() . '.' . $request->image->extension();
        // menyimpan image ke folder public->image
        $request->image->move(public_path('img'), $imageName);
        // memasukan data ke dalam database
        Pizza::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imageName,
            'slug' => Str::slug($request->name,'-')
        ]);

        // berpindah halaman ke halaman pizza
        return redirect('/pizza');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
    	// mengambil data dari table pizza
        $pizza = Pizza::where('slug', $slug)->first();
    	// mengecek apakah data pizza tersedia atau tidak
        if($pizza == null)
            abort(404);
    	// mengirim data pizza ke halaman detail
        return view('pizza.detail', compact('pizza'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // mengecek data user, karena hanya admin yang boleh mengedit data pizza
        if(Auth::user()->user!=1)
            abort(403);
        // mengambil data dari table pizza sesuai id pizza
        $pizza = Pizza::find($id);
    	// mengirim data pizza ke halaman edit
        return view('pizza.edit', compact('pizza'));
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
        // mengecek data user, karena hanya admin yang boleh update data pizza
        if(Auth::user()->user!=1)
            abort(403);
        // mengecek data pizza yang diedit admin
        $request->validate([
            'name' => 'required|max:255|min:3',
            'description' => 'required|min:10',
            'price' => 'required|numeric|digits_between:5,6',
            'image' => 'mimes:jpeg,png,jpg',
        ]);
        if($request->image!=null){
            // membuat nama custom image
            $imgName = Str::slug($request->name,'-') . '-' . time() . '.' . $request->image->extension();
            // menyimpan image ke folder public->image
            $request->image->move(public_path('img'), $imgName);
            // memasukan data ke dalam database
            Pizza::find($id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $imgName
            ]);
        }
        else{
            // memasukan data yang tanpa gambarnya
            Pizza::find($id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price
            ]);
        }
        
        // berpindah halaman ke halaman pizza
        return redirect('/pizza');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // mengecek data user, karena hanya admin yang boleh delete data pizza
        if(Auth::user()->user!=1)
            abort(403);
        // mendelete data dari table pizza sesuai id pizza
        Pizza::find($id)->delete();
        // berpindah halaman ke halaman pizza
        return redirect('/pizza');
    }
}
