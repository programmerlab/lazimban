
@extends('layouts.master')
    @section('title', 'HOME')
        
        @section('header')
        <h1>Home</h1>
        @stop

        @section('content') 

            <div class="page_title">
                <div class="page-wrapper">
                    <div class="col-md-6"></div>
                    <div class="col-md-6 text-right">
                            <span><a href="#">Home</a> </span>                                            
                            <span> kaydol </span>  
                       </div>
                </div>
            </div>
            
          <div class="container" ng-app="postApp" ng-controller="postController">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                
                <div class="panel-body reg" >
                     @if($errors->has())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                              <p> {{ $error }} </p>
                            @endforeach
                            </div>
                            @endif 
                    <form class="form-horizontal Register" action="{{url('myaccount/signup')}}"   name="userForm"  method="post">
                        {{ csrf_field() }}
                         
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">isim</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" ng-model="name" >
                                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Soyadı</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" ng-model="name" >
                                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Addres</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" ng-model="email" >
                                 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Parola</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" ng-model="password" >
                                 @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Şifreyi Onayla</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="confirm_password" ng-model="confirm_password" >
                                
                                @if ($errors->has('confirm_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('confirm_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Kayıt olmak
                                </button>
                                <a href="{{ url('hesabim/giris') }}">Zaten hesabım var ? </a>
                            </div>
                            
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
 
@stop

<style type="text/css">
    .Register  .form-control{
        margin: 5px;
    }
</style>
 