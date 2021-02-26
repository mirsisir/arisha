@extends('layouts.admin.base')
@section('content')

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ session('message') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="card w-75 ml-auto mr-auto">
        <div class="card-body">
            <form action="{{route('partner_allocate_save')}}" method="POST">
                @csrf
                <label for="service">Service Select</label>
                <select name="service" id="select-service" class="form-control @error('service') is-invalid @enderror">
                    <option value="">Select Service</option>
                    @foreach($all_services as $services)
                        <option employee="{{ json_encode($services->employee )}}" value="{{$services->id}}"
                                data="{{ $services->employee_charge }}">{{$services->name}}</option>
                    @endforeach
                </select>

                @error('service') <span class="text-danger error">{{ $message }}</span>@enderror
                <br>
                <label for="employees">Service Employees</label><br>

                <select class="js-example-basic-multiple form-control " name="employees[]" multiple="multiple">
                    @foreach($all_employee as $employee)
                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                    @endforeach
                </select>

                @error('employees') <span class="text-danger error">{{ $message }}</span>@enderror
                <br>

                <label for="">Service Charge</label>
                <input type="text" name="service_charge" id="service_charge"
                       class="form-control @error('service_charge') is-invalid @enderror">

                <input type="submit" value="Save" class="btn btn-primary mt-2 float-right btn-lg">
                @error('service_charge') <span class="text-danger error">{{ $message }}</span>@enderror

            </form>
        </div>
    </div>



@endsection


@section('js')
    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();


            $('#select-service').change(function (e) {
                var el = $('#select-service :selected');
                charge = el.attr('data');
                let emp = el.attr('employee');
                console.log(JSON.parse(emp), emp)
                let arr = []
                for (var key in emp) {
                    if (emp.hasOwnProperty(key)) {
                        console.log(key + " -> " + emp[key]);
                        arr.push('' + emp[key])
                    }
                }
                $('.js-example-basic-multiple').val('');
                $('.js-example-basic-multiple').val(arr);
                $('.js-example-basic-multiple').trigger('change');


                $('#service_charge').val(charge)
            });


        });
    </script>
@endsection
