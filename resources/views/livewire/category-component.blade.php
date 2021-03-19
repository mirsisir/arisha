<div>
    {{-- Do your work, then step back. --}}.
    @if (session()->has('message'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>  {{   session('message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form action="">
                        @csrf
                        <label for="category">Service Category</label>
                        <select name="category" wire:model="category" id="" class="form-control">
                            <option value=""> Select Category</option>
                            @foreach ($all_category as $cat)
                                <option value="{{$cat->name}}">{{$cat->name}}</option>
                            @endforeach
                        </select>

                        @error('category') <span class="text-danger error">{{ $message }}</span>@enderror
                        <br>
                        <label for="name">Service Name</label>
                        <input type="text" name="Service" wire:model="name"
                               class="form-control @error('service') invalid @enderror " autocomplete="off">
                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror <br>

                        @if($category=="Transport")

                            <label for="charge">Hourly : </label>
                            <input type="checkbox" name="hourly" wire:model="hourly" id="" style="transform : scale(2);"> <br>

                            @if ($hourly)

                                <label for="charge">Service charge Per Hour</label>
                                <input type="text" name="Service_charge" wire:model="charge" class="form-control"
                                       autocomplete="off">
                                @error('charge') <span class="text-danger error">{{ $message }}</span>@enderror <br>

                                {{--                        Service package -------------}}
                            @else
                                <label for="charge">{{__('Basic_price')}}</label>
                                <input type="number" name="basic" wire:model="basic" class="form-control"
                                       autocomplete="off">
                                @error('basic') <span class="text-danger error">{{ $message }}</span>@enderror <br>

                                <label for="charge">Each kilometre</label>
                                <input type="number" name="km" wire:model="km" class="form-control" autocomplete="off">
                                @error('km') <span class="text-danger error">{{ $message }}</span>@enderror <br>

                                <label for="charge">Stopover</label>
                                <input type="number" name="stopover" wire:model="stopover" class="form-control"
                                       autocomplete="off">
                                @error('stopover') <span class="text-danger error">{{ $message }}</span>@enderror <br>

                                <label for="charge">Waiting</label>
                                <input type="number" name="waiting" wire:model="waiting" class="form-control"
                                       autocomplete="off">
                                @error('waiting') <span class="text-danger error">{{ $message }}</span>@enderror <br>

                                <label for="charge">Helper</label>
                                <input type="number" name="helper" wire:model="helper" class="form-control"
                                       autocomplete="off">
                                @error('helper') <span class="text-danger error">{{ $message }}</span>@enderror <br>


                            @endif

                        @elseif($category=="Construction")

                            <label for="charge">Square meter</label>
                            <input type="number" name="helper" wire:model="square_meter" class="form-control"
                                   autocomplete="off">
                            @error('square_meter') <span class="text-danger error">{{ $message }}</span>@enderror <br>

                        @elseif($category=="Cleaning")

                            <label for="charge">Service charge Per Hour</label>
                            <input type="number" name="Service_charge" wire:model="charge" class="form-control"
                                   autocomplete="off">
                            @error('charge') <span class="text-danger error">{{ $message }}</span>@enderror <br>

                        @endif

                        <label for="charge">Service Details </label>

                        <textarea id="details" name="details" class="ckeditor  form-control" rows="4" wire:model="details" cols="50">sad
                        </textarea>
                        @error('details') <span class="text-danger error">{{ $message }}</span>@enderror <br>

                        {{--                        <label for="charge">Select Employee</label>--}}

                        {{--                        <select id="employeeSelect" class="js-example-basic-multiple form-control" name="employees[]" multiple="multiple"  wire:model="employees[]">--}}
                        {{--                          @foreach($all_employee as $employee)--}}
                        {{--                            <option value="{{$employee->id}}">{{$employee->fname}}</option>--}}
                        {{--                            @endforeach--}}
                        {{--                        </select>--}}
                        <br>
                        <br>
                        <div>
                            <div wire:click="create" class="btn btn-primary"> {{ $update  ? "Update" : "Create" }}</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-hover table-sm">
                        <thead style="background-color:green; color:whitesmoke">
                        <tr>
                            <th scope="col">Service Name</th>
                            <th scope="col">Service Charge</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($all_service as $service)
                            <tr>
                                <th>{{$service->name}}</th>
                                <th>{{$service->charge}} {{$service->basic_price}}  {{$service->SPM}} </th>
                                <th wire:click="edit({{$service->id}})">
                                    <button class="btn btn-primary btn-sm"> Edit</button>
                                </th>
                                <th wire:click="delete({{$service->id}})">
                                    <button class="btn btn-danger btn-sm"> Delete</button>
                                </th>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    @section('js')
        <script type="text/javascript">
            $(document).ready(function() {
                $('.ckeditor').ckeditor();
            });
        </script>
    @endsection
</div>


