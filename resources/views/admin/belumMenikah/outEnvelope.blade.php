@extends('layouts.admin', ['title' => 'Data Belum Menikah'])

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">NIK</th>
                        <th scope="col">No Whatsapp</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Status</th>
                        <th scope="col">Verifikasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($skBelumMenikahs as $skBelumMenikah)
                        <tr>
                            <td>{{ $skBelumMenikah->nama }}</td>
                            <td>{{ $skBelumMenikah->nik }}</td>
                            <td>
                                <a href="http://wa.me/{{ $skBelumMenikah->no_whatsapp }}" target="_blank"
                                    rel="noopener noreferrer">Send surat</a>
                            </td>
                            <td>{{ $skBelumMenikah->jenis_kelamin }}</td>
                            <td>{{ $skBelumMenikah->alamat }}</td>
                            <td>
                                <form
                                    action="{{ route('surat-keterangan-belum-menikah.update_status', $skBelumMenikah->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-control" onchange="this.form.submit()">
                                        <option value="ter-acc"
                                            {{ $skBelumMenikah->status == 'ter-acc' ? 'selected' : '' }}>Ter-acc</option>
                                        <option value="pending"
                                            {{ $skBelumMenikah->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="ditolak"
                                            {{ $skBelumMenikah->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <form
                                    action="{{ route('surat-keterangan-belum-menikah.update_verifikasi', $skBelumMenikah->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="verifikasi" class="form-control" onchange="this.form.submit()">
                                        <option value="ter-verifikasi"
                                            {{ $skBelumMenikah->verifikasi == 'ter-verifikasi' ? 'selected' : '' }}>
                                            Ter-verifikasi</option>
                                        <option value="belum-verifikasi"
                                            {{ $skBelumMenikah->verifikasi == 'belum-verifikasi' ? 'selected' : '' }}>
                                            Belum-verifikasi</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
