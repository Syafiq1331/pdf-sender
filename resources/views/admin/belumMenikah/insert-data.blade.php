@extends('layouts.auth', [
    'title' => 'Form Pendaftarana Belum Menikah',
    'headline' => 'Form Pendaftaran Belum Menikah',
])

@section('content')
    <div class="card card-primary">
        <div class="card-body">
            <form action="{{ route('storeDataFromUser') }}" method="POST" class="row">
                @csrf
                <div class="form-group col-md-6">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama"
                        required>
                </div>
                <div class="form-group col-md-6">
                    <label for="nik">NIK</label>
                    <input type="text" name="nik" class="form-control" id="nik" placeholder="Masukkan NIK"
                        required>
                </div>
                <div class="form-group col-md-6">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir"
                        placeholder="Masukkan Tempat Lahir" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" class="form-control" id="alamat" placeholder="Masukkan Alamat" required></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="no_whatsapp">No Whatsapp</label>
                    <input type="text" name="no_whatsapp" class="form-control" id="no_whatsapp"
                        placeholder="Masukkan No Whatsapp" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit Data</button>
            </form>
        </div>
    </div>
@endsection
