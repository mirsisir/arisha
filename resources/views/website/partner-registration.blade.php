@extends('layouts.web.web_base')
@section('content')

    <div>
        <style>
            .invalid-feedback {
                color: red
            }
        </style>


        <form action="{{route('partner_registration_save',app()->getLocale())}}" class="forms-sample mt-5" method="POST" enctype="multipart/form-data" >
            @csrf
            <h2 class="text-center mb-3 text-info">Partner Registration</h2>
            <div class="d-flex justify-content-between w-75 m-auto m-4 border p-3 row">
                <div class="card col-lg-5 mr-3 col-sm-11">
                    <div class="card-body">
                        <h2 class="card-title font-weight-bolder">Personal Details</h2>
                        <div class="form-group">
                            <label for="fname" class="">First Name <span class="text-danger">*</span></label>
                            <div class="">
                                <input type="text" name="fname"
                                       class="form-control @error('fname') is-invalid @enderror" id="fname"
                                       placeholder="First Name">
                                @error('fname')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lname" class="">Last Name <span class="text-danger">*</span></label>
                            <div class="">
                                <input type="text" name="lname"
                                       class="form-control @error('lname') is-invalid @enderror" id="lname"
                                       placeholder="Last Name">
                                @error('lname')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender <span class="text-danger">*</span></label>
                            <select class="form-control @error('gender') is-invalid @enderror" id="gender"
                                    name="gender">
                                <option value="" selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="nation" class="">Nationality <span class="text-danger">*</span></label>
                            <div class="">
                                <input type="text" name="nation"
                                       class="form-control @error('nation') is-invalid @enderror" id="nation"
                                       placeholder="Nationality">
                                @error('nation')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="nid" class="">Bank Account <span class="text-danger">*</span></label>
                            <div class="">
                                <input type="text" name="nid"
                                       class="form-control @error('bank_account') is-invalid @enderror" id="nid"
                                       placeholder="bank_account">
                                @error('bank_account')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nid" class="">NID <span class="text-danger">*</span></label>
                            <div class="">
                                <input type="text" name="nid"
                                       class="form-control @error('nid') is-invalid @enderror" id="nid"
                                       placeholder="NID No">
                                @error('nid')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card col-lg-5 col-sm-11">
                    <div class="card-body">
                        <h2 class="card-title font-weight-bolder">Contact Details</h2>
                        <div class="form-group">
                            <label for="address" class="">House Number <span class="text-danger">*</span></label>
                            <div class="">
                                <input type="text" name="address"
                                       class="form-control @error('address') is-invalid @enderror" id="address"
                                       placeholder="Present Address">
                                @error('address')
                                <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="city" class="">Street <span class="text-danger">*</span></label>
                            <div class="">
                                <input type="text" name="street"
                                       class="form-control @error('street') is-invalid @enderror" id="street"
                                       placeholder="Street">
                                @error('street')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="city" class="">City <span class="text-danger">*</span></label>
                            <div class="">
                                <input type="text" name="city"
                                       class="form-control @error('city') is-invalid @enderror" id="city"
                                       placeholder="City">
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="city" class="">Post Code <span class="text-danger">*</span></label>
                            <div class="">
                                <input type="text" name="post_code"
                                       class="form-control @error('post_code') is-invalid @enderror" id="post_code"
                                       placeholder="post_code">
                                @error('post_code')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="phone" class="">Phone</label>
                            <div class="">
                                <input type="text" name="phone"
                                       class="form-control @error('phone') is-invalid @enderror" id="phone"
                                       placeholder="Phone">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="">Email <span class="text-danger">*</span></label>
                            <div class="">
                                <input type="email" name="email"
                                       class="form-control @error('email') is-invalid @enderror" id="email"
                                       placeholder="Email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-lg-6">
                        <label for="photo" class="">NID/Passport Card <span class="text-danger">*</span></label>
                        <div class="">

                            <input type="file" name="nid_card"
                                   class="form-control @error('nid_card') is-invalid @enderror" id="photo"
                                   placeholder="Photo">
                            @error('nid_card')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="photo" class="">House Clearence <span class="text-danger">*</span></label>
                        <div class="">

                            <input type="file" name="nid_card"
                                   class="form-control @error('house_clearence') is-invalid @enderror" id="photo"
                                   placeholder="Photo">
                            @error('house_clearence')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="photo" class="">Business Licence<span class="text-danger">*</span></label>
                        <div class="">

                            <input type="file" name="nid_card"
                                   class="form-control @error('business_licence') is-invalid @enderror" id="photo"
                                   placeholder="Photo">
                            @error('business_licence')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group col-lg-6">
                        <label for="photo" class="">Photo <span class="text-danger">*</span></label>
                        <div class="">

                            <input type="file" name="photo"
                                   class="form-control @error('photo') is-invalid @enderror" id="photo"
                                   placeholder="Photo">
                            @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card col-lg-12 mb-4">

                    <label for="js-example-basic-multiple3">Select Preferred Service  <span class="text-danger">*</span></label>
                    <select class="js-example-basic-multiple3 form-control @error('service') is-invalid @enderror" name="service[]" multiple="multiple"  >
                        @foreach ($all_service as $service)
                        <option value="{{$service->id}}">{{$service->name}}</option>
                        @endforeach
                    </select>
                    @error('service')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>


            </div>


            <br>
            <div class="col-sm-8 offset-sm-2 mb-5">
                <button type="submit" class="btn btn-success btn-block">Request To Be A Partner</button>
            </div>
        </form>


    </div>


@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple3').select2();
        });
    </script>
@endsection
