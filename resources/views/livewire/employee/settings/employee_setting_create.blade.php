<div>
    <div class="row card-body">
        <div class="col-md-2"></div>
        <div class="col-md-8">
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><center>  Add Employee </center></h3>
    </div>
    <div class="card-body">
            <form wire:submit.prevent="store" class="cmxform" id="signupForm">
                <fieldset>
                    <div class="row">    
                        <div class="col-md-6"> 
                    <div class="form-group">
                        <label style="color: #20a71d;font-size: 15px;"for="Name">Name</label>
                        <input wire:model="name" id="name" class="form-control" name="name" type="text"> 
                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                       </div>
                       <div class="col-md-6">  
                        <div wire:ignore class="form-group">
                        <label style="color: #20a71d;font-size: 15px;" for="brand_id">Designation</label>
                        <select model="designation_id" class="form-control" id="designation_id">
                            @foreach($designations as $designation)
                                <option value={{$designation->id}}>{{$designation->name}}</option>
                            @endforeach
                        </select> 
                        @error('designation_id') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                     </div>
                    
                     </div>   
                    <div class="row">    
                        <div class="col-md-6"> 
                    <div class="form-group">
                        <label style="color: #20a71d;font-size: 15px;"for="nid">Nid Number</label>
                        <input wire:model="nid" id="nid" class="form-control" name="nid" type="text"> 
                        @error('nid') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                       </div>
                    <div class="col-md-6">  
                    <div class="form-group">
                        <label style="color: #20a71d;font-size: 15px;"for="phone">Phone</label>
                        <input wire:model="phone" id="phone" class="form-control" name="phone" type="text"> 
                        @error('phone') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                     </div>
                     </div> 
                     <div class="row">    
                        <div class="col-md-12">  
                    <div class="form-group">
                        <label style="color: #20a71d;font-size: 15px;"for="address">Address</label>
                        <input wire:model="address" id="address" class="form-control" name="address" type="text"> 
                        @error('address') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                     </div>
                    
                     </div> 
                     <div class="row">    
                    <div class="col-md-6"> 
                    <div class="form-group">
                        
                        <label style="color: #20a71d;font-size: 15px;"for="image">Upload Image</label>
                        <input wire:model="image" id="image" class="form-control" name="image" type="file" style="height:40px"> 
                        @error('image') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                       </div>
                    <div class="col-md-6">  
                    <div class="form-group">
                        <label style="color: #20a71d;font-size: 15px;"for="status">Status</label><br>
                        <input wire:model="status" type="radio" id="active" name="status"
                               value="active" checked>
                        <label for="active">Active</label><br>
                        <input wire:model="status" type="radio" id="inactive" name="status"
                               value="inactive">
                        <label for="inactive">InActive</label><br>
                    </div>
                     </div>
                     </div> 
                     <div class="row"> 
                     <div class="col-md-6"> 
                    <div class="form-group">
                        
                        <label style="color: #20a71d;font-size: 15px;"for="joining_date">Joining Date</label>
                        <input wire:model="joining_date" id="joining_date" class="form-control" name="joining_date" type="date"> 
                        @error('joining_date') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                       </div>   
                    <div class="col-md-6">  
                    <div class="form-group">
                        <label style="color: #20a71d;font-size: 15px;"for="Salary">Salary</label>
                        <input wire:model="salary" id="salary" class="form-control" name="salary" type="number" step="0.01"> 
                        @error('salary') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                     </div>
                     </div> 
                     <div class="row"> 
                     <div class="col-md-5">   </div> 
                     <div class="col-md-4">  
                        <div class="form-group">
                            <Button type="submit" class="btn btn-primary">Add Employee</Button>
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
    height:35px;
  }
</style>
