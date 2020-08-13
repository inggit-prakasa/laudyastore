@extends('layouts.master')

@section('title')
    <title>List Product</title>
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
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">List Produk</h4>
                            <a class="btn btn-primary btn-round ml-auto" href="/product/add">
                                <i class="fa fa-plus"></i>
                                Tambah Produk
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h3 class="modal-title">
                                            <span class="fw-mediumbold">
                                            Tambah Produk
                                            </span> 
                                        </h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/product/create" method='POST' enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label for = "name">Nama</label>
                                                        <input type="text" class="form-control" name="name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group form-group-default">
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
                                                    <div class="form-group form-group-default">
                                                        <label for="size">Ukuran</label>
                                                        <select class="form-control form-control-md" id="size" name="size">
                                                            <option>27</option>
                                                            <option>28</option>
                                                            <option>29</option>
                                                            <option>30</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group form-group-default">
                                                        <label for="category">Kategori</label>
                                                        <select class="form-control form-control-md" id="category" name="category">
                                                            <option>Hijab</option>
                                                            <option>Celana</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group form-group-default">
                                                        <label for ="price">Harga</label>
                                                        <input type="number" class="form-control" name="price">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group form-group-default">
                                                        <label for="description">Deskripsi</label>
                                                        <textarea class="form-control" id="description" rows="5" name="description"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group form-group-defult">
                                                        <label for="image">Gambar</label>
                                                        <input type="file" class="form-control" id="image" name="image">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                        
                                    <div class="modal-footer no-bd">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Warna</th>
                                        <th>Ukuran</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td><img src="{{ asset('storage/images/'. $product->image)}} " alt="Product" width="100px"></td>
                                            <td>{{ $product->name }} </td>
                                            <td>{{ $product->color }} </td>
                                            <td>{{ $product->size }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->price }} </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="/product/{{ $product->id }}/edit" class="btn btn-info btn-sm">EDIT</a>
                                                    <a href="/product/{{ $product->id }}/delete" class="btn btn-danger btn-sm">DELETE</a>
                                                </div>
                                            </td>
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
</div>
@endsection
