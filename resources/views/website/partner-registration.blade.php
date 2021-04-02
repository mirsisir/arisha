@extends('layouts.web.web_base')
@section('content')

    <div>
        <style>
            .invalid-feedback {
                color: red
            }
        </style>
        @if(Session::has('message'))
            <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif

        <form action="{{route('partner_registration_save',app()->getLocale())}}" class="forms-sample mt-5" method="POST" enctype="multipart/form-data" >
            @csrf
            <h2 class="text-center mb-3 text-info">{{__('Partner Registration')}}</h2>
            <div class="d-flex justify-content-between w-75 m-auto m-4 border p-3 row">
                <div class="card col-lg-5 mr-3 col-sm-11">
                    <div class="card-body">
                        <h2 class="card-title font-weight-bolder">{{__('Personal Details')}}</h2>
                        <div class="form-group">
                            <label for="fname" class="">{{__('First Name')}} <span class="text-danger">*</span></label>
                            <div class="">
                                <input type="text" name="fname"
                                       class="form-control @error('fname') is-invalid @enderror" id="fname"
                                       placeholder="First Name" value="{{ old('fname') }}">
                                @error('fname')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lname" class="">{{__('Last Name')}} <span class="text-danger">*</span></label>
                            <div class="">
                                <input type="text" name="lname"
                                       class="form-control @error('lname') is-invalid @enderror" id="lname"
                                       placeholder="Last Name" value="{{ old('lname') }}">
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
                                    name="gender" value="{{ old('gender') }}">
                                <option value="" selected>{{__('Select Gender')}}</option>
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
                            <label for="nid" class="">{{__('Bank Name')}} <span class="text-danger">*</span></label>
                            <div class="">
                                <input type="text" name="bank_name"
                                       class="form-control @error('bank_name') is-invalid @enderror" id="nid"
                                       placeholder="Bank Name" value="{{ old('bank_name') }}">
                                @error('bank_name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nid" class="">Account Name<span class="text-danger">*</span></label>
                            <div class="">
                                <input type="text" name="acc_name"
                                       class="form-control @error('acc_name') is-invalid @enderror" id="nid"
                                       placeholder="Bank Account" value="{{ old('acc_name') }}" >
                                @error('acc_name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nid" class="">Account  Number<span class="text-danger">*</span></label>
                            <div class="">
                                <input type="text" name="bank_account"
                                       class="form-control @error('bank_account') is-invalid @enderror" id="nid"
                                       placeholder="Bank Account" value="{{ old('bank_account') }}">
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
                                       placeholder="NID No" value="{{ old('nid') }}">
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
                        <h2 class="card-title font-weight-bolder">{{__('Contact Details')}}</h2>

                        <div class="form-group">
                            <label for="city" class="">{{__('Street')}} <span class="text-danger">*</span></label>
                            <div class="">
                                <input type="text" name="street"
                                       class="form-control @error('street') is-invalid @enderror" id="street"
                                       placeholder="Street" value="{{ old('street') }}">
                                @error('street')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="">{{__('House Number')}} <span class="text-danger">*</span></label>
                            <div class="">
                                <input type="text" name="address"
                                       class="form-control @error('address') is-invalid @enderror" id="address"
                                       placeholder="Present Address" value="{{ old('address') }}">
                                @error('address')
                                <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group">
                            <label for="city" class="">{{__('Post Code')}} <span class="text-danger">*</span></label>
                            <div class="">
                                <input type="text" name="post_code"
                                       class="form-control @error('post_code') is-invalid @enderror" id="post_code"
                                       placeholder="Post Code" value="{{ old('post_code') }}">
                                @error('post_code')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="city" class="">{{__('City')}} <span class="text-danger">*</span></label>
                            <div class="">
                                <input type="text" name="city"
                                       class="form-control @error('city') is-invalid @enderror" id="city"
                                       placeholder="City" value="{{ old('city') }}">
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="">{{__('Phone')}}</label>
                            <div class="">
                                <input type="text" name="phone"
                                       class="form-control @error('phone') is-invalid @enderror" id="phone"
                                       placeholder="Phone" value="{{ old('phone') }}">
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
                                       placeholder="Email" value="{{ old('email') }}">
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
                        <label for="photo" class="">{{__('NID/Passport Card')}} <span class="text-danger">*</span></label>
                        <div class="">

                            <input type="file" name="nid_card"
                                   class="form-control @error('nid_card') is-invalid @enderror" id="photo"
                                   placeholder="Photo" value="{{ old('nid_card') }}">
                            @error('nid_card')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="photo" class="">House Clearance <span class="text-danger">*</span></label>
                        <div class="">

                            <input type="file" name="house_clearence"
                                   class="form-control @error('house_clearence') is-invalid @enderror" id="photo"
                                   placeholder="Photo" value="{{ old('house_clearence') }}">
                            @error('house_clearence')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="photo" class="">{{__('Business Licence')}}<span class="text-danger">*</span></label>
                        <div class="" >

                            <input type="file" name="business_licence"
                                   class="form-control @error('business_licence') is-invalid @enderror" id="photo"
                                   placeholder="Photo" value="{{ old('business_licence') }}">
                            @error('business_licence')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group col-lg-6">
                        <label for="photo" class="">{{__('Photo')}} <span class="text-danger">*</span></label>
                        <div class="">

                            <input type="file" name="photo"
                                   class="form-control @error('photo') is-invalid @enderror" id="photo"
                                   placeholder="Photo" value="{{ old('photo') }}">
                            @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card col-lg-12 mb-4">
{{--                    <input type="checkbox" id="checkbox" >Select All--}}
                    <label for="js-example-basic-multiple3">{{__('Select Preferred Service')}}  <span class="text-danger">*</span></label>
                    <select id="checkbox" class="js-example-basic-multiple3 form-control @error('service') is-invalid @enderror" name="service[]" multiple="multiple"  value="{{ old('service[]') }}">
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

                <div>
                    <input type="checkbox" name="terms" id="terms" onchange="activateButton(this)"> <a href="{{route('page.terms',app()->getLocale())}}">{{__('I Agree Terms & Condition"s')}}</a>

                </div>

            </div>


            <br><br>

            <div class="col-sm-8 offset-sm-2 mb-5">
                <button type="submit"  name="p" id="p" class="btn btn-success btn-block" >{{__('Request To Be A Partner')}}</button>
            </div>

        </form>


    </div>


@endsection

@section('js')
    <script>

        $("#checkbox").click(function(){
            if($("#checkbox").is(':checked') ){
                $("select > option").prop("selected","selected");
            }else{
                $("select > option").removeAttr("selected");
            }
        });


        $(document).ready(function () {
            $('.js-example-basic-multiple3').select2();
        });
        $(document).ready(function () {
            document.getElementById("p").disabled = true;
        });




        function activateButton(element) {

            if(element.checked) {
                document.getElementById("p").disabled = false;
            }
            else  {
                document.getElementById("p").disabled = true;
            }

        }
    </script>
@endsection
