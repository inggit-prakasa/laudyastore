<?php

namespace App\Http\Controllers;

use App\Size;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class SizeController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $sizes = Size::all();

        return view('size.index',['sizes' => $sizes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view('size.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'size' => 'required',
        ]);

        Size::create($request->all());

        return redirect()->route('size.index')->with('status','Ukuran Berhasil Ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Size $size
     * @return Application|Factory|Response|View
     */
    public function edit(Size $size)
    {
        return view('size.edit',compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Size $size
     * @return RedirectResponse
     */
    public function update(Request $request, Size $size)
    {
        $request->validate([
            'size' => 'required',
        ]);

        $size->update($request->all());

        return redirect()->route('size.index')->with('status','Ukuran Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Size $size
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Size $size)
    {
        $size->delete();

        return redirect()->route('size.index')->with('status','Ukuran Berhasil dihapus');
    }
}
