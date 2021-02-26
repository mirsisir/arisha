    <style type="text/css">
        .card-title {
            display: inline;
            font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;

        }
    </style>


<div class="container">

    <div class="row ">
        <div class="col-md-6 mx-auto border">
            <div class="card card-default credit-card-box">
                <div class="card-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="card-title display-td" >Payment Details</h3>
                        <div class="display-td" >
                            <img class="img-responsive float-right" src="http://apa.internationalscienceediting.com/wp-content/uploads/2017/02/logo-stripe.png">
                        </div>
                    </div>
                </div>
                <div class="card-body ">

                    @if (Session::has('success'))
                        <div class="alert alert-danger text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif



                    <form
                        role="form"

                        class="require-validation"
                        data-cc-on-file="false"
                        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                        id="payment-form">
                        @csrf


                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control' size='4' type='text'>
                            </div>



                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-number' size='20'
                                    type='text'>
                            </div>


                        <div class='row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                                                                class='form-control card-cvc' placeholder='ex. 311' size='4'
                                                                                type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Exp.Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Exp.Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                        </div>

                        <div >
                            <div class='col-md-12 error form-group' id="erorrContainer" style="display:none">
                                <div class='alert-danger alert' id="error">Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>

{{--                        <div class="row">--}}
{{--                            <div class="col-xs-12">--}}
{{--                                <button id="payButton" class="btn btn-primary btn-lg btn-block" type="button">Pay Now ($100)</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

@section('js')
    <script type="text/javascript">
        $(function() {

            var $form         = $(".require-validation");

            $('#payButton').on('click', function(e) {
                e.preventDefault();
               // alert("lksjdlksdj")
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
                    if ($('.card-number').val() === ''){
                        // alert('card number could not be empty');
                    }
                    e.preventDefault();
                    let p_key = '{{ env('STRIPE_KEY') }}';
                    Stripe.setPublishableKey(p_key);
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
                    $('#erorrContainer').show();

                    $('#error').text(response.error.message);

                    console.log(response)
                    console.log(response.error)
                    // alert(response.error.message)
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden'  name='stripeToken' value='" + token + "' >");
                    // $form.get(0).submit();
                    // @this.set('stripeToken', '1')

                    $('#erorrContainer').hide();

                    Livewire.emit('onStripToken',token)
                }
            }

        });
    </script>

@endsection
