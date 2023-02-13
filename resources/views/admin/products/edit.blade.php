@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <h4 class="alert alert-success mb-2">{{ session('message') }}</h4>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>
                        Edit Products
                        <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm text-white float-end">
                            Back</a>
                    </h3>
                </div>
                <div class="card-body">


                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ url('admin/products/' . $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">Home</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seotag-tab" data-bs-toggle="tab"
                                    data-bs-target="#seotag-tab-pane" type="button" role="tab"
                                    aria-controls="seotag-tab-pane" aria-selected="false">SEO</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                    data-bs-target="#details-tab-pane" type="button" role="tab"
                                    aria-controls="details-tab-pane" aria-selected="false">Details</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="images-tab" data-bs-toggle="tab"
                                    data-bs-target="#images-tab-pane" type="button" role="tab"
                                    aria-controls="images-tab-pane" aria-selected="false">Images</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="color-tab" data-bs-toggle="tab"
                                    data-bs-target="#color-tab-pane" type="button" role="tab"
                                    aria-controls="color-tab-pane" aria-selected="false">Color</button>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Category</label>
                                    <select name="category_id" id="" class="form-control">
                                        @foreach ($categories as $category)
                                            <option {{ $category->id == $product->category_id ? 'selected' : '' }}
                                                value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Name</label>
                                    <input type="text" value="{{ $product->name }}" class="form-control" name="name">
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Slug</label>
                                    <input type="text" value="{{ $product->slug }}" class="form-control" name="slug">
                                </div>
                                <div class="mb-3">
                                    <label for="">Brand</label>
                                    <select name="brand" id="" class="form-control">
                                        @foreach ($brands as $brand)
                                            <option {{ $brand->name == $product->brand ? 'selected' : '' }}
                                                value="{{ $brand->name }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Small Description (500 words)</label>
                                    <textarea name="small_description" id="" class="form-control" cols="30" rows="10">{{ $product->small_description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for=""> Description</label>
                                    <textarea name="description" id="" class="form-control" cols="30" rows="10">{{ $product->description }}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel"
                                aria-labelledby="seotag-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Meta Title</label>
                                    <input type="text" value="{{ $product->meta_title }}" class="form-control"
                                        name="meta_title">
                                </div>
                                <div class="mb-3">
                                    <label for="">Meta Description</label>
                                    <textarea name="meta_description" id="" class="form-control" cols="30" rows="10">{{ $product->meta_description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Meta Keyword</label>
                                    <textarea name="meta_keyword" id="" class="form-control" cols="30" rows="10">{{ $product->meta_keyword }}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel"
                                aria-labelledby="details-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Original Price</label>
                                            <input type="text" class="form-control"
                                                value="{{ $product->original_price }}" name="original_price">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Selling Price</label>
                                            <input type="text" value="{{ $product->selling_price }}"
                                                class="form-control" name="selling_price">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Quantity</label>
                                            <input type="text" value="{{ $product->quantity }}" class="form-control"
                                                name="quantity">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Trending</label>
                                            <input type="checkbox" name="trending"
                                                {{ $product->trending == '1' ? 'checked' : '' }}
                                                style="width: 50px; height: 50px">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Status</label>
                                            <input type="checkbox" {{ $product->status == '1' ? 'checked' : '' }}
                                                name="status" style="width: 50px; height: 50px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3" id="images-tab-pane" role="tabpanel"
                                aria-labelledby="images-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Upload Products Images</label>
                                            <input type="file" class="form-control" name="image[]" multiple>
                                        </div>


                                        <div>
                                            @if ($product->productImages)
                                                <div class="row">
                                                    @foreach ($product->productImages as $image)
                                                        <div class="col-md-4">
                                                            <img src="{{ asset($image->image) }}"
                                                                style="width: 80px; height:80px" alt=""
                                                                class="me-4 border">
                                                            <a href="{{ url('admin/product-image/' . $image->id . '/delete') }}"
                                                                class="btn btn-xs btn-danger d-block text-white">X</a>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            @else
                                                <h5>No Image Added</h5>
                                            @endif

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade border p-3" id="color-tab-pane" role="tabpanel"
                                aria-labelledby="color-tab" tabindex="0">
                                <div class="mb-3">


                                    <label for="">Select Color</label>
                                    <div class="row mt-1">
                                        @forelse ($colors as $color)
                                            <div class="col-md-2">
                                                <div class="p-2 border mb-3">
                                                    Color : <input type="checkbox" name="colors[{{ $color->id }}]"
                                                        value="{{ $color->id }}" /> {{ $color->name }}
                                                    <hr>
                                                    Quantity : <input type="number"
                                                        name="colorquantity[{{ $color->id }}]"
                                                        style="width:70px; border : 1px solid black" />
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-md-12">
                                                <h5 class="alert alert-warning">No Active Color found</h5>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <tr>
                                                <td>Color Name</td>
                                                <td>Quantity</td>
                                                <td>Delete</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product->productColors as $color)
                                                <tr class="prod-color-tr">
                                                    <td>
                                                        @if ($color->color)
                                                            {{ $color->color->name }}
                                                        @else
                                                            No color found
                                                        @endif

                                                    </td>
                                                    <td>
                                                        <div class="input-group mb-3" style="width:150px">
                                                            <input type="text" value="{{ $color->quantity }}"
                                                                class="productColorQuantity form-control form-control-sm" />
                                                            <button type="button" value="{{ $color->id }}"
                                                                class="updateProductColorBtn btn btn-primary btn-xs text-white">Update</button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" value="{{ $color->id }}"
                                                            class="deleteProductColorBtn btn btn-danger btn-xs text-white">Delete</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="py-2 float-end">
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.updateProductColorBtn', function() {
                var product_id = "{{ $product->id }}"
                var prod_color_id = $(this).val();
                var qty = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();



                if (qty <= 0) {
                    alert('Quantity is required');
                    return false;
                }

                var data = {
                    'product_id': product_id,
                    'qty': qty,
                };

                $.ajax({
                    type: "POST",
                    url: "/admin/product-color/" + prod_color_id,
                    data: data,

                    success: function(response) {
                        alert(response.message);
                    }
                });
            });


            $(document).on('click', '.deleteProductColorBtn', function() {
                var prod_color_id = $(this).val();
                var thisClick = $(this);
                //  thisClick.closest('.prod-color-tr').remove();
                $.ajax({
                    type: "Get",
                    url: "/admin/product-color/" + prod_color_id + "/delete",
                    success: function(response) {
                        thisClick.closest('.prod-color-tr').remove();
                        alert(response.message);
                    }
                });
            });
        });
    </script>
@endsection
