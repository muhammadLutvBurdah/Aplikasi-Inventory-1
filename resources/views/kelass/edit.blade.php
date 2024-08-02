@extends('patrial.template')
@section('content')
<div class="table-responsive mt-5">
    <h3 class="text-center"> <b> Edit Nama Kelas </b></h3>
    <form method="POST" action="{{ route('kelass.update', $kelas->KelasID) }}">
        {{ csrf_field() }}
        <div class="container mt-4">
            <div class="row">
                <div class="row">
                    <div class="row">
                        <input type="hidden" name="_method" value="put" />
                        <div class="form-group">
                            <label for="NamaKelas">Nama Kelas</label>
                            <input type="text" class="form-control" id="NamaKelas" name="NamaKelas" value="{{ $kelas->NamaKelas }}" required>
                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
    </form>
</div>
</form>
@endsection