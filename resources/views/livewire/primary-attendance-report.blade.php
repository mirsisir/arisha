<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-3 m-auto">
                    <select name="employee" wire:model="department" id="department" class="form-control">
                        <option value="">Select Department</option>
                        @foreach($all_department as $record)
                            <option value="{{$record->id}}">{{$record->department }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-3 m-auto">
                    <input type="month" wire:model="month" class="form-control"/>
                </div>
            </div>
        </div>
    </div>
    <br>
    @if($department)
    <div class="card">
        <div class="card-body" id="printSection">
            <div class=" m-auto" style="width: 90%">
                <table class="table table-bordered">
                    <tbody>
                    <tr class="font-weight-bold">
                        <td>Month : {{$month}} </td>
                        <td>Total Day : {{$day_count_month}} </td>
                        <td>Total OffDay : {{$total_offday}}</td>
                        <td>Total Holiday : {{$holidays}}</td>
                        <td>Total Working Day : {{$day_count_month-($total_offday+$holidays)}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr class="font-weight-bold btn-info">
                        <th> Employee</th>
                        <th> Leave</th>
                        <th> Present</th>
                        <th> Absent</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($all_employee as $employee)
                        @php
                                $key = $employee->id."-".$month;
                            $record= \App\Models\Attendance::firstWhere('key',$key);
                            $attendance = json_decode(optional($record)->attendance , true )?? [] ;
                            $total_p = count($attendance);
                        @endphp
                        <tr>
                            <td>{{$employee->fname}} {{$employee->lname}}</td>
                            <td>0</td>
                            <td>{{$total_p}}</td>
                            <td>{{$day_count_month-$total_p}}</td>
                        </tr>
                    @empty
                        <p>N/A</p>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif


</div>
