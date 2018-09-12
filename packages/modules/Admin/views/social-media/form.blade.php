
<div class="col-md-10">

             @if(Session::has('flash_alert_notice2')) 
            
                <div class="alert alert-success">    {{ Session::get('flash_alert_notice2') }} </div>
            @endif
    
     <div class="form-group{{ $errors->first('fb_id', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> facebook id <span class="error">*</span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('fb_id',isset($fb_id->field_value)?$fb_id->field_value:null, ['class' => 'form-control form-cascade-control input-small'])  !!} 
            <span class="label label-danger">{{ $errors->first('fb_id', ':message') }}</span>
        </div>
    </div>
    <div class="form-group{{ $errors->first('twitter_id', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> twitter id <span class="error">*</span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('twitter_id',isset($twitter_id->field_value)?$twitter_id->field_value:null, ['class' => 'form-control form-cascade-control input-small'])  !!} 
            <span class="label label-danger">{{ $errors->first('twitter_id', ':message') }}</span>
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
