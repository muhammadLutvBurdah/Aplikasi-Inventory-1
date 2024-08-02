@extends('patrial.template')
@section('content')
<div class="table-responsive mt-5">
    <h3 class="text-center"> <b> Edit Nama Jabatan </b></h3>
    <form method="POST" action="{{ route('jabatans.update', $jabatan->JabatanID) }}">
        {{ csrf_field() }}
        <div class="container mt-4">
            <div class="row">
                <input type="hidden" name="_method" value="put" />
                <div class="form-group">
                    <label for="NamaJabatan">Nama Jabatan</label>
                    <input type="text" class="form-control" id="NamaJabatan" name="NamaJabatan" value="{{ $jabatan->NamaJabatan }}" required>
                </div>
                <div class="d-flex justify-content-end mt-2">
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
    </form>
</div>
</form>
@endsection