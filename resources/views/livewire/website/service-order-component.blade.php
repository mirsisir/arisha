<div>
    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"--}}
    {{--          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
    {{--    <div class="container">--}}
    {{--        <p>Below you can find a list of available time slots for Einmalige Reinigung by Md Razumul Haque. <br>--}}
    {{--            Click on a time slot to proceed with booking.</p>--}}
    {{--    </div>--}}
    <style>
        .border {
            border: 5px solid #dee2e6 !important;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            height: 50px;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        .is-invalid {
            border-color: red;
        }

    </style>
{{--    --}}
{{--    @if ($errors->any())--}}
{{--        <div class="alert alert-danger">--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}

    <div class="content">
        <form action="" autocomplete="off">
            <div class=" ml-5 mr-5 ">
                <div class="">
                    <div class=" ">
                        <div class="row">
                            <div class="col-lg-3 col-sm-12 ">
                                <label for="selected_category">{{__('Category')}}</label>
                                <select name="selected_category" wire:model="selected_category" id=""
                                        class="form-control @error('selected_category') is-invalid @enderror ">
                                    <option value=""></option>
                                    @foreach($category as $ctg)
                                        <option value="{{$ctg->name}}">{{$ctg->name}}</option>
                                    @endforeach
                                </select>
                                @error('selected_category') <span
                                    class="text-danger error">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-lg-3 col-sm-12">
                                <label for="">{{__('Service')}}</label>
                                <select name="" id="" wire:model="selected_service"
                                        class="form-control @error('selected_service') is-invalid @enderror">
                                    <option value=""></option>
                                    @foreach($service?? [] as $srv)
                                        <option value="{{$srv->id}}">{{$srv->name}}</option>
                                    @endforeach
                                </select>
                                @error('selected_service') <span
                                    class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            {{--                <div class="col-3">--}}
                            {{--                    <label for="">Employee</label>--}}
                            {{--                    <select name="" id="" wire:model="selected_employee" class="form-control @error('selected_employee') is-invalid @enderror">--}}
                            {{--                        <option value=""></option>--}}
                            {{--                        @foreach($employee as $emp)--}}
                            {{--                            <option value="{{$emp->id}}">{{$emp->fname}} {{$emp->lname}}</option>--}}
                            {{--                        @endforeach--}}
                            {{--                    </select>--}}

                            {{--                </div>--}}

                            <div class="col-lg-1 col-sm-12">
                                <label for="weekly">{{__('Weekly Service')}}</label>
                                <input type="checkbox" class="form-control @error('weekly') is-invalid @enderror p-0"
                                       wire:model="weekly" style="zoom:1.5;">
                            </div>
                            @if($weekly)

                                <div class="col-lg-2 col-sm-12">
                                    <label for="weekly">{{__('Weekly Service')}}</label>
                                    <select multiple name="weekday" style="height: 60px; padding: 0;"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="right" wire:model="weekly_day"
                                            title="Hold down the Ctrl button to select multiple options."
                                            class="form-control @error('weekly_day') is-invalid @enderror ">
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                        <option value="Saturday">Saturday</option>
                                        <option value="Sunday">Sunday</option>
                                    </select>
                                </div>

                                {{--                            <div class="col-lg-2 col-sm-12">--}}
                                {{--                                <label for="weekly">{{__('Week Count')}}</label>--}}
                                {{--                                <input type="number" min="1" max="10"--}}
                                {{--                                       class="form-control @error('weekly') is-invalid @enderror"--}}
                                {{--                                       wire:model="week_count">--}}
                                {{--                            </div>--}}

                                <div class="col-lg-2 col-sm-12">
                                    <label for="date">{{__('Start Date')}}</label>
                                    <input type="date"
                                           class="form-control @error('start_date_time') is-invalid @enderror"
                                           wire:model="start_date_time">
                                </div>
                                <div class="col-lg-2 col-sm-12">
                                    <label for="date">{{__('End Date')}}</label>
                                    <input type="date"
                                           class="form-control @error('end_date_time') is-invalid @enderror"
                                           wire:model="end_date_time">
                                </div>
                                <div class="col-lg-2 col-sm-12">
                                    <label for="date">{{__('Time')}}</label>
                                    <input type="time"
                                           class="form-control @error('weekly_time') is-invalid @enderror"
                                           wire:model="weekly_time" step="3600">
                                </div>

                            @else
                                @foreach($dates as $index=> $date)
                                    <div class="col-lg-4 row">
                                        <div class="col-lg-6 col-sm-12">
                                            <label for="date">{{__('Date')}}</label>
                                            <input type="date"
                                                   class="form-control @error('dates.'.$index) is-invalid @enderror"

                                                   wire:model="dates.{{ $index }}">
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label for="time">{{__('Time')}}</label>
                                            <input type="time"
                                                   class="form-control @error('daily_time.'.$index) is-invalid @enderror"
                                                   wire:model="daily_time.{{ $index }}" step="3600">
                                        </div>
                                    </div>
                                    <div class="text-center ml-2" style="display:{{ $index === 0 ? 'none':'block'   }} ">
                                        <div wire:click.prevent="removeDates({{ $index }})" class=" btn btn-danger mt-4">-</div>
                                    </div>
                                @endforeach

                                <div class="text-center">
                                    <div wire:click.prevent="addDates" class=" btn btn-success mt-4">+</div>
                                </div>

                            @endif






                            @if($selected_category == "Cleaning")
                                <div class="col-lg-2 col-sm-12">
                                    <label for="">{{__('Duration')}}</label>
                                    <select name="" id="" wire:model="duration"
                                            class="form-control @error('duration') is-invalid @enderror ">
                                        <option value=""></option>
                                        @for($i=1 ; $i<=10 ;$i++)
                                            <option value="{{$i}}">{{$i}} Hours</option>
                                        @endfor
                                    </select>
                                </div>

                            @elseif($selected_category == "Construction")

                                <div class="col-lg-3 col-sm-12">
                                    <label for="">{{__('Square meter')}}</label>
                                    <input class="form-control" type="number" min="50" max="999"
                                           wire:model="square_meter"/>
                                    @error('square_meter') <span
                                        class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                @elseif($selected_category == "Transport")

                                @if ($service_hourly == 1)
                                    <div class="col-lg-2 col-sm-12">
                                        <label for="">{{__('Duration')}}</label>
                                        <select name="" id="" wire:model="duration" value="2"
                                                class="form-control @error('duration') is-invalid @enderror ">
                                            <option value=""></option>
                                            @for($i=2 ; $i<=10 ;$i++)
                                                <option value="{{$i}}">{{$i}} Hours</option>
                                            @endfor
                                        </select>
                                    </div>
                                    @endif
                            @endif


                        </div>

                        {{--            <div class="row mt-2">--}}

                        {{--                <div class="col-6">--}}
                        {{--                    <label for="">Date</label>--}}

                        {{--                    <input type="date" name="date" wire:model="date" id="" class="form-control @error('date') is-invalid @enderror">--}}


                        {{--                </div>--}}



                        {{--                <div class="col-6">--}}
                        {{--                    <label for="">Start Time</label>--}}
                        {{--                    <select name="" id="" class="form-control" wire:model="start_time">--}}
                        {{--                        @for ($i=9; $i<=18 ;$i++)--}}
                        {{--                            <option--}}
                        {{--                                @foreach($total_start_time as $t)--}}
                        {{--                                @if($t==$i) disabled  style="background: #818181; color: whitesmoke" @endif--}}
                        {{--                                 @endforeach--}}
                        {{--                            value="{{$i}}">{{$i}}:00</option>--}}
                        {{--                        @endfor--}}

                        {{--                                <option value="9">9:00 AM</option>--}}
                        {{--                                <option value="10">10:00 AM</option>--}}
                        {{--                                <option value="11">11:00 AM</option>--}}
                        {{--                                <option value="12">12:00 PM</option>--}}
                        {{--                                <option value="13">1:00 PM</option>--}}
                        {{--                                <option value="13">2:00 PM</option>--}}
                        {{--                                <option value="14">3:00 PM</option>--}}
                        {{--                                <option value="15">4:00 PM</option>--}}
                        {{--                                <option value="16">5:00 PM</option>--}}
                        {{--                                <option value="17">6:00 PM</option>--}}
                        {{--                                <option value="18">7:00 PM</option>--}}
                        {{--                                <option value="19">8:00 PM</option>--}}
                        {{--                                <option value="20">9:00 PM</option>--}}
                        {{--                                <option value="21">10:00 PM</option>--}}
                        {{--                    </select>--}}
                        {{--                    @error('start_time') <span class="text-danger error">{{ $message }}</span>@enderror--}}

                        {{--                </div>--}}
                        {{--            </div>--}}


                        <br><br>
                        <div class="row">
                            <div class=" col-lg-9 col-sm-12 border p-4">

                                @if($selected_category == "Transport")

                                    <h2 class="text-center btn-info p-1"> Pickup Address </h2>
                                    <hr>

                                @else
                                    <h2 class="text-center btn-info p-1"> Customer Info </h2>
                                    <hr>
                                @endif
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12">

                                        <label for="">{{__('Surname *')}}</label>
                                        <input type="text" wire:model="customer_name"
                                               class="form-control @error('customer_name') is-invalid @enderror">

                                        @error('customer_name') <span
                                            class="text-danger error">{{ $message }}</span>@enderror

                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <label for="">{{__('Telefon *')}}</label>
                                        <input type="tel" wire:model="phone" id="customer"
                                               class="form-control @error('phone') is-invalid @enderror">
                                        @error('phone') <span class="text-danger error">{{ $message }}</span>@enderror


                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <label for="">{{__('Email')}}</label>
                                        <input type="email" wire:model="email"
                                               class="form-control @error('Email') is-invalid @enderror">
                                        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror

                                    </div>
                                    {{--                <div class="col-3">--}}
                                    {{--                    <label for="">Address</label>--}}
                                    {{--                    <input type="text" wire:model="address" class="form-control ">--}}
                                    {{--                    @error('address') <span class="text-danger error">{{ $message }}</span>@enderror--}}

                                    {{--                </div>--}}

                                    {{--                <p>Below you can find a list of available time slots for Einmalige Reinigung by Md Razumul Haque. <br>--}}
                                    {{--                    Click on a time slot to proceed with booking.</p>--}}
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12">
                                        <label for="">{{__('Straße *')}}</label>
                                        <input type="text" class="form-control @error('street') is-invalid @enderror"
                                               id="from_places"
                                               wire:model.lazy="street" autocomplete="off">
                                        @error('street') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <label for="">{{__('Hausnummer *')}}</label>
                                        <input type="text"
                                               class="form-control  @error('house_number') is-invalid @enderror"
                                               wire:model.lazy="house_number" autocomplete="on">
                                        @error('house_number') <span
                                            class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <label for="">{{__('PLZ *')}} </label>
                                        <input type="text" class="form-control  @error('postcode') is-invalid @enderror"
                                               name="postcode "
                                               wire:model="postcode">
                                        @error('postcode') <span
                                            class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                    {{--                                    <div class="col-lg-3 col-sm-12">--}}
                                    {{--                                        <label for="">{{__('Stadt *')}}</label>--}}
                                    {{--                                        <input type="text" class="form-control" name="city" wire:model="city">--}}

                                    {{--                                    </div>--}}
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">{{__('Kommentar *')}}</label>
                                    <textarea class="form-control h-50 @error('notes') is-invalid @enderror"
                                              wire:model="notes"></textarea>

                                </div>
                                <br>
                                <hr>
                                {{--                                TODO Pickoff Address    --}}


                                <div class="{{ $selected_category == "Transport"?'d-block':'d-none' }}">

                                    <h2 class="text-center btn-info p-1"> Pickoff Address </h2>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">

                                            <label for="">{{__('Surname *')}}</label>
                                            <input type="text" wire:model="receiver_name"
                                                   class="form-control @error('receiver_name') is-invalid @enderror">
                                            @error('receiver_name')<span
                                                class="text-danger error">{{ $message }}</span>@enderror

                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="">{{__('Telefon *')}}</label>
                                            <input type="tel" wire:model="receiver_phone" class="form-control">
                                            @error('receiver_phone') <span
                                                class="text-danger error">{{ $message }}</span>@enderror


                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="">{{__('Email')}}</label>
                                            <input type="email" wire:model="receiver_email" class="form-control">
                                            @error('receiver_email') <span
                                                class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                        {{--                <div class="col-3">--}}
                                        {{--                    <label for="">Address</label>--}}
                                        {{--                    <input type="text" wire:model="address" class="form-control ">--}}
                                        {{--                    @error('address') <span class="text-danger error">{{ $message }}</span>@enderror--}}

                                        {{--                </div>--}}

                                        {{--                <p>Below you can find a list of available time slots for Einmalige Reinigung by Md Razumul Haque. <br>--}}
                                        {{--                    Click on a time slot to proceed with booking.</p>--}}
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="">{{__('Straße *')}} to</label>
                                            <input type="text" autocomplete="off"
                                                   class="form-control  @error('receiver_street') is-invalid @enderror "
                                                   id="to_places"
                                                   wire:model.lazy="receiver_street">
                                            @error('receiver_street') <span
                                                class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="">{{__('Hausnummer *')}}</label>
                                            <input type="text"
                                                   class="form-control  @error('receiver_house') is-invalid @enderror"
                                                   name="receiver_house"
                                                   wire:model="receiver_house">
                                            @error('receiver_house') <span
                                                class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="">{{__('PLZ *')}}</label>
                                            <input type="text"
                                                   class="form-control  @error('receiver_postcode') is-invalid @enderror"
                                                   name="receiver_postcode"
                                                   wire:model="receiver_postcode">
                                            @error('receiver_postcode') <span
                                                class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                        {{--                                        <div class="col-lg-3 col-sm-12">--}}
                                        {{--                                            <label for="">{{__('Stadt *')}}</label>--}}
                                        {{--                                            <input type="text" class="form-control" name="city" wire:model="receiver_city">--}}

                                        {{--                                        </div>--}}
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">{{__('Kommentar *')}}</label>
                                        <textarea
                                            class="form-control h-50 @error('receiver_notes') is-invalid @enderror"
                                            wire:model="receiver_notes"></textarea>

                                    </div>
                                </div>


                                <div>
                                    <p>{{(__('Please tell us how you would like to pay:'))}}</p>

                                    <input wire:model="payments" type="radio" id="pay1" name="pay"
                                           value="Cash payments">
                                    <label for="age1">{{__('I will pay locally')}}</label><br>

                                    <input wire:model="payments" type="radio" id="pay2" name="pay"
                                           value="Card payments">
                                    <label for="age2">{{__('Card')}}</label><br>
                                    <input wire:model="payments" type="radio" id="pay3" name="pay"
                                           value="Bank payments">
                                    <label for="age2">{{__('Bank')}}</label><br>

                                    @error('payments') <span class="text-danger error">{{ $message }}</span>@enderror


                                </div>


                                <div style="display:{{ $payments == "Card payments" ? 'block' :'none'  }}">


                                    <div class="strip" wire:ignore>

                                        @include('stripe')

                                    </div>

                                    @if (!empty($message))
                                        <div class="alert alert-success text-center">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                            <p>{{ $message }}</p>
                                        </div>
                                    @endif
                                    <div class="float-right">
                                        <button id="payButton" class="btn btn-primary  btn-block float-right" type="button">
                                            Request
                                        </button>
                                    </div>
                                </div>

                                @if($payments !== "Card payments")
                                    <input type="button" value="Request" class="btn btn-success float-right"
                                           wire:click="request">
                                @endif

                            </div>
                            <br>
                            <br><br>
                            {{--                        TODO Bill--}}

                            <div class="col-lg-3 col-sm-12 border ">
                                <div class=" p-4">
                                    <h3 class="text-center btn-info p-1 ">Your Bill</h3>
                                    <hr>
                                </div>

                                <br>
                                <div style="overflow-x:auto;" class="p-0">
                                    <table>
                                        <tr>
                                            <td><strong>Service Name</strong></td>
                                            <td> {{$service_name->name?? "N/A"}}</td>
                                        </tr>

                                        @if($selected_category == "Construction")

                                            <tr>
                                                <td><strong>Square metre</strong></td>
                                                <td class="float-right"> {{$service_name->SPM ?? "0"}}</td>
                                            </tr>
                                        @elseif($selected_category == "Transport")

                                            @if($service_name->hourly??0)
                                                <tr>
                                                    <td><strong>Per Hour</strong></td>
                                                    <td class="float-right"> {{$service_name->charge ?? "0"}}</td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td><strong>Base Price</strong></td>
                                                    <td class="float-right"> {{$service_name->basic_price ?? "0"}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Each KM Charge</strong></td>
                                                    <td class="float-right"> {{$service_name->km_price ?? "0"}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Distance</strong></td>
                                                    <td class="float-right"> {{$distance ?? "0"}}
                                                        <input type="text" wire:model="distance" id="distance" hidden>
                                                    </td>
                                                </tr>
                                            @endif

                                        @endif

                                        <tr>
                                            <td><strong>Service Charge</strong></td>
                                            <td class="float-right"> {{$net_sum ?? "0"}}</td>
                                        </tr>

                                        <tr>
                                            <td><strong>Service vat (19%)</strong></td>
                                            <td class="float-right">{{$vat ?? "0"}}</td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                        <tfoot>
                                        <tr class="border-top p-4">
                                            <td><strong>Total</strong></td>
                                            <td class="float-right">{{$total_charge ?? "0"}}</td>
                                        </tr>
                                        </tfoot>


                                    </table>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </form>

    </div>

</div>

@section('js')

@endsection


