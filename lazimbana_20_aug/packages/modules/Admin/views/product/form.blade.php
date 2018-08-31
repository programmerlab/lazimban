
<div class="col-md-10">

    
     <div class="form-group{{ $errors->first('product_title', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Product Title <span class="error">*</span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('product_title',null, ['class' => 'form-control form-cascade-control input-small'])  !!} 
            <span class="label label-danger">{{ $errors->first('product_title', ':message') }}</span>
        </div>
    </div>  


    <div class="form-group{{ $errors->first('product_category', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Select Category  <span class="error">*</span></label>
        <div class="col-lg-8 col-md-8"> 
            
                {!! $categories !!}

            <span class="label label-danger">{{ $errors->first('product_category', ':message') }}</span>
        </div>
    </div> 

    <div class="form-group{{ $errors->first('qty', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Product Quantity </label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::number('qty',null, ['class' => 'form-control form-cascade-control input-small','min'=>1])  !!} 
            <span class="label label-danger">{{ $errors->first('qty', ':message') }}</span>
        </div>
    </div> 
 
     <div class="form-group{{ $errors->first('price', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Product Price <span class="error">*</span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('price',null, ['class' => 'form-control form-cascade-control input-small'])  !!} 
            <span class="label label-danger">{{ $errors->first('price', ':message') }}</span>
        </div>
    </div> 


      <div class="form-group{{ $errors->first('discount', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Product discount (%)</label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('discount',0, ['class' => 'form-control form-cascade-control input-small','min'=>0])  !!} 
            <span class="label label-danger">{{ $errors->first('discount', ':message') }}</span>
        </div>
    </div> 

     <div class="form-group{{ $errors->first('description', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label">Product Description</label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::textarea('description',null, ['class' => 'form-control ckeditor form-cascade-control input-small'])  !!}
            <span class="label label-danger">{{ $errors->first('description', ':message') }}</span>
            @if(Session::has('flash_alert_notice')) 
            <span class="label label-danger">

                {{ Session::get('flash_alert_notice') }} 

            </span>@endif
        </div>
    </div> 

 
     <div class="form-group{{ $errors->first('image', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label">Product Image</label>
        <div class="col-lg-8 col-md-8">  

             {!! Form::file('image',null,['class' => 'form-control form-cascade-control input-small'])  !!}
             <br>
             @if(!empty($product->photo))
                 <img src="{!! Url::to('storage/uploads/products/'.$product->photo) !!}" width="100px">
                 <input type="hidden" name="photo" value="{!! $product->photo !!}">
             @endif                                       
            <span class="label label-danger">{{ $errors->first('image', ':message') }}</span>
            @if(Session::has('flash_alert_notice')) 
            <span class="label label-danger">

                {{ Session::get('flash_alert_notice') }} 

            </span>@endif
        </div>
    </div>
    <div class="form-group{{ $errors->first('img_name', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Product Image Name (without extension) </label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('img_name',null, ['class' => 'form-control form-cascade-control input-small'])  !!}
            <span class="label label-danger">{{ $errors->first('img_name', ':message') }}</span>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-4 col-md-4 control-label"> Product Image Alt tag</label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('img_alt',null, ['class' => 'form-control form-cascade-control input-small'])  !!}             
        </div>
    </div>
    <div class="form-group{{ $errors->first('additional_image', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label">Product Additional Images</label>
        <div class="col-lg-8 col-md-8">  
             
             <input type="file" name="additional_image[]" class="form-control form-cascade-control input-small" multiple>
             <br>
             @if(!empty($product->additional_images))
                @foreach(json_decode($product->additional_images) as $rows)
                    <img src="{!! Url::to('storage/uploads/products/'.$rows) !!}" width="100px">
                @endforeach
                    <input type="hidden" name="additional_images[]" value="">                    
             @endif                                       
            <span class="label label-danger">{{ $errors->first('additional_image', ':message') }}</span>
            @if(Session::has('flash_alert_notice')) 
            <span class="label label-danger">

                {{ Session::get('flash_alert_notice') }} 

            </span>@endif
        </div>
    </div>
    <div class="form-group{{ $errors->first('video', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Product Video URL (Youtube)</label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('video',0, ['class' => 'form-control form-cascade-control input-small','min'=>0])  !!} 
            <span class="label label-danger">{{ $errors->first('video', ':message') }}</span>
        </div>
    </div>
    <div class="form-group{{ $errors->first('slug', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Custom Url <span class="error"> </span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('slug',null, ['class' => 'form-control form-cascade-control input-small'])  !!} 
            <span class="label label-danger">{{ $errors->first('slug', ':message') }}</span>
        </div>
    </div> 

     <div class="form-group{{ $errors->first('meta_key', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Meta Key <span class="error"> </span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('meta_key',null, ['class' => 'form-control form-cascade-control input-small'])  !!} 
            <span class="label label-danger">{{ $errors->first('meta_key', ':message') }}</span>
        </div>
    </div> 


     <div class="form-group{{ $errors->first('meta_description', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label">Meta Description<span class="error"> </span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('meta_description',null, ['class' => 'form-control form-cascade-control input-small'])  !!} 
            <span class="label label-danger">{{ $errors->first('meta_description', ':message') }}</span>
        </div>
    </div> 

    <div class="form-group{{ $errors->first('title', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Title <span class="error"> </span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('title',null, ['class' => 'form-control form-cascade-control input-small'])  !!} 
            <span class="label label-danger">{{ $errors->first('title', ':message') }}</span>
        </div>
    </div> 
      
    <div class="form-group{{ $errors->first('is_indexing', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Is Indexing <span class="error"> </span></label>
        <div class="col-lg-8 col-md-8">             
            <select name="is_indexing" class ='form-control form-cascade-control input-small'>
                <option value="1" {{ (isset($product->is_indexing) && ($product->is_indexing == 1)) ? 'selected' : '' }}>Index</option>
                <option value="0" {{ (isset($product->is_indexing) && ($product->is_indexing == 0)) ? 'selected' : '' }}>No-Index</option>
            </select>
            <span class="label label-danger">{{ $errors->first('is_indexing', ':message') }}</span>
        </div>
    </div>
        
    <div class="form-group">
        <label class="col-lg-4 col-md-4 control-label"></label>
        <div class="col-lg-8 col-md-8">

            {!! Form::submit(' Save ', ['class'=>'btn  btn-primary text-white','id'=>'saveBtn']) !!}

            <a href="{{route('product')}}">
            {!! Form::button('Back', ['class'=>'btn btn-warning text-white']) !!} </a>
        </div>
    </div>

</div> 
