<style>
    form {
        margin-top: 3rem;
        /* Sesuaikan nilai sesuai kebutuhan desain Anda */
    }

    #cart {
        margin-top: 1rem;
    }

    #cart table {
        width: 100%;
        border-collapse: collapse;
    }

    #cart th,
    #cart td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
</style>

@extends('patrial.template')
@section('content')
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="table-responsive mt-5">
    <h3 class="text-center"> <b> Create Barang Keluar </b></h3>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{ route('barangkeluars.store') }}">
        {{ csrf_field() }}
        <div class="container mt-3">
            <div class="row">
                <div class="demo-vertical-spacing demo-only-element col-md-19 my-3">

                <div class="d-flex align-items-center mb-3">
                            <h4 class="me-4">Daftar Peminjaman</h4>
                            <button type="button" id="addToCartBtn" class="btn btn-success">Tambah</button>
                        </div>

                        <!-- Bagian Keranjang -->
                        <div id="cart" class="mb-3 col-12">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="text-center">Barang</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-center">Deskripsi</th>
                                    </tr>
                                </thead>
                                <tbody id="cartBody">
                                    <!-- Keranjang akan ditampilkan di sini -->
                                </tbody>
                            </table>
                        </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon11">Jenis Barang</span>
                        <input type="text" class="form-control" name="Jenis" placeholder="Jenis Barang" aria-label="Jenis Barang" />
                    </div>

                <div class="row justify-content-end mt-2">
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mr-2">Create Barang</button>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('barangkeluars.index')}}" class="btn btn-secondary"> Back </a>
    </form>
</div>
</form>
</div>

<script>
     const addToCartBtn = document.getElementById('addToCartBtn');
            const cartBody = document.getElementById('cartBody');

            addToCartBtn.addEventListener('click', function() {
                const length = cartBody.children.length;
                // Tambahkan data ke keranjang
                const row = document.createElement('tr');
                row.innerHTML = `
                <td>
                    <select name="Order[${length}][BarangID]" class="form-control" id="BarangID" placeholder="Barang">
                        <option value="">--Select Barang--</option>
                        @foreach ($barangs as $barang)
                            <option value="{{ $barang->BarangID }}">{{ $barang->NamaBarang }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" class="form-control" name="Order[${length}][Jumlah]" placeholder="-- Jumlah --" aria-label="-- Jumlah " />
                </td>
                <td>
                    <input type="text" class="form-control" name="Order[${length}][Deskripsi]" placeholder="-- Deskripsi --" aria-label="-- Deskripsi " />
                </td>
            `;
                cartBody.appendChild(row);
            });
</script>
@endsection