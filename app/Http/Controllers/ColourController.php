<?php

namespace App\Http\Controllers;

use App\Colour;
use Illuminate\Http\Request;

class ColourController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add()
    {
        return view('color.add');
    }

    public function index()
    {
        $colors = Colour::all();
        return view('color.index',['colors' => $colors]);
    }

    public function create(Request $request)
    {
        $this -> validate($request, [
            'name' => 'required',
            'code' => 'required',
        ]);

        Colour::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect('/product/color')->with('status', 'Warna Berhasil Ditambahkan');
    }

    public function edit($id) {
        $color = Colour::find($id);

        return view('color.edit',['color' => $color]);
    }

    public function update(Request $request,$id) {
        $colorUpdate = Colour::find($id);
        $this -> validate($request, [
            'name' => 'required',
            'code' => 'required',
        ]);

        $colorUpdate->update($request->all());

        return redirect('/product/color')->with('status', 'Berhasil di perbarui');
    }

    public function delete($id)
    {
        $warna = Colour::find($id);
        $warna -> delete();

        return redirect('/product/color')->with('status','Warna berhasil di delete');
    }

}
