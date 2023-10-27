<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<br>
<div class="container" style="margin-left:auto; margin-right:auto; width: 50%;">
    <div class="card" style="width: auto;">
        <div class="card-header">
            <div style="display: flex;justify-content: space-between;align-items: center;">
                <span id="card_title" >
                    <h3>Nomor Pendaftaran Anda adalah {{ $pendaftaran->no_pendaftaran }}</h3>
                </span>
                <div class="float-right">
                    <h2><a href="{{ route('pendaftaran.index') }}" class="btn btn-primary btn-sm">Kembali</a></h2>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-borderless">
                <tr>
                    <td rowspan="10" style="width: 25%;"></td>
                    <td style="width: 200px;"><strong>No Pendaftaran</strong></td>
                    <td>: {{ $pendaftaran->no_pendaftaran }}</td> 
                </tr>
                <tr>
                    <td><strong>Nama</strong></td>
                    <td>: {{ $pendaftaran->nama }}</td>
                </tr>
                <tr>
                    <td><strong>Alamat</strong></td>
                    <td>: {{ $pendaftaran->alamat }}</td>
                </tr>
                <tr>
                    <td><strong>Tanggal Lahir </strong></td>
                    <td>: {{ $pendaftaran->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <td><strong>Jenis Kelamin </strong></td>
                    <td>: {{ $pendaftaran->jenis_kel=="L" ?"Laki-laki" : "Perempuan"}}</td>
                </tr>
                <tr>
                    <td><strong>Asal Sekolah </strong></td>
                    <td>: {{ $pendaftaran->asal_sekolah }}</td>
                </tr>
                <tr>
                    <td><strong>Agama </strong></td>
                    <td>: {{ $pendaftaran->getAgama() }}</td>
                </tr>
                <tr>
                    <td><strong>Nilai Indonesia </strong></td>
                    <td>: {{ $pendaftaran->nilai_ind }}</td>
                </tr>
                <tr>
                    <td><strong>Nilai IPA </strong></td>
                    <td>: {{ $pendaftaran->nilai_ipa }}</td>
                </tr>
                <tr>
                    <td><strong>Nilai MTK </strong></td>
                    <td>: {{ $pendaftaran->nilai_mtk }}</td>
                </tr>
            </table>
            </div>
        </div>
    </div>
</div>
