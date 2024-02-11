@extends('layouts.admin', ['title' => 'Tidak Mampu'])

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>No. WhatsApp</th>
                        <th>Status</th>
                        <th>Verifikasi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tidakMampu as $data)
                        <tr>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->nik }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->jenis_kelamin }}</td>
                            <td class="row align-items-center">
                                <a href="http://wa.me/{{ $data->no_whatsapp }}" target="_blank" rel="noopener noreferrer"
                                    title="Kirim pesan ke nomor berikut" data-toggle="tooltip">
                                    {{ $data->no_whatsapp }}
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('surat-keterangan-tidak-mampu.update_status', $data->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-control" onchange="this.form.submit()">
                                        <option value="ter-acc" {{ $data->status == 'ter-acc' ? 'selected' : '' }}>
                                            Ter-acc</option>
                                        <option value="pending" {{ $data->status == 'pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="ditolak" {{ $data->status == 'ditolak' ? 'selected' : '' }}>Ditolak
                                        </option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('surat-keterangan-tidak-mampu.update_verifikasi', $data->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="verifikasi" class="form-control" onchange="this.form.submit()">
                                        <option value="ter-verifikasi"
                                            {{ $data->verifikasi == 'ter-verifikasi' ? 'selected' : '' }}>
                                            Ter-verifikasi</option>
                                        <option value="belum-verifikasi"
                                            {{ $data->verifikasi == 'belum-verifikasi' ? 'selected' : '' }}>
                                            Belum-verifikasi</option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('surat-keterangan-tidak-mampu.generate_pdf_single', $data->id) }}"
                                    method="GET">
                                    <button type="submit" class="btn btn-secondary">Generate PDF</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
