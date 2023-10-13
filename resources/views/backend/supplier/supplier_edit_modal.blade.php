<!-- Modal -->
<div class="modal fade" id="editmodal{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="editmodallabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editmodallabel">Edit Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>

            <form action="{{ route('supplier.add') }}" method="POST" id="myForm">
                @csrf
                <div class="modal-body">

                    <div class="mb-3 ">

                        <label for="name" class="form-label">Name</label>
                        <div class="form-group">
                            <input id="name" class="form-control" name="name" type="text" value="">
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <div class="form-group">
                            <input id="phone" class="form-control" name="phone" type="text">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="form-group">
                            <input id="email" class="form-control" name="email" type="email">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <div class="form-group">
                            <input id="address" class="form-control" name="address" type="text">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>

            </form>
        </div>
    </div>
</div>
