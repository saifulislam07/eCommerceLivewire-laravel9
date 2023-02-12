@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Add Color
                        <a href="{{ url('admin/colors') }}" class="btn btn-danger btn-sm text-white float-end">
                            Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/colors') }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="">Color Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Color Code</label>
                            <input type="text" name="code" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="">Status</label> <br>
                            <input type="checkbox" style="width: 30px; height: 30px" name="status"> Checked = Hidden,
                            UnChecked=Visible
                        </div>
                        <div class="mb-3">

                            <button class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
