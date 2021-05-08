@extends('layouts.employee.employee_base')
@section('content')
    <style>
        @media print {
            * {
                display: none;
            }

            #printableTable {
                display: block;
            }
        }

        .center {
            position: fixed;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
    @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
    @endif
    <form action="{{route('service_details_emp',$service_request->id)}}" method="POST">
        <div class="  mt-4 ml-auto mr-auto" id="printableTable">

            <h3 class="text-center mt-2">Service Request Info </h3>
            <form action="{{route('service_details_update',$service_request->id)}}" method="POST">
                @csrf
                <div class="table table-responsive-sm">
                    <table class="table border p-2" id="service_request">
                        <tbody>
                        <tr class="table-primary">
                            <td>Customer Name</td>
                            <td>{{$service_request->customer->name}}</td>
                        </tr>
                        <tr class="table-warning">
                            <td>Customer Phone</td>
                            <td>{{$service_request->customer->phone}}</td>
                        </tr>

                        @if($service_request->categorie=="Transport")
                            <tr>
                                <td>PickOff Address</td>
                            </tr>

                            <tr class="table-warning">
                                <td>Customer Address</td>
                                <td>
                                    {{$service_request->pickoff->house_number}}
                                    {{$service_request->pickoff->street}}<br>
                                    {{$service_request->pickoff->city}}
                                    {{$service_request->pickoff->post_code}}
                                </td>
                            </tr>
                            <tr class="table-warning">
                                <td>Notes</td>
                                <td>{{$service_request->pickoff->notes}}</td>
                            </tr>
                        @endif
                        @if($service_request->categorie=="Transport")
                            <tr>
                                <td>PickUp Address</td>
                            </tr>
                            <tr class="table-warning">
                                <td>Customer Address</td>
                                <td>
                                    {{$service_request->house_number}}
                                    {{$service_request->street}}<br>
                                    {{$service_request->city}}
                                    {{$service_request->post_code}}
                                </td>
                            </tr>
                            <tr class="table-warning">
                                <td>Notes</td>
                                <td>{{$service_request->notes}}</td>
                            </tr>
                        @else
                            <tr class="table-warning">
                                <td>Customer Address</td>
                                <td>
                                    {{$service_request->house_number}}
                                    {{$service_request->street}}<br>
                                    {{$service_request->city}}
                                    {{$service_request->post_code}}
                                </td>
                            </tr>
                            <tr class="table-warning">
                                <td>Notes</td>
                                <td>{{$service_request->notes}}</td>
                            </tr>
                        @endif


                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="table-primary">
                            <td>Service Name</td>
                            <td>{{$service_request->service->name}}</td>
                        </tr>
                        <tr class="table-info">
                            <td>Start Time</td>
                            <td>{{$service_request->start_time}}</td>
                        </tr>
                        <tr class="table-info">
                            <td>Service date</td>
                            <td>{{ date('d-m-Y', strtotime($service_request->date)) }}</td>
                        </tr>


                        @if($service_request->categorie=="Cleaning")
                            <tr class="table-info">
                                <td>Service Duration</td>
                                <td>

                                    <input  class="html-duration-picker" data-hide-seconds  name="duration"
                                            value="{{$service_request->duration}}"  step="5" style="width:100px"> Hours

                                </td>
                            </tr>
                        @elseif($service_request->categorie=="Construction")
                            <tr class="table-info">
                                <td>Service Duration</td>
                                <td><input type="number" value="{{$service_request->SPM}}" name="square_meter"> Square meter
                                </td>
                            </tr>
                        @elseif($service_request->categorie=="Transport")

                            @if($service_request->hourly)
                                <tr class="table-info">
                                    <td>Service Duration</td>
                                    <td>
                                        <input  class="html-duration-picker" data-hide-seconds  name="duration"
                                                value="{{$service_request->duration}}"  step="5" style="width:100px"> Hours

                                    </td>
                                </tr>
                            @else
                                <tr class="table-info">
                                    <td>Distance</td>
                                    <td>
                                        <input name="distance" id="distance" value="{{$service_request->distance}}"   style="width:100px">
                                    </td>
                                </tr>

                                <tr class="table-info">
                                    <td>Stopover Charge</td>
                                    <td>
                                        <input  name="stopover" style="width:100px" value="{{$service_request->stopover_charge}}" >
                                    </td>
                                </tr>
                                <tr class="table-info">
                                    <td>Waiting Time </td>
                                    <td>
                                        <input  class="html-duration-picker" data-hide-seconds  name="waiting" style="width:100px" value="{{$service_request->waiting_charge}}" > Hours
                                    </td>
                                </tr>


                            @endif

                        @endif


                        <tr class="table-info">
                            <td>Service Charge</td>
                            <td>{{$service_request->total_charge}}</td>
                        </tr>
                        <tr class="table-info">
                            <td>Service Payment</td>
                            <td>{{$service_request->payments}}</td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                        </tr>


                        <tr class="table-primary">
                            <td>Employee Name</td>
                            <td>{{$service_request->employee->name ?? "N/A" }}</td>
                        </tr>

                        <tr class="table-warning">
                            <td>Employee Phone</td>
                            <td>{{$service_request->employee->phone ?? "N/A"}} </td>
                        </tr>
                        <tr class="table-warning">
                            <td>Payment Status</td>
                            <td>{{$service_request->paid == 0 ? "Due" : "Paid"}} </td>
                        </tr>


                        </tbody>
                    </table>
                </div>

                @if($service_request->status=="complete")


                    @else
                    <div class="m-auto text-center">
                        <button class="btn btn-info mb-5 " type="submit">update</button>
                    </div>


            </form>

            @if ($service_request->payments != "Card payments")
                <div class="center">
                    <a href="{{route('complete',$service_request->id)}}" class="btn btn-success"> Complete </a>

                </div>
            @endif
            @if ($service_request->payments == "Card payments")
                <div class="card-body ">

                    @if (Session::has('success'))
                        <div class="alert alert-danger text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif

                    <form
                        role="form"
                        action="{{route('complete',$service_request->id)}}"
                        {{--                    method="post"--}}
                        class="require-validation"
                        data-cc-on-file="false"
                        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                        id="payment-form">
                        {{--                    @csrf--}}
                        <div class="card_details" style="display:none">
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label>
                                <input value="{{$card->card_name}}" class='form-control' size='4' type='text'>
                            </div>



                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label>
                                <input autocomplete='off' value="{{$card->card_number}}" class='form-control card-number' size='20'
                                       type='text'>
                            </div>


                            <div class='row'>
                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                    <label class='control-label'>CVC</label>
                                    <input autocomplete='off' class='form-control card-cvc' value="{{$card->cvc}}" placeholder='ex. 311' size='4' type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Exp.Month</label>
                                    <input value="{{$card->exp_month}}"  class='form-control card-expiry-month' placeholder='MM' size='2'
                                           type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Exp.Year</label> <input
                                        class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                        type='text' value="{{$card->exp_year}}">
                                </div>
                            </div>

                            <div >
                                <div class='col-md-12 error form-group' id="erorrContainer" style="display:none">
                                    <div class='alert-danger alert' id="error">Please correct the errors and try
                                        again.</div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="center">
                                <button class="btn btn-primary" type="submit">Complete</button>
                            </div>
                        </div>

                    </form>
                </div>
            @endif
            @endif

            <br><br>
        </div>






@endsection
        @section('js')
            <script>


                // In your Javascript (external .js resource or <script> tag)
                $(document).ready(function () {
                    $('.select2').select2();
                });

                function myFunction() {
                    var x = document.getElementById("voucher");
                    var y = document.getElementById("no_voucher");

                    if (x.style.display === "none") {
                        x.style.display = "block";
                        y.style.display = "none";
                    } else {
                        x.style.display = "none";
                        y.style.display = "block";
                    }
                }

                $(function() {

                    var $form         = $(".require-validation");

                    $('form.require-validation').bind('submit', function(e) {
                        var $form         = $(".require-validation"),
                            inputSelector = ['input[type=email]', 'input[type=password]',
                                'input[type=text]', 'input[type=file]',
                                'textarea'].join(', '),
                            $inputs       = $form.find('.required').find(inputSelector),
                            $errorMessage = $form.find('div.error'),
                            valid         = true;
                        $errorMessage.addClass('hide');

                        $('.has-error').removeClass('has-error');
                        $inputs.each(function(i, el) {
                            var $input = $(el);
                            if ($input.val() === '') {
                                $input.parent().addClass('has-error');
                                $errorMessage.removeClass('hide');
                                e.preventDefault();
                            }
                        });

                        if (!$form.data('cc-on-file')) {
                            e.preventDefault();
                            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                            Stripe.createToken({
                                number: $('.card-number').val(),
                                cvc: $('.card-cvc').val(),
                                exp_month: $('.card-expiry-month').val(),
                                exp_year: $('.card-expiry-year').val()
                            }, stripeResponseHandler);
                        }

                    });

                    function stripeResponseHandler(status, response) {
                        if (response.error) {
                            $('.error')
                                .removeClass('hide')
                                .find('.alert')
                                .text(response.error.message);
                        } else {
                            /* token contains id, last4, and card type */
                            var token = response['id'];

                            $form.find('input[type=text]').empty();
                            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                            $form.get(0).submit();
                        }
                    }

                });
            </script>


@endsection
