@extends('layouts.web.web_base')
@section('content')

    <style>
        body {font-family: Arial;}

        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #479c18;
            color: white;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #337011;
            color: white;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
    </style>

<div class="card ml-5 mr-5"><br>
    <div class="card-body ml-5 mr-5">
        <h2>Dashboard</h2>
{{--        <p>Click on the buttons inside the tabbed menu:</p>--}}

        <div class="tab mt-1">
            <button class="tablinks active" onclick="openCity(event, 'London')">All Pending</button>
            <button class="tablinks" onclick="openCity(event, 'hold')">All Hold</button>
            <button class="tablinks" onclick="openCity(event, 'Paris')">All Accepted</button>
            <button class="tablinks" onclick="openCity(event, 'Tokyo')">All Done</button>
        </div>

        <div id="London" class="tabcontent" style="display:block"  >
            <h3>All Pending Request</h3>
            <table id="table_id0" class="display nowrap" style="width:100%">
                <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Service Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Duration</th>
                    <th>Amount</th>
                    <th>Total Amount</th>
                </tr>
                </thead>
                <tbody>

                @foreach($pending_service as $request)
                <tr>
                    <td>DE-{{$request->id}}</td>
                    <td>{{$request->service->name}}</td>
                    <td>{{$request->date}}</td>
                    <td>{{$request->start_time}}</td>

                    <td>{{$request->duration}}</td>
                    <td>{{$request->net_charge}}</td>
                    <td>{{$request->total_charge}}</td>
                </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Order ID</th>
                    <th>Service Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Duration</th>
                    <th>Amount</th>
                    <th>Total Amount</th>
                </tr>
                </tfoot>
            </table>
        </div>

        <div id="hold" class="tabcontent">
            <h3>All Hold Request</h3>
            <table id="table_id3" class="display nowrap" style="width:100%">
                <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Service Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Duration</th>
                    <th>Amount</th>
                    <th>Total Amount</th>
                </tr>
                </thead>
                <tbody>

                @foreach($hold_service as $request)
                    <tr>
                        <td>DE-{{$request->id}}</td>
                        <td>{{$request->service->name}}</td>
                        <td>{{$request->date}}</td>
                        <td>{{$request->start_time}}</td>

                        <td>{{$request->duration}}</td>
                        <td>{{$request->net_charge}}</td>
                        <td>{{$request->total_charge}}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Order ID</th>
                    <th>Service Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Duration</th>
                    <th>Amount</th>
                    <th>Total Amount</th>
                </tr>
                </tfoot>
            </table>

        </div>

        <div id="Paris" class="tabcontent">
            <h3>All Accepted Request</h3>
            <table id="table_id1" class="display nowrap" style="width:100%">
                <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Service Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Duration</th>
                    <th>Amount</th>
                    <th>Total Amount</th>
                </tr>
                </thead>
                <tbody>

                @foreach($confirm_service as $request)
                    <tr>
                        <td>DE-{{$request->id}}</td>
                        <td>{{$request->service->name}}</td>
                        <td>{{$request->date}}</td>
                        <td>{{$request->start_time}}</td>

                        <td>{{$request->duration}}</td>
                        <td>{{$request->net_charge}}</td>
                        <td>{{$request->total_charge}}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Order ID</th>
                    <th>Service Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Duration</th>
                    <th>Amount</th>
                    <th>Total Amount</th>
                </tr>
                </tfoot>
            </table>

        </div>

        <div id="Tokyo" class="tabcontent">
            <h3>All Done Request</h3>
            <table id="table_id2" class="display nowrap" style="width:100%">
                <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Service Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Duration</th>
                    <th>Amount</th>
                    <th>Total Amount</th>
                </tr>
                </thead>
                <tbody>

                @foreach($complete_service as $request)
                    <tr>
                        <td>DE-{{$request->id}}</td>
                        <td>{{$request->service->name}}</td>
                        <td>{{$request->date}}</td>
                        <td>{{$request->start_time}}</td>
                        <td>{{$request->duration}}</td>
                        <td>{{$request->net_charge}}</td>
                        <td>{{$request->total_charge}}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Order ID</th>
                    <th>Service Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Duration</th>
                    <th>Amount</th>
                    <th>Total Amount</th>
                </tr>
                </tfoot>
            </table>

        </div>

    </div>
</div>


   <script>
       $(document).ready(function () {
           $('#table_id0').DataTable();
           $('#table_id1').DataTable();
           $('#table_id2').DataTable();
           $('#table_id3').DataTable();
       });

       function openCity(evt, cityName) {
           var i, tabcontent, tablinks;
           tabcontent = document.getElementsByClassName("tabcontent");
           for (i = 0; i < tabcontent.length; i++) {
               tabcontent[i].style.display = "none";
           }
           tablinks = document.getElementsByClassName("tablinks");
           for (i = 0; i < tablinks.length; i++) {
               tablinks[i].className = tablinks[i].className.replace(" active", "");
           }
           document.getElementById(cityName).style.display = "block";
           evt.currentTarget.className += " active";
       }
   </script>
@endsection



