@extends('layouts.auth', [
    'title' => 'Form Pendaftaran Surat Keterangan Tidak Mampu',
    'headline' => 'Form Pendaftaran Surat Keterangan Tidak Mampu',
])

@section('content')
    <div class="card card-primary">
        <div class="card-body">
            <form action="{{ route('storeDataFromUser') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="nik">NIK:</label>
                        <input type="text" class="form-control" id="nik" name="nik">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="tempat_lahir">Tempat Lahir:</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="tanggal_lahir">Tanggal Lahir:</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="jenis_kelamin">Jenis Kelamin:</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="agama">Agama:</label>
                        <input type="text" class="form-control" id="agama" name="agama">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="status">Status:</label>
                        <input type="text" class="form-control" id="status" name="status">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="dusun_tinggal">Dusun Tinggal:</label>
                        <input type="text" class="form-control" id="dusun_tinggal" name="dusun_tinggal">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="rt_rw">RT/RW:</label>
                        <input type="text" class="form-control" id="rt_rw" name="rt_rw">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="no_whatsapp">Nomor WhatsApp:</label>
                        <input type="text" class="form-control" id="no_whatsapp" name="no_whatsapp">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="status_surat">Status Surat:</label>
                        <select class="form-control" id="status_surat" name="status_surat">
                            <option value="ter-acc">Ter-acc</option>
                            <option value="pending">Pending</option>
                            <option value="ditolak">Ditolak</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="verifikasi">Verifikasi:</label>
                        <select class="form-control" id="verifikasi" name="verifikasi">
                            <option value="ter-verifikasi">Ter-verifikasi</option>
                            <option value="belum-verifikasi">Belum-verifikasi</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>

        </div>
    </div>
@endsection
