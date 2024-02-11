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
                    <div class="col-md-6 my-2">
                        <label for="nama">Nama:</label>
                        <input type="text" id="nama" name="nama" class="form-control">
                    </div>

                    <div class="col-md-6 my-2">
                        <label for="nik">NIK:</label>
                        <input type="text" id="nik" name="nik" class="form-control">
                    </div>

                    <div class="col-md-6 my-2">
                        <label for="tempat_lahir">Tempat Lahir:</label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control">
                    </div>

                    <div class="col-md-6 my-2">
                        <label for="tanggal_lahir">Tanggal Lahir:</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control">
                    </div>

                    <div class="col-md-6 my-2">
                        <label for="alamat">Alamat:</label>
                        <input type="text" id="alamat" name="alamat" class="form-control">
                    </div>

                    <div class="col-md-6 my-2">
                        <label for="jenis_kelamin">Jenis Kelamin:</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="col-md-6 my-2">
                        <label for="nama_ayah">Nama Ayah:</label>
                        <input type="text" id="nama_ayah" name="nama_ayah" class="form-control">
                    </div>

                    <div class="col-md-6 my-2">
                        <label for="umur_ayah">Umur Ayah:</label>
                        <input type="text" id="umur_ayah" name="umur_ayah" class="form-control">
                    </div>

                    <div class="col-md-6 my-2">
                        <label for="pekerjaan_ayah">Pekerjaan Ayah:</label>
                        <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" class="form-control">
                    </div>

                    <div class="col-md-6 my-2">
                        <label for="penghasilan_ayah">Penghasilan Ayah:</label>
                        <input type="text" id="penghasilan_ayah" name="penghasilan_ayah" class="form-control">
                    </div>

                    <div class="col-md-6 my-2">
                        <label for="nama_ibu">Nama Ibu:</label>
                        <input type="text" id="nama_ibu" name="nama_ibu" class="form-control">
                    </div>

                    <div class="col-md-6 my-2">
                        <label for="umur_ibu">Umur Ibu:</label>
                        <input type="text" id="umur_ibu" name="umur_ibu" class="form-control">
                    </div>

                    <div class="col-md-6 my-2">
                        <label for="pekerjaan_ibu">Pekerjaan Ibu:</label>
                        <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" class="form-control">
                    </div>

                    <div class="col-md-6 my-2">
                        <label for="penghasilan_ibu">Penghasilan Ibu:</label>
                        <input type="text" id="penghasilan_ibu" name="penghasilan_ibu" class="form-control">
                    </div>

                    <div class="col-md-6 my-2">
                        <label for="no_whatsapp">Nomor WhatsApp:</label>
                        <input type="text" id="no_whatsapp" name="no_whatsapp" class="form-control">
                    </div>

                    <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-primary w-100">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
