@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>
                        Sliders List
                        <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary btn-sm text-white float-end">
                            Add Slider</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->description }}</td>
                                    <td>
                                        <img class="img-fluid " src="{{ asset("$slider->image") }}" alt=""
                                            style="" />

                                    </td>
                                    <td>{{ $slider->status == '0' ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a class="btn btn-xs btn-success text-white"
                                            href="{{ url('admin/sliders/' . $slider->id . '/edit') }}">Edit</a>
                                        <a href="{{ url('admin/sliders/' . $slider->id . '/delete') }}"
                                            onclick="return confirm('Are you sure, you want to delete this slider ?')"
                                            class="btn btn-xs btn-danger text-white" href="">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                </div>
            </div>
        </div>
    </div>
@endsection
