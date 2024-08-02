<style>
    form {
        margin-top: 3rem;
        /* Sesuaikan nilai sesuai kebutuhan desain Anda */
    }
</style>

@extends('patrial.template')
@section('content')
<div class="table-responsive mt-5">
    <h3 class="text-center"> <b> Create Jabatan </b></h3>
    <form method="POST" action="{{ route('jabatans.store') }}">
        {{ csrf_field() }}
        <div class="container mt-3">
            <div class="row">
                <div class="demo-vertical-spacing demo-only-element col-md-19 my-3">

                    <div class="form-group">
                        <label for="NamaJabatan">Nama Jabatan</label>
                        <input type="text" class="form-control bg-gradient" id="NamaJabatan" name="NamaJabatan" required>
                    </div>
                    <div class="row justify-content-end mt-2">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('jabatans.index')}}" class="btn btn-secondary"> Back </a>
    </form>
</div>
@endsection