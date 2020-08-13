@extends('layouts.master')

@section('title')
    <title>POS</title>
@endsection

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title"></h4>

            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">List Produk</h4>
                                <div class="col text-right">
                                    <select name="" id="" class="form-control from-control-sm" style="font-size: 12px">
                                        <option value="" holder>Filter Category</option>
                                        <option value="1">All Category...</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="text" name="search" class="form-control form-control-sm col-sm-12 float-right"
                                           placeholder="Search Product..." onblur="this.form.submit()">
                                </div>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary btn-sm float-right btn-block">
                                        Cari Product
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($products as $product)
                                    <div style="width: 20%;border:1px solid rgb(243, 243, 243)">
                                        <div class="productCard">
                                            <div class="view overlay">
                                                <form action="{{url('/transaction/addproduct', $product->id)}}" method="POST">
                                                    @csrf
                                                    @if($product->qty == 0)
                                                        <img class="card-img-top gambar" src="{{ asset('storage/images/'.$product->image) }}"
                                                             alt="Card image cap">
                                                        <button class="btn btn-primary btn-sm cart-btn disabled"><i
                                                                class="fas fa-cart-plus"></i></button>
                                                    @else
                                                        <img class="card-img-top gambar" src="{{ asset('storage/images/'.$product->image) }}"
                                                             alt="Card image cap" style="cursor: pointer"
                                                             onclick="this.closest('form').submit();return false;">
                                                        <button type="submit" class="btn btn-primary btn-sm cart-btn"><i
                                                                class="fas fa-cart-plus"></i></button>
                                                    @endif
                                                </form>
                                            </div>
                                            <div class="card-body">
                                                <label class="card-text text-center font-weight-bold"
                                                       style="text-transform: capitalize;">
                                                    {{ Str::words($product->name,4) }} ({{ $product->quantity }}) </label>
                                                <p class="card-text text-center">Rp. {{ number_format($product->price,2,',','.') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Keranjang</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama produk</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Sub total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $no=1
                                @endphp
                                @forelse($cart_data as $index=>$item)
                                    <tr>
                                        <td>
                                            <form action="{{url('/transaction/removeproduct',$item['itemId'])}}"
                                                  method="POST">
                                                @csrf
                                                {{$no++}} <br><a onclick="this.closest('form').submit();return false;"><i
                                                        class="fas fa-trash" style="color: rgb(134, 134, 134)"></i></a>
                                            </form>
                                        </td>
                                        <td>{{Str::words($item['name'],3)}} <br>Rp.
                                            {{ number_format($item['pricesingle'],2,',','.') }}
                                        </td>
                                        <td class="font-weight-bold">
                                            <form action="{{url('/transaction/decreasecart', $item['itemId'])}}"
                                                  method="POST" style='display:inline;'>
                                                @csrf
                                                <button class="btn btn-sm btn-info"
                                                        style="display: inline;padding:0.4rem 0.6rem!important"><i
                                                        class="fas fa-minus"></i></button>
                                            </form>
                                            <a style="display: inline">{{$item['qty']}}</a>
                                            <form action="{{url('/transaction/increasecart', $item['itemId'])}}"
                                                  method="POST" style='display:inline;'>
                                                @csrf
                                                <button class="btn btn-sm btn-primary"
                                                        style="display: inline;padding:0.4rem 0.6rem!important"><i
                                                        class="fas fa-plus"></i></button>
                                            </form>
                                        </td>
                                        <td class="text-right">Rp. {{ number_format($item['price'],2,',','.') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Empty Cart</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            <table class="table mt-5 table-borderless">
                                <tr>
                                    <th>Total</th>
                                    <th class="text-right font-weight-bold">Rp. {{ number_format($total,2,',','.') }}
                                    </th>
                                </tr>
                            </table>
                            <div class="row">
                                <div class="col-sm-4">
                                    <form action="{{ url('/transaction/clear') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-info btn-lg btn-block" style="padding:1rem!important"
                                                onclick="return confirm('Apakah anda yakin ingin meng-clear cart ?');"
                                                type="submit">Clear</button>
                                    </form>
                                </div>
                                <div class="col-sm-4">
                                    <a class="btn btn-primary btn-lg btn-block"
                                       style="padding:1rem!important" href="{{url('/transaction/history')}}" target="_blank">History</a>
                                </div>
                                <div class="col-sm-4">
                                    <form action="{{ url('/transaction/pay') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-success btn-lg btn-block" style="padding:1rem!important"
                                                data-toggle="modal" data-target="#fullHeightModalRight">Pay</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <style>
        .gambar {
            width: 100%;
            height: 175px;
            padding: 0.9rem 0.9rem
        }

        .cart-btn {
            position: absolute;
            display: block;
            top: 25%;
            /* right: 5%; */
            cursor: pointer;
            transition: all 0.3s linear;
            padding: 0.6rem 0.8rem !important;

        }

        .productCard {
            cursor: pointer;
        }

        .productCard:hover {
            border: solid 1px rgb(172, 172, 172);

        }

    </style>
@endpush
