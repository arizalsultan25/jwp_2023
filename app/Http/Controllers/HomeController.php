<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listBarang = Barang::orderBy('nama_barang')->get();

        // View
        return view('index', [
            'listBarang' => $listBarang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi
        $credentials = $request->validate([
            'kode_barang' => ['required', 'min:8', 'max:16', 'unique:tb_barang,kode_barang,except,kode_barang'],
            'nama_barang' => ['required'],
            'jenis' => ['required'],
            'satuan' => ['required'],
            'merk' => ['required'],
            'produsen' => ['required'],
            'harga_beli' => ['required', 'numeric'],
        ], [
            'kode_barang.required' => 'Kode barang tidak boleh kosong',
            'kode_barang.unique' => 'Kode barang harus bersifat unik',
            'kode_barang.min' => 'Kode barang tidak boleh kurang dari 8 karakter',
            'kode_barang.max' => 'Kode barang tidak boleh melebihi 16 karakter',

            'nama_barang.required' => 'Status Pengakuan tidak boleh kosong',
            'jenis.required' => 'Jenis barang tidak boleh kosong',
            'satuan.required' => 'Satuan barang tidak boleh kosong',
            'merk.required' => 'Merk barang tidak boleh kosong',
            'produsen.required' => 'Produsen barang tidak boleh kosong',
            'harga_beli.required' => 'Harga beli tidak boleh kosong',
            'harga_beli.numeric' => 'Harga beli harus berupa angka',
        ]);

        // new data
        $newData = [
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'jenis' => $request->jenis,
            'satuan' => $request->satuan,
            'merk' => $request->merk,
            'produsen' => $request->produsen,
            'harga_beli' => $request->harga_beli,
        ];

        // Insert data ke database
        $insert = Barang::insert($newData);

        // Jika berhasil insert
        if ($insert) {
            // Arahkan ke halaman index
            return redirect()->to(route('barang.index'))->with('success', 'Data barang berhasil ditambahkan');
        }

        // Arahkan ke halaman index dengan pesan error
        return redirect()->back()->with('error', 'Data barang gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Check apakah data barang ada
        $barang = Barang::where('kode_barang', '=', $id)->first();

        // Jika tidak ada
        if (!$barang) {
            // Redirect ke halaman index
            return redirect(route('barang.index'))->with('error', 'Data tidak valid');
        }

        // Tampilkan halaman edit
        return view('edit', [
            'barang' => $barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi
        $credentials = $request->validate([
            'nama_barang' => ['required'],
            'jenis' => ['required'],
            'satuan' => ['required'],
            'merk' => ['required'],
            'produsen' => ['required'],
            'harga_beli' => ['required', 'numeric'],
        ], [
            'kode_barang.required' => 'Kode barang tidak boleh kosong',
            'kode_barang.unique' => 'Kode barang harus bersifat unik',
            'kode_barang.min' => 'Kode barang tidak boleh kurang dari 8 karakter',
            'kode_barang.max' => 'Kode barang tidak boleh melebihi 16 karakter',

            'nama_barang.required' => 'Status Pengakuan tidak boleh kosong',
            'jenis.required' => 'Jenis barang tidak boleh kosong',
            'satuan.required' => 'Satuan barang tidak boleh kosong',
            'merk.required' => 'Merk barang tidak boleh kosong',
            'produsen.required' => 'Produsen barang tidak boleh kosong',
            'harga_beli.required' => 'Harga beli tidak boleh kosong',
            'harga_beli.numeric' => 'Harga beli harus berupa angka',
        ]);

        // Check data barang
        $barang = Barang::where('kode_barang', '=', $id)->first();

        // Jika data tidak ditemukan
        if (!$barang) {
            // Arahkan ke halaman index dengan pesan error
            return redirect(route('barang.index'))->with('error', 'Data tidak valid');
        }

        // data baru
        $newData = [
            'nama_barang' => $request->nama_barang,
            'jenis' => $request->jenis,
            'satuan' => $request->satuan,
            'merk' => $request->merk,
            'produsen' => $request->produsen,
            'harga_beli' => $request->harga_beli,
        ];

        // Update data
        $update = Barang::where('kode_barang', '=', $id)->update($newData);

        // Jika berhasil di update
        if ($update) {
            // Arahkan ke halaman index
            return redirect()->to(route('barang.index'))->with('success', 'Data barang berhasil diperbarui');
        }

        // Arahkan ke halaman index dengan pesan error
        return redirect()->back()->with('error', 'Data barang gagal diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // Check jika ada id
        if (!$request->id) {
            // Response error
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'silahkan masukkan id',
                    'data' => []
                ]
            );
        }

        // Hapus
        $delete = Barang::where('kode_barang', '=', $request->id)->first();
        if ($delete) {
            $delete->where('kode_barang', '=', $request->id)->delete();

            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'Data berhasil dihapus',
                    'data' => $delete
                ]
            );
        }

        return response()->json(
            [
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
                'data' => []
            ]
        );
    }
}
