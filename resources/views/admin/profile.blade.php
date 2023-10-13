@extends('admin.body.main')
@section('title','Admin Panel')
@section('main')
    <div class="page-content">
{{--    <div class="row">--}}
{{--        <div class="col-12 grid-margin">--}}
{{--            <div class="card">--}}
{{--                <div class="position-relative">--}}
{{--                    <figure class="overflow-hidden mb-0 d-flex justify-content-center">--}}
{{--                        <img src="{{url('upload/profile-banner.png')}}"class="rounded-top" style="width: 100%;height: 50%;" alt="profile cover">--}}
{{--                    </figure>--}}
{{--                    <div class="d-flex justify-content-between align-items-center position-absolute top-90 w-100 px-2 px-md-4 mt-n4" >--}}
{{--                        <div>--}}
{{--                            <img class="wd-70 rounded-circle"  src="{{ (!empty($adminData->photo))? url('upload/adminImages/'.$adminData->photo):url('upload/no_image.jpg') }}" alt="profile">--}}
{{--                            <span class="h4 ms-3 text-dark">{{ $adminData->name }}</span>--}}
{{--                            @if($adminData->role === 'admin')--}}
{{--                                <span style="color: #0a1122">(Administrator)</span>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                        <div class="d-none d-md-block">--}}
{{--                            <button class="btn btn-primary btn-icon-text">--}}
{{--                                <i data-feather="edit" class="btn-icon-prepend"></i> Edit profile--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-5 col-xl-4 left-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    <div class="d-flex  mb-2">
                        <img class="wd-70 rounded-circle"  src="{{ (!empty($adminData->photo))? url('upload/adminImages/'.$adminData->photo):url('upload/no_image.jpg') }}" alt="profile">
{{--                         <h6 class="card-title mb-0 mt-4">About</h6>--}}

                    </div>
                    <p> </p>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Name: </label>
                        <p class="text-muted">{{ $adminData->name }}</p>
                    </div>
                    <hr>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Username:</label>
                        <p class="text-muted">{{ $adminData->username }}</p>
                    </div>
                    <hr>

                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                        <p class="text-muted">{{ $adminData->email }}</p>
                    </div>
                    <hr>

                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                        <p class="text-muted">{{ $adminData->phone }}</p>
                    </div>
                    <hr>

                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                        <p class="text-muted">{{ $adminData->address }}</p>
                    </div>

                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
                        @if(empty($adminData->created_at))
                            <p class="text-muted"> - </p>
                        @else
                            <p class="text-muted">{{$adminData->created_at->thaidate()}}</p>
                            <p class="text-muted">{{$adminData->created_at->thaidate('H:i:s น.')}}</p>
                        @endif
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Updated:</label>
                        @if(empty($adminData->updated_at))
                            <p class="text-muted"> - </p>
                        @else
                            <p class="text-muted">{{$adminData->updated_at->thaidate()}}</p>
                            <p class="text-muted">{{$adminData->updated_at->thaidate('H:i:s น.')}}</p>
                        @endif
                    </div>

                </div>
            </div>
        </div>
        <!-- left wrapper end -->
        <!-- middle wrapper start -->
        <div class="col-md-7 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card rounded">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
{{--                                    <img class="img-xs rounded-circle" src="{{ (!empty($adminData->photo))? url('upload/adminImages/'.$adminData->photo):url('upload/no_image.jpg') }}" alt="">--}}
                                    <div class="ms-2">
{{--                                        <p>{{ $adminData->name }}</p>--}}

                                        <p class="">Update Profile</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <p class="mb-3 tx-14"></p>
{{--                            <h6 class="card-title">Horizontal Form</h6>--}}

                            <form class="forms-sample" method="post" action="{{route('update.profile')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-2">
                                    <label for="name" class="col-sm-1 col-form-label">Name</label>
                                    <div class="col-sm-11">
                                        <input type="text" class="form-control" id="name" name="name" value="{{$adminData->name}}">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label for="ีusername" class="col-sm-1 col-form-label">Username</label>
                                    <div class="col-sm-11">
                                        <input type="text" class="form-control" id="username" name="username" value="{{$adminData->username}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-sm-1 col-form-label">Email</label>
                                    <div class="col-sm-11">
                                        <input type="email" class="form-control" name="email" id="email" autocomplete="off" value="{{$adminData->email}}">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label for="phone" class="col-sm-1 col-form-label">Phone</label>
                                    <div class="col-sm-11">
                                        <input type="text" class="form-control" name="phone" id="phone" value="{{$adminData->phone}}">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label for="address" class="col-sm-1 col-form-label">Address</label>
                                    <div class="col-sm-11">
                                        <input type="text" class="form-control" name="address" id="address" value="{{$adminData->address}}">
                                    </div>
                                </div>


                                <div class="row mb-2">
                                    <label for="cropperImageUpload" class="col-sm-1 col-form-label">Photo</label>
                                    <div class="col-sm-11">
                                    <input class="form-control" type="file" name="photo" id="image" >
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label for="showImage" class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-11">
                                        <img class="img-fluid rounded" id="showImage" src="{{ (!empty($adminData->photo))? url('upload/adminImages/'.$adminData->photo):url('upload/no_image.jpg') }}" alt="">
                                    </div>
                                </div>


                                <br>


                                <button type="submit" class="btn btn-primary me-2">Submit</button>

                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- middle wrapper end -->

    </div>
    </div>
    @push('script')
        {{--  <script src="{{asset('jquery-3.7.1.min.js')}}"></script>  --}}
    <script type="text/javascript">

        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });

    </script>

    <script type="text/javascript">
        @if(Session::has('Profileupdated'))
        $(document).ready( function () {
            showSwal('profile-updated');
        });

        @endif


    </script>
    @endpush
@endsection
