@extends('layouts.main')

@section('title')
    <title>{{ config('app.name') }} - Pemesanan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('container')

    <div class="container">
        <h2 class="mt-4 mb-2">Halaman Pemesanan</h2>
    </div>
    <hr>

    <div class="justify-content-space-between">
        @if (auth()->user()->role === 'admin')
        <a href="{{ route('pemesanan.create') }}" class="btn btn-info btn-tambah mb-2">Tambah Data</a>
        <a href="#" class="btn btn-primary btn-tambah mb-2">Laporan Pemesanan</a>
        @endif
        @if (auth()->user()->role === 'approver')
        <a href="#" class="btn btn-primary btn-tambah mb-2 mx-2">Laporan Pemesanan</a>
        @endif
    </div>
    <table class="table table-bg-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Jenis</th>
                <th scope="col">Tanggal Pemesanan</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pemesanan as $key => $data)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $data->kendaraan->jenis }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->tanggal_pemesanan)->format('d/m/y') }}</td>
                    <td>
                        @if($data->status == 1)
                            Diajukan
                        @elseif($data->status == 0)
                            Ditolak
                        @elseif($data->status == 2)
                            Disetujui
                        @endif
                    </td>
                    <td>
                        {{-- Tombol Setujui dan Tolak hanya untuk Approver --}}
                        @if(auth()->user()->role === 'approver')
                            <form action="{{ route('pemesanan.approve', $data->id) }}" method="post">
                                @csrf
                                @method('patch')
                                {{-- Tombol Setujui --}}
                                <button type="submit" name="status" value="2" class="btn btn-success">Setujui</button>
                                {{-- Tombol Tolak --}}
                                <button type="submit" name="status" value="0" class="btn btn-danger">Tolak</button>
                            </form>
                        {{-- Tombol Edit dan Delete hanya untuk Admin --}}
                        @elseif(auth()->user()->role === 'admin')
                            <a href="{{ route('pemesanan.edit', $data->id) }}" class="btn btn-info">Edit</a>
                            <form action="{{ route('pemesanan.destroy', $data->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger mx-2">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        @if (Session::has('success'))
            toastr.options = {
            "positionClass": "toast-top-right",
            };
            toastr.success("{{ Session::get('success') }}");
        @endif
    </script>

@endsection
