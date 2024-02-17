@extends('layouts.main')

@section('title')
  <title>{{ config('app.name') }} - Home</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('container')
    
    <div class="container">
        <h2 class="mt-4 mb-2">Daftar Kendaraan</h2>
    </div><hr>
    
    <div class="justify-content-space-between">
        <a href="{{ route('kendaraan.create') }}" class="btn btn-info btn-tambah mb-2">Tambah Data</a>
    </div>        
    <table class="table table-bg-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Jenis</th>
                <th scope="col">Tahun Pembuatan</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kendaraan as $key => $data)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $data->jenis }}</td>
                    <td>{{ $data->tahun_pembuatan }}</td>
                    <td>
                        @if($data->status == 1)
                            Tersedia
                        @else
                            Tidak Tersedia
                        @endif
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('kendaraan.edit', $data->id) }}" class="btn btn-info">Edit</a>
                            <form action="{{ route('kendaraan.destroy', $data->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger mx-2">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        @if (Session::has('success'))
        toastr.options = {
            "positionClass": "toast-top-right",
        };
        toastr.success("{{ Session::get('success') }}");
        @endif

        // @if (Session::has('loginError'))
        // toastr.options = {
        //     "positionClass": "toast-top-right",
        // };
        // toastr.error("{{ Session::get('loginError') }}");
        // @endif
    </script>

@endsection
