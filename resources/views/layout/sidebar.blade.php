<aside class="left-sidebar">
  <!-- Sidebar scroll-->
  <div>
    <div class="brand-logo d-flex align-items-center justify-content-between">
      <!-- <a href="./" class="text-nowrap logo-img"> -->
      <img src="{{asset('assets/images/logos/loyy.png')}}" width="180" alt="" />
      </a>
      <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
        <i class="ti ti-x fs-8"></i>
      </div>
    </div>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
      <ul id="sidebarnav">
        @if(Auth::user()->role == 'admin')
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Home</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('dashboard.home') }}" aria-expanded="false">
            <span>
              <i class="ti ti-home-heart"></i>
            </span>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">FROM MASTER</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('ruangs.index') }}" aria-expanded="false">
            <span>
              <i class="ti ti-smart-home"></i>
            </span>
            <span class="hide-menu">Ruang</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('kelass.index') }}" aria-expanded="false">
            <span>
              <i class="ti ti-school"></i>
            </span>
            <span class="hide-menu">Kelas</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('jabatans.index') }}" aria-expanded="false">
            <span>
              <i class="ti ti-cards"></i>
            </span>
            <span class="hide-menu">Jabatan</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('siswas.index') }}" aria-expanded="false">
            <span>
              <i class="ti ti-woman"></i>
            </span>
            <span class="hide-menu">Siswa</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('karyawans.index') }}" aria-expanded="false">
            <span>
              <i class="ti ti-friends"></i>
            </span>
            <span class="hide-menu">Karyawan</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('barangs.index') }}" aria-expanded="false">
            <span>
              <i class="ti ti-shopping-cart"></i>
            </span>
            <span class="hide-menu">Barang</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('barangmasuks.index') }}" aria-expanded="false">
            <span>
              <i class="ti ti-shopping-cart-plus"></i>
            </span>
            <span class="hide-menu">Barang Masuk</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('barangkeluars.index') }}" aria-expanded="false">
            <span>
              <i class="ti ti-shopping-cart-off"></i>
            </span>
            <span class="hide-menu">Barang Keluar</span>
          </a>
        </li>
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">LAPORAN</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('siswas.cetak') }}" aria-expanded="false">
            <span>
              <i class="ti ti-news"></i>
            </span>
            <span class="hide-menu">Data Siswa dan Karyawan</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('barangkeluars.cetak') }}" aria-expanded="false">
            <span>
              <i class="ti ti-news"></i>
            </span>
            <span class="hide-menu">Laporan Barang</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('peminjamansiswas.cetak') }}" aria-expanded="false">
            <span>
              <i class="ti ti-news"></i>
            </span>
            <span class="hide-menu">Laporan Transaksi</span>
          </a>
        </li>
        @elseif (Auth::user()->role == 'petugas')
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Home</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('dashboard.home') }}" aria-expanded="false">
            <span>
              <i class="ti ti-home-heart"></i>
            </span>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">TRANSAKSI</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('peminjamansiswas.index') }}" aria-expanded="false">
            <span>
              <i class="ti ti-news"></i>
            </span>
            <span class="hide-menu">Peminjaman Siswa</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('peminjamankaryawans.index') }}" aria-expanded="false">
            <span>
              <i class="ti ti-news"></i>
            </span>
            <span class="hide-menu">Peminjaman Karyawan</span>
          </a>
        </li>
        <!-- <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('peminjamansiswas.cetak') }}" aria-expanded="false">
            <span>
              <i class="ti ti-news"></i>
            </span>
            <span class="hide-menu">Laporan</span>
          </a>
        </li> -->
        @else
        @endif

        <!-- <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Pilihan Dropdown</span>
        </li> -->
        <!-- <li class="sidebar-item">
            <select class="form-select" aria-label="Pilih Opsi">
                <option value="1">Opsi 1</option>
                <option value="2">Opsi 2</option>
                <option value="3">Opsi 3</option>
            </select>
        </li> -->

        <!-- <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">EXTRA</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="./icon-tabler.html" aria-expanded="false">
            <span>
              <i class="ti ti-mood-happy"></i>
            </span>
            <span class="hide-menu">Icons</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
            <span>
              <i class="ti ti-aperture"></i>
            </span>
            <span class="hide-menu">Sample Page</span>
          </a>
        </li> -->
      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>