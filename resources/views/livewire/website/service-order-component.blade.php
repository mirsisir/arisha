<div>

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


    <div class="content">
        <form action="" autocomplete="off">
            <div class=" ml-5 mr-5 mt-5 ">
                <div class="">
                    <div class=" ">
                        <div class="row">
                            <div class="col-lg-3 col-sm-12 ">
                                <label for="selected_category">{{__('Category')}}</label>
                                <select name="selected_category" wire:model="selected_category" id=""
                                        class="form-control @error('selected_category') is-invalid @enderror ">
                                    <option value=""></option>
                                    @foreach($category as $ctg)
                                        <option value="{{$ctg->name}}">{{__($ctg->name)}}</option>
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



                            <div class="col-lg-1 col-sm-12 mr-2">
                                <label for="weekly">{{__('Weekly Service')}} </label>
                                <input type="checkbox" class="form-control @error('weekly') is-invalid @enderror p-0"
                                       wire:model="weekly" style="zoom:1.5;">
                            </div>
                            <div class="col-lg-1 col-sm-12">
                                <label for="weekly"> {{__('Every 15 Day')}}</label>
                                <input type="checkbox" class="form-control @error('Every15day') is-invalid @enderror p-0"
                                       wire:model="Every15day" style="zoom:1.5;">
                            </div>






                            @if($weekly || $Every15day)

                                <div class="col-lg-2 col-sm-12">
                                    <label for="weekly">{{__('Day Name')}}</label>
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


                                <div class="col-lg-2 col-sm-12">
                                    <label for="date">{{__('Start Date')}}</label>
                                    <input type="date"
                                           class="form-control @error('start_date_time') is-invalid @enderror"
                                           wire:model.defer="start_date_time">
                                </div>
                                <div class="col-lg-2 col-sm-12">
                                    <label for="date">{{__('End Date')}}</label>
                                    <input type="date"
                                           class="form-control @error('end_date_time') is-invalid @enderror"
                                           wire:model.defer="end_date_time">
                                </div>
                                <div class="col-lg-2 col-sm-12">
                                    <label for="date">{{__('Time')}}</label>
                                    <input type="time"
                                           class="form-control @error('weekly_time') is-invalid @enderror"
                                           wire:model.defer="weekly_time" step="3600">
                                </div>

                            @else
                                @foreach($dates as $index=> $date)
                                    <div class="col-lg-4 row {{$index}}" id="{{$index}}">
                                        <div class="col-lg-6 col-sm-12">
                                            <label for="date">{{__('Date')}}</label>
                                            <input type="date"
                                                   class="form-control @error('dates.'.$index) is-invalid @enderror"

                                                   wire:model.defer="dates.{{ $index }}">
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label for="time">{{__('Time')}}</label>
                                            <input type="time"
                                                   class="form-control @error('daily_time.'.$index) is-invalid @enderror"
                                                   wire:model.defer="daily_time.{{ $index }}" step="3600">
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
                                           wire:model.defer="square_meter"/>
                                    @error('square_meter') <span
                                        class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                @elseif($selected_category == "Transport")

                                @if ($service_hourly == 1)
                                    <div class="col-lg-2 col-sm-12">
                                        <label for="">{{__('Duration')}}</label>
                                        <select name="" id="" wire:model.defer="duration" value="2"
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


                        <br><br>
                        <div class="row">
                            <div class=" col-lg-9 col-sm-12 border p-4">

                                @if($selected_category == "Transport")

                                    <h2 class="text-center btn-info p-1"> {{__('Pickup Address')}} </h2>
                                    <hr>

                                @else
                                    <h2 class="text-center btn-info p-1"> {{__('Customer Info')}} </h2>
                                    <hr>
                                @endif
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12">

                                        <label for="">{{__('Surname *')}}</label>
                                        <input type="text" wire:model.defer="customer_name"
                                               class="form-control @error('customer_name') is-invalid @enderror" id="customer_name">

                                        @error('customer_name') <span
                                            class="text-danger error">{{ $message }}</span>@enderror

                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <label for="">{{__('Telefon *')}}</label>
                                        <input type="tel" wire:model.defer="phone" id="customer_phonw"
                                               class="form-control @error('phone') is-invalid @enderror">
                                        @error('phone') <span class="text-danger error">{{ $message }}</span>@enderror


                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <label for="">{{__('Email')}}</label>
                                        <input type="email" wire:model.defer="email"
                                               class="form-control @error('Email') is-invalid @enderror" id="sender_email">
                                        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12" >
                                        <label for="">{{__('Straße *')}}</label>
                                        <input type="text" class="form-control @error('street') is-invalid @enderror"
                                               id="from_places"
                                               wire:model.defer="street" autocomplete="off">
                                        @error('street') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <label for="">{{__('Hausnummer *')}}</label>
                                        <input type="text"
                                               class="form-control  @error('house_number') is-invalid @enderror"
                                               wire:model.defer="house_number" autocomplete="on">
                                        @error('house_number') <span
                                            class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <label for="">{{__('PLZ *')}} </label>
                                        <input type="text" class="form-control  @error('postcode') is-invalid @enderror"
                                               name="postcode "
                                               wire:model.defer="postcode">
                                        @error('postcode') <span
                                            class="text-danger error">{{ $message }}</span>@enderror
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">{{__('Kommentar *')}}</label>
                                    <textarea class="form-control h-50 @error('notes') is-invalid @enderror"
                                              wire:model.defer="notes"></textarea>

                                </div>
                                <br>
                                <hr>
                                {{--                                TODO Pickoff Address    --}}


                                <div class="{{ $selected_category == "Transport"?'d-block':'d-none' }}">

                                    <h2 class="text-center btn-info p-1"> {{__('Pick off Address')}} </h2>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">

                                            <label for="">{{__('Surname *')}}</label>
                                            <input type="text" wire:model.defer="receiver_name"
                                                   class="form-control @error('receiver_name') is-invalid @enderror" id="receiver_name">
                                            @error('receiver_name')<span
                                                class="text-danger error">{{ $message }}</span>@enderror

                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="">{{__('Telefon *')}}</label>
                                            <input type="tel" wire:model.defer="receiver_phone" class="form-control" id="receiver_p">
                                            @error('receiver_phone') <span
                                                class="text-danger error">{{ $message }}</span>@enderror


                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="">{{__('Email')}}</label>
                                            <input type="email" wire:model.defer="receiver_email" id="receiver_e" class="form-control">
                                            @error('receiver_email') <span
                                                class="text-danger error">{{ $message }}</span>@enderror
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="">{{__('Straße *')}} to</label>
                                            <input type="text" autocomplete="off" name="to_places"
                                                   class="form-control @error('receiver_street') is-invalid @enderror "
                                                   id="to_places"
                                                   wire:model.defer="receiver_street">
                                            @error('receiver_street') <span
                                                class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="">{{__('Hausnummer *')}}</label>
                                            <input type="text"
                                                   class="form-control  @error('receiver_house') is-invalid @enderror"
                                                   name="receiver_house"
                                                   wire:model.defer="receiver_house" id="receiver_h">
                                            @error('receiver_house') <span
                                                class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="">{{__('PLZ *')}}</label>
                                            <input type="text"
                                                   class="form-control  @error('receiver_postcode') is-invalid @enderror"
                                                   name="receiver_postcode"
                                                   wire:model.defer="receiver_postcode">
                                            @error('receiver_postcode') <span
                                                class="text-danger error">{{ $message }}</span>@enderror
                                        </div>

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
                                    <label for="age1">{{__('Cash On Day')}}</label><br>

                                    <input wire:model="payments" type="radio" id="pay2" name="pay"
                                           value="Card payments">
                                    <label for="age2">{{__('Credit Cards')}}</label><br>
                                    <input wire:model="payments" type="radio" id="pay3" name="pay"
                                           value="Bank payments">
                                    <label for="age2">{{__('Bank Transfer')}}</label><br>

                                    @error('payments') <span class="text-danger error">{{ $message }}</span>@enderror
                                    <br>

                                </div>

                                    <input type="checkbox" name="terms" id="terms" wire:model.defer="Terms_and_Coditions" onchange="activateButton(this)">
                                    <p class="@error('Terms_and_Coditions') text-danger @enderror ">I Agree Terms &</p>
                                    <a href="{{route('privacy_policy',app()->getLocale())}}" class="link">Coditions</a>

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
                                            {{__('Request')}}
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
                                    <h3 class="text-center btn-info p-1 ">{{__('Your Bill(1 day)')}} </h3>
                                    <hr>
                                </div>

                                <br>
                                <div style="overflow-x:auto;" class="p-0">
                                    <table>
                                        <tr>
                                            <td><strong>{{__('Service Name')}}</strong></td>
                                            <td> {{$service_name->name?? "N/A"}}</td>
                                        </tr>

                                        @if($selected_category == "Construction")

                                            <tr>
                                                <td><strong>{{__('Square metre')}}</strong></td>
                                                <td class="float-right"> {{$service_name->SPM ?? "0"}}</td>
                                            </tr>
                                        @elseif($selected_category == "Transport")

                                            @if($service_name->hourly??0)
                                                <tr>
                                                    <td><strong>{{__('Per Hour')}}</strong></td>
                                                    <td class="float-right"> {{$service_name->charge ?? "0"}}</td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td><strong>{{__('Base Price')}}</strong></td>
                                                    <td class="float-right"> {{$service_name->basic_price ?? "0"}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>{{__('Each KM Charge')}}</strong></td>
                                                    <td class="float-right"> {{$service_name->km_price ?? "0"}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>{{__('Distance')}}</strong></td>
                                                    <td class="float-right"> {{$distance ?? "0"}}
                                                        <input type="text" wire:model="distance" id="distance" hidden>
                                                    </td>
                                                </tr>
                                            @endif

                                        @endif

                                        <tr>
                                            <td><strong>{{__('Service Charge')}}</strong></td>
                                            <td class="float-right"> {{$net_sum ?? "0"}}</td>
                                        </tr>

                                        <tr>
                                            <td><strong>{{__('Service vat')}} (19%)</strong></td>
                                            <td class="float-right">{{$vat ?? "0"}}</td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                        <tfoot>
                                        <tr class="border-top p-4">
                                            <td><strong>{{__('Total')}}</strong></td>
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


