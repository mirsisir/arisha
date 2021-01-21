<div>
    <div class="row card-body">
        <div class="col-md-2"></div>
        <div class="col-md-8">
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><center>  Add Supplier </center></h3>
    </div>
    <div class="card-body">
            <form wire:submit.prevent="store" class="cmxform" id="signupForm">
                <fieldset>
                    <div class="row">  
                        <div class="col-md-6"> 
                    <div class="form-group">
                        <label style="color: #20a71d;font-size: 15px;" for="Name">Name</label>
                        <input wire:model="name" id="name" class="form-control" name="name" type="text"> 
                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    </div>  
                    <div class="col-md-6"> 
                    <div class="form-group">
                        <label style="color: #20a71d;font-size: 15px;" for="phone">Phone</label>
                        <input wire:model="phone" id="phone" class="form-control" name="phone" type="text"> 
                        @error('phone') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                </div>
                <div class="row"> 
                    <div class="col-md-12"> 
                    <div class="form-group">
                        <label style="color: #20a71d;font-size: 15px;" for="address">Address</label>
                        <input wire:model="address" id="address" class="form-control" name="address" type="text"> 
                        @error('address') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>  
                    </div>
                    
            </div>
            <div class="row"> 
            <div class="col-md-6">  
                    <div class="form-group">
                        <label style="color: #20a71d;font-size: 15px;" for="email">Email</label>
                        <input wire:model="email" id="email" class="form-control" name="email" type="email"> 
                        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div> 
                </div>
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label style="color: #20a71d;font-size: 15px;" for="website">Website</label>
                        <input wire:model="website" id="website" class="form-control" name="website" type="text"> 
                        @error('website') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div> 
                </div>
            </div>
            <div class="row"> 
                <div class="col-md-5"> </div>
                <div class="col-md-4"> 
                    <div class="form-group">
                        <Button type="submit" class="btn btn-primary">Add Supplier</Button>
                    </div>   
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
