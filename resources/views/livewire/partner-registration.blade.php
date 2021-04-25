<div>
    <style>
        .invalid-feedback{
            color: red
        }
    </style>

    <title>Laravel Multiple Select Dropdown with Checkbox Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <form wire:submit.prevent="store" class="forms-sample mt-5">
    <h2 class="text-center mb-3 text-info">Partner Registration</h2>
        <div class="d-flex justify-content-between w-75 m-auto m-4 border p-3 row">
            <div class="card col-lg-5 mr-3 col-sm-11">
                <div class="card-body">
                    <h2 class="card-title font-weight-bolder">Personal Details</h2>
                    <div class="form-group">
                        <label for="fname" class="">First Name <span class="text-danger">*</span></label>
                        <div class="">
                            <input type="text" wire:model.lazy="fname"
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
                            <input type="text" wire:model.lazy="lname"
                                   class="form-control @error('lname') is-invalid @enderror" id="lname"
                                   placeholder="Last Name">
                            @error('lname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group" >
                        <label for="gender">Gender <span class="text-danger">*</span></label>
                        <select class="form-control @error('gender') is-invalid @enderror" id="gender"
                                wire:model.lazy="gender">
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
                            <input type="text" wire:model.lazy="nation"
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
                        <label for="nid" class=""> Bank Account <span class="text-danger">*</span></label>
                        <div class="">
                            <input type="text" wire:model.lazy="nid"
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
                            <input type="text" wire:model.lazy="nid"
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
                        <label for="address" class="">House Number  <span class="text-danger">*</span></label>
                        <div class="">
                            <input type="text" wire:model.lazy="address"
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
                            <input type="text" wire:model.lazy="street"
                                   class="form-control @error('street') is-invalid @enderror" id="city"
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
                            <input type="text" wire:model.lazy="city"
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
                            <input type="text" wire:model.lazy="street"
                                   class="form-control @error('post_code') is-invalid @enderror" id="city"
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
                            <input type="text" wire:model.lazy="phone"
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
                            <input type="email" wire:model.lazy="email"
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

                        <input type="file" wire:model.lazy="nid_card"
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

                        <input type="file" wire:model.lazy="nid_card"
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

                        <input type="file" wire:model.lazy="nid_card"
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
                        @if ($photo)
                            <img width="60px" height="60px" src="{{ $photo->temporaryUrl() }}">
                        @endif
                        <input type="file" wire:model.lazy="photo"
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

            <div class="card">



                <select class="js-example-basic-multiple3" name="states[]" multiple="multiple">
                    <option value="AL">Alabama</option>
                    ...
                    <option value="WY">Wyoming</option>
                </select>



                </div>


            </div>


        <br>
        <div class="col-sm-8 offset-sm-2 mb-5">
            <button type="submit" class="btn btn-success btn-block">Request To Be A Partner</button>
        </div>
    </form>


</div>

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple3').select2();
    });
</script>

