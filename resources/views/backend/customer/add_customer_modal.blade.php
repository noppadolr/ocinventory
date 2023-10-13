<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>

            <form action="{{ route('customer.add') }}" method="POST" id="myForm">
                @csrf
                <div class="modal-body">

                    <div class="mb-3 ">

                        <label for="name" class="form-label">Name</label>
                        <div class="form-group">
                            <input id="name" class="form-control" name="name" type="text">
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

                    <div class=" mb-3">
                        <label for="image" class="col-sm-1 col-form-label">Photo</label>
                        <div class="form-group">
                            <input class="form-control" type="file" name="photo" id="image" >
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="showImage" class="col-sm-1 col-form-label"></label>
                        <div class="form-group">
                            <img class="img-fluid rounded" id="showImage" src="{{ url('upload/no_image.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
{{--                Modal body--}}

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>
