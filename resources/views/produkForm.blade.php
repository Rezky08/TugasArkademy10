@extends('template')
@section('Title',$title)
@section('arrow_back',true)
@section('main')
    <div class="container-fluid vh-75 p-3">
        <div class="row justify-content-center">
            <div class="py-3 shadow-sm rounded col-md-5">
                <h3 class="mb-3">{{$title}}</h3>
                <form action="" method="POST">
                    @isset($produk)
                        @method('PUT')
                    @endisset
                    @csrf
                    <div class="form-group">
                      <label for="">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk"
                        @isset($produk)
                            value="{{old('nama_produk',$produk->nama_produk)}}"
                        @else
                            value="{{old('nama_produk')}}"
                        @endisset
                         >
                        @error('nama_produk')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" class="form-control" name="harga"
                                @isset($produk)
                                value="{{old('harga',$produk->harga)}}"
                                @else
                                    value="{{old('harga')}}"
                                @endisset
                                >
                                @error('harga')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jumlah Stok</label>
                                <input type="number" class="form-control" name="jumlah"
                                @isset($produk)
                                value="{{old('jumlah',$produk->jumlah)}}"
                                @else
                                    value="{{old('jumlah')}}"
                                @endisset
                                >
                                @error('jumlah')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                              </div>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="">Keterangan</label>
                      <textarea style="resize: none" class="form-control" name="keterangan">@isset($produk) {{old('keterangan',$produk->keterangan)}}@else{{old('keterangan')}}@endisset</textarea>
                    </div>
                    <button class="btn btn-block btn-lg btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
