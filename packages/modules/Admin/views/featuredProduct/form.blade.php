
<div class="col-md-10">
     <div class="form-group{{ $errors->first('product_category', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label">  Category  <span class="error">*</span></label>
        <div class="col-lg-8 col-md-8"> 
            
                {!! $categories !!}

            <span class="label label-danger">{{ $errors->first('product_category', ':message') }}</span>
        </div>
    </div>

     <div class="form-group{{ $errors->first('product', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Products  <span class="error">*</span></label>
        <div class="col-lg-8 col-md-8"> 
            
                <select name="product" id="product" class="form-control" >
                    <option value="">Select Product</option>
                </select>

            <span class="label label-danger">{{ $errors->first('product', ':message') }}</span>
        </div>
    </div>          


	<div class="form-group{{ $errors->first('validity', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label">  Validity </label>
        <div class="col-lg-8 col-md-8"> 
            
                Weekly <input type="radio" name="validity" value="7" onChange="get_amount(this.value);" required>
			 Monthly <input type="radio" name="validity" value="30" onChange="get_amount(this.value);">
            <span class="label label-danger">{{ $errors->first('validity', ':message') }}</span>
        </div>
    </div>
    <div class="form-group{{ $errors->first('product_category', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label">  Amount </label>
        <div class="col-lg-8 col-md-8"> 
            
                <input class="form-control form-cascade-control input-small" name="amt" id="amt" type="text" value="" disabled>
            <span class="label label-danger">{{ $errors->first('amount', ':message') }}</span>
        </div>
    </div>
     <input type="hidden" name="cat" id="cat" value="">
	<input type="hidden" name="amount" id="amount" value="">
    <div class="form-group">
        <label class="col-lg-4 col-md-4 control-label"></label>
        <div class="col-lg-8 col-md-8">

            {!! Form::submit(' Add ', ['class'=>'btn  btn-primary text-white','id'=>'saveBtn']) !!}

            <a href="{{route('featuredProduct')}}">
            {!! Form::button('Back', ['class'=>'btn btn-warning text-white']) !!} </a>
        </div>
    </div>

</div> 
<script>
     function get_products(cat_id){
		$('#cat').val(cat_id);
          //alert(cat_id);
          $.ajax({
			url: "{{ url('featuredProducts/get_products') }}",
			type: "POST",
			data: {"cat_id":cat_id},           
			success: function (data) {			
                console.log(data);
                $('#product').html(data);
			}
		});
     }
	
	function get_amount(validity){
		var cat_id  = $('#cat').val();
		var amount  = $('#amount').val();
          //alert(cat_id);
          $.ajax({
			url: "{{ url('featuredProducts/get_validity') }}",
			type: "POST",
			data: {"cat_id":cat_id,"validity":validity,"amount":amount},           
			success: function (data) {			
                console.log(data);
			 $('#amt').val(data);
			 $('#amount').val(data);
                //$('#product').html(data);
			}
		});
     }
</script>