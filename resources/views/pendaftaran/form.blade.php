 <table class="table table-borderless">
    <tr>
        <td><strong>Nama </strong></td>
        <td>{{ 
                Form::text('nama', $pendaftaran->nama, 
                ['class' => 'form-control'.($errors->has('nama') ? ' is-invalid' : ''),
                'placeholder' => 'Nama']) 
            }}
        </td>
    </tr>
    <tr>
        <td><strong>Alamat</strong></td>
        <td>{{ 
                Form::text('alamat', $pendaftaran->alamat,
                ['class' => 'form-control'.($errors->has('alamat') ? ' is-invalid' : ''),
                'placeholder' => 'Alamat']) 
            }}
        </td>
    </tr>
    <tr>
        <td><strong>Tanggal Lahir </strong></td>
        <td>{{
                Form::date('tanggal_lahir', $pendaftaran->tanggal_lahir,
                ['class' => 'form-control'.($errors->has('tanggal_lahir') ? ' is-invalid' : '')])
            }}
        </td>
    </tr>
    <tr>
        <td><strong>Jenis Kelamin </strong></td>
        <td>
            {!! Form::radio('jenis_kelamin', 'L', $pendaftaran->jenis_kelamin=="L" ? true : false) !!} Laki-Laki
            {!! Form::radio('jenis_kelamin', 'P', $pendaftaran->jenis_kelamin=="P" ? true : false) !!} Perempuan
        </td>
    </tr>
    <tr>
        <td><strong>Asal Sekolah </strong></td>
        <td>{{ 
                Form::text('asal_sekolah', $pendaftaran->asal_sekolah,
                ['class' => 'form-control'.($errors->has('asal_sekolah') ? ' is-invalid' : ''),
                'placeholder' => 'Asal Sekolah']) 
            }}
        </td>
    </tr>
    <tr>
        <td><strong>Agama </strong></td>
        <td>
            {{ 
                Form::select('agama_id',\App\Models\Pendaftaran::listAgama(), $pendaftaran->agama_id,
                ['class' => 'form-control'.($errors->has('agama_id') ? ' is-invalid' : ''),
                'placeholder' => '--Pilih--']) 
            }}
        </td>
    </tr>
    <tr>
        <td><strong>Nilai Indonesia </strong></td>
        <td>{{ 
                Form::number('nilai_ind', $pendaftaran->nilai_ind, 
                ['class' => 'form-control'.($errors->has('nilai_ind') ? ' is-invalid' : ''),
                'step'=>'any','placeholder' => '0-10']) 
            }}
        </td>
    </tr>
    <tr>
        <td><strong>Nilai IPA </strong></td>
        <td>{{ 
                Form::number('nilai_ipa', $pendaftaran->nilai_ipa, 
                ['class' => 'form-control'.($errors->has('nilai_ipa') ? ' is-invalid' : ''),
                'step'=>'any','placeholder' => '0-10'])
            }}
        </td>
    </tr>
    <tr>
        <td><strong>Nilai MTK </strong></td>
        <td>{{ 
                Form::number('nilai_mtk', $pendaftaran->nilai_mtk, 
                ['class' => 'form-control'.($errors->has('nilai_mtk') ? ' is-invalid' : ''),
                'step'=>'any','placeholder' => '0-10']) 
            }}
        </td>
    </tr>
</table>