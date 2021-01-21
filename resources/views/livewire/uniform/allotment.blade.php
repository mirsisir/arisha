<div>
@if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
@endif
<form wire:submit.prevent="save" class="cmxform" id="signupForm">
        <fieldset>
            <div class="form-group">
                <label for="Employee Id">Employee Id</label>
                <input wire:model="employee_id" id="employee_id" class="form-control" name="employee_id" type="text"> </div>
                
            <div class="form-group">
                <label for="Product Id">Product Id</label>
                <input wire:model="product_id" id="product_id" class="form-control" name="product_id" type="text"> </div>
                
            <div class="form-group">
                <label for="Quantity">Quantity</label>
                <input wire:model="quantty" id="quantty" class="form-control" name="quantty" type="text"> </div>
                
            <div class="form-group">
                <label for="Date">Date</label>
                <input wire:model="date" id="date" class="form-control" name="date" type="date"> </div>
                <Button class="btn btn-primary" type="submit">Submit</Button>
          </fieldset>
    </form>
</div>

