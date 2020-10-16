<?php

namespace App\Http\Controllers;
use App\Product;
use App\HistoryProduct;
use App\Imports\ProductImport;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Excel;
use Response;
use Imgur;

class ProductController extends Controller
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

    public function dashboard()
    {
        $products = Product::all();
        $data['jumlahBarang'] = Product::count();
        $data['jumlahPasokan'] = Product::sum('quantity');
        $data['jumlahTransaksi'] = Transaction::count();
        $data['jumlahUser'] = User::count();

        return view('product.home',['products' => $products],['data' => $data]);
    }

    public function index()
    {
        $products = Product::all();
        return view('product.index',['products' => $products]);
    }

    public function add() {
        return view('product.add');
    }

    public function create(Request $request)
    {
        $requestData = $request->all();
        if($request->hasFile('image')) {
            $imageName = $request->image->getClientOriginalName();
            $file = $request->file('image');
            $new_gambar = time().$imageName;
            $request->image->storeAs('public/images', $new_gambar);
            $path = $request->image->store('media', 'public');
            $path2 = $file->move('upload',$file->getClientOriginalName());
            $imagelink = Imgur::upload($file);
            $requestData['image'] = $new_gambar;
        }
        $product = Product::create($requestData);
        HistoryProduct::create([
            'product_id' => $product->id,
            'user_id' => '1',
            'qty' => $request->quantity,
            'qtyChange' => 0,
            'tipe' => 'created product'
        ]);

        return redirect()->back()->with('success','Data Berhasil Disimpan');
    }

    public function edit($id) {
        $product = Product::find($id);
        $historyProducts = HistoryProduct::where('product_id',$id)->orderBy('created_at','desc')->get();

        return view('product.edit',['product' => $product,'historyProducts' => $historyProducts]);
    }

    public function update(Request $request,$id) {
        $requestData = $request->all();
        $productUpdate = Product::find($id);
        if($request->hasFile('image')) {
            $imageName = $request->image->getClientOriginalName();
            $new_gambar = time().$imageName;
            $request->image->storeAs('public/images', $new_gambar);
            $requestData['image'] = $new_gambar;
        }

        $newQuantity = $request->quantity + $request->newquantity;
        $history = HistoryProduct::create([
            'product_id' => $id,
            'user_id' => '1',
            'qty' => $request->quantity,
            'qtyChange' => $newQuantity,
            'tipe' => 'created product'
        ]);

        $requestData['quantity'] = $history->qtyChange;
        $productUpdate->update($requestData);
        return redirect('product');
    }

    public function delete($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect('product');
    }

    public function download()
    {
        $file= public_path(). "/download/Template.xlsx";

        return Response::download($file, 'Template.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new ProductImport,$file);



        return back()->withStatus('Import in queue, we will send notification after import finished.');
    }
}
