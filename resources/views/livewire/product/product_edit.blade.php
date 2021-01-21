
<div>
    <div class="row card-body">
        <div class="col-md-2"></div>
        <div class="col-md-8">
                <div class="card">
        <div class="card-header">
            <h3 class="card-title"><center>  Edit Product </center></h3>
        </div>
    <div class="card-body">

        <form wire:submit.prevent="update" class="cmxform" id="signupForm">
                <fieldset>
                    <div class="row"> 
                        <div class="col-md-6">
                        <div class="form-group">
                            <label style="color: #20a71d;font-size: 15px;" style="color: #20a71d;font-size: 20px;" for="Product Name">Product Name</label>
                            <input wire:model="name" id="name" class="form-control" name="name" type="text" style="height: 30px;"> 
                            @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    <div class="col-md-6">
                    <div wire:ignore class="form-group">
                        <label style="color: #20a71d;font-size: 15px;" for="brand_id">Brand</label>
                        <select model="brand_id" class="form-control" id="brand_id">
                            <option value={{$selected_brand_id}}>{{$brand_name}}</option>
                            @foreach($brands as $brand)
                                <option value={{$brand->id}}>{{$brand->name}}</option>
                            @endforeach
                        </select> 
                        @error('brand_id') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                    <div class="form-group">
                        <label style="color: #20a71d;font-size: 15px;" for="group">Group</label>
                        <select wire:model="group" id="group" class="form-control" name="group" style="height: 30px;"> 
                            <option value="">--Select Group--</option>
                            <option value="Chemical">Chemical</option>
                            <option value="Machine">Machine</option>
                        </select>
                        @error('group') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>                    
                    <div class="col-md-6">
                    <div class="form-group">
                        <label style="color: #20a71d;font-size: 15px;" for="unit">Unit</label>
                        <select wire:model="unit" id="unit" class="form-control" name="unit" style="height: 30px;"> 
                            <option value="">--Select Unit--</option>
                            <option value="Piece">Piece</option>
                            <option value="Kg">Kg</option>
                            <option value="Pack">Pack</option>
                            <option value="Gram">Gram</option>
                            <option value="Liter">Liter</option>
                        </select>
                        @error('unit') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                    <div class="row">  
                        <div class="col-md-5">    </div>
                        <div class="col-md-4">    
                        <Button class="btn btn-primary" type="submit" style="margin-top:10px">Update Product</Button>
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
