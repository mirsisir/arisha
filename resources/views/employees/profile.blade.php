<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3">
                <div class="border-bottom text-center pb-4"><img
                        src="/storage/{{$emp->photo}}"

                        alt="profile" class="img-lg rounded-circle mb-3" style="width: 200px">
                    <h4>{{$emp->fname}} {{ $emp->lname}}</h4>
                    <div class="justify-content-between">

                    </div>
                </div>

            </div>

{{--            2ed half --}}

            <div class="col-lg-9">
                <div class="d-flex justify-content-between">
                    <div><h3>{{$emp->fname}} {{ $emp->lname}}</h3>

{{--                        <div class="d-flex align-items-center">--}}
{{--                            <h5 class="mb-0 mr-2 text-muted">{{$emp->department->department}}</h5>--}}
{{--                            <div class="br-wrapper br-theme-css-stars">--}}
{{--                                {{$emp->designation->name}}--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>

                </div>
                <br>
                <div class="profile-feed">
                    <h5>Personal Details</h5>
                    <table class="table table-sm">
                        <tbody>
                        <tr>
                            <th>Father's Name</th>
                            <td>{{$emp->father}}</td>
                        </tr>
                        <tr>
                            <th>Date of Birth</th>
                            <td>{{$emp->dob}}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{$emp->gender}}</td>
                        </tr>
                        <tr>
                            <th>Mobile</th>
                            <td>{{$emp->mobile}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{$emp->phone}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$emp->email}}</td>
                        </tr>
                        <tr>
                            <th>NID</th>
                            <td>{{$emp->nid}}</td>
                        </tr>

                        <tr>
                            <th>Address </th>
                            <td>{{$emp->address}}  {{$emp->street}} <br> {{$emp->city}} {{$emp->post_code}}  </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
                <div>
                    <br>
                       <h5> Bank Information</h5>
                    <table class="table table-sm">
                        <tbody>
                        <tr>
                            <th>Bank Name</th>
                            <td>{{$emp->bank}}</td>
                        </tr>
                        <tr>
                            <th>Branch Name</th>
                            <td>{{$emp->branch}}</td>
                        </tr>
                        <tr>
                            <th>Account Name</th>
                            <td>{{$emp->acc_name}}</td>
                        </tr>
                        <tr>
                            <th>Account Number</th>
                            <td>{{$emp->acc_number}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <br>



            </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>

    window.print();
    setTimeout(()=>{
        history.back();

    },1000)

</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
