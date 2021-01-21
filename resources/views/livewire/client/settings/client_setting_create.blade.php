
<div>
    <div class="row card-body">
        <div class="col-md-2"></div>
        <div class="col-md-8">
    <div class="card">
    <div class="card-header">
        <h3 class="card-title"><center>  Add Client </center></h3>
    </div>
    <div class="card-body">
<form wire:submit.prevent="store" class="cmxform" id="signupForm">
        <fieldset>
            <div class="row">
                <div class="col-md-6">   
                <div class="form-group">
                    <label style="color: #20a71d;font-size: 15px;" for="Company Name">Company Name</label>
                    <input wire:model="company_name" id="company_name" class="form-control" name="company_name" type="text"> 
                    @error('company_name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-6"> 
                <div class="form-group">
                    <label style="color: #20a71d;font-size: 15px;" for="Website">Website</label>
                    <input wire:model="website" id="website" class="form-control" name="website" type="text"> 
                    @error('website') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
            </div>
            </div>
             <div class="row"> 
                 <div class="col-md-6"> 
            <div class="form-group">
                <label style="color: #20a71d;font-size: 15px;" for="Phone">Phone</label>
                <input wire:model="phone_no" id="phone" class="form-control" name="phone" type="text"> 
                @error('phone_no') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
         <div class="col-md-6"> 
            <div class="form-group">
                <label style="color: #20a71d;font-size: 15px;" for="Email">Email</label>
                <input wire:model="email" id="email" class="form-control" name="email" type="email"> 
                @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
        </div>
         <div class="row"> 
             <div class="col-md-12"> 
            <div class="form-group">
                <label style="color: #20a71d;font-size: 15px;" for="Address">Address</label>
                <input  wire:model="address" id="address" class="form-control" name="address" type="text">
                @error('address') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
        
        </div>
         <div class="row"> 
          <div class="col-md-6"> 
            <div class="form-group">
                <label style="color: #20a71d;font-size: 15px;" for="Contact person">Contact person</label>
                <input wire:model="contact_person" id="contact_person" class="form-control" name="contact_person" type="text"> 
                @error('contact_person') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>    
         <div class="col-md-6"> 
            <div class="form-group">
                <label style="color: #20a71d;font-size: 15px;" for="Contact mobile">Contact mobile</label>
                <input wire:model="contact_mobile" id="contact_mobile" class="form-control" name="contact_mobile" type="text"> 
                @error('contact_mobile') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
            </div>
         <div class="row"> 
         <div class="col-md-6"> 
                <div class="form-group">
                <label style="color: #20a71d;font-size: 15px;" for="Bill amount">Bill amount</label>
                <input wire:model="bill_amount" id="bill_amount" class="form-control" name="bill_amount" type="number" step=".01"> 
                @error('bill_amount') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            
        </div>
             <div class="col-md-6"> 
            <div class="form-group">
                <label style="color: #20a71d;font-size: 15px;" for="Vat amount">Vat amount</label>
                <input wire:model="vat_amount" id="vat_amount" class="form-control" name="vat_amount" type="number" step=".01"> 
                @error('vat_amount') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
        </div>

          </fieldset>
          <div class="row"> 
            <div class="col-md-5">    </div>
            <div class="col-md-4"> 
                <Button class="btn btn-primary" type="submit" style="margin-top:10px">Add Client</Button>
            </div>
        </div>
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


