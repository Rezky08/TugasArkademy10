<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    private $produk_model;
    function __construct()
    {
        $this->produk_model = new Produk();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = $this->produk_model->all();
        $data = [
            "produk" => $produk
        ];
        return view("produkAll", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            "title" => "Tambah Produk"
        ];
        return view("produkForm", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            "nama_produk" => ['required', 'unique:produk,nama_produk'],
            "harga" => ['required', 'numeric'],
            "jumlah" => ['required', 'numeric'],
            "keterangan" => []
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        try {
            $dataInsert = $request->except("_token");
            $dataInsert["created_at"] = new \DateTime;
            $res = $this->produk_model->insert($dataInsert);
            $response = [
                "success" => "berhasil menambahkan produk!"
            ];
            return redirect('/')->with($response);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = $this->produk_model->find($id);
        if (!$produk) {
            $message = [
                "error" => "Produk tidak ditemukan"
            ];
            return redirect('/')->with($message);
        }
        $data = [
            'title' => "Detail - " . $produk->nama_produk,
            'produk' => $produk,
        ];
        return view('produkDetail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk, $id)
    {
        $produk = $this->produk_model->find($id);
        if (!$produk) {
            $message = [
                "error" => "Produk tidak ditemukan"
            ];
            return redirect('/')->with($message);
        }
        $data = [
            "title" => "Ubah Produk",
            "produk" => $produk
        ];
        return view("produkForm", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'id' => ['required', 'exists:produk,id'],
            'nama_produk' => ['required', 'unique:produk,nama_produk,' . $id . ',id'],
            "harga" => ['required', 'numeric'],
            "jumlah" => ['required', 'numeric'],
            "keterangan" => []
        ];
        $validator = Validator::make($request->all() + ['id' => $id], $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $produk = $this->produk_model->find($id);
        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->jumlah = $request->jumlah;
        $produk->keterangan = $request->keterangan;
        try {

            $res = $produk->save();
            $response = [
                "success" => "berhasil mengubah produk!"
            ];
            return redirect('/')->with($response);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = $this->produk_model->find($id);
        if (!$produk) {
            $message = [
                "error" => "Produk tidak ditemukan"
            ];
            return redirect('/')->with($message);
        }
        try {
            $produk->delete();
            $response = [
                "success" => "berhasil menghapus produk!"
            ];
            return redirect('/')->with($response);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
