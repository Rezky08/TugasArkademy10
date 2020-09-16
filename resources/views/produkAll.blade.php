@extends('template')
@section('title',"Produk")

@section('main')
<div class="container vh-100 p-5">
    <div class="row justify-content-end">
        <div class="col-md-2">
            <a href="{{URL::to("/tambah")}}" class="btn btn-outline-primary">Tambah Produk</a>
        </div>
    </div>
    <div class="row">
        @foreach ($produk as $item)
            <div class="col-md-3 my-3">
                <div class="card" style="height: 300px">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="row justify-content-between align-items-start">
                                <div class="col-md-8">
                                    <h4>{{$item->nama_produk}}</h4>
                                </div>
                                <div class="col-md-4 text-right">
                                    <form action="{{URL::to('/hapus/'.$item->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            <div class="material-icons">delete</div>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <p class="card-text">{{Str::of($item->keterangan)->limit(50)}}</p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <h5 class="text-success my-3">Rp. {{number_format($item->harga,2,',','.')}}</h5>
                        <a href="{{URL::to("/detail/".$item->id)}}" class="btn btn-primary btn-block text-uppercase">Lihat Detail</a>
                        <a href="{{URL::to("/ubah/".$item->id)}}" class="btn btn-outline-primary btn-block text-uppercase">Ubah</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
