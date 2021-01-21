<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    <div class=" m-5 border mt-3 p-2">


        @if(count($all_service_request) == 0)
            <br>
            <br>
            <h4 class=" text-center btn-danger p-3" style="border-radius: 25px; color:black;">No Service Request
                Available</h4>
            <br>
        @else
            <table class="table table-responsive">
                <thead class="btn-info">
                <tr>
                    <th> Customer</th>
                    <th> Service Name</th>
                    <th> Address</th>
                    <th> Date</th>
                    <th> Duration</th>
                    <th> Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all_service_request as $request)
                    <tr>
                        <td>{{$request->customer->name}} <br>
                            {{$request->customer->phone}}
                        </td>
                        <td>{{$request->service->name}}</td>
                        <td>
                            {{$request->house_number}}
                            {{$request->street}}<br>
                            {{$request->city}}
                            {{$request->post_code}}

                        </td>

                        <td>
                            {{$request->date}} <br>
                            Time : : {{$request->start_time}}
                        </td>
                        <td>
                            @if($request->categorie == "Construction")
                                {{$request->SPM}} Square meter
                            @elseif($request->categorie == "Cleaning")
                                {{$request->duration}}
                            @else
                            @endif

                        </td>
                        <td>
                            <a href="{{route('service_details',$request->id)}}" class="btn btn-info"> Details </a>

                            <div wire:click="confirm({{$request->id}})" class="btn btn-success">Confirm</div>
                             <div wire:click="hold({{$request->id}})" class="btn btn-warning">Hold</div>


                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#exampleModal{{$request->id}}">Reject
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$request->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <button type="button" class="close float-right" data-dismiss="modal"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>

                                        <div class="modal-body pb-1">
                                            <H3 class="text-center">Are you sure you want to reject
                                                ? {{$request->id}} </H3>
                                            <br>
                                        </div>

                                        <div>
                                            <div wire:click="reject({{$request->id}})" class="btn btn-danger float-right m-3" data-dismiss="modal">Reject Confirm
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </td>


                    </tr>
                @endforeach

                </tbody>
            </table>

        @endif
    </div>

</div>
