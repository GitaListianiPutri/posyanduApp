<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Pertumbuhan;
use App\Models\pesertaposyandu;
use App\Models\pesertaposyandus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function dashboard()
    {

        return view('dashboard');
    }

    public function index(Request $request)
    {
        // mengambil semua isi dari model pendaftaran
        $data = new Pendaftaran();

        if ($request->get('search')) {
            $data = $data->where('nik', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('nama', 'LIKE', '%' . $request->get('search') . '%');
        }

        // mengambil semua data
        $data = $data->get();

        // compact untuk menampilkan data
        return view('pendaftaran.index', compact('data', 'request'));
    }

    public function index2(Request $request) {
        // Mengambil semua data pendaftaran dengan relasi pertumbuhan
        $pendaftarans = Pendaftaran::with('pertumbuhan');
    
        // Jika ada pencarian, filter data berdasarkan kriteria pencarian
        if ($request->has('search')) {
            $keyword = $request->query('search');
            $pendaftarans->where(function($query) use ($keyword) {
                $query->where('nik', 'LIKE', '%'.$keyword.'%')
                      ->orWhere('nama', 'LIKE', '%'.$keyword.'%');
            });
        }
    
        // Ambil data setelah proses pencarian dan relasi
        $pendaftarans = $pendaftarans->get();
    
        // Kirim data ke view
        return view('pertumbuhan.index', compact('pendaftarans'));
    }
    
    

    public function create()
    {
        return view('pendaftaran.create');
    }

    public function create2()
    {
        $pendaftaran = Pendaftaran::all();
        return view('pertumbuhan.create', compact('pendaftaran'));
    }

    // method store
    public function store(Request $request)
    {

        $request->validate([
            'nik' => 'unique:pendaftarans|required|string|max:255',
            'nama' => 'required|string|max:255',
            'ortu' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|numeric',
            'lahir' => 'required|date',
        ]);

        // jika validasi gagal, maka akan kembali ke halaman sebelumnya dengan apa yg di input sebelumnya
        $pendaftaran = new Pendaftaran();
        $pendaftaran->nik = $request->input('nik');
        $pendaftaran->nama = $request->input('nama');
        $pendaftaran->ortu = $request->input('ortu');
        $pendaftaran->alamat = $request->input('alamat');
        $pendaftaran->no_telp = $request->input('no_telp');
        $pendaftaran->lahir = $request->input('lahir');
        $pendaftaran->save();


        // simpan ke database
        return redirect()->route('admin.index')->with('success', 'Data pendaftaran berhasil ditambahkan.');
    }

    public function store2(Request $request)
    {
        $request->validate([
            'pendaftaran_id' => 'required|exists:pendaftarans,id',
            'tb' => 'required|string|max:255',
            'bb' => 'required|string|max:255',
            'lk' => 'required|string|max:255',
            'catatan' => 'required|string|max:255',
            'tglposyandu' => 'required|date',
        ]);

        // jika validasi gagal, maka akan kembali ke halaman sebelumnya dengan apa yg di input sebelumnya
        $pertumbuhan = new Pertumbuhan();
        $pertumbuhan->pendaftaran_id = $request->input('pendaftaran_id');
        $pertumbuhan->tb = $request->input('tb');
        $pertumbuhan->bb = $request->input('bb');
        $pertumbuhan->lk = $request->input('lk');
        $pertumbuhan->catatan = $request->input('catatan');
        $pertumbuhan->tglposyandu = $request->input('tglposyandu');
        $pertumbuhan->save();


        // simpan ke database
        return redirect()->route('admin.index2')->with('success', 'Data pendaftaran berhasil ditambahkan.');
    }

    public function edit(Request $request, $id)
    {
        // mengambil data 
        $data = Pendaftaran::find($id);
        return view('pendaftaran.edit', compact('data'));
    }

    public function edit2(Request $request, $id)
    {
        $pertumbuhan = Pertumbuhan::with('pendaftaran')->findOrFail($id);
        return view('pertumbuhan.edit', compact('pertumbuhan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'ortu' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|numeric',
            'lahir' => 'required|date',
        ]);

        $find = Pendaftaran::find($id);

        $data = $request->only(['nama', 'ortu', 'alamat', 'no_telp', 'lahir']);

        // simpan ke database
        $find->update($data);
        // menampilkan
        return redirect()->route('admin.index');
    }

    public function update2(Request $request, $id)
    {
        $request->validate([
            'tb' => 'required|numeric',
            'bb' => 'required|numeric',
            'lk' => 'required|numeric',
            'catatan' => 'required',
            'tglposyandu' => 'required',
        ]);

        // Cari data pertumbuhan berdasarkan id
        $pertumbuhan = Pertumbuhan::findOrFail($id);

        // Update data pertumbuhan
        $pertumbuhan->update([
        'tb' => $request->tb,
        'bb' => $request->bb,
        'lk' => $request->lk,
        'catatan' => $request->catatan,
    ]);
        // menampilkan
        return redirect()->route('admin.index2');
    }
     


    public function delete(Request $request, $id)
    {
        $data = Pendaftaran::find($id);

        if ($data) {
            $data->delete();
            return redirect()->route('admin.index')->with('success', 'Data pendaftaran berhasil dihapus.');
        } else {
            return redirect()->route('admin.index')->with('error', 'Data pendaftaran tidak ditemukan.');
        }
    }

    public function delete2(Request $request, $id)
    {
        $data = Pertumbuhan::find($id);

        if ($data) {
            $data->delete();
            return redirect()->route('admin.index2')->with('success', 'Data pendaftaran berhasil dihapus.');
        } else {
            return redirect()->route('admin.index2')->with('error', 'Data pendaftaran tidak ditemukan.');
        }
    }

    public function detail(Request $request, $id) {
        $data = Pendaftaran::find($id);

        // Ambil rata-rata berat badan per bulan
            $beratbadan = Pertumbuhan::select(DB::raw('AVG(bb) as rata_bb'), DB::raw('MONTH(created_at) as bulan'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->pluck('rata_bb');

        // Ambil nama bulan yang sesuai
        $bulan = Pertumbuhan::select(DB::raw('MONTHNAME(created_at) as bulan'), DB::raw('MONTH(created_at) as month'))
            ->groupBy(DB::raw('MONTH(created_at)'), DB::raw('MONTHNAME(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->pluck('bulan');

        // Ubah $beratbadan dan $bulan menjadi array yang sesuai untuk grafik
        $beratbadanArray = $beratbadan->toArray();
        $bulanArray = $bulan->toArray();

        // Kirim variabel $beratbadanArray dan $bulanArray ke view
        return view('pendaftaran.detail', compact('data','beratbadanArray', 'bulanArray'));


     }

}
