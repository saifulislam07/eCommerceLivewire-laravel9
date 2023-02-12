@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Edit Color
                        <a href="{{ url('admin/colors') }}" class="btn btn-danger btn-sm text-white float-end">
                            Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/colors/' . $color->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Color Name</label>
                            <input type="text" value="{{ $color->name }}" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Color Code</label>
                            <input type="text" value="{{ $color->code }}" name="code" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="">Status</label> <br>
                            <input type="checkbox" {{ $color->status ? 'checked' : '' }} style="width: 30px; height: 30px"
                                name="status"> Checked = Hidden,
                            UnChecked=Visible
                        </div>
                        <div class="mb-3">

                            <button class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
