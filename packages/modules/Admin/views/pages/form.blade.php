
<div class="col-md-12">

             @if(Session::has('flash_alert_notice2')) 
            
                <div class="alert alert-success">    {{ Session::get('flash_alert_notice2') }} </div>
            @endif
    
     <div class="form-group{{ $errors->first('title', ' has-error') }}">
        <label class="col-lg-2 col-md-2 control-label"> Page Title <span class="error">*</span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('title',null, ['class' => 'form-control form-cascade-control input-small'])  !!} 
            <span class="label label-danger">{{ $errors->first('title', ':message') }}</span>
           
        </div>
    </div> 
 

     <div class="form-group{{ $errors->first('page_content', ' has-error') }}">
        <label class="col-lg-2 col-md-2 control-label">Page content</label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::textarea('page_content',null, ['class' => 'form-control ckeditor form-cascade-control input-small'])  !!}
            <span class="label label-danger">{{ $errors->first('page_content', ':message') }}</span>
            @if(Session::has('flash_alert_notice')) 
            <span class="label label-danger">

                {{ Session::get('flash_alert_notice') }} 

            </span>@endif
        </div>
    </div> 
    

<hr> <center> <b> Banner  (minimum size : 800x350) </b> </a><hr>
     <div class="form-group{{ $errors->first('banner_image1', ' has-error') }}">
        <label class="col-lg-2 col-md-2 control-label">Banner Image1 </label>
        <div class="col-lg-8 col-md-8">  

             {!! Form::file('banner_image1',null,['class' => 'form-control form-cascade-control input-small'])  !!}
             <br>
              @if(isset($page->banner_image1))
                 <img src="{!! Url::to('storage/files/banner_content/'.$page->banner_image1) !!}" width="100px" height="100px">
              @endif                                   
            <span class="label label-danger">{{ $errors->first('banner_image1', ':message') }}</span>
            @if(Session::has('flash_alert_notice')) 
            <span class="label label-danger">

                {{ Session::get('flash_alert_notice') }} 

            </span>@endif
        </div>
    </div>  
      
    
    <div class="form-group">
        <label class="col-lg-2 col-md-2 control-label"></label>
        <div class="col-lg-8 col-md-8">

            {!! Form::submit(' Save ', ['class'=>'btn  btn-primary text-white','id'=>'saveBtn']) !!}

            <a href="{{route('product')}}">
            {!! Form::button('Back', ['class'=>'btn btn-warning text-white']) !!} </a>
        </div>
    </div>

</div> 
