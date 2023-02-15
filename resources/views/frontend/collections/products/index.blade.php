@extends('layouts.app')

@section('title')
    {{ $cateogory->meta_title }}
@endsection

@section('meta_keyword')
    {{ $cateogory->meta_keyword }}
@endsection

@section('meta_description')
    {{ $cateogory->meta_description }}
@endsection

@section('content')
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Products</h4>
                </div>
                <livewire:frontend.product.index :products="$products" :cateogory="$cateogory" />

            </div>
        </div>
    </div>
@endsection
