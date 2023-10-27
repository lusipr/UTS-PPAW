<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'daftar_siswa';
    protected $primaryKey = 'no_pendaftaran';
    static $rules = [
        'nama' => 'required',
        'alamat' => 'required',
        'tanggal_lahir' => 'required',
        'jenis_kelamin' => 'required',
        'asal_sekolah' => 'required',
        'agama_id' => 'required',
        'nilai_ind' => 'required|max:10',
        'nilai_ipa' => 'required|max:10',
        'nilai_mtk' => 'required|max:10',
    ];

    protected $fillable = [
        'nama',
        'alamat',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama_id',
        'asal_sekolah',
        'nilai_ind',
        'nilai_ipa',
        'nilai_mtk'
    ];

    static function listAgama()
    {
        return array(1 => 'Islam', 2 => 'Katholik', 3 => 'Protestan', 4 => 'Hindu', 5 => 'Budha', 6 => 'Konghucu');
    }

    public function getAgama()
    {
        if ($this->agama_id == "1")
            return "Islam";
        elseif ($this->agama_id == "2")
            return "Katholik";
        elseif ($this->agama_id == "3")
            return "Protistan";
        elseif ($this->agama_id == "4")
            return "Hindu";
        elseif ($this->agama_id == "5")
            return "Budha";
        elseif ($this->agama_id == "6")
            return "Konghucu";
        else
            return "Tidak diketahui";
    }
}
