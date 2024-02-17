@extends('layouts.main')

@section('title')
  <title>{{ config('app.name') }} - Home</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('container')
    
    <div class="container">
        <h2 class="mt-4 mb-2">Selamat datang, {{ auth()->user()->name }}</h2>
    </div><hr>
    
    <div class="mt-2">
        <p class="text-dark">Selamat melaksanakan aktifitas di website penyewaan barang ini. Silahkan pergi ke halaman yang dicari dengan menggunakan navigasi di sebelah kiri</p>
    </div>

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
