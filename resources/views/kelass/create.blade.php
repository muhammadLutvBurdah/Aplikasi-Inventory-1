@extends('patrial.template')

@section('content')
<div class="table-responsive mt-5">
    <h3 class="text-center"> <b> Create Kelas </b></h3>
    <form method="POST" action="{{ route('kelass.store') }}">
        {{ csrf_field() }}
        <div class="container mt-3">
            <div class="row">
                <div class="demo-vertical-spacing demo-only-element col-md-12 my-3">
                    <div class="form-group">
                        <label for="NamaKelas">Nama Kelas</label>
                        <input type="text" class="form-control" id="NamaKelas" name="NamaKelas" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row justify-content-end mt-2">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('kelass.index')}}" class="btn btn-secondary"> Back </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
