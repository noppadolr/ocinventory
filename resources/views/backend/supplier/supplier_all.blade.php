@extends('admin.body.main')
@section('title','All Suppliers')
@section('main')
    @push('css')
        <link rel="stylesheet" href="{{asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css')}}">

    @endpush
    @include('backend.supplier.add_supplier_modal')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Suppliers</li>
            </ol>
        </nav>





        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn btn-inverse-success" style="float: right;" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Supplier</button>
                        <br>

                        <h6 class="card-title">Suppliers All Data</h6>


                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($supp as $key =>$item)
                                    <tr>

                                        <td>{{$key+1}}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>

                                            <a href="#" class="btn btn-inverse-warning btn-icon btn-sm" title="Edit" data-id="{{$item->id}}" data-bs-toggle="modal" data-bs-target="#editmodal{{ $item->id }}" >
                                                <i class="link-icon" data-feather="edit"></i> </a>


                                            <a href="javascript:void(0)" class="btn btn-inverse-danger btn-icon btn-sm"
                                               title="Delete Data"   onclick="deleteCustomer({{$item->id}})">

                                                <i class="me-1 icon-md" data-feather="trash-2"></i>
                                            </a>

                                        </td>

                                        </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editmodal{{  $item->id  }}" tabindex="-1" role="dialog" aria-labelledby="editmodal" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editmodal">Edit Supplier</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                                </div>

                                                <form action="{{ route('supplier.update',$item->id) }}" method="POST" id="">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="{{$item->id}}" />
                                                        <div class="mb-3 ">

                                                            <label for="name" class="form-label">Name</label>
                                                            <div class="form-group">
                                                                <input id="name" class="form-control" name="name" type="text" value="{{$item->name}}">
                                                            </div>

                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="phone" class="form-label">Phone</label>
                                                            <div class="form-group">
                                                                <input id="phone" class="form-control" name="phone" type="text" value="{{$item->phone}}">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="email" class="form-label">Email</label>
                                                            <div class="form-group">
                                                                <input id="email" class="form-control" name="email" type="email" value="{{$item->email}}">
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="address" class="form-label">Address</label>
                                                            <div class="form-group">
                                                                <input id="address" class="form-control" name="address" type="text" value="{{$item->address}}">
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

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @push('script')
        <!-- Plugin js for this page -->
        <script src="{{asset('admin/assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
        <script src="{{asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>
        <!-- End plugin js for this page -->
        <script src="{{asset('admin/assets/js/data-table.js')}}"></script>
        <script>
            $("#exampleModal").on('hidden.bs.modal', function () {
                $('#myForm').find("input[type=text], input[type=email]").val("");
                $('.form-group').removeClass('has-error has-feedback invalid-feedback is-invalid');
                $('.form-control').removeClass('is-invalid');
            });
        </script>
        <script src="{{asset('validate.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function (){
                $('#myForm').validate({
                    rules: {
                        name: {
                            required : true,
                        },
                        phone: {
                            required : true,
                        },
                        address: {
                            required : true,
                        },
                        email: {
                            required : true,
                        },

                    },
                    messages :{
                        name: {
                            required : 'Please Enter Supplier Name',
                        },
                        phone: {
                            required : 'Please Enter Supplier Phone Number',
                        },
                        address: {
                            required : 'Please Enter Supplier Address',
                        },
                        email: {
                            required : 'Please Enter Supplier EmailAddress',
                        },


                    },
                    errorElement : 'span',
                    errorPlacement: function (error,element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight : function(element, errorClass, validClass){
                        $(element).addClass('is-invalid');
                    },
                    unhighlight : function(element, errorClass, validClass){
                        $(element).removeClass('is-invalid');
                    },
                });
            });
        </script>
        <script type="text/javascript">
            @if(Session::has('supplierAdded'))
            $(document).ready( function () {
                showSwal('supplierAdded');
            });
            @elseif(Session::has('supplierEdited'))
            $(document).ready( function () {
                showSwal('supplierEdited');
            });
            @endif
        </script>
        <script type="text/javascript">
            function deleteCustomer(id)
            {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete This Data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url:'delete/'+id,
                            type:'DELETE',
                            data: {
                                _token: '{!! csrf_token() !!}',
                            },
                            success:function (response)
                            {
                                $("#sid" + id).remove();
                            },

                        });

                        Swal.fire(
                            {
                                title:  'Deleted!',
                                text: 'Your file has been deleted.',
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'

                            }).then((result)=>{
                                    location.reload();
                            }
                        )
                    }
                    else if (result.dismiss === Swal.DismissReason.cancel) {
                        swal.fire(
                            'Cancelled',
                            'Your imaginary file is safe :)',
                            'error'
                        )
                    }
                })

            }

        </script>


    @endpush
@endsection
