@extends('layouts.master')

@section('title')
    <title>List Ukuran</title>
@endsection

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Ukuran</h4>
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
                        <a href="#">Ukuran</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">List Ukuran</h4>
                                <a class="btn btn-primary btn-round ml-auto" href="{{ route('size.create') }}">
                                    <i class="fa fa-plus"></i>
                                    Tambah Ukuran
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <table id="add-row" class="display table table-striped table-hover" >
                                <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Size</th>
                                    <th class="text-center" style="width: 150px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($sizes as $size)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $size->size }} </td>
                                        <td>
                                            <a href="{{ route('size.edit',$size->id) }}" class="btn btn-info btn-sm">EDIT</a>
                                            <form action="{{ route('size.destroy',$size->id) }}" class="form-button-action" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">DELETE</button>
                                            </form>
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
@endsection
