<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<br>
<div class="container" style="margin-left:auto; margin-right:auto; width: 50%;">
    <div class="card" style="width: auto;">
        <div class="card-header">
            <div style="display: flex;justify-content: space-between;align-items: center;">
                <span id="card_title" >
                    <h3>Pendaftaran Siswa</h3>
                </span>
                <div class="float-right">
                    <h2><a href="{{ route('pendaftaran.index') }}" class="btn btn-primary btn-sm">Kembali</a></h2>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="{{ route('pendaftaran.store') }}"
                    role="form" enctype="multipart/form-data">
                    @csrf
                    @include('pendaftaran.form')
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"  style="width: 100%">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
