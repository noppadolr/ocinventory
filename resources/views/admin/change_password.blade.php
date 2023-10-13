@extends('admin.body.main')
@section('title','Change Password')
@section('main')
    <div class="page-content">

        <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">

                            <div>
                                <img class="wd-100 wd-sm-150 me-3 rounded" src="{{ (!empty($adminData->photo))? url('upload/adminImages/'.$adminData->photo):url('upload/no_image.jpg') }}" alt="profile">
{{--                                <span class="h4 ms-3 text-light">   {{$adminData->name}}</span>--}}
                            </div>

                        </div>

                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
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
                            <p class="text-muted">{{$adminData->email}}</p>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                            <p class="text-muted">{{$adminData->phone}}</p>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                            <p class="text-muted">{{$adminData->address}}</p>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
                            {{--                        <p class="text-muted">{{$adminData->created_at->thaidate()}}</p>--}}
                            {{--                        <p class="text-muted">{{$adminData->created_at->thaidate('H:i:s น.')}}</p>--}}
                            @if(empty($adminData->updated_at))
                                <p class="text-muted"> - </p>
                            @else
                                <p class="text-muted">{{$adminData->created_at->thaidate()}}</p>
                                <p class="text-muted">{{$adminData->created_at->thaidate('H:i:s น.')}}</p>
                            @endif

                        </div>
                        <hr>
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
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">

                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Change Password</h6>
                            <br>
                            <form class="forms-sample" method="POST" action="{{route('update.password') }}" enctype="multipart/form-data" >
                                @csrf

{{--                                {{ route('admin.update.password') }}--}}
                                <div class="row mb-3">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Old Password</label>
                                    <div class="col-sm-9">
                                        <input type="password"
                                               class="form-control @error('old_password') is-invalid @enderror"
                                               id="old_password"
                                               name="old_password" >
                                        @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">New Password</label>
                                    <div class="col-sm-9">
                                        <input  type="password"
                                                class="form-control @error('new_password') is-invalid @enderror"
                                                id="new_password"
                                                name="new_password" >
                                        @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Confirm New Password</label>
                                    <div class="col-sm-9">
                                        <input type="password"
                                               class="form-control @error('new_password') is-invalid @enderror"
                                               id="new_password_confirmation"
                                               name="new_password_confirmation"
                                               autocomplete="off" >
                                        @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{--                                <label for="exampleInputEmail2" class="col-sm-2 col-form-label"></label>--}}
                                <button type="submit" class="btn btn-outline-warning   me-2">Change Password</button>

                            </form>

                        </div>
                    </div>



                </div>
            </div>
            <!-- middle wrapper end -->

        </div>

    </div>



@endsection
