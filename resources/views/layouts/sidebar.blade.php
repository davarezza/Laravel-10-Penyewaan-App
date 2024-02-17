<nav class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 pb-lg-3 overflow-y-auto">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active text-dark" aria-current="page" href="{{ route('admin.home') }}">
              <i class='bx bxs-home'></i>
                Dashboard <b>{{ auth()->user()->role }}</b>
            </a>
            <hr>
        </li>
        <li class="nav-item">
            <a class="nav-link active text-dark" href="{{ route('pemesanan.index') }}"><i class='bx bxs-message-alt-detail'></i> Pemesanan</a>
        </li>
        @if(auth()->user()->role === 'admin')
            <li class="nav-item">
                <a class="nav-link active text-dark" href="{{ route('kendaraan.index') }}"><i class='bx bxs-car'></i> Kendaraan</a>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link active text-dark" href="#"><i class='bx bx-line-chart'></i> Grafik Kendaraan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active text-dark" href="#"><i class='bx bxs-report'></i> Laporan</a>
        </li><hr>
        <li class="nav-item">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="nav-link text-dark"><i class='bx bx-log-out'></i> Logout</button>
            </form>
        </li>
    </ul>
</nav>
