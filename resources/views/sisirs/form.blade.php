
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($sisir)->name) }}" minlength="1" maxlength="255" required="true" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('charge') ? 'has-error' : '' }}">
    <label for="charge" class="col-md-2 control-label">Charge</label>
    <div class="col-md-10">
        <input class="form-control" name="charge" type="number" id="charge" value="{{ old('charge', optional($sisir)->charge) }}" required="true" placeholder="Enter charge here...">
        {!! $errors->first('charge', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
    <label for="category_id" class="col-md-2 control-label">Category</label>
    <div class="col-md-10">
        <select class="form-control" id="category_id" name="category_id">
        	    <option value="" style="display: none;" {{ old('category_id', optional($sisir)->category_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select category</option>
        	@foreach ($categories as $key => $category)
			    <option value="{{ $key }}" {{ old('category_id', optional($sisir)->category_id) == $key ? 'selected' : '' }}>
			    	{{ $category }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('employee_charge') ? 'has-error' : '' }}">
    <label for="employee_charge" class="col-md-2 control-label">Employee Charge</label>
    <div class="col-md-10">
        <input class="form-control" name="employee_charge" type="number" id="employee_charge" value="{{ old('employee_charge', optional($sisir)->employee_charge) }}" placeholder="Enter employee charge here...">
        {!! $errors->first('employee_charge', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('hourly') ? 'has-error' : '' }}">
    <label for="hourly" class="col-md-2 control-label">Hourly</label>
    <div class="col-md-10">
        <input class="form-control" name="hourly" type="text" id="hourly" value="{{ old('hourly', optional($sisir)->hourly) }}" placeholder="Enter hourly here...">
        {!! $errors->first('hourly', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('basic_price') ? 'has-error' : '' }}">
    <label for="basic_price" class="col-md-2 control-label">Basic Price</label>
    <div class="col-md-10">
        <input class="form-control" name="basic_price" type="number" id="basic_price" value="{{ old('basic_price', optional($sisir)->basic_price) }}" placeholder="Enter basic price here...">
        {!! $errors->first('basic_price', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('km_price') ? 'has-error' : '' }}">
    <label for="km_price" class="col-md-2 control-label">Km Price</label>
    <div class="col-md-10">
        <input class="form-control" name="km_price" type="number" id="km_price" value="{{ old('km_price', optional($sisir)->km_price) }}" placeholder="Enter km price here...">
        {!! $errors->first('km_price', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('stop_over_price') ? 'has-error' : '' }}">
    <label for="stop_over_price" class="col-md-2 control-label">Stop Over Price</label>
    <div class="col-md-10">
        <input class="form-control" name="stop_over_price" type="number" id="stop_over_price" value="{{ old('stop_over_price', optional($sisir)->stop_over_price) }}" min="1" placeholder="Enter stop over price here...">
        {!! $errors->first('stop_over_price', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('waiting_price') ? 'has-error' : '' }}">
    <label for="waiting_price" class="col-md-2 control-label">Waiting Price</label>
    <div class="col-md-10">
        <input class="form-control" name="waiting_price" type="number" id="waiting_price" value="{{ old('waiting_price', optional($sisir)->waiting_price) }}" placeholder="Enter waiting price here...">
        {!! $errors->first('waiting_price', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('helpers') ? 'has-error' : '' }}">
    <label for="helpers" class="col-md-2 control-label">Helpers</label>
    <div class="col-md-10">
        <input class="form-control" name="helpers" type="number" id="helpers" value="{{ old('helpers', optional($sisir)->helpers) }}" placeholder="Enter helpers here...">
        {!! $errors->first('helpers', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('details') ? 'has-error' : '' }}">
    <label for="details" class="col-md-2 control-label">Details</label>
    <div class="col-md-10">
        <textarea class="form-control" name="details" cols="50" rows="10" id="details" maxlength="1000">{{ old('details', optional($sisir)->details) }}</textarea>
        {!! $errors->first('details', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('SPM') ? 'has-error' : '' }}">
    <label for="SPM" class="col-md-2 control-label">S P M</label>
    <div class="col-md-10">
        <input class="form-control" name="SPM" type="number" id="SPM" value="{{ old('SPM', optional($sisir)->SPM) }}" placeholder="Enter s p m here...">
        {!! $errors->first('SPM', '<p class="help-block">:message</p>') !!}
    </div>
</div>

