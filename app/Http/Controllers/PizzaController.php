<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;
use Illuminate\Support\Str;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pizzas = Pizza::all();
        return view('pizza.index', compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $request->validate([
            'name' => 'required|max:255|min:3',
            'description' => 'required|min:10',
            'price' => 'required|digits_between:5,6',
            'image' => 'required|mimes:jpeg,png,jpg',
        ]);
        $imgName = $request->image->getClientOriginalName() . '-' . time() . '.' . $request->image->extension();
        $request->image->move(public_path('image'), $imgName);
        Pizza::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imgName,
            'slug' => Str::slug($request->name,'-')
        ]);

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
        $pizza = Pizza::where('slug', $slug)->first();
        if($pizza == null)
            abort(404);

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
        $pizza = Pizza::find($id);
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
        $request->validate([
            'name' => 'required|max:255|min:3',
            'description' => 'required|min:10',
            'price' => 'required|digits_between:5,6',
            'image' => 'required|mimes:jpeg,png,jpg',
        ]);
        $imgName = $request->image->getClientOriginalName() . '-' . time() . '.' . $request->image->extension();
        $request->image->move(public_path('image'), $imgName);
        Pizza::find($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imgName
        ]);
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
        Pizza::find($id)->delete();
        return redirect('/pizza');
    }
}
