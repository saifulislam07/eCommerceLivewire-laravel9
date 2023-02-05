@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Edit Category
                        <a href="{{ url('admin/category') }}" class="btn btn-primary btn-sm text-white float-end">
                            BACK</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/category/' . $category->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="mb-1">Name</label>
                                <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="mb-1">Slug</label>
                                <input type="text" name="slug" value="{{ $category->name }}" class="form-control">
                                @error('slug')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="mb-1">Description</label>
                                <textarea type="text" name="description" class="form-control">{{ $category->description }}</textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="mb-1">Image</label>
                                <input type="file" name="image" class="form-control">
                                <img src="{{ asset('uploads/category/' . $category->image) }}" height="50px"
                                    alt="">
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="mb-1">Status</label> <br>
                                <input type="checkbox" {{ $category->status = '1' ? 'checked' : '' }} name="status">
                            </div>
                            <div class="col-md-12">
                                <h4>SEO Tags</h4>
                                <div class="col-md-1">
                                    <hr>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="mb-1">Meta Title</label>
                                <input type="text" name="meta_title" value="{{ $category->meta_title }}"
                                    class="form-control">
                                @error('meta_title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="mb-1">Meta Keyword</label>
                                <textarea type="text" name="meta_keyword" class="form-control">{{ $category->meta_keyword }}</textarea>
                                @error('meta_keyword')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="mb-1">Meta Description</label>
                                <textarea type="text" name="meta_description" class="form-control">{{ $category->meta_description }}</textarea>
                                @error('meta_description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <button class="btn btn-success text-white float-end">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
