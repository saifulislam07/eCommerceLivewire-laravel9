<!-- Modal -->
<div wire:ignore.self class="modal fade" id="brandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Brands</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>


            <div wire:loading>
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <div wire:loading.remove>


                <form wire:submit.prevent="storeBrand">

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="">Brand name</label>
                            <input type="text" wire:model.defer="name" class="form-control">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Brand Slug</label>
                            <input type="slug" wire:model.defer="slug" class="form-control">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Status</label> <br>
                            <input type="checkbox" wire:model.defer="status"> Checked = Hidden, Un-checked=Visible
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- brandupdate model -->
<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Brands</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateBrand">

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Brand name</label>
                        <input type="text" wire:model.defer="name" class="form-control">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Brand Slug</label>
                        <input type="slug" wire:model.defer="slug" class="form-control">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Status</label> <br>
                        <input type="checkbox" wire:model.defer="status" style="width: 70px; height=70px"> Checked =
                        Hidden, Un-checked=Visible
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- delete model -->
<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Brands</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyBrand">

                <div class="modal-body">
                    <h4>Are you sure you want to delete the brand !</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes. Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
