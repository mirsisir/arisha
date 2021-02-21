<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    <div class=" card  border  p-5">


        @if(count($all_service_request) == 0)
            <br>
            <br>
            <h4 class=" text-center btn-danger p-3" style="border-radius: 25px; color:black;">No Service Request
                Available</h4>
            <br>
        @else
            <table  class="display table-sm" id="table">
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
                            {{$request->house_number}} <br>
                            {{$request->street}}<br>
                            {{$request->city}} <br>
                            {{$request->post_code}}

                        </td>

                        <td>
                            {{$request->date}} <br>
                            Time : : {{$request->start_time}}
                        </td>
                        <td>
                            @if($request->categorie == "Construction")
                                {{$request->SPM}} Sq m
                            @elseif($request->categorie == "Cleaning")
                                {{$request->duration}}
                            @elseif($request->categorie == "Transport")
                                @if($request->service->hourly)
                                    {{$request->duration}}
                                @else
                                    {{$request->distance?? 0}} km
                                @endif

                            @endif

                        </td>
                        <td>
                            <a href="{{route('service_details',$request->id)}}" class="btn btn-info btn-sm">
                                <i class="mdi mdi-eye"></i> </a>

                            <div wire:click="confirm({{$request->id}})" class="btn btn-success btn-sm">
                                <i class="mdi mdi-checkbox-marked-circle-outline"></i></div>
                            <div wire:click="hold({{$request->id}})" class="btn btn-warning btn-sm"><i
                                    class="mdi mdi-pause"></i></div>


                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#exampleModal{{$request->id}}"><i class="mdi mdi-close"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$request->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">

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
                                            <div wire:click="reject({{$request->id}})"
                                                 class="btn btn-danger float-right m-3" data-dismiss="modal">Reject
                                                Confirm
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

@section('js')
    <script>
        $(document).ready(function () {
            $('#table').DataTable();
        });
    </script>
@endsection
