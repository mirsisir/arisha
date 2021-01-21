
<div>
    <div class="row card-body">
<div class="col-md-2"></div>
<div class="col-md-8">
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><center>  Add Designation </center></h3>
    </div>
    <div class="card-body">

        <form wire:submit.prevent="store" class="cmxform" id="signupForm">
                <fieldset>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label style="color: #20a71d;font-size: 15px;" for="Designation ">Designation Name</label>
                            <input wire:model="name" id="name" class="form-control" name="name" type="text">
                            @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label style="color: #20a71d;font-size: 15px;" for="stock">Status</label>
                            <select wire:model="status" id="status" class="form-control " name="status">
                                <option value="">--Select Status--</option>
                                <option value="Active">Active</option>
                                <option value="InActive">InActive</option>
                            </select>
                            @error('status') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-4">
                                <Button class="btn btn-primary" type="submit" style="margin-top:10px">Add Designation</Button>
                            </div>

                        </div>
                </fieldset>
            </form>
        </div>
    </div>
    </div>
</div>
</div>

<style>

  .form-control{
    height:30px !important;
  }
</style>
