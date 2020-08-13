@extends('layouts.master')

@section('title')
    <title>Tambah Produk</title>
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
                    <a href="#">Produk</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Tambah Produk</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambah Product</div>
                    </div>
                    <div class="card-body">
                        <form action="/product/create" method='POST' enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for = "name">Nama</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group">
                                        <label for="color">Warna</label>
                                        <select class="form-control form-control-md" id="color" name="color">
                                            <option>Merah</option>
                                            <option>Kuning</option>
                                            <option>Hijau</option>
                                            <option>Ungu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="size">Ukuran</label>
                                        <select class="form-control form-control-md" id="size" name="size">
                                            <option>27</option>
                                            <option>28</option>
                                            <option>29</option>
                                            <option>30</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group">
                                        <label for="category">Kategori</label>
                                        <select class="form-control form-control-md" id="category" name="category">
                                            <option>Hijab</option>
                                            <option>Celana</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for ="quantity">Stok</label>
                                        <input type="number" class="form-control" name="quantity">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for ="price">Harga</label>
                                        <label>
                                            <input type="number" class="form-control" name="price">
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Deskripsi</label>
                                        <textarea class="form-control" id="description" rows="5" name="description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-group-defult">
                                        <label for="image">Gambar</label>
                                        <input type="file" class="form-control" id="image" name="image" accept="image/*"
                                        onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0]); document.getElementById('preview').style.display = 'none'">
                                        <br>
                                        <img id="output" src="" class="img-fluid" width="200px">
                                    </div>
                                </div>
                            </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
