<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class PendaftaranController extends Controller
{
    //index
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pendaftaran::select('no_pendaftaran','nama','alamat','tanggal_lahir','jenis_kelamin','agama_id',
            'asal_sekolah','nilai_ind','nilai_ipa','nilai_mtk')
            ->get();

           return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '
                <a href="'.route('pendaftaran.show',$row->no_pendaftaran).'" class="btn btn-primary btn-sm fa fa-eye"></a>
                <a href="'.route('pendaftaran.edit',$row->no_pendaftaran).'" class="edit btn btn-warning btn-sm fa fa-edit"></a> 
                <a href="'.route('pendaftaran.destroy',$row->no_pendaftaran).'" class="btn btn-danger btn-sm fa fa-trash"></a>';
                return $btn;
            })
            ->addColumn('total', function($row){
                $total = $row->nilai_ind+$row->nilai_ipa+$row->nilai_mtk;
                return $total;
            })
            ->rawColumns(['action','total'])
            ->make(true);
        }
        return view('pendaftaran.index');
    }

    //Create
    public function create()
    {
        $pendaftaran = new Pendaftaran();
        return view('pendaftaran.create', compact('pendaftaran'));
    }

    //Store
    public function store(Request $request)
    {   
        request()->validate(Pendaftaran::$rules);
        DB::beginTransaction();
        $total = Pendaftaran::select('*')->count();
        $num = sprintf("%'.04d\n", $total+1);
        $tahun = date('Y');
        $no =$tahun.$num;
        try{
            DB::table('daftar_siswa')->insert([
                'no_pendaftaran'=>$no,
                'nama'=>$request->nama,
                'alamat'=>$request->alamat,
                'tanggal_lahir'=>$request->tanggal_lahir,
                'jenis_kelamin'=>$request->jenis_kelamin,
                'asal_sekolah'=>$request->asal_sekolah,
                'agama_id'=>$request->agama_id,
                'nilai_ind'=>$request->nilai_ind,
                'nilai_ipa'=>$request->nilai_ipa,
                'nilai_mtk'=>$request->nilai_mtk,
            ]);
            DB::commit();
            return redirect()->route('pendaftaran.show',$no)
            ->with('success', 'Pendaftaran telah berhasil disimpan.');
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->route('pendaftaran.index')
            ->with('success', 'Pendaftaran dibatalkan semua, ada kesalahan...');
        }
    }

    //Edit
    public function edit($id)
    {
        $pendaftaran = Pendaftaran::find($id);
        return view('pendaftaran.edit', compact('pendaftaran'));
    }

    //Update
    public function update(Request $request,$id)
    {
        request()->validate(Pendaftaran::$rules);
        DB::beginTransaction();
        try{
            // $pendaftaran = Pendaftaran::find($id);
            DB::table('daftar_siswa')->where('no_pendaftaran',$id)->update([
                'nama'=>$request->nama,
                'alamat'=>$request->alamat,
                'tanggal_lahir'=>$request->tanggal_lahir,
                'jenis_kelamin'=>$request->jenis_kelamin,
                'asal_sekolah'=>$request->asal_sekolah,
                'agama_id'=>$request->agama_id,
                'nilai_ind'=>$request->nilai_ind,
                'nilai_ipa'=>$request->nilai_ipa,
                'nilai_mtk'=>$request->nilai_mtk,
            ]);
            DB::commit();
            return redirect()->route('pendaftaran.show',$id)
            ->with('success', 'Pendaftaran berhasil diubah');
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->route('pendaftaran.index')
            ->with('success', 'Pendaftaran batal diubah, ada kesalahan');
        }
    }

    //Show
    public function show($id)
    {
        $pendaftaran = Pendaftaran::find($id);
        return view('pendaftaran.show', compact('pendaftaran'));
    }
    
    //Destroy
    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            $pendaftaran = Pendaftaran::find($id)->delete();
            DB::commit();
            return redirect()->route('pendaftaran.index')
            ->with('success', 'pendaftaran berhasil dihapus');
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->route('pendaftaran.index')
            ->with('success', 'pendaftaran ada kesalahan hapus batal... ');
        }
    }
}
