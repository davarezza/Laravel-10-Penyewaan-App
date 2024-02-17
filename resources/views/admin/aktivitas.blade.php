@extends('layouts.main')

@section('title')
    <title>{{ config('app.name') }} - Aktivitas Log</title>
    <!-- Tambahkan CSS dan JS yang diperlukan di sini -->
@endsection

@section('container')
    <div class="container">
        <h2 class="mt-4 mb-2">Halaman Aktivitas Log</h2>
    </div>
    <hr>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('aktivitas.delete') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mb-3">Hapus Semua Aktivitas</button>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Pengguna</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Tindakan</th>
                            <th scope="col">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $activity)
                        <tr>
                            <td>{{ $activity->causer->name }}</td>
                            <td>{{ $activity->description }}</td>
                            <td>{{ $activity->log_name }}</td>
                            <td>{{ $activity->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Tambahkan script JS tambahan di sini jika diperlukan -->
@endsection
