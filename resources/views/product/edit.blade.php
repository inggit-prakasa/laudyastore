@extends('layouts.master')

@section('title')
    <title>Edit Produk</title>
@endsection

@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Produk</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Product</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Produk</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Produk</div>
                    </div>
                    <div class="card-body">
                        <form action="/product/{{ $product->id }}/update" method='POST' enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for = "name">Nama</label>
                                        <input type="text" class="form-control" name="name" value="{{ $product->name }} ">
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group">
                                        <label for="color">Warna</label>
                                        <select class="form-control form-control-md" id="color" name="color">
                                            <option value="merah" {{ strtolower($product->color) == "merah" ? 'selected' : '' }} >Merah</option>
                                            <option value="kuning" {{ strtolower($product->color) == "kuning" ? 'selected' : '' }} >Kuning</option>
                                            <option value="hijau" {{ strtolower($product->color) == "hijau" ? 'selected' : '' }} >Hijau</option>
                                            <option value="ungu" {{ strtolower($product->color) == "ungu" ? 'selected' : '' }} >Ungu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="size">Ukuran</label>
                                        <select class="form-control form-control-md" id="size" name="size">
                                            <option value="27" {{ $product->size == 27 ? 'selected' : '' }}>27</option>
                                            <option value="28" {{ $product->size == 28 ? 'selected' : '' }}>28</option>
                                            <option value="29" {{ $product->size == 29 ? 'selected' : '' }}>29</option>
                                            <option value="30" {{ $product->size == 30 ? 'selected' : '' }}>30</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group">
                                        <label for="category">Kategori</label>
                                        <select class="form-control form-control-md" id="category" name="category">
                                            <option value="hijab" {{ strtolower($product->category) == "hijab" ? 'selected' : '' }} >Hijab</option>
                                            <option value="celana" {{ strtolower($product->category) == "celana" ? 'selected' : '' }}>Celana</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for ="quantity">Stok</label>
                                        <input type="number" class="form-control" name="quantity" value="{{ $product->quantity }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group">
                                        <label for ="price">Harga</label>
                                        <input type="number" class="form-control" name="price" value="{{ (double)$product->price }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for ="newquantity">Tambah/Kurangi (+/-) Stok</label>
                                        <input type="number" class="form-control" name="newquantity" value="0">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Deskripsi</label>
                                        <textarea class="form-control" id="description" rows="5" name="description">{{ $product->description}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-group-defult">
                                        <label for="image">Gambar</label>
                                        <input type="file" class="form-control" id="image" name="image" accept="image/*"
                                        onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0]); document.getElementById('preview').style.display = 'none'">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <img id="output" src="" class="img-fluid" width="200px">
                                    <img src="{{ asset('storage/images/' . $product->image)}} " class="img-fluid" alt="image" width="200px" id='preview'>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row row-card-no-pd">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">History Produk</div>
                    </div>
                    <div class="card-body">
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Perubahan Stok</th>
                                    <th scope="col">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($historyProducts as $index=>$historyProduct)
                                <tr>
                                    <td> {{ $index+1 }} </td>
                                    <td> {{ $product->name }} </td>
                                    <td> {{ $historyProduct->user_id }} </td>
                                    <td> {{ $historyProduct->qty }} </td>
                                    <td> {{ $historyProduct->qtyChange }} </td>
                                    <td> {{ $historyProduct->tipe }} </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection