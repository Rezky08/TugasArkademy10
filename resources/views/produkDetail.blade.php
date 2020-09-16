@extends('template')

@section('title',$title)
@section('arrow_back',true)

@section('main')
    <div class="container vh-75 p-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title row justify-content-between">
                            <div class="col-md">
                                <h1>{{$produk->nama_produk}}</h1>
                            </div>
                            <div class="col-md text-right">
                                <a href="{{URL::to('/hapus/'.$produk->id)}}" class="btn btn-outline-danger">
                                    <i class="material-icons">delete</i>
                                </a>
                            </div>
                        </div>
                        <h3 class="text-success">Rp. {{number_format($produk->harga,2,',','.')}}</h3>
                        <p class="card-text">{{$produk->keterangan}}</p>
                        <a class="btn btn-block btn-primary text-uppercase" href="{{URL::to('/ubah/'.$produk->id)}}">ubah detail produk</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
