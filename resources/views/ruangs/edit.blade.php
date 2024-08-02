<style>
    form {
        margin-top: 3rem;
        /* Sesuaikan nilai sesuai kebutuhan desain Anda */
    }
</style>

@extends('patrial.template')
@section('content')
<div class="table-responsive">
    <h3 class="text-center"> <b> Edit Nama Ruang </b></h3>
    <form method="POST" action="{{ route('ruangs.update', $ruang->RuangID) }}">
        {{ csrf_field() }}
        <div class="container mt-4">
            <div class="row">
                <input type="hidden" name="_method" value="put" />
                <div class="form-group">
                    <label for="NamaRuang">Nama Ruang</label>
                    <input type="text" class="form-control" id="NamaRuang" name="NamaRuang" value="{{ $ruang->NamaRuang }}" required>
                </div>
                <div class="d-flex justify-content-end mt-2">
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
    </form>
</div>
</form>
@endsection