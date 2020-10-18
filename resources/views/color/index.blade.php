@extends('layouts.master')

@section('title')
    <title>List Warna</title>
@endsection

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Warna</h4>
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
                        <a href="#">Warna</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-6">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">List Warna</h4>
                                <a class="btn btn-primary btn-round ml-auto" href="./color/add">
                                    <i class="fa fa-plus"></i>
                                    Tambah Warna
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Code</th>
                                        <th class="text-center" style="width: 10%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($colors as $color)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $color->name }} </td>
                                            <td>{{ $color->code }} </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="/product/color/{{ $color->id }}/edit" class="btn btn-info btn-sm">EDIT</a>
                                                    <a href="/product/color/{{ $color->id }}/delete" class="btn btn-danger btn-sm">DELETE</a>
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
