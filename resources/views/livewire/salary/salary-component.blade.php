<div>

    {{-- Close your eyes. Count to one. That is how long forever feels.
    --}}

    @if ($edit)
        <i wire:click="cansel" class="far fa-window-close fa-2x float-right" style="color: #f06595;"></i>

        <p>Employee name : <strong>{{ $employee_name }}</strong> </p>
        <div class="row">

            <div class="col-md-6">

                <div class="form-group row"><label class="col-sm-3 col-form-label">Employee Type</label>
                    <div class="col-sm-12">
                        <select wire:model="employee_type"
                            class="form-control @error('employee_type') is-invalid @enderror">
                            <option value="">Select Employee Type</option>
                            <option value="Permanent">Permanent</option>
                            <option value="Provision">Provision</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row"><label class="col-sm-3 col-form-label">Basic Salary</label>
                    <div class="col-sm-12"><input wire:model="basic_salary"
                            class="form-control @error('basic_salary') is-invalid @enderror"></div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Allowance</h4>

                        <form class="forms-sample">
                            <div class="form-group row">
                                <label for="house_rent" class="col-sm-3 col-form-label">House Rent Allowance</label>
                                <div class="col-sm-9">
                                    <input type="number" value="0" wire:model="house_rent" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="medical" class="col-sm-3 col-form-label">Medical Allowance</label>
                                <div class="col-sm-9">
                                    <input type="number" id="medical" wire:model="medical" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="special_allowance" class="col-sm-3 col-form-label">Special Allowance</label>
                                <div class="col-sm-9">
                                    <input type="number" id="special_allowance" wire:model="special_allowance"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group row"><label for="fuel_allowance" class="col-sm-3 col-form-label">Fuel
                                    Allowance</label>
                                <div class="col-sm-9"><input type="number" id="fuel_allowance"
                                        wire:model="fuel_allowance" class="form-control"></div>
                            </div>
                            <div class="form-group row">
                                <label for="phone_bill" class="col-sm-3 col-form-label">Phone Bill</label>
                                <div class="col-sm-9">
                                    <input type="number" id="phone_bill" wire:model="phone_bill" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="other_allowance" class="col-sm-3 col-form-label">Other Allowance</label>
                                <div class="col-sm-9">
                                    <input type="number" id="other_allowance" wire:model="other_allowance"
                                        class="form-control">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Deduction</h4>


                        <div class="form-group row">
                            <label for="other_allowance" class="col-sm-3 col-form-label">Provident Fund</label>
                            <div class="col-sm-9">
                                <input type="number" id="other_allowance" wire:model="provident_fund"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="other_allowance" class="col-sm-3 col-form-label">TAX Deduction</label>
                            <div class="col-sm-9">
                                <input type="number" id="other_allowance" wire:model="tax" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="other_allowance" class="col-sm-3 col-form-label">Other Deduction</label>
                            <div class="col-sm-9">
                                <input type="number" id="other_allowance" wire:model="other_deduction"
                                    class="form-control">
                            </div>
                        </div>

                        {{-- <div class="border p-3 pb-1">--}}
                            {{-- <div class="form-group row">
                                --}}
                                {{-- <label for="other_allowance"
                                    class="col-sm-3 col-form-label">Gross Salary</label>--}}
                                {{-- <div class="col-sm-9">
                                    --}}
                                    {{-- <input type="number" id="other_allowance"
                                        wire:model="gross_salary" disabled--}}
                                        {{--
                                        class="form-control">--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}
                            {{-- <div class="form-group row">
                                --}}
                                {{-- <label for="other_allowance"
                                    class="col-sm-3 col-form-label">Total
                                    Deduction</label>--}}
                                {{-- <div class="col-sm-9">
                                    --}}
                                    {{-- <input type="number" id="other_allowance"
                                        wire:model="total_deduction" disabled--}}
                                        {{--
                                        class="form-control">--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}
                            {{-- <div class="form-group row">
                                --}}
                                {{-- <label for="other_allowance"
                                    class="col-sm-3 col-form-label">Net Salary</label>--}}
                                {{-- <div class="col-sm-9">
                                    --}}
                                    {{-- <input type="number" id="other_allowance"
                                        wire:model="net_salary" disabled--}}
                                        {{--
                                        class="form-control">--}}
                                    {{-- </div>--}}
                                {{-- </div>--}}




                            {{-- </div>--}}


                        <div class=" btn btn-outline-info btn-lg mt-3 float-right " wire:click="save">
                            save
                        </div>


                    </div>
                </div>
            </div>


        </div>
    @endif

    {{-- datatable TODO EMPLOYEE TABLE --}}

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
                <h4 class="card-title">Employee List</h4>
            <div class="">
                <button wire:click.prevent="create_salary_sheet" class="btn btn-success">CREATE SALARY SHEET</button>
            </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table"   style=" width:100%;" >
                        <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="table-sm" style=" width:100%; ">
                                    <table id="table" class="table dataTable no-footer" role="grid"
                                        aria-describedby="order-listing_info">
                                        <thead class="btn-info">
                                            <tr role="row">
                                                <td></td>
                                                <th>Employee Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Purchased On: activate to sort column ascending"
                                                    >Employee ID
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Customer: activate to sort column ascending"
                                                    >Designation
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Customer: activate to sort column ascending"
                                                    >Basic Salary
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Ship to: activate to sort column ascending"
                                                    >Gross Salary
                                                </th>
                                                <th style="width: 10px;">
                                                    Total Deduction
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Base Price: activate to sort column ascending"
                                                    >Net Salary
                                                </th>

                                                <th>
                                                    action
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody style=" width:80%;" >

                                            @foreach ($all_employee as $employee)
                                                <tr role="row" class="odd">
                                                    <td><img src="/storage/{{ $employee->photo }}" width="30"
                                                            height="30" alt=""></td>
                                                    <td>
                                                        {{ $employee->fname }} {{ ' ' }} {{ $employee->lname }} <br>
                                                        <p class="badge badge-pill badge-warning">
                                                            {{ $employee->mobile }}</p>
                                                    </td>
                                                    <td>{{ $employee->emp_id }}<br>{{ $employee->salaryInfo->employee_type ?? 'N/A' }}
                                                    </td>
                                                    <td>{{ $employee->department->department }} <br> {{ $employee->designation->name }}
                                                    </td>
                                                    <td>{{ $employee->salaryInfo->basic_salary ?? 'N/A' }}</td>
                                                    <td>{{ $employee->salaryInfo->gross_salary ?? 'N/A' }}</td>
                                                    <td>{{ $employee->salaryInfo->total_deduction ?? 'N/A' }}
                                                    <td>{{ $employee->salaryInfo->net_salary ?? 'N/A' }}</td>




                                                    <td> <i wire:click="edit({{ $employee->id }})"
                                                            class="fas fa-edit ml-3"></i>

{{--                                                        <a href="{{ route('make_payments', $employee->id) }}">--}}
{{--                                                            <i class="far fa-share-square"></i></a>--}}

                                                    </td>


                                                </tr>
                                            @endforeach



                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        var headingExcel =  '{{ auth()->user()->name }}';
        var headingPrint =  '<h1 id="heading" class="text-center text-dark">{{ auth()->user()->name }}</h1>' +
            '<h2 class="text-center text-dark">Address, Address, Address</h2>' +
            '<h4 class="text-center text-dark pt-2">Employee List</h4>';
        var headingPDF = '{{ auth()->user()->name }}' + '\n' + '{{ auth()->user()->email }}';

        $('#table').DataTable( {
            dom:"<'row '<'col-sm-12 col-md-3'l><'col-sm-12 col-md-6'B><'col-sm-12 col-md-3'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [
                {
                    extend: 'copy',
                    messageTop: '',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5 ]
                    },
                    title: '',
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5 ]
                    },
                },
                {
                    extend: 'excel',
                    messageTop: headingExcel,
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5 ]
                    },
                    title: '',
                },
                {
                    extend: 'pdf',
                    title: headingPDF,
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5 ]
                    },
                    customize: function (doc) {
                        doc.content[1].table.widths =
                            Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5 ]
                    },
                    title: headingPrint,
                }

            ]
        } );
    } );
</script>
