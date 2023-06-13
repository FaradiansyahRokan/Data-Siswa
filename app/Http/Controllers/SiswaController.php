<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{

    public function index(Request $request)
    {
        //  Membuat instance dari query builder untuk model Siswa.
        $siswas = Siswa::all();
        
        // Mendapatkan query string dari parameter sort dari request. Jika tidak ada, maka nilai default adalah nama.
        $sort = $request->input('sort') ?? 'nama';

        // Mendapatkan query string dari parameter order dari request. Jika tidak ada, maka nilai default adalah asc (ascending).
        $order = $request->input('order') ?? 'asc';

        // Mendapatkan query string dari parameter search dari request.
        $search = $request->input('search');
    
        // Melakukan pengurutan data siswa berdasarkan kolom yang diinginkan (nama, nis, atau kelas) dengan urutan yang ditentukan (asc atau desc).
        $siswa = Siswa::orderBy($sort, $order);

    
    
        // Melakukan filter data jika parameter search diisi dengan query string. Menggunakan where dan orWhere untuk mencari data siswa yang memiliki nama, nis, atau kelas yang mengandung query string yang dimasukkan.
        if ($search) {
            $siswa->where(function($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('kelas', 'like', '%' . $search . '%')
                    ->orWhere('nis', 'like', '%' . $search . '%');
            });
        }

        // Melakukan pagination dengan menampilkan 10 data siswa per halaman.
        $siswa = $siswa->paginate(10);
    
        // Mengembalikan view siswa.index dengan data $siswa, $sort, $order, dan $search.
        return view('siswa.index', compact('siswa', 'sort', 'order', 'search'))->with('siswa', $siswa);
        // return view ('siswa.index')->with('siswa', $siswas);
        
        
    }


    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        // Variabel $input akan menampung data yang dikirim oleh user melalui form. $request->all() digunakan untuk mengambil seluruh data yang dikirim oleh user dalam bentuk array.
        $input = $request->all();
        // memproses $input untuk di simpan ke dalam database. Method create() dari model Siswa digunakan untuk menyimpan data ke dalam database. Parameter yang diberikan adalah array $input, yang berisi seluruh data yang diinput oleh user.
        Siswa::create($input);

        // akan redirect ke halaman siswa , jika data sudah berhasil diterima oleh database.
        return redirect('siswa')->with('flash_message', 'Siswa Sudah Di Tambahkan!');
    }

    public function show(string $id)
    {
        //  mencari data siswa dengan id tertentu pada database.
        $siswa = Siswa::find($id);
        return view('siswa.show')->with('siswa', $siswa);
    }

    public function edit(string $id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.edit')->with('siswa', $siswa);
    }

    public function update(Request $request, string $id)
    {
        $siswa = Siswa::find($id);
        $input = $request->all();
        // memperbarui data di database dengan data baru yang di terima dari request
        $siswa->update($input);
        return redirect('siswa')->with('flash_message', 'Siswa Sudah Diperbarui!');  
    }

    
    public function destroy(string $id)
    {
        // menghapus id siswa berdasarkan primary-key
        Siswa::destroy($id);
        return redirect('siswa')->with('flash_message', 'Siswa Sudah Di Hapus!'); 
    }
}