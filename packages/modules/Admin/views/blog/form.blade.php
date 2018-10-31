
<div class="col-md-10">

    
     <div class="form-group{{ $errors->first('title', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Blog Title <span class="error">*</span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('title',null, ['class' => 'form-control form-cascade-control input-small', 'placeholder'=>'Blog Title'])  !!} 
            <span class="label label-danger">{{ $errors->first('title', ':message') }}</span>
        </div>
    </div>  


    
     <div class="form-group{{ $errors->first('description', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label">Blog Description <span class="error">*</span></label>
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
        <label class="col-lg-4 col-md-4 control-label">Image <span class="error">*</span></label>
        <div class="col-lg-8 col-md-8">  

             {!! Form::file('image',null,['class' => 'form-control form-cascade-control input-small'])  !!}
             <br>
             @if(!empty($blog->image))
                 <img src="{!! Url::to('storage/uploads/blogs/'.$blog->image) !!}" width="100px">
                 <input type="hidden" name="images" value="{!! $blog->image !!}">
             @endif                                       
            <span class="label label-danger">{{ $errors->first('image', ':message') }}</span>
            @if(Session::has('flash_alert_notice')) 
            <span class="label label-danger">

                {{ Session::get('flash_alert_notice') }} 

            </span>@endif
        </div>
    </div>
    <div class="form-group{{ $errors->first('tags', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Tags <span class="error"></span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('tags',null, ['class' => 'form-control form-cascade-control input-small' , 'placeholder'=>'Use Comma separated tags'])  !!} 
            <span class="label label-danger">{{ $errors->first('tags', ':message') }}</span>
        </div>
    </div>
    <div class="form-group{{ $errors->first('slug', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Blog Custom Url</label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('slug',null, ['class' => 'form-control form-cascade-control input-small', 'placeholder'=>'Custom Url'])  !!} 
            <span class="label label-danger">{{ $errors->first('slug', ':message') }}</span>
        </div>
    </div>
    <div class="form-group{{ $errors->first('meta_key', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Blog Meta Key</label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('meta_key',null, ['class' => 'form-control form-cascade-control input-small', 'placeholder'=>'Meta Key'])  !!} 
            <span class="label label-danger">{{ $errors->first('meta_key', ':message') }}</span>
        </div>
    </div>
     <div class="form-group{{ $errors->first('meta_description', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Blog Meta Description</label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('meta_description',null, ['class' => 'form-control form-cascade-control input-small', 'placeholder'=>'Meta Description'])  !!} 
            <span class="label label-danger">{{ $errors->first('meta_description', ':message') }}</span>
        </div>
    </div>
     <div class="form-group{{ $errors->first('canonical_tag', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Canonical Url</label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('canonical_tag',null, ['class' => 'form-control form-cascade-control input-small', 'placeholder'=>'Canonical Url'])  !!} 
            <span class="label label-danger">{{ $errors->first('canonical_tag', ':message') }}</span>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-4 col-md-4 control-label"></label>
        <div class="col-lg-8 col-md-8">

            {!! Form::submit(' Save ', ['class'=>'btn  btn-primary text-white','id'=>'saveBtn']) !!}

            <a href="{{route('blog')}}">
            {!! Form::button('Back', ['class'=>'btn btn-warning text-white']) !!} </a>
        </div>
    </div>

</div> 
