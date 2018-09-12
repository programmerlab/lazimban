@extends('packages::layouts.master') 
    @section('content') 
      @include('packages::partials.main-header')
      <!-- Left side column. contains the logo and sidebar -->
      @include('packages::partials.main-sidebar')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper"> 
       @include('packages::partials.breadcrumb')
        <!-- Main content -->
          <section class="content">
            <!-- Small boxes (Stat box) -->
              <div class="row">
                  <div class="col-md-12">
                    @if(Session::has('flash_alert_notice2')) 
            
                        <div class="alert alert-success">    {{ Session::get('flash_alert_notice2') }} </div>
                    @endif
                    @if(Session::has('flash_alert_notice1')) 
            
                        <div class="alert alert-danger">    {{ Session::get('flash_alert_notice1') }} </div>
                    @endif
                       <div class="panel panel-cascade">
                          <div class="panel-body ">
                              <div class="row">  
                                    
                                    <form method="POST" enctype="multipart/form-data" action="{{ url('admin/robots') }}">
                                    
                                    {!! Form::token() !!}
                                        <div class="form-group{{ $errors->first('image', ' has-error') }}">
                                            <label class="col-lg-4 col-md-4 control-label">Upload robots.txt </label>
                                            <div class="col-lg-8 col-md-8">  
                                    
                                                 {!! Form::file('robots',null,['class' => 'form-control form-cascade-control input-small'])  !!}
                                                 <br>
                                                                                 
                                                <span class="label label-danger">{{ $errors->first('robots', ':message') }}</span>
                                                @if(Session::has('flash_alert_notice')) 
                                                <span class="label label-danger">
                                    
                                                    {{ Session::get('flash_alert_notice') }} 
                                    
                                                </span>@endif
                                            </div>
                                        </div>
                                            
                                        <div class="form-group">
                                            <label class="col-lg-4 col-md-4 control-label"></label>
                                            <div class="col-lg-8 col-md-8">
                                    
                                                {!! Form::submit(' Save ', ['class'=>'btn  btn-primary text-white','id'=>'']) !!}
                                                                                    
                                            </div>
                                        </div>
                                    </form>
                                
                              </div>
                          </div>
                    </div>
                </div>            
              </div>  
            <!-- Main row --> 
          </section><!-- /.content -->
      </div> 
@stop