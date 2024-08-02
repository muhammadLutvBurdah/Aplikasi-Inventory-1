<style>
    form {
        margin-top: 3rem;
        /* Sesuaikan nilai sesuai kebutuhan desain Anda */
    }
</style>

@extends('patrial.template')
@section('content')
    <div class="table-responsive mt-5">
        <h3 class="text-center"> <b> Create Name Barang </b></h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('barangs.store') }}">
            {{ csrf_field() }}
            <div class="container mt-3">
                <div class="row">
                    <div class="demo-vertical-spacing demo-only-element col-md-19 my-3">
                        <div>
                            <div class="form group"> <label for="NamaBarang">Nama Barang</label>
                                <input type="text" class="form-control" id="NamaBarang" name="NamaBarang"
                                    value="{{ old('NamaBarang') }}" autocomplete="off" required>
                            </div>
                            <div class="form group"> <label for="StockQuantity">Stock</label>
                                <input type="number" name="StockQuantity" id="StockQuantity" class="form-control"
                                    value="{{ old('StockQuantity') }}">
                            </div>
                            <div class="row justify-content-end mt-2">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mr-2">Create Nama Barang</button>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('barangs.index') }}" class="btn btn-secondary"> Back </a>
        </form>
    </div>
    </form>
    </div>
@endsection
