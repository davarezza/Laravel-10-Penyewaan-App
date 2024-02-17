@extends('layouts.main')

@section('title')
    <title>{{ config('app.name') }} - Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('container')

    <div class="container">
        <h2 class="mt-4 mb-2">Halaman Grafik Kendaraan</h2>
    </div>
    <hr>

    <div id="grafikKendaraan" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        // Data grafik dari controller
        var dataGrafik = {!! $dataGrafik !!};

        // Membuat grafik menggunakan Highcharts
        Highcharts.chart('grafikKendaraan', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Grafik Pemakaian Kendaraan'
            },
            xAxis: {
                categories: dataGrafik.jenis,
                title: {
                    text: 'Jenis Kendaraan'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah'
                }
            },
            series: [{
                name: 'Jumlah',
                data: dataGrafik.jumlah
            }]
        });
    </script>

@endsection
