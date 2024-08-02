@extends('patrial.template')
@section('content')
<div class="table-responsive mt-5">
    <h3 class="text-center"> <b> Edit Nama Barang </b></h3>
    <form method="POST" action="{{ route('barangs.update', $barang->BarangID) }}">
        {{ csrf_field() }}
        <div class="container mt-4">
            <div class="row">
                <input type="hidden" name="_method" value="put" />

                <div class="form-group">
                    <label for="NamaBarang">Nama Barang</label>
                    <input type="text" name="NamaBarang" class="form-control" value="{{ $barang->NamaBarang }}" required>
                </div>
                <div class="form-group">
                    <label for="StockQuantity">Stock Quantity</label>
                    <input type="number" name="StockQuantity" class="form-control" value="{{ $barang->StockQuantity }}" required>
                </div>
                <div class="d-flex justify-content-end mt-2">
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
    </form>
</div>
</form>
@endsection