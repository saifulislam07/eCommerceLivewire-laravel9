@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Edit Slider
                        <a href="{{ url('admin/sliders') }}" class="btn btn-danger btn-sm text-white float-end">
                            Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/sliders/' . $slider->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Title</label>
                            <input type="text" value="{{ $slider->title }}" name="title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <textarea type="text" name="description" class="form-control">{{ $slider->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control" />
                            <img src="{{ asset("$slider->image") }}" height="50px" alt="">

                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">Status</label> <br>
                            <input type="checkbox" {{ $slider->status = '1' ? 'checked' : '' }}
                                style="width: 30px; height: 30px" name="status"> Checked = Hidden,
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
