<div>
    @include('livewire.admin.brand.modal-form')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Brands List
                        <a href="" class="btn btn-primary text-white btn-sm float-end " data-bs-toggle="modal"
                            data-bs-target="#brandModal">Add Brand</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $brand)
                                <tr>
                                    <td>{{ $brand->id }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>{{ $brand->slug }}</td>
                                    <td>{{ $brand->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a href="#" wire:click="editBrand({{ $brand->id }})"
                                            data-bs-toggle="modal" data-bs-target="#updateBrandModal"
                                            class="btn btn-success btn-xs">EDIT</a>

                                        <a href="#" class="btn btn-danger btn-xs" data-bs-toggle="modal"
                                            wire:click="deleteBrand({{ $brand->id }})"
                                            data-bs-target="#deleteBrandModal" class="btn btn-success btn-xs">DELETE</a>
                                    </td>
                                </tr>
                            @empty

                                <tr>
                                    <td colspan="5">
                                        No Brands Found
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                    <div>
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#brandModal').modal('hide');
            $('#updateBrandModal').modal('hide');
            $('#deleteBrandModal').modal('hide');
        });
    </script>
@endpush
