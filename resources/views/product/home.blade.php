@extends('layouts.master')

@section('title')
    <title>Beranda</title>
@endsection

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="row row-card-no-pd">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-boxes text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="products">
                                        <p class="card-category">Jumlah Barang</p>
                                        <h4 class="card-title">{{ $data['jumlahBarang'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-box-open text-success"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Jumlah Pasokan</p>
                                        <h4 class="card-title">{{ $data['jumlahPasokan'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-exchange-alt text-danger"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Jumlah Transaksi</p>
                                        <h4 class="card-title">{{ $data['jumlahTransaksi'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-user-friends text-primary"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Jumlah User</p>
                                        <h4 class="card-title">{{ $data['jumlahUser'] }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="mr-auto p-2 card-title">List Produk</h4>
                                <button type="button" class="btn btn-info m-2" data-toggle="modal" data-target="#importExcel">
                                    <i class="fa fa-upload pr-2"></i>
                                    IMPORT EXCEL
                                </button>
                                <!-- Import Excel -->
                                <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form method="post" action="{{ route('product.import') }}" enctype="multipart/form-data">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                                </div>
                                                <div class="modal-body">
                                                    @csrf

                                                    <label>Pilih file excel</label>
                                                    <div class="form-group">
                                                        <input type="file" name="file" required="required">
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Import</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <a class="btn btn-secondary m-2" href="{{ route('product.download') }}">
                                    <i class="fa fa-download pr-2"></i>
                                    Download Template
                                </a>
                                <a class="btn btn-primary m-2" href="/product/add">
                                    <i class="fa fa-plus pr-2"></i>
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
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @if (isset($errors) && $errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                    <tr>
                                        <th>Barcode</th>
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
                                            <td><img src="{{ 'http://barcodes4.me/barcode/c128b/'. $product->id .'1234234.png' }}" height="100" alt="Product" class="p-2"></td>
                                            <td>{{ $product->name }} </td>
                                            <td>{{ $product->color }} </td>
                                            <td>{{ $product->size }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ 'Rp. ' . number_format($product->price, 2, ".", ",") }} </td>
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
