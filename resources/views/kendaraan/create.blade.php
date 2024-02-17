@extends('layouts.main')

@section('title')
    <title>{{ config('app.name') }} - Create</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('container')
    <div class="container">
        <h2 class="mt-4 mb-2">Tambah Kendaraan</h2>
    </div>
    <hr>

    <form method="post" action="{{ route('kendaraan.store') }}">
        @csrf
        <div class="col-lg-8">
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis</label>
                <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" name="jenis" value="{{ old('jenis') }}">
                @error('jenis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tahun_pembuatan" class="form-label">Tahun Pembuatan</label>
                <input type="number" class="form-control @error('tahun_pembuatan') is-invalid @enderror" id="tahun_pembuatan" name="tahun_pembuatan" value="{{ old('tahun_pembuatan') }}">
                @error('tahun_pembuatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                    <option value="1" selected>Tersedia</option>
                    <option value="0">Tidak Tersedia</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="mt-1">
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a class="btn btn-warning mx-2" href="{{ route('kendaraan.index') }}">Kembali</a>
        </div>
    </form>    

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

        // @if (Session::has('loginError'))
        // toastr.options = {
        //     "positionClass": "toast-top-right",
        // };
        // toastr.error("{{ Session::get('loginError') }}");
        // @endif
    </script>
@endsection
