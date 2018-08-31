<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}"> 

      <div class="form-group{{ $errors->first('email', ' has-error') }} has-feedback">
          {!! Form::email('email',null, ['class'=>'form-control', 'placeholder'=>'Eposta']) !!}
          <span class="glyphicon glyphicon-envelope form-control-feedback input-img"></span>
           
      </div>

      <div class="form-group{{ $errors->first('password', ' has-error') }} has-feedback">
         {!! Form::password('password',['class'=>'form-control','placeholder'=> 'Şifre']) !!}
          <span class="glyphicon glyphicon-lock form-control-feedback input-img"></span>
           
      </div>
      
      <div class="form-group">
      {!! Form::submit('GİRİŞ', ['class'=>'btn btn-primary btn-block btn-flat', 'id'=>'login', 'value'=>  Lang::get('admin-lang.sign_in') ]) !!}  
      
      <!--<a href="{{ url('admin/signUp') }}" class="link">Create an account!</a>-->
</div>
      <div class="form-group alert alert-danger error-loc " style="display:none"></div>
        <div>
              @if(Session::has('flash_alert_notice'))
              <div class="alert alert-danger danger">
                   {{ Session::get('flash_alert_notice') }} 
              </div>
            @endif
          </div>

      
</form> 