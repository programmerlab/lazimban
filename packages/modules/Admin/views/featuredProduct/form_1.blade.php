
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


    
     
    <div class="form-group">
        <label class="col-lg-4 col-md-4 control-label"></label>
        <div class="col-lg-8 col-md-8">

            {!! Form::submit(' Save ', ['class'=>'btn  btn-primary text-white','id'=>'saveBtn']) !!}

            <a href="{{route('featuredProduct')}}">
            {!! Form::button('Back', ['class'=>'btn btn-warning text-white']) !!} </a>
        </div>
    </div>

</div> 
<script>
     function get_products(cat_id){
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
</script>